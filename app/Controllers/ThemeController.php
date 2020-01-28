<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\MVC\Controller;
use WPMVC\Cache;
/**
 * ThemeController controller.
 * Generated with ayuco.
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.1.0
 */
class ThemeController extends Controller
{
    /**
     * Adds theme support.
     * @since 1.0.8
     * 
     * @hook after_setup_theme
     */
    public function theme_support()
    {
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'woocommerce' );
    }
    /**
     * WordPress init.
     * - Register navs.
     * @since 1.0.0
     * 
     * @hook init
     */
    public function menu()
    {
        register_nav_menus( [
            'header-menu' => __( 'Header Menu', 'wpmvc' ),
            'mobile-header-menu' => __( 'Mobile Header Menu', 'wpmvc' ),
            'mobile-menu' => __( 'Mobile Menu', 'wpmvc' ),
            'docs-menu' => __( 'Documentation Menu', 'wpmvc' ),
            'footer-menu-1' => __( 'Footer 1 Menu', 'wpmvc' ),
            'footer-menu-2' => __( 'Footer 2 Menu', 'wpmvc' ),
            'tuto-menu' => __( 'Tutorial Menu', 'wpmvc' ),
        ] );
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
            'name' => __( 'Right sidebar' ),
            'id' => 'wpmvc-index-right',
            'description' => __( 'Sidebar located on the right side of templates.', 'wpmvc-website' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
        ] );
        register_sidebar( [
            'name' => __( 'Right sidebar (Single)' ),
            'id' => 'wpmvc-single-right',
            'description' => __( 'Sidebar located on the right side of "single" templates.', 'wpmvc-website' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
        ] );
        register_sidebar( [
            'name' => __( 'Footer' ),
            'id' => 'wpmvc-footer',
            'description' => __( 'Sidebar located at the footer of the website.', 'wpmvc-website' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget' => '</div>',
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
        if ( in_array( 'current-menu-item', $classes ) ) {
            $classes[] = 'active';
        }
        return $classes;
    }
    /**
     * Returns index.php title.
     * @since 1.1.0
     * 
     * @hook wpmvc_index_title
     * 
     * @param string $title
     * 
     * @return string
     */
    public function index_title( $title )
    {
        if ( is_home() ) {
            return __( 'Blog' );
        }
        if ( is_archive() || is_tax() ) {
            return __( 'Archive' );
        }
        if ( is_search() ) {
            return __( 'Search', 'wpmvc-website' );
        }
        return $title;
    }
}