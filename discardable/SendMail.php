<?php

	/*
		PHP file to send registration emails to the users. The link will just be a PHP page that
		changes that user's database status to 1. We'll add a bunch of random numbers and letters
		but the last digits will be the id of the registered user, and the PHP page will simply
		look for that number and then redirect back to home.
	*/

	include 'class.phpmailer.php';

	$location = protect($_REQUEST['email']);

	$mail = new PHPMailer(true);

	try {

		define('GUSER', 'imminglewebsite@gmail.com'); // Gmail username
		define('GPWD', 'immingle1213'); // Gmail password

		$mail->IsSMTP(); // enable SMTP
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		$mail->Username = GUSER;
		$mail->Password = GPWD;
		$mail->CharSet = 'UTF-8';
		$mail->From = GUSER;
		$mail->FromName = 'Immingle';
		$mail->AddAddress($location);

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		$mail->IsHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Immingle Account Registration';
		$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->Send()) {
		   echo 'Message could not be sent.';
		   echo 'Mailer Error: ' . $mail->ErrorInfo;
		   exit;
		}

		echo 'Message has been sent';

	} catch (phpmailerException $e) {
		echo $e->errorMessage(); //Pretty error messages from PHPMailer
	} catch (Exception $e) {
		echo $e->getMessage(); //Boring error messages from anything else!
	}

	function protect($string){
		$string = trim(strip_tags(addslashes($string)));
		return $string;
	}

?>