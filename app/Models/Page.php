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
        'header_highlight'      => 'meta_header_highlight',
        'header_bold'           => 'meta_header_bold',
        'header_tagline'        => 'meta_header_tagline',
        'cards_title'           => 'meta_cards_title',
        'cards'                 => 'meta_cards',
        'download_url'          => 'meta_download_url',
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
        'title'     => 'Homepage Properties',
        'context'   => 'normal',
        'priority'  => 'default',
    ];
}