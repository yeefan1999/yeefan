<?php include("checklogin.php");?>

<?php 

	$id1 = $row["c_id"];
	if(isset($_GET["id"]))
		{
		$bkid = $_GET["id"];
	}
	else
	{
		header("Location: myhistoryevent.php");
	}
$booking=mysqli_query($conn,"select * from booking where c_id='$id1' and booking_status!='processing' and booking_status!='pending' and booking_status!='cart' and booking_status!='paid';"); 


$event=mysqli_query($conn,"select * from event where booking_id='$bkid'");
$e1=mysqli_fetch_assoc($event);

$pid=$e1['package_id'];
$tid=$e1['theme_id'];
$sid1=$e1['service_id'];
$sid2=$e1['service_id2'];
$sid3=$e1['service_id3'];

$pack=mysqli_query($conn,"select * from package where package_id='$pid'");
$pack1=mysqli_fetch_assoc($pack);

$theme=mysqli_query($conn,"select * from theme where theme_id='$tid'");
$theme1=mysqli_fetch_assoc($theme);

$s1=mysqli_query($conn,"select * from service where service_id='$sid1'");
$service1=mysqli_fetch_assoc($s1);

$s2=mysqli_query($conn,"select * from service where service_id='$sid2'");
$service2=mysqli_fetch_assoc($s2);

$s3=mysqli_query($conn,"select * from service where service_id='$sid3'");
$service3=mysqli_fetch_assoc($s3);


$feedbackcheck=mysqli_query($conn,"select * from feedback where booking_id='$bkid'");

?>

