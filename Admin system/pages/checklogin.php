<?php include("db_connection.php");?>
<?php
	$logined_check = "";
	$id = "";
	$row = "";
	if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "1")) {
    header("Location: login.php");
    exit;}
	

	else if($_SESSION["login"] == 1)
	{
		$logined_check = 2;
		if(!empty($_SESSION["accountid"]))
		{
			$id = $_SESSION["accountid"];
		}
		else if(!empty($_SESSION["adid"]))
		{
			$id = $_SESSION["adid"];
		}
		else
		{
			$id = "";
		}
	}
	
	$id1 = "";
	if(isset($_COOKIE['ad_id']))
	{
		$id1 = $_COOKIE['ad_id'];
	}
	
	$register = mysqli_query($conn, "select * from admin where ad_id = '$id1'");
	$register1 = mysqli_query($conn, "select * from admin where ad_id = '$id'");
	
	if(mysqli_num_rows($register) == 1)
	{
		$row = mysqli_fetch_assoc($register);
	}
	else if(mysqli_num_rows($register1) == 1)
	{
		$row = mysqli_fetch_assoc($register1);
	}
	else
	{
		$row = "";

	}

?>