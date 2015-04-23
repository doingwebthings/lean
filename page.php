<?php get_template_part('partials/header'); ?>
<?php the_post(); ?>
	<main class="site-content" role="main">
		<div class="container contentbox contentbox-page">
			<header class="contentbox-heading">
				<h1>
					<?php the_title(); ?>
				</h1>
			</header>
			<div class="row contentbox-page">
				<div class="contentbox-main col-sm-8 col-sm-push-4">
					<div class="contentbox-thecontent">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="contentbox-sidebar col-sm-4 col-sm-pull-8">
					<?php get_template_part('partials/submenu'); ?>
					<?php get_template_part('partials/widgets-primary'); ?>
					<?php get_template_part('partials/contactperson'); ?>
				</div>
			</div>
		</div>
	</main>
<?php get_template_part('partials/footer'); ?>