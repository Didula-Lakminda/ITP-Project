<?php ob_start(); 
session_start();
?>
<?php include "include\db.php"?>
<!DOCTYPE html>
<html lang="en">

<?php include "include\head.php";


if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}



?>

<?php

				//global $the_product_id;

				if(isset($_GET['p_id'])){
				$the_product_id = $_GET['p_id'];
				$query = "SELECT*FROM approved_item WHERE produt_ID = $the_product_id";
				$select_item = mysqli_query($con,$query);
				while($row = mysqli_fetch_assoc($select_item)){
				$produt_ID = $row['produt_ID'];
				$category_ID = $row['category_ID'];
				$product_name =$row['product_name'];
				$market_price =$row['market_price'];
				$poduct_image =$row['poduct_image'];
			}
		}
	

			   if(isset($_POST['update'])) {
				    $post_image = $_FILES["update_image"]["name"];
					$post_image_temp = $_FILES["update_image"]["tmp_name"];
					$Product_Name = $_POST['update_Product_Name'];
					$Product_Price = $_POST['update_Product_Price'];
					$Product_Category = $_POST['update_Product_Category'];
	
		
					move_uploaded_file($post_image_temp,"image/$post_image");
					
					 if(empty($post_image)) {
        
					$query2 = "SELECT * FROM approved_item WHERE produt_ID = $the_product_id ";
					$select_image = mysqli_query($con,$query2);
            
					while($row = mysqli_fetch_array($select_image)) {
            
					$post_image = $row['poduct_image'];
        
					   
			    }
				
			}
					
					
				
				$query = "UPDATE approved_item SET ";
				$query .="category_ID  = '{$Product_Category}', ";
				$query .="product_name = '{$Product_Name}', ";
				$query .="market_price = '{$Product_Price}', ";
				$query .="poduct_image = '{$post_image}' ";
				$query .= "WHERE produt_ID = {$the_product_id} ";
				
				$update_post = mysqli_query($con,$query); 
				
				header("Location:approved_post.php");
		}







?>


<body>
    <div id="wrapper">

        <!-- Navigation -->
        <?php include "include\Navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Edit
                            <small>approved data</small>
                        </h1>
						
						<div class = "col-xs-12">
                                <form action = "" method = "post" enctype="multipart/form-data">
                                <div class = "form-group">
                                <lable for ="cat-title">Edit Product Name</lable>
                                <input type = "text" class = "form-control" name = "update_Product_Name" value="<?php echo $product_name?>" required>
                                </div>
								<div class = "form-group">
                                <lable for ="cat-title">Edit Product price</lable>
                                <input type = "text" class = "form-control" name = "update_Product_Price" value="<?php echo $market_price?>" required>
                                </div>
								<div class = "form-group">
                                <lable for ="cat-title">Edit Category </lable>
                                  <select name="update_Product_Category" required>
								  
								 
								 <?php
								$query1 = "SELECT*FROM category WHERE category_ID = $category_ID";
								$select_category1 = mysqli_query($con,$query1);
							
									while($row = mysqli_fetch_assoc($select_category1)){
									$the_title = $row['category_name'];
									$the_ID = $row['category_ID'];
									
									echo "<option value= '{$the_ID}' >{$the_title}</option>";}
								?>
								 
								 
								<?php
								$query = "SELECT*FROM category";
								$select_category = mysqli_query($con,$query);
							
									while($row = mysqli_fetch_assoc($select_category)){
									$title = $row['category_name'];
									$ID = $row['category_ID'];
									
									echo "<option value= '{$ID}' >{$title}</option>";}
								?>
								
								
								
								</select>
                                </div>
								<div class = "form-group">
                                <lable for ="cat-title">update Product image</lable></br>
                                <img width='100' src = 'image/<?php echo $poduct_image; ?>' alt ='image'>
								<input  type="file" name="update_image">
                                </div>
								
								 <input type="hidden"  name="update_Id" value="<?php echo $the_product_id?>">
								
                                <div class = "form-group">
                                <input class = "btn btn-primary" type = "submit" name = "update" value = "Update">
                                </div>
								</form>
							

                            
                 </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	

	
	
	
	
	

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    </body>
	</html>