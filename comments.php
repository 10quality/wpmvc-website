<?php
/**
 * Comments template.
 *
 * @package WPMVCWebsite
 * @author Alejandro Mostajo <info@10quality.com>
 * @version 1.0.3
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() )
    return;
?>

<?php if ( have_comments() ) : ?>
    <div id="comments" class="comments-area">

        <h2 class="comments-title">
            <?php if ( get_comments_number() === $comments_number ) : ?>
                <?= sprintf( _x( 'One thought on &ldquo;%s&rdquo;', 'comments title', 'wpmvc' ), get_the_title() ) ?>
            <?php else : ?>
                <?= sprintf(
                        _nx(
                            '%1$s thought on &ldquo;%2$s&rdquo;',
                            '%1$s thoughts on &ldquo;%2$s&rdquo;',
                            $comments_number,
                            'comments title',
                            'wpmvc'
                        ),
                        number_format_i18n( get_comments_number() ),
                        get_the_title()
                ) ?>
            <?php endif ?>
        </h2>

        <?php the_comments_navigation() ?>

        <ol class="comment-list">
            <?php wp_list_comments( [
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 42,
            ] ) ?>
        </ol><!-- .comment-list -->

        <?php the_comments_navigation() ?>

    </div><!-- .comments-area -->
<?php endif ?>