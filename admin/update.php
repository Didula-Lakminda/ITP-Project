<?php

require_once 'Connection.php';

$R_ID =$_GET['R_ID'];

	$query = "UPDATE supplierproduct SET ApprovedType='Approved' WHERE RequestID = $R_ID";

	$result = mysqli_query($connection,$query);


	$mail = "SELECT SupplierEmail FROM supplierproduct WHERE RequestID = $R_ID";
	$res=$connection->query($mail);
	

	if($res->num_rows>0)
	{
		$orderData = $res->fetch_assoc();
		$RequestID = $orderData['SupplierEmail'];
	}



	$mail_subject = 'Message from website';
	$email_body = "Your Product Approved <br> Please Contact: 0773111099";

	$header = "From: {$mail} \r\nContent-Type: text/html;";

	$send_mail = mail($RequestID, $mail_subject, $email_body, $header);

	

	if($res)
		{
			echo "Message Sent";
		}
		else
		{
			echo "Message Not sent";
		}

	if($result)
	{
	header("location:approve.php?d=1");
	}

?>