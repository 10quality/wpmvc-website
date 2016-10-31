<?php
/**
 * Code editor view.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
<div class="code-editor">
    <div style="display:none">
        <textarea id="code-editor-listener" name="code_source"><?= htmlentities( $code->source ) ?></textarea>
    </div>
    <div id="code-editor"
        data-language="<?= $code->language ? $code->language : 'php' ?>"
        data-listener="#code-editor-listener"
        style="width:100%;height:500px;font-size:14px;"
    ></div>
</div>