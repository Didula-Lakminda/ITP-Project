<?php
include "connectiondb.php";

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}


$shareholderid=$_GET["id"];


$uname="";
$fulname="";
$email="";
$pwd="";
$shper="";
$dob="";
$address="";
$nic="";

$res=mysqli_query($link,"select * from shareholder where shareholderid=$shareholderid");
	while ($row=mysqli_fetch_array($res))
	{
		$uname=$row["username"];
		$fulname=$row["shfull_name"];
		$email=$row["email"];
		$pwd=$row["password"];
		$shper=$row["share_percentage"];
		$dob=$row["dateofbirth"];
		$address=$row["address"];
		$nic=$row["nic"];
		
	}
?>

<html lang="en">
<head>
  <title>Shareholder Upadte</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
  
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin </title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	
  
</head>






<body>




<div id="wrapper">

        <!-- Navigation -->
         <?php include "include\Navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Shareholder Management
                            <small>Update</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> 
                            </li>
                        </ol>
						
						
						
						
						
						<div class="container">
<div class="col-lg-4">
  <h3>Edit Shareholder Information</h3>
  <br>
  <br>
  <form action="" name="form1" method="post">
	<div class="form-group">
      <label for="email">UserName:</label>
      <input type="text" class="form-control" id="Username" placeholder="Enter Username" name="uname" value="<?php echo $uname;?>" required>
    </div>
	
	<div class="form-group">
      <label for="email">Fullname:</label>
      <input type="text" class="form-control" id="fulname" placeholder="Enter Fullname" name="fulname" value="<?php echo $fulname;?>" required>
    </div>
 
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email"  class="form-control" id="email" placeholder="Enter Email" name="email" value="<?php echo $email;?>" required>
    </div>
	
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd" value="<?php echo $pwd;?>" required>
    </div>
	
	<div class="form-group">
      <label for="shper">Share Percentage:</label>
      <input type="text" class="form-control" id="shper" placeholder="Enter Share percentage" name="shper" value="<?php echo $shper;?>" required>
    </div>
	
	<div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" id="dob" placeholder="Enter Date of Birth" name="dob" value="<?php echo $dob;?>" required>
    </div>
	<div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Shareholders Home Address" name="address" value="<?php echo $address;?>" required>
    </div>
	
	<div class="form-group">
      <label for="nic">Nic:</label>
      <input type="text" class="form-control" id="nic" placeholder="Enter National Identity no" name="nic" value="<?php echo $nic;?>" required>
    </div>
    
	<button type="submit" name="update" class="btn btn-default">Update</button>
	
	
  </form>
  </div>
</div>
				<script> 
function vlaid()                                    
{ 
    var uname = document.forms["form1"]["uname"];               
    var fulname = document.forms["form1"]["fulname"];    
    var email = document.forms["form1"]["email"];  
    var pwd = document.forms["form1"]["pwd"];               
    var shper = document.forms["form1"]["shper"];    
    var dob = document.forms["form1"]["dob"];
	var adddress = document.forms["form1"]["address"];    
    var nic = document.forms["form1"]["nic"];
   
    if (uname.value == "")                                  
    { 
        window.alert("Enter Username of the Shareholder."); 
        name.focus(); 
        return false; 
    } 
   
    if (fulname.value == "")                               
    { 
        window.alert("Enter full name of the Shareholder."); 
        address.focus(); 
        return false; 
    } 
       
    if (email.value == "")                                   
    { 
        window.alert("Please enter a valid e-mail address."); 
        email.focus(); 
        return false; 
    } 
   
    if (pwd.value == "")                           
    { 
        window.alert("Enter a password"); 
        phone.focus(); 
        return false; 
    } 
   
    if (shper.value == "")                        
    { 
        window.alert("Enter share eprcentage of Shareholder"); 
        password.focus(); 
        return false; 
    } 
	if (dob.value == "")                        
    { 
        window.alert("Enter Date of Birth Of the Sharenholder"); 
        password.focus(); 
        return false; 
    } 
	if (address.value == "")                        
    { 
        window.alert("Enter Shareholder Home Address); 
        password.focus(); 
        return false; 
    } 
	if (nic.value == "")                        
    { 
        window.alert("Enter Shareholder's National Identity No"); 
        password.focus(); 
        return false; 
    } 
   
    
   
    return true; 
}</script>




</body>
<!-- Upadting shareholder details-->
<?php

if(isset($_POST["update"]))
{
	$sql =mysqli_query($link,"update shareholder set username='$_POST[uname]',shfull_name='$_POST[fulname]',email='$_POST[email]',password='$_POST[pwd]', share_percentage=$_POST[shper]',dateofbirth='$_POST[dob]',address='$_POST[address]',nic='$_POST[nic]' where shareholderid=$shareholderid");
	if($sql == true)
	{
	$messsage = '<div class="alert alert-success" role="alert">Succsess</div>';
}
else{
	echo ''.mysql_error();
}


?>
<!-- refreshing page after data insertation-->
	<script type="text/javascript">
	window.location="shmanage.php"
	</script>

<?php

}

?>
						
						
						
						
						
						
						
						
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>



















</html>