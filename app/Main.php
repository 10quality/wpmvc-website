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
     * @since fill version
     */
    public function init()
    {
        // Sample
        // $this->add_action( 'the_content', 'PostController@filter' );
        // Ayuco: addition 2016-10-25 06:40 pm
        $this->add_action('customize_register', 'CustomizerController@register');
        // Ayuco: addition 2016-10-25 06:54 pm
        $this->add_action('customize_save', 'CustomizerController@save');
        // Ayuco: addition 2016-10-25 07:07 pm
        $this->add_action('init', 'ThemeController@menu');
    }
    /**
     * Declaration of admin only wordpress hooks.
     * For Wordpress admin dashboard.
     * @since fill version
     */
    public function on_admin()
    {
        // Sample
        // $this->add_action( 'save_post', 'PostController@save' );
    }
}