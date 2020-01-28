<?php
/**
 * Template Name: Builder
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.1.0
 */
?>
<?php get_header() ?>
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="doc-wrapper page-builder">
        <div class="doc-body">
            <?php the_content() ?>
            <?php do_action( 'wpmvc_after_page' ) ?>
        </div><!--doc-body-->
    </div><!--doc-wrapper-->
    <?php endwhile; ?><?php endif; ?>
<?php get_footer() ?>