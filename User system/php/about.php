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
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="about.php">About Us</a></li>
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
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="enquiries.php">Enquiries</a></li>
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
        <!--========== END SWIPER SLIDER ==========-->
        <!--========== PAGE CONTENT ==========-->
        <!-- About -->
        <div class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="row g-hor-centered-row--md g-row-col--5 g-margin-b-60--xs g-margin-b-100--md">
                <div class="col-sm-3 col-xs-6 g-hor-centered-row__col">
                    <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="img/400x500/05.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 g-hor-centered-row__col g-margin-b-60--xs g-margin-b-0--md">
                    <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".2s">
                        <img class="img-responsive" src="img/400x550/01.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5 g-hor-centered-row__col">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Culture</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">About Event</h2>
                    <p class="g-font-size-18--sm">We aim high at being focused on building relationships with our clients and community. Using our creative gifts drives this foundation.</p>
                </div>
            </div>

            <div class="row g-hor-centered-row--md g-row-col--5">
                <div class="col-sm-3 col-xs-6 col-sm-push-6 g-hor-centered-row__col">
                    <div class="wow fadeInRight" data-wow-duration=".3" data-wow-delay=".2s">
                        <img class="img-responsive" src="img/400x550/02.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-sm-3 col-xs-6 col-sm-push-6 g-hor-centered-row__col g-margin-b-60--xs g-margin-b-0--md">
                    <div class="wow fadeInRight" data-wow-duration=".3" data-wow-delay=".1s">
                        <img class="img-responsive" src="img/400x500/06.jpg" alt="Image">
                    </div>
                </div>
                <div class="col-sm-1"></div>
                <div class="col-sm-5 col-sm-pull-7 g-hor-centered-row__col g-text-left--xs g-text-right--md">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Style</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--sm g-margin-b-25--xs">About Working</h2>
                    <p class="g-font-size-18--sm">Working together on the daily requires each individual to let the greater good of the team's work surface above their own ego. Live the life with positive energy, party our life as an unforgettable event.</p>
                </div>
            </div>
        </div>
        <!-- End About -->

     
        <!-- End Subscribe -->
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
