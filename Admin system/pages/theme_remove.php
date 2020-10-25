<?php include("db_connection.php");?>
<script type="text/javascript" src = "../sweetalert-master/dist/sweetalert.min.js"></script>
      <link rel = "stylesheet" type = "text/css" href = "../sweetalert-master/dist/sweetalert.css">

 <?php
		
		$id=$_SESSION['var2'];
		mysqli_query($conn,"update theme set theme_removed=1 where theme_id='$id'");?>
		<script>
		event.preventDefault();
		swal("Deleted!", "This service is removed.", "success");</script>
		<?php
		header("Location: theme_list.php");
	?>
	