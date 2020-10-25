<?php include("db_connection.php");?>
 <?php
		
		$id=$_SESSION['var'];
		mysqli_query($conn,"update package set package_removed=1 where package_id='$id'");
		
		header("Location: package_list.php");
	?>