<?php
/**
 * Global theme functions.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */

/**
 * Theme support.
 * @since 1.0.0
 */
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
}

if ( !function_exists( 'get_theme_setting' ) ) {
    /**
     * Returns a theme setting. 
     * @since 1.0.0
     *
     * @param string $key Setting key.
     *
     * @return mixed
     */
    function get_theme_setting( $key )
    {
        global $theme;
        return $theme->{'_c_return_ThemeController@get_theme_setting'}( $key );
    }
}

if ( !function_exists( 'the_theme_setting' ) ) {
    /**
     * Echo a theme setting. 
     * @since 1.0.0
     *
     * @param string $key Setting key.
     *
     * @return mixed
     */
    function the_theme_setting( $key )
    {
        echo get_theme_setting( $key );
    }
}

if ( !function_exists( 'get_the_color' ) ) {
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
        global $theme;
        return $theme->{'_c_return_PageController@get_color'}( $ID );
    }
}

if ( !function_exists( 'theme' ) ) {
    /**
     * Returns the theme object. 
     * @since 1.0.0
     *
     * @return object
     */
    function theme()
    {
        global $theme;
        return $theme;
    }
}