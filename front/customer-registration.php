<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 

	// checking if a user is logged in


	$errors = array();
	$first_name = '';
	$last_name = '';
	$email = '';
	$contact_number = '';
	$address = '';
	$password = '';

	if (isset($_POST['submit'])) {
		
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$contact_number = $_POST['contact_number'];
		$address = $_POST['address'];
		$password = $_POST['password'];

		// checking required fields
		$req_fields = array('first_name', 'last_name', 'email', 'contact_number', 'address', 'password');
		$errors = array_merge($errors, check_req_fields($req_fields));

		// checking max length
		$max_len_fields = array('first_name' => 15, 'last_name' =>15, 'email' => 50, 'contact_number' => 20, 'address' => 100, 'password' => 50);
		$errors = array_merge($errors, check_max_len($max_len_fields));

		// checking email address
		if (!is_email($_POST['email'])) {
			$errors[] = 'Email address is invalid.';
		}

		// checking if email address already exists
		$email = mysqli_real_escape_string($connection, $_POST['email']);
		$query = "SELECT * FROM customer WHERE email = '{$email}' LIMIT 1";

		$result_set = mysqli_query($connection, $query);

		if ($result_set) {
			if (mysqli_num_rows($result_set) == 1) {
				$errors[] = 'Email address already exists';
			}
		}

		if (empty($errors)) {
			// no errors found... adding new record
			$first_name = mysqli_real_escape_string($connection, $_POST['first_name']);
			$last_name = mysqli_real_escape_string($connection, $_POST['last_name']);
			$email = mysqli_real_escape_string($connection, $_POST['email']);
			$contact_number = mysqli_real_escape_string($connection, $_POST['contact_number']);
			$address = mysqli_real_escape_string($connection, $_POST['address']);
			$password = mysqli_real_escape_string($connection, $_POST['password']);
			// email address is already sanitized
			$hashed_password = sha1($password);

			$query = "INSERT INTO customer ( ";
			$query .= "first_name, last_name, email, contact_number, address, password, is_deleted";
			$query .= ") VALUES (";
			$query .= "'{$first_name}', '{$last_name}', '{$email}', '{$contact_number}', '{$address}', '{$hashed_password}', 0";
			$query .= ")";

			$result = mysqli_query($connection, $query);

			if ($result) {
				// query successful... redirecting to users page
				header('Location: customer-login.php?user_added=true');
			} else {
				$errors[] = 'Failed to add the new record.';
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
</head>
	<body>
	
	 <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="img/3.jpg" alt=""></a>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="img/language.png" alt="">
                <div>Sinhala</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Sinhala</a></li>
                    <li><a href="#">Tamil</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
						<ul>
                            <li class="active"><a href="./index.html">Home</a></li>
                            <li><a href="#">Shop</a>
							<ul class="header__menu__dropdown">
                                    <li><a href="#">View Cart <i class='fa fa-shopping-cart'></i></a></li>
                                    
								</ul>
                            </li>
                            <li><a href="#">About us</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Our Services</a></li>
									<li><a href="#">Give Feedback</a></li>
                      
                      
								</ul>
                            </li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Register</a></li>
                        </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> SunShine@gmail.com</li>
        
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i>SunShine@gmail.com</li>
                       
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__auth">
								<a href="profile.php"><i class="fa fa-user"></i>Profile</a>
                            </div>
                            <div class="header__top__right__auth">
							
                                <a href="select.php"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="index.php"><img src="img/3.jpg" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="#">Shop</a>
							<ul class="header__menu__dropdown">
                                    <li><a href="#">View Cart <i class='fa fa-shopping-cart'></i> </a></li>
                                    
							</ul>
							</li>
                            <li><a href="#">About</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">About us</a></li>
                                    <li><a href="#">Our Services</a></li>
									<li><a href="#">Give Feedback</a></li>
                      
                      
								</ul>
                            </li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Register</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Customer registration</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
		
		 <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
            <div class="checkout__form">
			
			<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

			?>
			
                <form action="#" action="customer-registration.php" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name" <?php echo 'value="' . $first_name . '"'; ?> autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name" <?php echo 'value="' . $last_name . '"'; ?> >
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="text" name="email" <?php echo 'value="' . $email . '"'; ?>>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address" <?php echo 'value="' . $address . '"'; ?>>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Contact Number:<span>*</span></p>
                                        <input type="text" name="contact_number" <?php echo 'value="' . $contact_number . '"'; ?>>
                                    </div>
                                </div>
                            
                            </div>
                            
                            
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="password" name="password">
                            </div>
                            
                           
                               
								<button type="submit" name="submit" class="site-btn">Register Now</button>
								
								<label for="">Already have an account? </label><a href="customer-login.php">Sign in</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
	
	<!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address:  95 2/1  pattah col-11</li>
                            <li>Phone: +94 1128950437</li>
                            <li>Email: SunShine@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
						<p><b>Connect With us</b></p>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                  
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

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