<?php


	if(isset($_POST["feedback"]))
		{
			if(mysqli_num_rows($feedbackcheck)==0)
			{
			$prate=$_POST['prate'];
			$pfeed=$_POST['pfeedback'];
			$trate=0;
			$tfeed=0;
			$srate1=0;
			$sfeed1=0;
			$srate2=0;
			$sfeed2=0;
			$srate3=0;
			$sfeed3=0;
			
			if($tid!=0)
			{
			$trate=$_POST['trate'];
			$tfeed=$_POST['tfeedback'];
			}
			if($sid1!=0)
			{
			$srate1=$_POST['srate1'];
			$sfeed1=$_POST['sfeedback1'];
			}
			
			if($sid2!=0)
			{
			$srate2=$_POST['srate2'];
			$sfeed2=$_POST['sfeedback2'];
			}
			
			if($sid3!=0)
			{
			$srate3=$_POST['srate3'];
			$sfeed3=$_POST['sfeedback3'];
			}
			
			$resulttt=mysqli_query($conn,"insert into feedback (booking_id, package_id, package_rating, package_feedback, theme_id, theme_rating, theme_feedback,
			service1_id, service1_rating, service1_feedback, service2_id, service2_rating, service2_feedback, service3_id, service3_rating, service3_feedback)
			values ('$bkid','$pid','$prate','$pfeed','$tid','$trate','$tfeed','$sid1','$srate1','$sfeed1','$sid2','$srate2','$sfeed2','$sid3','$srate3','$sfeed3')");
			
			if($resulttt)
			{
				$done='1';
			}
			
			else
			{
				$done='0';
			}
			}
			
			else
			{
				$done=0;
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
<link rel="shortcut icon" href="img/titlelogo.png">
    <link rel="stylesheet" href="css1/ionicons.min.css">

    <link rel="stylesheet" href="css1/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css1/jquery.timepicker.css">
    <script src="js/ckeditor/ckeditor.js" ></script>

    
    <link rel="stylesheet" href="css1/flaticon.css">
    <link rel="stylesheet" href="css1/icomoon.css">
    <link rel="stylesheet" href="css1/style.css">
	<link rel = "stylesheet" type = "text/css" href = "sweetalert-master/dist/sweetalert.css">
  </head>
    <style>
  @import url(https://fonts.googleapis.com/css?family=Roboto);


header img {
  border-radius: 50%;
  margin: 20px auto;
  display: block;
  width: 200px;
  border: 5px solid #fff;
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
#colorlib-aside
{
	 border-top: 4px solid #26A69A;
  border-bottom: 4px solid #00695C;
  border-radius: 5px;

  box-shadow: 0 0 70px 10px #fff;
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
					<li><a href="profile_edit.php">Edit Profile</a></li>
					<li><a href="change_password.php">Change Password</a></li>
					<li ><a href="myevent.php">My Events</a></li>
					<li class="colorlib-active"><a href="myhistoryevent.php">My History Events</a></li>
					<li ><a href="package.php">Hold an Event</a></li>
					<li><a href="log_out.php">Log Out</a></li>
				</ul>
			</nav>

			
		</aside> <!-- END COLORLIB-ASIDE -->
	<div id="colorlib-main">
			<div style="background-color:white; background-repeat: no-repeat;" data-stellar-background-ratio="0.5">
			
			<h1 style="margin-left:30px; margin-top:50px;">Feedback</h1>
			<p style="margin-left:30px; margin-top:50px;">Fill up the form and leave us your feedback!</p>
			<hr>
			
						<div style="margin-left:30px; margin-top:50px;">
						<?php 
						if(mysqli_num_rows($feedbackcheck)==0)
						{?>
							
							<form name = "feedback" method = "POST" action = ""  autocomplete = "off" enctype="multipart/form-data" >
						<table>
						
					
						<tr>
						<td>
						<p style="font-weight:bold; font-size:20px; ">Package </p>
						<hr>
						
						<img src="../../admin system/pages/<?php echo $pack1['package_image'];?>" style="margin-top:20px; width:200px; height:200px; border-radius: 50%">
						<br><br>
						<p style="margin-left:20px; text-transform:uppercase;"><?php echo $pack1['package_name'];?>	</p>
						
						<br><br>
						<p style="font-weight:bold; ">Rating : </p><br>
						<select id = "prate" style="color:black;" name = "prate" class="s-form-v4__input" required
								style = "margin-top:15px;">
									<option value = "">--Rate--</option>
										<option value = "1">1 - Poor</option>
										<option value = "2">2 - Not Satisfied</option>
										<option value = "2">3 - Satisfied</option>
										<option value = "4">4 - Good</option>
										<option value = "5">5 - Excellent</option>
									
									</select>
						</td>
						</tr>
						
						<tr>
						<td>
						<br><br>
						<p style="font-weight:bold; ">Feedback : </p>
						<textarea id = "pfeedback" name = "pfeedback" class="s-form-v4__input" 
						required /></textarea>
						<script type="text/javascript">

								CKEDITOR.replace('pfeedback'); 

							</script>
						</td>
						</tr>
						
						<?php if($tid!=0){?>
						<tr>
						<td>
						<br><br><br><br><br>
						<p style="font-weight:bold; font-size:20px; ">Theme </p>
						<hr>
						
						<img src="../../admin system/pages/<?php echo $theme1['theme_image'];?>" style="margin-top:20px; width:200px; height:200px; border-radius: 50%">
						<br><br>
						<p style="margin-left:20px; text-transform:uppercase;"><?php echo $theme1['theme_name'];?>	</p>
						
						<br><br>
						<p style="font-weight:bold; ">Rating : </p><br>
						<select id = "trate" style="color:black;" name = "trate" class="s-form-v4__input" required
								style = "margin-top:15px;">
										<option value = "">--Rate--</option>
										<option value = "1">1 - Poor</option>
										<option value = "2">2 - Not Satisfied</option>
										<option value = "2">3 - Satisfied</option>
										<option value = "4">4 - Good</option>
										<option value = "5">5 - Excellent</option>
									
									</select>
						</td>
						</tr>
						
						<tr>
						<td>
						<br><br>
						<p style="font-weight:bold; ">Feedback : </p>
						<textarea id = "tfeedback" name = "tfeedback" class="s-form-v4__input" 
						required /></textarea>
						<script type="text/javascript">

								CKEDITOR.replace('tfeedback'); 

							</script>
						</td>
						</tr>
						<?php }?>
						
						<?php if($sid1!=0){?>
						<tr>
						<td>
						<br><br><br><br><br>
						<p style="font-weight:bold; font-size:20px; ">Additional Service </p>
						<hr>
						
						<img src="../../admin system/pages/<?php echo $service1['service_image'];?>" style="margin-top:20px; width:200px; height:200px; border-radius: 50%">
						<br><br>
						<p style="margin-left:20px; text-transform:uppercase;"><?php echo $service1['service_name'];?>	</p>
						
						<br><br>
						<p style="font-weight:bold; ">Rating : </p><br>
						<select id = "srate1" style="color:black;" name = "srate1" class="s-form-v4__input" required
								style = "margin-top:15px;">
										<option value = "">--Rate--</option>
										<option value = "1">1 - Poor</option>
										<option value = "2">2 - Not Satisfied</option>
										<option value = "2">3 - Satisfied</option>
										<option value = "4">4 - Good</option>
										<option value = "5">5 - Excellent</option>
									
									</select>
						</td>
						</tr>
						
						<tr>
						<td>
						<br><br>
						<p style="font-weight:bold; ">Feedback : </p>
						<textarea id = "sfeedback1" name = "sfeedback1" class="s-form-v4__input" 
						required /></textarea>
						<script type="text/javascript">

								CKEDITOR.replace('sfeedback1'); 

							</script>
						</td>
						</tr>
						<?php }?>
						
						<?php if($sid2!=0){?>
						<tr>
						<td>
						<br><br><br><br><br>
						<p style="font-weight:bold; font-size:20px; ">Additional Service </p>
						<hr>
						
						<img src="../../admin system/pages/<?php echo $service2['service_image'];?>" style="margin-top:20px; width:200px; height:200px; border-radius: 50%">
						<br><br>
						<p style="margin-left:20px; text-transform:uppercase;"><?php echo $service2['service_name'];?>	</p>
						
						<br><br>
						<p style="font-weight:bold; ">Rating : </p><br>
						<select id = "srate2" style="color:black;" name = "srate2" class="s-form-v4__input" required
								style = "margin-top:15px;">
										<option value = "">--Rate--</option>
										<option value = "1">1 - Poor</option>
										<option value = "2">2 - Not Satisfied</option>
										<option value = "2">3 - Satisfied</option>
										<option value = "4">4 - Good</option>
										<option value = "5">5 - Excellent</option>
									
									</select>
						</td>
						</tr>
						
						<tr>
						<td>
						<br><br>
						<p style="font-weight:bold; ">Feedback : </p>
						<textarea id = "sfeedback2" name = "sfeedback2" class="s-form-v4__input" 
						required /></textarea>
						<script type="text/javascript">

								CKEDITOR.replace('sfeedback2'); 

							</script>
						</td>
						</tr>
						<?php }?>
						
						<?php if($sid3!=0){?>
						<tr>
						<td>
						<br><br><br><br><br>
						<p style="font-weight:bold; font-size:20px; ">Additional Service </p>
						<hr>
						
						<img src="../../admin system/pages/<?php echo $service3['service_image'];?>" style="margin-top:20px; width:200px; height:200px; border-radius: 50%">
						<br><br>
						<p style="margin-left:20px; text-transform:uppercase;"><?php echo $service3['service_name'];?>	</p>
						
						<br><br>
						<p style="font-weight:bold; ">Rating : </p><br>
						<select id = "srate3" style="color:black;" name = "srate3" class="s-form-v4__input" required
								style = "margin-top:15px;">
										<option value = "">--Rate--</option>
										<option value = "1">1 - Poor</option>
										<option value = "2">2 - Not Satisfied</option>
										<option value = "2">3 - Satisfied</option>
										<option value = "4">4 - Good</option>
										<option value = "5">5 - Excellent</option>
									
									</select>
						</td>
						</tr>
						
						<tr>
						<td>
						<br><br>
						<p style="font-weight:bold; ">Feedback : </p>
						<textarea id = "sfeedback3" name = "sfeedback3" class="s-form-v4__input" 
						required /></textarea>
						<script type="text/javascript">

								CKEDITOR.replace('sfeedback3'); 

							</script>
						</td>
						</tr>
						<?php }?>
						
						
						
						
						
						
						<tr>
						<td>
						<br>
						<br>
						<button style="margin-bottom:50px;"type = "submit" name = "feedback"  class = "btn btn-primary"><span class = "glyphicon glyphicon-floppy-disk"></span> Send Feedback</button>
						&nbsp;&nbsp;&nbsp;
						<button style="margin-bottom:50px;" type = "reset" class = "btn btn-danger">Reset</button>
						</td>
						</tr>
							
						</form>
                        </table>
						<?php
						}
						
						else if(mysqli_num_rows($feedbackcheck)!=0)
							
							{?>
								<h1>You have already submitted feedback for this event booking. </h1>
								<h2>Thanks for your responses. Hope you will like our services.</h2>
							<?php
							}
						
						?>
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
if(isset($_POST['feedback']))
{
	if($done=='1')
		{ 
			echo '<script>swal("Success", "Your feedback is submitted!", "success");</script>';
			
		}
		
		else
		{ 
			echo '<script>swal("Error", "You already submitted your feedback.", "error");</script>';
			
		}
}
?>