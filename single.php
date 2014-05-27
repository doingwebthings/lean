<?php include('partials/header.php'); ?>

<?php while (have_posts()) : the_post(); ?>

    <?php get_template_part('content', 'single'); ?>

    <?php
    if (comments_open() || '0' != get_comments_number()) :
        comments_template();
    endif;
    ?>

<?php endwhile; ?>

<?php include('partials/footer.php'); ?>