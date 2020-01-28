<?php
/**
 * Index template.
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.1.0
 */
?>
<?php get_header() ?>
<div class="doc-wrapper">
    <div class="container">
        <div id="doc-header" class="doc-header text-center">
            <h1 class="doc-title">
                <?php if ( get_page_icon() ) : ?>
                    <span><i class="fa <?php echo esc_attr( get_page_icon() ) ?>"></i> </span>
                <?php endif ?>
                <span><?php echo apply_filters( 'wpmvc_index_title', get_the_title() ) ?></span>
            </h1>
        </div><!--//doc-header-->
        <div class="doc-body">
            <div class="row">
                <div class="col-md-9 col-md-8 col-sm-8 col-xs-12">
                    <?php if ( have_posts() ) : ?>
                    <?php do_action( 'wpmvc_after_page' ) ?>
                        <section class="posts loop">
                            <?php while ( have_posts() ) : ?>
                                <?php the_post() ?>
                                <?php get_template_part( 'content', 'loop' ) ?>
                            <?php endwhile ?>
                        </section>
                    <?php endif ?>
                    <section class="pagination">
                        <?php posts_nav_link() ?>
                    </section>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <section class="widgets widgets-wrapper">
                        <?php if ( is_active_sidebar( 'wpmvc-index-right' ) ) : ?>
                            <?php dynamic_sidebar( 'wpmvc-index-right' ) ?>
                        <?php else : ?>
                            <?php theme()->view( 'misc.no-widgets' ) ?>
                        <?php endif ?>
                    </section>
                </div>
            </div>
        </div><!--.doc-body-->
    </div><!--.container-->
</div><!--.doc-wrapper-->
<?php get_footer() ?>