<?php
/**
 * Post type admin.metaboxes.product.meta meta fields form.
 * Automated metabox.
 * Generated with ayuco.
 *
 * @author fill
 * @version fill
 */
?>
<h3>General</h3>
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

</table>

<h3>Homepage</h3>

<h4>Download button</h4>
<table class="form-table">

    <tr valign="top">
        <th scope="row">Url</th>
        <td>
            <input type="text"
                name="meta_download_url"
                class="regular-text"
                value="<?php echo $model->download_url ?>"
            />
        </td>
    </tr>

</table>

<h4>Header</h4>
<table class="form-table">

    <tr valign="top">
        <th scope="row">Highlight</th>
        <td>
            <input type="text"
                name="meta_header_highlight"
                class="regular-text"
                value="<?php echo $model->header_highlight ?>"
            />
        </td>
    </tr>

    <tr valign="top">
        <th scope="row">Bold</th>
        <td>
            <input type="text"
                name="meta_header_bold"
                class="regular-text"
                value="<?php echo $model->header_bold ?>"
            />
        </td>
    </tr>

    <tr valign="top">
        <th scope="row">Tagline</th>
        <td>
            <?php wp_editor( $model->header_tagline, 'header-tagline', [
                'textarea_name' => 'meta_header_tagline',
                'wpautop'       => false,
            ] ) ?>
        </td>
    </tr>

</table>

<h4>Cards</h4>
<table class="form-table">

    <tr valign="top">
        <th scope="row">Tile</th>
        <td>
            <input type="text"
                name="meta_cards_title"
                class="regular-text"
                value="<?php echo $model->cards_title ?>"
            />
        </td>
    </tr>

</table>

<hr>

<h3>Page</h3>
<table class="form-table">

    <tr valign="top">
        <th scope="row">Icon</th>
        <td>
            <input type="text"
                name="meta_icon"
                value="<?php echo $model->meta_icon ?>"
            />
        </td>
    </tr>

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