<?php
	include('server.php');
	
	session_start();
if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}
	
	//fetch the records to update
	if(isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db,"SELECT * FROM discounts WHERE id = $id");
		$record = mysqli_fetch_array($rec);
		$bitRange = $record['bit_range'];
		$offer = $record['offer'];
		$id = $record['id'];
	}
?>

!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>
	
	<link rel="stylesheet" type="text/css" href="styles.css">

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

 </head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
         <?php include "include\Navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
					
					<h2 style="text-align:center;"><strong>Customize the offers</strong></h2>
					
					<?php if (isset($_SESSION['msg'])): ?>
						<div class="msg">
							<?php
								echo $_SESSION['msg'];
								unset ($_SESSION['msg']);
							?>
							</div>
					<?php endif ?>
					
                        <table>
                           <tr>
								<th>Bit Point Range</th>
								<th>Gift pack</th>
								<th colspan = "2">Action</th>
						   </tr>
						   
						   <tbody>
								<?php
									while($row = mysqli_fetch_array($results)) {
								?>
							<tr>
								<td><?php echo $row['bit_range']; ?></td>
								<td><?php echo $row['offer']; ?></td>
								<td>
									<a class="edit_btn" href = "index.php?edit=<?php echo $row['id']; ?>">Edit</a>
								</td>
								
							</tr>
								<?php } ?>
							</tbody>	
                        </table>
						
						
						
						
						<form method="post" action="server.php">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
							<div class="input-group">
								<button type="submit" name="pdf" class="edit_btn">PDF</button>
							</div>
							
							<div class="input-group">
								<label>Bit point Range</label>
								<input type="text" name="bit_range" value="<?php echo $bitRange; ?>">
							</div>
							<div class="input-group">
								<label>Offer</label>
								<input type="text" name="offer" value="<?php echo $offer; ?>">
							</div>
							<div class="input-group">
								<?php if($edit_state == true): ?>
									<button type="submit" name="update" class="btns">Update</button>
								<?php endif ?>
								
							</div>
							
						</form>
                        
                    </div>
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
