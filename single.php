<?php
/**
 * Single template.
 *
 * @package WPMVCWebsite
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.1.0
 */
?>
<?php get_header() ?>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : ?>
        <?php the_post() ?>
        <div class="doc-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-md-8 col-sm-8 col-xs-12">
                        <div class="post-body">
                            <?php get_template_part( 'content', 'single' ) ?>
                        </div>
                    </div><!--.col-->
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <section class="widgets widgets-wrapper">
                            <?php if ( is_active_sidebar( 'wpmvc-single-right' ) ) : ?>
                                <?php dynamic_sidebar( 'wpmvc-single-right' ) ?>
                            <?php else : ?>
                                <?php theme()->view( 'misc.no-widgets' ) ?>
                            <?php endif ?>
                        </section>
                    </div><!--.col-->
                </div><!--.row-->
            </div><!--container-->
        </div><!--doc-wrapper-->
    <?php endwhile ?>
<?php else : ?>
    <?php theme()->view('misc.no-post-found') ?>
<?php endif ?>
<?php get_footer() ?>