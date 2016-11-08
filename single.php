<?php
/**
 * Single template.
 *
 * @package WPMVCWebsite
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
<?php get_header() ?>

<?php if ( have_posts() ) : ?>

    <?php while ( have_posts() ) : ?>

        <?php the_post() ?>
        <div class="doc-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <div class="post-body">
                            <?php theme()->view('posts.article') ?>
                        </div>
                    </div><!--.col-->
                    <div class="col-md-3 col-sm-4">
                        <div class="widgets-wrapper">
                            <?php if ( is_active_sidebar( 'wpmvc-post-right' ) ) : ?>
                                <?php dynamic_sidebar( 'wpmvc-post-right' ) ?>
                            <?php else : ?>
                                <?php theme()->view( 'misc.no-widgets' ) ?>
                            <?php endif ?>
                        </div>
                    </div><!--.col-->
                </div><!--.row-->
            </div>
        </div>

    <?php endwhile ?>

<?php else : ?>
    <?php theme()->view('misc.no-post-found') ?>
<?php endif ?>

<?php get_footer() ?>