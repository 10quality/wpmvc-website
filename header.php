<?php
/**
 * Site's header file.
 * Wordpress template.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->  
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->  
<!--[if !IE]><!--><html <?php language_attributes() ?>><!--<![endif]-->  
<head>
    <title><?php wp_title(); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif; ?>
    <?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
    <div class="page-wrapper">
        <?php if ( !is_front_page() ) : ?>
            <header id="header" class="header">
                <div class="container">
                    <div class="branding">
                        <h1 class="logo">
                            <a href="<?php echo home_url( '/' ) ?>" title="<?php echo bloginfo( 'title' ) ?>">
                                <span aria-hidden="true" class="icon_documents_alt icon"></span>
                                <span class="text-highlight"><?php the_theme_setting( 'title_highlight' ) ?></span><span class="text-bold"><?php the_theme_setting( 'title_bold' ) ?></span>
                            </a>
                        </h1>
                    </div><!--//branding-->
                    <?php wp_nav_menu( [
                        'menu'          => 'header-menu',
                        'menu_class'    => 'breadcrumb',
                        'items_wrap'    => '<ol id="%1$s" class="%2$s">%3$s</ol>',
                    ] ) ?>
                </div><!--//container-->
            </header><!--//header-->
        <?php endif ?>
        <div id="site-body">