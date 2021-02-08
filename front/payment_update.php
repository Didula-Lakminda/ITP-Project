<?php

//connect db connection page
require_once 'payment_dbConnect.php';




//start the seeion
if(!session_id())
{
     session_start();
}

$Customer_ID = $_SESSION['Customer_ID'];











//get bill details and insert into payment table
if(isset($_POST['submit']))
{
    $Address = $_POST['Address'];
    $Email = $_POST['Email'];
    $Phone_Number = $_POST['Phone_Number'];
    $First_Name = $_POST['First_Name'];

}

//validate address
if(empty($Address))
{
    $error_address = 'Please insert your address or submit default*';
}

//validate email
if(empty($Email))
{
    $error_email = 'Please insert your email or submit default*';
}
else if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
{
    $error_email = 'Input valid email or submit default*'; 
}

//validate phone number
if(empty($Phone_Number))
{
    $error_phoneNumber = 'Please insert your phone number or submit default*';
}
else if (!filter_var($Phone_Number, FILTER_VALIDATE_INT)) 
{
    $error_phoneNumber = 'Insert valid phone number or submit default*';
}


if(empty($error_address) && empty($error_email) && empty($error_phoneNumber))
{

    //insert data to payment table
    $query = "Insert into customer_payment(Customer_ID,Process,Payment_Method,Address,Email,Phone_Number,First_Name) 
    Values($Customer_ID,'Pending','Cash on delivery','$Address','$Email',$Phone_Number,'$First_Name')";

    $insertResult = mysqli_query($db,$query);


    //get receipt id and start a sessiom
    $sql="select Max(Receipt_ID) as 'Max_Receipt' from customer_payment where Customer_ID = $Customer_ID";
    $result=$db->query($sql);
    if($result->num_rows>0)
    {
        $orderData = $result->fetch_assoc();
        $Receipt_ID = $orderData['Max_Receipt'];
    }
    $_SESSION['Receipt_ID'] = $Receipt_ID ;


    //insert into cart
    if(!empty($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            $product_Name = $values["item_name"];
            $quantity = $values["item_quantity"];
            $price = $values["item_price"];

            $cart_query ="insert into payment_cart(Receipt_ID,customer_id,Product_Name,Quantity,Price)
            values($Receipt_ID,$Customer_ID,'$product_Name',$quantity,$price)";

            $cartResult = mysqli_query($db,$cart_query);
        }
    }

    $sql="select * from customer_payment where Customer_ID = $Customer_ID and Receipt_ID = $Receipt_ID";
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
    $sql="select Price,Quantity from payment_cart where Receipt_ID = $Receipt_ID";
    $result=$db->query($sql);
    if($result->num_rows>0)
    {
        $total=0;
        While($row = $result->fetch_assoc())
        {
            $total = $total + $row["Quantity"] * $row["Price"];
        }
    }





    //send email to customer
    $mail_subject = 'Receipt details';
    $email_body = "Sunshine Supermarket <br><br>";
    $email_body .= "Receipt No : {$Receipt_ID} <br>";
    $email_body .= "Total : {$total} <br>";
    $email_body .= "Customer name : {$First_Name} <br>";
    $email_body .= "Phone Number : {$Phone_Number} <br>";
    $email_body .= "Email : {$Email} <br>" ;
    $email_body .= "Payment Method : {$Payment_Method} <br>" ;
    $email_body .= "Date : {$Date} <br>" ;



    $header = "From: {$Email} \r\nContent-Type :text/html;";

    $send_mail_result = mail($Email,$mail_subject ,$email_body,$header);



    if(isset($insertResult))
    { 



        header("location:payment_success.php");

    }

}        
else
{

    include('payment.php');
    
}


?>
 