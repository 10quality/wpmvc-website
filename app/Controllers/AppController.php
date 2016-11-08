<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\MVC\Controller;
/**
 * AppController controller.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
class AppController extends Controller
{
    /**
     * Action "init"
     * Wordpress hook
     * Ayuco: addition 2016-11-07 09:08 pm
     * @since 1.0.0
     */
    public function taxonomies()
    {
        register_taxonomy_for_object_type('post_tag', 'page');
    }
}