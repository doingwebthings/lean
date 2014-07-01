<?php include('partials/header.php'); ?>
<div class="container">
    <div class="row">
        <div class="maincontent" role="main">
            <?php if (have_posts()) : ?>

                <header class="page-header">
                    <h1 class="page-title">
                        <?php
                        if (is_category()) :
                            single_cat_title();

                        elseif (is_tag()) :
                            single_tag_title();

                        elseif (is_author()) :
                            printf(__('Author: %s', 'lean'), '<span class="vcard">' . get_the_author() . '</span>');

                        elseif (is_day()) :
                            printf(__('Day: %s', 'lean'), '<span>' . get_the_date() . '</span>');

                        elseif (is_month()) :
                            printf(__('Month: %s', 'lean'), '<span>' . get_the_date(_x('F Y', 'monthly archives date format', 'lean')) . '</span>');

                        elseif (is_year()) :
                            printf(__('Year: %s', 'lean'), '<span>' . get_the_date(_x('Y', 'yearly archives date format', 'lean')) . '</span>');

                        elseif (is_tax('post_format', 'post-format-aside')) :
                            _e('Asides', 'lean');

                        elseif (is_tax('post_format', 'post-format-gallery')) :
                            _e('Galleries', 'lean');

                        elseif (is_tax('post_format', 'post-format-image')) :
                            _e('Images', 'lean');

                        elseif (is_tax('post_format', 'post-format-video')) :
                            _e('Videos', 'lean');

                        elseif (is_tax('post_format', 'post-format-quote')) :
                            _e('Quotes', 'lean');

                        elseif (is_tax('post_format', 'post-format-link')) :
                            _e('Links', 'lean');

                        elseif (is_tax('post_format', 'post-format-status')) :
                            _e('Statuses', 'lean');

                        elseif (is_tax('post_format', 'post-format-audio')) :
                            _e('Audios', 'lean');

                        elseif (is_tax('post_format', 'post-format-chat')) :
                            _e('Chats', 'lean');

                        else :
                            _e('Archives', 'lean');

                        endif;
                        ?>
                    </h1>
                </header>

                <?php while (have_posts()) : the_post(); ?>
                    <?php get_template_part('content', get_post_format()); ?>
                <?php endwhile; ?>

            <?php else : ?>
                <?php get_template_part('content', 'none'); ?>
            <?php endif; ?>

        </div>
    </div>
</div>
<?php get_template_part('partials/widgets'); ?>
<?php get_template_part('partials/footer'); ?>
