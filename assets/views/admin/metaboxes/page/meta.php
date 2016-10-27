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
<h3>Download button</h3>
<table class="form-table">

    <tr valign="top">
        <th scope="row">Url</th>
        <td>
            <input type="text"
                name="meta_download_url"
                value="<?php echo $model->download_url ?>"
            />
        </td>
    </tr>

</table>

<h3>Header</h3>
<table class="form-table">

    <tr valign="top">
        <th scope="row">Highlight</th>
        <td>
            <input type="text"
                name="meta_header_highlight"
                value="<?php echo $model->header_highlight ?>"
            />
        </td>
    </tr>

    <tr valign="top">
        <th scope="row">Bold</th>
        <td>
            <input type="text"
                name="meta_header_bold"
                value="<?php echo $model->header_bold ?>"
            />
        </td>
    </tr>

    <tr valign="top">
        <th scope="row">Tagline</th>
        <td>
            <?php wp_editor( $model->header_tagline, 'header-tagline', [
                'textarea_name' => 'meta_header_tagline',
            ] ) ?>
        </td>
    </tr>

</table>

<h3>Cards</h3>
<table class="form-table">

    <tr valign="top">
        <th scope="row">Tile</th>
        <td>
            <input type="text"
                name="meta_cards_title"
                value="<?php echo $model->cards_title ?>"
            />
        </td>
    </tr>

</table>