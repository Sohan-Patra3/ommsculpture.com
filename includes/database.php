<?php
	/* $url='localhost';
	$username = "property_shope";
	$password = "Property@123";
	$dbname = "property_shope";
	$conn = mysqli_connect($url, $username, $password, $dbname);  
	*/
	
	session_start();
	//$site_url = "http://ommsculpture.com";
	$url="localhost";
    $username = "root";	                //"ommsculpture";
	$password = "";		            //"ommsculpture";
	$dbname = "ommsculpture";
	$conn = mysqli_connect($url, $username, $password, $dbname);
	
	function dbclose($c)
	{
		mysqli_close($c);
	}
	
	function Message($template_id,$custmobile, $sms_message)
	{
    	$authKey = "330335AYcY9Eoedh5eccf773";/* Your authentication key */
    	$mobileNumber = $custmobile;/* Multiple mobiles numbers separated by comma */
    	$senderId = "BECOBL";/* Sender ID,While using route4 sender id should be 6 characters long. */
    	$message = urlencode($sms_message);/* Your message to send, Add URL encoding here. */
    	$route = "route=4";/* Define route */
    	/* Prepare you post parameters */
    	$postData = array(
    	    'DLT_TE_ID'=>$template_id,
    		'authkey' => $authKey,
    		'mobiles' => $mobileNumber,
    		'message' => $message,
    		'sender' => $senderId,
    		'route' => $route
    	);
    	$url="https://control.msg91.com/api/sendhttp.php";/* API URL*/
    	$ch = curl_init();/* init the resource */
    	curl_setopt_array($ch, array(
    		CURLOPT_URL => $url,
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_POST => true,
    		CURLOPT_POSTFIELDS => $postData
    	));
    	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);/* Ignore SSL certificate verification */
    	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    	$output = curl_exec($ch);/* get response */
    	curl_close($ch);
    	return true;
    }
	
    function encoded_mobile($phone)
	{
    	$phone=(string)$phone;
    	$first_two="";
    	$last_two="";
    	$middle="";
    	$len=strlen($phone);
    	for($i=0; $i <= $len; $i++)
		{
    		if($i <=1)
			{
    			$first_two.=$phone[$i];
    		}
    		if($i > 5)
			{
    			$last_two.=$phone[$i];
    		}
    		if($i >2 && $i < 5)
			{
    			$middle.='X';
    		}    	  
    	}
    	return $first_two.$middle.$last_two;
    }
    
    function getdata($sql)
	{
		global $conn;	
		$query =mysqli_query($conn, $sql);
		return mysqli_fetch_assoc($query); 
		dbclose($conn);
	}
	
	function get__data($sql)
	{
		global $conn;
		$row =array();
		$query =mysqli_query($conn, $sql);
		while($ro =mysqli_fetch_assoc($query))
		{
			$row[] =$ro;
		}
		return $row;
		dbclose($conn);
	}
?>