<?php get_template_part( 'partials/header' ); ?>
<?php the_post(); ?>

	<div class="container">
		<div class="row">
			<aside class="widgets" role="complementary">
				<?php get_template_part( 'partials/widgets-primary' ); ?>
			</aside>
		</div>
	</div>

<?php get_template_part( 'partials/footer' ); ?>