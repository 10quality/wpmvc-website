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
class ShortcodeController extends Controller
{
    /**
     * Shortcode "docs-section"
     * Ayuco: addition 2016-10-28 07:04 pm
     * @since 1.0.0
     *
     * @param array  $atts    Attributes.
     * @param string $content Shortcode content.
     *
     * @return view
     */
    public function docs_section($atts, $content = '')
    {
        return $this->view->get('shortcodes.docs-section', ['attributes' => shortcode_atts(['id' => 'step' . uniqid(), 'title' => 'Section'], $atts), 'content' => $content]);
    }
    /**
     * Shortcode "code-line"
     * Wordpress hook
     * Ayuco: addition 2016-10-31 12:47 pm
     * @since 1.0.0
     *
     * @param array  $atts    Attributes.
     * @param string $content Shortcode content.
     *
     * @return view
     */
    public function code_line($atts, $content = '')
    {
        return $this->view->get('shortcodes.code-line', ['content' => $content]);
    }
    /**
     * Shortcode "callout"
     * Wordpress hook
     * Ayuco: addition 2016-10-31 02:11 pm
     * @since 1.0.0
     *
     * @param array  $atts    Attributes.
     * @param string $content Shortcode content.
     *
     * @return view
     */
    public function callout($atts, $content = '')
    {
        return $this->view->get('shortcodes.callout', ['attributes' => shortcode_atts(['title' => '', 'icon' => '', 'type' => 'success'], $atts), 'content' => $content]);
    }
}