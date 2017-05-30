<?php
if($_POST){
	require_once 'vendor/autoload.php';
	// require_once 'swiftmailer/lib/swift_required.php';

	// Create the Transport
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
	  ->setUsername('pankaj@fierydevs.com')
	  ->setPassword('zeus123@')
	;

	// Create the Mailer using your created Transport
	$mailer = new Swift_Mailer($transport);

	// Create a message
	$message = new Swift_Message('Wonderful Subject');
	  $message->setFrom([$_POST['email'] => $_POST['name']]);
	  $message->setTo(['pankaj@fierydevs.com' => 'Pankaj Salokhe']);
	  $message->setBody('Here is the message itself');
	  ;

	// Send the message
	$result = $mailer->send($message);
	echo "<pre>";print_r($result);echo "</pre>";exit;
}
?>
<form method="post">
	<input type="email" required name="email">
	<input type="name" required name="name">
	<input type="submit">
</form>