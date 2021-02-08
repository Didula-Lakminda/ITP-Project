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
                            Approved data
                        </h1>
						
							
							<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                               
                                <input type="text" name ="search" placeholder="SEARCH...">
                                <button type="submit" name="get" class = "btn btn-primary">SEARCH</button>
                            </form>
							<a href = 'approved_post.php' class='btn btn-primary'>All approved data</a>
							</br></br>
							<form action="Approved_item_pdf.php" method="post">
                                <button type="submit" name="btn_pdf" class = "btn btn-primary">PDF report</button>
                            </form>
						
						<?php include "approved_post_delete.php"?>
						<table class ="table table-bordered table-hover">
							<thead>
								<tr>
									<th>produt ID</th>
									<th>category name</th>
									<th>product name</th>
									<th>market price</th>
									<th>poduct image</th>
								</tr>
							</thead>
								<tbody>
									<?php
									
									if(isset($_POST['get'])){
                                
									$search = $_POST['search'];
									$query1 ="SELECT*FROM approved_item WHERE product_name LIKE'%$search%'";
									$search_query = mysqli_query($con,$query1);
                                
									while($row = mysqli_fetch_assoc($search_query)){
									$product_name = $row['product_name'];
									$market_price = $row['market_price'];
									$poduct_image = $row['poduct_image'];
									$category_ID = $row['category_ID'];
									$produt_ID = $row['produt_ID'];
									
									
									echo"<tr>";
                                            echo"<td>{$produt_ID}</td>";
											
											
											$query1 = "SELECT*FROM category WHERE category_ID = $category_ID";
											$select_category = mysqli_query($con,$query1);
							
											while($row = mysqli_fetch_assoc($select_category)){
											$title = $row['category_name'];
					
                                            echo"<td>{$title}</td>";
											}
                                            echo"<td>{$product_name}</td>";
											echo"<td>{$market_price}</td>";
                                            echo"<td><img width='100' src = 'image/$poduct_image' alt ='image'></td>";
											echo"<td><a href='edit_product.php?p_id={$produt_ID}'>Edit</a></td>";
											//echo"<td><a href='approved_post.php?delete={$produt_ID}'>Delete</a></td>";
											echo"<td><a rel='$produt_ID' href='javascripit:void(0)' class='delete_link'>Delete</a></td>";
											echo"</tr>";
									}}else{
									
									
									$query = "SELECT*FROM approved_item";
									$select_item = mysqli_query($con,$query);
							
									while($row = mysqli_fetch_assoc($select_item)){
									$produt_ID = $row['produt_ID'];
									$category_ID = $row['category_ID'];
									$product_name =$row['product_name'];
									$market_price =$row['market_price'];
									$poduct_image =$row['poduct_image'];
									
									
									
									echo"<tr>";
                                            echo"<td>{$produt_ID}</td>";
											
											
											$query1 = "SELECT*FROM category WHERE category_ID = $category_ID";
											$select_category = mysqli_query($con,$query1);
							
											while($row = mysqli_fetch_assoc($select_category)){
											$title = $row['category_name'];
					
                                            echo"<td>{$title}</td>";
											}
                                            echo"<td>{$product_name}</td>";
											echo"<td>{$market_price}</td>";
                                            echo"<td><img width='100' src = 'image/$poduct_image' alt ='image'></td>";
											echo"<td><a href='edit_product.php?p_id={$produt_ID}'>Edit</a></td>";
											//echo"<td><a href='approved_post.php?delete={$produt_ID}'>Delete</a></td>";
											echo"<td><a rel='$produt_ID' href='javascripit:void(0)' class='delete_link'>Delete</a></td>";
											echo"</tr>";
									}}
								?>
									
								</tbody>
						</table>
						
						
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	

	
	 <?php
                                    
         if(isset($_GET['delete'])){
         $the_ID = $_GET['delete'];
         $query = "DELETE FROM approved_item WHERE produt_ID = {$the_ID}";
         $delete_query = mysqli_query($con,$query);
         header("Location:approved_post.php");
         }
                                    
      ?>
	
	


	
	
	

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
	<script src="js/scripts.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    </body>
	</html>
	
	
	<script>
	
	$(document).ready(function(){
		$(".delete_link").on('click',function(){
			
			
			var id = $(this).attr("rel");
			var delete_url = "approved_post.php?delete="+ id +" ";
			
			$(".modal_delete_link").attr("href",delete_url);
			$("#myModal").modal('show');
		});
		
	});
	
	
	
	
	
	</script>
	