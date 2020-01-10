<?php
/**
 * Template Name: Builder
 *
 * @author Ale Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.7
 */
?>
<?php get_header() ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="doc-wrapper">
        <div class="container">

            <div id="doc-header" class="doc-header text-center">
                <h1 class="doc-title">
                    <span><i class="fa <?= get_page_icon() ?>"></i> </span>
                    <span><?php the_title() ?></span>
                </h1>
                <div class="meta">
                    <span><i class="fa fa-clock-o"></i> </span>
                    <span><?php _e( 'Last updated:', 'wpmvc' ) ?> </span>
                    <span><?= get_page_formatted_modified() ?></span>
                </div>
            </div><!--//doc-header-->

            <div class="doc-body">
                <div class="row">
                    <div
                        <?php if ( get_page_has_sidebar() ) : ?>
                            class="col-md-9 col-sm-8"
                        <?php else : ?>
                            class="col-md-12"
                        <?php endif ?>
                    >
                        <?php the_content() ?>
                        <?php do_action( 'wpmvc_after_page' ) ?>
                    </div>

                    <?php if ( get_page_has_sidebar() ) : ?>
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

    <?php endwhile; ?><?php endif; ?>

<?php get_footer() ?>