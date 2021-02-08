<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<?php $connection = mysqli_connect('localhost','root',"",'supermarket'); ?>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AddBitPoints</title>

   
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!--Apply internal css to insert form-->
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
		
		<?php if (isset($_SESSION['invalid'])): ?>
			<div class="invalid">
				<?php
					echo $_SESSION['invalid'];
					unset ($_SESSION['invalid']);
				?>
			</div>
			<?php endif ?>
		
		
		<!--database connection and popup alert-->
		
		<?php
		if(isset($_POST['Add'])){
			
			
			$bitNo = $_POST['bitno'];
			$itemName = $_POST['select_item'];
			$addBitPoint = $_POST['add_bit'];
			$bit_length = strlen((string)abs($addBitPoint));
			
			if($bitNo=="") {
				echo '<div class="invalid">';
				echo '*Bit number must be added!';
				echo '</div>';
			
		}
			
			else if($addBitPoint=="") {
				echo '<div class="invalid">';
				echo '*Bit point value must be added!';
				echo '</div>';
			}
			
			else if($bit_length != 2) {
				echo '<div class="invalid">';
				echo '*Invalid bit point value';
				echo '</div>';
			}
			
			
			
		else {
			
			$query = "INSERT INTO bitpoints(bitNo,itemID,addBitPoint) VALUE('{$bitNo}','{$itemName}','{$addBitPoint }')";
			$query_run = mysqli_query($connection,$query);
		
			if($query_run)
		{
			echo '<script type="text/javascript"> alert("Adding Successfully!!") </script>';
		}
		else
		{
			echo '<script type="text/javascript"> alert("Bitpoint has already added!!") </script>';
		}
		
		}	
		}
		
		?>
		
		
	
		<div class="container-fluid">
			
			<!--create the form to add bit points for items-->
			
			<div class="row" ">
				<div class="col-lg-12" >
					<h1 class="page-header" style="color:white; ">
						Add Bit Points
					</h1>
					
					
	<!--Check the availability of bitno-->
			
					
					<div class="col-xs-6">
					
					<!--create a form to insert bit values-->
					
					<form action="" method="POST" style="color:white; margin:15px 0 0px 230px;" >
					 <div class = "form-group">
					 <lable for="cat-title"><b>Bit Number</b></lable>
					 <input class="form_style" type="text"  name="bitno" value="" placeholder="Bit No" >
					  
					 </div>
					
					<div class = "form-group">
					 <lable for="cat-title"><b>Item Name</b><br></lable>
					 
					 <!--dropdown box-->
					 <select class="form_style" name="select_item" required>
								<?php
								$query = "SELECT * FROM approved_item";
								$select_item = mysqli_query($connection,$query);
							
									while($row = mysqli_fetch_assoc($select_item)){
									$title = $row['product_name'];
									$ID = $row['produt_ID'];
									
									echo "<option value= '{$ID}' >{$title}</option>";
								}?>
								
						</select>
					 </div>
					 
					 
					
					 <div class = "form-group">
					 <lable for="cat-title"><b>Add Bit Point</b></lable>
					 <input class="form_style" type="number" name="add_bit" placeholder="" >
					 </div>
					 
					  <div class = "form-group">
					  <input type="submit" class="btn btn-primary" value="Add" name="Add">
					 </div>
					 
				
					
					 </form>
				 
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
