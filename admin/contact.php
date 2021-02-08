<?php 
	if(isset($_POST['submit']))
	{
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];

		$to = 'sunshine@gmail.com';
		$mail_subject = 'Message from website';
		$email_body = "Your Product Approved <br>";

		$header = "From: {$email}\r\nContent-Type: text/html;";

		$result = mail($to, $mail_subject, $email_body, $header);

		if($result)
		{
			echo "Message Sent";
		}
		else
		{
			echo "Message Not sent";
		}
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Contact Us</title>

	<link rel="stylesheet" type="text/css" href="st.css">

</head>
<body>
	<div class="container">
		<form action="contact.php" method="POST">
			<p>
				<label for="fullname">Full Name *: </label>
				<input type="text" name="fullname" id="fullname" required>
			</p>

			<p>
				<label for="fullname">Email *: </label>
				<input type="email" name="email" id="email" required>
			</p>

			<p>
				<label for="fullname">Subject *: </label>
				<input type="text" name="subject" id="subject" required>
			</p>

			<p>
				<label for="fullname">Message *: </label>
				<textarea name="message" id="message" cols="30" rows="10" required></textarea>
			</p>

			<p>
				<button type="submit" name="submit">Send Message</button>
			</p>
		</form>
</body>