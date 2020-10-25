
<?php include("checklogin.php");?>
<?php
	$_SESSION["pagename"] = "";
	
	if($logined_check == 1)
	{
		header("Location: login.php");
	}
	
	if(isset($_POST["editdone"]))
	{
		$cname = $_POST["editname"];
		$phone = $_POST["editphone"];
		$address = $_POST["editaddress"];
		$state = $_POST["editstate"];
		$postcode = $_POST["editpostcode"];
		$id1 = $row["c_id"];
		
		$done="";
		$profilename = $_FILES['file']['name'];
	    $target_dir = "img/upload/";
	    $target_file = $target_dir . basename($_FILES["file"]["name"]);
		
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		$extensions_arr = array("jpg","jpeg","png","gif");
		
		 if( in_array($imageFileType,$extensions_arr) ){
			

			 // Insert record
			 $query = "update customer set c_profilepic ='$target_dir$profilename' where c_id = '$id1'";
			 mysqli_query($conn,$query);
		  
			 // Upload file
			 move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$profilename);

		  }
		
		$profile = $_POST["editprofile"];
		$id = $_COOKIE["c_id"];
		
		$_SESSION["edit"] = 1;
		
		if($profile == "")
		{
			mysqli_query($conn, "update customer set c_name = '$cname', c_phonenumber = '$phone',
			c_address = '$address', c_state = '$state', c_postcode = '$postcode' where c_id = '$id1'");
			$done='1';
		}
		else
		{	
			
			mysqli_query($conn, "update customer set c_name = '$cname', c_phonenumber = '$phone',
			c_address = '$address', c_state = '$state', c_postcode = '$postcode' where c_id = '$id1'");
			$done='1';
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Funtastic Event</title>

    <link href="css/application.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/titlelogo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
	<link rel = "stylesheet" type = "text/css" href = "sweetalert-master/dist/sweetalert.css">
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
		xmlhttp.open("GET", "../ajax/checkeditname.php?name=" + name + "&id=" + <?php echo $row["c_id"];?>, true);
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
		
		if(checkname == 0 && checkphone == 0 && checkaddress == 0 && checkstate == 0 )
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
    <div class="logo">
        <h4><a href="index.php"><img src="img/logo.png"></a></h4>
    </div>
        <nav id="sidebar" style="width:300px; margin-top:100px;"class="sidebar nav-collapse collapse">
            <ul id="side-nav" class="side-nav">
                <li class="active">
                    <a href="profile.php"><i class="fa fa-home" ></i> <span class="name">User Dashboard</span></a>
                </li>
                <li class="">
                    <a href="profile_edit.php"><i class="fa fa-table"></i>Edit Profile</a></li>
                </li>
            </ul>
        </nav>
		<div class="wrap">
        <header class="page-header">
            <div class="navbar">
                <ul class="nav navbar-nav navbar-right pull-right">
                    <li class="visible-phone-landscape">
                        <a href="#" id="search-toggle">
                            <i class="fa fa-search"></i>
                        </a>
                    </li>
                    
                   
                    <li class="divider"></li>
                   
                    </li>
                    <li class="hidden-xs dropdown">
                        <a href="#" title="Account" id="account"
                           class="dropdown-toggle"
                           data-toggle="dropdown">
                            <i class="glyphicon glyphicon-user"></i>
                        </a>
                        <ul id="account-menu" class="dropdown-menu account" role="menu">
                            <li role="presentation" class="account-picture">
                                <img src="img/customer.jpg" alt="">
                                Lau Poh Chian
                            </li>
                            <li role="presentation">
                                <a href="profile.html" class="link">
                                    <i class="fa fa-user"></i>
                                    Profile
                                </a>
                            </li>
                         
                        </ul>
                    </li>
                    
                    <li class="hidden-xs"><a href="log_out.php"><i class="glyphicon glyphicon-off"></i></a></li>
                </ul>
                <form id="search-form" class="navbar-form pull-right" role="search">
                    <input type="search" class="form-control search-query" placeholder="Search...">
                </form>
               
            </div>
        </header>
		<div class="content container" style="width:1000px;">
        <h2 class="page-title">Dashboard <small>View Your Profile At Once</small></h2>
        
                <section class="widget widget-tabs">
                    <header>
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#info" data-toggle="tab">User Information</a>
                            </li>
                            <li>
                                <a href="#event" data-toggle="tab">My Events</a>
                            </li>
							<li>
                                <a href="#history" data-toggle="tab">My Purchased History</a>
                            </li>
                            
                        </ul>
                    </header>
                    <div class="body tab-content">
								<div id="info" class="tab-pane active clearfix">
									<img src="img/user_white.png" style="width:100px; height:100px;padding-top:30px; padding-left:30px; float:left;">
					  <h3 style="float:left; padding-left:10px;font-family:Arial; padding-top:40px;">About</h3>
							<br style="clear:both;"><br> 
							<hr style="border:2px solid white; margin-right:500px;">
							<br>
							
						<form name = "editprofile" method = "POST" action = "" autocomplete = "off" novalidate enctype="multipart/form-data" onsubmit = " return editform()">
						<table>
						<tr>
						<td>
		
						<div >
							<div>
								<img style="width:300px; height:300px;" src = "<?php echo $row["c_profilepic"]; ?>" id="image1" >
								
							</div>
						</div>
						</td>
						</tr>
						<tr>
						<td>
						<p style="font-weight:bold; color:white;">&nbsp;&nbsp;&nbsp;User ID :
						<input name="userid" style="width:100px; height:30px; font-size:16px; color:white; margin-top:26px;" 
						type="text" class="s-form-v4__input" disabled value= "C<?php echo $row["c_id"]; ?>" disabled></p>
						</td>
						</tr>
						<tr>
						<td>
						<p style="font-weight:bold; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name : </div>
						<input id = "editname" name = "editname"
						style="width:350px; height:30px;  font-size:16px;  color:white; margin-top:26px;" type="text" disabled class="s-form-v4__input" 
						value= "<?php echo $row["c_name"]; ?>" onfocusout = "ve_name()" onkeyup = "ve_name2()" onfocus = "ve_name3()" /></p>
						</td>
						</tr>
						<tr id = "mess_name">
							<td></td>
							<td><span id = "mess_name1"></span><span id = "mess_name2" style = "display:none;"></span></td>
						</tr>
						<tr>
						<td>
						<p style="font-weight:bold; ">&nbsp;&nbsp;&nbsp;Contact : </div>
						<input disabled id = "editphone" name = "editphone" value = "<?php echo $row["c_phonenumber"]; ?>" data-format="dddddddddd" 
						onfocusout = "ve_phone()" onfocus = "ve_phone2()"
						style="width:350px; height:30px;font-size:16px; ; color:white; margin-top:26px;" type="text" class="s-form-v4__input"></p>				
						</td>
						</tr>
						</tr>
						<tr id = "mess_phone">
							<td></td>
							<td><span id = "mess_phone1"></span></td>
						</tr>
						<tr>
						<td>
						<p style="font-weight:bold;">&nbsp;&nbsp;&nbsp;Address : </div>
						<textarea  disabled id = "editaddress" name = "editaddress" onfocusout = "ve_address()" onfocus = "ve_address2()"
						style="width:350px; height:70px; text-align:left; font-size:16px; color:white; margin-top:26px; " class="s-form-v4__input"><?php echo $row["c_address"];?></textarea></p>
						</td>
						</tr>
						<tr id = "mess_address">
							<td></td>
							<td><span id = "mess_address1"></span></td>
						</tr>
						<tr>
						<td>
						<p style="font-weight:bold; ">Postcode : </div>
						<input disabled id = "editpostcode" name = "editpostcode" style="width:350px; height:30px; font-size:16px;   color:white; margin-top:26px;" type="text" class="s-form-v4__input" value = "<?php echo $row["c_postcode"]; ?>" ></p>
						</td>
						</tr>
						<tr id = "mess_postcode">
						<td></td>
						<td><span id = "mess_postcode1"></span></td>
						</tr>
						<tr>
						<td>
						<p style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State : </div>
						<select disabled id = "editstate" name = "editstate" class="s-form-v4__input" onchange = "ve_state()" style="color:white; width:200px; height:30px; padding-left:5px; font-size:16px; margin-left:10px; margin-top:26px;">
						<option value = "">--State--</option>
						<option value = "Johor" <?php if($row["c_state"] == "Johor"){ echo "selected"; } ?>>Johor</option>
						<option value = "Kedah" <?php if($row["c_state"] == "Kedah"){ echo "selected"; } ?>>Kedah</option>
						<option value = "Kelantan" <?php if($row["c_state"] == "Kelantan"){ echo "selected"; } ?>>Kelantan</option>
						<option value = "Kuala Lumpur" <?php if($row["c_state"] == "Kuala Lumpur"){ echo "selected"; } ?>>Kuala Lumpur</option>
						<option value = "Melaka" <?php if($row["c_state"] == "Melaka"){ echo "selected"; } ?>>Melaka</option>
						<option value = "Negeri Sembilan" <?php if($row["c_state"] == "Negeri Sembilan"){ echo "selected"; } ?>>Negeri Sembilan</option>
						<option value = "Pahang" <?php if($row["c_state"] == "Pahang"){ echo "selected"; } ?>>Pahang</option>
						<option value = "Penang" <?php if($row["c_state"] == "Penang"){ echo "selected"; } ?>>Penang</option>
						<option value = "Perak" <?php if($row["c_state"] == "Perak"){ echo "selected"; } ?>>Perak</option>
						<option value = "Perlis" <?php if($row["c_state"] == "Perlis"){ echo "selected"; } ?>>Perlis</option>
						<option value = "Sabah" <?php if($row["c_state"] == "Sabah"){ echo "selected"; } ?>>Sabah</option>
						<option value = "Sarawak" <?php if($row["c_state"] == "Sarawak"){ echo "selected"; } ?>>Sarawak</option>
						<option value = "Selangor" <?php if($row["c_state"] == "Selangor"){ echo "selected"; } ?>>Selangor</option>
						<option value = "Terengganu" <?php if($row["c_state"] == "Terengganu"){ echo "selected"; } ?>>Terengganu</option>
						</select>
						</td>
						</tr>
						<tr id = "mess_state">
							<td></td>
							<td><span id = "mess_state1"></span></td>
						</tr>
						
				
						</form>
                        </table>   

                        </div>
                        <div id="event" class="tab-pane">
						<img src="img/user_white.png" style="width:100px; height:100px;padding-top:30px; padding-left:30px; float:left;">
					  <h3 style="float:left; padding-left:10px;font-family:Arial; padding-top:40px;">My Events</h3>
							<br style="clear:both;"><br> 
							<hr style="border:2px solid white; margin-right:500px;">
                            
                            <ul class="news-list news-list-no-hover">
                                <li>
                                    
                                        <div class="name" style="margin-left:20px;"><h5>Birthday Party On 21/3/2019</h5></div>
                                        <div class="options" style="margin-left:20px; ">
                                            <button class="btn btn-xs btn-warning">
                                                <i ></i>
                                                Details
                                            </button>
                                        </div>
                                </li>
							

                               </ul>
                        </div>
                        <div id="history" class="tab-pane">
						<img src="img/user_white.png" style="width:100px; height:100px;padding-top:30px; padding-left:30px; float:left;">
					  <h3 style="float:left; padding-left:10px;font-family:Arial; padding-top:40px;">My History Events</h3>
							<br style="clear:both;"><br> 
							<hr style="border:2px solid white; margin-right:500px;">
                            
                            <ul class="news-list news-list-no-hover">
                                <li>
                                    
                                        <div class="name" style="margin-left:20px;"><h5>Birthday Party On 21/3/2018</h5></div>
                                        <div class="options" style="margin-left:20px; ">
                                            <button class="btn btn-xs btn-warning">
                                                <i ></i>
                                                Details
                                            </button>
                                        </div>
                                </li>
							

                               </ul>
                        </div>
                </section>
             </div>   
              <footer class="g-bg-color--dark">
           
            <!-- End Links -->

            <!-- Copyright -->
            <div style="margin-left:-120px; padding-top:50px;">
               
                        <a href="index.html" style="color:white;">
                            <img class="g-width-100--xs g-height-auto--xs" src="img/logo-white.png" alt="Funtastic Logo">
                        </a>
               
            </div>
            <!-- End Copyright -->
        </footer>

    

	
<!-- common libraries. required for every page-->
<script src="lib/jquery/dist/jquery.min.js"></script>
<script src="lib/jquery-pjax/jquery.pjax.js"></script>
<script src="lib/bootstrap-sass/assets/javascripts/bootstrap.min.js"></script>
<script src="lib/widgster/widgster.js"></script>
<script src="lib/underscore/underscore.js"></script>

<!-- common application js -->
<script src="js/app.js"></script>
<script src="js/settings.js"></script>
<script type="text/javascript" src = "sweetalert-master/dist/sweetalert.min.js"></script>


</body>
</html>
<?php
	if(isset($_POST["editdone"]))
	{
		if($done=='1')
		{ echo '<script>swal("Success", "Your profile is successfully updated!", "success");</script>';
		}
	}
?>