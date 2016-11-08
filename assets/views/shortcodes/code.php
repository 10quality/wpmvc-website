<?php
/**
 * shortcodes.code view.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
<div class="section-block">
    <div class="code-block">
        <?php if ( $title ) : ?>
            <h6><?= $title ?></h6>
        <?php endif ?>
        <pre class="line-numbers language-<?= $code->language ?>">
            <code><?= htmlentities( $code->source ) ?></code>
        </pre>
    </div>
</div>