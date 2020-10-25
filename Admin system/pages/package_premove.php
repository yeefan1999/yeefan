<?php include("db_connection.php");?>
 <?php
		
		$id=$_SESSION['pack'];
		mysqli_query($conn,"delete from package where package_id='$id'");
		
		header("Location: removed_package.php");
	?>