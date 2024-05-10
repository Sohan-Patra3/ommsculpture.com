<?php
session_start();
include 'includes/database.php';
if(count($_POST)>0){
	$phone_email=$_POST['phone_email'];
	$result = mysqli_query($conn,"SELECT * FROM org_mst01 
	WHERE (ORM_MAIL='$phone_email' or ORM_CONO='$phone_email') and ORM_PASS = '". $_POST["password"]."'");
	$row  = mysqli_fetch_array($result);
		if(is_array($row)){
			$_SESSION["id"] = $row['ORM_ORCD'];
			$_SESSION["name"] = $row['ORM_NAME'];
		} 
		else{
			$message = "Invalid Login Id or Password!";
		}
		if(isset($_SESSION["id"])) {
			header("Location:admin/");
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login Form</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Bootstrap core CSS -->
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom fonts for this template -->
	<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
	<!-- Custom styles for this template -->
	<link href="css/one-page-wonder.min.css" rel="stylesheet">
	
</head>
<body>
<?php include 'includes/header.php';?>
<div class="signup-form">
    <form action="" method="post">
	<?php
    if(isset($_GET['status'])){
	    if($_GET['status']==200){
		   $message="<p style='color:green;text-align:center;'>Registration Successful !Please Login.</p>";
		   echo $message;
	    }
    }
   ?>
		<h2>Login</h2>
		<p class="hint-text">Please login to continue !</p>
        <div class="form-group">
            <input type="text" class="form-control" name="phone_email" placeholder="Phone or Email" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>        
        
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
        </div>
		<div class="text-center">Forgot Password ? <a href="forgot_pass.php">Click</a></div>
    </form>
	<div class="text-center">New user register here ? <a href="register.php">Register</a></div>
</div>
<?php include 'includes/footer.php';?>
<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
<script src="js/index.js"></script>
</body>
</html>