<?php

require_once 'payment_dbConnect.php';

$R_ID =$_GET['R_ID'];

$query = "UPDATE customer_payment SET Process = 'Success' WHERE Receipt_ID = $R_ID";

$result = mysqli_query($db,$query);

if($result)
{
	header("location:admin_payment.php?e=1");
}
?>