<?php include("db_connection.php");?>
 <?php
		
		$id=$_SESSION['todolist'];
		mysqli_query($conn,"update todolist set todolist_removed=1 where todolist_id='$id'");
		
		header("Location: todolist.php");
	?>