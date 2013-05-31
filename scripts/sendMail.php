<?php
	$to      = 'p_boelens@msn.com';
	$subject = 'PBS Test';
	$message = 'hello';
	$headers = 'From: no-reply@PBS.com';
	
	mail($to, $subject, $message, $headers);
?>
