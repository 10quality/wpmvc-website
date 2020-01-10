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
 * @version 1.0.7
 */
class Main extends Bridge
{
    /**
     * Declaration of public wordpress hooks.
     * @since 1.0.7
     */
    public function init()
    {
        // Config
        $this->add_action('init', 'AppController@taxonomies');
        $this->add_filter('wpmvc_login_handlers', 'AppController@login_handlers');
        $this->add_filter('wpmvc_login_url', 'AppController@login_url');
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
    }
}