<?php
/**
 * Single post template.
 *
 * @author 10 Quality Studio <https://www.10quality.com/>
 * @package wpmvc-website
 * @license MIT
 * @version 1.1.2
 */
?>
<article class="post-body">
    <div id="post-header" class="post-header">
        <h1 class="post-title">
            <?php the_title() ?>
        </h1>
        <div class="meta">
            <div class="media">
                <div class="media-left">
                    <a href="<?= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"
                        title="View posts by <?= esc_attr( get_the_author_meta( 'display_name' ) ) ?>"
                    >
                        <?= get_avatar( get_the_author_meta( 'ID' ), 45 ) ?>
                    </a>
                </div>
                <div class="media-body">
                    <div class="date">
                        <i class="fa fa-clock-o"></i>
                        <span> <?php _e( 'Posted on', 'wpmvc-website' ) ?> </span>
                        <span class="value">
                            <?php the_date() ?>
                        </span>
                    </div>
                    <div class="author">
                        <span> By </span>
                        <a href="<?= esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) ?>"
                            title="View posts by <?= esc_attr( get_the_author_meta( 'display_name' ) ) ?>"
                            class="name"
                        >
                            <?= get_the_author_meta( 'display_name' ) ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="post-content">
        <?php the_content() ?>
    </div>
    <div class="meta-footer">
        <?php if ( has_category() ) : ?>
            <div class="terms categories"><i class="fa fa-th-large" aria-hidden="true"></i> <?php the_category() ?></div>
        <?php endif ?>
        <?php if ( has_tag() ) : ?>
            <div class="terms tags"><i class="fa fa-tags" aria-hidden="true"></i> <?php the_tags() ?></div>
        <?php endif ?>
    </div>
</article>