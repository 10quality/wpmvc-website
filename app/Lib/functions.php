<?php

use WPMVCWebsite\Models\Page;

/**
 * Global theme functions.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.9
 */

if ( ! function_exists( 'get_the_color' ) ) {
    /**
     * Returns the theme color of an object. 
     * @since 1.0.0
     *
     * @param int $ID Page ID.
     *
     * @return string
     */
    function get_the_color( $ID = null )
    {
        return theme()->{'_c_return_PageController@get_color'}( $ID );
    }
}

if ( ! function_exists( 'theme' ) ) {
    /**
     * Returns the theme object. 
     * @since 1.0.0
     *
     * @return object
     */
    function theme()
    {
        return get_bridge( 'theme' );
    }
}

if ( ! function_exists( 'get_page_model' ) ) {
    /**
     * Returns page model.
     * @since 1.0.0
     *
     * @return string
     */
    function get_page_model()
    {
        global $page_model;
        if ( get_the_ID() ) {
            if ( ! isset( $page_model ) ) {
                $page_model = Page::find( get_the_ID() );
                $GLOBALS['page_model'] = $page_model;
            }
            return $page_model;
        }
        return null;
    }
}

if ( ! function_exists( 'get_page_icon' ) ) {
    /**
     * Returns page property.
     * @since 1.0.8
     *
     * @return string
     */
    function get_page_icon()
    {
        $page = get_page_model();
        return $page ? $page->icon : null;
    }
}

if ( ! function_exists( 'get_page_formatted_modified' ) ) {
    /**
     * Returns page property.
     * @since 1.0.8
     *
     * @return string
     */
    function get_page_formatted_modified()
    {
        $page = get_page_model();
        return $page ? $page->formatted_modified : null;
    }
}

if ( ! function_exists( 'get_page_has_sidebar' ) ) {
    /**
     * Returns page property.
     * @since 1.0.8
     *
     * @return string
     */
    function get_page_has_sidebar()
    {
        $page = get_page_model();
        return $page ? $page->has_sidebar : null;
    }
}

if ( ! function_exists( 'sanitize_copyright' ) ) {
    /**
     * Returns parsed and sanitized copyright text.
     * @since 1.0.8
     * 
     * @param string $text
     * 
     * @return string
     */
    function sanitize_copyright( $text )
    {
        return theme()->{'_c_return_AppController@sanitize_copyright'}( $text );
    }
}

if ( ! function_exists( 'sanitize_ids_string' ) ) {
    /**
     * Returns parsed and sanitized string of IDs.
     * @since 1.0.8
     * 
     * @param string $text
     * 
     * @return string
     */
    function sanitize_ids_string( $string )
    {
        return theme()->{'_c_return_AppController@sanitize_ids_string'}( $string );
    }
}

if ( ! function_exists( 'has_homepage_logo' ) ) {
    /**
     * Returns flag indicating if there is a homepage logo available.
     * @since 1.0.9
     * 
     * @return bool
     */
    function has_homepage_logo()
    {
        return theme()->{'_c_return_AppController@has_logo'}();
    }
}

if ( ! function_exists( 'get_homepage_logo_url' ) ) {
    /**
     * Returns homepage logo url.
     * @since 1.0.9
     * 
     * @return string
     */
    function get_homepage_logo_url()
    {
        return theme()->{'_c_return_AppController@get_logo_url'}();
    }
}