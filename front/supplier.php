<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php
if (!isset($_SESSION['supplier_id'])) {
		header('Location: index.php');
	}
$user_id = $_SESSION['supplier_id'];
	?>




<html lang="zxx">
<head>
<style>
select{
    width: 50%;
    height: 6%;
    border: 1px;
    border-radius: 05px;
    padding: 8px 15px 8px 15px;
    margin: 10px 0px 15px 0px;
    box-shadow: 1px 1px 2px 1px green;
    font-weight: bold;
}

input{
    width: 50%;
    height: 6%;
    border: 1px;
    border-radius: 05px;
    padding: 8px 15px 8px 15px;
    margin: 10px 0px 15px 0px;
    box-shadow: 1px 1px 2px 1px green;
    font-weight: bold;
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

 <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Accept Categories</span>
                        </div>
                        <ul>
                            <li><a href="#">Vegetable</a></li>
                            <li><a href="#">Meat</a></li>
                            <li><a href="#">Fruits</a></li>
                            <li><a href="#">Cleaning Items</a></li>
                            <li><a href="#">Soap</a></li>
                            <li><a href="#">Chocolate</a></li>
                            <li><a href="#">Biscuit</a></li>
                            <li><a href="#">Medicine</a></li>
                            <li><a href="#">Cool Items</a></li>
                            <li><a href="#">Milk Powder</a></li>
                            <li><a href="#">Spices</a></li>
                            <li><a href="#">Flour</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
        <center>
            <form action = "" method="POST" enctype="multipart/form-data">

            <input type = "file" name = "image" id="image" required /><br><br>

            <input type = "email" name = "sname" placeholder="Your Email" value="<?php echo @$_POST['sname']; ?>" /><br><br>

            <input type = "text" name = "pname" placeholder="Product Name" value="<?php echo @$_POST['pname']; ?>" /><br><br>

           <select name="cate" value="<?php echo @$_POST['cate'] ?>" >
                <option value="">Select Category</option>
                <option value="Vegetable">Vegetable</option>
                <option value="Meat">Meat</option>
                <option value="Fruit">Fruit</option>
                <option value="Cleaning Item">Cleaning Item</option>
                <option value="Soap">Soap</option>
                <option value="Chocolate">Chocolate</option>
                <option value="Biscuit">Biscuit</option>
                <option value="Medicine">Medicine</option>
                <option value="Cool Item">Cool Item</option>
                <option value="Milk Powder">Milk Powder</option>
                <option value="Spices">Spices</option>
                <option value="Flour">Flour</option>
            </select><br><br>
			
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">

            <input type = "address" name = "address" placeholder="Address" value="<?php echo @$_POST['address']; ?>" /><br><br>

            <input type = "number" name = "quan" placeholder="Quantity Of your Product" value="<?php echo @$_POST['quan']; ?>" /><br><br>

            <input type = "number" name = "price" placeholder="Price (per 1KG or 1 Item)" value="<?php echo @$_POST['price']; ?>" /><br><br>

            <input type = "number" name = "dis" placeholder="Discount" value="<?php echo @$_POST['dis']; ?>" /><br><br>

            <input type = "date" name = "edate" placeholder="Expired Date" value="<?php echo @$_POST['edate']; ?>" /><br><br>

            <input type = "text" name = "des" placeholder="Description About Your Product" value="<?php echo @$_POST['des']; ?>" /><br><br>

            <input type = "submit" name = "request" value="Request"/><br><br>
            <input type = "reset" name = "reset" value="Reset"/>
        </form>
    </center>
                        
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!-- Hero Section End -->


    <!-- Footer Section Begin -->
    <?php include "include/footer.php"?>
    <!-- Footer Section End -->


        <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>    
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
   <!-- <script src="payment_js/sweetalert.min.js"></script> -->
   <!-- <script>
        const changedata =$('.change-data').data('changedata')
        if(changedata)
        {
            swal("Success!", "Request Successfully!", "success").then((OK) =>{
                if(OK){
                    document.location.href ='supplier.php';
                }
            });
        }
    </script> -->
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/request.js"></script>
</body>
</html>

<!-- Validate Form -->
 <?php 
    if(isset($_POST['request']))
    {
        $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
        $imgtype = addslashes($_FILES["image"]["type"]);
        $sname = $_POST['sname'];
        $pname = $_POST['pname'];
        $cate = $_POST['cate'];
        $address = $_POST['address'];
        $quan = $_POST['quan'];
        $price = $_POST['price'];
        $dis = $_POST['dis'];
        $edate = $_POST['edate'];
        $des = $_POST['des'];

        if(substr($imgtype, 0,5) == "image")
        {
                    if($sname==""){
                    echo '<script type="text/javascript"> alert("Please Insert Supplier Name") </script>';
                    }
                    else if($pname==""){
                        echo '<script type="text/javascript"> alert("Please Insert Product Name") </script>';
                    }
                    else if($cate==""){
                        echo '<script type="text/javascript"> alert("Please Insert Category") </script>';
                    }
                    else if($address==""){
                        echo '<script type="text/javascript"> alert("Please Insert Address") </script>';
                    }
                    else if($quan==""){
                        echo '<script type="text/javascript"> alert("Please Insert Quantity") </script>';
                    }
                    else if($price==""){
                        echo '<script type="text/javascript"> alert("Please Insert Price") </script>';
                    }
                    else if($dis==""){
                        echo '<script type="text/javascript"> alert("Please Insert Discount") </script>';
                    }
                    else if($edate==""){
                        echo '<script type="text/javascript"> alert("Please Insert Expired Date") </script>';
                    }
                    else if($des==""){
                        echo '<script type="text/javascript"> alert("Please Insert Description") </script>';
                    }
                    else{

                    $query = "INSERT INTO `supplierproduct`(`user_id`,`Image`,`SupplierEmail`,`ProductName`, `Category`, `Address`, `Quantity`, `Price`, `Discount`, `ExpiredDate`, `Description`, `ApprovedType`) VALUES ($user_id,'$file','$sname','$pname', '$cate', '$address', '$quan', '$price', '$dis', '$edate', '$des' , 'Pending')";

                    $query_run = mysqli_query($connection,$query);

                    if($query_run)
                    {
                        echo '<script type="text/javascript"> alert("Request Successfully") </script>';

                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Request Failed") </script>';
                    }


            }
                    }
                    else
                    {
                        echo '<script type="text/javascript"> alert("Insert valid Image Type") </script>';
                    }



        }
 ?>

 <!-- End Form Validation -->
