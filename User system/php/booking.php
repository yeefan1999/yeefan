<?php include("checklogin.php"); ?>

<?php
$timestamp = time(); 

?>
<?php
	
	$id = "";
	

	$id = $_GET["id"];

	
	$pack = mysqli_query($conn, "select * from package where package_id = '$id'");
	$pack1 = mysqli_fetch_assoc($pack);
	
	$cid = $row["c_id"];
	
	
if(isset($_POST["addtocart"]))
	{
		
		$randnum = rand(111111111,999999999);
		/*
		date_default_timezone_set('Asia/Kuala_Lumpur');

		$date = date('Y-m-d H:i:s');*/

		$date=$_POST["date1"];
		$s_time=$_POST["starttime1"];
		$e_time=$_POST["endtime1"];
		$location=$_POST["autocomplete_search"];
		$price=$pack1['package_price'];
		
		
		$_SESSION["edit"] = 1;
		$cart=mysqli_query($conn,"select * from booking where booking_status='cart' and c_id='$cid'"); 
		if(mysqli_num_rows($cart)==0)
		{
			$r1=mysqli_query($conn,"select * from booking where booking_ref_num='$randnum'");
			
			if(mysqli_num_rows($r1)==0)
			{
			mysqli_query($conn, "insert into booking(booking_ref_num,c_id)values ('$randnum','$cid') ");
			
			}
			else
			{	
				
				$randnum = rand(111111111,999999999);
				$r3=mysqli_query($conn,"select * from booking where booking_ref_num='$randnum'");
				$r4 = mysqli_fetch_assoc($r3);
				
				mysqli_query($conn, "insert into booking(booking_ref_num)values ('$randnum')");
			}
			$r1=mysqli_query($conn,"select * from booking where booking_ref_num='$randnum'");
			$r2 = mysqli_fetch_assoc($r1);
			$bid=$r2['booking_id'];
			mysqli_query($conn, "insert into event(event_date,event_start_time,event_end_time,event_location,event_price,booking_id,package_id)
			values ('$date','$s_time','$e_time','$location','$price','$bid','$id')");
			$done='1';
			
			
			
		}
		else
		{
			$done='2';
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
	
		<script type="text/javaScript">



	
	function check_location()
	{
		var user_address = document.getElementById("pac-input");
		var user_address_mess = document.getElementById("addressvalidate");
		var checkaddress;
		
		if(user_address.value == "")
		{
			user_address_mess.innerHTML = "You can't leave this empty.";
			user_address.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("fail6").style.display = "block";
			document.getElementById("success6").style.display = "none";
			return false;
		}
		else if(user_address.value.length<=10)
		{
			user_address_mess.innerHTML = "Please enter complete address.";
			user_address.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("fail6").style.display = "block";
			document.getElementById("success6").style.display = "none";
			return false;
		}
		else
		{
			user_address_mess.innerHTML = "";
			user_address.style.borderColor = "#3c763d";
			document.getElementById("fail6").style.display = "none";
			document.getElementById("success6").style.display = "block";
			return true;
		}
		
	}
	


	
	function check_stime()
	{
			var starttime = document.getElementById("starttime");
			var mess_starttime = document.getElementById("mess_starttime");
			
			var check1;
			
			
			if(starttime != null)
			{
				if(starttime.value == "")
				{
					mess_starttime.innerHTML = "Please select event start time.";
					starttime.style.borderColor = "rgba(234,80,80,0.8)";
					return false;
				}
				
				else if(starttime.value < "08:00" && starttime > "19:00")
				{
					mess_starttime.innerHTML = "Event should start the earliest at 8a.m. and the latest at 7p.m..";
					starttime.style.borderColor = "rgba(234,80,80,0.8)";
					return false;
				}
				else
				{
					mess_starttime.innerHTML = "";
					starttime.style.borderColor = "#3c763d";
					return true;
				}
			
			}
	
	}
	
	function check_date()
	{
			today = new Date();
			today.setDate(today.getDate()+14);
			var eventdate = document.getElementById("date").value;
			eventdate1=new Date(eventdate);
			
			var mess_date = document.getElementById("mess_date");
			var check2;

	
			
			if(document.getElementById("checkdate") != null)
			{
				var checkdate = document.getElementById("checkdate").innerHTML;
			}
	
			if(eventdate != null)
			{
				if(eventdate.value == "")
				{
					mess_date.innerHTML = "Please select event date.";
					eventdate.style.borderColor = "rgba(234,80,80,0.8)";
					return false;
				}
		
				else if(eventdate1 <= today )
				{
					mess_date.innerHTML = "Please do not enter date in the past! Event date should be at least 2 weeks from today.";
					eventdate.style.borderColor = "rgba(234,80,80,0.8)";
					return false;
				}
				
				
				else
				{
					mess_date.innerHTML = "";
					eventdate.style.borderColor = "#3c763d";
					return true;
				}
			
			}
		
	}
	
	function check_etime()
	{
		
			var starttime = document.getElementById("starttime");
			var endtime = document.getElementById("endtime");
			var mess_endtime = document.getElementById("mess_endtime");
			var eventdate = document.getElementById("eventdate");
			var check3;
		
			if(endtime != null)
			{
				if(endtime.value == "")
				{
					mess_endtime.innerHTML = "Please select event end time.";
					endtime.style.borderColor = "rgba(234,80,80,0.8)";
					return false;
				}
				else if(endtime.value == starttime.value || endtime.value <= starttime.value)
				{
					mess_endtime.innerHTML = "Please enter proper time of event. End time should not be earlier than start time.";
					endtime.style.borderColor = "rgba(234,80,80,0.8)";
					return false;
				}
				else if(endtime.value <= starttime.value && eventdate.value <= fulldate)
				{
					mess_endtime.innerHTML = "Please select possible time.";
					endtime.style.borderColor = "rgba(234,80,80,0.8)";
					return false;
				}
				else if(endtime.value < "09:00" && endtime.value > "22.00pm")
				{
					mess_endtime.innerHTML = "Please select after 9:00 am and before 11.00 pm.";
					endtime.style.borderColor = "rgba(234,80,80,0.8)";
					return false;
				}
				else
				{
					mess_endtime.innerHTML = "";
					endtime.style.borderColor = "#3c763d";
					return true;
				}
				
			}
	
		}


	function checkForm()
	{
		
    if (check_stime() == false || check_etime() == false || checkdate() == false || checklocation() == false) {
       return false;
    } else {
		return true;
    }
	}
	
	
	</script>

    <!-- End Head -->

    <!-- Body -->
 
        <!--========== HEADER ==========-->
        
   
            <!-- Pagination -->
            <div class="s-swiper__pagination-v1 s-swiper__pagination-v1--bc s-swiper__pagination-v1--white js__swiper-pagination"></div>
        </div>
		
		  <header>
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
			<form  style="margin-left:380px; margin-top:20px;" method="post"  class="navbar-form navbar-left" action="search.php">
			    <div class="form-group" >
				<input type="text" class="form-control" name="search_query" id="search" placeholder="Search">
			  </div>
			 
			  <button type="submit" name="submit" class="btn btn-default">Search</button>
			  
			  
			  </form>
		
			  <form  style="margin-top:6px;" style="float:left"  action="cart.php">
			  <button class="btn btn-default" style="margin-left:10px; margin-top:11px;"><img src="img/shopping.png" style="width:25px; margin-right:5px;">Shopping Cart</button>
				
			</form>
		  </div>
		</nav>
		</header>
		<div><br><br><br><br><br><br></div>

		<h1 style="text-align:center">Booking Page</h1>
								<p style="text-align:center">You've to fill in the details before you add this item to your cart.</h1>
								<br><br>
		  <div id="js__scroll-to-section"  style="background-image: linear-gradient(to right, #7F7FD5, #86A8E7,#91EAE4);"> 
            
                <div class="row g-hor-centered-row--md g-margin-t-900--xs g-margin-t-20	0--sm">
                    <div class="col-lg-6 col-sm-6 g-hor-centered-row__col g-text-center--xs g-text-left--md g-margin-b-60--xs g-margin-b-0--md">
                        <div class="s-promo-block-v1__square-effect g-margin-b-60--xs">
						</div>
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".1s">
                            
							
                                <div class="g-text-center--xs g-margin-b-40--xs">
                                    <h2 class="g-font-size-30--xs g-color--black">Booking Form</h2>
                                </div>
                          
							   <br>
							   <!--<form id="myForm" onsubmit="return validate();" method="post">-->
								<form  id="myForm" onsubmit="return checkForm()" enctype="multipart/form-data"  method="post"  action="" 
								class="center-block g-width-1050--xs g-bg-color--white-opacity-lightest g-box-shadow__violet-v1 g-padding-x-40--xs g-padding-y-60--xs g-radius--4" style="margin:30px;">
								<div class="g-margin-b-30--xs">
								<p><b>Package Name :</b> 
                                    <input type="text" name="pname" class="form-control s-form-v3__input g-bg-color--white-opacity-lightest" 
									value="<?php echo $pack1['package_name']?>" style="width:200px; font-weight:bold; color:black;" disabled></p>
                                </div>
								
								<div class="g-margin-b-30--xs">
								<p><b>Package Price :</b> 
                                    <input type="text" name="pprice" class="form-control s-form-v3__input g-bg-color--white-opacity-lightest" 
									value="RM <?php echo $pack1['package_price']?>" style="width:200px; font-weight:bold; color:black;" disabled></p>
                                </div>
								
								<div class="g-margin-b-30--xs">
								<b>Event Date :</b> 
                                    <input onfocusout = "check_date()" name="date1" id="date"
									type="date"  class="form-control s-form-v3__input g-bg-color--white-opacity-lightest" 
									 style="width:400px;  color:black;"  >
									 <span id = "mess_date"  style = "color:red;font-weight:normal;"></span>
                                </div>
								
								<div class="g-margin-b-30--xs">
								<b>Start Time :</b> 
                                   
									<input onfocusout = "check_stime()" name = "starttime1" id = "starttime"
									type = "time" class = "form-control s-form-v3__input g-bg-color--white-opacity-lightest" style="width:500px;"/>
									<span id = "mess_starttime"  style = "color:red;font-weight:normal;"></span>
                                </div>
								
								<div class="g-margin-b-30--xs">
								<b>End Time :</b> 
                                    <input onfocusout = "check_etime()" name = "endtime1" id = "endtime" 
									type = "time" class = "form-control s-form-v3__input g-bg-color--white-opacity-lightest" style="width:500px;"/>
									<span id = "mess_endtime"  style = "color:red;font-weight:normal;"></span>
                                </div>
								
								
								<b>Event Location :  </b> <br>

								<textarea id="pac-input" name="autocomplete_search" class="form-control s-form-v2__input" placeholder="Search" onfocusout = "check_location()" required /></textarea>
								<input type="hidden" id="city2" name="city2" />
								<input type="hidden" id="cityLat" name="cityLat" />
								<input type="hidden" id="cityLng" name="cityLng" />
								<span style = "color:red;font-weight:normal;"id = "addressvalidate"></span>
								
						
								
								
								<div class="g-text-center--xs">
								<br>
                                <button  style="margin-bottom:50px;"  id="u_id" type="submit" onclick="checkForm()"
								name = "addtocart"  class = "btn btn-primary"><span class = "glyphicon glyphicon-floppy-disk"></span> Submit</button>
								</div>
								<div class="clearfix"> </div>
								
								
                            </form>
							
                </div><div style="margin-bottom:110px;"class="s-promo-block-v1__square-effect g-margin-b-60--xs">
						</div>
                </div>
            </div>
        </div>
		<div style="clear:both;"><br><br><br><br></div>

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
    	 <script src='https://www.google.com/recaptcha/api.js'></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWTa1D_oDdGYTLTW5gEbnP4keDwEv8NTc&libraries=places"></script>


  <script>

	
	 function initMap() {
        

        var input = document.getElementById('pac-input');
    

        var autocomplete = new google.maps.places.Autocomplete(input);

        // Set initial restrict to the greater list of countries.
        autocomplete.setComponentRestrictions(
            {'country': ['MY']});

        // Specify only the data fields that are needed.
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);

        var infowindow = new google.maps.InfoWindow();
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);

          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindowContent.children['place-icon'].src = place.icon;
          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-address'].textContent = address;
          infowindow.open(map, marker);
        });

      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCWTa1D_oDdGYTLTW5gEbnP4keDwEv8NTc&libraries=places&callback=initMap"
        async defer></script>
	</body>
    <!-- End Body -->
</html>
<?php

		

		if(isset($_POST["addtocart"]))
	{
		if($done == 1)
		{
			echo '<script>swal("Success", "Successfully added into your cart. Check at your cart ", "success");</script>';
		
		}
		
		else if($done == 2)
		{
			echo '<script>swal("Error", "Each customer can only have one event package for pre-order.", "error");</script>';
		
		}
		

	}

?>