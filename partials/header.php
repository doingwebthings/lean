<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">

		<title><?php wp_title('|', true, 'right'); ?></title>

		<?php get_template_part('partials/favicons'); ?>

		<link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/dc663f5b-95e5-4420-8b5e-cb6ce1e6a24f.css">
		<?php wp_head(); ?>

		<?php if(is_development() === true): ?>
			<script type="text/javascript" src="<?php echo base_url(); ?>livereload.js"></script>
		<?php endif; ?>

	</head>

	<body <?php body_class() ?>>

		<header class="site-header">

			<nav class="navbar navbar-default" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
						<span class="pull-left">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				<?php wp_nav_menu(array(
					'menu'            => 'primary',
					'theme_location'  => 'primary',
					'depth'           => 2,
					'container'       => 'div',
					'container_id'    => 'navbar-primary-collapse',
					'container_class' => 'collapse navbar-collapse',
					'menu_class'      => 'nav navbar-nav',
					'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
					'walker'          => new wp_bootstrap_navwalker(),
				)); ?>
			</nav>
		</header>