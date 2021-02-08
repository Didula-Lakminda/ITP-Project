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

    <title>Search Bit Points</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<!--Apply internal css to search bar-->
	<style> 
	  input[type=text] {
	  width: 100%;
	  padding: 12px 20px;
	  margin: 15px 0 0px 230px;
	  box-sizing: border-box;
	  border: 2px solid blue;
	  border-radius: 4px;
	  color:black;
	  border-radius:8px;
	  
	  table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 95%;
	  margin: 15px 0 0px 230px;
	}

	td, th {
	  border: 3px solid #dddddd;
	  text-align: center;
	  padding: 8px;
	}


	</style>
		
	
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
         <?php include "include\Navigation.php"?>

      

            <div class="container-fluid">

              <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-xs-6">
						<form action="" method="POST">
						
						 <div class = "form-group">
						 <h2 style="color:white;margin:15px 0 0px 230px;">Search Bit Point</h2>
						 <input type="text" name="bitno"  placeholder="Enter Bit Number Here">
						 </div>
						 
						 <center><input type="submit" class="btn btn-primary" name="search"  required></center><br><br>
						 
                        <!--create table -->
						<table class="table table-bordered" style="color:white;">
                            <tr>
                                <td><b> Bit No</b> </td>
								<td><b> Item ID</b> </td>
                                <td><b> Bit Point</b> </td>
                               
                            </tr><br><br>
							
							</form>
						
						<!--Database connection-->	
                         <?php
							
								$connection = mysqli_connect('localhost','root',"",'supermarket');
								
								
								if(isset($_POST['search']))
								{
									$bitNo = $_POST['bitno'];
									$result = mysqli_query($connection,"SELECT * FROM bitpoints WHERE bitNo ='$bitNo'");
									
									while($row = mysqli_fetch_array($result))
									{
										?>
										<tr>
											<td><?php echo $row['bitNo'] ?> </td>
											<td><?php echo $row['itemID'] ?> </td>
											<td><?php echo $row['addBitPoint'] ?> </td>
										</tr>
										
										<?php
								}
								
								}
								
							?>
						
                                   
					
                    </div>
                </div>
            </div>
        </div>

            </div>
            <!-- /.container-fluid -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>