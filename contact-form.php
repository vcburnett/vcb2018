<?php
header('Content-type: application/json');

$sender = "burnettvictor@gmail.com";
$return = array();

if ($_POST['form'] == 'contact-form') {

// Fetching Values from URL.
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$company = $_POST['company'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$subject = 'Contact from ' . $name . '(' . $company . ')';
		// To send HTML mail, the Content-type header must be set.
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:' . $email . "\r\n"; // Sender's Email
		$headers .= 'Cc:' . $email . "\r\n"; // Carbon copy to Sender
		$template = '<div style="padding:50px; color:#333;">Hello ' . $name . ',<br/>'
			. '<br/>Thank you for contacting us.<br/><br/>'
			. 'Name:' . $name . '<br/>'
			. 'Email:' . $email . '<br/>'
			. 'Company:' . $company . '<br/>'
			. 'Message:' . $message . '<br/><br/>'
			. 'This is a contact confirmation mail.'
			. '<br/>'
			. 'We Will contact you as soon as possible.</div>';
		$sendmessage = "<div style=\"background-color:#f4f4f4; color:#333;\">" . $template . "</div>";
		// Message lines should not exceed 70 characters (PHP rule), so wrap it.
		$sendmessage = wordwrap($sendmessage, 70);
		// Send mail by PHP Mail Function.

		try {
			mail($sender, $subject, $sendmessage, $headers);
			mail($email, $subject, $sendmessage, $headers);
		} catch (Exception $e) {
			$return = array(
				'error',
				$e->getMessage()
			);
		}
		$return = array(
			'success',
			'Your Message has been received,<br /> we shall contact you soon.'
		);
	} else {
		$return = array(
			'error',
			'Invalid email'
		);
	}
}

if ($_POST['form'] == 'cv-form') {
	// Fetching Values from URL.
	$name = $_POST['name'];
	$email = $_POST['email'];
	$position = $_POST['position'];
	$linkedin = $_POST['linkedin'];
	$extra_link_1 = $_POST['extra_link_1'];
	$extra_link_2 = $_POST['extra_link_2'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Sanitizing E-mail.
// After sanitization Validation is performed
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$subject = 'CV from ' . $name . '(' . $position . ')';
		// To send HTML mail, the Content-type header must be set.
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From:' . $email . "\r\n"; // Sender's Email
		$headers .= 'Cc:' . $email . "\r\n"; // Carbon copy to Sender
		$template = '<div style="padding:50px; color:#333;">Hello ' . $name . ',<br/>'
			. '<br/>Thank you...! For Your CV.<br/><br/>'
			. 'Name: ' . $name . '<br/>'
			. 'Email: ' . $email . '<br/>'
			. 'Position: ' . $position . '<br/>'
			. 'LinkedIn: ' . $linkedin . '<br/>'
			. $extra_link_1 . '<br/>'
			. $extra_link_2 . '<br/>'
			. 'This is a CV Confirmation email.'
			. '<br/>'
			. 'We Will contact you as soon as possible .</div>';
		$sendmessage = "<div style=\"background-color:#f4f4f4; color:#333;\">" . $template . "</div>";
		// Message lines should not exceed 70 characters (PHP rule), so wrap it.
		$sendmessage = wordwrap($sendmessage, 70);
		// Send mail by PHP Mail Function.

		try {
			mail($sender, $subject, $sendmessage, $headers);
			mail($email, $subject, $sendmessage, $headers);
		} catch (Exception $e) {
			$return = array(
				'error',
				$e->getMessage()
			);
		}
		$return = array(
			'success',
			'Your CV has been received,<br /> we will contact you soon.'
		);
	} else {
		$return = array(
			'error',
			'Invalid email'
		);
	}
}

echo json_encode($return);