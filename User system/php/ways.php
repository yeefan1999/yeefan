<?php include("db_connection.php"); ?>


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

    </head>
    <!-- End Head -->

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
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="ways.php">Ways to Customize Events</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="enquiries.php">Enquiries</a></li>
                        </ul>
                        <!-- End Menu List -->
                    </div>
					
                </nav>
                <!-- End Nav -->
      
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
        <!--========== END SWIPER SLIDER ==========-->

        <!--========== PAGE CONTENT ==========-->
        <!-- Features -->
		<br>
		<br>
		<h1 style="color:purple; margin-left:35px;"> <u>&nbsp;&nbsp;Best e</u>vent Planner</h1>
		<div style="width:1400px;">
		<h6 style="margin-left:35px; margin-top:30px; text-transform:none; line-height:20px; text-align:justify;">Funtastic Event  exclusive and discreet party planning service allows you to 
		sit back and relax! We’ll take your vision and bring it to life, taking care of all the details that can</h6>
		<h6 style="margin-left:35px; margin-top:30px; text-transform:none; line-height:20px; text-align:justify;">
		take up so much of your valuable time. 
		Many of our clients are in the public eye, hold senior positions or own a business – with such busy lives they can do without the </h6>
		<h6 style="margin-left:35px; margin-top:30px; text-transform:none; line-height:20px; text-align:justify;">stress of organising a party.
		From our initial conversation, we promise to impress, reassure and excite you with our event planning services.</h6>
		</div>
		<br>
		<br>
		<br>
		<br>
		<h1 style="color:purple; margin-left:35px;"> <u>&nbsp;&nbsp;How To P</u>lan And Customize Your Event </h1>
		<h6 style="margin-left:35px; margin-top:50px; text-transform:none;">1. <b> Look for the event package.</b> You shall go and visit our <a href="package.html" style="color:blue;">Event Package</a> Page for having a look. 
		This page will provide you the details and options which are available.</h6>
		<h6 style="margin-left:35px; margin-top:30px; text-transform:none;">2. <b> Decide the event package chosen.</b> Place it into cart. You'll have to fill in the details required.</h6>
		<h6 style="margin-left:35px; margin-top:30px; text-transform:none;">3. <b> Add other services into your cart.</b> You may add any theme, extra services or any other product.</h6>
		<h6 style="margin-left:35px; margin-top:30px; text-transform:none;">4. <b> Make your payment.</b> You'll have to pay, we will proceed with your items ordered and get everythings done for you! </h6>
		<h6 style="margin-left:35px; margin-top:30px; text-transform:none;">5. <b> Receive confirmation and update.</b> You'll be receiving confirmation that you have successfully make the payment. We will update you the
		preparation progress from time to time.</h6>
		<h6 style="margin-left:35px; margin-top:30px; text-transform:none;">6. <b> Big Days Arrive! </b> It is your big day now! Get yourself ready with a lot of amazing surprises!</h6>


        
        <!-- End Counter -->
		<div><br><br><br><br></div>
     
        <!--========== END PAGE CONTENT ==========-->

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

    </body>
    <!-- End Body -->
</html>
