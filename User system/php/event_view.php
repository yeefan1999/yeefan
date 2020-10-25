<?php include("checklogin.php");?>

<?php 
	
	$id = "";
	
	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
	}
	else
	{
		header("Location: myevent.php");
	}
	$booking=mysqli_query($conn,"select * from booking where booking_id='$id';"); 
	$booking1= mysqli_fetch_assoc($booking);


	$bkid=$booking1["booking_id"];

	$evt=mysqli_query($conn,"select * from event where booking_id='$bkid';");
	$evt1=mysqli_fetch_assoc($evt);
	$pid=$evt1['package_id'];
	$tid=$evt1['theme_id'];
	$sid1=$evt1['service_id'];
	$sid2=$evt1['service_id2'];
	$sid3=$evt1['service_id3'];
	
	$pack=mysqli_query($conn,"select * from package where package_id='$pid'");
	$pack1=mysqli_fetch_assoc($pack);
	
	$theme=mysqli_query($conn,"select * from theme where theme_id='$tid'");
	$theme1=mysqli_fetch_assoc($theme);
	
	$service1=mysqli_query($conn,"select * from service where service_id='$sid1'");
	$service11=mysqli_fetch_assoc($service1);
	
	$service2=mysqli_query($conn,"select * from service where service_id='$sid2'");
	$service22=mysqli_fetch_assoc($service2);
	
	$service3=mysqli_query($conn,"select * from service where service_id='$sid3'");
	$service33=mysqli_fetch_assoc($service3);
	
	$cid = $row["c_id"];
	$customer=mysqli_query($conn,"select * from customer where c_id='$cid'");
	$c=mysqli_fetch_assoc($customer);
?>

<?php
require('fpdf181/fpdf.php');

