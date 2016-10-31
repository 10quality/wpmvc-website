<?php

namespace WPMVCWebsite;

use WPMVC\Bridge;
/**
 * Main class.
 * Bridge between Wordpress and App.
 * Class contains declaration of hooks and filters.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
class Main extends Bridge
{
    /**
     * Declaration of public wordpress hooks.
     * @since 1.0.0
     */
    public function init()
    {
        // Ayuco: addition 2016-10-25 06:40 pm
        $this->add_action('customize_register', 'CustomizerController@register');
        // Ayuco: addition 2016-10-25 06:54 pm
        $this->add_action('customize_save', 'CustomizerController@save');
        // Ayuco: addition 2016-10-25 07:07 pm
        $this->add_action('init', 'ThemeController@menu');
        // Ayuco: addition 2016-10-27 03:11 pm
        $this->add_model('Page');
        // Ayuco: addition 2016-10-27 05:40 pm
        $this->add_filter('body_class', 'ThemeController@body_class');
        // Ayuco: addition 2016-10-27 06:25 pm
        $this->add_action('widgets_init', 'ThemeController@sidebars');
        // Ayuco: addition 2016-10-28 06:47 pm
        $this->add_filter('nav_menu_css_class', 'ThemeController@filter_nav_menu_css');
        // Ayuco: addition 2016-10-28 07:01 pm
        $this->add_shortcode('docs-section', 'ShortController@docs_section');
        // Ayuco: addition 2016-10-31 09:44 am
        $this->add_model('Code');
    }
    /**
     * Declaration of admin only wordpress hooks.
     * For Wordpress admin dashboard.
     * @since 1.0.0
     */
    public function on_admin()
    {
        // Ayuco: addition 2016-10-28 12:54 pm
        $this->add_action('admin_enqueue_scripts', 'AdminController@enqueue');
        // Ayuco: addition 2016-10-31 10:03 am
        $this->add_action('add_meta_boxes', 'AdminController@metaboxes');
    }
}