<?php

namespace WPMVCWebsite\Models;

use TenQuality\Data\Model;
use TenQuality\WP\Database\QueryBuilder;
use WPMVC\MVC\Models\Common\Attachment;

/**
 * Superbrowse data model.
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.8
 */
class Superbrowse extends Model
{
    /**
     * Attachment model.
     * @since 1.0.8
     * 
     * @var array|null
     */
    protected $_attachment = null;
    /**
     * Browse result properties.
     * @since 1.0.8
     * 
     * @var array
     */
    protected $properties = [
        // Attributes
        'object_id',
        'data_source',
        'type',
        'title',
        'description',
        // Aliases
        'url',
        'attachment',
    ];
    /**
     * Method for alias property `url`.
     * Returns `url` property.
     * @since 1.0.8
     * 
     * @return string
     */
    protected function getUrlAlias()
    {
        switch ( $this->data_source ) {
            case 'posts':
                return get_permalink( $this->object_id );
        }
        return null;
    }
    /**
     * Method for alias property `attachment`.
     * Returns `attachment` property.
     * @since 1.0.8
     * 
     * @return array
     */
    protected function getAttachmentAlias()
    {
        if ( $this->attachment_id ) {
            if ( ! isset( $this->_attachment ) ) {
                $this->_attachment = Attachment::find( $this->attachment_id );
                $this->_attachment = $this->_attachment->to_array();
            }
            return $this->_attachment;
        }
        return null;
    }
    /**
     * Returns initialized Query Builder with theme settings and base data tables applied.
     * @since 1.0.8
     * 
     * @return \TenQuality\WP\Database\QueryBuilder
     */
    public static function browse_builder()
    {
        $builder = QueryBuilder::create( 'wpmvc_superbrowse' )
            ->select( 'posts.ID as `object_id`' )
            ->select( '\'posts\' as `data_source`' )
            ->select( 'posts.post_title as `title`' )
            ->select( 'posts.post_excerpt as `description`' )
            ->select( 'posts.post_type as `type`' )
            ->select( 'attachment.meta_value as `attachment_id`' )
            ->select(
                'CASE WHEN posts.post_type = \'page\' THEN 0'
                    . ' WHEN posts.post_type = \'addon\' THEN 1'
                    . ' WHEN posts.post_type = \'post\' THEN 2'
                    . ' ELSE 3 END as `priority`'
            )
            ->from( 'posts as `posts`' )
            ->join( 'postmeta as `attachment`', [
                [
                    'key_a' => 'posts.ID',
                    'key_b' => 'attachment.post_id',
                ],
                [
                    'key'   => 'attachment.meta_key',
                    'value' => '_thumbnail_id',
                ],
            ], true )
            ->where( [
                'posts.post_status' => 'publish',
            ] )
            ->order_by( 'priority' )
            ->order_by( 'posts.ID', 'DESC' );
        return $builder;
    }
    /**
     * Returns browse results.
     * @since 1.0.8
     * 
     * @param array $args Browse arguments
     * 
     * @return array
     */
    public static function browse( $args, &$count = null )
    {
        $builder = static::browse_builder();
        // Keywords
        if ( array_key_exists( 'keywords', $args ) )
            $builder->keywords( $args['keywords'], ['posts.post_title', 'posts.post_content'] );
        // Set post types
        if ( array_key_exists( 'types', $args ) && is_array( $args['types'] ) )
            $builder->where( [ 'posts.post_type' => [
                'operator'  => 'IN',
                'value'     => $args['types'],
            ] ] );
        // Exclusions
        if ( array_key_exists( 'excluded', $args ) && is_array( $args['excluded'] ) )
            $builder->where( [ 'posts.ID' => [
                'operator'  => 'NOT IN',
                'value'     => $args['excluded'],
            ] ] );
        // Set limit
        $builder->limit( array_key_exists( 'limit', $args ) ? $args['limit'] : 15 );
        // Get
        $results = $builder->get( ARRAY_A, function( $data ) {
            return new self( $data );
        }, true );
        $count = $builder->rows_found();
        return $results;
    }
}