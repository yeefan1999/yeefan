<?php include("checklogin.php"); 


$adi=$row['ad_profilepic'];
$adiname=$row['ad_name'];
$adind=$row['ad_id'];

?>

<?php 

	include('../PHPMailer/PHPMailerAutoload.php');
			
				
		if(isset($_POST["addbtn"]))
		{
			$ademail = $_POST["ademail"];
			
			$adname = $_POST["adname"];
			$profile = "images/faces-clipart/pic1.png";
			$check = "";

			$emailcheck1=mysqli_query($conn,"select ad_email from admin where ad_email ='$ademail'");
			$row = mysqli_fetch_assoc($emailcheck1);
			if(mysqli_num_rows($emailcheck1) != 0)
			{
			$check = '2';

			}
		
		if($check!='2')
		{
		$email = $_POST['ademail'];
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
		$mail->Body = '<p>Hi '.addslashes($_POST['adname']).',</p>
				<p>Welcome on board! Having you being a part of Funtastic Event is the greatest honour for us. Lets go further with having great teamwork with us.</p>
				<p>This email is to inform you that your account registration is successfully completed!</p>
				<p>Please login with this email : '.addslashes($_POST['ademail']).'</p>
				<p>Please login with this password : Funtastic999</p>
				<p>You may change your password after login the admin dashboard.</p>
				<p><small>If you are not awared of being a staff of FuntasticEvent, please reply this email and do not login to this email.</small></p>
				<br><p>You can login using URL below:</p>
				<p><a href ="http://localhost/Admin%20System/pages/account/login.php">http://localhost/Admin%20System/pages/account/login.php</a></p>
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
	
	if($row == "")
	{
		$row = 0;
	}
	
	if(isset($_POST["addbtn"]))
		{
			$ademail = $_POST["ademail"];
			
			$adname = $_POST["adname"];
			$profile = "images/faces-clipart/pic-1.png";
			$check = "";

			$emailcheck1=mysqli_query($conn,"select ad_email from admin where ad_email ='$ademail'");
			$row = mysqli_fetch_assoc($emailcheck1);
			if(mysqli_num_rows($emailcheck1) != 0)
			{
			$check = '2';

			}
			else
			{
				$sql =  "insert into admin(ad_email, ad_password, ad_name, ad_profilepic) values ('$ademail', md5('Funtastic999'), '$adname', 
				'$profile')";
				$result1 = mysqli_query($conn,$sql);
				
				if($result1)
				{
					
					$aid=$row['ad_id'];
					$aaresult=mysqli_query($conn,"select * from admin where ad_id='$aid'");
					$aaresult1=mysqli_fetch_assoc($aaresult);
					$aanama=$aaresult1['ad_name'];	
					date_default_timezone_set('Asia/Kuala_Lumpur');

					$date = date('Y-m-d H:i:s');
					
					
					$adname = $_POST["adname"];
					$notype="addadmin";
					$nocontent="$adname was added to the team!";
					
					$noti=mysqli_query($conn,"select * from admin");
					while($noti1=mysqli_fetch_assoc($noti))
					{
					
					$notiaid=$noti1['ad_id'];

					$rego=mysqli_query($conn,"insert into notification (notification_type,notification_content,notification_status,admin_id,notification_datetime) values
					('$notype','$nocontent','unread','$notiaid','$date')");
					}
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
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Funtastic Event Admin Portal</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../js/dropify/dist/css/dropify.min.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/logo-dark.png" />
  <link rel = "stylesheet" type = "text/css" href = "../sweetalert-master/dist/sweetalert.css">
  
  	<script>
		$(document).ready(function()
		{
			$('#verify').change(function()
			{
				$('#verifying').toggle();
			});
		});
		
		$(document).ready(function(){
			$("#showhidepassword").click(function(){
					$("#showhidepassword").css("display", "none");
					$("#showhidepassword1").css("display", "block");
					$("#userpassword").attr("type", "text");
					$("#userpassword").css("padding-left","20px");
			});
			$("#showhidepassword1").click(function(){
				$("#showhidepassword1").css("display", "none");
					$("#showhidepassword").css("display", "block");
					$("#userpassword").attr("type","password");
			});
		});
		
		$(document).ready(function(){
			$("#cancel").click(function(){
				$("#profileimg1").attr("src","../../images/faces-clipart/pic-1.png");
				$("#profileimg").val("");
			});
		});
	</script>
	<script>

	
	function validate_email2(str)
	{
		var user_email = document.getElementById("ademail");
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
		var user_email = document.getElementById("ademail");
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
			return false;
		}
		else if(!regex.test(user_email.value))
		{
            user_email_mess.innerHTML = "Please enter validate email format.";
			user_email.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("fail1").style.display = "block";
			document.getElementById("success1").style.display = "none";
			return false;
        }
		else if(checkemail1 == 1)
		{
			user_email_mess.innerHTML = "This email already register.";
			user_email.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("fail1").style.display = "block";
			document.getElementById("success1").style.display = "none";
			return false;
		}
		else
		{
			user_email_mess.innerHTML = "";
			user_email.style.borderColor = "#3c763d";
			document.getElementById("success1").style.display = "block";
			document.getElementById("fail1").style.display = "none";
			return true;
		}
	}
	
	function validate_email1()
	{
		var user_email = document.getElementById("ademail");
		var user_email_mess = document.getElementById("emailvalidate");
		
		user_email_mess.innerHTML = "";
		user_email.style.borderColor = "#ccc";
		document.getElementById("fail1").style.display = "none";
		document.getElementById("success1").style.display = "none";
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
	
	
	function submit_register()
	{

		checkemail=validate_email();
		checkcaptcha=get_action();
		
		if(checkemail==false || checkcaptcha==false)
		{
			
			return false;
			
		}
		
		else
		{
			
			return true;
		}
	
		
	}
	</script>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
	   <a href="index.php"><img src="../images/logo-dark.png" alt="homepage" class="dark-logo" style="margin-left:30px;"/></a>
        <a class="navbar-brand brand-logo" href="index.php"><img src="../images/logo-text.png" style="margin-left:-20px;"alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="../images/logo-dark.png" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
              <form class="d-flex align-items-center h-100" method="post" action="search.php">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                  <i class="input-group-text border-0 mdi mdi-magnify"></i>                
              </div>
              <input type="text" name="search_query" class="form-control bg-transparent border-0" placeholder="Search">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <div class="nav-profile-img">
                <img src="<?php echo $adi; ?>" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php echo $adiname; ?></p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a href="profile.php" class="dropdown-item" >
                <i class="mdi mdi-cached mr-2 text-success"></i>
                My Profile
              </a>
              <div class="dropdown-divider"></div>
              <a href="log_out.php" class="dropdown-item" >
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Signout
              </a>
            </div>
          </li>
          <li class="nav-item d-none d-lg-block full-screen-link">
            <a class="nav-link">
              <i class="mdi mdi-fullscreen" id="fullscreen-button"></i>
            </a>
          </li>
          
           
         
		  <?php
			
			$currentid11=$adind;
			
			$ncheck121=mysqli_query($conn,"select * from notification where admin_id='$currentid11' and notification_status='unread'");
			
			if(mysqli_num_rows($ncheck121)!=0)
			{
			?>
			 <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
			<i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
			<h6 class="p-3 mb-0">Notifications</h6>
			<?php 
			}
			
			else if(mysqli_num_rows($ncheck121)==0)
			{
			?>
			  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
			<i class="mdi mdi-bell-outline"></i>
              <span class="count-symbol bg-danger"></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
			<h6 class="p-3 mb-0">Notifications</h6>
			 
			<?php
			}
			?>
			
              
			<?php
			
			$currentid=$adind;
			
			$ncheck=mysqli_query($conn,"select * from notification where admin_id='$currentid' and notification_status='unread'");
			
			
			if(mysqli_num_rows($ncheck)!=0)
			{
				
				while($ncheck1=mysqli_fetch_assoc($ncheck))
				{
					
					
					if($ncheck1['notification_type']=='addorder')
					{
			?>
					
          
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-calendar"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">New Order</h6>
                  <p class="text-gray ellipsis mb-0">
                    <?php echo $ncheck1['notification_content'];?>
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
			  
					<?php }?>
			  
			 <?php if($ncheck1['notification_type']=='cancelorder')
					{
			?>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-settings"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">Cancelled Order</h6>
                  <p class="text-gray ellipsis mb-0">
                     <?php echo $ncheck1['notification_content'];?>
                  </p>
                </div>
              </a>
			  
			   <div class="dropdown-divider"></div>
			  <?php }?>
			  
			  <?php if($ncheck1['notification_type']=='addadmin')
					{
			?>
             
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-link-variant"></i>
                  </div>
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  <h6 class="preview-subject font-weight-normal mb-1">New Admin</h6>
                  <p class="text-gray ellipsis mb-0">
                    <?php echo $ncheck1['notification_content'];?>
                  </p>
                </div>
              </a>
			   <div class="dropdown-divider"></div>
			  <?php }?>
			<?php 
			}}
			
			else
			{?>
			
			  <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                 
                </div>
                <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                  
                  <p class="text-gray ellipsis mb-0">
                    No New Notifications
                  </p>
                </div>
              </a>
				
				
			<?php
			}
			
			?>
			
			  <div class="dropdown-divider"></div>
			  <form action="notification.php">
              
             <a href="notification.php"> <h6 class="p-3 mb-0 text-center" >Check all notifications</h6></a>
			  </form>
            </div>

          </li>
		  
		  
          <li class="nav-item nav-logout d-none d-lg-block">
            <a class="nav-link" href="log_out.php">
              <i class="mdi mdi-power"></i>
            </a>
          </li>
        
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
          <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?php echo $adi; ?>" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?php echo $adiname; ?></span>
                <span class="text-secondary text-small">Administrator</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="profile.php">
              <span class="menu-title">My Profile</span>
              <i class="mdi mdi-face-profile menu-icon"></i>
            </a>
          </li>
		  <li class="nav-item">
            <a class="nav-link" href="todolist.php">
              <span class="menu-title">My To Do List</span>
              <i class="mdi mdi-dots-horizontal menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="announcement.php">
              <span class="menu-title">Announcement</span>
              <i class="mdi mdi-new-box menu-icon"></i>
            </a>
          </li>
            
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Forms</span>
			  <i class="menu-arrow"></i>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
				<div class="collapse" id="form">
				  <ul class="nav flex-column sub-menu">
					<li class="nav-item"> <a class="nav-link" href="add_admin_form.php">Add Admin Form</a></li>
					<li class="nav-item"> <a class="nav-link" href="add_package_form.php">Add Package Form</a></li>
					<li class="nav-item"> <a class="nav-link" href="add_service_form.php">Add Service Form</a></li>
					<li class="nav-item"> <a class="nav-link" href="add_theme_form.php">Add Theme Form</a></li>
					<li class="nav-item"> <a class="nav-link" href="send_subscribe_form.php">Send News Form</a></li>
				  </ul>
				</div>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#table" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Tables</span>
			   <i class="menu-arrow"></i>
              <i class="mdi mdi-table-large menu-icon"></i>
            </a>

				<div class="collapse" id="table">
				  <ul class="nav flex-column sub-menu">
					<li class="nav-item"> <a class="nav-link" href="admin_list.php">Admin List</a></li>
					<li class="nav-item"> <a class="nav-link" href="customer_list.php">Customer List</a></li>
					<li class="nav-item"> <a class="nav-link" href="customer_order_list.php">Customer Order List</a></li>
					<li class="nav-item"> <a class="nav-link" href="cancel_completed_order.php" style="font-size:11.5px;">Completed & Cancelled Order</a></li>
					<li class="nav-item"> <a class="nav-link" href="package_list.php">Package List</a></li>
					<li class="nav-item"> <a class="nav-link" href="service_list.php">Service List</a></li>
					<li class="nav-item"> <a class="nav-link" href="theme_list.php">Theme List</a></li>
				  </ul>
				  </div>
          </li>
		  
		  <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#removed" aria-expanded="false" aria-controls="ui-basic">
              <span class="menu-title">Removed Item</span>
			   <i class="menu-arrow"></i>
              <i class="mdi mdi-cart-off menu-icon"></i>
            </a>

				<div class="collapse" id="removed">
				  <ul class="nav flex-column sub-menu">
					<li class="nav-item"> <a class="nav-link" href="removed_package.php">Removed Package</a></li>
					<li class="nav-item"> <a class="nav-link" href="removed_theme.php">Removed Theme</a></li>
					<li class="nav-item"> <a class="nav-link" href="removed_service.php">Removed Service</a></li>
				
				  </ul>
				  </div>
          </li>
		  
		  
          <li class="nav-item sidebar-actions">
            <span class="nav-link">
              <div class="border-bottom">
                <h6 class="font-weight-normal mb-3"></h6>                
              </div>
            </span>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-file-document-box"></i>                 
              </span>
              Forms
            </h3>
         
          </div>
		  <br><br>
          <div class="row" style="margin-left:50px;">
            <div class="col-md-10 grid-margin stretch-card" >
              <div class="card" >
                <div class="card-body" >
                  <h4 class="card-title" >Add Admin Form</h4>
                  <p class="card-description">
                    Add New Administrator
					<hr>
                  </p>
                  <form name="register" onsubmit="return submit_register();" autocomplete="off" method="post" action="" class="forms-sample" ><br>
                    <div class="form-group" >
					
                      <label>Name</label>
					   <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="mdi mdi-account"></i></span>
                      </div>
                      <input type="text" class="form-control" id="adname" name="adname" placeholder="Name"
					  onfocusout = "validate_name()" onkeyup = "validate_name2(this.value)" onfocus = "validate_name1()">
					 <span class="glyphicon glyphicon-remove form-control-feedback" id = "fail4"></span>
					 <span class="glyphicon glyphicon-ok form-control-feedback" id ="success4"></span>
					 <span id = "namevalidate"></span>
					 <span id = "namevalidate1"></span>
                      
                    </div>
					</div>
					
                    <div class="form-group">
                      <label>Email address</label>
                      <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="mdi mdi-email"></i></span>
                      </div>
                      <input type="text" class="form-control" id="ademail" name="ademail" placeholder="Email" 
					  onfocusout = "validate_email()" onkeyup = "validate_email2(this.value)" onfocus = "validate_email1()"/ required>
					  
					   <span class="glyphicon glyphicon-remove form-control-feedback" id = "fail1"></span>
					  <span class="glyphicon glyphicon-ok form-control-feedback" id ="success1"></span>
					  <span id = "emailvalidate"></span>
					  <span id = "emailvalidate1"></span>
                      
                    </div>
                    </div>
					
                   
					<br>
					<div class="g-recaptcha" id="rcaptcha"  data-sitekey="6LcENawUAAAAAKsV_GarmubeT-xFSeUjJxUPfL9T"></div>
					<br>
					<span id="captcha" style="color:red" /></span>
                  <br>
				  <br>
                    <button type="submit" name="addbtn" id="addbtn" class="btn btn-gradient-primary mr-2">Add</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
			</div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Funtastic Event</span>
           
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../js/dashboard.js"></script>
  
  	 <script src="../js/dropify/dist/js/dropify.min.js"></script>
	 <script type="text/javascript" src = "../sweetalert-master/dist/sweetalert.min.js"></script>
	 <script src='https://www.google.com/recaptcha/api.js'></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>
  <!-- End custom js for this page-->
</body>

</html>

<?php
	if(isset($_POST["addbtn"]))
	{
		if($check == '1')
		{
					
	
			echo '<script>swal("Success", "This account has been successfully added.", "success");</script>';
			
		}
		
		else if($check == '0')
		{
			echo '<script>swal("Error", "Fail to add this account.", "error");</script>';
			
			
		}
		
		else if($check == '2')
		{
			echo '<script>swal("Error", "Email Account Repeated. Try another email account.", "error");</script>';
		}
	}
?>
