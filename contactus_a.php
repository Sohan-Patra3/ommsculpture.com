<?php
	require_once("includes/database.php");
	//include("access.php");

	$name =trim($_POST['name']);
	$email =trim($_POST['email']);
	$mobile=trim($_POST['mobile']);
	$subject =trim($_POST['subject']);
	$message =trim($_POST['message']);
	$page_id=base64_encode($_POST['page_id']);

	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
	{
		header("Location:contact_us.php?pageid=$page_id&status=203");
	}

	if(empty($name) ||empty($email)||empty($subject)||empty($message) ||empty($mobile))
	{
		header("Location:contact_us.php?pageid=$page_id&status=203");
	}
	else
	{
		echo $sql = "INSERT INTO `contact` (`name`, `email`,`phone`, `subject`, `message`) 
		VALUES ('".$name."','".$email."','$mobile','".$subject."','".$message."')";
		if(mysqli_query($conn, $sql))
		{
			//Mail and Message code
			$to = $email;
			$subject = "Thank U";
			$txt = "Thank you for contact with us.we will get back to you shortly!";
			$headers = "From: info@ommsculpture.com" . "\r\n" .
			"CC: contact@ommsculpture.com";
			mail($to,$subject,$txt,$headers);
			//Message code start
			$authKey = $sms_auth_key;
			// mobiles numbers 
			$mobileNumber = $mobile;
			//Sender ID,While using route4 sender id should be 6 characters long.
			$senderId = $senderId;
			//Your message to send, Add URL encoding here.
			$message = urlencode("Thank you for contact with us. we will get back to you shortly! .Website: https://ommsculpture.com/");
			//Define route 
			$route = "route=4";
			//Prepare you post parameters
			$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'message' => $message,
				'sender' => $senderId,
				'route' => $route
			);
			//Put your sms provider api
			$url="https://control.msg91.com/api/sendhttp.php";
			// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postData
			//,CURLOPT_FOLLOWLOCATION => true
			));
			//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			//get response
			$output = curl_exec($ch);
			//Print error if any
			if(curl_errno($ch))
			{
				echo 'error:' . curl_error($ch);
			}
			curl_close($ch);
			//Mail and Message code
			$to = "info@ommsculpture.com";
			$subject = "New Contact ";
			$txt = "New Contact From Website Name:$name, Email : $email, Mobile No :$mobile";
			$headers = "From:$email" . "\r\n" .
			"CC: $email";
			mail($to,$subject,$txt,$headers);
			//Message code start
			$authKey = $sms_auth_key;
			// mobiles numbers 
			$mobileNumber =9437130468;
			//Sender ID,While using route4 sender id should be 6 characters long.
			$senderId = $senderId;
			//Your message to send, Add URL encoding here.
			$message = urlencode("New Contact From Website Name:$name, Email :$email ,Mobile :$mobile");
			//Define route 
			$route = "route=4";
			//Prepare you post parameters
			$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'message' => $message,
				'sender' => $senderId,
				'route' => $route
			);
			//Put your sms provider api
			$url="https://control.msg91.com/api/sendhttp.php";
			// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_POST => true,
			CURLOPT_POSTFIELDS => $postData
			//,CURLOPT_FOLLOWLOCATION => true
			));
			//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
			//get response
			$output = curl_exec($ch);
			//Print error if any
			if(curl_errno($ch))
			{
				echo 'error:' . curl_error($ch);
			}
			curl_close($ch);
			header("Location:contact_us.php?pageid=$page_id&status=200");
		   
		}
		else
		{
			echo mysqli_error($conn);
		}
	}
?>