<?php include("db_connection.php"); ?>

<?php 

	include('../PHPMailer/PHPMailerAutoload.php');
			
				
		if(isset($_POST["resetbtn"]))
		{
			$ademail = $_POST["ademail"];

			$check = "";

			$emailcheck1=mysqli_query($conn,"select ad_email,ad_name from admin where ad_email ='$ademail'");
			$row = mysqli_fetch_assoc($emailcheck1);
			if(mysqli_num_rows($emailcheck1) == 0)
			{
			$check = '2';

			}
		
		if($check=='1'||$check=='')
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
				
		$mail->Subject = 'Funtastic Event Reset Password Confirmation';
		$mail->Body = '<p>Hi '.addslashes($row['ad_name']).',</p>
				<p>You have performed a request to reset your password. </p>
				<p>This email is to inform you that your password is successfully changed!</p>

				<p>Please login your account with this password : Funtastic999</p>
				<p>You may change your password after login to the admin dashboard.</p>
				<p><small>If you do not performed this request, please inform us.</small></p>
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
	$_SESSION["pagename"] = "reset";
	

	
	if(isset($_POST["resetbtn"]))
		{
			$ademail = $_POST["ademail"];

			$emailcheck1=mysqli_query($conn,"select ad_email from admin where ad_email ='$ademail'");
			$row = mysqli_fetch_assoc($emailcheck1);
			if(mysqli_num_rows($emailcheck1) == 0)
			{
			$check = '2';

			}
			else
			{
				$sql =  "update admin set ad_password=md5('Funtastic999') where ad_email= '$ademail'";
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
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/favicon.png" />
  <link rel = "stylesheet" type = "text/css" href = "../sweetalert-master/dist/sweetalert.css">
  <script>

	function login()
	{
		var useremail = document.loginform.ademail.value;
		var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
		var useremail_1 = document.getElementById("ademail");
		var useremail_check;
		if(useremail == "" || !(isNaN(useremail)))
		{
			document.getElementById("loginemail_error").innerHTML = "Please enter an email.";
			useremail_1.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("loginemail_error").style.display = "block";
			return false;
		}
		else if(!regex.test(useremail))
		{
            document.getElementById("loginemail_error").innerHTML = "Please enter an valid email.";
			useremail_1.style.borderColor = "rgba(234,80,80,0.8)";
			document.getElementById("loginemail_error").style.display = "block";
			return false;
        }
		else
		{
			document.getElementById("loginemail_error").innerHTML = "";
			useremail_1.style.borderColor = "white";
			document.getElementById("loginemail_error").style.display = "none";
			return true;
		}
		
		
		
	}
	function get_action(form) 
	{
    var v = grecaptcha.getResponse();
    if(v.length == 0)
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

		checkemail=login();
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
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left p-5">
              <div class="brand-logo">
                <img src="../images/logo-text.png">
              </div>
              <h4>Forgot Your Password?</h4>
              <h6 class="font-weight-light">Enter your email to reset</h6>
			  
			  
              <form class="pt-3" name="loginform" onsubmit = "return submit_register();" autocomplete = "off" novalidate method = "post" action = "">
                <div class="form-group">
                  <input type="email" id = "ademail" name="ademail" class="form-control form-control-lg" placeholder="Email Account">
                  <span id = "loginemail_error"></span>
				</div>
                <div class="g-recaptcha" id="rcaptcha"  data-sitekey="6LcENawUAAAAAKsV_GarmubeT-xFSeUjJxUPfL9T"></div>
					<span id="captcha" style="color:red" /></span>
                <div class="mt-3">
                  <button type="submit" name="resetbtn" onclick="submit_register()" id="resetbtn" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >Reset</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                 
                  <a href="login.php" class="auth-link text-black">Login Now</a>
                </div>
                
              </form>
			  
			
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../vendors/js/vendor.bundle.base.js"></script>
  <script src="../vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../js/off-canvas.js"></script>
  <script src="../js/misc.js"></script>
  <!-- endinject -->
  <script type="text/javascript" src = "../sweetalert-master/dist/sweetalert.min.js"></script>
	 <script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>
<?php

if(isset($_POST["resetbtn"]))
	{
		
		if($check == '0')
		{
			echo '<script>swal("error", "Sorry. Unable to perform this request. Please reach technical team for assistance.", "error");</script>';
		
		}
		
		else if($check == '1')
		{
			echo '<script>swal("Success", "A confirmation has been sent to your mailbox, click to reset.", "success");</script>';
			
		}
		
		else if($check == '2')
		{
			echo '<script>swal("error", "This email account does not exist.", "error");</script>';
		
		}
	
	}

?>