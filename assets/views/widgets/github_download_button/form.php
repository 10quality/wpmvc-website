<?php
/**
 * Github download button widget.
 *
 * @author Ale Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.10
 */
?>
<p>
    <label for="<?php echo $widget->get_field_id( 'label' ) ?>"><?php _e( 'Label' )?></label>
    <input id="<?php echo $widget->get_field_id( 'label' ) ?>"
        name="<?php echo $widget->get_field_name( 'label' ) ?>"
        class="widefat" type="text"
        value="<?php echo esc_attr( $instance['label'] ) ?>"
    />
</p>
<p>
    <label for="<?php echo $widget->get_field_id( 'type' ) ?>"><?php _e( 'Type' )?></label>
    <select id="<?php echo $widget->get_field_id( 'type' ) ?>"
        name="<?php echo $widget->get_field_name( 'type' ) ?>"
        class="widefat"
    >
        <?php foreach ( $types as $option_value => $option_label ) : ?>
            <option value="<?php echo esc_attr( $option_value ) ?>"
                <?php if ( $option_value == $instance['type'] ) : ?>selected<?php endif ?>
                ><?php echo esc_attr( $option_label ) ?></option>
        <?php endforeach ?>
    </select>
</p>
<p>
    <label for="<?php echo $widget->get_field_id( 'color' ) ?>"><?php _e( 'Color' )?></label>
    <select id="<?php echo $widget->get_field_id( 'color' ) ?>"
        name="<?php echo $widget->get_field_name( 'color' ) ?>"
        class="widefat"
    >
        <?php foreach ( $colors as $option_value => $option_label ) : ?>
            <option value="<?php echo esc_attr( $option_value ) ?>"
                <?php if ( $option_value == $instance['color'] ) : ?>selected<?php endif ?>
                ><?php echo esc_attr( $option_label ) ?></option>
        <?php endforeach ?>
    </select>
</p>
<p>
    <label for="<?php echo $widget->get_field_id( 'size' ) ?>"><?php _e( 'Size' )?></label>
    <select id="<?php echo $widget->get_field_id( 'size' ) ?>"
        name="<?php echo $widget->get_field_name( 'size' ) ?>"
        class="widefat"
    >
        <?php foreach ( $sizes as $option_value => $option_label ) : ?>
            <option value="<?php echo esc_attr( $option_value ) ?>"
                <?php if ( $option_value == $instance['size'] ) : ?>selected<?php endif ?>
                ><?php echo esc_attr( $option_label ) ?></option>
        <?php endforeach ?>
    </select>
</p>
<p>
    <label for="<?php echo $widget->get_field_id( 'include_label' ) ?>"><?php _e( 'Include label', 'wpmvc-website' )?>
        <input type="checkbox" id="<?php echo $widget->get_field_id( 'include_label' ) ?>"
            name="<?php echo $widget->get_field_name( 'include_label' ) ?>"
            <?php if ( $instance['include_label'] ) : ?>checked<?php endif ?>
        />
    </label>
</p>
<p>
    <label for="<?php echo $widget->get_field_id( 'include_version' ) ?>"><?php _e( 'Include version', 'wpmvc-website' )?>
        <input type="checkbox" id="<?php echo $widget->get_field_id( 'include_version' ) ?>"
            name="<?php echo $widget->get_field_name( 'include_version' ) ?>"
            <?php if ( $instance['include_version'] ) : ?>checked<?php endif ?>
        />
    </label>
</p>
<p>
    <label for="<?php echo $widget->get_field_id( 'include_type' ) ?>"><?php _e( 'Include file type', 'wpmvc-website' )?>
        <input type="checkbox" id="<?php echo $widget->get_field_id( 'include_type' ) ?>"
            name="<?php echo $widget->get_field_name( 'include_type' ) ?>"
            <?php if ( $instance['include_type'] ) : ?>checked<?php endif ?>
        />
    </label>
</p>
<p>
    <label for="<?php echo $widget->get_field_id( 'include_wrapper' ) ?>"><?php _e( 'Include widget wrapper', 'wpmvc-website' )?>
        <input type="checkbox" id="<?php echo $widget->get_field_id( 'include_wrapper' ) ?>"
            name="<?php echo $widget->get_field_name( 'include_wrapper' ) ?>"
            <?php if ( $instance['include_wrapper'] ) : ?>checked<?php endif ?>
        />
    </label>
</p>