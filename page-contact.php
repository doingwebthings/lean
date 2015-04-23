<?php
/*
 * Template Name: Contact Page
 * Description: A Page Template with a darker design.
 */
?>
<?php get_template_part('partials/header'); ?>
<?php the_post(); ?>

	<main class="site-content" role="main">
		<div class="container contentbox contentbox-page">
			<div class="row">
				<div class="col-sm-12">
					<h1 class="contentbox-heading">Contact</h1>
				</div>
			</div>
			<div class="row row-equal-height contentbox-page">
				<div class="col-sm-6 col-bordered contentbox-contactperson">
					<h3>Ihr Ansprechpartner</h3>
					<div class="row">
						<div class="col-sm-6"></div>
						<div class="col-sm-6"></div>
					</div>
				</div>
				<div class="col-sm-6 contentbox-contact-form">
					<form id="contactform">
						<?php wp_nonce_field('contactform_action', '_form_nonce'); ?>
						<h3>Kontaktformular</h3>
						<div class="form-group">
							<label for="cname">Name</label>
							<input type="text" id="cname" class="form-control" required="">
						</div>
						<div class="form-group">
							<label for="cfirm">Firma</label>
							<input type="text" id="cfirm" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="cemail">E-Mail Adresse</label>
							<input type="email" id="cemail" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="cmessage">Nachricht</label>
							<textarea name="nachricht" id="cmessage" cols="30" rows="10" class="form-control" required></textarea>
						</div>
						<div class="form-group email">
							<label for="email">E-Mail</label>
							<input type="email" id="email">
						</div>
						<div class="form-group mail-copy">
							<input type="checkbox" id="mailcopy" value="false"> Send me a copy
						</div>
						<button type="submit" class="btn btn-default">Send</button>
					</form>
					<div class="alert alert-success hidden">
						<strong>Success!</strong> Your message has been sent successfully.
					</div>
				</div>
			</div>
		</div>
	</main>

<?php get_template_part('partials/footer'); ?>