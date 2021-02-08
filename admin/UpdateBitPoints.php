<!DOCTYPE html>
<html lang="en">
<?php $connection = mysqli_connect('localhost','root',"",'supermarket'); 

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

    <title>UpdateBitPoints</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!--Apply internal css to update form-->
	<style> 
	  .form_style {
	  width: 180%;
	  padding: 12px 20px;
	  margin: 8px 0;
	  box-sizing: border-box;
	  border: 2px solid blue;
	  border-radius: 4px;
	  color:black;
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

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include\Navigation.php"?>
	
		<!--database connection,validation and popup alert-->
		<?php
			$connection = mysqli_connect('localhost','root',"");
			$db = mysqli_select_db($connection,'supermarket');
			
			if(isset($_POST['update']))
			{
				$updateBitPoint = $_POST['add_bit'];
				$bit_length = strlen((string)abs($updateBitPoint));
				
				if($updateBitPoint=="") {
					echo '<div class="invalid">';
					echo '*You must enter a bit point value to update!';
					echo '</div>';
				}
				
				else if($bit_length != 2) {
					echo '<div class="invalid">';
					echo '*Invalid bit point value';
					echo '</div>';
				}
				else {
					
				$query = "UPDATE bitpoints SET addBitPoint = '$_POST[add_bit]' WHERE bitNo = '$_POST[select_item]'";  
				$query_run = mysqli_query($connection,$query);
				
					
			if($query_run)
				{
					echo '<script type="text/javascript"> alert("Updated Successfully!!") </script>';
				}
				else
				{
					echo '<script type="text/javascript"> alert("Request Failed") </script>';
				}
				}
			}
				
		?>


			<div class="container-fluid">
			
			<!--update the bit point values-->
			
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header" style="color:white;">
						Update Bit Points
					</h1>
					
					
					
					<div class="col-xs-6">
					<form action="#" method="post" style="color:white; margin:15px 0 0px 230px;">
					 <div class = "form-group">
					 <lable for="cat-title"><b>Select Bit Number</b><br></lable>
					 
					  <!--dropdown box-->
					  <select class="form_style" name="select_item" required>
								<?php
								$query = "SELECT * FROM bitpoints";
								$select_item = mysqli_query($connection,$query);
							
									while($row = mysqli_fetch_assoc($select_item)){
									$item = $row['bitNo'];
									
								
									echo "<option value='{$item}'>{$item}</option>";
								}?>
								
						</select>
					 </div>
					
					
					 <div class = "form-group">
					 <lable for="cat-title"><b>Change Bit Point</b></lable>
					 <input class="form_style" type="number" name="add_bit" placeholder="" >
					 </div>
					 
					  <div class = "form-group">
					 <button class="btn btn-primary" name="update">Update</button>
					 </div>
					 
					 
					
					 </form>
					 
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


