<?php
/**
 * Template Name: Homepage Builder
 *
 * @author Ale Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.7
 */
?>
<?php get_header( 'homepage' ) ?>

<header class="header text-center">
    <div class="container">
        <div class="branding">
            <h1 class="logo">
                <span aria-hidden="true" class="icon_documents_alt icon"></span>
                <span class="text-highlight"><?= get_theme_mod( 'title_highlight' ) ?></span><span class="text-bold"><?= get_theme_mod( 'title_bold' ) ?></span>
            </h1>
        </div><!--//branding-->
        <div class="tagline">
            <?= get_bloginfo( 'description' ) ?>
        </div><!--//tagline-->
    </div><!--//container-->
</header><!--//header-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <div class="builder-wrapper">
        <?php the_content() ?>
        <?php do_action( 'wpmvc_after_page' ) ?>
    </div>

<?php endwhile; ?><?php endif; ?>

<?php get_footer() ?>