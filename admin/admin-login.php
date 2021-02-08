<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 

	// check for form submission
	if (isset($_POST['submit'])) {

		$errors = array();

		// check if the username and password has been entered
		if (!isset($_POST['email']) || strlen(trim($_POST['email'])) < 1 ) {
			$errors[] = 'Username is Missing / Invalid';
		}

		if (!isset($_POST['password']) || strlen(trim($_POST['password'])) < 1 ) {
			$errors[] = 'Password is Missing / Invalid';
		}

		// check if there are any errors in the form
		if (empty($errors)) {
			// save username and password into variables
			$email = mysqli_real_escape_string($connection, $_POST['email']);
			$password = mysqli_real_escape_string($connection, $_POST['password']);
			//$hashed_password = sha1($password);

			// prepare database query
			$query = "SELECT * FROM admin 
						WHERE email = '{$email}' 
						AND password = '{$password }' 
						LIMIT 1";

			$result_set = mysqli_query($connection, $query);

			verify_query($result_set);

			if (mysqli_num_rows($result_set) == 1) {
				// valid user found
				$user = mysqli_fetch_assoc($result_set);
				$_SESSION['admin_id'] = $user['admin_id'];
				$_SESSION['user_id'] = $user['admin_id'];
				$_SESSION['first_name'] = $user['first_name'];
				// updating last login
				$query = "UPDATE admin SET last_login = NOW() ";
				$query .= "WHERE admin_id = {$_SESSION['admin_id']}  LIMIT 1";

				$result_set = mysqli_query($connection, $query);

				verify_query($result_set);

				// redirect to users.php
				header('Location: admin-profile.php');
			} else {
				// user name and password invalid
				$errors[] = 'Invalid Username / Password';
			}
		}
	}
?>



		<html>
	<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
	
	<link rel="stylesheet" href="cssttt/main.css">
	
</head>
	<body>
	
	 <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>



    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Login</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
		
</a></span></h1>


	<div class="login">
	
			<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		 ?>

		<form action="admin-login.php" method="post">
			
			<fieldset>
				<legend><h2>Admin Login</h2></legend>

				<?php 
					if (isset($errors) && !empty($errors)) {
						echo '<p class="error">Invalid Username / Password</p>';
					}
				?>

				<?php 
					if (isset($_GET['admin-logout'])) {
						echo '<p class="info">You have logged out from the system</p>';
					}
				?>

				<p>
					<label for="">Username:</label>
					<input type="text" name="email" id="" placeholder="Email Address" autofocus>
				</p>

				<p>
					<label for="">Password:</label>
					<input type="password" name="password" id="" placeholder="Password" required>
				</p>

				<p>
					<button type="submit" name="submit">Login</button>
				</p>
				
				

			</fieldset>

		</form>		

	</div> <!-- .login -->



	 <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>	
	
	</body>
	</html>