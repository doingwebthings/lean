<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0">

		<title><?php wp_title('|', true, 'right'); ?></title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>img/favicon.ico">

		<?php wp_head(); ?>

		<?php if(is_development() === true): ?>
			<script type="text/javascript" src="<?php echo base_url(); ?>livereload.js"></script>
		<?php endif; ?>

		<link type="text/css" rel="stylesheet" href="http://fast.fonts.net/cssapi/dc663f5b-95e5-4420-8b5e-cb6ce1e6a24f.css">

	</head>

	<body <?php body_class() ?>>



