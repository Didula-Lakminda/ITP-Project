					
                                    <?php
                                    if(isset($_GET['edit'])){
                                        $Cat_ID = $_GET['edit'];
                                        $query = "SELECT*FROM category WHERE category_ID = $Cat_ID";
								        $select_category_ID = mysqli_query($con,$query);
							
									   while($row = mysqli_fetch_assoc($select_category_ID)){
                                        $Cat_title = $row['category_name'];
									    $Cat_ID = $row['category_ID'];
									   }
										
									}
									
									if(isset($_POST['update'])){
                                        $the_cat_title = $_POST['cat_title'];
										
										if($the_cat_title ==" " || empty($the_cat_title)){
										echo" <b>This Field Shoul not be empty</b>";
										}else{
										
                                        $query = "UPDATE category SET category_name ='{$the_cat_title}' WHERE category_ID = {$Cat_ID}";
                                        $update_query = mysqli_query($con,$query);
                                        header("Location:catogary_add.php");
										}
                                    }
									
									
									
									?>
                                    
								<form action = "" method = "post">
                                <div class = "form-group">
                                <lable for ="cat-title">Update Category</lable>
                                <input type = "text" value="<?php echo $Cat_title ;?>"  class = "form-control" name = "cat_title">
								</div>
                                <div class = "form-group">
                                <input class = "btn btn-primary" type = "submit" name = "update" value = "UPDATE">
                                </div>
                         </form>