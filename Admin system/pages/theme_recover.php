<?php include("db_connection.php");?>
 <?php
		
		$id=$_SESSION['theme1'];
		mysqli_query($conn,"update theme set theme_removed=0 where theme_id='$id'");
		
		header("Location: theme_list.php");
	?>