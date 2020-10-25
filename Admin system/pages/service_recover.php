<?php include("db_connection.php");?>
 <?php
		
		$id=$_SESSION['service1'];
		mysqli_query($conn,"update service set service_removed=0 where service_id='$id'");
		
		header("Location: service_list.php");
	?>