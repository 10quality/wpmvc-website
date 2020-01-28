<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\MVC\Controller;
/**
 * Shortcodes controller.
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.3
 */
class ShortcodeController extends Controller
{
    /**
     * [docs-section]
     * @since 1.0.0
     * 
     * @hook docs-section
     *
     * @param array  $atts    Attributes.
     * @param string $content Shortcode content.
     *
     * @return view
     */
    public function docs_section( $atts, $content = '' )
    {
        return $this->view->get( 'shortcodes.docs-section', [ 'attributes' => shortcode_atts( [ 'id' => 'step' . uniqid(), 'title' => 'Section' ], $atts ), 'content' => $content ] );
    }
    /**
     * [code-line]
     * @since 1.0.0
     * 
     * @hook code-line
     *
     * @param array  $atts    Attributes.
     * @param string $content Shortcode content.
     *
     * @return view
     */
    public function code_line( $atts, $content = '' )
    {
        return $this->view->get( 'shortcodes.code-line', [ 'content' => $content ] );
    }
    /**
     * [callout]
     * @since 1.0.0
     * 
     * @hook callout
     *
     * @param array  $atts    Attributes.
     * @param string $content Shortcode content.
     *
     * @return view
     */
    public function callout( $atts, $content = '' )
    {
        return $this->view->get( 'shortcodes.callout', [ 'attributes' => shortcode_atts( [ 'title' => '', 'icon' => '', 'type' => 'success' ], $atts ), 'content' => $content ] );
    }
    /**
     * [youtube]
     * @since 1.0.3
     * 
     * @hook youtube
     *
     * @param array  $atts    Attributes.
     * @param string $content Shortcode content.
     *
     * @return view
     */
    public function youtube( $atts, $content = '' )
    {
        if ( !isset( $atts['video'] ) ) {
            return;
        }
        $ID = $this->get_youtube_id( $atts['video'] );
        if ( $ID ) {
            return $this->view->get( 'shortcodes.youtube', [ 'ID' => $ID ] );
        }
    }
    /**
     * Returns youtube video ID based on given url.
     * @since 1.0.3
     *
     * @param string $url Youtube video url.
     *
     * @return string ID
     */
    private function get_youtube_id( $url )
    {
        parse_str( parse_url( $url, PHP_URL_QUERY ), $vars );
        return isset( $vars['v'] ) ? $vars['v'] : null;
    }
}