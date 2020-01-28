<?php
/**
 * Github authentication notice.
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.10
 */
?><div class="notice notice-warning">
    <p><?php _e( '<b>Github</b> authorization is required.', 'wpmvc-website' ) ?></p>
    <p>
        <a href="<?php echo esc_url( $github->authorize_url ) ?>" role="button" class="button button-primary"
        ><?php _e( 'Authorize', 'wpmvc-website' ) ?></a>
    </p>
</div>