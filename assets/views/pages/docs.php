<?php
/**
 * Page view.
 * Documentation (docs) template.
 *
 * @package WPMVCWebsite
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.0
 */
?>
<?php get_header() ?>

    <div class="doc-wrapper">
        <div class="container">

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

                <div class="doc-content">
                    <div class="content-inner">
                        <?= $page->content ?>
                    </div><!--//content-inner-->
                </div><!--//doc-content-->

                <div class="doc-sidebar hidden-xs">
                    <nav id="doc-nav">
                        <?php wp_nav_menu( [
                            'menu'          => 'docs-menu',
                            'menu_class'    => 'nav doc-menu',
                            'items_wrap'    => '<ul id="doc-menu" class="%2$s" data-spy="affix">%3$s</ul>',
                        ] ) ?>
                    </nav>
                </div><!--//doc-sidebar-->

            </div><!--//doc-body-->

        </div>
    </div>

<?php get_footer() ?>