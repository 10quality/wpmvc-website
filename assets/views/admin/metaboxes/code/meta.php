<?php
/**
 * Post type admin.metaboxes.code.meta meta fields form.
 * Automated metabox.
 * Generated with ayuco.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
<table class="form-table">
    <tr valign="top">
        <th scope="row">Language</th>
        <td>
            <select name="meta_language" class="code-editor-mode-selector">
                <?php foreach ( $model->languages as $key => $value ) : ?>
                    <option value="<?= $key ?>"
                        <?php if ( $key === $model->language ) : ?>selected<?php endif ?>
                    >
                        <?= $value ?>
                    </option>
                <?php endforeach ?>
            </select>
        </td>
    </tr>
    <tr valign="top">
        <th scope="row">Shortcode</th>
        <td>
            [code id="<?= $model->ID ?>"]
        </td>
    </tr>
</table>