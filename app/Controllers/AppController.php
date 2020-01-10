<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\MVC\Controller;
/**
 * AppController controller.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.8
 */
class AppController extends Controller
{
    /**
     * Tags.
     * @since 1.0.0
     * 
     * @hook init
     */
    public function taxonomies()
    {
        register_taxonomy_for_object_type( 'post_tag', 'page' );
    }
    /**
     * Returns parsed and sanitized copyright text.
     * @since 1.0.8
     * 
     * @param string $text
     * 
     * @return string
     */
    public function sanitize_copyright( $text )
    {
        $text = trim( $text );
        if ( empty( $text ) )
            return '';
        return preg_replace( ['/{copy}/','/{year}/'], ['&copy;',date( 'Y' )], $text );
    }
    /**
     * Returns list of available login handlers.
     * @since 1.0.8
     * 
     * @hook wpmvc_login_handlers
     * 
     * @param array $handlers
     * 
     * @return array
     */
    public function login_handlers( $handlers )
    {
        if ( function_exists( 'WC' ) && get_option( 'woocommerce_myaccount_page_id', false ) )
            $handlers['wc'] = __( 'WooCommerce My Account', 'wpmvc-website' );
        return $handlers;
    }
    /**
     * Returns login url.
     * @since 1.0.8
     * 
     * @hook wpmvc_login_url
     * 
     * @global object $wp
     * 
     * @param string $url
     * 
     * @return string
     */
    public function login_url( $url )
    {
        global $wp;
        switch ( get_theme_mod( 'login_handler', 'wp' ) ) {
            case 'wp':
                return wp_login_url( get_theme_mod( 'login_redirect', true ) ? home_url( $wp->request ) : '' );
            case 'wc':
                $myaccount = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
                if ( empty( $myaccount ) )
                    return $url;
                return get_theme_mod( 'login_redirect', true )
                    ? add_query_arg( ['redirect_to' => home_url( $wp->request )], $myaccount )
                    : $myaccount;
        }
        return $url;
    }
    /**
     * Returns account url.
     * @since 1.0.8
     * 
     * @hook wpmvc_account_url
     * 
     * @param string $url
     * 
     * @return string
     */
    public function account_url( $url )
    {
        switch ( get_theme_mod( 'account_page_handler', 'wp' ) ) {
            case 'wp':
                return admin_url( '/' );
            case 'wc':
                $myaccount = get_permalink( get_option( 'woocommerce_myaccount_page_id' ) );
                return empty( $myaccount ) ? $url : $myaccount;
        }
        return $url;
    }
    /**
     * Override login hear url, and return home url.
     * @since 1.0.8
     * 
     * @hook login_headerurl
     * 
     * @return string
     */
    public function login_headerurl()
    {
        return home_url( '/' );
    }
}