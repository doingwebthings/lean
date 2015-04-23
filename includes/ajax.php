<?php
if( ! function_exists('sendContactMail')) {
	/**
	 * send contact email
	 */
	function sendContactMail() {

		$testRecipient = 'xxx@abc.com';
		$subject       = 'Nachricht aus dem Kontaktformular';

		//honeypot && NONCE
		$wpNonce      = $_POST['nonce'];
		$sendMailCopy = (isset($_POST['mailcopy'])) ? 'true' : 'false';

		if(($_POST['email']) || ( ! wp_verify_nonce($wpNonce, 'contactform_action'))) {
			die();
		}

		$message = "";
		$message .= "Name: " . sanitize_text_field($_POST['cname']) . "<br>";
		$message .= "Firma: " . sanitize_text_field($_POST['cfirma']) . "<br>";
		$message .= "E-Mail: " . sanitize_text_field($_POST['cemail']) . "<br>";
		$message .= "Nachricht: " . sanitize_text_field($_POST['cnachricht']) . "<br>";


		if($sendMailCopy) {
			$multiple_recipients = array($testRecipient, $_POST['cemail']);
			$success             = wp_mail($multiple_recipients, $subject, $message);
		} else {
			$success = wp_mail($testRecipient, $subject, $message);
		}

		die(json_encode(array('success' => $success)));
	}

	add_action('wp_ajax_contactform', 'sendContactMail');
	add_action('wp_ajax_nopriv_contactform', 'sendContactMail');
}
