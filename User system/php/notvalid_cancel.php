<?php include("checklogin.php");?>
 <?php
		
		$bid=$_SESSION['bbid'];
		
		date_default_timezone_set('Asia/Kuala_Lumpur');

		$today = date('Y-m-d');
		mysqli_query($conn,"update booking set booking_status='cancelled', refund_status='no refund',cancel_datetime='$today' where booking_id='$bid'");
		header("Location: myhistoryevent.php");
		
		
		
	
			$aaresult=mysqli_query($conn,"select * from booking where booking_id='$bid'");
			$aaresult1=mysqli_fetch_assoc($aaresult);
			$aanama=$aaresult1['c_id'];

			$cago=mysqli_query($conn,"select * from customer where c_id='$aanama'");
			$cago1=mysqli_fetch_assoc($cago);
			$cname=$cago1['c_name'];
		
		
			date_default_timezone_set('Asia/Kuala_Lumpur');

			$date = date('Y-m-d H:i:s');
			
			$notype="cancelorder";
			$nocontent="$cname cancelled booking order with refund.";
			
			$noti=mysqli_query($conn,"select * from admin");
			while($noti1=mysqli_fetch_assoc($noti))
			{
			
			$notiaid=$noti1['ad_id'];

			$rego=mysqli_query($conn,"insert into notification (notification_type,notification_content,notification_status,admin_id,notification_datetime) values
			('$notype','$nocontent','unread','$notiaid','$date')");
			}
	?>