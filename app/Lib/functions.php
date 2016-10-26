<?php
/**
 * Global theme functions.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */

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