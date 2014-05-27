<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('content', 'single'); ?>

    <?php lean_post_nav(); ?>

    <?php
    if (comments_open() || '0' != get_comments_number()) :
        comments_template();
    endif;
    ?>

<?php endwhile; ?>

<?php get_footer(); ?>