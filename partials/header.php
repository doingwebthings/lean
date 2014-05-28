<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo asset_url(); ?>img/favicon.ico">

    <script type="text/javascript">
        var baseurl = '<?php echo base_url(); ?>';
    </script>

    <?php wp_head(); ?>

    <!--[if lt IE 9]>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>

<div class="container-fluid" style="background-color: #ddd">
    <header>
        <nav class="primary-menu" role="navigation">
            <?php wp_nav_menu(array('theme_location' => 'primary', 'container' => 'false', 'menu_class' => '')); ?>
        </nav>
    </header>
</div>
