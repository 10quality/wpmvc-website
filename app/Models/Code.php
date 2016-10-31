<?php

namespace WPMVCWebsite\Models;

use WPMVC\MVC\Traits\FindTrait;
use WPMVC\MVC\Models\PostModel as Model;
/**
 * Code model.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
class Code extends Model
{
    use FindTrait;
    /**
     * Property type.
     * Ayuco: addition 2016-10-31 09:44 am
     * @since 1.0.0
     *
     * @var string
     */
    protected $type = 'code';
    /**
     * Property aliases.
     * Ayuco: addition 2016-10-31 09:44 am
     * @since 1.0.0
     *
     * @var array
     */
    protected $aliases = [
        'source'        => 'post_content',
        'language'      => 'meta_language',
    ];
    /**
     * Property registry_controller.
     * Ayuco: addition 2016-10-31 09:44 am
     * @since 1.0.0
     *
     * @var string
     */
    protected $registry_controller = 'CodeController';
    /**
     * Property registry_metabox.
     * Ayuco: addition 2016-10-31 09:44 am
     * @since 1.0.0
     *
     * @var array
     */
    protected $registry_metabox = [
        'title'     => 'Properties',
        'context'   => 'normal',
        'priority'  => 'high'
    ];
    /**
     * Registry supports.
     * @since 1.0.0
     * @var array
     */
    protected $registry_supports = [
        'title',
    ];
}