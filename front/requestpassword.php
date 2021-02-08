
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST["email"])){
	
	$emailTo = $_POST["email"];
	
	$code = uniqid(true);
	
$query = "INSERT INTO reset (code, email) VALUES('{$code}', '{$emailTo}')";
						
	$result_set = mysqli_query($connection, $query);
	
	verify_query($result_set);

	

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'dasithatharinda98@gmail.com';                     // SMTP username
    $mail->Password   = 'jnnh hhoy ysfz fhry';                               // SMTP password
    $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('dasithatharinda98@gmail.com', 'Mailer');
    $mail->addAddress("$emailTo");     // Add a recipient
    $mail->addReplyTo('info@example.com', 'no reply');




    // Content
	$url = "http://" . $_SERVER["HTTP_HOST"] . dirname($_SERVER["PHP_SELF"]) . "/resetpassword.php?code=$code";
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Password reset link........';
$mail->Body    = "<h1>You requested a password reset</h1>Click<a href='$url'>this Link</a> to do so";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent to your email.......';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>


<html>
<body>

<form method="post">
			


				<p>
					<label for="">email:</label>
					<input type="text" name="email" id="" placeholder="Email Address" autocomplete = "off">
				</p>


				<p>
					<button type="submit" name="submit" value="reset email">reset</button>
				</p>



		</form>		

</body>
</html>