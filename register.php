<?php
session_start();
include 'includes/database.php';
if(isset($_POST['btn-save']))
{
		$company_name=$_POST['company_name'];
		$domain_name=$_POST['domain_name'];
		$contact_person=$_POST['contact_person'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$password=$_POST['password'];
		
			$duplicate=mysqli_query($conn,"SELECT * FROM org_mst01 WHERE ORM_MAIL='$email' or ORM_CONO='$phone'");
			if (mysqli_num_rows($duplicate)>0)
			{
				$message="<p style='color:red;text-align:center;'>Email ID or Mobile Number already Exists !</p>";
			}
			else{
				$sql = "INSERT INTO `org_mst01`(`ORM_NAME`,`ORM_DMNM`, `ORM_CPNM`, `ORM_MAIL`, `ORM_CONO`, `ORM_PASS`, `ORM_STAT`, `ORM_CANC`) VALUES ('$company_name','$domain_name','$contact_person','$email','$phone','$password',1,0)";
				if (mysqli_query($conn, $sql)) {
					header( "Location: login.php?status=200" );
					mysqli_close($conn);
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
	
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Register Form</title>
	<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Custom fonts for this template -->
		<link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
		<!-- Custom styles for this template -->
		<link href="css/one-page-wonder.min.css" rel="stylesheet">
	<style type="text/css">
	
</style>
</head>
<body>
<?php include 'includes/header.php';?>
<div class="signup-form">
    <form action="" method="post">
	<?php
    if(isset($message)){
	    echo $message;
    }
   ?>
		<h2>Register</h2>
		<!--<p class="hint-text">Create your account. It's free and only takes a minute.</p>-->
		<div class="form-group">
        	<input type="text" class="form-control" name="company_name" placeholder="Company Name" required="required">
        </div>
		<div class="form-group">
        	<input type="text" class="form-control" name="domain_name" placeholder="Prefered Domain Name" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="contact_person" placeholder="Contact Person" required="required" autocomplete="off">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        </div>
		<div class="form-group">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required" autocomplete="off">
        </div> 
		<!--<div class="form-group">
            <input type="file" class="form-control" name="logo" style="height:42px;">
        </div>-->		
       
		
		<div class="form-group" id="div_final_reg">
            <button type="submit" class="btn btn-success btn-lg btn-block" id="register_process" name="btn-save">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="login.php">Sign in</a></div>
</div>
<script>
/* $(document).ready(function() {
	$('#register').on('click', function() {
		$("#div_reg").hide();
		var phone = $('#phone').val();
		$.ajax({
				url: "register_a.php",
				type: "POST",
				data: {
					type: 1,
					phone: phone
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult);
					if(dataResult.statusCode==200){
						$("#div_final_reg").show();	
						$("#div_otp").show();		
					}
					else if(dataResult.statusCode==201){
					   
					}
					
				}
			});
	});
}); */
</script>
<?php include 'includes/footer.php';?>
</body>
</html>