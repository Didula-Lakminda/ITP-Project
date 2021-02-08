<?php

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}

if(isset($_POST['search']))
{
    if(!($_POST['value'])=='')
    {  
        $value = $_POST['value']; 
        $query ="select * FROM supplierproduct where RequestID = $value || ProductName = $value";
        $search_result = filterTable($query);
    }
    else
    {
        $query ="SELECT * FROM supplierproduct";
        $search_result = filterTable($query);   
    }

}
else
{
    $query ="SELECT * FROM supplierproduct";
    $search_result = filterTable($query);
}
Function filterTable($query)
{
    require_once 'Connection.php';
    $filter_Result = mysqli_query($connection,$query);
    return $filter_Result ;
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
            <!-- /.navbar-collapse -->
        </nav>

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
                        <!-- Add New Code -->
                        
                        <form class="example" action="approve.php" method ="POST">
                          <input type="text" placeholder="Enter Product ID" name="value">
                          <button type="submit"name="search"><i class="fa fa-search"></i></button>
                        </form></br>

                        <form action="" method ="POST">
                        <table id="customers">
                          <tr>
                            <th>Request ID</th>
                            <th>Supplier Email</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Address</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Expired Date</th>
                            <th>Description</th>
                            <th>Current Type</th>
                            <th>Approvement</th>
                          </tr>
                            <?php

                                While($row =mysqli_fetch_array($search_result))
                                {
                                    echo "<tr><td>".$row["RequestID"]."</td><td>".$row["SupplierEmail"]."</td><td>".$row["ProductName"]."</td><td>".$row["Category"]."</td><td>".$row["Address"]."</td><td>".$row["Quantity"]."</td><td>".$row["Price"]."</td><td>".$row["Discount"]."</td><td>".$row["ExpiredDate"]."</td><td>".$row["Description"]."</td><td>".$row["ApprovedType"]."</td><td><a href='update.php?R_ID=$row[RequestID]'>Approve</td></tr>";
                                }
                            ?>
                        </table>
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
<?php 
    if(isset($_GET['d'])):
?>
    <div class="change-data" data-changedata="<?=$_GET['d'];?>"></div>
    <?php endif ?>


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="payment_js/sweetalert.min.js"></script>
    <script>
        const changedata =$('.change-data').data('changedata')
        if(changedata)
        {
            swal("Success!", "Approved Successfully!", "success").then((OK) =>{
                if(OK){
                    document.location.href ='approve.php';
                }
            });
        }
                

    </script>

</body>

</html>