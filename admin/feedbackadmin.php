<?php
$con = mysqli_connect('localhost',  'root', '', 'supermarket');
$customerId = 1;

$getDataQuery = "SELECT * FROM ratings WHERE customerId='$customerId'";
$getDataresult = mysqli_query($con, $getDataQuery);

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}


?>


<!DOCTYPE html>
<html lang="en">

<head>

<style>
   #customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
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
  text-align: left;
  background-color: #4CAF50;
  color: white;
}

.bt
{
    position: absolute;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    background-color: #4CAF50;
    color: black;
    font-size: 16px;
    padding: 14px 30px;
    border: none;
    cursor: pointer;
    border-radius: 6px;
    text-align: center;
    top:150px;
    left:70px;
}

.bt:hover 
{
  background-color: black;
  color: white;
}

.delete
{
    position:relative;
    background-color:#FF0000;
    color:white;
}
</style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/bbootstrap.css">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous"></script>
    <script src="js/sweetalert.min.js"></script>
    
    <script>
        function alertPopup(){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                });
            } else {
                swal("Your imaginary file is safe!");
            }
             });
        }
    
    </script>


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
                        <h1 class="page-header">
                            Feedback
                            <small>Feedback Heading</small>
                        </h1>
                        <form action="pdf" method="POST">
                            <button type="button" name="bt_pdf" class="bt"><a href="pdf.php">PDF</a></button>
                        </form>
                         <br>
                         <br>
                         <br>
                         <br>
                        <ol class="breadcrumb">
                            
    
    <table border="1" id="customers">
        <tr>
            <th>id</th>
            <th>Customer Email</th>
            <th>Rating</th>
            <th>Relevancy of the results</th>
            <th>Comprehensive of information</th>
            <th>Image quality</th>
            <th>Filter selection</th>
            <th>Comment</th>
            <th>Delete</th>
        </tr>
    
        <?php while ($row = mysqli_fetch_array($getDataresult)) { ?>
            <tr>
                <td><?php echo $row['feedbackId'] ?></td>
                <td><?php echo $row['customerEmail'] ?></td>
                <td><?php echo $row['rating1'] ?></td>
                <td><?php echo $row['r2'] ?></td>
                <td><?php echo $row['r3'] ?></td>
                <td><?php echo $row['r4'] ?></td>
                <td><?php echo $row['r5'] ?></td>
                <td><?php echo $row['comment'] ?></td>
                <td><button type="button" onclick="alertPopup()" class="delete"><?php echo "<a href='delete.php?R_ID=$row[feedbackId]'>Delete</td>" ;?></button>
            </tr>
        <?php } ?>
        
    </table>

                        </ol>
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
