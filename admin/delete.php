<?php
$con = mysqli_connect('localhost',  'root', '', 'supermarket');

$R_ID = $_GET['R_ID'];

$query = "DELETE FROM ratings WHERE feedbackId = $R_ID";

$result = mysqli_query($con,$query);

if($result){
    header("location:feedbackadmin.php");
}
?>