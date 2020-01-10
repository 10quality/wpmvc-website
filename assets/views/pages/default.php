<?php
/**
 * Page view.
 * Default template.
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

            <div class="doc-body">
                <div class="row">
                    <div
                        <?php if ( $page->has_sidebar ) : ?>
                            class="col-md-9 col-sm-8"
                        <?php else : ?>
                            class="col-md-12"
                        <?php endif ?>
                    >
                        <?= do_shortcode( $page->post_content ) ?>
                        <?php do_action( 'wpmvc_after_page' ) ?>
                    </div>

                    <?php if ( $page->has_sidebar ) : ?>
                        <div class="col-md-3 col-sm-4">
                            <div class="widgets-wrapper">
                                <?php if ( is_active_sidebar( 'wpmvc-page-right' ) ) : ?>
                                    <?php dynamic_sidebar( 'wpmvc-page-right' ) ?>
                                <?php else : ?>
                                    <?php theme()->view( 'misc.no-widgets' ) ?>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>

        </div>
    </div>

<?php get_footer() ?>