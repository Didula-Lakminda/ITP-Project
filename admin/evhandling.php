<?php
include "connectiondb.php";

session_start();
if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}


?>

<html lang="en">
<head>
  <title>Event Hnadling</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Css style links-->
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
						
						
						
						
						
						
						
						
<!-- Getting event details to belonging textfields-->						<div class="container">
<div class="col-lg-4">
  <h2>Event Handling</h2>
  <br>
  <h3> Event </h3>
  <br>
  <h4> Crete and Manage Events</h4>
  <br>
  <form action="" name="form1" method="post">
	<div class="form-group">
      <label for="eventname">Event Name:</label>
      <input type="text" class="form-control" id="eventname" placeholder="Enter Event Name" name="eventname" required>
    </div>
	
	<div class="form-group">
      <label for="eventtype">Event Type:</label>
      <input type="text" class="form-control" id="eventtype" placeholder="Enter Event Type" name="eventtype" required>
    </div>
 
    <div class="form-group">
      <label for="edate">Event Date:</label>
      <input type="date" class="form-control" id="edate" placeholder="Enter Event Date" name="edate" required>
    </div>
	
    <div class="form-group">
      <label for="ediscriptiotn">Event Discription:</label>
      <input type="text" class="form-control" id="ediscriptiotn" placeholder="Enter Event Discription" name="ediscriptiotn" required>
    </div>
	
	<div class="form-group">
      <label for="towh">To:</label>
      <input type="text" class="form-control" id="towh" placeholder="To Whom" name="towh" required>
    </div>
	
	<button type="submit" name="insert" class="btn btn-default">INSERT</button>

<br>
<br>
<br>
	<h3>Events </h3>
<br><br>	
	
  </form>
  </div>
</div>

<div class="col-lg-12">
<!-- Creating Event Table-->

	 <table class="table table-bordered">
    <thead>
      <tr>
		<th>#</th>
        <th>EventName</th>
		<th>EventType</th>
        <th>EventDate</th>
		<th>EventDiscription</th>
		<th>To</th>
		<th>Edit</th>
		<th>Delete</th>
	
		
      </tr>
    </thead>
    <tbody>
<!-- Getting Details to Event Table from the database-->
	<?php
	$res=mysqli_query($link,"select * from events");
		while($row=mysqli_fetch_array($res))
		{
			echo"<tr>";
			echo"<td>"; echo $row["eventid"]; echo"</td>";
			echo"<td>"; echo $row["ename"]; echo"</td>";
			echo"<td>"; echo $row["type"]; echo"</td>";
			echo"<td>"; echo $row["date"]; echo"</td>";
			echo"<td>"; echo $row["description"]; echo"</td>";
			echo"<td>"; echo $row["towh"]; echo"</td>";
			
		
			echo"<td>";?> <a href="evupdate.php?id=<?php echo $row["eventid"];?>"> <button type="button" class="btn btn-success"> Edit</button></a> <?php echo"</td>";
			echo"<td>";?> <a href="evdelete.php?id=<?php echo $row["eventid"]; ?>"> <button type="button" class="btn btn-danger"> Delete</button> </a><?php echo"</td>";
			
			echo"</tr>";
			
		}
	
	
	?>
     
     
    </tbody>
  </table>


</div>
<center>

<button style="background-color: #555555; color:white; width:100px; height:40px; "><a style="color:white;" href="eventpdf.php">PDF</a></button>
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
<!-- Insert New data to Event toble in the database-->
<?php
if(isset($_POST["insert"]))

{
$sql = mysqli_query($link,"insert into events values(NULL,'$_POST[eventtype]','$_POST[eventname]','$_POST[edate]','$_POST[ediscriptiotn]','$_POST[towh]')");
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