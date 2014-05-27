<?php get_header(); ?>

        <?php if (have_posts()) : ?>

            <header>
                <h1><?php printf(__('Search Results for: %s', 'lean'), '<span>' . get_search_query() . '</span>'); ?></h1>
            </header>

            <?php while (have_posts()) : the_post(); ?>

                <?php get_template_part('content', 'search'); ?>

            <?php endwhile; ?>

        <?php else : ?>

            <?php get_template_part('content', 'none'); ?>

        <?php endif; ?>

    </main>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
