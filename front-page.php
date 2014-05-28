<?php include('partials/header.php'); ?>

    <div class="container">
        <div class="row">
            <div class="main" role="main">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('content', get_post_format()); ?>
                    <?php endwhile; ?>

                <?php else : ?>
                    <?php get_template_part('content', 'none'); ?>
                <?php endif; ?>
            </div>
            <aside class="widget-area" role="complementary">
                <?php include('partials/widgets.php'); ?>
            </aside>
        </div>
    </div>


    <!-- container-fluid -->
    <div class="container-fluid">
        <b>container-fluid</b>
        <br>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consectetur deleniti deserunt dicta dolore earum est excepturi, impedit laboriosam laborum, magnam nisi, placeat quisquam ratione sit tempore ullam velit. Eos, magnam.
    </div>


    <!-- container -->
    <div class="container">
        <div class="row row-gutter">
            <div class="col-md-4">
                <div class="gutter-test">x</div>
            </div>
            <div class="col-md-4">
                <div class="gutter-test">y</div>
            </div>
            <div class="col-md-4">
                <div class="gutter-test">z</div>
            </div>
            <div class="col-md-4">
                <div class="gutter-test">z</div>
            </div>
            <div class="col-md-4">
                <div class="gutter-test">z</div>
            </div>
            <div class="col-md-4">
                <div class="gutter-test">z</div>
            </div>
        </div>
    </div>


<?php include('partials/footer.php'); ?>