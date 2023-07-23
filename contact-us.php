<?php
        include 'header.php';
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Contact Us</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/contact-us.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<body>

	<div class="container-contact100 container_back">
		<div class="wrap-contact100">
			<form class="contact100-form validate-form" action="send.php" method="POST">
				<span class="contact100-form-title">
					Get in Touch
				</span>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Name is required">
					<span class="label-input100">Tell us your name *</span>
					<input class="input100" type="text" name="name" placeholder="Enter your name">
				</div>
				<div class="wrap-input100 rs1-wrap-input100 validate-input"
					data-validate="Valid email is required: ex@abc.xyz">
					<span class="label-input100">Enter your email *</span>
					<input class="input100" type="text" name="email" placeholder="Enter your email">
				</div>
				<div class="wrap-input100">
					<span class="label-input100">Subject</span>
					<input class="input100" type="text" name="subject" placeholder="Subject">
				</div>
				<div class="wrap-input100 validate-input" data-validate="Message is required">
					<span class="label-input100">Message</span>
					<textarea class="input100" name="message" placeholder="Your message here..."></textarea>
				</div>
				<div class="container-contact100-form-btn">
					<div class="wrap-contact100-form-btn">
						<div class="contact100-form-bgbtn"></div>
						<button type = "submit" class="contact100-form-btn" name="send">
							Submit
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<?php
        include 'footer.php';
    ?>
</body>

</html>