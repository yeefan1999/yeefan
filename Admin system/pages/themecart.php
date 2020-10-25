<?php include("db_connection.php");?>
 <?php
		
		$id=$_SESSION['themeid11'];
		mysqli_query($conn,"update event set theme_id='$id' where package_id='$id'");
		
		header("Location: cart.php");
	?>