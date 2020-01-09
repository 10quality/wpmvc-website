<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\Request;
use WPMVC\Cache;
use WPMVCWebsite\Models\Page;
use WPMVC\MVC\Controllers\ModelController as Controller;
/**
 * PageController controller.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.3
 */
class PageController extends Controller
{
    /**
     * Model to controll.
     * @since 1.0.0
     * @var string
     */
    protected $model = 'WPMVCWebsite\\Models\\Page';
    /**
     * Renderes the homepage view.
     * Ayuco: addition 2016-10-26 11:37 pm
     * @since 1.0.0
     * @since 1.0.3 Adds $params parameter.
     *
     * @param string $view   View to render as page.
     * @param array  $params View parameters.
     *
     * @return view
     */
    public function render( $view = 'pages.default', $params = [] )
    {
        return $this->view->get($view, array_merge([
            'page'  => Page::find(get_the_ID()),
        ], $params));
    }

    /**
     * Triggers on save event to clean wp_editor input.
     * @since 1.0.0
     *
     * @param Page $model Page model.
     */
    public function on_save( &$page )
    {
        $page->header_tagline = str_replace( "\r\n", '', $page->header_tagline );
        // Get cards
        $cards = [];
        $icons = Request::input('meta_card_icons', []);
        $titles = Request::input('meta_card_titles', []);
        $colors = Request::input('meta_card_colors', []);
        $urls = Request::input('meta_card_urls', []);
        $descriptions = Request::input('meta_card_descriptions', []);
        foreach ( Request::input('meta_cards', []) as $index ) {
            $cards[] = [
                'icon'  => isset( $icons[$index] ) ? $icons[$index] : '',
                'title' => isset( $titles[$index] ) ? $titles[$index] : '',
                'color' => isset( $colors[$index] ) ? $colors[$index] : '',
                'url'   => isset( $urls[$index] ) ? $urls[$index] : '#',
                'description' => isset( $descriptions[$index] ) ? $descriptions[$index] : '',
            ];
        }
        $page->cards = $cards;
        // Clear cache
        Cache::forget( 'p'.$page->ID.'_color' );
    }

    /**
     * Triggers on metabox event to add custom theme color values.
     * @since 1.0.0
     *
     * @param Page $model Page model.
     */
    public function on_metabox( &$page )
    {
        $page->colors = [
            'body-blue'     => 'Blue',
            ''              => 'Cyan',
            'body-green'    => 'Green',
            'body-orange'   => 'Orange',
            'body-pink'     => 'Pink',
            'body-purple'   => 'Purple',
            'body-red'      => 'Red',
        ];
        $page->card_colors = [
            'blue'          => 'Blue',
            'primary'       => 'Cyan',
            'green'         => 'Green',
            'orange'        => 'Orange',
            'pink'          => 'Pink',
            'purple'        => 'Purple',
            'red'           => 'Red',
        ];
    }

    /**
     * Returns the theme color selected for a especific page.
     * @since 1.0.0
     *
     * @param int $ID Page ID.
     *
     * @return string
     */
    public function get_color( $ID = null )
    {
        if ( empty( $ID ) )
            $ID = get_the_ID();
        return Cache::remember(
            'p'.$ID.'_color',
            60, // Hourly
            function() use( &$ID ) {
                $page = Page::find( $ID );
                return $page->theme_color ? $page->theme_color : '';
            }
        );
    }
}