<?php

require_once 'payment_dbConnect.php';

$R_ID =$_GET['R_ID'];

$query = "DELETE FROM customer_payment WHERE Receipt_ID = $R_ID";

$result = mysqli_query($db,$query);

if($result)
{
	header("location:admin_payment.php?d=1");
}