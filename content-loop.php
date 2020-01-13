<?php
/**
 * Posts loop template.
 *
 * @author Ale Mostajo <info@10quality.com>
 * @package wpmvc-website
 * @license MIT
 * @version 1.1.0
 */
?>
<article id="post-<?php echo esc_attr( get_the_ID() ) ?>"
    class="loop-item <?php echo esc_attr( get_post_type() )?>"
>
    <div class="attachment">
        <a href="<?php echo esc_url( get_permalink() ) ?>" class="loop-link">
            <?php if ( has_post_thumbnail() ) : ?>
                <img src="<?php echo esc_url( get_the_post_thumbnail_url( null, 'thumbnail' ) ) ?>"
                    alt="Thumbnail"
                />
            <?php endif ?>
        </a><!--loop-link-->
    </div>
    <div class="details">
        <div class="meta"><i class="fa fa-clock-o"></i> <span class="date"><?php the_date() ?></span></div>
        <a href="<?php echo esc_url( get_permalink() ) ?>" class="loop-link">
            <h2 class="post-title"><?php the_title() ?></h2>
        </a><!--loop-link-->
        <div class="excerpt"><?php the_excerpt() ?></div>
    </div>
</article>