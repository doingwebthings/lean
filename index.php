<?php get_template_part('partials/header'); ?>

    <div class="container">
        <div class="row">
            <div class="main" role="main">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', get_post_format()); ?>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (!is_page() && (comments_open() || '0' != get_comments_number())) : comments_template(); endif; ?>

            </div>
            <aside class="widget-area" role="complementary">
                <?php get_template_part('partials/widgets-primary'); ?>
            </aside>
        </div>
    </div>

<?php get_template_part('partials/footer'); ?>