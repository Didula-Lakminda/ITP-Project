<!-- Event table update-->

<?php
include "connectiondb.php";
$eventid=$_GET["id"];

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}


$eventname="";
$eventtype="";
$edate="";
$ediscriptiotn="";
$towh="";

$res=mysqli_query($link,"select * from events where eventid=$eventid");
	while ($row=mysqli_fetch_array($res))
	{
		$eventname=$row["ename"];
		$eventtype=$row["type"];
		$edate=$row["date"];
		$ediscriptiotn=$row["description"];
		$towh=$row["towh"];
		
	}
?>

<html lang="en">
<head>
  <title>Event Update</title>
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
<!-- Gettimg the fields using Event id -->
  <h2>Event Handling</h2>
  <br>
  <h3> Crete Event</h3>
  <br>
  <h4> Crete and Manage Events</h4>
  <br>
  <form action="" name="form1" method="post">
	<div class="form-group">
      <label for="eventname">Event Name:</label>
      <input type="text" class="form-control" id="eventname" placeholder="Enter Event Name" name="eventname" value="<?php echo $eventname;?>" required>
    </div>
	
	<div class="form-group">
      <label for="eventtype">Event Type:</label>
      <input type="text" class="form-control" id="eventtype" placeholder="Enter Event Type" name="eventtype" value="<?php echo $eventtype;?>" required>
    </div>
 
    <div class="form-group">
      <label for="edate">Event Date:</label>
      <input type="date" class="form-control" id="edate" placeholder="Enter Event Date" name="edate" value="<?php echo $edate;?>" required>
    </div>
	
    <div class="form-group">
      <label for="ediscriptiotn">Event Discription:</label>
      <input type="text" class="form-control" id="ediscriptiotn" placeholder="Enter Event Discription" name="ediscriptiotn" value="<?php echo $ediscriptiotn;?>" required>
    </div>
	
	<div class="form-group">
      <label for="towh">To:</label>
      <input type="text" class="form-control" id="towh" placeholder="To Whom" name="towh" value="<?php echo $towh;?>" required>
    </div>
	
	<button type="submit" name="update" class="btn btn-default">Update</button>

<br>
<br>
<br>
	<h3>Events </h3>
<br><br>	
	
  </form>
  </div>
</div>




</body>
<!-- Event table update-->
<?php

if(isset($_POST["update"]))
{
	$SQL = mysqli_query($link,"update events set ename='$_POST[eventname]',type='$_POST[eventtype]',date='$_POST[edate]',description='$_POST[ediscriptiotn]',towh='$_POST[towh]' where eventid=$eventid");
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
	window.location="evhandling.php"
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