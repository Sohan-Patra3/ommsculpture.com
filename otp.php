<?php
session_start();
include 'database.php';
//Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
if(count($_POST)>0){
		$rno=$_SESSION['otp'];
		$otp=$_POST['otp'];
		if($rno==$otp)
		{
			$name=$_SESSION['name'];
			$email=$_SESSION['email'];
			$phone=$_SESSION['phone'];
			$password=$_SESSION['password'];
			/* Create connection */
			$sql = "INSERT INTO user_data (name, email, phone,pass)
			VALUES ('$name', '$email', '$phone','$password')";
			if (mysqli_query($conn, $sql)) {
				header( "Location: index.php?status=200" );
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
				return true;
		}
		else
		{
			$message="<p style='color:red;text-align:center;'>Invalid OTP ! Try Again.</p>";
		}
}
 if(isset($_GET['resend'])){
	 $authKey = "248827AdkKHkzrE5h5bf8f3a9";// Your authentication key 
	$mobileNumber = $_SESSION['phone'];
	$senderId = "ABCDEF";// Sender ID,While using route4 sender id should be 6 characters long.
	/* Your message to send, Add URL encoding here. */
	$rndno=$_SESSION['otp'];
	$message = urlencode("OTP number for mobile number verification: ".$rndno);
	/* Define route */
	$route = "route=4";
	/* Prepare you post parameters */
	$postData = array(
		'authkey' => $authKey,
		'mobiles' => $mobileNumber,
		'message' => $message,
		'sender' => $senderId,
		'route' => $route
	);
	/* API URL*/
	$url="https://control.msg91.com/api/sendhttp.php";

	/* init the resource */
	$ch = curl_init();
	curl_setopt_array($ch, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_POST => true,
		CURLOPT_POSTFIELDS => $postData
		/*,CURLOPT_FOLLOWLOCATION => true */
	));

	/* Ignore SSL certificate verification */
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	/* get response */
	$output = curl_exec($ch);

	/* Print error if any */
	if(curl_errno($ch))
	{
		echo 'error:' . curl_error($ch);
	}
	curl_close($ch);
	$message="<p style='color:green;text-align:center;'>OTP resend successfully !</p>";
 }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>OTP Page</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
</head>
<body>
<div id="login" style="padding-top:200px;">
  <h1>OTP</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <?php
  if(isset($message)){
	  echo $message;
  }
  ?>
    <input type="text" placeholder="OTP" name="otp"/>
	<input type="submit" value="Submit" />
	<br><br>
	<input type="submit" value="Resend" name="resend"/>
  </form>
</div>
<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
<script src="js/index.js"></script>
</body>
</html>