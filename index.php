<?php include('partials/header.php'); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
    <?php endwhile; ?>

<?php else : ?>
    <?php get_template_part('content', 'none'); ?>
<?php endif; ?>

<?php include('partials/widgets.php'); ?>
<?php include('partials/footer.php'); ?>
