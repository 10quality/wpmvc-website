<?php

namespace WPMVCWebsite\Controllers;

use WPMVC\Request;
use WPMVCWebsite\Models\Code;
use WPMVC\MVC\Controllers\ModelController as Controller;
/**
 * CodeController controller.
 * Generated with ayuco.
 *
 * @author fill
 * @version fill
 */
class CodeController extends Controller
{
    /**
     * Property model.
     * Ayuco: addition 2016-10-31 09:44 am
     * @since fill
     *
     * @var string
     */
    protected $model = 'WPMVCWebsite\\Models\\Code';
    /**
     * Triggers on metabox event to add custom theme color values.
     * @since 1.0.0
     *
     * @param Code $code Code model.
     */
    public function on_metabox(&$code)
    {
        $code->languages = ['css' => 'Css', 'html' => 'Html', 'javascript' => 'JavaScript', 'php' => 'Php'];
        if (!$code->language) {
            $code->language = 'php';
        }
    }
    /**
     * Ayuco: addition 2016-10-31 10:07 am
     * @since 1.0.0
     *
     * @param Post $post Wordpress post.
     */
    public function editor_metabox($post)
    {
        return $this->view->get('admin.metaboxes.code.editor', ['code' => Code::find($post->ID)]);
    }
    /**
     * Triggers on save event to clean wp_editor input.
     * @since 1.0.0
     *
     * @param Code $code Code model.
     */
    public function on_save(&$code)
    {
        $code->source = urldecode(Request::input('code_source', ''));
    }
    /**
     * Shortcode "code"
     * Wordpress hook
     * Ayuco: addition 2016-10-31 11:54 am
     * @since 1.0.0
     *
     * @param array $atts Attributes.
     *
     * @return view
     */
    public function shortcode($atts)
    {
        $atts = shortcode_atts( [
            'id'        => 0,
            'title'     => 'Code',
            // ...etc
        ], $atts );
        return $this->view->get('shortcodes.code', [
            'code'          => Code::find($atts['id']),
            'title'         => $atts['title'],
        ]);
    }
}