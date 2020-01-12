<?php
/**
 * Template Name: Homepage Builder
 *
 * @author Ale Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.8
 */
?>
<?php get_header( 'homepage' ) ?>

<header class="header text-center">
    <div class="container">
        <div class="branding">
            <h1 class="logo">
                <?php if ( has_homepage_logo() ) : ?>
                    <span aria-hidden="true" class="icon_documents_alt icon">
                        <img src="<?php echo esc_url( get_homepage_logo_url() ) ?>" alt="logo"/>
                    </span>
                <?php endif ?>
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