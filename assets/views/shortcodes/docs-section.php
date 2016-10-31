<?php
/**
 * shortcodes.docs-section view.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
<div id="<?= $attributes['id'] ?>" class="doc-section">
    <h3 class="block-title"><?= $attributes['title'] ?></h3>
    <?= do_shortcode( $content ) ?>
</div>