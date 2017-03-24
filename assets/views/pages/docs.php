<?php
/**
 * Page view.
 * Documentation (docs) template.
 *
 * @package WPMVCWebsite
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.1
 */
?>
<?php get_header() ?>

    <div class="menu-wrapper">

        <a class="toggle">
            <i class="fa fa-list" aria-hidden="true"></i>
        </a>
        <div class="menu">
            <nav class="doc-nav">
                <?php wp_nav_menu( [
                    'theme_location'    => 'docs-menu',
                    'menu_class'        => 'nav doc-menu',
                    'items_wrap'        => '<ul id="doc-menu" class="%2$s">%3$s</ul>',
                ] ) ?>
            </nav>
        </div><!--.menu-->

        <div class="page-content">
            <div class="doc-wrapper">

                <div id="doc-header" class="doc-header text-center">
                    <h1 class="doc-title">
                        <span><i class="fa <?= $page->icon ?>"></i> </span>
                        <span><?= $page->title ?></span>
                    </h1>
                    <div class="meta">
                        <span><i class="fa fa-clock-o"></i> </span>
                        <span><?php _e( 'Last updated:', 'wpmvc' ) ?> </span>
                        <span><?= $page->formatted_modified ?></span>
                    </div>
                </div><!--//doc-header-->


                <div class="doc-body">
                    <div class="content-inner">
                        <?= $page->content ?>
                    </div><!--//content-inner-->
                </div><!--//doc-body-->

            </div>
        </div><!--.page-content-->

    </div><!--.menu-wrapper-->

<!-- CUSTOM TEMPLATE FOOTER -->

        </div><!--.site-body-->
    </div><!--.page-wrapper-->
    <footer class="footer text-center">
        <div class="container">
            <!--/* This template is released under the Creative Commons Attribution 3.0 License. Please keep the attribution link below when using for your own project. Thank you for your support. :) If you'd like to use the template without the attribution, you can check out other license options via our website: themes.3rdwavemedia.com */-->
            <small class="copyright">
                <span>&copy; <?= date( 'Y' ) ?> <a href="http://www.10quality.com">10 Quality Studio</a></span>
                <span><?php _e( '. All rights reserved.' ) ?></span>
            </small>            
        </div><!--//container-->
    </footer><!--//footer-->
    <?php wp_footer(); ?>
</body>
</html>