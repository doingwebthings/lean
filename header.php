<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php wp_title('|', true, 'right'); ?></title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header>

    <div class="container">
        <nav class="language-switcher">
            <ul class="nav navbar-nav">
                <li><a>DE</a></li>
                <li><a>EN</a></li>
                <li><a>FR</a></li>
                <li><a>ES</a></li>
            </ul>
        </nav>
        <nav class="secondary-menu navbar" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'secondary', 'container' => 'false', 'menu_class' => 'nav navbar-nav')); ?>
        </nav>
    </div>



    <div class="container">
        <nav class="primary-menu" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false', 'menu_class' => 'nav navbar-nav')); ?>
        </nav>
    </div>


</header>
