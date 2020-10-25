<?php include("checklogin.php");?>
<?php
	$_SESSION["pagename"] = "";
	
	
		$bid=$_SESSION['bbid'];
		
	
	$booking=mysqli_query($conn,"select * from booking where booking_id='$bid'");
	$booking1=mysqli_fetch_assoc($booking);

?>

<?php


	if(isset($_POST['cancel']))
	{
		$acc=$_POST['acc'];
		$bank=$_POST['bank'];
		$name=$_POST['name'];
		
		$refund=mysqli_query($conn,"select * from refund where booking_id='$bid'");
		$refund1=mysqli_fetch_assoc($refund);
		$amount=$booking1['booking_total']/2;
		
		if(mysqli_num_rows($refund)<1)
		{
		$result=mysqli_query($conn,"insert into refund(booking_id,refund_bank,refund_account,refund_name,refund_amount) values ('$bid','$bank','$acc','$name','$amount');");
		date_default_timezone_set('Asia/Kuala_Lumpur');

		$today = date('Y-m-d');
		if($result)
		{
			mysqli_query($conn,"update booking set booking_status='cancelled', refund_status='refund',cancel_datetime='$today' where booking_id='$bid'");
			
			$done=1;
		}
		}
		else
		{
			$done=2;
		}
		
		
			$aaresult=mysqli_query($conn,"select * from booking where booking_id='$bid'");
			$aaresult1=mysqli_fetch_assoc($aaresult);
			$aanama=$aaresult1['c_id'];

			$cago=mysqli_query($conn,"select * from customer where c_id='$aanama'");
			$cago1=mysqli_fetch_assoc($cago);
			$cname=$cago1['c_name'];
		
		
			date_default_timezone_set('Asia/Kuala_Lumpur');

			$date = date('Y-m-d H:i:s');
			
			$notype="cancelorder";
			$nocontent="$cname cancelled booking order without refund.";
			
			$noti=mysqli_query($conn,"select * from admin");
			while($noti1=mysqli_fetch_assoc($noti))
			{
			
			$notiaid=$noti1['ad_id'];

			$rego=mysqli_query($conn,"insert into notification (notification_type,notification_content,notification_status,admin_id,notification_datetime) values
			('$notype','$nocontent','unread','$notiaid','$date')");
			}
		
	}
	
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Funtastic Event</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="css1/open-iconic-bootstrap.min.css1">
    <link rel="stylesheet" href="css1/animate.css">
    
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="css1/magnific-popup.css">

    <link rel="stylesheet" href="css1/aos.css">

    <link rel="stylesheet" href="css1/ionicons.min.css">

    <link rel="stylesheet" href="css1/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css1/jquery.timepicker.css">
<link rel="shortcut icon" href="img/titlelogo.png">
    
    <link rel="stylesheet" href="css1/flaticon.css">
    <link rel="stylesheet" href="css1/icomoon.css">
    <link rel="stylesheet" href="css1/style.css">
	<link rel = "stylesheet" type = "text/css" href = "sweetalert-master/dist/sweetalert.css">
  </head>
    <script>

	function ve_acc()
	{
		var acc = document.getElementById("acc");
		var mess_acc = document.getElementById("mess_acc");
		var mess_acc1 = document.getElementById("mess_acc1");
		var checkacc;
		
		if(acc.value == "")
		{
			mess_acc.style.display = "table-row";
			mess_acc1.innerHTML = "You can't leave this empty.";
			acc.style.borderColor = "rgba(234,80,80,0.8)";
			checkacc = 1;
		}
		else if(acc.value.length <= 9)
		{
			mess_acc.style.display = "table-row";
			mess_acc1.innerHTML = "Please enter validate account number.";
			acc.style.borderColor = "rgba(234,80,80,0.8)";
			checkacc = 1;
		}
		else
		{
			mess_acc.style.display = "none";
			mess_acc1.innerHTML = "";
			acc.style.borderColor = "#3c763d";
			checkacc = 0;
		}
		return checkacc;
	}
	
	function ve_acc2()
	{
		var acc = document.getElementById("acc");
		var mess_acc = document.getElementById("mess_acc");
		var mess_acc1 = document.getElementById("mess_acc1");
		
		acc.style.borderColor = "#ccc";
		mess_acc.style.display = "none";
		mess_acc1.innerHTML = "";
	}
	

	function cancelform()
	{
		var checknum = ve_acc();

		
		if(checknum == 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	</script>
  <style>
  @import url(https://fonts.googleapis.com/css?family=Roboto);


header img {
  border-radius: 50%;
  margin: 20px auto;
  display: block;
  width: 200px;
  border: 5px solid #fff;
}
#colorlib-aside
{
	 border-top: 4px solid #26A69A;
  border-bottom: 4px solid #00695C;
  border-radius: 5px;

  box-shadow: 0 0 70px 10px #fff;
}
aside {
  border-top: 0px solid #26A69A;
  border-bottom: 0px solid #00695C;
  border-radius: 50%;
  margin: 0 auto;
  display: block;
  height: 300px;
  width: 300px;
  background: url("<?php echo $row["c_profilepic"]; ?>");
  background-size: cover;
  overflow: hidden;
  box-shadow: 0 0 100px 10px #fff;
  transition: all ease 0.3s;
}

aside:hover {
  border-top: 4px solid #26A69A;
  border-bottom: 4px solid #00695C;
  border-radius: 5px;
  height: 500px;
  width: 500px;
  box-shadow: 0 0 70px 10px #fff;
}

aside:hover header img {
  animation: profile_image 2000ms linear both;
  animation-delay: 0.5s;
}

header {
  text-align: center;
}

header h1 {
  position: relative;
  text-align: center;
  color: #fff;
  text-shadow: 1px 1px rgba(0, 0, 0, 0.5);
  font-size: 25px;
  line-height: 25px;
  display: inline-block;
  padding: 10px;
  transition: all ease 0.250s;
  border-top: 1px solid #fff;
  border-bottom: 1px solid #fff;
}

aside:hover header h1 {
  margin-top: 0px;
  outline: 0 solid #fff;
  border-top: 0px solid #fff;
  border-bottom: 1px solid #fff;
}

header h2 {
  text-align: center;
  color: #fff;
  text-shadow: 1px 1px rgba(0, 0, 0, 0.5);
  font-size: 17px;
  font-weight: normal;
  line-height: 0px;
  margin: 0;
}

.profile-bio {
  margin-top: 20px;
  padding: 1px 20px 10px 20px !important;
  transition: all linear 1.5s;
  color: #fff;
  font-size: 16px;
  opacity: 0;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.42) 69%, rgba(0, 0, 0, 0.42) 69%, rgba(0, 0, 0, 0.61) 100%);
}

aside:hover .profile-bio {
  opacity: 1;
}

.profile-bio p:first-child {
  text-align: center;
  font-size: 16px;
}

.profile-social-links {
  position: relative;
  margin-top: -440px;
  margin-left: -100px;
  list-style-type: none;
  opacity: 0;
  transition: all ease 0.5s;
}

aside:hover .profile-social-links {
  margin-left: -30px;
  opacity: 1;
}

.profile-social-links li img {
  width: 30px;
  background: #fff;
  border-radius: 50%;
  padding: 5px;
}
/*PROFILE IMAGE ANIMATE */

@keyframes profile_image {
  0% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  3.4% {
    transform: matrix3d(1.032, 0, 0, 0, 0, 1.041, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  4.7% {
    transform: matrix3d(1.045, 0, 0, 0, 0, 1.06, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  6.81% {
    transform: matrix3d(1.066, 0, 0, 0, 0, 1.089, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  9.41% {
    transform: matrix3d(1.088, 0, 0, 0, 0, 1.117, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  10.21% {
    transform: matrix3d(1.094, 0, 0, 0, 0, 1.123, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  13.61% {
    transform: matrix3d(1.112, 0, 0, 0, 0, 1.133, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  14.11% {
    transform: matrix3d(1.114, 0, 0, 0, 0, 1.133, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  17.52% {
    transform: matrix3d(1.121, 0, 0, 0, 0, 1.124, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  18.72% {
    transform: matrix3d(1.121, 0, 0, 0, 0, 1.119, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  21.32% {
    transform: matrix3d(1.12, 0, 0, 0, 0, 1.107, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  24.32% {
    transform: matrix3d(1.115, 0, 0, 0, 0, 1.096, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  25.23% {
    transform: matrix3d(1.113, 0, 0, 0, 0, 1.094, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  29.03% {
    transform: matrix3d(1.106, 0, 0, 0, 0, 1.09, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  29.93% {
    transform: matrix3d(1.105, 0, 0, 0, 0, 1.09, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  35.54% {
    transform: matrix3d(1.098, 0, 0, 0, 0, 1.096, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  36.74% {
    transform: matrix3d(1.097, 0, 0, 0, 0, 1.098, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  41.04% {
    transform: matrix3d(1.096, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  44.44% {
    transform: matrix3d(1.097, 0, 0, 0, 0, 1.103, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  52.15% {
    transform: matrix3d(1.099, 0, 0, 0, 0, 1.101, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  59.86% {
    transform: matrix3d(1.101, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  63.26% {
    transform: matrix3d(1.101, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  75.28% {
    transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  85.49% {
    transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  90.69% {
    transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  100% {
    transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
}
/*NAME ANIMATE */

aside:hover header h1 {
  animation: name_and_job 1500ms linear both;
  animation-delay: 0.4s;
}

@keyframes name_and_job {
  0% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, 0, 0, 1);
  }
  1.3% {
    transform: matrix3d(3.905, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -237.02, 0, 0, 1);
  }
  2.55% {
    transform: matrix3d(4.554, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -182.798, 0, 0, 1);
  }
  4.1% {
    transform: matrix3d(4.025, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -125.912, 0, 0, 1);
  }
  5.71% {
    transform: matrix3d(3.039, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -79.596, 0, 0, 1);
  }
  8.11% {
    transform: matrix3d(1.82, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -31.647, 0, 0, 1);
  }
  8.81% {
    transform: matrix3d(1.581, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -21.84, 0, 0, 1);
  }
  11.96% {
    transform: matrix3d(1.034, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 4.825, 0, 0, 1);
  }
  12.11% {
    transform: matrix3d(1.023, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 5.53, 0, 0, 1);
  }
  15.07% {
    transform: matrix3d(0.947, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 12.662, 0, 0, 1);
  }
  16.12% {
    transform: matrix3d(0.951, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 13.007, 0, 0, 1);
  }
  27.23% {
    transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 2.352, 0, 0, 1);
  }
  27.58% {
    transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 2.121, 0, 0, 1);
  }
  38.34% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.311, 0, 0, 1);
  }
  40.09% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.291, 0, 0, 1);
  }
  50% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.048, 0, 0, 1);
  }
  60.56% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.007, 0, 0, 1);
  }
  82.78% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  100% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
}



@keyframes social_animation {
  0% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, 0, 0, 1);
  }
  1.3% {
    transform: matrix3d(3.905, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -237.02, 0, 0, 1);
  }
  2.55% {
    transform: matrix3d(4.554, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -182.798, 0, 0, 1);
  }
  4.1% {
    transform: matrix3d(4.025, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -125.912, 0, 0, 1);
  }
  5.71% {
    transform: matrix3d(3.039, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -79.596, 0, 0, 1);
  }
  8.11% {
    transform: matrix3d(1.82, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -31.647, 0, 0, 1);
  }
  8.81% {
    transform: matrix3d(1.581, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -21.84, 0, 0, 1);
  }
  11.96% {
    transform: matrix3d(1.034, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 4.825, 0, 0, 1);
  }
  12.11% {
    transform: matrix3d(1.023, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 5.53, 0, 0, 1);
  }
  15.07% {
    transform: matrix3d(0.947, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 12.662, 0, 0, 1);
  }
  16.12% {
    transform: matrix3d(0.951, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 13.007, 0, 0, 1);
  }
  27.23% {
    transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 2.352, 0, 0, 1);
  }
  27.58% {
    transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 2.121, 0, 0, 1);
  }
  38.34% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.311, 0, 0, 1);
  }
  40.09% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.291, 0, 0, 1);
  }
  50% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.048, 0, 0, 1);
  }
  60.56% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.007, 0, 0, 1);
  }
  82.78% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  100% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
}
  </style>
  
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo"><a href="index.php">Funtastic Event<span>.</span></a></h1>
				<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li ><a href="customer.php">Home</a></li>
					<li ><a href="profile.php">My Profile</a></li>
					<li class="colorlib-active"><a href="profile_edit.php">Edit Profile</a></li>
					<li><a href="change_password.php">Change Password</a></li>
					<li ><a href="myevent.php">My Events</a></li>
					<li ><a href="myhistoryevent.php">My History Events</a></li>
					<li ><a href="package.php">Hold an Event</a></li>
					<li><a href="log_out.php">Log Out</a></li>
				</ul>
			</nav>

			
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<div style="background-color:white; background-repeat: no-repeat;" data-stellar-background-ratio="0.5">
			
			<h1 style="margin-left:30px; margin-top:50px;">Refund Request Form</h1>
			<p style="margin-left:30px; margin-top:50px;">Fill up the form to request for refundment.</p>
			<hr>
			
						<div style="margin-left:30px; margin-top:50px;">
							<form name = "editprofile" method = "POST" action = "" onsubmit="return cancelform()" autocomplete = "off" enctype="multipart/form-data" >
						<table>
						
					
						<tr>
						<td>
						<p style="font-weight:bold; ">Beneficiary Bank : </p>
						<input id = "editname" name = "bank"
						style="width:350px; height:30px;  font-size:16px;  margin-top:26px; text-transform:uppercase;" type="text" class="s-form-v4__input" 
						required />
						</td>
						</tr>
						
						<tr>
						<td>
						<br><br>
						<p style="font-weight:bold; ">Beneficiary Name : </p>
						<input id = "name" name = "name"
						style="width:350px; height:30px;  font-size:16px;  margin-top:26px; text-transform:uppercase;" type="text" class="s-form-v4__input" 
						required />
						</td>
						</tr>
						
						<tr>
						<td>
						<br><br>
						<p style="font-weight:bold; ">Bank Account Number :</p>	
						<input id="acc" name="acc" data-format="dddddddddd" onfocusout = "ve_acc()" 
						style="width:350px; height:30px;font-size:16px; margin-top:26px;" type="text" class="s-form-v4__input" >			
						</td>
						</tr>
						<tr id = "mess_acc">
							<td></td>
							<td><span id = "mess_acc1"></span></td>
						</tr>
						<tr>
						<td>
						<br>
						<br>
						<button style="margin-bottom:50px;"type = "submit" name = "cancel" onclick="cancelform()" class = "btn btn-primary"><span class = "glyphicon glyphicon-floppy-disk"></span> Cancel & Send Request</button>
						&nbsp;&nbsp;&nbsp;
						<button style="margin-bottom:50px;" type = "reset" class = "btn btn-danger">Reset</button>
						</td>
						</tr>
							
						</form>
                        </table>
				</div>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    <script type="text/javascript" src = "sweetalert-master/dist/sweetalert.min.js"></script>

  </body>
</html>
<?php
if(isset($_POST['cancel']))
{
	if($done=='1')
		{ 
			echo '<script>swal("Success", "Your request is submitted!", "success");</script>';
			
		}
		
		if($done=='2')
		{ 
			echo '<script>swal("Error", "You already requested for refund!", "error");</script>';
			
		}
}
?>