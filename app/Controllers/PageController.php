<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\Cache;
use WPMVCWebsite\Models\Page;
use WPMVC\MVC\Controllers\ModelController as Controller;
/**
 * PageController controller.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
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
     *
     * @param string $view View to render as page.
     *
     * @return view
     */
    public function render( $view = 'pages.default' )
    {
        return $this->view->get($view, [
            'page'  => Page::find(get_the_ID()),
        ]);
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