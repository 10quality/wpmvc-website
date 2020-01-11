<?php
/**
 * Site's header file.
 * Wordpress template.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.8
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
        <?php if ( ! is_front_page() ) : ?>
            <header id="header" class="header">
                <div class="container">
                    <div class="nav-flex">
                        <div class="nav-section">
                            <div class="branding">
                                <h1 class="logo">
                                    <a href="<?php echo home_url( '/' ) ?>" title="<?php echo bloginfo( 'title' ) ?>">
                                        <span aria-hidden="true" class="icon_documents_alt icon"></span>
                                        <span class="text-highlight"><?php echo get_theme_mod( 'title_highlight' ) ?></span><span class="text-bold"><?php echo get_theme_mod( 'title_bold' ) ?></span>
                                    </a>
                                </h1>
                            </div><!--//branding-->
                            <div class="desktop-only">
                                <?php wp_nav_menu( [
                                    'theme_location'    => 'header-menu',
                                    'menu_class'        => 'breadcrumb',
                                    'items_wrap'        => '<ol id="%1$s" class="%2$s">%3$s</ol>',
                                ] ) ?>
                            </div>
                            <div class="mobile-only">
                                <?php wp_nav_menu( [
                                    'theme_location'    => 'mobile-header-menu',
                                    'menu_class'        => 'breadcrumb',
                                    'items_wrap'        => '<ol id="%1$s" class="%2$s">%3$s</ol>',
                                ] ) ?>
                            </div>
                            <?php do_action( 'wpmvc_nav_left' ) ?>
                        </div>
                        <div class="nav-section sub-nav">
                            <div class="sub-nav-section">
                                <?php do_action( 'wpmvc_nav_right' ) ?>
                                <?php if ( get_theme_mod( 'allow_login', true ) ) : ?>
                                    <?php if ( is_user_logged_in() ) : ?>
                                        <a role="button"
                                            class="nav-link nav-pill nav-profile"
                                            href="<?php echo esc_url( apply_filters( 'wpmvc_account_url', '#' ) ) ?>"
                                            title="<?php _e( 'Account', 'wpmvc-website' ) ?>"
                                        ><img class="nav-avatar"
                                            src="<?php echo esc_url( get_avatar_url( get_current_user_id() ) ) ?>"
                                            alt="<?php echo esc_attr( wp_get_current_user()->display_name )?>"
                                        ></a>
                                    <?php else : ?>
                                        <a role="button"
                                            class="nav-link nav-pill nav-login"
                                            href="<?php echo esc_url( apply_filters( 'wpmvc_login_url', '#' ) ) ?>"
                                        ><?php _e( 'Login' ) ?></a>
                                    <?php endif ?>
                                <?php endif ?>
                            </div>
                            <div class="sub-nav-section">
                                <?php if ( get_theme_mod( 'allow_search', true ) ) : ?>
                                    <button role="superbrowse-caller"
                                        title="<?php _e( 'Search' ) ?>"
                                        class="button button-nav nav-search"
                                    ><i class="fa fa-search"></i></button>
                                <?php endif ?>
                                <?php if ( get_theme_mod( 'allow_mobile_menu', false ) ) : ?>
                                    <div class="mobile-only">
                                        <?php wp_nav_menu( [
                                            'theme_location'    => 'mobile-menu',
                                            'menu_class'        => 'breadcrumb',
                                            'items_wrap'        => '<ol id="%1$s" class="%2$s">%3$s</ol>',
                                        ] ) ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        </div>
                    </div><!--//nav-flex-->
                </div><!--//container-->
            </header><!--//header-->
        <?php endif ?>
        <div id="site-body">