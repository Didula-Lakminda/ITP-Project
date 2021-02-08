<?php

include 'Connection.php';


session_start();
if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

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

    <!--table design-->
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
      background-color: black;
      color: white;
    }
    </style>

    <!--search bar design-->
    <style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
    </style>
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
                             Supplier
                            <small>Supplier Details</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Supplier
                            </li>
                        </ol>
                        
                        <!-- Image Show -->
<center>

<!--PHP Display Code Start -->
<!-- One By one display with genarating next, previous and number buttons -->
<?php

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    $num = 01;
    $start = ($page-1)*01;



            $query = "SELECT * FROM `supplierproduct` limit $start,$num";
            $query_run = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($query_run))
            {
                ?>
                    <div class="col-lg-7">
                            <div class="checkout__order">
                                <center>
                                <?php echo '<img src="data:image;base64,'.base64_encode($row['Image']).'" alt = "Image" width="350px" height="200px">'; ?></center>
                        
                                    <h4 style="text-align: center">Request ID : <span><?php echo $row['RequestID']; ?></span></h4>
                                    <h4 style="text-align: center">Product Name : <span><?php echo $row['ProductName']; ?></span></h4>
                                    <h4 style="text-align: center">Approved Type : <span><?php echo $row['ApprovedType']; ?></span></h4>


<?php    
                
            }

        $re_query = "SELECT * FROM `supplierproduct`";
        $query_res = mysqli_query($connection, $re_query);

        $total = mysqli_num_rows($query_res);

        $total_page = ceil($total/$num);

        if($page > 1)
        {
            echo "<a href = 'imgnew.php?page=".($page-1)."' class = 'btn btn-danger'>Previous</a>";
        }

        for($i=1;$i<$total_page;$i++)
        {
            echo "<a href = 'imgnew.php?page=".$i."' class = 'btn btn-primary'>$i</a>";
        }

        if($i > $page)
        {
            echo "<a href = 'imgnew.php?page=".($page+1)."' class = 'btn btn-danger'>Next</a>";
        }

?>
                           </div>
                    </div>
<br><br>
<!-- PHP Display Code End -->

</center>

<!--Image Show -->


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