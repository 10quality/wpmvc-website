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
     */
    public function enqueue()
    {
        wp_enqueue_script('admin-app', assets_url('admin/js/app.js', __DIR__), ['jquery'], '1.0.0', true);
    }
}