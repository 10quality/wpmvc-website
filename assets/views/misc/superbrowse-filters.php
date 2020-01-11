<?php
/**
 * Superbrowse filters.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.8
 */
?><div class="superbrowse-filter">
    <span class="filter-label"><?php _e( 'Search in:', 'wpmvc-website' ) ?></span>
    <?php foreach ( apply_filters( 'wpmvc_superbrowse_types', [] ) as $type => $label ) : ?>
        <div class="filter-option">
            <label class="filter-checkbox"><?php echo esc_attr( $label ) ?>
                <input type="checkbox" name="types[]" value="<?php echo esc_attr( $type ) ?>" checked="checked"/>
                <span class="checkmark"></span>
            </label>
        </div>
    <?php endforeach ?>
</div>