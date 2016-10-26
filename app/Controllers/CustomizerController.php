<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\MVC\Controller;
use WPMVC\Cache;
/**
 * CustomizerController controller.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
class CustomizerController extends Controller
{
    /**
     * Registration of customizer options.
     * Action "customize_register"
     * Wordpress hook
     * Ayuco: addition 2016-10-25 06:40 pm
     * @since 1.0.0
     *
     * @param object $wp_customize Wordpress customize theme api.
     */
    public function register($wp_customize)
    {
        // Title highlight
        $wp_customize->add_setting('wpmvc[title_highlight]', ['type' => 'option']);
        $wp_customize->add_control('wpmvc[title_highlight]', ['type' => 'text', 'label' => 'Title\'s highlight', 'section' => 'title_tagline', 'settings' => 'wpmvc[title_highlight]', 'priority' => 15]);
        // Title boold
        $wp_customize->add_setting('wpmvc[title_bold]', ['type' => 'option']);
        $wp_customize->add_control('wpmvc[title_bold]', ['type' => 'text', 'label' => 'Title\'s bold', 'section' => 'title_tagline', 'settings' => 'wpmvc[title_bold]', 'priority' => 16]);
    }
    /**
     * Flush settings keys from cache.
     * Action "customize_save"
     * Wordpress hook
     * Ayuco: addition 2016-10-25 06:54 pm
     * @since 1.0.0
     */
    public function save()
    {
        Cache::forget( 'wpmvc_theme_settings' );
    }
}