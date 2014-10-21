<?php get_template_part('partials/header'); ?>

<?php #get_template_part('partials/bootstrap-showcase'); ?>


    <div class="container-fluid main">
        <div class="container">
            <div class="row">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', get_post_format()); ?>
                    <?php endwhile; ?>
                <?php endif; ?>

                <?php if (!is_page() && (comments_open() || '0' != get_comments_number())) : comments_template(); endif; ?>

                <aside class="widgets" role="complementary">
                    <?php get_template_part('partials/widgets-primary'); ?>
                </aside>
            </div>
        </div>
    </div>

<?php get_template_part('partials/footer'); ?>