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
        //$this->add_model('Page');
        // Ayuco: addition 2016-10-25 06:40 pm
        $this->add_action('customize_register', 'CustomizerController@register');
        // Ayuco: addition 2016-10-25 06:54 pm
        $this->add_action('customize_save', 'CustomizerController@save');
        // Ayuco: addition 2016-10-25 07:07 pm
        $this->add_action('init', 'ThemeController@menu');
        // Ayuco: addition 2016-10-27 12:23 am
        $this->add_action('wp_enqueue_scripts', 'ThemeController@enqueue');
    }
    /**
     * Declaration of admin only wordpress hooks.
     * For Wordpress admin dashboard.
     * @since 1.0.0
     */
    public function on_admin()
    {
    }
}