<?php include("checklogin.php"); ?>


<?php

	date_default_timezone_set('Asia/Kuala_Lumpur');

		$date = date('Y-m-d H:i:s');
		
		
		if(isset($_POST['submit']))
		{
			$adid11=$row['ad_id'];
			$task=$_POST['task'];
			$status=$_POST['task_status'];
			
			$exe1=mysqli_query($conn,"insert into todolist (admin_id,todolist_type,todolist_content,todolist_datetime) values 
			('$adid11','$status','$task','$date')");
			
			if($exe1)
			{
				$done=1;
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
  
  <style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 16px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

label.a
{cursor:pointer;}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
 
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;

}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
  
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
  
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
  
  
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
  
}

input[type=checkbox]:checked + label.a{
  text-decoration: line-through;
}
</style>
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
                <i class="mdi mdi-dots-horizontal"></i>                 
              </span>
              My To Do List
            </h3>
         
          </div>
         
      
        
			<br>
					
		<div class="row">

			 <div class="col-lg-12 grid-margin stretch-card">
			           <div class="card">
                <div class="card-body">
                  <h4 class="card-title">To Do List</h4>
                  <p class="card-description">
                    Look at your tasks
					
                  </p>
				  
				   <p class="card-description">
                    One click to remove your To-Do-List
					
                  </p>
				  
				  	<div class="row">
					   <div class="col-md-2 col-sm-12 col-xs-12">
						<a href="#" data-toggle="modal" data-target="#add-new-event" class="btn m-t-10 btn-info btn-block waves-effect waves-light">
						<i class="ti-plus"></i> Add Tasks
						</a>
						</div>
						
						<br>
						<br><br><br>
						</div>
                  <table class="table ">
				  <form>
					<?php
					$aaid=$row['ad_id'];
					$todo=mysqli_query($conn,"select * from todolist where admin_id='$aaid' and todolist_removed=0 order by todolist_datetime desc");
					
					if(mysqli_num_rows($todo)!=0)
					{
						while($todo1=mysqli_fetch_assoc($todo))
						{
							
							if($todo1['todolist_type']=='urgent')
							{
					
					?>
			
						
							<tr>
							<td>
							<label class="container"> <a href="todolist.php?id=<?php echo $todo1["todolist_id"]?>"><input type="button"></a>
							<label class="a">
							<?php echo $todo1['todolist_content'];?></label>
							<mark class="bg-primary text-white" style="font-style:italic; padding-left:10px; padding-right:10px;font-size:12px;">Urgent</mark>
							<p><span style="font-size:12px; color:grey;">Added on: <?php echo $todo1['todolist_datetime'];?> </span></p>
							<span class="checkmark"></span></label>
							</td>
							</tr>
							<?php }
							
							else if($todo1['todolist_type']=='pending')
							{
								
							?>
			
					
							<tr>
							<td>
							<label class="container"><a href="todolist.php?id=<?php echo $todo1["todolist_id"]?>"><input type="button"></a>
							<label class="a">
							<?php echo $todo1['todolist_content'];?></label>
							<mark class="bg-secondary text-white" style="font-style:italic; padding-left:10px; padding-right:10px; font-size:12px;">Pending</mark>
							<p><span style="font-size:12px; color:grey;">Added on: <?php echo $todo1['todolist_datetime'];?> </span></p>
							<span class="checkmark"></span></label>
							</td> 
							</tr>
					
							<?php }
						}
					}
					
			
					?>
					</form>
                  </table>
                </div>
              </div>
            </div>
	</div>
	
         
			
			
			
			  <div class="modal fade none-border" id="add-new-event">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><strong>Add</strong> a task</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Task Description</label>
                                            <textarea class="form-control form-white" name="task" placeholder="Enter task content" required /> </textarea>
                                        </div>
                                        
                                    </div>
									<br><br>
									<div class="row">
                                        <div class="col-md-12">
                                            <label class="control-label">Choose Task Status</label>
                                            <select class="form-control form-white" data-placeholder="Choose the status" name="task_status">
                                                <option value="urgent">Urgent</option>
                                                <option value="pending">Pending</option>
                                               
                                            </select>
                                        </div>
                                    </div>
									<br>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" name="submit" class="btn btn-danger waves-effect waves-light save-category" >Add</button>
                                <button type="button" class="btn btn-white waves-effect" data-dismiss="modal">Cancel</button>
                            </div>
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
  <!-- End custom js for this page-->
  

</body>

</html>
 <?php
		
		if(isset($_GET["id"]))
		{
		$tid = $_GET["id"];
	
		mysqli_query($conn,"update todolist set todolist_removed=1 where todolist_id='$tid'");
		$remove=1;
		echo '<script>swal("Success", "This to-do-list is removed!", "success");</script>';
		}
	
		
	?>
