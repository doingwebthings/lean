<?php get_template_part('partials/header'); ?>


<?php /*?>
    <div class="container-fluid rowexample1">
        <div class="container">
            <div class="row">
                <div class="box">
                    <h1 class="box-headline">box-headline</h1>
                    <h1 class="box-headline--funky">box-headline Funky</h1>
                    <p class="box-copy">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ex laudantium magnam nihil praesentium, veniam?</p>
                    <a class="box-link" href="#">mehr lesen</a>
                </div>
                <div class="box">
                    <h1 class="box-headline">box-headline 2</h1>
                    <h1 class="box-headline--funky">box-headline Funky</h1>
                    <p class="box-copy">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis ex laudantium magnam nihil praesentium, veniam?</p>
                    <a class="box-link" href="#">mehr lesen</a>
                </div>
            </div>
        </div>
    </div>

<?php */
?>

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