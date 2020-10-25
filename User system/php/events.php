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
		<link href="css/style1.css" rel="stylesheet" type="text/css"/>
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
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="events.php">Events</a></li>
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
      
       

        </header>
        <!--========== END HEADER V2 ==========-->

        <!--========== SWIPER SLIDER ==========-->
        <div class="s-swiper js__swiper-slider">
            <!-- Swiper Wrapper -->
            <div class="swiper-wrapper">
                <div class="s-promo-block-v4 g-fullheight--xs g-bg-position--center swiper-slide" style="background: url('img/1920x1080/15.jpg');">
                    <div class="container g-ver-center--xs">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="g-margin-b-50--xs">
                                    <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-60--md g-color--white">The Amazing Events<br>which Blow Your Mind!</h1>
                                    <p class="g-font-size-18--xs g-font-size-22--sm g-color--white-opacity">The time has come to bring those ideas and plans to life. This is where we really begin to visualize your napkin sketches and make them into beautiful pixels.</p>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="s-promo-block-v4 g-fullheight--xs g-bg-position--center swiper-slide" style="background: url('img/1920x1080/17.png');">
                    <div class="container g-text-right--xs g-ver-center--xs">
                        <div class="row">
                            <div class="col-md-7 col-md-offset-5">
                                <div class="g-margin-b-50--xs">
                                    <h2 class="g-font-size-32--xs g-font-size-45--sm g-font-size-55--md g-color--white">Events Excellence</h2>
                                    <p class="g-font-size-18--xs g-font-size-22--sm g-color--white-opacity">We emphasize the event's quality, ensure every client's experiences.</p>
                                </div>
                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Swiper Wrapper -->

            <!-- Pagination -->
            <div class="s-swiper__pagination-v1 s-swiper__pagination-v1--bc s-swiper__pagination-v1--white js__swiper-pagination"></div>
        </div>
        <!--========== END SWIPER SLIDER ==========-->

        <!--========== PAGE CONTENT ==========-->
        <!-- Services -->
        <div class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="row g-margin-b-10--xs">
                <div class="col-md-6 g-margin-b-60--xs g-margin-b-0--lg">
                    <!-- Masonry Grid -->
                    <div class="row g-row-col--5 g-overflow--hidden js__masonry">
                        <div class="col-xs-6 js__masonry-sizer"></div>
                        <div class="col-xs-6 g-full-width--xs g-margin-b-10--xs g-margin-b-0--sm js__masonry-item">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s">
                                <img class="img-responsive" src="img/400x550/03.jpg" alt="Image">
                            </div>
                        </div>
                        <div class="col-xs-6 g-full-width--xs g-margin-b-10--xs js__masonry-item">
                            <div class="wow fadeInRight" data-wow-duration=".3" data-wow-delay=".3s">
                                <img class="img-responsive" src="img/970x647/10.jpg" alt="Image">
                            </div>
                        </div>
                        <div class="col-xs-6 g-full-width--xs js__masonry-item">
                            <div class="wow fadeInRight" data-wow-duration=".3" data-wow-delay=".5s">
                                <img class="img-responsive" src="img/970x647/11.jpg" alt="Image">
                            </div>
                        </div>
                    </div>
                    <!-- End Masonry Grid -->
                </div>
                <div class="col-md-5 g-margin-b-10--xs g-margin-b-0--lg g-margin-t-10--lg g-margin-l-20--lg">
                    <div class="g-margin-b-30--xs">
                        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-15--xs">Services</p>
                        <h2 class="g-font-size-32--xs g-font-size-36--sm">What We Do</h2>
                        <p>We serve the best to the clients, reach the bottom of the heart of them, to have their perfect events in a lifetime.</p>
                    </div>
                    <div class="row">
                        <ul class="list-unstyled col-xs-4 g-full-width--xs g-ul-li-tb-5--xs g-margin-b-20--xs g-margin-b-0--sm">
                            <li><i class="g-font-size-12--xs g-color--primary g-margin-r-10--xs ti-check"></i>Venue Finding</li>
                            <li><i class="g-font-size-12--xs g-color--primary g-margin-r-10--xs ti-check"></i>Venue Booking</li>
                            <li><i class="g-font-size-12--xs g-color--primary g-margin-r-10--xs ti-check"></i>Venue Setting</li>
                        </ul>
                        <ul class="list-unstyled col-xs-4 g-full-width--xs g-ul-li-tb-5--xs g-margin-b-20--xs g-margin-b-0--sm">
                            <li><i class="g-font-size-12--xs g-color--primary g-margin-r-10--xs ti-check"></i>Dinner</li>
                            <li><i class="g-font-size-12--xs g-color--primary g-margin-r-10--xs ti-check"></i>Ceremony</li>
                            <li><i class="g-font-size-12--xs g-color--primary g-margin-r-10--xs ti-check"></i>Party</li>
                        </ul>
                        <ul class="list-unstyled col-xs-4 g-full-width--xs g-ul-li-tb-5--xs">
                            <li><i class="g-font-size-12--xs g-color--primary g-margin-r-10--xs ti-check"></i>Online Service</li>
                            <li><i class="g-font-size-12--xs g-color--primary g-margin-r-10--xs ti-check"></i>FAQ</li>
                            <li><i class="g-font-size-12--xs g-color--primary g-margin-r-10--xs ti-check"></i>Feedback</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Services -->

        <!-- Process -->
        <div class="g-bg-color--primary-ltr" style="background-color:black;">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-100--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">Process</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--sm g-color--white">How it Works</h2>
                </div>
                <ul class="list-inline row g-margin-b-100--xs">
                    <!-- Process -->
                    <li class="col-sm-3 col-xs-6 g-full-width--xs s-process-v1 g-margin-b-60--xs g-margin-b-0--md">
                        <div class="center-block g-text-center--xs">
                            <div class="g-margin-b-30--xs">
                                <span class="g-display-inline-block--xs g-width-100--xs g-height-100--xs g-font-size-38--xs g-color--primary g-bg-color--white g-box-shadow__dark-lightest-v4 g-padding-x-20--xs g-padding-y-20--xs g-radius--circle">01</span>
                            </div>
                            <div class="g-padding-x-20--xs">
                                <h3 class="g-font-size-18--xs g-color--white">Register</h3>
                                <p class="g-color--white-opacity">Register your account. You only can the date and event package.</p>
                            </div>
                        </div>
                    </li>
                    <!-- End Process -->

                    <!-- Process -->
                    <li class="col-sm-3 col-xs-6 g-full-width--xs s-process-v1 g-margin-b-60--xs g-margin-b-0--md">
                        <div class="center-block g-text-center--xs">
                            <div class="g-margin-b-30--xs">
                                <span class="g-display-inline-block--xs g-width-100--xs g-height-100--xs g-font-size-38--xs g-color--primary g-bg-color--white g-box-shadow__dark-lightest-v4 g-padding-x-20--xs g-padding-y-20--xs g-radius--circle">02</span>
                            </div>
                            <div class="g-padding-x-20--xs">
                                <h3 class="g-font-size-18--xs g-color--white">View Event Package</h3>
                                <p class="g-color--white-opacity">There will be several event packages provided for your option.</p>
                            </div>
                        </div>
                    </li>
                    <!-- End Process -->

                    <!-- Process -->
                    <li class="col-sm-3 col-xs-6 g-full-width--xs s-process-v1 g-margin-b-60--xs g-margin-b-0--sm">
                        <div class="center-block g-text-center--xs">
                            <div class="g-margin-b-30--xs">
                                <span class="g-display-inline-block--xs g-width-100--xs g-height-100--xs g-font-size-38--xs g-color--primary g-bg-color--white g-box-shadow__dark-lightest-v4 g-padding-x-20--xs g-padding-y-20--xs g-radius--circle">03</span>
                            </div>
                            <div class="g-padding-x-20--xs">
                                <h3 class="g-font-size-18--xs g-color--white">Extra Services</h3>
                                <p class="g-color--white-opacity">Add the extra services to your shopping cart.</p>
                            </div>
                        </div>
                    </li>
                    <!-- End Process -->

                    <!-- Process -->
                    <li class="col-sm-3 col-xs-6 g-full-width--xs s-process-v1">
                        <div class="center-block g-text-center--xs">
                            <div class="g-margin-b-30--xs">
                                <span class="g-display-inline-block--xs g-width-100--xs g-height-100--xs g-font-size-38--xs g-color--primary g-bg-color--white g-box-shadow__dark-lightest-v4 g-padding-x-20--xs g-padding-y-20--xs g-radius--circle">04</span>
                            </div>
                            <div class="g-padding-x-20--xs">
                                <h3 class="g-font-size-18--xs g-color--white">Payment</h3>
                                <p class="g-color--white-opacity">Pay for the fee. You will receive updated status.</p>
                            </div>
                        </div>
                    </li>
                    <!-- End Process -->
                </ul>

                <div class="g-text-center--xs">
                    <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                        <a href="faq.php" class="text-uppercase s-btn s-btn--md s-btn--white-bg g-radius--50">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Process -->

        <div class="container g-text-center--xs g-padding-y-80--xs">
            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Carefully Designed For You</p>
            <h2 class="g-font-size-32--xs g-font-size-36--sm">Our Events Provided</h2>
        </div>
        <!-- Team -->
        <div class="row g-row-col--0">
            <div class="col-md-3 col-xs-6 g-full-width--xs">
                <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                    <!-- Team -->
					<a href="events_wedding.php">
                    <div  class="s-team-v1">
                        <img class="img-responsive g-width-100-percent--xs" src="img/400x400/03.jpg" alt="Image">
                        <div class="g-text-center--xs g-bg-color--white g-padding-x-30--xs g-padding-y-40--xs">
                            <h2 class="g-font-size-18--xs g-margin-b-5--xs">Wedding Party / Dinner</h2>
                            <span class="g-font-size-15--xs g-color--text"><i>Celebrate your perfect moments. <br>Once in your lifetime.</i></span>
                        </div>
                    </div>
					</a>
					
                    <!-- End Team -->
                </div>
            </div>
            <div class="col-md-3 col-xs-6 g-full-width--xs">
                <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".2s">
                    <!-- Team -->
                    <a href="events_birthday.php">
                    <div class="s-team-v1">
                        <img class="img-responsive g-width-100-percent--xs" src="img/400x400/05.jpg" alt="Image">
                        <div class="g-text-center--xs g-bg-color--white g-padding-x-30--xs g-padding-y-40--xs">
                            <h2 class="g-font-size-18--xs g-margin-b-5--xs">Birthday Party</h2>
                            <span class="g-font-size-15--xs g-color--text"><i>Share your kids / eldest's every moments together!<br>Surprise them, joy of your effort.</i></span>
                        </div>
                    </div>
					</a>
                    <!-- End Team -->
                </div>
            </div>
            <div class="col-md-3 col-xs-6 g-full-width--xs">
                <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">
                    <!-- Team -->
                    <a href="events_corporate.php">
                    <div  class="s-team-v1">
                        <img class="img-responsive g-width-100-percent--xs" src="img/400x400/06.jpg" alt="Image">
                        <div class="g-text-center--xs g-bg-color--white g-padding-x-30--xs g-padding-y-40--xs">
                            <h2 class="g-font-size-18--xs g-margin-b-5--xs">Corporate Dinner</h2>
                            <span class="g-font-size-15--xs g-color--text"><i>Appreciate your employees / employers. <br> A thankful years has came.</i></span>
                        </div>
                    </div>
					</a>
                    <!-- End Team -->
                </div>
            </div>
			<div class="col-md-3 col-xs-6 g-full-width--xs">
                <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".3s">
                    <!-- Team -->
                    <a href="faq.php">
                    <div  class="s-team-v1">
                        <img class="img-responsive g-width-100-percent--xs" src="img/400x400/08.jpg" alt="Image">
                        <div class="g-text-center--xs g-bg-color--white g-padding-x-30--xs g-padding-y-40--xs">
                            <h2 class="g-font-size-18--xs g-margin-b-5--xs">Other Enquiries</h2>
                            <span class="g-font-size-15--xs g-color--text"><i>Visit Our FAQ or go Enquiries for leaving your message.</i></span>
                        </div>
                    </div>
					</a>
                    <!-- End Team -->
                </div>
            </div>
            
        </div>
        

		<div>
		<br><br><br>
        </div>
        
        <!--========== END PAGE CONTENT ==========-->

        <!--========== FOOTER ==========-->
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
        <!--========== END JAVASCRIPTS ==========-->

    </body>
    <!-- End Body -->
</html>
