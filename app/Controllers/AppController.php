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
 * @version 1.0.0
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
     * @since 1.0.7
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
}