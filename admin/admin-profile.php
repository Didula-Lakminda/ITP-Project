<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php 
	// checking if a user is logged in
	if (!isset($_SESSION['admin_id'])) {
		header('Location: select-login.php');
	}

	$user_list = '';
		
	$query = "SELECT * FROM admin WHERE admin_id = {$_SESSION['admin_id']} LIMIT 1";
	
	$users = mysqli_query($connection, $query);

	verify_query($users);

	while ($user = mysqli_fetch_assoc($users)) {
		
	$ab1=	$user['first_name'];
	$ab2=	$user['last_name'];
	$ab3=	$user['contact_number'];
	$ab4=	$user['address'];
	$ab5=	$user['last_login'];
	$ab6=	$user['email'];
	}
 ?>

	
	
<!DOCTYPE html>
<html lang="en">

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
    <link rel="stylesheet" href="css/style.css" type="text/css"


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="ITP/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="ITP/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="ITP/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin-profile.php">Welcome You <?php echo $_SESSION['first_name']; ?> .......</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
     
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['first_name']; ?> ! <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                 
                        <li class="divider"></li>
                        <li>
                            <a href="admin-logout.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
           
		   
		   
		  
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                       
                        <ol class="breadcrumb">
                            
                            <li class="active">
                                
								
								
								
								
								
								
								
								
									 <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                </div>
            </div>
            <div class="checkout__form">
                <form>
				
				<?php 

			if (!empty($errors)) {
				display_errors($errors);
			}

		 ?>
		 </br></br></br></br></br>
		   <a href="approved_post.php" class='btn btn-primary'>product management</a>
		   <a href="" class='btn btn-primary'>Delivery management</a>
		   <a href="AddBitPoints.php" class='btn btn-primary'>bit points calculation</a>
		   <a href="admin_payment.php" class='btn btn-primary'>Payment management</a>
		   <a href="approved_post.php" class='btn btn-primary'>Supplier management</a>
		   <a href="feedbackadmin.php" class='btn btn-primary'>customer feedback</a>
		   <a href="approved_post.php" class='btn btn-primary'>Shareholder</a></br></br>
		   <a href="../shareholderfront/login.php" class='btn btn-danger'>Shareholder Login</a>
		   </br></br></br></br>
		 
				
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        
										<input type="text" name="first_name" <?php echo 'value="' . $ab1 . '"'; ?> disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
										<input type="text" name="last_name" <?php echo 'value="' . $ab2 . '"'; ?> disabled>
                                    </div>
                                </div>

                            </div>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
								<input type="text" name="email" <?php echo 'value="' . $ab6 . '"'; ?> disabled>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
								<input type="text" name="address" <?php echo 'value="' . $ab4 . '"'; ?> disabled>
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Contact Number<span>*</span></p>
                                        
										<input type="text" name="contact_number" <?php echo 'value="' . $ab3 . '"'; ?> disabled>
                                    </div>
                                </div>
                            
                            </div>
							
							<div class="checkout__input">
                                <p>Last Login<span>*</span></p>
								<input type="text" name="last_login" <?php echo 'value="' . $ab5 . '"'; ?> disabled>
                            </div>
                            
                            
                            <div class="checkout__input">
                                <p>Account Password<span>*</span></p>
                                <input type="password" name="password" value="********" disabled>
                            </div>
                            

								
								
								
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
		
    </section>
    <!-- Checkout Section End -->
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
        

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	
	
	
	
	
	
	
	
	
	

</body>

</html>
