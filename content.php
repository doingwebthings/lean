<article class="article">

    <header class="article-header">
        <h1 class="article-title">
            <a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
        </h1>

        <?php if ('post' == get_post_type()) : ?>
            <div class="article-meta">
                <?php the_time('l, F jS, Y'); ?>
            </div>
        <?php endif; ?>
    </header>

    <div class="testimage">
        <?php echo get_field('testimage'); ?>
        <img src="<?php echo get_field('testimage'); ?>" srcset="<?php echo getSrcset(get_field('testimage'), array(
                200,
                800,
                1200
            )); ?>">
        <hr>
        <?php echo getSrcset(get_field('testimage'), array(320, 640, 768)); ?>
        <hr>
    </div>

    <div class="article-content">
        <?php the_content(__('Continue reading <span class="meta-nav">&rarr;</span>', 'lean')); ?>
    </div>


    <footer class="article-footer">
        <?php if ( ! post_password_required() && (comments_open() || '0' != get_comments_number())) : ?>
            <span class="commentslink"><?php comments_popup_link(__('Leave a comment', 'lean'), __('1 Comment', 'lean'), __('% Comments', 'lean')); ?></span>
        <?php endif; ?>
        <?php edit_post_link(__('Edit', 'lean'), '<span class="edit-link">', '</span>'); ?>
    </footer>

</article>
