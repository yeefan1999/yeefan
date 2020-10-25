<?php include("db_connection.php"); ?>
<?php
	if(isset($_COOKIE["ad_login"]) && $_COOKIE["ad_login"] == 1 || !empty($_SESSION['adlogined']))
	{
		$email1 = $_COOKIE["ad_email"];
		if(isset($_COOKIE["ad_password"]))
		{
			$password1 = $_COOKIE["ad_password"];
		}
		$result2 = mysqli_query($conn, "select * from admin where ad_email = '$email1' and ad_password = '$password1'");
		if(mysqli_num_rows($result2) == 1)
		{
			header("Location: index.php");
		}
		else
		{
			setcookie("ad_login", "0", time() + (10 * 365 * 24 * 60 * 60), "/Admin system/");
		}
	}

		if(isset($_POST["loginbtn"]))
		{
			$email = $_POST["useremail1"];
			$password = md5($_POST["userpassword1"]);
			$error = 0;
			$result = mysqli_query($conn, "select * from admin where ad_email = '$email' and ad_password = '$password'");
			$row = mysqli_fetch_assoc($result);
			
			if(mysqli_num_rows($result) != 1)
			{
			$error = 1;

			}
			
			else
			{
				if(mysqli_num_rows($result) == 1)
				{
					
						if(isset($_COOKIE["ad_email"]) && isset($_COOKIE["ad_password"]))
						{
							setcookie("ad_email","",time() + (10 * 365 * 24 * 60 * 60), "/Admin system/");
							setcookie("ad_password","",time() + (10 * 365 * 24 * 60 * 60), "/Admin system/");
							setcookie("ad_login", "", time() + (10 * 365 * 24 * 60 * 60),"/Admin system/");
							setcookie("ad_id", "", time() + (10 * 365 * 24 * 60 * 60),"/Admin system/");
						}
						$_SESSION["login"] = 1;
						$_SESSION["accountid"] = $row["ad_id"];
					
					
					
				}
			header("Location: index.php");
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
              <h4>Hello! let's get started</h4>
              <h6 class="font-weight-light">Sign in to continue.</h6>
              <form class="pt-3" name="loginform" onsubmit = "return login();" autocomplete = "off" novalidate method = "post" action = "">
                <div class="form-group">
                  <input type="email" id = "useremail" name="useremail1" class="form-control form-control-lg" placeholder="Username">
                  <span id = "loginemail_error"></span>
				</div>
                <div class="form-group">
                  <input type="password" id = "userpassword" name="userpassword1" class="form-control form-control-lg"  placeholder="Password">
                <span id = "loginpassword_error"></span>
				</div>
                <div class="mt-3">
                  <button type="submit" name = "loginbtn" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                 
                  <a href="reset_pass.php" class="auth-link text-black">Forgot password?</a>
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
if(isset($_POST["loginbtn"]))
	{
		
		if($error == 1)
		{
			echo '<script>swal("Error", "Your email or password is invalid", "error");</script>';
		
		}
	}

?>