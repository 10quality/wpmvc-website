<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\MVC\Controller;
/**
 * ShortController controller.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
class ShortController extends Controller
{
    /**
     * Shortcode "docs-section"
     * Ayuco: addition 2016-10-28 07:04 pm
     * @since 1.0.0
     *
     * @return view
     */
    public function docs_section($atts, $content = '')
    {
        return $this->view->get('shortcodes.docs-section', [
            'attributes'    => shortcode_atts( [
                                'id'        => 'step'.uniqid(),
                                'title'     => 'Section',
                                // ...etc
                            ], $atts ),
            'content'       => $content,
        ]);
    }
}