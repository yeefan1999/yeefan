<?php include("db_connection.php");?>
<?php
	$logined_check = "";
	$id = "";
	$row = "";
	if(!(isset($_SESSION["login"]) && $_SESSION["login"] == "1")) {
    header("Location: sign_in.php");
    exit;}
	
	if($_SESSION["login"] == 1)
	{
		$logined_check = 2;
		if(!empty($_SESSION["accountid"]))
		{
			$id = $_SESSION["accountid"];
		}
		
		else
		{
			$id = "";
		}
	}
	
	$id1 = "";
	if(isset($_COOKIE['c_id']))
	{
		$id1 = $_COOKIE['c_id'];
	}
	
	$register = mysqli_query($conn, "select * from customer where c_id = '$id1'");
	$register1 = mysqli_query($conn, "select * from customer where c_id = '$id'");
	
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