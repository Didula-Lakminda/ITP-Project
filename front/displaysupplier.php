<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php
if (!isset($_SESSION['supplier_id'])) {
		header('Location: index.php');
	}
$user_id = $_SESSION['supplier_id'];
	?>


<html>
<head>
    <style>
        input{
                width: 90%;
                height: 5%;
                border: 1px;
                border-radius: 05px;
                padding: 8px 15px 8px 15px;
                margin: 10px 0px 15px 0px;
                box-shadow: 1px 1px 2px 1px green;
                font-weight: bold;
        }


    </style>
	<title> Display Supplier Request and Delete </title>

	<meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

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
   <!-- <link rel="stylesheet" href="css/supply.css" type="text/css"> -->

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
                        <h2>Display Request Details</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Display</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!-- Breadcrumb Section End -->

     <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Delete Request</span>
                        </div>
                        <ul>

        <!-- Delete By ID Form Start -->
        <form action="displaysupplier.php" method="POST">
            <input type="text" name="id" required placeholder="Insert Product ID" /><br><br>
            <input type="submit" name="delete" value="Delete">
        </form>
        <!-- Delete By ID Form End -->

    <!-- Delete PHP Code -->
    <?php

        if(isset($_POST['delete']))
        {
            $id = $_POST['id'];

            $query = "DELETE FROM `supplierproduct` WHERE `RequestID` = $id";

            $result = mysqli_query($connection,$query);

            if($result)
            {
                echo '<script type="text/javascript"> alert("Deleted Successfully") </script>';
            }
            else
            {
                echo '<script type="text/javascript"> alert("Delete Failed") </script>';
            }
        }

     ?>
    <!-- Delete PHP Code End -->
            </ul>
            </div>
        </div>

    <div class="col-lg-9">
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


            $query = "SELECT * FROM `supplierproduct` WHERE user_id=$user_id limit $start,$num";
            $query_run = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($query_run))
            {
                ?>
                    <div class="col-lg-7">
                            <div class="checkout__order">
                                <center>
                                <?php echo '<img src="data:image;base64,'.base64_encode($row['Image']).'" alt = "Image" width="350px" height="200px">'; ?></center>
								<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                                <ul>
                                    <li style="text-align: left">Request ID <span><?php echo $row['RequestID']; ?></span></li>
									<li style="text-align: left">Supplier ID <span><?php echo $row['user_id']; ?></span></li>
                                    <li style="text-align: left">Supplier Email <span><?php echo $row['SupplierEmail']; ?></span></li>
                                    <li style="text-align: left">Product Name <span><?php echo $row['ProductName']; ?></span></li>
                                    <li style="text-align: left">Category <span><?php echo $row['Category']; ?></span></li>
                                    <li style="text-align: left">Address <span><?php echo $row['Address']; ?></span></li>
                                    <li style="text-align: left">Quantity <span><?php echo $row['Quantity']; ?></span></li>
                                    <li style="text-align: left">Price <span>Rs.<?php echo $row['Price']; ?></span></li>
                                    <li style="text-align: left">Discount <span><?php echo $row['Discount']; ?>%</span></li>
                                    <li style="text-align: left">Expired Date <span><?php echo $row['ExpiredDate']; ?></span></li>
                                    <li style="text-align: left">Description <span><?php echo $row['Description']; ?></span></li>
                                    <li style="text-align: left">Approvement <span><?php echo $row['ApprovedType']; ?></span></li>

                                <form action="supupdate.php" method="POST">
                                    <button type="submit">Update</button>
                                </form>
                                <form action="all_details.php" method="POST">
                                  <button type="submit" name = "btn_pdf" class="btn btn-success">Show All Data</button>
                                </form>

                        <!-- Download PDF file -->





                                </ul>

                            </div>
                    </div>

<?php    
                
            }

        $re_query = "SELECT * FROM `supplierproduct` WHERE user_id=$user_id";
        $query_res = mysqli_query($connection, $re_query);

        $total = mysqli_num_rows($query_res);

        $total_page = ceil($total/$num);

        if($page > 1)
        {
            echo "<a href = 'displaysupplier.php?page=".($page-1)."' class = 'btn btn-warning'>Previous</a>";
        }

        for($i=1;$i<$total_page;$i++)
        {
            echo "<a href = 'displaysupplier.php?page=".$i."' class = 'btn btn-success'>$i</a>";
        }

        if($i > $page)
        {
            echo "<a href = 'displaysupplier.php?page=".($page+1)."' class = 'btn btn-warning'>Next</a>";
        }

?><br><br>
<!-- PHP Display Code End -->

    </center>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->


    <!-- Footer Section Begin -->
    <?php include "include/footer.php"?>
    <!-- Footer Section End -->

   <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>
</html>
