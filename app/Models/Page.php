<?php

namespace WPMVCWebsite\Models;

use WPMVC\MVC\Traits\FindTrait;
use WPMVC\MVC\Models\PostModel as Model;

/**
 * Page model.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
class Page extends Model
{
    use FindTrait;

    /**
     * Post type.
     * @since 1.0.0
     * @var string
     */
    protected $type = 'page';

    /**
     * Models aliases.
     * @since 1.0.0
     * @var array
     */
    protected $aliases = [
        'title'                 => 'post_title',
        'date'                  => 'post_date',
        'modified'              => 'post_modified',
        'header_highlight'      => 'meta_header_highlight',
        'header_bold'           => 'meta_header_bold',
        'header_tagline'        => 'meta_header_tagline',
        'cards_title'           => 'meta_cards_title',
        'cards'                 => 'meta_cards',
        'download_url'          => 'meta_download_url',
        'icon'                  => 'meta_icon',
        'sidebar'               => 'meta_sidebar',
        'theme_color'           => 'meta_theme_color',
        'has_sidebar'           => 'func_has_sidebar',
        'formatted_date'        => 'func_get_date',
        'formatted_modified'    => 'func_get_modified',
    ];

    /**
     * Model regitry.
     * @since 1.0.0
     * @var array
     */
    protected $registry = [];

    /**
     * Model regitry.
     * @since 1.0.0
     * @var array
     */
    protected $registry_controller = 'PageController';

    /**
     * Model metabox.
     * @since 1.0.0
     * @var array
     */
    protected $registry_metabox = [
        'title'     => 'PrettyDocs Properties',
        'context'   => 'normal',
        'priority'  => 'default',
    ];

    /**
     * Returns formatted post date.
     * @since 1.0.0
     *
     * @return string
     */
    public function get_date()
    {
        return date( get_option( 'date_format' ), strtotime( $this->date ));
    }

    /**
     * Returns formatted post last update date.
     * @since 1.0.0
     *
     * @return string
     */
    public function get_modified()
    {
        return date( get_option( 'date_format' ), strtotime( $this->modified ));
    }

    /**
     * Return flag indicating if page has sidebar or not.
     * @since 1.0.0
     *
     * @return bool
     */
    public function has_sidebar()
    {
        return $this->sidebar && $this->sidebar == 1;
    }
}