<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\MVC\Controller;
/**
 * AdminController controller.
 * Generated with ayuco.
 * ADMIN DASHBOARD ONLY METHODS.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
class AdminController extends Controller
{
    /**
     * Action "admin_enqueue_scripts"
     * Wordpress hook
     * Ayuco: addition 2016-10-28 12:54 pm
     * @since 1.0.0
     *
     * @param object $config App configuration.
     */
    public function enqueue($config = [])
    {
        $screen = get_current_screen();
        if (in_array($screen->base, $config->get('vue.admin_screens'))) {
            wp_enqueue_script('ace', 'https://cdn.jsdelivr.net/ace/1.2.4/min/ace.js', [], '1.2.4', true);
            wp_enqueue_script('admin-app', assets_url('admin/js/app.js', __DIR__), ['ace', 'jquery'], '1.0.0', true);
        }
    }
    /**
     * Action "add_meta_boxes"
     * Wordpress hook
     * Ayuco: addition 2016-10-31 10:03 am
     * @since 1.0.0
     *
     * @global object $theme
     */
    public function metaboxes()
    {
        global $theme;
        add_meta_box(
            'code-editor-metabox',
            'Editor',
            [ &$theme, '_c_void_CodeController@editor_metabox' ],
            'code',
            'advanced',
            'core'
        );
    }
}