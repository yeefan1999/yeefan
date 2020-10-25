<?php include("checklogin.php");?>
<?php


	if(isset($_POST["editdone"]))
	{
		$adname = $_POST["editname"];
		$phone = $_POST["editphone"];
		$address = $_POST["editaddress"];
		$state = $_POST["editstate"];
		$postcode = $_POST["editpostcode"];
		$id1 = $row["ad_id"];
		
		$done="";
		$profilename = $_FILES['file']['name'];
	    $target_dir = "images/upload/";
	    $target_file = $target_dir . basename($_FILES["file"]["name"]);
		
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif");
		
		 if( in_array($imageFileType,$extensions_arr) ){
			

			 // Insert record
			 $query = "update admin set ad_profilepic ='$target_dir$profilename' where ad_id = '$id1'";
			 mysqli_query($conn,$query);
		  
			 // Upload file
			 move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$profilename);

		  }
		

		
		$_SESSION["edit"] = 1;
		
			$result=mysqli_query($conn, "update admin set ad_name = '$adname', ad_phonenumber = '$phone',
			ad_address = '$address', ad_state = '$state', ad_postcode = '$postcode' where ad_id = '$id1'");
			if($result)
			{
			$done='1';
			}
		
	}
	
	if(isset($_POST["chgpassword"]))
	{
		$adpass = md5($_POST["password"]);
		$adpass_new = md5($_POST["userpassword"]);
		$adpass_new1 = md5($_POST["cpassword"]);
		if($adpass_new==$adpass_new1)
		{
		$id1 = $row["ad_id"];
		
		$chgpass="";
		$old_pass=$row['ad_password'];
		if($adpass!=$adpass_new)
		{
		if($old_pass==$adpass)
		{
		$chgpasss=mysqli_query($conn, "update admin set ad_password='$adpass_new' where ad_id='$id1'");
			if($chgpasss)
			{
			$chgpass='1';
			}
		}
		else
		{$chgpass='2';}
		}
		else
		{
			$chgpass='3';
		}
		}
		else
		{
			$chgpass='4';
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
  <!-- inject:css -->
  <link rel="stylesheet" href="../js/dropify/dist/css/dropify.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../images/logo-dark.png" />
  <link rel = "stylesheet" type = "text/css" href = "../sweetalert-master/dist/sweetalert.css">
  
<script>


	
	function ve_name2()
	{
		var name = document.getElementById("editname").value;
		var name_check = document.getElementById("mess_name2");
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200)
			{
				name_check.innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET", "../ajax/checkeditname.php?name=" + name + "&id=" + <?php echo $row["ad_id"];?>, true);
		xmlhttp.send();
	}
	
	function ve_name()
	{
		var name = document.getElementById("editname");
		var mess_name = document.getElementById("mess_name");
		var mess_name1 = document.getElementById("mess_name1");
		var mess_name2 = document.getElementById("mess_name2");
		var checkname;
		
		if(name.value == "")
		{
			mess_name.style.display = "table-row";
			mess_name1.innerHTML = "You can't leave this empty.";
			name.style.borderColor = "rgba(234,80,80,0.8)";
			checkname = 1;
		}
		else if(mess_name2.innerHTML != 0)
		{
			mess_name.style.display = "table-row";
			mess_name1.innerHTML = "This name already exist.";
			name.style.borderColor = "rgba(234,80,80,0.8)";
			checkname = 1;
		}
		else
		{
			mess_name.style.display = "none";
			mess_name1.innerHTML = "";
			name.style.borderColor = "#3c763d";
			checkname = 0;
		}
		return checkname;
	}
	
	function ve_name3()
	{
		var name = document.getElementById("editname");
		var mess_name = document.getElementById("mess_name");
		var mess_name1 = document.getElementById("mess_name1");
		
		name.style.borderColor = "#ccc";
		mess_name.style.display = "none";
		mess_name1.innerHTML = "";
	}
	
	function ve_phone()
	{
		var phone = document.getElementById("editphone");
		var mess_phone = document.getElementById("mess_phone");
		var mess_phone1 = document.getElementById("mess_phone1");
		var checkphone;
		
		if(phone.value == "")
		{
			mess_phone.style.display = "table-row";
			mess_phone1.innerHTML = "You can't leave this empty.";
			phone.style.borderColor = "rgba(234,80,80,0.8)";
			checkphone = 1;
		}
		else if(phone.value.length <= 9)
		{
			mess_phone.style.display = "table-row";
			mess_phone1.innerHTML = "Please enter validate number.";
			phone.style.borderColor = "rgba(234,80,80,0.8)";
			checkphone = 1;
		}
		else
		{
			mess_phone.style.display = "none";
			mess_phone1.innerHTML = "";
			phone.style.borderColor = "#3c763d";
			checkphone = 0;
		}
		return checkphone;
	}
	
	function ve_phone2()
	{
		var phone = document.getElementById("editphone");
		var mess_phone = document.getElementById("mess_phone");
		var mess_phone1 = document.getElementById("mess_phone1");
		
		phone.style.borderColor = "#ccc";
		mess_phone.style.display = "none";
		mess_phone1.innerHTML = "";
	}
	
	function ve_address()
	{
		var address = document.getElementById("editaddress");
		var mess_address = document.getElementById("mess_address");
		var mess_address1 = document.getElementById("mess_address1");
		var checkaddress;
		
		if(address.value == "")
		{
			mess_address.style.display = "table-row";
			mess_address1.innerHTML = "You can't leave this empty.";
			address.style.borderColor = "rgba(234,80,80,0.8)";
			checkaddress = 1;
		}
		else if(address.value.length <= 10)
		{
			mess_address.style.display = "table-row";
			mess_address1.innerHTML = "Please enter validate address.";
			address.style.borderColor = "rgba(234,80,80,0.8)";
			checkaddress = 1;
		}
		else
		{
			mess_address.style.display = "none";
			mess_address1.innerHTML = "";
			address.style.borderColor = "#3c763d";
			checkaddress = 0;
		}
		return checkaddress;
	}
	
	function ve_address2()
	{
		var address = document.getElementById("editaddress");
		var mess_address = document.getElementById("mess_address");
		var mess_address1 = document.getElementById("mess_address1");
		
		address.style.borderColor = "#ccc";
		mess_address.style.display = "none";
		mess_address1.innerHTML = "";
	}
	
	function ve_state()
	{
		var state = document.getElementById("editstate");
		var mess_state = document.getElementById("mess_state");
		var mess_state1 = document.getElementById("mess_state1");
		var checkstate;
		
		if(state.value == "")
		{
			mess_state.style.display = "table-row";
			mess_state1.innerHTML = "Please select your state.";
			state.style.borderColor = "rgba(234,80,80,0.8)";
			checkstate = 1;
		}
		else
		{
			mess_state.style.display = "none";
			mess_state1.innerHTML = "";
			state.style.borderColor = "#3c763d";
			checkstate = 0;
		}
		return checkstate;
	}
	
	function ve_postcode()
	{
		var postcode = document.getElementById("editpostcode");
		var mess_postcode = document.getElementById("mess_postcode");
		var mess_postcode1 = document.getElementById("mess_postcode1");
		var regex = /[0-9]+$/;
		var checkpostcode;
		
		if(postcode.value == "")
		{
			mess_postcode.style.display = "table-row";
			mess_postcode1.innerHTML = "You can't leave this empty.";
			postcode.style.borderColor = "rgba(234,80,80,0.8)";
			checkpostcode = 1;
		}
		else if(!regex.test(postcode.value) || postcode.value.length != 5)
		{
			mess_postcode.style.display = "table-row";
			mess_postcode1.innerHTML = "Please enter validate postcode.";
			postcode.style.borderColor = "rgba(234,80,80,0.8)";
			checkpostcode = 1;
		}
		else
		{
			mess_postcode.style.display = "none";
			mess_postcode1.innerHTML = "";
			postcode.style.borderColor = "#3c763d";
			checkpostcode = 0;
		}
		return checkpostcode;
	}
	
	function ve_postcode2()
	{
		var postcode = document.getElementById("editpostcode");
		var mess_postcode = document.getElementById("mess_postcode");
		var mess_postcode1 = document.getElementById("mess_postcode1");
		
		postcode.style.borderColor = "#ccc";
		mess_postcode.style.display = "none";
		mess_postcode1.innerHTML = "";
	}
	
	function editform()
	{
		var checkname = ve_name();
		var checkphone = ve_phone();
		var checkaddress = ve_address();
		var checkstate = ve_state();
		var checkpostcode = ve_postcode();
		
		if(checkname == 0 && checkphone == 0 && checkaddress == 0 && checkstate == 0 && checkpostcode == 0 )
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	
</script>

<script>
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
	
	function validate_password1()
	{
		var user_password = document.getElementById("userpassword");
		var user_password_mess = document.getElementById("passwordvalidate");
		
		user_password_mess.innerHTML = "";
		user_password.style.borderColor = "#ccc";
		
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
	
	function change_password()
	{

		checkpass=validate_password();
		checkpass1=validate_repeat_password();
		
		if(checkpass==false||checkpass1==false)
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
                <img src="<?php echo $row["ad_profilepic"]; ?>" alt="image">
                <span class="availability-status online"></span>             
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?php echo $row["ad_name"]; ?></p>
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
			
			$currentid11=$row['ad_id'];
			
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
			
			$currentid=$row['ad_id'];
			
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
                <img src="<?php echo $row["ad_profilepic"]; ?>" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?php echo $row["ad_name"]; ?></span>
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

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
         
          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-face-profile"></i>                 
              </span>
              My Profile
            </h3>
         
          </div>
		  
		  <div class="row">
			 <div class="col-lg-4 grid-margin stretch-card">
			 <div class="card">
                <div class="card-body">
				
				<table class="table">
				
				<tr>
				<td style="text-align:center;">
                <img src="<?php echo $row["ad_profilepic"]; ?>" style="height:130px; width:130px;" alt="image">
				<br><br><br>
				<p style="font-size:18px; font-weight:bold;"> <?php echo $row["ad_name"]; ?></p>
			
                </td>
				</tr>
				<tr>
				<td style="text-align:left;">
                <br>
				<p style="font-size:14px; color:grey;"> Email Address</p>
				<p style="font-size:15px; color:black; margin-top:-15px; font-family:Arial;"><?php echo $row["ad_email"]; ?></p>
				<br>
				<p style="font-size:14px; color:grey;"> Contact Number</p>
				<p style="font-size:15px; color:black; margin-top:-15px; font-family:Arial;"> <?php echo $row["ad_phonenumber"]; ?></p>
				<br>
				<p style="font-size:14px; color:grey;"> Address</p>
				<p style="font-size:15px; color:black; margin-top:-15px; font-family:Arial;"> <?php echo $row["ad_address"]; ?></p>
                </td>
				
				</tr>
				</table>				
              </div>
				</div>
				</div>
           
		   <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Edit Profile</a> </li>
								<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#changepassword" role="tab">Change Password</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                             
                                <div class="tab-pane active" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $row["ad_name"]; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $row["ad_email"]; ?></p>
                                            </div>
                                            <div class="col-md-4 col-xs-6"> <strong>Contact</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $row["ad_phonenumber"]; ?></p>
                                            </div>
                                        </div>
											
   										<br><br>
										<h4 class="font-medium m-t-30">Introduction</h4>
										<hr>
										 <br><br>
											<div class="form-group">
                                                <label class="col-md-12"><b>Address</b></label>
                                                <div class="col-md-12">
												<br>
                                                    <?php echo $row["ad_address"]; ?>
                                                </div>
                                            </div>
										<br>
											<div class="form-group">
                                                <label class="col-md-12"><b>Postcode</b></label>
                                                <div class="col-md-12">
												<br>
                                                    <?php echo $row["ad_postcode"]; ?>
                                                </div>
                                            </div>
											<br>
											 <div class="form-group">
                                                <label class="col-sm-12"><b>State</b></label>
                                                <div class="col-sm-12">
												<br>
                                                    <?php echo $row["ad_state"]; ?>
                                                </div>
                                            </div>
										
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
									
                                          <form class="form-horizontal form-material" name = "editprofile" method = "POST" action = "" autocomplete = "off" enctype="multipart/form-data" onsubmit = " return editform()">
										<table>
										<tr>
										<td>
										<div class="col-lg-12 col-md-4" style="margin-left:-40px;">
											<div class="card">
												<div class="card-body">
														<h6 >Photo Upload</h6>

														<input type="file" name = "file" id="file" class="dropify" />
													</div>
												</div>
											</div>
											</td>
											</tr>
											<tr>
											<td>
                                            <div class="form-group">
                                                <label class="col-md-12">Name</label>
                                                <div class="col-md-12">
                                                    <input id = "editname" name = "editname" onfocusout = "ve_name()" onkeyup = "ve_name2()" onfocus = "ve_name3()"
													type="text" value="<?php echo $row["ad_name"]; ?>" class="form-control form-control-line">
                                                </div>
											</div>
											</td>
											</tr>
											<tr id = "mess_name">
										<td></td>
										<td><span id = "mess_name1"></span><span id = "mess_name2" style = "display:none;"></span></td>
										</tr>
										<tr>
										<td>
											<div class="form-group">
                                                <label class="col-md-12">Contact Number</label>
                                                <div class="col-md-12">
                                                    <input type="text" id = "editphone" name = "editphone" data-format="dddddddddd" 
													onfocusout = "ve_phone()" onfocus = "ve_phone2()"
													value="<?php echo $row["ad_phonenumber"]; ?>" class="form-control form-control-line">
                                                </div>
                                            </div>
											</td>
											</tr>
											<tr id = "mess_phone">
											<td></td>
											<td><span id = "mess_phone1"></span></td>
											</tr>
											<tr>
											<td>
											<div class="form-group">
                                                <label class="col-md-12">Address</label>
                                                <div class="col-md-12">
                                                    <textarea id = "editaddress" name = "editaddress" onfocusout = "ve_address()" onfocus = "ve_address2()"
													class="form-control form-control-line"><?php echo $row["ad_address"]; ?></textarea>
                                                </div>
                                            </div>
											</td>
											</tr>
											<tr id = "mess_address">
												<td></td>
												<td><span id = "mess_address1"></span></td>
											</tr>
											  
										<tr>
										<td>
											<div class="form-group">
                                                <label class="col-md-12">Postcode</label>
                                                <div class="col-md-12">
                                                    <input type="text" id = "editpostcode" name = "editpostcode" onfocusout = "ve_postcode()" onfocus = "ve_postcode2()"
													value="<?php echo $row["ad_postcode"]; ?>" class="form-control form-control-line">
                                                </div>
                                            </div>
											</td>
											</tr>
											<tr id = "mess_postcode">
											<td></td>
											<td><span id = "mess_postcode1"></span></td>
											</tr>
											
											<tr >
											<td>
											 <div class="form-group">
                                                <label class="col-sm-12">State</label>
                                                <div class="col-sm-12">
                                                   <select id = "editstate" name = "editstate" class="form-control form-control-line" onchange = "ve_state()" >
													<option value = "">--State--</option>
													<option value = "Johor" <?php if($row["ad_state"] == "Johor"){ echo "selected"; } ?>>Johor</option>
													<option  value = "Kedah" <?php if($row["ad_state"] == "Kedah"){ echo "selected"; } ?>>Kedah</option>
													<option value = "Kelantan" <?php if($row["ad_state"] == "Kelantan"){ echo "selected"; } ?>>Kelantan</option>
													<option value = "Kuala Lumpur" <?php if($row["ad_state"] == "Kuala Lumpur"){ echo "selected"; } ?>>Kuala Lumpur</option>
													<option value = "Melaka" <?php if($row["ad_state"] == "Melaka"){ echo "selected"; } ?>>Melaka</option>
													<option value = "Negeri Sembilan" <?php if($row["ad_state"] == "Negeri Sembilan"){ echo "selected"; } ?>>Negeri Sembilan</option>
													<option value = "Pahang" <?php if($row["ad_state"] == "Pahang"){ echo "selected"; } ?>>Pahang</option>
													<option value = "Penang" <?php if($row["ad_state"] == "Penang"){ echo "selected"; } ?>>Penang</option>
													<option value = "Perak" <?php if($row["ad_state"] == "Perak"){ echo "selected"; } ?>>Perak</option>
													<option value = "Perlis" <?php if($row["ad_state"] == "Perlis"){ echo "selected"; } ?>>Perlis</option>
													<option value = "Sabah" <?php if($row["ad_state"] == "Sabah"){ echo "selected"; } ?>>Sabah</option>
													<option value = "Sarawak" <?php if($row["ad_state"] == "Sarawak"){ echo "selected"; } ?>>Sarawak</option>
													<option value = "Selangor" <?php if($row["ad_state"] == "Selangor"){ echo "selected"; } ?>>Selangor</option>
													<option value = "Terengganu" <?php if($row["ad_state"] == "Terengganu"){ echo "selected"; } ?>>Terengganu</option>
													</select>
                                                </div>
												
                                            </div>
											</td>
											</tr>
											<tr id = "mess_state">
											<td></td>
											<td><span id = "mess_state1"></span></td>
										</tr>
                                       
                                         <tr>
										 <td>
										 <br>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type = "submit" name ="editdone" class="btn btn-success">Update Profile</button>
                                                </div>
                                            </div>
											</td>
											</tr>
											</table>
                                        </form>
											
                                        
                                    </div>
                                </div>
								
								 <div class="tab-pane" id="changepassword" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" name="chgpassword" onsubmit="return change_password();" autocomplete="off" method="post" action="">
                                          
                                            <div class="form-group">
                                                <label class="col-md-12"><b>Old Password</b></label>
                                                <div class="col-md-12">
                                                    <input type="password" id = "password" name = "password" placeholder="Old Password" class="form-control form-control-line" required>
                                                </div>
                                            </div>
											
											<div class="form-group">
                                                <label class="col-md-12"><b>New Password</b></label>
                                                <div class="col-md-12">
                                                    <input type="password" id = "userpassword" name = "userpassword"  
													placeholder="Enter new password" class="form-control form-control-line"
													onfocusout = "validate_password()"
						
													onkeyup = "CheckPasswordStrengh(this.value)"/ required>
                                                </div>
												<span id = "passwordvalidate"></span>
                                            </div>
											
											
												<div style="margin-left:20px;"id = "password_strength_validate">
												<p>Password strength : <span id = "password_strength"></span></p>
												<div id = "password_level1">
													<span id = "password_level"></span>
												</div>
												<p>Use at least 8 characters. </p>
											</div>
											<br>
											
											<div class="form-group">
                                                <label class="col-md-12"><b>Confirm New Password</b></label>
                                                <div class="col-md-12">
                                                    <input type="password" id = "cpassword" name = "cpassword"  onfocusout = "validate_repeat_password()" 
													placeholder="Re-enter password" class="form-control form-control-line">
                                                </div>
												<span class="glyphicon glyphicon-remove form-control-feedback" id = "fail3"></span>
												<span class="glyphicon glyphicon-ok form-control-feedback" id ="success3"></span>
												<span id = "rpasswordvalidate"></span>
                                            </div>
                                        
                                         <br>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button type="submit" onclick="change_password()"name="chgpassword" class="btn btn-success">Change Password</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
			</div>
			<br><br>
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
  <script type="text/javascript" src = "../sweetalert-master/dist/sweetalert.min.js"></script>

  <!-- End custom js for this page-->
  
    	 <script src="../js/dropify/dist/js/dropify.min.js"></script>
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
</body>

</html>
<?php
	if(isset($_POST["editdone"]))
	{
		if($done=='1')
		{ echo '<script>swal("Success", "Your profile is successfully updated!", "success");</script>';
		$done="";
		}
	}
	
	if(isset($_POST["chgpassword"]))
	{
		
		
	if($chgpass=='1')
		{
		echo '<script>swal("Success", "Your password is successfully changed!", "success");</script>';
		$chgpass="";
		}
		else if ($chgpass=='2')
		{echo '<script>swal("Error", "The old password you entered does not match. Try again.", "error");</script>';
		$chgpass="";}
		else if ($chgpass=='3')
		{echo '<script>swal("Error", "The new password is same with the old pasword.", "error");</script>';
		$chgpass="";}
		else if ($chgpass=='4')
		{echo '<script>swal("Error", "New password entered are not the same. Check your spelling.", "error");</script>';
		$chgpass="";}
		
	}
?>