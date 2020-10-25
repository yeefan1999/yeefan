<?php include("db_connection.php");?>
 <?php
		
		$id=$_SESSION['pack1'];
		mysqli_query($conn,"update package set package_removed=0 where package_id='$id'");
		
		header("Location: package_list.php");
	?>