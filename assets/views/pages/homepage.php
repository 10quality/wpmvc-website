<?php
/**
 * Page view.
 * Homepage template.
 *
 * @package WPMVCWebsite
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
<?php get_header() ?>
<header class="header text-center">
    <div class="container">
        <div class="branding">
            <h1 class="logo">
                <span aria-hidden="true" class="icon_documents_alt icon"></span>
                <span class="text-highlight"><?= $page->header_highlight ?></span><span class="text-bold"><?= $page->header_bold ?></span>
            </h1>
        </div><!--//branding-->
        <div class="tagline">
            <?= $page->header_tagline ?>
        </div><!--//tagline-->
    </div><!--//container-->
</header><!--//header-->

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section class="cards-section text-center">
        <div class="container">
            <h2 class="title"><?= $page->cards_title ?></h2>
            <div class="intro">
                <?php the_content() ?>
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
            <?php if ( $page->carts && count( $page->carts ) > 1) : ?>
                <div id="cards-wrapper" class="cards-wrapper row">
                    <?php foreach ( $page->carts as $cart ) : ?>
                        <div class="item item-<?= $cart['color'] ?> col-md-4 col-sm-6 col-xs-6">
                            <div class="item-inner">
                                <div class="icon-holder">
                                    <i class="icon fa <?= $cart['icon'] ?>"></i>
                                </div><!--//icon-holder-->
                                <h3 class="title"><?= $cart['title'] ?></h3>
                                <p class="intro"><?= $cart['intro'] ?></p>
                                <a class="link" href="<?= $cart['url'] ?>"><span></span></a>
                            </div><!--//item-inner-->
                        </div><!--//item-->
                    <?php endforeach ?>
                </div><!--//cards-->
            <?php endif ?>
            
        </div><!--//container-->
    </section><!--//cards-section-->
    <?php endwhile ?>
<?php endif ?>

<?php get_footer() ?>