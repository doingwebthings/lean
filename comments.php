<?php
if (post_password_required())
{
    return;
}
?>

<div class="comments">

    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            printf(_nx('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'lean'),
                number_format_i18n(get_comments_number()), '<span>' . get_the_title() . '</span>');
            ?>
        </h2>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
            <nav class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e('Comment navigation', 'lean'); ?></h1>

                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'lean')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'lean')); ?></div>
            </nav><!-- #comment-nav-above -->
        <?php endif; // check for comment navigation ?>


        <ol class="comments-list">
            <?php wp_list_comments(array('walker' => new Roots_Walker_Comment)); ?>
        </ol>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through ?>
            <nav class="comment-navigation" role="navigation">
                <h1 class="screen-reader-text"><?php _e('Comment navigation', 'lean'); ?></h1>

                <div class="nav-previous"><?php previous_comments_link(__('&larr; Older Comments', 'lean')); ?></div>
                <div class="nav-next"><?php next_comments_link(__('Newer Comments &rarr;', 'lean')); ?></div>
            </nav><!-- #comment-nav-below -->
        <?php endif; ?>

    <?php endif; ?>

    <?php if (!comments_open() && '0' != get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
        <p class="no-comments"><?php _e('Comments are closed.', 'lean'); ?></p>
    <?php endif; ?>

    <?php comment_form(); ?>

</div>
