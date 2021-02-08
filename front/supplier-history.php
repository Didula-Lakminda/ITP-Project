<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['supplier_id'])) {
		header('Location: select-login.php');
	}


	$user_list = '';
	$search = '';

	// getting the list of users
	
	if ( isset($_GET['search']) ) {
		$search = mysqli_real_escape_string($connection, $_GET['search']);
		
		$query = "SELECT * FROM supplierproduct WHERE user_id = {$_SESSION['supplier_id']} AND (RequestID LIKE '%{$search}%' OR ProductName LIKE '%{$search}%' OR Category LIKE '%{$search}%' OR Quantity LIKE '%{$search}%' OR Price LIKE '%{$search}%' OR Discount LIKE '%{$search}%' OR ExpiredDate LIKE '%{$search}%' OR Description LIKE '%{$search}%' OR ApprovedType LIKE '%{$search}%') ";					
	} else {
		$query = "SELECT * FROM supplierproduct WHERE user_id = {$_SESSION['supplier_id']}";
	}

	
	$users = mysqli_query($connection, $query);

	verify_query($users);

	while ($user = mysqli_fetch_assoc($users)) {
		$user_list .= "<tr>";
		$user_list .= "<td>{$user['RequestID']}</td>";
		$user_list .= "<td>{$user['ProductName']}</td>";
		$user_list .= "<td>{$user['Category']}</td>";
		$user_list .= "<td>{$user['Quantity']}</td>";
		$user_list .= "<td>{$user['Price']}</td>";
		$user_list .= "<td>{$user['Discount']}</td>";
		$user_list .= "<td>{$user['ExpiredDate']}</td>";
		$user_list .= "<td>{$user['Description']}</td>";
		$user_list .= "<td>{$user['ApprovedType']}</td>";
		$user_list .= "</tr>";
	}
 ?>
<?php require('inc/supplier-header.php'); ?>

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
                            <li><a href="supplier-history.php">History</a></li>
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
                        <h2>Login</h2>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
	

	<main>	
	
	<form action="sup-report.php" method="POST">
		<button type="submit" name="btn_pdf" class="btn btn-success">PDF</button>
	</form>

		<h1>History <span> | <a href="supplier-history.php">Refresh</a></span></h1>

		<div class="search">
			<form action="supplier-history.php" method="get">
				<p>
					<input type="text" name="search" id="" placeholder="Type Requset ID, Product Name, Category, Quantity, Price, Discount, Expired Date, Description, Approved Type" value="<?php echo $search; ?>" required autofocus>
				</p>
			</form>
		</div>

		<table class="masterlist">
			<tr>
				<th>Requset ID</th>
				<th>Product Name</th>
				<th>Category</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Discount</th>
				<th>Expired Date</th>
				<th>Description</th>
				<th>Approved Type</th>
			</tr>

			<?php echo $user_list; ?>

		</table>
		
		
	</main>
	
	
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
	
	
