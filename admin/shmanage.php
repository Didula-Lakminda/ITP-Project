<?php
include "connectiondb.php";

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}

?>

<html lang="en">
<head>
  <title>ShareHolder Management</title>
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

    <title>Admin</title>

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
                            <small>Manage</small>
                        </h1>
					
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                
                            </li>
                        </ol>
						
						
						
						
						
						
						
						
						<div class="container">
<div class="col-lg-4">
  <h2>Shareholder Management</h2>
  <br>
  <h3> Add a Shareholders</h3>
  <br>
  <h4> Enter Details</h4>
  <br>
  <form action="" name="form1" method="post">
	<div class="form-group">
      <label for="uname">UserName:</label>
      <input type="text" class="form-control" id="Username" placeholder="Enter Username" name="uname" required>
    </div>
	
	<div class="form-group">
      <label for="fulname">Fullname:</label>
      <input type="text" class="form-control" id="fulname" placeholder="Enter Fullname" name="fulname" required>
    </div>
 
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email"  class="form-control" id="email" placeholder="Enter Email" name="email" required>
    </div>
	
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter Password" name="pwd" required>
    </div>
	
	<div class="form-group">
      <label for="shper">Share Percentage:</label>
      <input type="text" class="form-control" id="shper" placeholder="Enter Share percentage" name="shper" required>
    </div>
	
	<div class="form-group">
      <label for="dob">Date of Birth:</label>
      <input type="date" class="form-control" id="dob" placeholder="Enter Date of Birth" name="dob" required>
    </div>
	<div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Shareholder's Home Adress" name="address" required>
    </div>
	
	<div class="form-group">
      <label for="nic">Nic:</label>
      <input type="text" class="form-control" id="nic" placeholder="Enter National Identity no" name="nic" required>
    </div>
	
	
	<button type="submit" name="insert" class="btn btn-default" onclick="myfunction()">INSERT</button>
	
	
	<div id="snackbar">Insert Succsess.</div>

<script>
function myFunction() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script>

<style>
#snackbar {
  visibility: hidden;
  min-width: 250px;
  margin-left: -125px;
  background-color: #333;
  color: #fff;
  text-align: center;
  border-radius: 2px;
  padding: 16px;
  position: fixed;
  z-index: 1;
  left: 50%;
  bottom: 30px;
  font-size: 17px;
}

#snackbar.show {
  visibility: visible;
  -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
  animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
  from {bottom: 0; opacity: 0;} 
  to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
  from {bottom: 0; opacity: 0;}
  to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
  from {bottom: 30px; opacity: 1;} 
  to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
  from {bottom: 30px; opacity: 1;}
  to {bottom: 0; opacity: 0;}
}
</style>

<br>
<br>
<br>

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


	<h3>Company Shareholders </h3>
<br><br>	
	
  </form>
  </div>
</div>

<div class="col-lg-12">

<!-- Creating Shareholder Table-->
	 <table class="table table-bordered">
    <thead>
      <tr>
		<th>#</th>
        <th>UserName</th>
		<th>Fullname</th>
        <th>Email</th>
        <th>Share Percentage</th>
		<th>Date of Birth</th>
		<th>Address</th>
		<th>NIC</th>
		<th>Password</th>
		<th>Edit</th>
		<th>Delete</th>
		
      </tr>
    </thead>
    <tbody>
	
	
	
	<!-- Show shareholder datails-->
	<?php
	$res=mysqli_query($link,"select * from shareholder");
		while($row=mysqli_fetch_array($res))
		{
			echo"<tr>";
			echo"<td>"; echo $row["shareholderid"]; echo"</td>";
			echo"<td>"; echo $row["username"]; echo"</td>";
			echo"<td>"; echo $row["shfull_name"]; echo"</td>";
			echo"<td>"; echo $row["email"]; echo"</td>";
			echo"<td>"; echo $row["share_percentage"]; echo"</td>";
			echo"<td>"; echo $row["dateofbirth"]; echo"</td>";
			echo"<td>"; echo $row["address"]; echo"</td>";
			echo"<td>"; echo $row["nic"]; echo"</td>";
			echo"<td>"; echo $row["password"]; echo"</td>";
			echo"<td>";?> <a href="shedit.php?id=<?php echo $row["shareholderid"];?>"> <button type="button" class="btn btn-success"> Edit</button></a> <?php echo"</td>";
			echo"<td>";?> <a href="shdelete.php?id=<?php echo $row["shareholderid"]; ?>"> <button type="button" class="btn btn-danger"> Delete</button> </a><?php echo"</td>";
			
			echo"</tr>";
			
		}
	
	
	?>
     
     
    </tbody>
  </table>


</div>

<center>
<button style="background-color: #555555; color:white; width:100px; height:40px; "><a style="color:white;" href="shareholderpdf.php">PDF</a></button>
</center>
						
						
						
						
						
						
						
						
						
						
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



















</body>
<!-- Insert new shareholders to the system-->
<?php
if(isset($_POST["insert"]))
	
{
$sql = mysqli_query($link,"insert into shareholder values(NULL,'$_POST[uname]','$_POST[pwd]','$_POST[email]','$_POST[fulname]','$_POST[shper]','$_POST[dob]','$_POST[address]','$_POST[nic]')");
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
		



</html>