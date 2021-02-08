
<?php require_once('inc/connection.php'); ?>
<?php require_once('inc/functions.php'); ?>
<?php
if(!isset($_GET["code"])){
	exit("Cant't find page");
}



	$code = $_GET["code"];

	$query = "SELECT email FROM reset WHERE code = '$code'";
						
	$result_set = mysqli_query($connection, $query);
	
	
	verify_query($result_set);

	
	
	if(mysqli_num_rows($result_set)== 0){
		exit("Can't find page");
	}
	
	
	if(isset($_POST["password"])){
		
		$pw = $_POST["password"];
		$hashed_password = sha1($pw);
		
		$row = mysqli_fetch_array($result_set);
		$email = $row["email"];
		
		$query = "UPDATE customer SET password = '$hashed_password' WHERE email='$email' ";
		
		$result_set = mysqli_query($connection, $query);
		
		verify_query($result_set);
	
		if($result_set){
			$query = "DELETE FROM reset WHERE code = '$code' ";
			
			$result_set = mysqli_query($connection, $query);
			
			verify_query($result_set);
			
			exit("password updated");
			
		}else
		{
			exit("fail password update");
		}
		
	}
	
	
	?>

<form method="POST">
	<input type="password" name="password" placeholder="New password" ">
	<br>
	<input type="submit" name="submit" value="Update password" ">

</form>