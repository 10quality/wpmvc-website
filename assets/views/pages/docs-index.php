<?php
/**
 * Page view.
 * Documentation index template.
 *
 * @package WPMVCWebsite
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.8
 */
?>
<?php get_header() ?>

    <div class="doc-wrapper">
        <div class="container">

            <div id="doc-header" class="doc-header text-center">
                <h1 class="doc-title">
                    <span><i class="fa <?= $page->icon ?>"></i> </span>
                    <span><?= $page->post_title ?></span>
                </h1>
                <div class="meta">
                    <span><i class="fa fa-clock-o"></i> </span>
                    <span><?php _e( 'Last updated:', 'wpmvc' ) ?> </span>
                    <span><?= $page->formatted_modified ?></span>
                </div>
            </div><!--//doc-header-->

            <div class="doc-body docs-index">
                <div class="nav">
                    <?php wp_nav_menu( [
                        'theme_location'    => 'docs-menu',
                        'menu_class'        => 'nav',
                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ] ) ?>
                </div>
                <?= do_shortcode( $page->post_content ) ?>
                <?php do_action( 'wpmvc_after_page' ) ?>
            </div>

        </div>
    </div>

<?php get_footer() ?>