<?php

namespace WPMVCWebsite\Models;

use WPMVC\Cache;
use WPMVC\MVC\Traits\FindTrait;
use WPMVC\MVC\Models\OptionModel as Model;

/**
 * Github credentials data model.
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.11
 */
class Github extends Model
{
    use FindTrait;
    /**
     * Property id.
     * @since 1.0.10
     *
     * @var string
     */
    protected $id = 'github_auth';
    /**
     * Aliases.
     * @since 1.0.10
     * 
     * @var array
     */
    protected $aliases = [
        'client_id'     => 'func_get_client_id',
        'client_secret' => 'func_get_client_secret',
        'account'       => 'func_get_account',
        'repo'          => 'func_get_repo',
        'authorize_url' => 'func_get_authorize_url',
        'token_url'     => 'func_get_token_url',
        'redirect_url'  => 'func_get_redirect_url',
        'access_token'  => 'field_access_token',
        'token_type'    => 'field_token_type',
        'state'         => 'field_state',
        'api_scope'     => 'field_scope',
        'can_auth'      => 'func_get_can_auth',
        'is_ready'      => 'func_get_is_ready',
        'release'       => 'func_get_release',
    ];
    /**
     * Hidden attributes.
     * @since 1.0.10
     * 
     * @var array
     */
    protected $hidden = [
        'client_secret',
        'customizer_client_id',
        'customizer_client_secret',
        'code',
        'state',
        'release',
    ];
    /**
     * Method for alias property `client_id`.
     * Returns `client_id` property.
     * @since 1.0.10
     * 
     * @return string
     */
    protected function get_client_id()
    {
        return get_theme_mod( 'github_client_id', '' );
    }
    /**
     * Method for alias property `client_secret`.
     * Returns `client_secret` property.
     * @since 1.0.10
     * 
     * @return string
     */
    protected function get_client_secret()
    {
        return get_theme_mod( 'github_client_secret', '' );
    }
    /**
     * Method for alias property `account`.
     * Returns `account` property.
     * @since 1.0.10
     * 
     * @return string
     */
    protected function get_account()
    {
        return get_theme_mod( 'github_account', '' );
    }
    /**
     * Method for alias property `repo`.
     * Returns `repo` property.
     * @since 1.0.10
     * 
     * @return string
     */
    protected function get_repo()
    {
        return get_theme_mod( 'github_repo', '' );
    }
    /**
     * Method for alias property `authorize_url`.
     * Returns `authorize_url` property.
     * @since 1.0.10
     * 
     * @return string
     */
    protected function get_authorize_url()
    {
        return add_query_arg( [
            'client_id'     => $this->client_id,
            'redirect_url'  => $this->redirect_url,
            'login'         => $this->account,
            'scope'         => theme()->config->get( 'github.scope' ),
            'state'         => $this->state,
            'allow_signup'  => 'true',
        ], theme()->config->get( 'github.authorize_url' ) );
    }
    /**
     * Method for alias property `token_url`.
     * Returns `token_url` property.
     * @since 1.0.10
     * 
     * @return string
     */
    protected function get_token_url()
    {
        return theme()->config->get( 'github.token_url' );
    }
    /**
     * Method for alias property `redirect_url`.
     * Returns `redirect_url` property.
     * @since 1.0.10
     * 
     * @return string
     */
    protected function get_redirect_url()
    {
        $step = $this->step;
        if ( empty( $step ) )
            $step = 'authorize';
        return add_query_arg( [
                'github_oauth'  => '1',
                'github_step'   => $step,
            ], admin_url( '/' ) );
    }
    /**
     * Returns flag indicating if theme settings ara available
     * and authorization can happen.
     * Method for alias property `can_auth`.
     * Returns `can_auth` property.
     * @since 1.0.10
     * 
     * @return bool
     */
    protected function get_can_auth()
    {
        return $this->client_id && $this->client_secret && $this->account;
    }
    /**
     * Returns flag indicating if is ready for accessing API.
     * Method for alias property `can_auth`.
     * Returns `can_auth` property.
     * @since 1.0.10
     * 
     * @return bool
     */
    protected function get_is_ready()
    {
        return $this->access_token !== null;
    }
    /**
     * Returns token request data.
     * @since 1.0.10
     * 
     * @param string $code
     * 
     * @return array
     */
    public function get_token_request( $code )
    {
        $this->step = 'token';
        return [
            'client_id'         => $this->client_id,
            'client_secret'     => $this->client_secret,
            'code'              => $code,
            'redirect_uri'      => $this->redirect_url,
            'state'             => $this->state,
        ];
    }
    /**
     * Returns latest release object.
     * @since 1.0.11
     * 
     * @return object
     */
    protected function get_release()
    {
        if ( $this->is_ready && $this->repo ) {
            $github = $this;
            $release = Cache::remember( 'wpmvc_repo_release', 60, function() use( &$github ) {
                $releases = $github->api( 'repos/{repo}/releases' );
                return $releases && count( $releases ) ? $releases[0] : null;
            } );
            if ( empty( $release ) )
                Cache::forget( 'wpmvc_repo_release' );
            return $release;
        }
        return null;
    }
    /**
     * Returns api response.
     * @since 1.0.10
     * 
     * @param string $endpoint
     * @param array  $request
     * @param string $method
     * 
     * @return object
     */
    public function api( $endpoint, $request = [], $method = 'GET' )
    {
        $endpoint = str_replace( '{user}' , $this->account, $endpoint );
        $endpoint = str_replace( '{repo}' , $this->repo, $endpoint );
        $response = json_decode( get_curl_contents(
            theme()->config->get( 'github.api_url' ) . $endpoint,
            $method,
            $request,
            [
                'Authorization: ' . $this->token_type . ' ' . $this->access_token,
            ]
        ) );
        if ( $response->message && $response->documentation_url ) {
            if ( $response->message !== 'Not Found' ) {
                $this->access_token = null;
                $this->token_type = null;
                $this->api_scope = null;
                $this->save();
            }
            return null;
        }
        return $response;
    }
}