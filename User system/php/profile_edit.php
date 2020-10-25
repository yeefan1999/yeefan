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
		

		
		$_SESSION["edit"] = 1;
		
			$result=mysqli_query($conn, "update customer set c_name = '$cname', c_phonenumber = '$phone',
			c_address = '$address', c_state = '$state', c_postcode = '$postcode' where c_id = '$id1'");
			if($result)
			{
			$done='1';
			}
		
	}
	

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Funtastic Event</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="css1/open-iconic-bootstrap.min.css1">
    <link rel="stylesheet" href="css1/animate.css">
    
    <link rel="stylesheet" href="css1/owl.carousel.min.css">
    <link rel="stylesheet" href="css1/owl.theme.default.min.css">
    <link rel="stylesheet" href="css1/magnific-popup.css">

    <link rel="stylesheet" href="css1/aos.css">

    <link rel="stylesheet" href="css1/ionicons.min.css">

    <link rel="stylesheet" href="css1/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css1/jquery.timepicker.css">
<link rel="shortcut icon" href="img/titlelogo.png">
    
    <link rel="stylesheet" href="css1/flaticon.css">
    <link rel="stylesheet" href="css1/icomoon.css">
    <link rel="stylesheet" href="css1/style.css">
	<link rel = "stylesheet" type = "text/css" href = "sweetalert-master/dist/sweetalert.css">
  </head>
  <style>
  @import url(https://fonts.googleapis.com/css?family=Roboto);


header img {
  border-radius: 50%;
  margin: 20px auto;
  display: block;
  width: 200px;
  border: 5px solid #fff;
}
#colorlib-aside
{
	 border-top: 4px solid #26A69A;
  border-bottom: 4px solid #00695C;
  border-radius: 5px;

  box-shadow: 0 0 70px 10px #fff;
}
aside {
  border-top: 0px solid #26A69A;
  border-bottom: 0px solid #00695C;
  border-radius: 50%;
  margin: 0 auto;
  display: block;
  height: 300px;
  width: 300px;
  background: url("<?php echo $row["c_profilepic"]; ?>");
  background-size: cover;
  overflow: hidden;
  box-shadow: 0 0 100px 10px #fff;
  transition: all ease 0.3s;
}

aside:hover {
  border-top: 4px solid #26A69A;
  border-bottom: 4px solid #00695C;
  border-radius: 5px;
  height: 500px;
  width: 500px;
  box-shadow: 0 0 70px 10px #fff;
}

aside:hover header img {
  animation: profile_image 2000ms linear both;
  animation-delay: 0.5s;
}

header {
  text-align: center;
}

header h1 {
  position: relative;
  text-align: center;
  color: #fff;
  text-shadow: 1px 1px rgba(0, 0, 0, 0.5);
  font-size: 25px;
  line-height: 25px;
  display: inline-block;
  padding: 10px;
  transition: all ease 0.250s;
  border-top: 1px solid #fff;
  border-bottom: 1px solid #fff;
}

aside:hover header h1 {
  margin-top: 0px;
  outline: 0 solid #fff;
  border-top: 0px solid #fff;
  border-bottom: 1px solid #fff;
}

header h2 {
  text-align: center;
  color: #fff;
  text-shadow: 1px 1px rgba(0, 0, 0, 0.5);
  font-size: 17px;
  font-weight: normal;
  line-height: 0px;
  margin: 0;
}

.profile-bio {
  margin-top: 20px;
  padding: 1px 20px 10px 20px !important;
  transition: all linear 1.5s;
  color: #fff;
  font-size: 16px;
  opacity: 0;
  background: linear-gradient(to bottom, rgba(0, 0, 0, 0.42) 69%, rgba(0, 0, 0, 0.42) 69%, rgba(0, 0, 0, 0.61) 100%);
}

aside:hover .profile-bio {
  opacity: 1;
}

.profile-bio p:first-child {
  text-align: center;
  font-size: 16px;
}

.profile-social-links {
  position: relative;
  margin-top: -440px;
  margin-left: -100px;
  list-style-type: none;
  opacity: 0;
  transition: all ease 0.5s;
}

aside:hover .profile-social-links {
  margin-left: -30px;
  opacity: 1;
}

.profile-social-links li img {
  width: 30px;
  background: #fff;
  border-radius: 50%;
  padding: 5px;
}
/*PROFILE IMAGE ANIMATE */

@keyframes profile_image {
  0% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  3.4% {
    transform: matrix3d(1.032, 0, 0, 0, 0, 1.041, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  4.7% {
    transform: matrix3d(1.045, 0, 0, 0, 0, 1.06, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  6.81% {
    transform: matrix3d(1.066, 0, 0, 0, 0, 1.089, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  9.41% {
    transform: matrix3d(1.088, 0, 0, 0, 0, 1.117, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  10.21% {
    transform: matrix3d(1.094, 0, 0, 0, 0, 1.123, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  13.61% {
    transform: matrix3d(1.112, 0, 0, 0, 0, 1.133, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  14.11% {
    transform: matrix3d(1.114, 0, 0, 0, 0, 1.133, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  17.52% {
    transform: matrix3d(1.121, 0, 0, 0, 0, 1.124, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  18.72% {
    transform: matrix3d(1.121, 0, 0, 0, 0, 1.119, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  21.32% {
    transform: matrix3d(1.12, 0, 0, 0, 0, 1.107, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  24.32% {
    transform: matrix3d(1.115, 0, 0, 0, 0, 1.096, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  25.23% {
    transform: matrix3d(1.113, 0, 0, 0, 0, 1.094, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  29.03% {
    transform: matrix3d(1.106, 0, 0, 0, 0, 1.09, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  29.93% {
    transform: matrix3d(1.105, 0, 0, 0, 0, 1.09, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  35.54% {
    transform: matrix3d(1.098, 0, 0, 0, 0, 1.096, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  36.74% {
    transform: matrix3d(1.097, 0, 0, 0, 0, 1.098, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  41.04% {
    transform: matrix3d(1.096, 0, 0, 0, 0, 1.102, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  44.44% {
    transform: matrix3d(1.097, 0, 0, 0, 0, 1.103, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  52.15% {
    transform: matrix3d(1.099, 0, 0, 0, 0, 1.101, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  59.86% {
    transform: matrix3d(1.101, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  63.26% {
    transform: matrix3d(1.101, 0, 0, 0, 0, 1.099, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  75.28% {
    transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  85.49% {
    transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  90.69% {
    transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  100% {
    transform: matrix3d(1.1, 0, 0, 0, 0, 1.1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
}
/*NAME ANIMATE */

aside:hover header h1 {
  animation: name_and_job 1500ms linear both;
  animation-delay: 0.4s;
}

@keyframes name_and_job {
  0% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, 0, 0, 1);
  }
  1.3% {
    transform: matrix3d(3.905, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -237.02, 0, 0, 1);
  }
  2.55% {
    transform: matrix3d(4.554, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -182.798, 0, 0, 1);
  }
  4.1% {
    transform: matrix3d(4.025, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -125.912, 0, 0, 1);
  }
  5.71% {
    transform: matrix3d(3.039, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -79.596, 0, 0, 1);
  }
  8.11% {
    transform: matrix3d(1.82, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -31.647, 0, 0, 1);
  }
  8.81% {
    transform: matrix3d(1.581, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -21.84, 0, 0, 1);
  }
  11.96% {
    transform: matrix3d(1.034, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 4.825, 0, 0, 1);
  }
  12.11% {
    transform: matrix3d(1.023, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 5.53, 0, 0, 1);
  }
  15.07% {
    transform: matrix3d(0.947, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 12.662, 0, 0, 1);
  }
  16.12% {
    transform: matrix3d(0.951, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 13.007, 0, 0, 1);
  }
  27.23% {
    transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 2.352, 0, 0, 1);
  }
  27.58% {
    transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 2.121, 0, 0, 1);
  }
  38.34% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.311, 0, 0, 1);
  }
  40.09% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.291, 0, 0, 1);
  }
  50% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.048, 0, 0, 1);
  }
  60.56% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.007, 0, 0, 1);
  }
  82.78% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  100% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
}



@keyframes social_animation {
  0% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -300, 0, 0, 1);
  }
  1.3% {
    transform: matrix3d(3.905, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -237.02, 0, 0, 1);
  }
  2.55% {
    transform: matrix3d(4.554, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -182.798, 0, 0, 1);
  }
  4.1% {
    transform: matrix3d(4.025, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -125.912, 0, 0, 1);
  }
  5.71% {
    transform: matrix3d(3.039, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -79.596, 0, 0, 1);
  }
  8.11% {
    transform: matrix3d(1.82, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -31.647, 0, 0, 1);
  }
  8.81% {
    transform: matrix3d(1.581, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -21.84, 0, 0, 1);
  }
  11.96% {
    transform: matrix3d(1.034, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 4.825, 0, 0, 1);
  }
  12.11% {
    transform: matrix3d(1.023, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 5.53, 0, 0, 1);
  }
  15.07% {
    transform: matrix3d(0.947, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 12.662, 0, 0, 1);
  }
  16.12% {
    transform: matrix3d(0.951, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 13.007, 0, 0, 1);
  }
  27.23% {
    transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 2.352, 0, 0, 1);
  }
  27.58% {
    transform: matrix3d(1.001, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 2.121, 0, 0, 1);
  }
  38.34% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.311, 0, 0, 1);
  }
  40.09% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.291, 0, 0, 1);
  }
  50% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, -0.048, 0, 0, 1);
  }
  60.56% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0.007, 0, 0, 1);
  }
  82.78% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
  100% {
    transform: matrix3d(1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1);
  }
}
  </style>
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
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo"><a href="index.php">Funtastic Event<span>.</span></a></h1>
				<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li ><a href="customer.php">Home</a></li>
					<li ><a href="profile.php">My Profile</a></li>
					<li class="colorlib-active"><a href="profile_edit.php">Edit Profile</a></li>
					<li><a href="change_password.php">Change Password</a></li>
					<li ><a href="myevent.php">My Events</a></li>
					<li ><a href="myhistoryevent.php">My History Events</a></li>
					<li ><a href="package.php">Hold an Event</a></li>
					<li><a href="log_out.php">Log Out</a></li>
				</ul>
			</nav>

			
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<div style="background-color:white; background-repeat: no-repeat;" data-stellar-background-ratio="0.5">
			
			<h1 style="margin-left:30px; margin-top:50px;">Edit Profile</h1>
			<p style="margin-left:30px; margin-top:50px;">You may update your profile from time to time. Just fill in the correct details will do.</p>
			<hr>
			
						<div style="margin-left:30px; margin-top:50px;">
							<form name = "editprofile" method = "POST" action = "" autocomplete = "off" novalidate enctype="multipart/form-data" onsubmit = " return editform()">
						<table>
						<tr>
						<td>
		
							<tr>
						<td>
		
						<div >
							<div>
								<img style="width:300px; height:300px;" src = "<?php echo $row["c_profilepic"]; ?>" id="image1" >
								<input type = "file" class = "editi" name = "file" id="file" accept="image/*" onchange = "document.getElementById('image1').src = window.URL.createObjectURL(this.files[0])"/>
								<div class = "edit">
									<i class="fa fa-camera" aria-hidden="true"></i> 
								</div>
							</div>
						</div>
						
						</td>
						</tr>
						</td>
						</tr>
					
						<tr>
						<td>
						<p style="font-weight:bold; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name : 
						<input id = "editname" name = "editname"
						style="width:350px; height:30px;  font-size:16px;  margin-top:26px; text-transform:uppercase;" type="text" class="s-form-v4__input" 
						value= "<?php echo $row["c_name"]; ?>" onfocusout = "ve_name()" onkeyup = "ve_name2()" onfocus = "ve_name3()"/></p>
						</td>
						</tr>
						<tr id = "mess_name">
							<td></td>
							<td><span id = "mess_name1"></span><span id = "mess_name2" style = "display:none;"></span></td>
						</tr>
						<tr>
						<td>
						<p style="font-weight:bold; ">&nbsp;&nbsp;&nbsp;Contact :
						<input id = "editphone" name = "editphone" value = "<?php echo $row["c_phonenumber"]; ?>" data-format="dddddddddd" 
						onfocusout = "ve_phone()" onfocus = "ve_phone2()"
						style="width:350px; height:30px;font-size:16px; ; margin-top:26px;" type="text" class="s-form-v4__input" ></p>				
						</td>
						</tr>
						
						<tr id = "mess_phone">
							<td></td>
							<td><span id = "mess_phone1"></span></td>
						</tr>
						<tr>
						<td>
						<p style="font-weight:bold;">&nbsp;&nbsp;&nbsp;Address : 
						<textarea  id = "editaddress" name = "editaddress" onfocusout = "ve_address()" onfocus = "ve_address2()"
						style="width:350px; height:70px; text-align:left; font-size:16px; margin-top:26px; " class="s-form-v4__input"><?php echo $row["c_address"];?></textarea></p>
						</td>
						</tr>
						<tr id = "mess_address">
							<td></td>
							<td><span id = "mess_address1"></span></td>
						</tr>
						<tr>
						<td>
						<p style="font-weight:bold; ">&nbsp;Postcode : </div>
						<input id = "editpostcode" name = "editpostcode" style="width:350px; height:30px; font-size:16px;   margin-top:26px;" type="text" class="s-form-v4__input" 
						value = "<?php echo $row["c_postcode"]; ?>" onfocusout = "ve_postcode()" onfocus = "ve_postcode2()"></p>
						</td>
						</tr>
						<tr id = "mess_postcode">
						<td></td>
						<td><span id = "mess_postcode1"></span></td>
						</tr>
						<tr>
						<td>
						<p style="font-weight:bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;State : 
						<select id = "editstate" name = "editstate" class="s-form-v4__input" onchange = "ve_state()" style="width:200px; height:30px; padding-left:5px; font-size:16px; margin-left:10px; margin-top:26px;">
						<option style="color:black;"value = "">--State--</option>
						<option style="color:black;"value = "Johor" <?php if($row["c_state"] == "Johor"){ echo "selected"; } ?>>Johor</option>
						<option style="color:black;" value = "Kedah" <?php if($row["c_state"] == "Kedah"){ echo "selected"; } ?>>Kedah</option>
						<option style="color:black;"value = "Kelantan" <?php if($row["c_state"] == "Kelantan"){ echo "selected"; } ?>>Kelantan</option>
						<option style="color:black;"value = "Kuala Lumpur" <?php if($row["c_state"] == "Kuala Lumpur"){ echo "selected"; } ?>>Kuala Lumpur</option>
						<option style="color:black;"value = "Melaka" <?php if($row["c_state"] == "Melaka"){ echo "selected"; } ?>>Melaka</option>
						<option style="color:black;"value = "Negeri Sembilan" <?php if($row["c_state"] == "Negeri Sembilan"){ echo "selected"; } ?>>Negeri Sembilan</option>
						<option style="color:black;"value = "Pahang" <?php if($row["c_state"] == "Pahang"){ echo "selected"; } ?>>Pahang</option>
						<option style="color:black;"value = "Penang" <?php if($row["c_state"] == "Penang"){ echo "selected"; } ?>>Penang</option>
						<option style="color:black;"value = "Perak" <?php if($row["c_state"] == "Perak"){ echo "selected"; } ?>>Perak</option>
						<option style="color:black;"value = "Perlis" <?php if($row["c_state"] == "Perlis"){ echo "selected"; } ?>>Perlis</option>
						<option style="color:black;"value = "Sabah" <?php if($row["c_state"] == "Sabah"){ echo "selected"; } ?>>Sabah</option>
						<option style="color:black;"value = "Sarawak" <?php if($row["c_state"] == "Sarawak"){ echo "selected"; } ?>>Sarawak</option>
						<option style="color:black;"value = "Selangor" <?php if($row["c_state"] == "Selangor"){ echo "selected"; } ?>>Selangor</option>
						<option style="color:black;"value = "Terengganu" <?php if($row["c_state"] == "Terengganu"){ echo "selected"; } ?>>Terengganu</option>
						</select>
						</td>
						</tr>
						<tr id = "mess_state">
							<td></td>
							<td><span id = "mess_state1"></span></td>
						</tr>
						<tr>
						<td>
						<br>
						<br>
						<button style="margin-bottom:50px;"type = "submit" name = "editdone" class = "btn btn-primary"><span class = "glyphicon glyphicon-floppy-disk"></span> Save</button>
						&nbsp;&nbsp;&nbsp;
						<button style="margin-bottom:50px;" type = "reset" class = "btn btn-danger">cancel</button>
						</td>
						</tr>
							
						</form>
                        </table>
				</div>
		</div><!-- END COLORLIB-MAIN -->
	</div><!-- END COLORLIB-PAGE -->

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
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