<?php
/**
 * Site's footer file.
 * Wordpress template.
 *
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.7
 */
?>
        </div><!--.site-body-->
    </div><!--.page-wrapper-->
    <div class="footer-bar">
        <div class="container">
            <div class="row">
                <div class="col col-sm-6">
                    <small>
                        <?php if ( is_active_sidebar( 'wpmvc-footer' ) ) : ?>
                            <?php dynamic_sidebar( 'wpmvc-footer' ) ?>
                        <?php else : ?>
                            <?php theme()->view( 'misc.no-widgets' ) ?>
                        <?php endif ?>
                    </small>
                </div>
                <div class="col col-sm-3">
                    <small>
                        <?php wp_nav_menu( [
                            'theme_location'    => 'footer-menu-1',
                            'menu_class'        => 'links',
                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ] ) ?>
                    </small>
                </div>
                <div class="col col-sm-3">
                    <small>
                        <?php wp_nav_menu( [
                            'theme_location'    => 'footer-menu-2',
                            'menu_class'        => 'links',
                            'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ] ) ?>
                    </small>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer text-center">
        <div class="container">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">
                <?php if ( get_theme_mod( 'copyright_text' ) ) : ?>
                    <?php echo get_theme_mod( 'copyright_text' ) ?>
                <?php else : ?>
                    <?php theme_view( 'misc.copyright' ) ?>
                <?php endif ?>
            </small>            
        </div><!--//container-->
    </footer><!--//footer-->
    <?php wp_footer(); ?>
</body>
</html>