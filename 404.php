<?php include('partials/header.php'); ?>
    <section class="error-404 not-found">
        <header class="page-header">
            <h1 class="page-title"><?php _e('Oops! That page can&rsquo;t be found.', 'lean'); ?></h1>
        </header>

        <div class="page-content">
            <p><?php _e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'lean'); ?></p>
            <?php get_search_form(); ?>
            <?php the_widget('WP_Widget_Recent_Posts'); ?>
        </div>
    </section>
<?php include('partials/footer.php'); ?>