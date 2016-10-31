<?php
/**
 * shortcodes.callout view.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
<div class="callout-block callout-<?= $attributes['type'] ?>">
    <?php if ( $attributes['icon'] ) : ?>
        <div class="icon-holder">
            <i class="fa <?= $attributes['icon'] ?>"></i>
        </div>
    <?php endif ?>
    <div class="content">
        <?php if ( $attributes['title'] ) : ?>
            <h4 class="callout-title"><?= $attributes['title'] ?></h4>
        <?php endif ?>
        <?= do_shortcode( $content ) ?>
    </div>
</div>