<?php
    include 'config.php';  
	require './vendor/autoload.php';
	use Mailgun\Mailgun;

	$key = API_KEY;
    $sandbox = SANDBOX;
	$admin_mail = ADMIN_MAIL;
	if(isset($_POST["send"])){
		try {
			$email = $_POST['email'];
			$subject = $_POST['subject'];
			$message = "Name : ".$_POST['name']."\nMessage : ".$_POST['message'];
			
	//For the below one we need the relevant Private API key from the Mailgun account
	$mg = Mailgun::create($key); // For US servers

	// Now, compose and send your message.
	// $mg->messages()->send($domain, $params);
	// The domain can get from the Mailgun account where https://app.mailgun.com/app/sending/domains
	$mg->messages()->send($sandbox, [
	'from'    => $email,
	'to'      => $admin_mail,
	'subject' => $subject,
	'text'    => $message
	]);

		echo "<script>
		alert('Sent Mail Sucessfully');
		document.location.href='index.php';
		</script>";
		} catch (Exception $e) {
		echo "Message could not be sent. Mailer Error: {$e}";
		}
	}

?>