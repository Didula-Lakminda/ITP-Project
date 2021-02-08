<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php
if (!isset($_SESSION['supplier_id'])) {
		header('Location: all_details.php');
	}
$user_id = $_SESSION['supplier_id'];
	?>

<html lang="zxx">
<head>
<style>
table {
  border-collapse: collapse;
  width: 90%;
  margin-left: 5%;
}

th, td {
  border: 1px solid lightgreen;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>

	<meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Request Supplier Details </title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>


    <!-- Header Section Begin -->
    <?php include "include\Humberger.php"?>
    <!-- Header Section End -->

 <!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Supplier Request</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Supplier Request</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
 <!-- Breadcrumb Section End -->

 <form action="" method ="POST">
                        <table id="customers">
                          <tr>
                            <th>Image</th>
                            <th>Request ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Address</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Expired Date</th>
                            <th>Description</th>
                            <th>Current Type</th>
                          </tr>
                <?php
                    $query = "SELECT * FROM `supplierproduct` WHERE user_id=$user_id";
                    $query_run = mysqli_query($connection, $query);

                              While($row =mysqli_fetch_array($query_run))
                                {
                                ?>
                                <tr>
                                    <td><?php echo '<img src="data:image;base64,'.base64_encode($row['Image']).'" alt="Image" style="width: 100px; height:100px">'; ?></td>
                                <?php
                                    echo "<td>".$row["RequestID"]."</td><td>".$row["ProductName"]."</td><td>".$row["Category"]."</td><td>".$row["Address"]."</td><td>".$row["Quantity"]."</td><td>".$row["Price"]."</td><td>".$row["Discount"]."</td><td>".$row["ExpiredDate"]."</td><td>".$row["Description"]."</td><td>".$row["ApprovedType"]."</td>";
                                } 
                            ?>
                        </tr>
                        </table>

                    </form>
                        <form action="pdf_download.php" method="POST">
                           <center><button type="submit" name = "btn_pdf_download" class="btn btn-success">Download As a PDF</button></center>
                        </form>


    <!-- Footer Section Begin -->
    <?php include "include/footer.php"?>
    <!-- Footer Section End -->

        <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>    
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

<!-- Validate Form -->

 <!-- End Form Validation -->
