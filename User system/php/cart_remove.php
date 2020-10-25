  <?php include("db_connection.php");?>

  <?php
  
		$bbid=$_SESSION['var'];
	
		
		mysqli_query($conn,"delete from booking where booking_id='$bbid' ");
		mysqli_query($conn,"delete from event where booking_id='$bbid'");
		
		
		
		header("Location: cart.php");


?>