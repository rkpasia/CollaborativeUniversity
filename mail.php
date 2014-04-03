<?php
	
	$to      = 'riccardo.pasianotto@gmail.com';
	$subject = 'the subject';
	$message = 'hello';
	$headers = 'From: riccardo.pasianotto@gmail.com' . "\r\n" .
	    'Reply-To: riccardo.pasianotto@gmail.com' . "\r\n" .
	    'X-Mailer: PHP/' . phpversion();

	mail($to, $subject, $message, $headers);

	echo 'inviata'; 