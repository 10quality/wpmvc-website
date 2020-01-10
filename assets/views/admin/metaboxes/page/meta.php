<?php
/**
 * Post type admin.metaboxes.product.meta meta fields form.
 * Automated metabox.
 * Generated with ayuco.
 *
 * @author Ale Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.7
 */
?>
<table class="form-table">

    <tr valign="top">
        <th scope="row">Theme color</th>
        <td>
            <select name="meta_theme_color">
                <?php foreach ( $model->colors as $key => $value ) : ?>
                    <option value="<?= $key ?>" <?php if ( $model->theme_color === $key ) : ?>selected<?php endif ?>>
                        <?= $value ?>
                    </option>
                <?php endforeach ?>
            </select>
        </td>
    </tr>

    <tr valign="top">
        <th scope="row">Icon</th>
        <td>
            <input type="text"
                name="meta_icon"
                value="<?php echo $model->meta_icon ?>"
            />
        </td>
    </tr>

</table>

<div id="meta_section_page"
    class="page-template-section"
    data-template="default"
>
    <table class="form-table">

        <tr valign="top">
            <th scope="row">Sidebar</th>
            <td>
                <input type="checkbox"
                    name="meta_sidebar"
                    <?php if ( $model->has_sidebar ) : ?>checked<?php endif ?>
                    value="1"
                />
                <span class="description">
                    Include right sidebar.
                </span>
            </td>
        </tr>

    </table>
</div>