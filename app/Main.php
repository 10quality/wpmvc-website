<?php

namespace WPMVCWebsite;

use WPMVC\Bridge;
/**
 * Main class.
 * Bridge between Wordpress and App.
 * Class contains declaration of hooks and filters.
 *
 * @author Ale Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.8
 */
class Main extends Bridge
{
    /**
     * Declaration of public wordpress hooks.
     */
    public function init()
    {
        // Config
        $this->add_action('init', 'AppController@taxonomies');
        $this->add_filter('wpmvc_login_handlers', 'AppController@login_handlers');
        $this->add_filter('wpmvc_login_url', 'AppController@login_url');
        $this->add_filter('wpmvc_account_page_handlers', 'AppController@login_handlers');
        $this->add_filter('wpmvc_account_url', 'AppController@account_url');
        // WP Login
        $this->add_filter('login_headerurl', 'AppController@login_headerurl');
        $this->add_action('login_head', 'view@login.style');
        // Theme filters
        $this->add_action('after_setup_theme', 'ThemeController@theme_support');
        $this->add_action('init', 'ThemeController@menu');
        $this->add_filter('body_class', 'ThemeController@body_class');
        $this->add_action('widgets_init', 'ThemeController@sidebars');
        $this->add_filter('nav_menu_css_class', 'ThemeController@filter_nav_menu_css');
        // Models
        $this->add_model('Page');
        // Shortcodes
        $this->add_shortcode('docs-section', 'ShortcodeController@docs_section');
        $this->add_shortcode('code-line', 'ShortcodeController@code_line');
        $this->add_shortcode('callout', 'ShortcodeController@callout');
        $this->add_shortcode('youtube', 'ShortcodeController@youtube');
        // Rest API
        $this->add_action('rest_api_init', 'ApiController@init');
    }
}