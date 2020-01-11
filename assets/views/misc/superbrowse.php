<?php
/**
 * Superbrowse.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.8
 */
?><section id="superbrowse" style="display:none">
    <div role="form" class="search-form">
        <form class="superbrowse-form">
            <input type="search" name="q" class="search-input" placeholder="<?php _e( 'Search [press Enter]...', 'wpmvc-website' ) ?>"/>
            <div class="superbrowse-filters">
                <?php do_action( 'wpmvc_superbrowse_filters' ) ?>
            </div>
        </form>
        <button role="close" class="superbrowse-close"><i class="fa fa-window-close" aria-hidden="true"></i></button>
    </div>
    <div role="loader" class="search-loader" style="display:none"><i class="fa fa-circle-o-notch fa-spin"></i></div>
    <div role="results" class="search-results" style="display:none"></div>
</section>
<script class="superbrowse-template" role="result" type="text/template">
    <a class="result result-item">
        <div class="result-attachment" data-property="attachment"></div>
        <div class="result-details">
            <h4 class="result-title" data-property="title"></h4>
            <div class="result-description" data-property="description"></div>
        </div>
    </a>
</script>
<?php if ( get_theme_mod( 'superbrowse_post', true ) ) : ?>
    <script class="superbrowse-template" role="heading-post" type="text/template">
        <h3 class="result result-heading"><?php echo get_theme_mod( 'superbrowse_post_name', __( 'Posts' ) ) ?></h3>
    </script>
<?php endif ?>
<?php if ( get_theme_mod( 'superbrowse_page', true ) ) : ?>
    <script class="superbrowse-template" role="heading-page" type="text/template">
        <h3 class="result result-heading"><?php echo get_theme_mod( 'superbrowse_page_name', __( 'Pages' ) ) ?></h3>
    </script>
<?php endif ?>
<?php if ( get_theme_mod( 'superbrowse_adon', true ) ) : ?>
    <script class="superbrowse-template" role="heading-addon" type="text/template">
        <h3 class="result result-heading"><?php echo get_theme_mod( 'superbrowse_addon_name', __( 'Add-ons' ) ) ?></h3>
    </script>
<?php endif ?>
<script class="superbrowse-template" role="noresults" type="text/template">
    <div class="no-results"><?php _e( 'No results found.', 'wpmvc-website' ) ?></div>
</script>