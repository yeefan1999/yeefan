<?php include("db_connection.php"); ?>
<?php 

	include('PHPMailer/PHPMailerAutoload.php');
			
				
		if(isset($_POST["registerbtn"]))
		{
			$useremail = $_POST["useremail1"];
			$userpassword = md5($_POST["userpassword1"]);
			$username = $_POST["username1"];
			$userphone = $_POST["phone1"];
			$useraddress = $_POST["address1"];
			$userstate = $_POST["state1"];
			$userpostcode = $_POST["postcode1"];
			$profile = "img/user.png";
			$check = "";

			$emailcheck1=mysqli_query($conn,"select c_email from customer where c_email ='$useremail'");
			$row = mysqli_fetch_assoc($emailcheck1);
			if(mysqli_num_rows($emailcheck1) != 0)
			{
			$check = '2';

			}
		
		if($check!='2')
		{
		$email = $_POST['useremail1'];
		$mail = new PHPMailer;
				
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
				
		$mail->Subject = 'Funtastic Event Account Registration';
		$mail->Body = '<p>Hi '.addslashes($_POST['username1']).',</p>
				<p>Welcome on board! Being a part of Funtastic Event. Welcome!</p>
				<p>This email is to inform you that your account registration is successfully completed!</p>
				<p><small>If you did not register for a FuntasticEvent account, someone may have registered with your 
				information by mistake. Please contact us for futher assistance.</small></p>
				<br><p>You can login using URL below:</p>
				<p><a href ="http://localhost/User%20System/HTML/sign_in.php">http://localhost/User%20System/HTML/sign_in.php</a></p>
				<p></p>
				<p>Thank you.</p>';
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
		}
?>
<?php
	$_SESSION["pagename"] = "register";
	
	
	if(isset($_POST["registerbtn"]))
		{
			$useremail = $_POST["useremail1"];
			$userpassword = md5($_POST["userpassword1"]);
			$username = $_POST["username1"];
			$userphone = $_POST["phone1"];
			$useraddress = $_POST["address1"];
			$userstate = $_POST["state1"];
			$userpostcode = $_POST["postcode1"];
			$profile = "images/user.png";
			$check = "";

			$emailcheck1=mysqli_query($conn,"select c_email from customer where c_email ='$useremail'");
			$row = mysqli_fetch_assoc($emailcheck1);
			if(mysqli_num_rows($emailcheck1) != 0)
			{
			$check = '2';

			}
			else
			{
				$sql =  "insert into customer(c_email, c_password, c_name, c_address, c_phonenumber,
				c_postcode, c_state, c_profilepic) values ('$useremail', '$userpassword', '$username', 
				'$useraddress', '$userphone','$userpostcode', '$userstate','$profile')";
				$result1 = mysqli_query($conn,$sql);
				
				if($result1)
				{
					$check = '1';
				}
				else
				{
					$check = "0";
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

        <!-- Theme Styles -->
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/global/global.css" rel="stylesheet" type="text/css"/>
			<script src="js/ckeditor/ckeditor.js" ></script>
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/titlelogo.png" type="image/x-icon">
		<link rel = "stylesheet" type = "text/css" href = "sweetalert-master/dist/sweetalert.css">
  <script src='https://www.google.com/recaptcha/api.js'></script>
	
	</head>
    <!-- Body -->
	
	<script type="text/javaScript">

	function validate_email()
	{
		var user_email = document.getElementById("useremail");
		var user_email_mess = document.getElementById("emailvalidate");
		var user_email_check = document.getElementById("emailvalidate1");
		var regex =/^[a-zA-Z0-9_.+-]+@(?:(?:[a-zA-Z0-9-]+\.)?[a-zA-Z]+\.)?([a-zA-Z])+.(?:(?:[a-zA-Z]+\.)?[a-zA-Z]+\.)?(com|my)/;
		var checkemail1 = user_email_check.innerHTML;
		var checkemail;
		if(user_email.value == "")
		{
			user_email_mess.innerHTML = "You can't leave this empty.";
			user_email.style.borderColor = "rgba(234,80,80,0.8)";
		
			return false;
		}
		else if(!regex.test(user_email.value))
		{
            user_email_mess.innerHTML = "Please enter validate email format.";
			user_email.style.borderColor = "rgba(234,80,80,0.8)";
		
			return false;
        }

		else
		{
			user_email_mess.innerHTML = "";
			user_email.style.borderColor = "#3c763d";
		
			return true;
		}
	}
	

	
	function validate_password()
	{
		var user_password = document.getElementById("userpassword");
		var user_password_mess = document.getElementById("passwordvalidate");
		var checkpassword;
		
		if(user_password.value == "")
		{
			user_password_mess.innerHTML = "You can't leave this empty.";
			user_password.style.borderColor = "rgba(234,80,80,0.8)";
		
			return false;
		}
		else if(user_password.value.length<8)
		{
			user_password_mess.innerHTML = "Please choose password with different symbol and numbers to increase the security.";
			user_password.style.borderColor = "rgba(234,80,80,0.8)";
			
			return false;
		}
		else
		{
			user_password_mess.innerHTML = "";
			user_password.style.borderColor = "#3c763d";
			
			return true;
		}
	}
	

	function validate_repeat_password()
	{
		var user_repeat_password = document.getElementById("cpassword");
		var user_repeat_password_mess = document.getElementById("rpasswordvalidate");
		var user_password = document.getElementById("userpassword");
		var checkrepeatpassword;
		
		if(user_repeat_password.value == "" || user_repeat_password.value != user_password.value)
		{
			user_repeat_password_mess.innerHTML = "The password entered doesn't match. Try again?";
			user_repeat_password.style.borderColor = "rgba(234,80,80,0.8)";
	
			return false;
		}
		else
		{
			user_repeat_password_mess.innerHTML = "";
			user_repeat_password.style.borderColor = "#3c763d";
		
			return true;
		}
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
			
			return false;
		}
		else if(user_phone.value.length <= 9)
		{
			user_phone_mess.innerHTML = "Please enter validate number.";
			user_phone.style.borderColor = "rgba(234,80,80,0.8)";
	
			return false;
		}
		else
		{
			user_phone.style.borderColor = "#3c763d";
			user_phone_mess.innerHTML = "";
			
			return true;
		}
	}
	

	function validate_address()
	{
		var user_address = document.getElementById("address");
		var user_address_mess = document.getElementById("addressvalidate");
		var checkaddress;
		
		if(user_address.value == "")
		{
			user_address_mess.innerHTML = "You can't leave this empty.";
			user_address.style.borderColor = "rgba(234,80,80,0.8)";
		
			return false;
		}
		else if(user_address.value.length<=10)
		{
			user_address_mess.innerHTML = "Please enter complete address.";
			user_address.style.borderColor = "rgba(234,80,80,0.8)";
			
			return false;
		}
		else
		{
			user_address_mess.innerHTML = "";
			user_address.style.borderColor = "#3c763d";
		
			return true;
		}
	}
	


	function validate_state()
	{
		var user_state = document.getElementById("state");
		var user_state_mess = user_state.options[user_state.selectedIndex].value;
		var user_state_mess1 = document.getElementById("statevalidate");
		var checkstate;
		
		if(user_state.value == "")
		{
			user_state_mess1.innerHTML = "Please select your state.";
			user_state.style.borderColor = "rgba(234,80,80,0.8)";
			return false;
		}
		else
		{
			user_state.style.borderColor = "#3c763d";
			return true;
		}
	}
	
	function validate_postcode()
	{
		var regex = /[0-9]+$/;
		var user_postcode = document.getElementById("postcode");
		var user_postcode_mess = document.getElementById("postcodevalidate");
		var checkpostcode;
		
		if(user_postcode.value == "")
		{
			user_postcode_mess.innerHTML = "You can't leave this empty";
			user_postcode.style.borderColor = "rgba(234,80,80,0.8)";
			
			return false;
		}
		else if(user_postcode.value.length < 5 || !regex.test(user_postcode.value))
		{
			user_postcode_mess.innerHTML = "Please enter validate postcode";
			user_postcode.style.borderColor = "rgba(234,80,80,0.8)";
	
			return false;
		}
		else
		{
			user_postcode_mess.innerHTML = "";
			user_postcode.style.borderColor = "#3c763d";
			
			return true;
		}
	}
	

	function validate_name()
	{
		var user_name = document.getElementById("username");
		var user_name_mess = document.getElementById("namevalidate");
		var user_name_check = document.getElementById("namevalidate1");
		var checkname;
		
		if(user_name.value == "")
		{
			user_name_mess.innerHTML = "You can't leave this empty.";
			user_name.style.borderColor = "rgba(234,80,80,0.8)";
			
			return false;
		}
		
		else
		{
			user_name_mess.innerHTML = "";
			user_name.style.borderColor = "#3c763d";
			
			return true;
		}
	}

	
	function CheckPasswordStrengh(password)
	{
		var password_strength = document.getElementById("password_strength");
		var password_level = document.getElementById("password_level");
		
		if(password.length == 0)
		{
			password_strength.innerHTML = "";
			password_level.style.width = "100%";
			return false;
		}
		
		var regex = new Array();
		regex.push("[A-Z]");
		regex.push("[a-z]");
		regex.push("[0-9]");
		regex.push("[$@$!%*#?&]");
		
		var passed = 0;
		
		for(var i = 0; i < regex.length; i++)
		{
			if(new RegExp(regex[i]).test(password))
			{
				passed++;
			}
		}
		
		if(passed > 2 && password.length > 8)
		{
			passed++;
		}
		
		var strength = "";
		var width = "";
		var color = "";
		switch(passed)
		{
			case 0:
			case 1:	strength = "Weak";
					width = "25%";
					color = "#a03";
					break;
			case 2:	strength = "Good";
					width = "50%";
					color = "#EC8400";
					break;
			case 3:	strength = "Strong";
					width = "75%";
					color = "#01A2FF";
					break;
			case 4:	strength = "Very Strong";
					width = "100%";
					color = "#09FA56";
					break;
		}
		password_strength.innerHTML = strength;
		password_level.style.width = width;
		password_level.style.background = color;
		return strength;
	}
	

	
	
	function get_action() 
	{
    var v = grecaptcha.getResponse();
    if(v.length == "")
    {
        document.getElementById('captcha').innerHTML="You can't leave Captcha Code empty";
        return false;
    }
    else
    {
         document.getElementById('captcha').innerHTML="Captcha completed";
        return true; 
    }
	}
	
	
	
	function checkForm()
	{

		
		if(validate_email() == false || validate_password() == false || validate_repeat_password() == false || validate_address() == false || validate_state() == false || validate_postcode() == false || validate_phone() == false || validate_name() == false || get_action() == false )
		{	
			return false;
		}
		
		else
		{
    		return true;
		}

	}
	</script>
    <body>
        <!--========== HEADER ==========-->
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
							<li class="s-header__nav-menu-item"><a class="s-header__nav-menu-link s-header__nav-menu-link-divider -is-active" href="sign_up.php">Register</a></li>
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
        <div id="js__scroll-to-section"  style="background-image: linear-gradient(to right, #7F7FD5, #86A8E7,#91EAE4);"> 
            
                <div class="row g-hor-centered-row--md g-margin-t-900--xs g-margin-t-20	0--sm">
                    <div class="col-lg-6 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                        <div class="s-promo-block-v1__square-effect g-margin-b-60--xs">
						</div>
                        <div>
						
                            <form id="myForm" onsubmit="return checkForm()" method="post"  autocomplete="off" 
							action="" class="center-block g-width-1050--xs g-bg-color--white-opacity-lightest g-box-shadow__violet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4" style="margin:30px;">
                             
								<div class="g-text-center--xs g-margin-b-40--xs">
						
                                    <h2 class="g-font-size-30--xs g-color--black">Register</h2>
                                </div>
								
                                <div class="g-margin-b-30--xs">
								<b>Email :</b> 
                                    <input type = "email" style="text-transform:none;" id = "useremail" class = "form-control s-form-v3__input" name = "useremail1" maxlength = "40" 
									placeholder = "Email" onfocusout = "validate_email()" >
								
									<span id = "emailvalidate"></span>
									<span id = "emailvalidate1"></span>
                                </div>
								
								<div class="g-margin-b-30--xs">
								<b>Password :</b> 
                                    <input type = "password" style="text-transform:none;" id = "userpassword" class = "form-control s-form-v3__input" name = "userpassword1" 
									 placeholder = "Password" onfocusout = "validate_password()"
									onkeyup = "CheckPasswordStrengh(this.value)">
									
									<span id = "showhidepassword" class="fa fa-eye" aria-hidden="true"></span>
									<span id = "showhidepassword1" class="fa fa-eye-slash" aria-hidden="true"></span>
									<span id = "passwordvalidate"></span>
                                </div>
								
								<div id = "password_strength_validate">
									<p>Password strength : <span id = "password_strength"></span></p>
									<div id = "password_level1">
										<span id = "password_level"></span>
									</div>
									<p>Use at least 8 characters. Don't use a password from another site, or something
										too obvious like your pet's name or your birthday date.</p>
								</div>
								<br>

								<div class="g-margin-b-30--xs">
								<b>Re-enter Your Password :</b> 
                                    <input type = "password" id = "cpassword" style="text-transform:none;" class = "form-control s-form-v3__input" name = "cpassword1"  
									placeholder = "Repeat Password" onfocusout = "validate_repeat_password()" >
							
									<span id = "rpasswordvalidate"></span>
                                </div>
								<div>
								
								<b>Name : </b> 
                                    <input type = "text" id = "username" class = "form-control s-form-v3__input" name = "username1" maxlength = "40" 
									placeholder = "Name" onfocusout = "validate_name()" />

									<span id = "namevalidate"></span>
									<span id = "namevalidate1"></span>
                                </div>
								
								<br>
								
								<div>
								<b>Contact Number :  </b> 
                                    <input type = "text" id = "phone" class = "form-control s-form-v3__input" name = "phone1" 
									placeholder = "Phone" data-format="dddddddddd" onfocusout = "validate_phone()" >
							
									<span id = "phonevalidate"></span>
                                </div>
								<br>
								
								<div>
								<b>Address: </b> 
                                    <textarea id = "address" class = "form-control s-form-v3__input" name = "address1" rows = "3" cols = "20" 
									placeholder = "Address" onfocusout = "validate_address()" style = "resize:none;" ></textarea>
						
									<span id = "addressvalidate"></span>
                                </div>
								<br>
								
								<div>
								<b>Postcode : </b> 
                                    <input type = "text" id = "postcode" class = "form-control s-form-v3__input" name = "postcode1" maxlength = "5" 
									placeholder = "Postcode" onfocusout = "validate_postcode()"  >
								
									<span id = "postcodevalidate"></span>
                                </div>
								<br>
									
								<div>
								<b>State : </b> 
								<select id = "state" style="color:black;" name = "state1" class = "form-control s-form-v3__input" onchange = "validate_state()" 
								style = "margin-top:15px;">
										<option value = "">--State--</option>
										<option value = "Johor">Johor</option>
										<option value = "Kedah">Kedah</option>
										<option value = "Kelantan">Kelantan</option>
										<option value = "Kuala Lumpur">Kuala Lumpur</option>
										<option value = "Melaka">Melaka</option>
										<option value = "Negeri Sembilan">Negeri Sembilan</option>
										<option value = "Pahang">Pahang</option>
										<option value = "Penang">Penang</option>
										<option value = "Perak">Perak</option>
										<option value = "Perlis">Perlis</option>
										<option value = "Sabah">Sabah</option>
										<option value = "Sarawak">Sarawak</option>
										<option value = "Selangor">Selangor</option>
										<option value = "Terengganu">Terengganu</option>
									</select>
									<span id = "statevalidate"></span>
								</div>
								<br>
								
								<br>
								<div class="g-recaptcha" id="rcaptcha"  data-sitekey="6LcENawUAAAAAKsV_GarmubeT-xFSeUjJxUPfL9T"></div>
								<br>
								<span id="captcha" style="color:red"> </span>
							  <br>
							  <br>
                                <div class="g-text-center--xs">
								<br>
                                    <button id="u_id" type="submit" onclick="checkForm()" name="registerbtn"  class="s-btn s-btn--md s-btn--white-bg g-radius--50 ">Sign Up</button>
                                </div>
								
                            </form>
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
		<script src='https://www.google.com/recaptcha/api.js'></script>
        <!--========== END JAVASCRIPTS ==========-->

    </body>
    <!-- End Body -->
</html>

<?php
	if(isset($_POST["registerbtn"]))
	{
		if($check == '1')
		{
			echo '<script>swal("Success", "Thank you for your registration.", "success");</script>';
		}
		
		else if($check == '0')
		{
			echo '<script>swal("Error", "Fail to register.", "error");</script>';
			
			
		}
		
		else if($check == '2')
		{
			echo '<script>swal("Error", "Email Account Repeated. Try another email account.", "error");</script>';
		}
	}
?>