if(isset($_POST["receipt"]))
{
	$name = $c["c_name"];
	$phone = $c["c_phonenumber"];
	$email = $c["c_email"];
	$address = $c["c_address"];
	$state = $c["c_state"];
	$postcode = $c["c_postcode"];
	$method = $booking1["booking_method"];
	$cardnumber = $booking1["booking_accnum"];
	
	$total = "";
	$reference=$booking1["booking_ref_num"];
	$date=$booking1["booking_date_time"];
	
	$pdf = new FPDF();
	$pdf->AddPage();
	$pdf->Ln(15);
	$pdf->Image('img/titlelogo.png',10,8,-100);

	$pdf->SetFont('Arial','B',20);
	$pdf->Cell(20,5,"                                                                          
	       Official Receipt",0,0,'C');
	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,5,"Funtastic Event",0,1);
	$pdf->Ln(1);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(20,5,"5, Jalan Serindit,",0,1);
	$pdf->Ln(1);
	$pdf->Cell(20,5,"Taman Rekamas 2,",0,1);
	$pdf->Ln(1);
	$pdf->Cell(20,5,"86200 Simpang Rengam,",0,1);
	$pdf->Ln(1);
	$pdf->Cell(20,5,"Johor.",0,1);
	$pdf->Ln(1);
	$pdf->Cell(20,5,"Tel: 07-7555855    Fax: 07-7555655",0,1);
	$pdf->Line(10,80,200,80);
	$pdf->Ln(10);
	$pdf->Cell(100,5," Receipt Issued Date Time : ".$booking1['booking_date_time'],1,1);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(90,5,"Customer Information",0,1);
	$pdf->Ln(5);
	$pdf->Rect(10, 108, 140, 34, 'D');
	
	$pdf->SetFont('Arial','',10);
	
	$pdf->Cell(120,5," Customer Name        :   ".strtoupper($name),0,1);
	$pdf->Cell(120,5," Customer Contact     :   ".strtoupper($phone),0,1);
	$pdf->Cell(120,5," Customer Email        :   ".$email,0,1);
	$pdf->Cell(120,5," Customer Address    :   ".strtoupper($address),0,1);
	$pdf->Cell(120,5," Customer Postcode  :   ".strtoupper($postcode),0,1);
	$pdf->Cell(120,5," Customer State         :   ".strtoupper($state),0,1);
	
	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(90,5,"Event Information",0,1);
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(120,5," Event Date                :   ".strtoupper($evt1['event_date']),0,1);
	$pdf->Cell(120,5," Event Location          :   ".strtoupper($evt1['event_location']),0,1);
	$pdf->Cell(120,5," Event Start Time       :   ".strtoupper($evt1['event_start_time']),0,1);
	$pdf->Cell(120,5," Event End Time        :   ".strtoupper($evt1['event_end_time']),0,1);
	$pdf->Rect(10, 162, 140, 26, 'D');
	
	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(90,5,"Billing Information",0,1);
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(120,5," Payment Method       :   ".strtoupper($method),0,1);
	$pdf->Cell(120,5," Card Number            :   ".'XXXXXXXXXX'.substr($cardnumber,-4),0,1);

	$pdf->Rect(10, 208, 140, 16, 'D');
	
	$pdf->Line(10,270,200,270);
	$pdf->Ln(50);
	$pdf->Image('img/logo-dark.png',170,270,-100);
	
	$pdf->AddPage();
	$pdf->Ln(15);
	$pdf->Image('img/titlelogo.png',10,8,-100);

	$pdf->SetFont('Arial','B',20);
	$pdf->Cell(20,5,"                                                                          
	       Official Receipt",0,0,'C');
	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,5,"Funtastic Event",0,1);
	$pdf->Ln(1);
	$pdf->SetFont('Arial','',12);
	$pdf->Cell(20,5,"5, Jalan Serindit,",0,1);
	$pdf->Ln(1);
	$pdf->Cell(20,5,"Taman Rekamas 2,",0,1);
	$pdf->Ln(1);
	$pdf->Cell(20,5,"86200 Simpang Rengam,",0,1);
	$pdf->Ln(1);
	$pdf->Cell(20,5,"Johor.",0,1);
	$pdf->Ln(1);
	$pdf->Cell(20,5,"Tel: 07-7555855    Fax: 07-7555655",0,1);
	$pdf->Line(10,80,200,80);
	$pdf->Ln(10);

	$pdf->SetFont('Arial','B',16);
	$pdf->Cell(150,5,"Item Purchased",0,1);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(75,5,"Item",0,0);
	$pdf->Cell(65,5,"Price (RM) ",0,0);
	$pdf->Cell(50,5,"Total (RM) ",0,1);
	$pdf->Ln(10);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(150,5,"Package",0,1);
	$pdf->Ln(5);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(75,5,strtoupper($pack1['package_name']),0,0);
	$pdf->Cell(65,5,strtoupper($pack1['package_price']),0,0);
	$pdf->Cell(50,5,strtoupper($pack1['package_price']),0,1);
	
	$pdf->Ln(15);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(150,5,"Theme",0,1);
	$pdf->Ln(5);
	if($theme1['theme_id']!=0)
	{
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(75,5,strtoupper($theme1['theme_name']),0,0);
	$pdf->Cell(65,5,strtoupper($theme1['theme_price']),0,0);
	$pdf->Cell(50,5,strtoupper($theme1['theme_price']),0,1);
	}
	else
	{
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(50,5,"-",0,0,"C");
	$pdf->Cell(80,5,"-",0,0,"C");
	$pdf->Cell(50,5,"-",0,0,"C");
	}
	$pdf->Rect(10, 98, 180, 10, 'D');
	$pdf->Rect(10, 98, 180, 120, 'D');
	$pdf->Rect(10, 98, 180, 40, 'D');
	$pdf->Rect(10, 98, 180, 75, 'D');
	$pdf->Rect(10, 98, 73, 120, 'D');
	$pdf->Rect(10, 98, 138, 120, 'D');
	$pdf->Ln(20);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(150,5,"Additional Services",0,1);
	$pdf->Ln(5);
	if($service11['service_id']!=0)
	{
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(75,5,strtoupper($service11['service_name']),0,0);
	$pdf->Cell(65,5,strtoupper($service11['service_price']),0,0);
	$pdf->Cell(50,5,strtoupper($service11['service_price']),0,1);
	}
	if($service22['service_id']!=0)
	{
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(75,5,strtoupper($service22['service_name']),0,0);
	$pdf->Cell(65,5,strtoupper($service22['service_price']),0,0);
	$pdf->Cell(50,5,strtoupper($service22['service_price']),0,1);
	}
	if($service33['service_id']!=0)
	{
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(75,5,strtoupper($service33['service_name']),0,0);
	$pdf->Cell(65,5,strtoupper($service33['service_price']),0,0);
	$pdf->Cell(50,5,strtoupper($service33['service_price']),0,1);
	}
	else if ($service11['service_id']==0 &&$service22['service_id']==0 &&$service33['service_id']==0)
	{
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(50,5,"-",0,0,"C");
	$pdf->Cell(80,5,"-",0,0,"C");
	$pdf->Cell(50,5,"-",0,0,"C");
	}
	$pdf->Line(10,270,200,270);
	$pdf->Ln(40);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(130,5,"Total (RM) : ",0,0,"R");
	$pdf->Cell(30,5,$booking1['booking_total'],0,0,"R");
	$pdf->Ln(46);
	$pdf->SetFont('Arial','',10);
	
	$pdf->Image('img/logo-dark.png',170,270,-100);
	$pdf->Output();
	
	

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
					<li class="colorlib-active"><a href="myevent.php">My Events</a></li>
					<li ><a href="myhistoryevent.php">My History Events</a></li>
					<li ><a href="package.php">Hold an Event</a></li>
					<li><a href="log_out.php">Log Out</a></li>
				</ul>
			</nav>

			
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<div style="background-image: url('img/1920x1080/081.jpg'); "data-stellar-background-ratio="0.5	">
				<h1 style="margin-left:30px; padding-top:50px;">Event Details</h1>
			<p style="margin-left:30px; margin-top:50px;">Look at your event details at once.</p>
			<hr>
		
					<div style="padding-left:100px; padding-top:100px">
					<table style="color:black; font-weight:bold; " border="1 text-align:left;" >
					<tr><th colspan="2" style="padding:10px 40px 10px 10px;">Event Details</th></tr>
					<tr>
					<th style="padding:10px 40px 10px 10px;">Booking Reference Number
					</th>
					<td style="padding:10px 40px 10px 10px;">EVT<?php echo $booking1['booking_ref_num'];?>
					</td>
					</tr>
					
					<tr>
					<td style="padding:10px 40px 10px 10px;">Event Date
					</td>
					<td style="padding:10px 40px 10px 10px;"><?php echo $evt1['event_date'];?>	
					</td>
					</tr>
					
					<tr>
					<td style="padding:10px 40px 10px 10px;">Event Start Time
					</td>
					<td style="padding:10px 40px 10px 10px;"><?php echo $evt1['event_start_time'];?>	
					</td>
					</tr>
					
					<tr>
					<td style="padding:10px 40px 10px 10px;">Event End Time
					</td>
					<td style="padding:10px 40px 10px 10px;"><?php echo $evt1['event_end_time'];?>	
					</td>
					</tr>
					
					<tr>
					<td style="padding:10px 40px 10px 10px;">Event Location
					</td>
					<td style="padding:10px 40px 10px 10px;"><?php echo $evt1['event_location'];?>	
					</td>
					</tr>
					
					<tr>
					<td style="padding:10px 40px 10px 10px;">Event Status
					</td>
					<td style="padding:10px 40px 10px 10px; text-transform:uppercase;"><?php echo $booking1['booking_status'];?>	
					</td>
					</tr>
					
					<tr>
					<td style="padding:10px 40px 10px 10px;">Event Total Price (RM)
					</td>
					<td style="padding:10px 40px 10px 10px; text-transform:uppercase;"><?php echo $booking1['booking_total'];?>	
					</td>
					</tr>
				
					</table>
					</div>
					<div style="padding-left:100px; padding-top:100px; padding-bottom:50px;">
					
					<table style="color:black; font-weight:bold; " border="1 text-align:left;" >
					<tr><th colspan="2" style="padding:10px 40px 10px 10px;">Package, Theme & Additional Services Details</th></tr>
					
					
					<tr>
					<td style="padding:10px 200px 10px 10px;">Package
					</td>
					<td style="padding:10px 80px 10px 80px; text-transform:uppercase; text-align:center;">
					<img src="../../admin system/pages/<?php echo $pack1['package_image'];?>" style="margin-top:20px; width:200px; height:200px; border-radius: 50%">
					<br><br>
					<?php echo $pack1['package_name'];?>	
					<br><br>
					RM <?php echo $pack1['package_price'];?>	
					</td>
					</tr>
					<tr>
					<td style="padding:10px 40px 10px 10px;">Theme
					</td>
					<td style="padding:10px 40px 10px 40px; text-transform:uppercase; text-align:center;">
					<?php if ($tid!=0) {?>
					<img src="../../admin system/pages/<?php echo $theme1['theme_image'];?>" style="margin-top:20px; width:200px; height:200px; border-radius: 50%">
					<br><br>
					<?php echo $theme1['theme_name'];?>	
					<br><br>
					RM <?php echo $theme1['theme_price'];}
					else
					{echo "-";}?>
					
					</td>
					</tr>
					
					<tr>
					<td style="padding:10px 40px 10px 10px;">Additional Services
					</td>
					<td style="padding:10px 40px 10px 40px; text-transform:uppercase; text-align:center;">
					<?php if ($sid1!=0) {?>
					<br><br>
					<img src="../../admin system/pages/<?php echo $service11['service_image'];?>" style="margin-top:20px; width:200px; height:200px; border-radius: 50%">
					<br><br>
					<?php echo $service11['service_name'];?>	
					<br><br>
					RM <?php echo $service11['service_price'];}
					if ($sid2!=0) {?>
					<br><br>
					<img src="../../admin system/pages/<?php echo $service22['service_image'];?>" style="margin-top:20px; width:200px; height:200px; border-radius: 50%">
					<br><br>
					<?php echo $service22['service_name'];?>	
					<br><br>
					RM <?php echo $service22['service_price'];}
					
					if ($sid3!=0) {?>
					<br><br>
					<img src="../../admin system/pages/<?php echo $service33['service_image'];?>" style="margin-top:20px; width:200px; height:200px; border-radius: 50%">
					<br><br>
					<?php echo $service33['service_name'];?>	
					<br><br>
					RM <?php echo $service33['service_price'];}
					
					else if ($sid1==0 && $sid2==0 && $sid3==0)
					{echo "-";}?>
					
					</td>
					</tr>
					</table>
					
					 <br>
					 <br>
					 <form method="post">
					 <button type="submit" name="receipt" class="btn btn-light">Generate Receipt</button></a>
					 
					 <a href="event_view.php?id=<?php echo $booking1["booking_id"]?>" onclick="confirmation()"> <button class="btn btn-light">Request to Cancel</button></a>
						 </form>
						 <form action="myevent.php" style="margin-left:346px; margin-top:-39px;">
					 <a href="myevent.php"><button class="btn btn-light">Back</button></a>
					 </form>
					<br>
					</div>
					
				
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->
</div>
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

<script>
function confirmation()
{
	event.preventDefault();
swal({
  title: "Are you sure?",
  text: "Do you want to cancel this event?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, I want to cancel!",
  cancelButtonText: "No!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
	
  if (isConfirm) {
	  event.preventDefault();
	  
     swal("Deleted!", "Redirecting.", "success");
	
 <?php

		$_SESSION['bid'] = $booking1["booking_id"];

		
	?>
	 location.href="cancel.php";

  } else {
    swal("Cancelled", "Your event is safe. :)", "error");
  }
});
}
</script>