<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\MVC\Controller;
use WPMVC\Cache;
/**
 * ThemeController controller.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.6
 */
class ThemeController extends Controller
{
    /**
     * WordPress init.
     * - Register navs.
     * @since 1.0.0
     * 
     * @hook init
     */
    public function menu()
    {
        register_nav_menus([
            'header-menu' => __('Header Menu', 'wpmvc'),
            'docs-menu' => __('Documentation Menu', 'wpmvc'),
            'footer-menu-1' => __('Footer 1 Menu', 'wpmvc'),
            'footer-menu-2' => __('Footer 2 Menu', 'wpmvc'),
            'tuto-menu' => __('Tutorial Menu', 'wpmvc'),
        ]);
    }
    /**
     * Returns body CSS classes.
     * @since 1.0.0
     * 
     * @hook body_class
     * 
     * @param array $classes
     *
     * @return array
     */
    public function body_class( $classes )
    {
        if ( is_front_page() ) {
            $classes[] = 'landing-page';
        }
        $classes[] = get_the_color();
        return $classes;
    }
    /**
     * Register sidebars.
     * @since 1.0.0
     * 
     * @hook widgets_init
     */
    public function sidebars()
    {
        register_sidebar( [
            'name'          => 'Pages',
            'id'            => 'wpmvc-page-right',
            'description'   => __( 'Sidebar located on the right side of pages, when their flag is activated.', 'wpmvc-website' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>'
        ] );
        register_sidebar( [
            'name'          => 'Footer',
            'id'            => 'wpmvc-footer',
            'description'   => __( 'Sidebar located at the footer of the website.', 'wpmvc-website' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>'
        ] );
    }
    /**
     * Returns menu nav css classes.
     * @since 1.0.6
     * 
     * @hook nav_menu_css_class
     *
     * @param array $classes
     * 
     * @return array
     */
    public function filter_nav_menu_css( $classes )
    {
        if ( in_array( 'current-menu-item', $classes ) )
            $classes[] = 'active';
        return $classes;
    }
}