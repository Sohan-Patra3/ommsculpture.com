<?php
include 'includes/database.php';
session_start();
if(count($_POST)>0){
	if($_POST["type"] == 1){
		$authKey = "330335AYcY9Eoedh5eccf773";// Your authentication key 
		$phone=$_POST["phone"];
		$duplicate=mysqli_query($conn,"select * from org_mst01 where ORM_CONO='$phone'");
		
		if (mysqli_num_rows($duplicate)>0)
		{
			$mobileNumber = $phone;
			
			$rndno=rand(100000, 999999);
			$_SESSION['otp']=$rndno;
			$message = "Your OTP is: ".$rndno ."please do not share this OTP";
			$template_id="1207161519204527007";
			Message($template_id,$mobileNumber, $message);
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
			
		}
	}
	if($_POST["type"] == 2){
		if($_POST['otp']==$_SESSION['otp']){
			$phone=$_POST['phone'];
			$result=mysqli_query($conn,"select * from org_mst01 where ORM_CONO='$phone'");
			$row=mysqli_fetch_array($result);
			$password=$row['ORM_PASS'];
			$mobileNumber = $phone;
			$message ="Your password is: ".$password;
			Message($mobileNumber, $message);
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
	}
}
?>