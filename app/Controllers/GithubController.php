<?php

namespace WPMVCWebsite\Controllers;

use Exception;
use WPMVC\Request;
use WPMVC\MVC\Controller;
use WPMVCWebsite\Models\Github;
/**
 * Github controller.
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.11
 */
class GithubController extends Controller
{
    /**
     * Checks for Github oauth callbacks.
     * @since 1.0.10
     *
     * @hook admin_init
     */
    public function init()
    {
        $is_github_oauth = Request::input( 'github_oauth', false );
        if ( $is_github_oauth ) {
            $step = sanitize_text_field( Request::input( 'github_step', 'authorize' ) );
            switch ( $step ) {
                case 'authorize':
                    $github = Github::find();
                    // Exchange code
                    $code = sanitize_text_field( Request::input( 'code' ) );
                    $state = sanitize_text_field( Request::input( 'state' ) );
                    if ( empty( $code )
                        || empty( $state )
                        || $github->state != $state
                    ) {
                        break;
                    }
                    // Request token
                    $response = json_decode( get_curl_contents( 
                        $github->token_url,
                        'POST',
                        $github->get_token_request( $code ),
                        [ 'Accept: application/json' ]
                     ) );
                    if ( $response->access_token ) {
                        $github->access_token = $response->access_token;
                        $github->token_type = $response->token_type;
                        $github->api_scope = $response->scope;
                        $github->save();
                    }
                    break;
            }
        }
    }
    /**
     * Displays oauth information.
     * @since 1.0.10
     *
     * @hook admin_notices
     */
    public function github_notice()
    {
        $github = Github::find();
        if ( $github->can_auth && !$github->is_ready ) {
            // Update state code
            if ( Request::input( 'github_oauth', false ) === false ) {
                $github->state = uniqid();
                $github->save();
            }
            // Show notice
            $this->view->show( 'admin.github.notice', [ 'github' => &$github ] );
        }
    }
    /**
     * Returns the list of available repositories.
     * @since 1.0.10
     * 
     * @hook wpmvc_github_repos
     * 
     * @param array $repos
     * 
     * @return array
     */
    public function repos( $repos )
    {
        $github = Github::find();
        if ( $github->is_ready ) {
            $data = $github->api( 'user/repos', [ 'per_page' => 100 ] );
            foreach ( $data as $repo ) {
                $repos[$repo->full_name] = $repo->full_name;
            }
        }
        return $repos;
    }
    /**
     * Dashboard setup.
     * @since 1.0.10
     * 
     * @hook wp_dashboard_setup
     */
    public function dashboard_setup()
    {
        wp_add_dashboard_widget( 'wpmvc_github', __( 'Github' ), [ &$this, 'dashboard_widget' ] );
    }
    /**
     * Displays dashboard widget.
     * @since 1.0.10
     */
    public function dashboard_widget()
    {
        $args = [ 'github' => Github::find(), 'release' => null ];
        $args['release'] = $args['github']->release;
        $this->view->show( 'admin.github.dashboard-widget', $args );
    }
    /**
     * Displays version name.
     * @since 1.0.11
     * 
     * @hook wpmvc_download_button_label
     */
    public function download_button_label()
    {
        $github = Github::find();
        $release = $github->release;
        if ( $release ) {
            echo esc_attr( $release->tag_name );
        }
    }
}