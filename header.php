<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width; initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>
    <div class="container">
        <nav class="primary-menu" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false', 'menu_class' => 'nav navbar-nav')); ?>
        </nav>
    </div>
</header>
