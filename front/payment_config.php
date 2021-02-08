<?php

//product details
$productName = "Apple";
$productID = 1 ;
$productPrice = 25 ;
$currency = "RS";
//end of product details

//strip API configuration
define('STRIPE_API_KEY','sk_test_51HODgqBiSv8GiTzNmd3QSYDzgke2Qgrxw7M2NWB51cOe1Ki9HqWb9ghxZ6fMj8pj6Cy7ZttbXguJDQVJ5KtAIdSt00kpKKyiZa');
define( 'STRIPE_PUBLISHABLE_KEY' , 'pk_test_51HODgqBiSv8GiTzN3pGa9kIvBldBKt11f84RdQkMTM6DivAmzhKOdBqmRczdBXLBO2D3CjkFgWEgcN3P72aYhRBr00qTg13ZYU');
define('STRIPE_SUCCESS_URL' , 'payment_success.php');
define('STRIPE_FAIL_URL', '');
//end of strip API configuration

?>