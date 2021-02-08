<?php

if(!session_id())
{
     session_start();
}
//include db connection
require_once 'payment_dbConnect.php';


	if (!isset($_SESSION['customer_id'])) {
		header('Location: index.php');
	}

?>






<?php
//get data from customer table
$sql="select * from customer where customer_id = {$_SESSION['customer_id']}";
$result=$db->query($sql);
if($result->num_rows>0)
{
    $orderData = $result->fetch_assoc();
    $Customer_ID =$orderData['customer_id'];
    $First_Name =$orderData['first_name'];
    $Last_Name =$orderData['last_name'];
    $Address =$orderData['address'];
    $Email = $orderData['email'];
    $Phone_Number =$orderData['contact_number'];

}



$_SESSION['Customer_ID'] = $Customer_ID ;


?>
<style>

.error
{
    color: red;
}
</style>

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
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Checkout</span>
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
                <h4>Billing Details</h4>
                <form action="payment_update.php?ID=<?php echo $Customer_ID?>" method="POST">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name = "First_Name" value="<?php echo $First_Name; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name ="Last_Name" value="<?php echo $Last_Name; ?>"readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Address" name="Address" value="<?php echo $Address; ?>"class="checkout__input__add">
                                <div class="error">
                                    <?php if(isset($error_address))
                                    {
                                        echo $error_address;
                                    }
                                    ?>
                                </div>
                                
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name ="Phone_Number" value="<?php echo $Phone_Number; ?>">
                                        <div class="error">
                                            <?php if(isset($error_phoneNumber))
                                            {
                                                echo $error_phoneNumber;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="Email" value="<?php echo $Email ?>">
                                        <div class="error">
                                            <?php if(isset($error_email))
                                            {
                                                echo $error_email;
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
 
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div id ="paymentResponse"><div>
                                <div class="checkout__order__products">Products <span>Price</span></div>
                                <ul>
                                    <?php

                                    if(!empty($_SESSION["shopping_cart"]))
                                    {
                                        $total = 0;
                                        foreach($_SESSION["shopping_cart"] as $keys => $values)
                                        {
                        
                                            echo "<li>" .$values["item_name"]." (".$values["item_quantity"].") <span>".$values["item_quantity"] * $values["item_price"]."</span></li>";
                                            $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                        }
                                    ?>
                                </ul>
                                <h4></h4>
                                <div class="checkout__order__total"> Total <span><?php echo $total ?></span></div>
                                    <?php
                                    }?>
                                <button type="submit" class="site-btn" id ="submitBtn" name="submit">Submit</button>
                            </div>
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

