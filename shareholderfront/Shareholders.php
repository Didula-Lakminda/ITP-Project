<?php
include "connectiondb.php";

?>
<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<html>
<head>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></Script>

<title>Shareholders</title>
<link rel="stylesheet" href="css/shareeventstyle.css">

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
	
	
	<body>


	<body style="background-color:#D5D6D6;">

<!-- Navigation Bar-->
	<nav style="color:green;" class="navbar navbar-expand-lg navbar-light bg-light navbar-custom">
  <a class="navbar-brand" href="#">Shareholder Navgation</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto flex-column vertical-nav">
      <li class="nav-item">
        <button style="background-color: #f2f2f2; color: black; border: 2px solid #555555; width:200px;"><a  style="color:black; font-size: 20px;" class="nav-link" href="welcome.php">Home</a></button><br>
      </li>
      <li class="nav-item">
        <button style="background-color: #f2f2f2; color: black; border: 2px solid #555555; width:200px;"><a style="color:black;font-size: 20px;" class="nav-link" href="Shareevents.php">Events</a></button><br>
      </li>
      <li class="nav-item">
        <button style="background-color: #f2f2f2; color: black; border: 2px solid #555555; width:200px;"><a style="color:black; font-size: 20px;" class="nav-link" href="Shareholders.php">Shareholders</a></button><br>
      </li>
      </li>
      <li class="nav-item">
        <button style="background-color: #f2f2f2; color: black; border: 2px solid #555555; width:200px;"><a style="color:black; font-size: 20px;"class="nav-link" href="ShareDetails.php">Share Details</a></button><br>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="btn btn"><?php echo htmlspecialchars($_SESSION["username"]); ?></a>
      </li>
	  
	  
	  <li class="nav-item">
	  <a href="logout.php" class="btn btn-danger">Sign Out</a>
	   </li>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Log Out</a>
        </div>
      </li>
    </ul>

  </div>
</nav>

<br><br>
<hr>
	<center>
<img  src="images/sun.jpg" style="width:600px; height:300px;">
<hr>

<img  src="images/stomar.jpg" style="width:400px; height:300px;">
		


<br><br>
<!-- Page details-->
<h3>Shareholders Of the Company</h3>
</center>



<br>

<div class="padd">
<div class="col-lg-10">
<><!-- Creating Shareholder Table-->

	 <table class="table table-bordered">
    <thead>
      <tr>
		
		<th>Fullname</th>
        <th>Email</th>
        <th>Share Percentage</th>
		<th>Date of Birth</th>
		<th>Address</th>
		<th>NIC</th>
		

		
      </tr>
    </thead>
    <tbody>
<!-- Getting Shareholder Details from the DATAbase-->	
	<?php
	$res=mysqli_query($link,"select * from shareholder");
		while($row=mysqli_fetch_array($res))
		{
			echo"<tr>";
			
			echo"<td>"; echo $row["shfull_name"]; echo"</td>";
			echo"<td>"; echo $row["email"]; echo"</td>";
			echo"<td>"; echo $row["share_percentage"]; echo"</td>";
			echo"<td>"; echo $row["dateofbirth"]; echo"</td>";
			echo"<td>"; echo $row["address"]; echo"</td>";
			echo"<td>"; echo $row["nic"]; echo"</td>";
			
			
			echo"</tr>";
			
		}
	
	
	?>
	
	
	
     
     
    </tbody>
  </table>
  
  
  
  


</div>
</div>
<br><br>


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

