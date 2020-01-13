<?php
/**
 * Github download button widget.
 *
 * @author Ale Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.10
 */
?><a href="<?php echo esc_url( $type === 'zipball' ? $release->zipball_url : $release->tarball_url ) ?>"
    class="btn <?php echo esc_attr( $color ) ?> <?php echo esc_attr( $size ) ?>"
>
    <?php if ( $label && $include_label ) : ?><span class="release-label"><?php echo esc_attr( $label ) ?></span><?php endif ?>
    <?php if ( $include_version ) : ?><span class="release-version"><?php echo esc_attr( $release->tag_name ) ?></span><?php endif ?>
    <?php if ( $include_type ) : ?><span class="release-file-type">(<?php echo $type === 'zipball' ? 'zip' : 'tar.gz' ?>)</span><?php endif ?>
</a>