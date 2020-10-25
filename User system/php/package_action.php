<?php include("db_connection.php"); ?>

<?php
	$id = "";
	
	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
	}
	else
	{
		header("Location: package_list.php");
	}
	
	$pack = mysqli_query($conn, "select * from package where package_id = '$id'");
	$pack1 = mysqli_fetch_assoc($pack);
	
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
		
        <!-- Favicon -->
        <link rel="shortcut icon" href="img/titlelogo.png" type="image/x-icon">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    </head>
	<style>
	#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
	</style>
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
			  <form  style="margin-top:18px;" style="float:left"  action="cart.php">
			  <button class="btn btn-default" style="margin-left:10px;"><img src="img/shopping.png" style="width:25px; margin-right:5px;">Shopping Cart</button>
				
			</form>
		  </div>
		</nav>
		</header>
		<div><br><br><br><br><br></div>
	<div class="product">
	 <div class="container">				
		 <div class="product-price1">
			 <div class="top-sing">
				  <div class="col-md-7 single-top">	
					 <div class="flexslider">
							  <ul class="slides">
								<li data-thumb="src="../../Admin system/pages/<?php echo $pack1["package_image"]; ?>" ">
									<div class="thumb-image"> <img src="../../Admin system/pages/<?php echo $pack1["package_image"]; ?>"  data-imagezoom="true" class="img-responsive" alt=""/> </div>
								</li>
								
							  </ul>
						</div>					 					 
					 <script src="js/imagezoom.js"></script>
						<script defer src="js/jquery.flexslider.js"></script>
						<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
						</script>

				 </div>	
			     <div class="col-md-5 single-top-in simpleCart_shelfItem" style="float:right; margin-top:-280px;">
					  <div class="single-para ">
	
					<h4><b><?php echo $pack1["package_name"]; ?></b></h4>						 
							<h5 class="item_price">RM <?php echo $pack1["package_price"]; ?></h5>							
							<p>Event Type:</p>
								 <?php echo $pack1["package_type"]; ?>
							<div class="prdt-info-grid">
							<p>Description:</p>
								 <?php echo $pack1["package_description"]; ?>
							</div>
							<!--
							<div class="check">
							 <p><span class="glyphicon glyphicon-map-marker" aria-hidden="true"></span>Enter pin code for delivery &amp; availability</p>
							 <form class="navbar-form">
								  <div class="form-group">
									<input type="text" class="form-control" placeholder="Enter Pin code">
								  </div>
								  <button type="submit" class="btn btn-default">Verify</button>
							 </form>
						    </div>-->
							<a href="booking.php?id=<?php echo $pack1["package_id"];?>" class="add-cart item_add">ADD TO CART</a>							
					 </div>
				 </div>
				 <div class="clearfix"> </div>
				 <br><br><br><br><br>
				  <h3>Package Gallery </h3>
				  <hr>
				  <br><br><br>
				 <?php 
				 $ins1=mysqli_query($conn,"select * from images where status='1' and package_id='$id'");
				 
				 if(mysqli_num_rows($ins1)!=0)
				 {
					 while($ins=mysqli_fetch_assoc($ins1))
					 {
				 ?>
				 <img id="myImg" src="../../Admin system/pages/images/upload/<?php echo $ins["file_name"]; ?>"  style="width:100%;max-width:250px">
					<div id="myModal" class="modal">
				 
				  <img class="modal-content" id="img01">
				</div>
				 <?php }}?>
				
		
				<br><br><br><br><br><br><br><br>
				
				
				 <h3>Customer Reviews & Feedback </h3>
				 <hr>
				  <?php
				 $packageid=$pack1['package_id'];
				 $feedback=mysqli_query($conn,"select * from feedback where package_id='$packageid'");
				 
				
				$q1=mysqli_query($conn,"select avg(package_rating) as total from feedback where package_id='$packageid'");
				$q11=mysqli_fetch_assoc($q1);
				
				$avg=$q11['total'];
				
				$avg=number_format($avg, 1);
				
				 if(mysqli_num_rows($feedback)!=0)
				 {
				 ?>
				 <table>
				 <tr>
				 <td colspan="2"><span style="font-size:20px;">Overall Rating :   <span style="font-size:35px;">    <?php echo $avg?> </span>/    <span style="font-size:22px;">   5.0   </span></td>
				 </tr>
				 <?php
				 while($f1=mysqli_fetch_assoc($feedback))
				 {		
				      $try=$f1['booking_id'];
					  $try1=mysqli_query($conn,"select * from booking where booking_id='$try'");
					  
					  $try2=mysqli_fetch_assoc($try1);
					  
					  $trycid=$try2['c_id'];
					  $try3=mysqli_query($conn,"select * from customer where c_id='$trycid'");
					  $final=mysqli_fetch_assoc($try3);
				 
					?>
					
					<tr>
					<td style="text-transform:uppercase;">
					<br><br>
					<?php echo $final['c_name'];?> <span style="text-transform:none">said:</span>
					</td>
					</tr>
					<tr>
					<td >
					<?php echo $f1['package_feedback'];?>
					</td>
					</tr>
				 
				  <?php
				  }?>
				  </table>
				 <?php
				 }
				 
				 else
				 {
					 ?>
					 
					 <h2> This package has no reviews yet.</h2>
					 <?php
				 }
				 ?>
				 
			 </div>
	     </div>
	
	 </div>
</div>
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

    </body>

    <!-- End Body -->
</html>
