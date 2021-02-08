<!-- Delete Shareholders by thier Shareholder id-->

<?php
	include "connectiondb.php";
	
	session_start();
	if (!isset($_SESSION['admin_id'])) {
	header('Location: admin-login.php');
	}
	
	$eventid=$_GET["id"];
	mysqli_query($link,"delete from events where eventid=$eventid");
	
	
	
	?>
<!-- Refreshinf After the Delete-->	
<script type="text/javascript">
window.location="evhandling.php";
	
</script>