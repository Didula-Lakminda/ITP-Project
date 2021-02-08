<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}

?>

	<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Display Bit Points</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!--Apply internal css to table and button-->
	<style>
	table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 95%;
	  margin-bottom:50px;
	}

	td, th {
	  border: 3px solid #dddddd;
	  text-align: center;
	  padding: 8px;
	}

	tr:nth-child(even) {
	background-color: #4592af;}
  
	  .button {
	  background-color: #ff304f; /* Red */
	  border: none;
	  color: white;
	  padding: 5px 12px;
	  text-align: center;
	  text-decoration: none;
	  border-radius:8px;
	  display: inline-block;
	  font-size: 14px;
	  margin: 4px 2px;
	  transition-duration: 0.4s;
	  cursor: pointer;
	}

	.button1 {
	  background-color: white; 
	  color: black; 
	  border: 2px solid #d72323;
	}

	.button1:hover {
	  background-color: #ff304f;
	  color: white;
	}
  


	</style>
		
	
	</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include\Navigation.php"?>
            <!-- /.navbar-collapse -->
        </nav>

      

            <div class="container">
            <div class="row">
                <div class="col-6">
                    <div class="card ">
						<form action="" method="POST">
						
						<center><h2 style="color:white;">Display Summary</h2></center>
                        <!--create table -->
						<table style="color:white;">
                            <tr >
                                <td><b> Bit No</b></td>
								<td><b> Item ID</b> </td>
                                <td><b> Bit Point</b> </td>
								<td><b>Delete</b> </td>
                               
                            </tr><br><br>
							<center><input type="submit" class="btn btn-primary" name="search" value="Show All"></center><br><br>
							</form>
						
							
                         <!--Database connection-->
						 <?php
								$connection = mysqli_connect('localhost','root',"",'supermarket');
							
								
								if(isset($_POST['search']))
								{
									
									$result = mysqli_query($connection,"SELECT * FROM bitpoints");
								
								
									
									while($row = mysqli_fetch_assoc($result))
									{
										?>
										<tr>
											<td><?php echo $row['bitNo'] ?> </td>
											<td><?php echo $row['itemID'] ?> </td>
											<td><?php echo $row['addBitPoint'] ?> </td>
											<td>
												<a onclick="return confirm('Do you want to delete?')" href="Display.php?bitNo=<?php echo $row['bitNo']?>" class="button .button1">Delete</a>
											</td>	
										</tr>
										
										<?php
								}
								}
							?>
							
							   
							<!--Delete the records from the table-->
							<?php
									$connection = mysqli_connect('localhost','root',"",'supermarket');



										if(isset($_GET['bitNo'])){
		
											$bitno = $_GET['bitNo'];
											$query = "DELETE  FROM bitpoints WHERE bitNo = '".$bitno."'";

											$result=mysqli_query($connection,$query);
		
												if(!$result)
												{
													echo "Failed deleted...";
												}
												
												 }	
													
							?>
						
						
                                   
					
                    </div>
                </div>
            </div>
        </div>

	</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
