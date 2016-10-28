<?php

namespace WPMVCWebsite\Controllers;

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
    }
}