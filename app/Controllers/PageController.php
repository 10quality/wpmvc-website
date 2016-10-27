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
     */
    public function renderHomepage()
    {
        return $this->view->get('pages.homepage', [
            'page'  => Page::find(get_the_ID()),
        ]);
    }
}