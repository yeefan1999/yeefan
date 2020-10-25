<?php include("checklogin.php");?>

<?php 

$id1 = $row["c_id"];

$cart=mysqli_query($conn,"select * from event,booking where event.booking_id=booking.booking_id and booking.c_id='$id1' and booking_status='cart';"); 
$cart1= mysqli_fetch_assoc($cart);

$eventid=$cart1['event_id'];

$packageid=$cart1['package_id'];
$package=mysqli_query($conn,"select * from package where package_id='$packageid';");
$package1=mysqli_fetch_assoc($package);
$packageprice=$package1['package_price'];

$themeid=$cart1['theme_id'];
$theme=mysqli_query($conn,"select * from theme where theme_id='$themeid';");
$theme1=mysqli_fetch_assoc($theme);
$themeprice=$theme1['theme_price'];

$serviceid=$cart1['service_id'];
$service=mysqli_query($conn,"select * from service where service_id='$serviceid';");
$service1=mysqli_fetch_assoc($service);
$serviceprice=$service1['service_price'];

$serviceid2=$cart1['service_id2'];
$service2=mysqli_query($conn,"select * from service where service_id='$serviceid2';");
$service2=mysqli_fetch_assoc($service2);
$serviceprice2=$service2['service_price'];

$serviceid3=$cart1['service_id3'];
$service3=mysqli_query($conn,"select * from service where service_id='$serviceid3';");
$service3=mysqli_fetch_assoc($service3);
$serviceprice3=$service3['service_price'];

$total=$packageprice+$themeprice+$serviceprice+$serviceprice2+$serviceprice3;
$totalprice = number_format($total, 2, '.', '');

$_SESSION['eid']=$eventid;

