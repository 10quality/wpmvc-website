<?php

use WPMVC\Cache;
use WPMVCWebsite\Models\Github;

/**
 * Github download button Widget.
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.11
 */
class GithubDownloadButtonWidget extends WP_Widget
{
    /**
     * MAIN reference
     * @var object
     * @since 1.0.10
     */
    protected $main;
    /**
     * Github model.
     * @var object
     * @since 1.0.10
     */
    protected $github;
    /**
     * Constructor.
     * @since 1.0.10
     */
    public function __construct( $id = '', $name = '', $args = array() )
    {
        $this->main = get_bridge( 'theme' );
        $this->github = Github::find();
        parent::__construct(
            'github_download_button',
            __( 'Github Download Button', 'wpmvc-website' ),
            [
                'classname'     => 'GithubDownloadButtonWidget',
                'description'   => __( 'Displays Github\'s latest release download button of the selected repository (in Customize).', 'wpmvc-website' ),
            ]
        );
    }
    /**
     * Widget display.
     * Renders what will be inside the widget when displayed.
     * @since fill
     *
     * @param array $args     Arguments for the theme.
     * @param class $instance Parameters.
     */
    public function widget( $args, $instance )
    {
        $github = $this->github;
        if ( ! $github->is_ready || $github->repo === null )
            return;
        // Get latest release
        $instance['release'] = $github->release;
        if ( empty( $instance['release'] ) )
            return;
        // ----------------
        if ( $instance['include_wrapper'] )
            echo $args['before_widget'];
        // ----------------
        $this->main->view( 'widgets.github_download_button.widget', $instance );
        // ----------------
        if ( $instance['include_wrapper'] )
            echo $args['after_widget'];
    }
    /**
     * Widget update.
     * Called when user updates settings at widget setting in admin dashboard.
     * @since 1.0.10
     *
     * @param array $new_instance Widget instance.
     * @param array $old_instance Widget instance.
     *
     * @return array
     */ 
    public function update( $new_instance, $old_instance )
    {
        $instance = $new_instance;
        $instance['include_label'] = array_key_exists( 'include_label', $instance );
        $instance['include_version'] = array_key_exists( 'include_version', $instance );
        $instance['include_type'] = array_key_exists( 'include_type', $instance );
        $instance['include_wrapper'] = array_key_exists( 'include_wrapper', $instance );
        return $instance;
    }
    /**
     * Widget form.
     * Renders the form displayed at widget setting in admin dashboard.
     * @since 1.0.10
     *
     * @param array $instance Widget instance.
     */
    public function form( $instance )
    {
        // ----------------
        $instance = wp_parse_args( (array)$instance, [
            'label'             => __( 'Download' ),
            'type'              => 'zipball',
            'color'             => 'btn-themed',
            'size'              => '',
            'include_label'     => true,
            'include_version'   => true,
            'include_type'      => true,
            'include_wrapper'   => false,
        ] );
        // ----------------
        $this->main->view( 'widgets.github_download_button.form', [
            'widget'    => $this,
            'instance'  => $instance,
            'types'     => apply_filters( 'wpmvc_widget_github_download_button_types', [
                            'zipball'   => 'Zip',
                            'tarball'   => 'Tar.gz',
                        ] ),
            'colors'    => apply_filters( 'wpmvc_widget_github_download_button_colors', [
                            'btn-themed'    => __( 'Selected by template', 'wpmvc-website' ),
                            'btn-primary'   => __( 'Cyan' ),
                            'btn-green'     => __( 'Green' ),
                            'btn-blue'      => __( 'Blue' ),
                            'btn-orange'    => __( 'Orange' ),
                            'btn-red'       => __( 'Red' ),
                            'btn-pink'      => __( 'Pink' ),
                            'btn-purple'    => __( 'Purple' ),
                        ] ),
            'sizes'     => apply_filters( 'wpmvc_widget_github_download_button_sizes', [
                            ''              => __( 'Normal', 'wpmvc-website' ),
                            'btn-xs'        => __( 'Extra small' ),
                            'btn-sm'        => __( 'Small' ),
                            'btn-lg'        => __( 'Large' ),
                            'btn-xl'        => __( 'Extra large' ),
                            'btn-block'     => __( 'Block' ),
                        ] ),
        ] );
        // ----------------
    }
    /**
     * Returns flag indicating that the widget is ready to be used.
     * @since 1.0.10
     * 
     * @return bool
     */
    private function is_ready()
    {
        return $this->github->is_ready && $this->github->repo !== null;
    }
}