<?php
/**
 * Dashboard widget.
 *
 * @author Ale Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.10
 */
?>
<?php if ( ! $github->can_auth ) : ?>
    <p><?php printf( __( 'Not <a href="%s">configured</a>.', 'wpmvc-website' ), admin_url( '/customize.php' ) ) ?></p>
<?php elseif ( ! $github->is_ready ) : ?>
    <p><a href="<?php echo esc_url( $github->authorize_url ) ?>" role="button" class="button button-primary"
        ><?php _e( 'Authorize', 'wpmvc-website' ) ?></a></p>
<?php else : ?>
    <p>
        <table>
            <tbody>
                <tr>
                    <th style="text-align:left"><?php _e( 'Client ID' ) ?></th>
                    <td><code><?php echo $github->client_id ?></code></td>
                </tr>
                <tr>
                    <th style="text-align:left"><?php _e( 'Access token' ) ?></th>
                    <td><?php echo $github->token_type ?></td>
                </tr>
                <?php if ( $github->repo ) : ?>
                    <tr>
                        <th style="text-align:left"><?php _e( 'Repo' ) ?></th>
                        <td><i><?php echo $github->repo ?></i></td>
                    </tr>
                <?php endif ?>
                <?php if ( $release ) : ?>
                    <tr>
                        <th style="text-align:left"><?php _e( 'Latest release' ) ?></th>
                        <td><a href="<?php echo esc_url( $release->html_url ) ?>"><?php echo $release->tag_name ?></a></td>
                    </tr>
                <?php endif ?>
            </tbody>
        </table>
        <hr>
        <strong><?php _e( 'Actions' ) ?></strong>
        <hr>
        <a href="<?php echo esc_url( $github->authorize_url ) ?>" role="button" class="button button-primary"
        ><?php _e( 'Authorize', 'wpmvc-website' ) ?></a>
    </p>
<?php endif ?>