mysqli_query($conn,"update event set event_price='$totalprice' where event_id='$eventid';");
?>
<?php

	if(isset($_POST["remove_theme"]))
	{
		$eid=$cart1['event_id'];
		mysqli_query($conn,"update event set theme_id='0' where event_id='$eid'");
		
		$r='1';
	}
	
	if(isset($_POST["remove_service"]))
	{
		$eid=$cart1['event_id'];
		mysqli_query($conn,"update event set service_id='0' where event_id='$eid'");
		
		$r1='1';
	}
	
	if(isset($_POST["remove_service2"]))
	{
		$eid=$cart1['event_id'];
		mysqli_query($conn,"update event set service_id2='0' where event_id='$eid'");
		
		$r2='1';
	}
	
	if(isset($_POST["remove_service3"]))
	{
		$eid=$cart1['event_id'];
		mysqli_query($conn,"update event set service_id3='0' where event_id='$eid'");
		
		$r3='1';
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
<!-- check out -->
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
		<form  style=" margin-left:680px; margin-top:20px;"   class="navbar-form navbar-left" action="customer.php">
			   
			 
			  <button class="btn btn-default" >My Page</button>
			  
			  
			  </form>
		
			  <form  style=" margin-top:6px;" style="float:left"  action="cart.php">
			  <button class="btn btn-default" style="margin-left:10px; margin-top:11px;"><img src="img/shopping.png" style="width:25px; margin-right:5px;">Shopping Cart</button>
				
			</form>
		  </div>
		</nav>
		</header>
		<div><br><br><br><br><br></div>
<div class="container" style="margin-left:50px;">
	<div class="check-sec">	 
		<div class="col-md-3 cart-total">
			<a class="continue" href="package.php">Continue to Shopping</a>
			<div class="price-details">
				<h3>Price Details</h3>
				<span>Event Package</span>
				<span class="total1">RM <?php echo $packageprice ?></span>
				<?php if($themeid!=0)
				{?>
				<span>Theme</span>
				<span class="total1">
				<?php
				 echo 'RM '.$themeprice;} ?></span>
				<?php
				$i=1;
				if($serviceid!='0' ) 
				{?>
				<span>Additional Services</span>
				<span class="total1">
				 <?php
				echo $i.'. RM '.$serviceprice; $i++;
				 echo "<br>";
				}
				?>
				<?php
				
				if($serviceid2!='0') 
				{echo $i.'. RM '.$serviceprice2; $i++;
				echo "<br>";
				}
				
				?>
				<?php
				
				if($serviceid3!='0') 
				{echo $i.'. RM '.$serviceprice3; $i++;
				echo "<br>";
				}
				
				?>
				</span>
				<div class="clearfix"></div>				 
			</div>	
			<ul class="total_price">
			   <li class="last_price"> <h4>TOTAL</h4></li>	
			   <li class="last_price"><span>RM <?php echo $totalprice ?></span></li>			   
			</ul> 
			<div class="clearfix"></div>
			<div class="clearfix"></div>
			<a class="order" href="payment.php">Proceed to payment</a>
		
		</div>
		<div class="col-md-9 cart-items" style="padding-left:50px;">
			<h1>My Shopping Cart</h1>
			<hr>
			<br>
			   <?php
			   if(mysqli_num_rows($cart)==1)
				{
				$pid1=$cart1["package_id"];
				$package=mysqli_query($conn,"select * from package where package_id='$pid1';");
				
		while($package1 = mysqli_fetch_assoc($package))
			{
		?>
			<div class="cart-header">
				<a href="cart.php?del&id=<?php echo $cart1["booking_id"]?>" onclick="confirmation()" class="close1"> </a>
				<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<img src="../../Admin system/pages/<?php echo $package1["package_image"]; ?>" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						    <h3><a href="lafiesta.html" style="font-size:20px;"><?php echo $package1["package_name"]; ?></a></h3>
							<ul class="qty">
								<li><p></p></li>
							</ul>
							<ul class="qty">
								<li><p></p></li>
							</ul>
							<div class="delivery">
								 <p>RM <?php echo $package1["package_price"]; ?></p>
								 <div class="clearfix"></div>
							</div>								
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
				<?php }}
			
			else
			{
				echo "Your shopping cart is now empty! Go and get yourself an event!";
			}
			?>
			
		<?php
			   if(mysqli_num_rows($cart)==1)
				{
				$tid1=$cart1["theme_id"];
				$theme=mysqli_query($conn,"select * from theme where theme_id='$tid1';");
				
		while($theme1 = mysqli_fetch_assoc($theme))
			{
		?>
			<div class="cart-header">
			<form method="post">
				<button name="remove_theme" ><a class="close1"></a> </button></form>
				<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<img src="../../Admin system/pages/<?php echo $theme1["theme_image"]; ?>" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						    <h3><a href="lafiesta.html" style="font-size:20px;"><?php echo $theme1["theme_name"]; ?></a></h3>
							<ul class="qty">
								<li><p></p></li>
							</ul>
						
							<div class="delivery">
								 <p>RM <?php echo $theme1["theme_price"]; ?></p>
								 <div class="clearfix"></div>
							</div>								
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
				<?php }}
				?>
		
		<?php
			   if(mysqli_num_rows($cart)==1)
				{
				$sid1=$cart1["service_id"];
				$service=mysqli_query($conn,"select * from service where service_id='$sid1';");
				
		while($service1 = mysqli_fetch_assoc($service))
			{
		?>
			<div class="cart-header">
			<form method="post">
				<button name="remove_service" ><a class="close1"></a> </button></form>
				<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<img src="../../Admin system/pages/<?php echo $service1["service_image"]; ?>" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						    <h3><a href="lafiesta.html" style="font-size:20px;"><?php echo $service1["service_name"]; ?></a></h3>
							<ul class="qty">
								<li><p></p></li>
							</ul>
						
							<div class="delivery">
								 <p>RM <?php echo $service1["service_price"]; ?></p>
								 <div class="clearfix"></div>
							</div>								
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
				<?php }}
				?>
			
			
			
			<?php
			   if(mysqli_num_rows($cart)==1)
				{
				$sid1=$cart1["service_id2"];
				$service=mysqli_query($conn,"select * from service where service_id='$sid1';");
				
		while($service1 = mysqli_fetch_assoc($service))
			{
		?>
			<div class="cart-header">
			<form method="post">
				<button name="remove_service2" ><a class="close1"></a> </button></form>
				<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<img src="../../Admin system/pages/<?php echo $service1["service_image"]; ?>" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						    <h3><a href="lafiesta.html" style="font-size:20px;"><?php echo $service1["service_name"]; ?></a></h3>
							<ul class="qty">
								<li><p><?php echo $service1["service_id"]; ?></p></li>
							</ul>
						
							<div class="delivery">
								 <p>RM <?php echo $service1["service_price"]; ?></p>
								 <div class="clearfix"></div>
							</div>								
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
				<?php }}
				?>
				
				
			<?php
			   if(mysqli_num_rows($cart)==1)
				{
				$sid1=$cart1["service_id3"];
				$service=mysqli_query($conn,"select * from service where service_id='$sid1';");
				
		while($service1 = mysqli_fetch_assoc($service))
			{
		?>
			<div class="cart-header">
			<form method="post">
				<button name="remove_service3" ><a class="close1"></a> </button></form>
				<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							<img src="../../Admin system/pages/<?php echo $service1["service_image"]; ?>" class="img-responsive" alt=""/>
						</div>
					   <div class="cart-item-info">
						    <h3><a href="lafiesta.html" style="font-size:20px;"><?php echo $service1["service_name"]; ?></a></h3>
							<ul class="qty">
								<li><p><?php echo $service1["service_id"]; ?></p></li>
							</ul>
						
							<div class="delivery">
								 <p>RM <?php echo $service1["service_price"]; ?></p>
								 <div class="clearfix"></div>
							</div>								
					   </div>
					   <div class="clearfix"></div>
											
				  </div>
			 </div>
				<?php }}
				?>
			<div style="margin-bottom:100px;">
			</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //check out -->
<!---->
<div class="s-swiper__pagination-v1 s-swiper__pagination-v1--bc s-swiper__pagination-v1--white js__swiper-pagination"></div>
        </div>
		
		
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

<script>
function confirmation()
{
	event.preventDefault();
swal({
  title: "Are you sure?",
  text: "This package will be drop!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "No, cancel!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
	
  if (isConfirm) {
	  event.preventDefault();
	  <?php

		$id=$_GET["id"];
		$_SESSION['var'] = $id;
		
	?>
     swal("Deleted!", "This item has been removed from your cart.", "success");
	 location.href="cart_remove.php";
  } else {
    swal("Cancelled", "This item is safe is safe :)", "error");
  }
});
}
</script>
<?php

if(isset($_POST["remove_theme"]))
{
if($r=='1')
{
	
	echo '<script>swal("Success", "This theme is removed from your cart.", "success");</script>';
}

header("Refresh:1");
}

if(isset($_POST["remove_service"]))
{
if($r1=='1')
{
	
	echo '<script>swal("Success", "This service is removed from your cart.", "success");</script>';
}

}

if(isset($_POST["remove_service2"]))
{
if($r2=='1')
{
	
	echo '<script>swal("Success", "This service is removed from your cart.", "success");</script>';
}

}

if(isset($_POST["remove_service3"]))
{
if($r3=='1')
{
	
	echo '<script>swal("Success", "This service is removed from your cart.", "success");</script>';
}

}
?>
