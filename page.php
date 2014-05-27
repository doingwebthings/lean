<?php get_header(); ?>

<main role="main">
    <?php while (have_posts()) { ?>
        <?php the_post(); ?>
        <?php get_template_part('content', 'page'); ?>
        <?php if (comments_open() || '0' != get_comments_number()) { ?>
            <?php comments_template(); ?>
        <?php } ?>
    <?php } ?>
</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
