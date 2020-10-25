<?php include("db_connection.php");?>
 <?php
		
		$id=$_SESSION['var1'];
		mysqli_query($conn,"update service set service_removed=1 where service_id='$id'");
		
		header("Location: service_list.php");
	?>