<?php include("checklogin.php");?>

<?php 

$id1 = $row["c_id"];

$cart=mysqli_query($conn,"select * from booking where c_id='$id1' and booking_status='cart';"); 
$cart1= mysqli_fetch_assoc($cart);

if(mysqli_num_rows($cart)==0)
{
	header("Location: cart.php");
}

$bkid=$cart1["booking_id"];

$evt=mysqli_query($conn,"select * from event where booking_id='$bkid';");
$evt1=mysqli_fetch_assoc($evt);
$total=$evt1['event_price'];


mysqli_query($conn,"update booking set booking_total='$total' where booking_id='$bkid'");
?>

<?php
	
	if(isset($_POST["pay"]))
	{
		
		$method=$_POST['method'];
		$accnum=$_POST['cardnum'];
		date_default_timezone_set('Asia/Kuala_Lumpur');

			$date = date('Y-m-d H:i:s');
			
			mysqli_query($conn,"update booking set booking_status='paid',booking_method='$method',booking_accnum='$accnum',booking_date_time='$date' where booking_id='$bkid'");
			
			
			
			
			$aaresult=mysqli_query($conn,"select * from booking where booking_id='$bkid'");
			$aaresult1=mysqli_fetch_assoc($aaresult);
			$aanama=$aaresult1['c_id'];

			$cago=mysqli_query($conn,"select * from customer where c_id='$aanama'");
			$cago1=mysqli_fetch_assoc($cago);
			$cname=$cago1['c_name'];
		
			
			$notype="addorder";
			$nocontent="$cname submitted booking order.";
			
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
<html lang="en" class="no-js">
    <!-- Begin Head -->
    <head>
        <!-- Basic -->
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Funtastic Event</title>
        <meta name="keywords" content="HTML5 Theme" />
        <meta name="description" content="Megakit - HTML5 Theme">
        <meta name="author" content="keenthemes.com">

        <!-- Web Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i|Montserrat:400,700" rel="stylesheet">

        <!-- Vendor Styles -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/animate.css" rel="stylesheet" type="text/css"/>
		<link href="css/style2.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/themify/themify.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/scrollbar/scrollbar.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/swiper/swiper.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css"/>
		<link href="vendor/iconfonts/mdi/css/materialdesignicons.min.css" rel="stylesheet" >
		<link href="vendor/vendor.bundle.base.css" rel="stylesheet" >
        <!-- Theme Styles -->
		<link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/global/global.css" rel="stylesheet" type="text/css"/>
		<link href="css/flexslider.css" rel="stylesheet" type="text/css"/>
				<link rel = "stylesheet" type = "text/css" href = "sweetalert-master/dist/sweetalert.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="img/titlelogo.png" type="image/x-icon">

    </head>
    <!-- End Head -->
	
    <!-- Body -->
 
        <!--========== HEADER ==========-->
<script>
	function paymethods()
	{
		var method = document.getElementsByName("method");
		
		for(var i = 0; i < method.length; i++)
		{
			if(method[i].checked)
			{
				document.getElementById("final_method").innerHTML = method[i].value;
				return method[i].value;
			}
		}
	}
	
	function validate_card_number()
	{
		var method =  paymethods();
		var billing_card_number = document.getElementById("cardnum");
		var billing_card_number_mess = document.getElementById("card_num_mess");
		var checkcardnum;
		var start;
		
		if(method == "Mastercard")
		{
			start = 5;
		}
		else if(method == "Visa")
		{
			start = 4;
		}
		
		if(billing_card_number.value == "")
		{
			billing_card_number_mess.innerHTML = "You can't leave this empty";
			billing_card_number.style.borderColor = "rgba(234,80,80,0.8)";
			return checkcardnum = 1;
		}
		else if(billing_card_number.value.length != 16 || billing_card_number.value.charAt(0) != start)
		{
			billing_card_number_mess.innerHTML = "Please enter valid card number";
			billing_card_number.style.borderColor = "rgba(234,80,80,0.8)";
			return checkcardnum = 1;
		}
		else
		{
			billing_card_number_mess.innerHTML = "";
			billing_card_number.style.borderColor = "#3c763d";
			document.getElementById("final_credit_card").innerHTML = "XXXXXXXXXXXX" + billing_card_number.value.substring(12,16);
			return checkcardnum = 0;
		}
	}
	
	function validate_card_number1()
	{
		document.getElementById("cardnum").style.borderColor = "#ccc";
		document.getElementById("card_num_mess").innerHTML = "";
	}
	
	function validate_exp_date()
	{
		var billing_exp_date = document.getElementById("expdate");
		var billing_exp_date_mess = document.getElementById("expdate_mess");
		var checkexpdate;
		
		var time = new Date();
		var month = time.getMonth()+1;
		var fulldate = time.getFullYear() + '-' + (month < 10 ? '0' : '') + month;
		
		if(billing_exp_date.value == "")
		{
			billing_exp_date_mess.innerHTML = "You can't leave this empty.";
			billing_exp_date.style.borderColor = "rgba(234,80,80,0.8)";
			return checkexpdate = 1;
		}
		else if(billing_exp_date.value < fulldate)
		{
			billing_exp_date_mess.innerHTML = "Please select valid expire date.";
			billing_exp_date.style.borderColor = "rgba(234,80,80,0.8)";
			return checkexpdate = 1;
		}
		else
		{
			billing_exp_date_mess.innerHTML = "";
			billing_exp_date.style.borderColor = "#3c763d";
			return checkexpdate = 0;
		}
	}
	
	function validate_exp_date1()
	{
		document.getElementById("expdate").style.borderColor = "#ccc";
		document.getElementById("expdate_mess").innerHTML = "";
	}
	
	function validate_cv_code()
	{
		var billing_cv_code = document.getElementById("cv_code");
		var billing_cv_code_mess = document.getElementById("cv_code_mess");
		var checkcvcode;
		
		if(billing_cv_code.value == "")
		{
			billing_cv_code_mess.innerHTML = "You can't leave this empty";
			billing_cv_code.style.borderColor = "rgba(234,80,80,0.8)";
			return checkcvcode = 1;
		}
		else if(billing_cv_code.value < 3 || isNaN(billing_cv_code.value))
		{
			billing_cv_code_mess.innerHTML = "Please enter valid cv code";
			billing_cv_code.style.borderColor = "rgba(234,80,80,0.8)";
			return checkcvcode = 1;
		}
		else
		{
			billing_cv_code_mess.innerHTML = "";
			billing_cv_code.style.borderColor = "#3c763d";
			return checkcvcode = 0;
		}
	}
	
	function validate_cv_code1()
	{
		document.getElementById("cv_code").style.borderColor = "#ccc";
		document.getElementById("cv_code_mess").innerHTML = "";
	}
	
	function validpay()
	{
		checkcardnum=validate_card_number();
		checkdate=validate_exp_date();
		checkcv=validate_cv_code();
		
		if(checkcardnum==1 || checkdate==1 || checkcv==1)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
</script>
   
            <!-- Pagination -->
            <div class="s-swiper__pagination-v1 s-swiper__pagination-v1--bc s-swiper__pagination-v1--white js__swiper-pagination"></div>
        </div>
		
		 <header>
            <!-- Pagination -->
            <div class="s-swiper__pagination-v1 s-swiper__pagination-v1--bc s-swiper__pagination-v1--white js__swiper-pagination"></div>
        </div>
		<header class="navbar-fixed-top">
		<nav class="navbar" style="margin-top:-2px;">
		  <div class="container-fluid" style="background-color:white;">
			<div class="navbar-header">
			  <a class="navbar-brand" href="index.php" style="padding-top:29px;">Funtastic Event</a>
			</div>
			<ul class="nav navbar-nav">
				
			  <div class="dropdown" style="padding-top:10px;">
			  <button class="dropbtn"><li ><a href="package.php" >Event Packages Type</a></button>
			   <div class="dropdown-content">
				<a href="package_wedding.php">Wedding Party / Dinner</a>
				<a href="package_corporate.php">Corporate Dinner</a>
				<a href="package_birthday.php">Birthday Party</a>
			  </div>
			</div>
			  <div class="dropdown">
			  <button class="dropbtn"><li><a href="theme.php" >Theme</a></li></button>
			</div>
			<div class="dropdown">
			  <button class="dropbtn"><li><a href="extra_services.php">Extra Services</a></li></button>
			  </div>
			
			</ul>
			<form  style=" margin-left:580px; margin-top:20px;"   class="navbar-form navbar-left" action="customer.php">
			   
			 
			  <button class="btn btn-default" >My Page</button>
			  
			  
			  </form>
		
			  <form  style=" margin-top:6px;" style="float:left"  action="cart.php">
			  <button class="btn btn-default" style="margin-left:10px; margin-top:11px;"><img src="img/shopping.png" style="width:25px; margin-right:5px;">Shopping Cart</button>
				
			</form>
		  </div>
		</nav>
		</header>
		<div><br><br><br><br><br><br></div>

		<h1 style="text-align:center">Payment Page</h1>
								<p style="text-align:center">You've to select your payment method.</h1>
								<br><br>
		  <div id="js__scroll-to-section"  style="background-image: linear-gradient(to right, #7F7FD5, #86A8E7,#91EAE4);"> 
            
                <div class="row g-hor-centered-row--md g-margin-t-900--xs g-margin-t-20	0--sm">
                    <div class="col-lg-6 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                        <div class="s-promo-block-v1__square-effect g-margin-b-60--xs">
						</div>
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            <form name="paymentform" onsubmit="return validpay()" method="post" action=""
							class="center-block g-width-1050--xs g-bg-color--white-opacity-lightest g-box-shadow__violet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4" 
							style="margin:30px;">
                                <div class="g-text-center--xs g-margin-b-40--xs">
                                    <h2 class="g-font-size-30--xs g-color--black">Payment</h2>
                                </div>
                          
							   <br>
                                <div class="g-margin-b-30--xs">
								<p><b>Total Payment : <?php echo 'RM '.$evt1['event_price'];?></b>
								<hr style="border:2px solid black;">
								</div>
								
                               <div class="g-margin-b-30--xs">
								
								<p><b><br>Payment Options (Debit Card) : </b> 
								<br><br><br>
									<input type="radio" name="method" value = "Visa" id = "paymethod" onclick = "paymethods()"/>
									<img src = "img/visa.jpg" width = "80px" height = "50px"/>
									<br><br><br>
                                    <input type="radio" name="method" value = "Mastercard" id = "paymethod" onclick = "paymethods()"/>
									<img src = "img/MasterCard.png" width = "80px" height = "50px"/>
									<br><br>
									<p>You choose : <span id = "final_method"></span></p>
                                </div>
								<div>
								<br>
								<p><b>Card Number</b> 
                                    <input id = "cardnum" name = "cardnum" onfocusout = "validate_card_number()" data-format="dddddddddddddddd" onfocus = "validate_card_number1()"
									type="text" class="form-control s-form-v3__input" style="width:200px;font-weight:bold; " placeholder="Card Number"></p>
									<span id = "card_num_mess"></span>
									<span id = "final_credit_card"></span>
                                </div>
								<div>
								<p><b>Expiry Date</b> 
                                    <input type="month" id = "expdate" onfocusout = "validate_exp_date()"
									onfocus = "validate_exp_date1()"
									name="year" class="form-control s-form-v3__input" style="width:200px; padding-top:25px; font-weight:bold; "></p>
									<span id = "expdate_mess"></span>
								</div>
								<div>
								<p><b>CVV</b> 
                                    <input type="text" id = "cv_code" maxlength = "4" data-format="ddd"
									onfocusout = "validate_cv_code()" onfocus = "validate_cv_code1()"
									name="cvv" class="form-control s-form-v3__input" style="width:200px;font-weight:bold; " placeholder="cvv code"></p>
									<span id = "cv_code_mess"></span>
                                </div>
							
								
                                <div class="g-text-center--xs">
								<br>

								<input type="submit" class="item_add items" name="pay" style="background-color:grey;" onclick="validpay()" value="Pay Now">
								<div class="clearfix"> </div>
								</div>
								
                            </form>
                </div><div style="margin-bottom:110px;"class="s-promo-block-v1__square-effect g-margin-b-60--xs">
						</div>
                </div>
            </div>
        </div>
		<div><br><br><br><br></div>

<!---->
     <!--========== FOOTER ==========-->
        <footer class="g-bg-color--dark">
            <!-- Links -->
            <div class="g-hor-divider__dashed--white-opacity-lightest">
                <div class="container g-padding-y-80--xs">
                    <div class="row">
                        <div class="col-sm-2 g-margin-b-20--xs g-margin-b-0--md">
                            <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="index.html">Home</a></li>
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="about.html">About</a></li>
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="team.html">Team</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-sm-2 g-margin-b-20--xs g-margin-b-0--md">
                            <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="planning.html">Event Planning</a></li>
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="register.html">Register</a></li>
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="sign_in.html">Sign In</a></li>
                            </ul>
                        </div>
						 <div class="col-sm-2 g-margin-b-20--xs g-margin-b-0--md">
                            <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="faq.html">FAQ</a></li>
								<li><a class="g-font-size-15--xs g-color--white-opacity" href="contacts.html">Contact</a></li>
                             
                            </ul>
                        </div>
                       
                        <div class="col-md-4 col-md-offset-2 col-sm-5 col-sm-offset-1 s-footer__logo g-padding-y-50--xs g-padding-y-0--md">
                            <h3 class="g-font-size-18--xs g-color--white">Funtastic event</h3>
                            <p class="g-color--white-opacity">We are an event planner company which serve our best to achieve what customer wants.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Links -->

            <!-- Copyright -->
            <div class="container g-padding-y-50--xs">
                <div class="row">
                    <div class="col-xs-6" >
                        <a href="index.html">
                            <img class="g-width-100--xs g-height-auto--xs" src="img/logo.png" alt="Funtastic Logo">
                        </a>
                    </div>
                    <div class="col-xs-6 g-text-right--xs">
                        <p class="g-font-size-14--xs g-margin-b-0--xs g-color--white-opacity-light"><a href="index.html">Funtastic Event</a></p>
                    </div>
                </div>
            </div>
            <!-- End Copyright -->
        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="s-back-to-top js__back-to-top"></a>

        <!--========== JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) ==========-->
        <!-- Vendor -->
        <script type="text/javascript" src="vendor/jquery.min.js"></script>
        <script type="text/javascript" src="vendor/jquery.migrate.min.js"></script>
        <script type="text/javascript" src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="vendor/jquery.smooth-scroll.min.js"></script>
        <script type="text/javascript" src="vendor/jquery.back-to-top.min.js"></script>
        <script type="text/javascript" src="vendor/scrollbar/jquery.scrollbar.min.js"></script>
        <script type="text/javascript" src="vendor/swiper/swiper.jquery.min.js"></script>
        <script type="text/javascript" src="vendor/masonry/jquery.masonry.pkgd.min.js"></script>
        <script type="text/javascript" src="vendor/masonry/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="vendor/jquery.equal-height.min.js"></script>
        <script type="text/javascript" src="vendor/jquery.parallax.min.js"></script>
        <script type="text/javascript" src="vendor/jquery.wow.min.js"></script>

        <!-- General Components and Settings -->
        <script type="text/javascript" src="js/global.min.js"></script>
        <script type="text/javascript" src="js/components/header-sticky.min.js"></script>
        <script type="text/javascript" src="js/components/scrollbar.min.js"></script>
        <script type="text/javascript" src="js/components/swiper.min.js"></script>
        <script type="text/javascript" src="js/components/masonry.min.js"></script>
        <script type="text/javascript" src="js/components/equal-height.min.js"></script>
        <script type="text/javascript" src="js/components/parallax.min.js"></script>
        <script type="text/javascript" src="js/components/wow.min.js"></script>
		<script type="text/javascript" src="js/components/jquery.min.js"></script>
		<script type="text/javascript" src="js/components/imagezoom.js"></script>
        <!--========== END JAVASCRIPTS ==========-->
		        <script type="text/javascript" src = "sweetalert-master/dist/sweetalert.min.js"></script>


    </body>
    <!-- End Body -->
</html>

<?php

		

	if(isset($_POST["pay"]))
	{
		
			echo '<script>swal("Success", "Payment successfully paid!", "success");</script>';
		
		

	}

?>
