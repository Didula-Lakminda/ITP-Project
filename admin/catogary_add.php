<?php ob_start(); ?>
<?php include "include\db.php"?>
<!DOCTYPE html>
<html lang="en">

<?php include "include\head.php"?>
<?php include "approved_post_delete.php";

session_start();
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
                            ADD
                            <small>Category</small>
                        </h1>
						
						<div class = "col-xs-6">
						
						<?php
                            if(isset($_POST['submit'])){
                                $cat_title = $_POST['cat_title'];
                                
                                if($cat_title ==" " || empty($cat_title)){
                                    
                                    echo" <b>This Field Shoul not be empty</b>";
                                }else{
                                    
                                    $query = "INSERT INTO category(category_name) VALUE('{$cat_title}')";
                                    $category_query = mysqli_query($con,$query);
									header("Location:catogary_add.php");
                                }
                                
                                
                            }

                           ?>
						
						
							
						
						
						
						
                                <form action = "" method = "post">
                                <div class = "form-group">
                                <lable for ="cat-title">Add Category</lable>
                                <input type = "text" class = "form-control" name = "cat_title">
                                </div>
                                <div class = "form-group">
                                <input class = "btn btn-primary" type = "submit" name = "submit" value = "ADD">
                                </div>
                                </form>
								
								
								<?php
								
								if(isset($_GET['edit'])){
								$Cat_ID = $_GET['edit'];
								include "include/update_catagory.php";
							     }
								
								?>
                            
                                
                            
                            
                            </div>
                            <div class = "col-xs-6">
                                <table class ="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category title</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									
									<?php
								$query = "SELECT*FROM category";
								$select_category = mysqli_query($con,$query);
							
									while($row = mysqli_fetch_assoc($select_category)){
									$title = $row['category_name'];
									$ID = $row['category_ID'];
									
									echo"<tr>";
                                            echo"<td>{$ID}</td>";
                                            echo"<td>{$title}</td>";
                                            //echo"<td><a href ='catogary_add.php?delete={$ID}'>Delete</a></td>";
											echo"<td><a rel='$ID' href='javascripit:void(0)' class='delete_link'>Delete</a></td>";
                                            echo"<td><a href ='catogary_add.php?edit={$ID}'>Edit</a></td>";
                                    echo"</tr>";
									
								}
								?>
                                        
                                <?php
                                    
                                    if(isset($_GET['delete'])){
                                        $the_ID = $_GET['delete'];
                                        $query = "DELETE FROM category WHERE category_ID = {$the_ID}";
                                        $delete_query = mysqli_query($con,$query);
                                        header("Location:catogary_add.php");
                                    }
                                    
                                ?>
                                        
                                    
                                    </tbody>
                                </table>
                            </div>
                       
                    
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
</div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    </body>
	</html>
	
	
	
	
<script>
	
	$(document).ready(function(){
		$(".delete_link").on('click',function(){
			
			
			var id = $(this).attr("rel");
			var delete_url = "catogary_add.php?delete="+ id +" ";
			
			$(".modal_delete_link").attr("href",delete_url);
			$("#myModal").modal('show');
			
			
			
			
			
		});
		
		
		
		
		
	});
	
	
	
	
	
	</script>