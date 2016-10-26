<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\MVC\Controller;
use WPMVC\Cache;
/**
 * ThemeController controller.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
class ThemeController extends Controller
{
    /**
     * Returns a setting stored in the database.
     * Ayuco: addition 2016-10-25 06:50 pm
     * @since 1.0.0
     *
     * @param string $key Setting key.
     *
     * @return mixed
     */
    public function get_theme_setting($key)
    {
        $settings = $this->get_settings();
        return isset($settings[$key]) ? $settings[$key] : null;
    }
    /**
     * Returns the theme setttings located in the databse.
     * @since 1.0.0
     *
     * @return array 
     */
    private function get_settings()
    {
        return Cache::remember('wpmvc_theme_settings', 60, function () {
            return get_option('wpmvc', []);
        });
    }
    /**
     * Action "init"
     * Wordpress hook
     * Ayuco: addition 2016-10-25 07:07 pm
     * @since fill
     *
     * @return
     */
    public function menu()
    {
        register_nav_menus( [
            'header-menu'   => __( 'Header Menu', 'wpmvc' ),
        ] );
    }
}