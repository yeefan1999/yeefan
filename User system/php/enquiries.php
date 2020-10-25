<?php include("db_connection.php"); ?>

<?php 

	include('PHPMailer/PHPMailerAutoload.php');
			
				
		if(isset($_POST["enquiry"]))
		{
		
		$mail = new PHPMailer;
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$ques = $_POST['question'];
		$officialmail="funtasticofficialevent@gmail.com";
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'funtasticevent129@gmail.com';
		$mail->Password = 'funtastic999';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		$mail->WordWrap = 50;
	
		$mail->setFrom('funtasticevent129@gmail.com','FuntasticEvent');
		$mail->addAddress($officialmail);
		$mail->isHTML(true);
				
		$mail->Subject = 'Customer Enquiry';
		$mail->Body = '<p>This is enquiry from Customer name  '.addslashes($_POST['name']).' </p>
				<p>Email submitted : '.addslashes($_POST['email']).'</p>
				<p>Phone submitted : '.addslashes($_POST['phone']).'</p>
			
				<br><p>Enquiries from this customer : '.addslashes($_POST['question']).'</p>
				
				<p></p>
				';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				
		if(!$mail->Send())
		{
			echo "";
		}
		else
		{
			echo "";
		}
		
		$cus='1';
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
        <link href="vendor/themify/themify.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/scrollbar/scrollbar.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/swiper/swiper.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/cubeportfolio/css/cubeportfolio.min.css" rel="stylesheet" type="text/css"/>
		<link href="vendor/iconfonts/mdi/css/materialdesignicons.min.css" rel="stylesheet" >
		<link href="vendor/vendor.bundle.base.css" rel="stylesheet" >
        <!-- Theme Styles -->
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
		<link href="css/style2.css" rel="stylesheet" type="text/css"/>
        <link href="css/global/global.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="img/titlelogo.png" type="image/x-icon">
  <link rel = "stylesheet" type = "text/css" href = "sweetalert-master/dist/sweetalert.css">
    </head>
    <!-- End Head -->
<script>

	
	function validate_email2(str)
	{
		var user_email = document.getElementById("email");
		var user_email_check = document.getElementById("emailvalidate1");
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200)
			{
				user_email_check.innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../ajax/checkemail.php?email=" + str, true);
		xmlhttp.send();
	}
	
	function validate_email()
	{
		var user_email = document.getElementById("email");
		var user_email_mess = document.getElementById("emailvalidate");
		var user_email_check = document.getElementById("emailvalidate1");
		var regex =/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?([a-zA-Z])+.(?:(?:[a-zA-Z]+\.)?[a-zA-Z]+\.)?(com|my)/;
		var checkemail1 = user_email_check.innerHTML;
		var checkemail;
		if(user_email.value == "")
		{
			user_email_mess.innerHTML = "You can't leave this empty.";
			user_email.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("fail1").style.display = "block";
			document.getElementById("success1").style.display = "none";
			return checkemail = 1;
		}
		else if(!regex.test(user_email.value))
		{
            user_email_mess.innerHTML = "Please enter validate email format.";
			user_email.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("fail1").style.display = "block";
			document.getElementById("success1").style.display = "none";
			return checkemail = 1;
        }
		else if(checkemail1 == 1)
		{
			user_email_mess.innerHTML = "This email already register.";
			user_email.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("fail1").style.display = "block";
			document.getElementById("success1").style.display = "none";
			return checkemail = 1;
		}
		else
		{
			user_email_mess.innerHTML = "";
			user_email.style.borderColor = "#3c763d";
			document.getElementById("success1").style.display = "block";
			document.getElementById("fail1").style.display = "none";
			return checkemail = 0;
		}
	}
	
	function validate_email1()
	{
		var user_email = document.getElementById("email");
		var user_email_mess = document.getElementById("emailvalidate");
		
		user_email_mess.innerHTML = "";
		user_email.style.borderColor = "#ccc";
		document.getElementById("fail1").style.display = "none";
		document.getElementById("success1").style.display = "none";
	}

	
	function validate_phone()
	{
		var user_phone = document.getElementById("phone");
		var user_phone_mess = document.getElementById("phonevalidate");
		var checkphone;
		
		if(user_phone.value == "" || user_phone.value == "+6")
		{
			user_phone_mess.innerHTML = "You can't leave this empty.";
			user_phone.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("fail5").style.display = "block";
			document.getElementById("success5").style.display = "none";
			return checkphone = 1;
		}
		else if(user_phone.value.length <= 9)
		{
			user_phone_mess.innerHTML = "Please enter validate number.";
			user_phone.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("fail5").style.display = "block";
			document.getElementById("success5").style.display = "none";
			return checkphone = 1;
		}
		else
		{
			user_phone.style.borderColor = "#3c763d";
			user_phone_mess.innerHTML = "";
			document.getElementById("fail5").style.display = "none";
			document.getElementById("success5").style.display = "block";
			return checkphone = 0;
		}
	}
	
	function validate_phone1()
	{
		var user_phone = document.getElementById("phone");
		var user_phone_mess = document.getElementById("phonevalidate");
		
		user_phone_mess.innerHTML = "";
		user_phone.style.borderColor = "#ccc";
		document.getElementById("fail5").style.display = "none";
		document.getElementById("success5").style.display = "none";
	}



	
	function submit()
	{

		checkemail=validate_email();

		checkphone=validate_phone();

		if(checkemail==1 ||  ||checkphone==1 )
		{
			
			return false;
			
		}
		
		else
		{
			
			return true;
		}
	
		
	}
	</script>
    <!-- Body -->
    <body>

        <!--========== HEADER ==========-->
        
            <!-- Navbar -->
			<header class="navbar-fixed-top s-header js__header-sticky js__header-overlay">
            <div class="s-header__navbar" >
                <div class="s-header__container">
                    <div class="s-header__navbar-row">
                        <div class="s-header__navbar-row-col">
                            <!-- Logo -->
                            <div class="s-header__logo">
                                <a href="index.php" class="s-header__logo-link">
                                    <img class="s-header__logo-img s-header__logo-img-default" src="img/logo.png" alt="Funtastic Logo">
                                    <img class="s-header__logo-img s-header__logo-img-shrink" src="img/logo-dark.png" alt="Funtastic Logo">
                                </a>
                            </div>
                            <!-- End Logo -->
                        </div>
						
                            <!-- End Logo -->
                        
						
                        <div class="s-header__navbar-row-col" style="float:right;">
                            <!-- Trigger -->
                            <a href="javascript:void(0);" class="s-header__trigger js__trigger">
                                <span class="s-header__trigger-icon"></span>
                                <svg x="0rem" y="0rem" width="3.125rem" height="3.125rem" viewbox="0 0 54 54">
                                    <circle fill="transparent" stroke="#fff" stroke-width="1" cx="27" cy="27" r="25" stroke-dasharray="157 157" stroke-dashoffset="157"></circle>
                                </svg>
                            </a>
							<a href="javascript:void(0);" style="padding-top:8px;font-size:20px; " class="s-header__trigger js__trigger">Menu</a>
                            <!-- End Trigger -->
                        </div>
						
						
						
                    </div>
                </div>
            </div>
            <!-- End Navbar -->

            <!-- Overlay -->
            <div class="s-header-bg-overlay js__bg-overlay">
                <!-- Nav -->
                <nav class="s-header__nav js__scrollbar">
                     <div class="container-fluid">
                    
                        <!-- Menu List -->                                
						
						<ul class="list-unstyled s-header__nav-menu">
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="about.php">About Us</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="team.php">Our Team</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="faq.php">FAQ</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="contacts.php">Contact Us</a></li>
                        </ul>
						
						   <ul class="list-unstyled s-header__nav-menu">
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="events.php">Events</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="events_birthday.php">Birthday Party</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="events_wedding.php">Wedding Party/Dinner</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="events_corporate.php">Corporate Events</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="planning.php">Event Planning</a></li>
							<li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="package.php">Package Shopping</a></li>
                        </ul>
						
						<ul class="list-unstyled s-header__nav-menu">
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="index.php">Homepage</a></li>
							<li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="sign_in.php">Customer Sign In</a></li>
							<li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="sign_up.php">Register</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="ways.php">Ways to Customize Events</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="enquiries.php">Enquiries</a></li>
                        </ul>
                        <!-- End Menu List -->
                    </div>
					
                </nav>
                <!-- End Nav -->
                
     
                <!-- End Action -->
            </div>
            <!-- End Overlay -->
        </header>
        <!--========== END HEADER ==========-->

        <!--========== SWIPER SLIDER ==========-->
        <div class="s-swiper js__swiper-one-item">
            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper">
                <div class="g-fullheight--xs g-bg-position--center swiper-slide" style="background: url('img/1920x1080/02.jpeg');">
                    <div class="container g-text-center--xs g-ver-center--xs">
                        <div class="g-margin-b-30--xs">
                            <h1 class="g-font-size-35--xs g-font-size-45--sm g-font-size-55--md g-color--white">Unforgettable Experiences<br>In Your LIFE</h1>
                        </div> 
                    </div>
                </div>
				
                <div class="g-fullheight--xs g-bg-position--center swiper-slide" style="background: url('img/1920x1080/01.jpg');">
                    <div class="container g-text-center--xs g-ver-center--xs">
                        <div class="g-margin-b-30--xs">
                            <div class="g-margin-b-30--xs">
                                <h2 class="g-font-size-35--xs g-font-size-45--sm g-font-size-55--md g-color--white">You have dreamed<br>We build your<br>DREAM</h2>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Swiper Wrapper -->

            <!-- Arrows -->
            <a href="javascript:void(0);" class="s-swiper__arrow-v1--right s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-right js__swiper-btn--next"></a>
            <a href="javascript:void(0);" class="s-swiper__arrow-v1--left s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-left js__swiper-btn--prev"></a>
            <!-- End Arrows -->
            
            <a href="#js__scroll-to-section" class="s-scroll-to-section-v1--bc g-margin-b-15--xs">
                <span class="g-font-size-18--xs g-color--white ti-angle-double-down"></span>
                <p class="text-uppercase g-color--white g-letter-spacing--3 g-margin-b-0--xs">Learn More</p>
            </a>
        </div>
		<div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Enquiries</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Send us your question</h2>
                </div>
                <form method="post" onsubmit="return submit();" autocomplete="off" action="" >
                    <div class="row g-margin-b-40--xs">
                        <div class="col-sm-6 g-margin-b-20--xs g-margin-b-0--md">
                            <div class="g-margin-b-20--xs">
                                <input type="text" name="name" id="name" class="form-control s-form-v2__input g-radius--50" placeholder="* Name" required>
                            </div>
                            <div class="g-margin-b-20--xs">
                                <input type="email" class="form-control s-form-v2__input g-radius--50" placeholder="* Email"
								name = "email" id="email" maxlength = "40" 
							  onfocusout = "validate_email()" onkeyup = "validate_email2(this.value)" onfocus = "validate_email1()" required>
							
									<span id = "emailvalidate"></span>
									<span id = "emailvalidate1"></span>
                            </div>
                            <input type="text" class="form-control s-form-v2__input g-radius--50" placeholder="* Phone"
							name = "phone" id="phone" data-format="dddddddddd" onfocusout = "validate_phone()" onfocus = "validate_phone1()"/ required>
			
							<span id = "phonevalidate"></span>
                        </div>
                        <div class="col-sm-6">
                            <textarea name="question" id="question" class="form-control s-form-v2__input g-radius--10 g-padding-y-20--xs" rows="8" placeholder="* Your message" required></textarea>
                        </div>
                    </div>
                    <div class="g-text-center--xs">
                        <button type="submit" name="enquiry" onclick="submit()" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs">Submit</button>
                    </div>
					<div class="g-text-center--xs">
					<br>
                        <p>Having some frequent-encountered problem?  Go <a href="faq.php"> FAQ </a></p>
                    </div>
                </form>
            </div>
        </div>

   <!--========== FOOTER ==========-->
        <footer class="g-bg-color--dark">
            <!-- Links -->
          <div class="g-hor-divider__dashed--white-opacity-lightest">
                <div class="container g-padding-y-80--xs">
                    <div class="row">
                        <div class="col-sm-2 g-margin-b-20--xs g-margin-b-0--md">
                            <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="index.php">Home</a></li>
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="about.php">About</a></li>
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="team.php">Team</a></li>
                                
                            </ul>
                        </div>
                        <div class="col-sm-2 g-margin-b-20--xs g-margin-b-0--md">
                            <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="planning.php">Event Planning</a></li>
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="sign_up.php">Register</a></li>
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="sign_in.php">Sign In</a></li>
                            </ul>
                        </div>
						 <div class="col-sm-2 g-margin-b-20--xs g-margin-b-0--md">
                            <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">
                                <li><a class="g-font-size-15--xs g-color--white-opacity" href="faq.php">FAQ</a></li>
								<li><a class="g-font-size-15--xs g-color--white-opacity" href="contacts.php">Contact</a></li>
                             
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
                        <a href="index.php">
                            <img class="g-width-100--xs g-height-auto--xs" src="img/logo.png" alt="Funtastic Logo">
                        </a>
                    </div>
                    <div class="col-xs-6 g-text-right--xs">
                        <p class="g-font-size-14--xs g-margin-b-0--xs g-color--white-opacity-light"><a href="index.php">Funtastic Event</a></p>
                    </div>
                </div>
            </div>
            <!-- End Copyright -->
        </footer>
        <!--========== END FOOTER ==========-->
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
        <script type="text/javascript" src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="vendor/swiper/swiper.jquery.min.js"></script>
        <script type="text/javascript" src="vendor/waypoint.min.js"></script>
        <script type="text/javascript" src="vendor/counterup.min.js"></script>
        <script type="text/javascript" src="vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
        <script type="text/javascript" src="vendor/jquery.parallax.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U"></script>
        <script type="text/javascript" src="vendor/jquery.wow.min.js"></script>

        <!-- General Components and Settings -->
        <script type="text/javascript" src="js/global.min.js"></script>
        <script type="text/javascript" src="js/components/header-sticky.min.js"></script>
        <script type="text/javascript" src="js/components/scrollbar.min.js"></script>
        <script type="text/javascript" src="js/components/magnific-popup.min.js"></script>
        <script type="text/javascript" src="js/components/swiper.min.js"></script>
        <script type="text/javascript" src="js/components/counter.min.js"></script>
        <script type="text/javascript" src="js/components/portfolio-3-col.min.js"></script>
        <script type="text/javascript" src="js/components/parallax.min.js"></script>
        <script type="text/javascript" src="js/components/google-map.min.js"></script>
        <script type="text/javascript" src="js/components/wow.min.js"></script>
        <!--========== END JAVASCRIPTS ==========-->
<script type="text/javascript" src = "sweetalert-master/dist/sweetalert.min.js"></script>

    </body>
    <!-- End Body -->
</html>
<?php
	if(isset($_POST["enquiry"]))
	{
			echo '<script>swal("Success", "Your enquiry is successfully sent! Our team shall get back to you soon.", "success");</script>';
		
	}
?>