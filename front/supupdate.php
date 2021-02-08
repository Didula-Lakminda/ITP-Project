<?php session_start(); ?>
<?php require_once('inc/connection.php'); ?>
<?php
if (!isset($_SESSION['supplier_id'])) {
		header('Location: index.php');
	}
$user_id = $_SESSION['supplier_id'];
	?>


<!-- Update PHP Start -->
<?php
    if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $image = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
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

                $query = "UPDATE `supplierproduct` SET `Image`='".$image."',`SupplierEmail`='".$sname."',`ProductName`='".$pname."',`Category`='".$cate."',`Address`='".$address."',`Quantity`= $quan,`Price`= $price ,`Discount`='".$dis."',`ExpiredDate`='".$edate."',`Description`='".$des."' WHERE `RequestID` = $id AND `user_id` = $user_id";
                
                $result = mysqli_query($connection, $query);

                if($result)
                {
                    echo '<script type="text/javascript"> alert("Updated Successfully") </script>';
                }
                else
                {
                    echo '<script type="text/javascript"> alert("Can not Updated") </script>';
                }
         }
                }
                else
                {
                    echo '<script type="text/javascript"> alert("Insert Valid Image Type") </script>';
                }

}
    
?>
<!-- Update PHP End --> 

<html>
<head>

    <style>
#fm{
    width: 50%;
    height: 6%;
    border: 1px;
    border-radius: 05px;
    padding: 8px 15px 8px 15px;
    margin: 10px 0px 15px 0px;
    box-shadow: 1px 1px 2px 1px green;
    font-weight: bold;
}

#fs{
    width: 90%;
    height: 5%;
    border: 1px;
    border-radius: 05px;
    padding: 10px 15px 25px 15px;
    margin: 10px 0px 10px 0px;
    box-shadow: 1px 1px 2px 1px green;
    font-weight: bold;
}
 }


    </style>

	<title> Search And Update Data </title>

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
                        <h2>Enter Your New Request Details</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>New Request</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!-- Breadcrumb Section End -->

    <!-- Search Form Design -->
    <!-- Hero Section Begin -->
        <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Update Product</span>
                        </div>
                        <ul>

                <!-- Search Form Start -->
                    <form action="supupdate.php" method="POST">
                        <input type="text" name="id" placeholder="Search Product Name Or ID " id = "fs"/>
                        <input type="submit" name="search" value="Only Search" id = "fs"/>
                        <input type="submit" name="fill" value="Search And Update" id = "fs"/>
                    </form>
                    <center>
                <!-- Search Form End -->

                <!-- Search Form PHP Start -->
                    <?php
                        if(isset($_POST['search']))
                        {
                            $id = $_POST['id'];

                            $query = "SELECT * FROM supplierproduct WHERE ProductName = '$id' || RequestID = '$id'";
                            $query_run = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_array($query_run))
                            {
                                ?>
                            </center>
                                    <li><span><?php echo '<img src="data:image;base64,'.base64_encode($row['Image']).'" alt = "Image" width="200px" height="150px">'; ?><span></li><br>
                                    <li>Request ID &#8594 <span><?php echo $row['RequestID']; ?></span></li>
                                    <li>Supplier Name &#8594 <span><?php echo $row['SupplierEmail']; ?></span></li>
                                    <li>Product Name &#8594 <span><?php echo $row['ProductName']; ?></span></li>
                                    <li>Category &#8594 <span><?php echo $row['Category']; ?></span></li>
                                    <li>Address &#8594 <span><?php echo $row['Address']; ?></span></li>
                                    <li>Quantity &#8594 <span><?php echo $row['Quantity']; ?></span></li>
                                    <li>Price &#8594 <span>Rs.<?php echo $row['Price']; ?></span></li>
                                    <li>Discount &#8594 <span><?php echo $row['Discount']; ?>%</span></li>
                                    <li>Expired &#8594 <span><?php echo $row['ExpiredDate']; ?></span></li>
                                    <li>Description &#8594 <span><?php echo $row['Description']; ?></span></li>
                                </ul>

                                <?php
                            }
                        }

                    ?>
                <!-- Search Form PHP End -->
            </ul>

            </div>
            </div>

                <div class="col-lg-9">
                <center>

    <!-- Fill Button PHP Code Start -->
                    <?php
                        if(isset($_POST['fill']))
                        {
                            $id = $_POST['id'];

                            $query = "SELECT * FROM supplierproduct WHERE (ProductName = '$id' || RequestID = '$id')AND user_id = $user_id ";
                            $query_run = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_array($query_run))
                            {
                                ?>


            <!-- New Update Form Start with Filling form -->
                <form action = "" method="POST" enctype="multipart/form-data" >
				
                <input type="hidden" name="user_id" id = "fm" value="<?php echo $user_id; ?>">

                <input type = "text" name = "id" placeholder="Your Request ID" value="<?php echo $row['RequestID'] ?>" id="fm" readonly/><br>
                <input type="file" name="image" id="fm"  required /><br>
                <input type = "text" name = "sname" placeholder="New Supplier Name" value="<?php echo $row['SupplierEmail'] ?>" id="fm" /><br>
                <input type = "text" name = "pname" placeholder="New Product Name" value="<?php echo $row['ProductName'] ?>" id="fm" /><br>
                
            <select name="cate" id="fm">
                <option value="<?php echo $row['Category']; ?>"><?php echo $row['Category']; ?></option>
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
            </select><br>


                <input type = "text" name = "address" placeholder="New Address" value="<?php echo $row['Address'] ?>" id="fm" /><br>
                <input type = "number" name = "quan" placeholder="New Quantity" value="<?php echo $row['Quantity'] ?>" id="fm" /><br>
                <input type = "number" name = "price" placeholder="New Price" value="<?php echo $row['Price'] ?>" id="fm" /><br>
                <input type = "text" name = "dis" placeholder="New Discount" value="<?php echo $row['Discount'] ?>" id="fm" /><br>
                <input type = "date" name = "edate" placeholder="New Expired Date" value="<?php echo $row['ExpiredDate'] ?>" id="fm" /><br>
                <input type = "text" name = "des" placeholder="New Description" value="<?php echo $row['Description'] ?>" id="fm" /><br>

                <input type = "submit" name = "update" value="Update Your Details" id="fm" /><br>
            <!-- New Update Form End with filling form -->
            </form>
                    <?php

                            }
                        }

                    ?>
            <!-- Fill Button PHP Code End -->
    </center>
                        
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!-- Section End -->

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