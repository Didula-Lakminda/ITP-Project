<!-- Deleting shareholder according to shareholder id-->

<?php
	include "connectiondb.php";
	$shareholderid=$_GET["id"];
	mysqli_query($link,"delete from shareholder where shareholderid=$shareholderid");
	
	?>
	
<script type="text/javascript">
window.location="shmanage.php";
	
</script>
