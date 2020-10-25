<?php include("db_connection.php"); ?>
<?php
	if(isset($_COOKIE["c_login"]) && $_COOKIE["c_login"] == 1 || !empty($_SESSION['logined']))
	{
		$email1 = $_COOKIE["c_email"];
		if(isset($_COOKIE["c_password"]))
		{
			$password1 = $_COOKIE["c_password"];
		}
		$result2 = mysqli_query($conn, "select * from customer where c_email = '$email1' and c_password = '$password1'");
		if(mysqli_num_rows($result2) == 1)
		{
			header("Location: customer.php");
		}
		else
		{
			setcookie("c_login", "0", time() + (10 * 365 * 24 * 60 * 60), "/User system/");
		}
	}

		if(isset($_POST["loginbtn"]))
		{
			$email = $_POST["useremail1"];
			$password = md5($_POST["userpassword1"]);
			$error = 0;
			$result = mysqli_query($conn, "select * from customer where c_email = '$email' and c_password = '$password'");
			$row = mysqli_fetch_assoc($result);
			
			if(mysqli_num_rows($result) != 1)
			{
			$error = 1;

			}
			
			else
			{
				if(mysqli_num_rows($result) == 1)
				{
					
						if(isset($_COOKIE["c_email"]) && isset($_COOKIE["c_password"]))
						{
							setcookie("c_email","",time() + (10 * 365 * 24 * 60 * 60), "/User system/");
							setcookie("c_password","",time() + (10 * 365 * 24 * 60 * 60), "/User system/");
							setcookie("c_login", "", time() + (10 * 365 * 24 * 60 * 60),"/User system/");
							setcookie("c_id", "", time() + (10 * 365 * 24 * 60 * 60),"/User system/");
						}
						$_SESSION["login"] = 1;
						$_SESSION["accountid"] = $row["c_id"];
					
					header("Location: customer.php");
					
				}
			
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
		<link href="css/style1.css" rel="stylesheet" type="text/css"/>
        <link href="css/global/global.css" rel="stylesheet" type="text/css"/>

        <!-- Favicon -->
        <link rel="shortcut icon" href="img/titlelogo.png" type="image/x-icon">
		<link rel = "stylesheet" type = "text/css" href = "sweetalert-master/dist/sweetalert.css">
    </head>
	
    <!-- End Head -->
<script>

	function login()
	{
		var useremail = document.loginform.useremail.value;
		var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
		var useremail_1 = document.getElementById("useremail");
		var userpassword = document.loginform.userpassword.value;
		var userpassword_1 = document.getElementById("userpassword");
		var useremail_check, userpassword_check;
		if(useremail == "" || !(isNaN(useremail)))
		{
			document.getElementById("loginemail_error").innerHTML = "Please enter an email.";
			useremail_1.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("loginemail_error").style.display = "block";
			useremail_check = 1;
		}
		else if(!regex.test(useremail))
		{
            document.getElementById("loginemail_error").innerHTML = "Please enter an valid email.";
			useremail_1.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("loginemail_error").style.display = "block";
			useremail_check = 1;
        }
		else
		{
			document.getElementById("loginemail_error").innerHTML = "";
			useremail_1.style.borderColor = "white";
			document.getElementById("loginemail_error").style.display = "none";
			useremail_check = 0;
		}
		
		if(userpassword == "")
		{
			document.getElementById("loginpassword_error").innerHTML = "Please enter a password";
			userpassword_1.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("loginpassword_error").style.display = "block";
			userpassword_check = 1;
		}
		else
		{
			document.getElementById("loginpassword_error").innerHTML = "";
			userpassword_1.style.borderColor = "white";
			document.getElementById("loginpassword_error").style.display = "none";
			userpassword_check = 0;
		}
		
		if(useremail_check == 0 && userpassword_check == 0)
		{
			return true;
		}
		else
		{
			return false;
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
							<li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="sign_in.php">Customer Sign In</a></li>
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

        <!--========== PROMO BLOCK ==========-->
        <div class="s-promo-block-v1 g-fullheight--md" style="background-image: linear-gradient(145deg, rgba(152, 119, 234, 0.7) -25%, #13b1cd 100%);">
            <div class="container g-ver-center--md g-padding-y-100--xs">
                <div class="row g-hor-centered-row--md g-margin-t-30--xs g-margin-t-20--sm">
                    <div class="col-lg-6 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                        <div class="s-promo-block-v1__square-effect g-margin-b-60--xs">
                            <h1 class="g-font-size-32--xs g-font-size-45--sm g-font-size-50--lg g-color--white">To be our <br>Clients</h1>
                            <p class="g-font-size-20--xs g-font-size-26--md g-color--white g-margin-b-0--xs">To have your own account is very easy.<br>Click on register. And fill in your details.</p>
                        </div>
                     
                        <span class="g-padding-x-0--xs g-padding-x-10--lg">
                            <a href="sign_up.php" class="s-btn s-btn--xs s-btn--white-brd g-padding-x-30--xs g-radius--50">

                                <span class="s-btn__element--right g-padding-x-10--xs">                          
                                    <span class="g-font-size-16--xs">Register Account</span>
                                </span>
                            </a>
                        </span>
                    </div>
                    <div class="col-lg-2"></div>
                    <div class="col-lg-4 col-sm-4 g-hor-centered-row__col">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            <form style="text-transform:none;" name="loginform" onsubmit = "return login();" autocomplete = "off" novalidate method = "post" action = "" class="center-block g-width-350--xs g-bg-color--white-opacity-lightest g-box-shadow__blueviolet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4">
                                <div class="g-text-center--xs g-margin-b-40--xs">
                                    <h2 class="g-font-size-30--xs g-color--white">Sign In</h2>
                                </div>
                                <div class="g-margin-b-30--xs">
                                    <input id = "useremail" type="email" name="useremail1" style="text-transform:none;" class="form-control s-form-v3__input" placeholder="* Email" >	
									<span id = "loginemail_error"></span>
                                </div>
                                <div class="g-margin-b-30--xs">
                                    <input id = "userpassword" type="password" name="userpassword1" style="text-transform:none;" class="form-control s-form-v3__input" placeholder="* Password">

									<span id = "loginpassword_error"></span>
                                </div>
                                <div class="g-text-center--xs">
								<div>
                                  <button type = "submit" name = "loginbtn" class="text-uppercase btn-block s-btn s-btn--md s-btn--white-bg g-radius--50 g-padding-x-50--xs g-margin-b-20--xs">Sign In</button>
								  </div>
                                    <a class="g-color--white g-font-size-13--xs" href="reset_pass.php"><br>Forgot Password?</a>
									<a class="g-color--white g-font-size-13--xs" href="sign_up.php"><br><br>No account? Create One</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--========== END PROMO BLOCK ==========-->
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
        <script type="text/javascript" src="vendor/vidbg.min.js"></script>
        <script type="text/javascript" src="vendor/swiper/swiper.jquery.min.js"></script>
        <script type="text/javascript" src="vendor/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
        <script type="text/javascript" src="vendor/jquery.wow.min.js"></script>

        <!-- General Components and Settings -->
        <script type="text/javascript" src="js/global.min.js"></script>
        <script type="text/javascript" src="js/components/header-sticky.min.js"></script>
        <script type="text/javascript" src="js/components/scrollbar.min.js"></script>
        <script type="text/javascript" src="js/components/swiper.min.js"></script>
        <script type="text/javascript" src="js/components/portfolio-4-col-slider.min.js"></script>
        <script type="text/javascript" src="js/components/wow.min.js"></script>
		<script type="text/javascript" src = "sweetalert-master/dist/sweetalert.min.js"></script>
		
        <!--========== END JAVASCRIPTS ==========-->

    </body>

</html>
<?php
if(isset($_POST["loginbtn"]))
	{
		
		if($error == 1)
		{
			echo '<script>swal("Error", "Your email or password is invalid", "error");</script>';
		
		}
	}

?>
