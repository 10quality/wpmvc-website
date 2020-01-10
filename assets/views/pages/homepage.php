<?php
/**
 * Page view.
 * Homepage template.
 *
 * @package WPMVCWebsite
 * @author Alejandro Mostajo <info@10quality.com>
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
    <section class="cards-section text-center">
        <div class="container">
            <h2 class="title"><?= $page->cards_title ?></h2>
            <div class="intro">
                <?= $page->content ?>
                <?php if ( $page->download_url ) : ?>
                    <div class="cta-container">
                        <a class="btn btn-primary btn-cta"
                            href="<?= $page->download_url ?>"
                            target="_blank"
                        >
                            <i class="fa fa-cloud-download"></i> <?php _e( 'Download Now', 'wpmvc' ) ?>
                        </a>
                    </div><!--//cta-container-->
                <?php endif ?>
            </div><!--//intro-->
            <?php if ( $page->cards && count( $page->cards ) > 0) : ?>
                <div id="cards-wrapper" class="cards-wrapper row">
                    <?php foreach ( $page->cards as $card ) : ?>
                        <div class="item item-<?= $card->color ?> col-md-4 col-sm-6 col-xs-6">
                            <div class="item-inner">
                                <div class="icon-holder">
                                    <i class="icon fa <?= $card->icon ?>"></i>
                                </div><!--//icon-holder-->
                                <h3 class="title"><?= $card->title ?></h3>
                                <p class="intro"><?= $card->description ?></p>
                                <a class="link" href="<?= $card->url ?>"><span></span></a>
                            </div><!--//item-inner-->
                        </div><!--//item-->
                    <?php endforeach ?>
                </div><!--//cards-->
            <?php endif ?>
            
        </div><!--//container-->
    </section><!--//cards-section-->
    <?php endwhile ?>
<?php endif ?>

<?php do_action( 'wpmvc_after_homepage' ) ?>

<?php get_footer() ?>