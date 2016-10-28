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
     * @since 1.0.0
     */
    public function menu()
    {
        register_nav_menus([
            'header-menu'   => __('Header Menu', 'wpmvc'),
            'footer-menu-1' => __('Footer 1 Menu', 'wpmvc'),
            'footer-menu-2' => __('Footer 2 Menu', 'wpmvc'),
        ]);
    }
    /**
     * Action "body_class"
     * Wordpress hook
     * Ayuco: addition 2016-10-27 05:40 pm
     * @since 1.0.0
     *
     * @return array
     */
    public function body_class($classes)
    {
        if (is_front_page()) {
            $classes[] = 'landing-page';
        }
        $classes[] = get_the_color();
        return $classes;
    }
    /**
     * Action "widgets_init"
     * Wordpress hook
     * Ayuco: addition 2016-10-27 06:25 pm
     * @since 1.0.0
     */
    public function sidebars()
    {
        register_sidebar([
            'name'          => 'Pages',
            'id'            => 'wpmvc-page-right',
            'description'   => 'Sidebar located on the right side of pages, when their flag is activated.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
        ]);

        register_sidebar([
            'name'          => 'Footer',
            'id'            => 'wpmvc-footer',
            'description'   => 'Sidebar located at the footer of the website.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
        ]);
    }
}