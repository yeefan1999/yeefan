<?php include("checklogin.php"); ?>

<?php
	$_SESSION["pagename"] = "";
	
	if($row == "")
	{
		$row = 0;
	}
	
	if(isset($_POST["theme_submit"]))
		{
			
			$name = $_POST["themename"];
			
			$price = $_POST["themeprice"];
			$details = $_POST["themedesc"];
			$check = "";
			$check1="";
			if(is_numeric($price))
			{
			$name1=strtolower($name);
			$checkname=mysqli_query($conn,"select * from theme where theme_name='$name1'");
			
			if(mysqli_num_rows($checkname)==0)
			{
				
			$profilename = $_FILES['file']['name'];
			$target_dir = "images/theme/";
			$target_file = $target_dir . basename($_FILES["file"]["name"]);
			
			$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$extensions_arr = array("jpg","jpeg","png","gif");
			
			if( in_array($imageFileType,$extensions_arr) ){
			
			 // Upload file
			 move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$profilename);
			 $check1='1';

			}
				else
				
				{
					$check='2';
				}
			
			
			if($check1=='1')
			{
		
				$sql =  "insert into theme(theme_name,theme_price, theme_description,theme_image) values ('$name', 
				'$price', '$details','$target_dir$profilename')";
				
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
			
			else
			{
				$check='3';
			}
			}
			
			else
				
			{
				$check='4';
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
    <script src="../js/ckeditor/ckeditor.js" ></script>
	<link rel = "stylesheet" type = "text/css" href = "../sweetalert-master/dist/sweetalert.css">

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
        
			
			  <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add theme Form</h4>
                  <form class="form-sample" enctype='multipart/form-data' name="addthemeform" autocomplete = "off" method = "post" action = "">
				<br>
					<br>
					<h4 class="card-description">
                      Theme Information
                    </h4>
					<hr>
					
					 <div class="row" style="margin-left:-40px;">
						<div class="col-lg-3.5 col-md-3.5">
							<div class="card">
								<div class="card-body">
										<h6 >Photo Upload</h6>

										<input type="file" id = "file" name="file" class="dropify" />
									</div>
								</div>
							</div>
							
						</div>
					
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Theme Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" style="text-transform:uppercase;" id = "themename" name="themename" placeholder="Theme Name" required />
                          </div>
                        </div>
                      </div>
                  
                    </div>
                    
                   <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Theme Price (RM) </label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id = "themeprice" name="themeprice" placeholder="RM 6652.00" required  />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-1.5 col-form-label">Description / Remarks</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="themedesc" name="themedesc" placeholder="Enter description here..." required ></textarea>
								<script type="text/javascript">

								CKEDITOR.replace('themedesc'); 

							</script>
                          </div>
                        </div>
                      </div>
                    </div>
					<br>
					<button type="submit" name="theme_submit" id="theme_submit" class="btn btn-gradient-primary mr-2">Add</button>
                    <button type="reset" class="btn btn-light">Cancel</button>
					<br>
					</form>
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
<script type="text/javascript" src = "../sweetalert-master/dist/sweetalert.min.js"></script>
  
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
  <!-- End custom js for this page-->
</body>

</html>

<?php
	if(isset($_POST["theme_submit"]))
	{
		if($check=='1')
		{ echo '<script>swal("Success", "Theme details is succesfully updated!", "success");</script>';
		$check="";
		}
		
		else if ($check=='0'||$check=='2')
		{echo '<script>swal("Error", "Please upload proper format of image.", "error");</script>';
		$check="";}
		
		else if ($check=='3')
		{echo '<script>swal("Error", "Theme name repeated. Change a name.", "error");</script>';
		$check="";}
		
		else if ($check=='4')
		{echo '<script>swal("Error", "Enter number for price.", "error");</script>';
		$check="";}
	}
	

?>
