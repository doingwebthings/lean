<?php get_template_part('partials/header'); ?>
<?php the_post(); ?>
	<div class="container-fluid main">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1>
						<?php the_title(); ?>
					</h1>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	</div>
<?php get_template_part('partials/footer'); ?>