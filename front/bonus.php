<?php
	session_start();
	
	// checking if a user is logged in
	if (!isset($_SESSION['customer_id'])) {
		header('Location: select-login.php');
	}
	$connection = mysqli_connect('localhost','root',"",'supermarket');
	$query = "SELECT * FROM customer WHERE customer_id = {$_SESSION['customer_id']} LIMIT 1";
	$users = mysqli_query($connection, $query);
	
?>

<!DOCTYPE html>
<html lang="zxx">

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

	
	<style>
	#customers {
	  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
	  border-collapse: collapse;
	  width: 60%;
	}

	#customers td, #customers th {
	  border: 1px solid #ddd;
	  padding: 8px;
	}

	#customers tr:nth-child(even){background-color: #f2f2f2;}

	#customers tr:hover {background-color: #ddd;}

	#customers th {
	  padding-top: 12px;
	  padding-bottom: 12px;
	  text-align:left;
	  background-color: #ff304f;
	  color: white;
	}

	 .success {
  
	margin: 15px auto; 
    padding: 20px;
	font-size:30px;
    color: blue; 
    text-align: left;
	background: #dff0d8; 
    width: 50%;
	border-radius:8px;
	}

	 .fail {
	margin: 10px auto; 
    padding: 10px;
	font-size:20px;
    color: red; 
    text-align: left;
	background: #dff0d8; 
    width: 25%;
	border-radius:8px;
	}
	
	 .invalid {
  
	margin: 10px auto; 
    padding: 5px; 
    color: red; 
    text-align: center;
	background: #dff0d8; 
    width: 50%;
	border-radius:8px;
}

</style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

	 <!-- Header Section Begin -->
	<?php include "include\Humberger.php"?>
    <!-- Header Section End -->
    


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Bonus</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>My Bonus</span><br><br><br>
							<h4 style="color:white;">Get your offer <?php echo $_SESSION['first_name']; ?> ...</h4>
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
                <h4>Check Your Offer</h4>
                <form action="#" method="post">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
										<p>Enter your random item id here<span>*</span></p>
                                        <input type="number" name="item_id"  placeholder="" required>
                                    </div>
                                </div>
						
                                
                            </div>
                        </div>
                    </div>
							<input type="submit" class="btn btn-primary" name="search" value="Check"><br><br><br>
							

							
							<?php
							
								$connection = mysqli_connect('localhost','root',"",'supermarket');
								
								
								
								if(isset($_POST['search']))
								{
									$itemID = $_POST['item_id'];
									
									$result = mysqli_query($connection,"SELECT addBitPoint FROM bitpoints WHERE itemID ='$itemID'");
									
									
								if($row = mysqli_fetch_array($result))
									{
										
										if($row['addBitPoint']>=10 && $row['addBitPoint']<=15) {
											echo '<div class="success">';
											echo "Congratulations , You have won Peanut butter 150g";
											echo '</div>';
										}
										
										else if($row['addBitPoint']>65 && $row['addBitPoint']<70) {
											echo '<div class="success">';
											echo "Congratulations,You have won 2 Mega Ginger beers";
											echo '</div>';
										}
										
										else if($row['addBitPoint']>75 && $row['addBitPoint']<82) {
											echo '<div class="success">';
											echo "Congratulations,You have won Chocalate ice cream 2l";
											echo '</div>';
										}
										
										else if($row['addBitPoint']>40 && $row['addBitPoint']<50) {
											echo '<div class="success">';
											echo "Congratulations,You have won 4 Maliban chocalate biscuits";
											echo '</div>';
										}
										
										else if($row['addBitPoint']>85 && $row['addBitPoint']<93) {
											echo '<div class="success">';
											echo "Congratulations,You have won Kandos white chocalate";
											echo '</div>';
										}
										
										else if($row['addBitPoint']>30 && $row['addBitPoint']<36) {
											echo '<div class="success">';
											echo "Congratulations,You have won Sunsilk hair conditioner";
											echo '</div>';
										}
										
										else if($row['addBitPoint']>25 && $row['addBitPoint']<30) {
											echo '<div class="success">';
											echo "Congratulations,You have won 400g Anchor milk powder ";
											echo '</div>';
										}
										
										else if($row['addBitPoint']>53 && $row['addBitPoint']<58) {
											echo '<div class="success">';
											echo "Congratulations,You have won Kist jam 200g ";
											echo '</div>';
										}
										
										else if($row['addBitPoint']>17 && $row['addBitPoint']<23) {
											echo '<div class="success">';
											echo "Congratulations,You have won MD tomato source 150g ";
											echo '</div>';
										}
										

										?>
									
									<?php
								}
								else{
										echo '<div class="fail">';
										echo "Sorry,try again next time...";
										echo '</div>';
									}
								
								}
							?><br><br>
							
				
                        <!--create table -->
						<table id="customers";>
                            <tr >
                       
								<th><b> Item Name</b> </th>
                                <th><b> Item ID</b> </th>
							</tr>
							
							  <!--Database connection-->
						 <?php
								$connection = mysqli_connect('localhost','root',"",'supermarket');
							
								
								$result = mysqli_query($connection,"SELECT * FROM approved_item");
								
								while($row = mysqli_fetch_assoc($result))
									{
										?>
										<tr>
											<td><?php echo $row['product_name'] ?> </td>
											<td><?php echo $row['produt_ID'] ?> </td>
										</tr>
										
										<?php
								}
								
							?>
							
                </table>
							</form><br>
						
							
                       
				</div>
        </div>
    </section>
    <!-- Checkout Section End -->
	
		
	
    <!-- Footer Section Begin -->
    <?php include "include/footer.php"?>
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