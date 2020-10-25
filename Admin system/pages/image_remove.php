<?php include("checklogin.php"); ?>

<?php

	if(isset($_GET["remid"]))
	{
		$reid = $_GET["remid"];
		
		$gogo=mysqli_query($conn,"update images set status=0 where id='$reid'");
		
		if($gogo)
		{
			$check=1;
		}
		else
		{
			$check=0;
		}
		
		$query1=mysqli_query($conn,"select * from images where id='$reid'");
		$q=mysqli_fetch_assoc($query1);
		$pid=$q['package_id'];
	}

?>

<?php

	if(isset($_GET["remid"]))
	{
	
		if($check=='1')
		{
			echo '<script>swal("Success", "This image has been removed from gallery.", "success");</script>';
			header("Location: image_view.php?id=$pid");
		}
		else
		{
			$check=0;
		}
	}

?>