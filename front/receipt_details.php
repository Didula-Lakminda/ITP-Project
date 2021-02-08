 <?php

session_start();
$Customer_ID = $_SESSION['Customer_ID'];
$Receipt_ID = $_GET['R_ID'];

//include db connection
require_once 'payment_dbConnect.php';

//get data from payment table
$sql="select * from customer_payment where Receipt_ID = $Receipt_ID";
$result=$db->query($sql);
if($result->num_rows>0)
{
    $orderData = $result->fetch_assoc();
    $Receipt_No = $orderData['Receipt_ID'];
    $First_Name =$orderData['First_Name'];
    $Date = $orderData['Date'];
    $Payment_Method = $orderData['Payment_Method'];
    $Address =$orderData['Address'];
    $Email = $orderData['Email'];
    $Phone_Number =$orderData['Phone_Number'];


}







?>
 
<?php ob_start(); ?>
<?php include "include\hader.php"?>
<?php include "include\db.php"?>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <?php include "include\Humberger.php"?>
    <!-- Header Section End -->



    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Payments</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Receipt details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
       <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="index.html">                
                     <div class="col-lg-5 col-md-6 offset-lg-4">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products <span>Total</span></div>
                                <ul>
                                    <?php
                                     require_once 'payment_dbConnect.php';

                                        //get data from customer table
                                        $sql="select Product_Name, Price,Quantity from payment_cart where Receipt_ID = $Receipt_ID";
                                        $result=$db->query($sql);
                                        if($result->num_rows>0)
                                            $total = 0;
            
                                            While($row = $result->fetch_assoc())
                                            {
                                                echo "<li>" .$row["Product_Name"]." (".$row["Quantity"].")<span>".$row["Price"]*$row["Quantity"]."</span></li>";
                                                $total = $total + $row["Quantity"] * $row["Price"];
                                            }
                                    ?>
                                </ul>
                                <div class="checkout__order__total"> Total <span><?php echo $total ?></span></div>
                                </ul>
                                <h4>Billing Details</h4>
                                <ul>
                                    <li>Receipt No<span><?php echo $Receipt_No; ?></span></li>
                                    <li>Customer name <span><?php echo $First_Name; ?></span></li>
                                    <li>Address <span><?php echo $Address; ?></span></li>
                                    <li>Email<span><?php echo $Email; ?></span></li>
                                    <li>Phone number<span><?php echo $Phone_Number; ?></span></li>
                                    <li>Date<span><?php echo $Date; ?></span></li>
                                    <li>Payment method<span><?php echo $Payment_Method; ?></span></li>
                                </ul>
                            </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->


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
