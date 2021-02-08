
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
    </style>
<?php ob_start(); ?>
<?php include "include\hader.php"?>
<?php include "include\db.php"?>

<?php
if(!session_id())
{
session_start();
}

$Customer_ID = $_SESSION['Customer_ID'];?>

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
                            <span>Payment details</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!--table begin-->
<center>
    <section class="checkout spad">
        <div class="container">
            <div class="col-lg-12 col-md-6">

                <table id="customers">
                  <tr>
                    <th>Receipt No</th>
                    <th>Process</th>
                    <th>Date</th>
                    <th>Method</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th>Phone number</th>
                    <th>View</th>
                  </tr>
                    <?php

                    require_once 'payment_dbConnect.php';

                    //get data from customer table
                    $sql="select Receipt_ID, Process,Date,Payment_Method,Address,Email,Phone_Number from customer_payment where Customer_ID = $Customer_ID";";
                    $result=$db->query($sql);
                    if($result->num_rows>0)
                        While($row = $result->fetch_assoc())
                        {
                            echo "<tr><td>".$row["Receipt_ID"]."</td><td>".$row["Process"]."</td><td>".$row["Date"]."</td><td>".$row["Payment_Method"]."</td><td>".$row["Address"]."</td><td>".$row["Email"]."</td><td>".$row["Phone_Number"]."</td><td><a href='receipt_details.php?R_ID=$row[Receipt_ID]'>View</td></tr>";
                        }
                    ?>
                </table>
            </div>
        </div>
    </section>
</center>



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