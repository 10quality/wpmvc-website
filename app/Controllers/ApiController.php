<?php

namespace WPMVCWebsite\Controllers;

use WP_REST_Request;
use WP_REST_Response;
use WPMVC\Cache;
use WPMVC\MVC\Controller;
use WPMVCWebsite\Models\Superbrowse;

/**
 * Api controller.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.8
 */
class ApiController extends Controller
{
    /**
     * Registers endpoint and namespace.
     * @since 1.0.8
     * 
     * @hook rest_api_init
     */
    public function init()
    {
        register_rest_route( 'wpmvc/v1', '/superbrowse/', [
            'methods'   => 'GET',
            'callback'  => [&$this, 'endpoint_browse'],
            'args'      => [
                'q'     => [
                    'required'          =>  true,
                    'sanitize_callback' => 'sanitize_text_field',
                ],
                'types' => [
                    'required'          =>  false,
                    'validate_callback' => function( $param ) {
                        return is_array( $param );
                    },
                    'sanitize_callback' => function( $value ) {
                        return array_map( function( $type ) {
                            return sanitize_text_field( $type );
                        }, $value );
                    },
                ],
                'limit' => [
                    'default'           => 15,
                    'required'          =>  false,
                    'sanitize_callback' => 'absint',
                    'validate_callback' => function( $param ) {
                        return is_numeric( $param );
                    },
                ],
            ],
        ] );
    }
    /**
     * Endpoint: Browse.
     * @since 1.0.8
     */
    public function endpoint_browse( WP_REST_Request $request )
    {
        // Prepare
        $args = [
            'keywords'  => $request->get_param( 'q' ),
            'limit'     => $request->get_param( 'limit' ),
            'types'     => $request->get_param( 'types' ),
            'excluded'  => explode( ',', get_theme_mod( 'superbrowse_excluded', '' ) ),
        ];
        // Cache
        if ( empty( $args['limit'] ) )
            $args['limit'] = 15;
        $cache_key = sprintf(
            'k%s_%s_%d_superbrowse',
            $args['keywords'],
            is_array( $args['types'] )
                ? implode( '.', $args['types'] )
                : 'na',
            $args['limit']
        );
        // Parse types
        if ( is_array( $args['types'] ) ) {
            $available_types = [];
            if ( get_theme_mod( 'superbrowse_post', true ) )
                $available_types[] = 'post';
            if ( get_theme_mod( 'superbrowse_page', true ) )
                $available_types[] = 'page';
            if ( get_theme_mod( 'superbrowse_addon', true ) )
                $available_types[] = 'addon';
            $args['types'] = array_filter( $args['types'], function( $type ) use( &$available_types ) {
                return in_array( $type, $available_types );
            } );
        }
        // Get
        $results = get_theme_mod( 'superbrowse_cache', false )
            ? Cache::remember( $cache_key, get_theme_mod( 'superbrowse_cache_minutes', 120 ), function() use( &$args ) {
                return Superbrowse::browse( $args );
            } )
            : Superbrowse::browse( $args );
        // Response
        $response = new WP_REST_Response( array_map(
            function( $result ) { return $result->toArray(); },
            $results
        ) );
        $response->set_status( 201 );
        return $response;
    }
}