<?php include("db_connection.php"); ?>

<?php 

	include('PHPMailer/PHPMailerAutoload.php');
			
				
		if(isset($_POST["subscribe"]))
		{
		$email = $_POST['email'];
		$mail = new PHPMailer;
			mysqli_query($conn,"insert into subscriber(sub_email) values ('$email');");	
		$mail->isSMTP();
		$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;
		$mail->Username = 'funtasticevent129@gmail.com';
		$mail->Password = 'funtastic999';
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		$mail->WordWrap = 50;

		$mail->setFrom('funtasticevent129@gmail.com','FuntasticEvent');
		$mail->addAddress($email);
		$mail->isHTML(true);
				
		$mail->Subject = 'Funtastic Event Subscription';
		$mail->Body = '<p>Hi there </p>
				<p>Welcome to Funtastic Event.</p>
				<p>Thanks for your subscription.</p>
			
				<br><p>We will update you the latest information from time to time!</p>
				
				<p></p>
				<p>Once again, thank you!</p>';
		$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				
		if(!$mail->Send())
		{
			echo "";
		}
		else
		{
			echo "";
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
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="index.php">Homepage</a></li>
							<li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="sign_in.php">Customer Sign In</a></li>
							<li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="sign_up.php">Register</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="ways.php">Ways to Customize Events</a></li>
                            <li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider" href="enquiries.php">Enquiries</a></li>
                        </ul>
                        <!-- End Menu List -->
                    </div>
					
                </nav>
       
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
        <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="g-text-center--xs g-margin-b-100--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Welcome to Funtastic Event</p>
                <h2 class="g-font-size-32--xs g-font-size-36--md">We Create Beautiful Experiences <br> That Bring Happiness Smiles.</h2>
            </div>
            <div class="row g-margin-b-60--xs g-margin-b-70--md">
                <div class="col-sm-4 g-margin-b-60--xs g-margin-b-0--md">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".1s">
                                <i class="g-font-size-28--xs g-color--primary ti-desktop"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Responsive Services</h3>
                            <p class="g-margin-b-0--xs">We serve our best to every customer and strive to create the best moments for every customers.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 g-margin-b-60--xs g-margin-b-0--md">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".2s">
                                <i class="g-font-size-28--xs g-color--primary ti-settings"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Fully Customizable</h3>
                            <p class="g-margin-b-0--xs">Customers have the maximum of freedom in decorating their events!</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".3s">
                                <i class="g-font-size-28--xs g-color--primary ti-ruler-alt-2"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Feedback Collecting</h3>
                            <p class="g-margin-b-0--xs">We will not ignore the feedbacks given, try to improve our team with receiving your feedbacks!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // end row  -->
            <div class="row">
                <div class="col-sm-4 g-margin-b-60--xs g-margin-b-0--md">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".4s">
                                <i class="g-font-size-28--xs g-color--primary ti-package"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Endless Possibilities</h3>
                            <p class="g-margin-b-0--xs">The ideas of customers could spark endless of exciting moments!</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 g-margin-b-60--xs g-margin-b-0--md">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".5s">
                                <i class="g-font-size-28--xs g-color--primary ti-star"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Powerful Team</h3>
                            <p class="g-margin-b-0--xs">We provide many extra services, we try not to ignore what customers need.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="clearfix">
                        <div class="g-media g-width-30--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".6s">
                                <i class="g-font-size-28--xs g-color--primary ti-panel"></i>
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs">Information Support</h3>
                            <p class="g-margin-b-0--xs">We will try to share the nice information to customers who need for it in designing their events!</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // end row  -->
        </div>
        <!-- End Features -->

        <!-- Parallax -->
        <div class="js__parallax-window" style="margin-bottom:70px; background: url(img/1920x1080/03.jpg) 50% 0 no-repeat fixed;">
            <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-margin-b-80--xs">
                    <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md g-color--white">The way to customize your event!</h2>
                </div>
                <a href="ways.php" class="text-uppercase s-btn s-btn--md s-btn--white-brd g-radius--50">Learn More</a>
            </div>
        </div>
        <!-- End Parallax -->

        <!-- Culture -->
        <div class="g-promo-section">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="row">
                    <div class="col-md-4 g-margin-t-15--xs g-margin-b-60--xs g-margin-b-0--lg">
                        <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Funtastic event</p>
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                            <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md">About</h2>
                        </div>
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".3s">
                            <h2 class="g-font-size-40--xs g-font-size-50--sm g-font-size-60--md">Us</h2>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <p class="g-font-size-18--xs">We aim high at being focused on building relationships with our clients and community. Using our or client's creative gifts to drive this foundation. The time has come to bring those ideas and plans to life. This is where we really begin to visualize your napkin sketches and make them into beautiful events.</p>
                        <p class="g-font-size-18--xs">Now that your brand is all dressed up and ready to party, it's time to release it to the world. By the way, let's celebrate together.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 g-promo-section__img-right--lg g-bg-position--center g-height-100-percent--md js__fullwidth-img">
                <img class="img-responsive" src="img/970x970/03.jpg" alt="Image">
            </div>
        </div>
        <!-- End Culture -->

        <!-- Subscribe -->
        <div class="js__parallax-window" style=" margin-top:30px; background: url(img/1920x1080/07.jpg) 50% 0 no-repeat fixed;">
            <div class="g-container--sm g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-margin-b-80--xs">
                    <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-25--xs">Subscribe</p>
                    <h2 class="g-font-size-32--xs g-font-size-36--md g-color--white">Join Over 1000+ People</h2>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <form class="input-group" method="post">
                            <input type="email" class="form-control s-form-v1__input g-radius--left-50" name="email" placeholder="Enter your email">
                            <span class="input-group-btn">
                                <button type="submit" name="subscribe" style="height:53.8px;" class="s-btn s-btn-icon--md s-btn-icon--white-brd s-btn--white-brd g-radius--right-50"><i class="ti-arrow-right"></i></button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Subscribe -->

        <!-- Testimonials -->
        <div class="js__parallax-window" style="margin-top:30px;background-color:black; fixed;">
            <div class="container g-text-center--xs g-padding-y-80--xs g-padding-y-125--sm">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--white-opacity g-letter-spacing--2 g-margin-b-50--xs">What our clients said</p>
                <div class="s-swiper js__swiper-testimonials">
                    <!-- Swiper Wrapper -->
                    <div class="swiper-wrapper g-margin-b-50--xs">
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>" I have had my life-best event with the assistant of Funtastic Event! It is really amazing! "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">Ku Wei Kiat / Customer</h4>
                            </div>
                        </div>
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>" Funtastic event brings my birthday party to the next level! Thank you! "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">Lau Poh Chian / Customer</h4>
                            </div>
                        </div>
                        <div class="swiper-slide g-padding-x-130--sm g-padding-x-150--lg">
                            <div class="g-padding-x-20--xs g-padding-x-50--lg">
                                <div class="g-margin-b-40--xs">
                                    <p class="g-font-size-22--xs g-font-size-28--sm g-color--white"><i>" Good to have them to help me organize my event! Else nowhere to find an event that best! "</i></p>
                                </div>
                                <div class="center-block g-hor-divider__solid--white-opacity-lightest g-width-100--xs g-margin-b-30--xs"></div>
                                <h4 class="g-font-size-15--xs g-font-size-18--sm g-color--white-opacity-light g-margin-b-5--xs">Tan Yee Fan / Customer</h4>
                            </div>
                        </div>
                    </div>
                    <!-- End Swipper Wrapper -->

                    <!-- Arrows -->
                    <div class="g-font-size-22--xs g-color--white-opacity js__swiper-fraction"></div>
                    <a href="javascript:void(0);" class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--right s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-right js__swiper-btn--next"></a>
                    <a href="javascript:void(0);" class="g-display-none--xs g-display-inline-block--sm s-swiper__arrow-v1--left s-icon s-icon--md s-icon--white-brd g-radius--circle ti-angle-left js__swiper-btn--prev"></a>
                    <!-- End Arrows -->
                </div>
            </div>
        </div>
        <!-- End Testimonials -->

      

        <!-- News -->
        <div class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="g-text-center--xs g-margin-b-80--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Sharing of the day</p>
                <h2 class="g-font-size-32--xs g-font-size-36--md">Latest Updates</h2>
            </div>
            <div class="row">
                <div class="col-sm-4 g-margin-b-30--xs g-margin-b-0--md">
                    <!-- News -->
                    <article>
                        <img class="img-responsive" src="img/970x970/01.jpg" alt="Image">
                        <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">
                            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">Customer Lee</p>
                            <h3 class="g-font-size-22--xs g-letter-spacing--1">Favourite food</h3>
                            <p>It should be the soul character of an event - Food! The food prepared is really amazing!</p>
                        </div>
                    </article>
                    <!-- End News -->
                </div>
                <div class="col-sm-4 g-margin-b-30--xs g-margin-b-0--md">
                    <!-- News -->
                    <article>
                        <img class="img-responsive" src="img/970x970/02.jpg" alt="Image">
                        <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">
                            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">Customer Kok</p>
                            <h3 class="g-font-size-22--xs g-letter-spacing--1">Let's party the city</h3>
                            <p>Wow! Having my 21st birthday here! This is WONDERFUL!</p>
                        </div>
                    </article>
                    <!-- End News -->
                </div>
                <div class="col-sm-4">
                    <!-- News -->
                    <article>
                        <img class="img-responsive" src="img/970x970/03.jpg" alt="Image">
                        <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">
                            <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2">Customer Tee</p>
                            <h3 class="g-font-size-22--xs g-letter-spacing--1">The perfect place, the perfect HIM</h3>
                            <p>Thanks for Funtastic Event help. It gave me life-time unforgettable wedding moments.</p>
                        </div>
                    </article>
                    <!-- End News -->
                </div>
            </div>
        </div>
        <!-- End News -->

        <!-- Counter -->
        <div class="js__parallax-window" style="background: url(img/1920x1080/06.jpg) 50% 0 no-repeat fixed;">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="row">
                    <div class="col-md-3 col-xs-6 g-full-width--xs g-margin-b-70--xs g-margin-b-0--lg">
                        <div class="g-text-center--xs">
                            <div class="g-margin-b-10--xs">
                                <figure class="g-display-inline-block--xs g-font-size-70--xs g-color--white js__counter">200</figure>
                                <span class="g-font-size-40--xs g-color--white">+</span>
                            </div>
                            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
                            <h4 class="g-font-size-18--xs g-color--white">Customers</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 g-full-width--xs g-margin-b-70--xs g-margin-b-0--lg">
                        <div class="g-text-center--xs">
                            <div class="g-margin-b-10--xs">
                                <figure class="g-display-inline-block--xs g-font-size-70--xs g-color--white js__counter">50</figure>
                                <span class="g-font-size-40--xs g-color--white">+</span>
                            </div>
                            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
                            <h4 class="g-font-size-18--xs g-color--white">Parties</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 g-full-width--xs g-margin-b-70--xs g-margin-b-0--sm">
                        <div class="g-text-center--xs">
                            <div class="g-margin-b-10--xs">
                                <figure class="g-display-inline-block--xs g-font-size-70--xs g-color--white js__counter">30</figure>
                                <span class="g-font-size-40--xs g-color--white">+</span>
                            </div>
                            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
                            <h4 class="g-font-size-18--xs g-color--white">Weddings</h4>
                        </div>
                    </div>
                    <div class="col-md-3 col-xs-6 g-full-width--xs">
                        <div class="g-text-center--xs">
                            <div class="g-margin-b-10--xs">
                                <figure class="g-display-inline-block--xs g-font-size-70--xs g-color--white js__counter">20</figure>
                                <span class="g-font-size-40--xs g-color--white">+</span>
                            </div>
                            <div class="center-block g-hor-divider__solid--white g-width-40--xs g-margin-b-25--xs"></div>
                            <h4 class="g-font-size-18--xs g-color--white">Other Events</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script type="text/javascript" src = "sweetalert-master/dist/sweetalert.min.js"></script>
    </body>
    <!-- End Body -->
</html>

<?php
	if(isset($_POST["subscribe"]))
	{
		
			echo '<script>swal("Success", "Thank for your subscription.", "success");</script>';
			
			
	}
?>

