<?php include("db_connection.php");?>
 <?php
		
		$id=$_SESSION['service'];
		mysqli_query($conn,"delete from service where service_id='$id'");
		
		header("Location: removed_service.php");
	?>