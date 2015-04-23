<?php $contactperson = get_field('page-contactperson'); ?>
<div class="contactperson">
	<div class="contactperson-img">
		<img class="img-circle" src="<?php echo bfi_thumb(get_field('contactperson_bildurl', $contactperson->ID), array('width' => 90, 'height'=>90)); ?>" alt="<?php echo get_field('contactperson_name', $contactperson->ID); ?>">
	</div>
	<div class="contactperson-info">
		<div class="contactperson-name">
			<?php echo get_field('contactperson_name', $contactperson->ID); ?>
		</div>
		<div class="contactperson-jobtitel">
			<?php echo get_field('contactperson_jobtitel', $contactperson->ID); ?>
		</div>
		<div class="contactperson-email">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/contactperson-email.svg" alt=""/>
			<p><?php echo get_field('contactperson_email', $contactperson->ID); ?></p>
		</div>
		<div class="contactperson-telefon">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/img/svg/contactperson-telefon.svg" alt=""/>
			<p><?php echo get_field('contactperson_telefon', $contactperson->ID); ?></p>
		</div>
	</div>
</div>
