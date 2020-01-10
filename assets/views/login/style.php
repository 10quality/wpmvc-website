<?php
/**
 * Login style customizations.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.0.8
 */

$logo_url = wp_get_attachment_url( get_theme_mod( 'wp_login_logo', 0 ) );
if ( is_wp_error( $logo_url ) || empty( $logo_url ) )
    $logo_url = admin_url( '/images/wordpress-logo.svg ');
?><style type="text/css">
body {
    background-color: <?php echo esc_attr( get_theme_mod( 'wp_login_background_color', '#f1f1f1' ) ) ?> !important;
}
#nav,
#backtoblog,
#backtoblog a,
.privacy-policy-page-link,
.privacy-policy-page-link a,
.wp-core-ui .button-secondary,
#nav a {
    color: <?php echo esc_attr( get_theme_mod( 'wp_login_link_color', '#555d66' ) ) ?> !important;
}
#backtoblog a:hover,
.privacy-policy-page-link a:hover,
.wp-core-ui .button-secondary:hover,
#nav a:hover {
    color: <?php echo esc_attr( get_theme_mod( 'wp_login_linkhover_color', '#777f99' ) ) ?> !important;
}
.login h1 a {
    background-image: url(<?php echo esc_url( $logo_url ) ?>);
    background-size: <?php echo esc_attr( get_theme_mod( 'wp_login_logo_size', 84 ) ) ?>px;
    width: <?php echo esc_attr( get_theme_mod( 'wp_login_logo_size', 84 ) ) ?>px;
    height: <?php echo esc_attr( get_theme_mod( 'wp_login_logo_size', 84 ) ) ?>px;
    background-position: <?php echo esc_attr( get_theme_mod( 'wp_login_logo_position', 'center top' ) ) ?>;
}
.wp-core-ui .button-primary {
    background-color: <?php echo esc_attr( get_theme_mod( 'wp_login_link_color', '#555d66' ) ) ?> !important;
    border-color: <?php echo esc_attr( get_theme_mod( 'wp_login_link_color', '#555d66' ) ) ?> !important;
    color: <?php echo esc_attr( get_theme_mod( 'wp_login_linktext_color', '#FFFFFF' ) ) ?> !important;
}
.wp-core-ui .button-primary:hover {
    background-color: <?php echo esc_attr( get_theme_mod( 'wp_login_linkhover_color', '#777f99' ) ) ?> !important;
    border-color: <?php echo esc_attr( get_theme_mod( 'wp_login_linkhover_color', '#777f99' ) ) ?> !important;
    color: <?php echo esc_attr( get_theme_mod( 'wp_login_linktext_color', '#FFFFFF' ) ) ?> !important;
}
</style>