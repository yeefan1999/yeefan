<?php include("db_connection.php");?>
 <?php
		
		$id=$_SESSION['theme'];
		mysqli_query($conn,"delete from theme where theme_id='$id'");
		
		header("Location: removed_theme.php");
	?>