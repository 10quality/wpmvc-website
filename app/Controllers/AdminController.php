<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\MVC\Controller;
/**
 * AdminController controller.
 * Generated with ayuco.
 * ADMIN DASHBOARD ONLY METHODS.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.6
 */
class AdminController extends Controller
{
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
        $theme = get_bridge( 'theme' );
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