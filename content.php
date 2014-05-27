<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <header class="entry-header">
        <h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

        <?php if ('post' == get_post_type()) : ?>
            <div class="entry-meta">
                <?php the_time('l, F jS, Y'); ?>
            </div>
        <?php endif; ?>
    </header>


    <div class="entry-content">
        <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'lean')); ?>
        <?php
        wp_link_pages(array(
            'before' => '<div class="page-links">' . __('Pages:', 'lean'),
            'after' => '</div>',
        ));
        ?>
    </div>


    <footer class="entry-footer">
        <?php if (!post_password_required() && (comments_open() || '0' != get_comments_number())) : ?>
            <span class="comments-link"><?php comments_popup_link(__('Leave a comment', 'lean'), __('1 Comment', 'lean'), __('% Comments', 'lean')); ?></span>
        <?php endif; ?>
        <?php edit_post_link(__('Edit', 'lean'), '<span class="edit-link">', '</span>'); ?>
    </footer>

</article>
