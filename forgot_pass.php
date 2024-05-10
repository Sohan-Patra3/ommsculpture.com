<?php
//error_reporting(0);

include 'includes/database.php';
$org_sql = "SELECT * FROM `org_mst01`";
$org_result = mysqli_query($conn, $org_sql);
$org_row = mysqli_fetch_assoc($org_result);
if($_GET['type'] == 1){
	$phone=$org_row["ORM_CONO"];
	$encode_phone=encoded_mobile($phone);
	$mobileNumber =$phone;
	$rndno=rand(100000, 999999);
	$_SESSION['otp']=$rndno;
	$message = "Your OTP is: ".$rndno.". please do not share this OTP.";
	$template_id="1207161519204527007";
	$response =Message($template_id,$mobileNumber, $message);
	if($response ==1){
		$message="<p style='color:green;text-align:center;'>Mobile Number $encode_phone  Sent Otp Successfully!</p>";
		header("Refresh: 5;URL=forgot_pass.php");
	}else{
		$message="<p style='color:red;text-align:center;'>Error Occured. Try Again!</p>";
	}
}
if($_POST['type'] ==2){
	if($_POST['otp']==$_SESSION['otp']){
		$password=$org_row['ORM_PASS'];
		$mobileNumber =$org_row["ORM_CONO"];
		$encode_phone=encoded_mobile($mobileNumber);
		$message ="Your password is:".$password;
		$template_id="1207161761137549632";
		$response =Message($template_id,$mobileNumber, $message);
		if($response ==1){
			$message="<p style='color:green;text-align:center;'>Mobile Number $encode_phone  Sent Password Successfully!</p>";
			unset($_SESSION['otp']);
			header("Refresh: 5;URL=admin/index.php");
		}else{
			$message="<p style='color:red;text-align:center;'>Error Occured. Try Again!</p>";
		}
	}
	else{
		$message="<p style='color:red;text-align:center;'>Invalid OTP. Try Again!</p>";
	}
}
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="icon" href="admin/uploadimage/<?php echo $org_row['ORM_LOGO'];?>" type="image/gif" sizes="16x16">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->
	<style type="text/css">
		@import url('https://fonts.googleapis.com/css?family=Nunito');
@import url('https://fonts.googleapis.com/css?family=Poiret+One');

body, html {
	height: 100%;
	background-repeat: no-repeat;    /*background-image: linear-gradient(rgb(12, 97, 33),rgb(104, 145, 162));*/
	background:black;
	position: relative;
}
#login-box {
	position: absolute;
	top: 290px;
	left: 50%;
	transform: translateX(-50%);
	width: 350px;
	margin: 0 auto;
	border: 1px solid black;
	background: rgba(48, 46, 45, 1);
	min-height: 250px;
	padding: 20px;
	z-index: 9999;
}
#login-box .logo .logo-caption {
	font-family: 'sans serif ', helvetica;
	color: white;
	text-align: center;
	margin-bottom: 0px;
}
#login-box .logo .tweak {
	color: #ff5252;
	font-weight: 800;
    font-size: 28px;
}
#login-box .controls {
	padding-top: 30px;
}
#login-box .controls input {
	border-radius: 0px;
	background:rgb(245, 245, 245);
	border: 0px;
	color: white;
	font-family: 'Nunito', sans-serif;
}
#login-box .controls input:focus {
	box-shadow: none;
}
#login-box .controls input:first-child {
	border-top-left-radius: 2px;
	border-top-right-radius: 2px;
}
#login-box .controls input:last-child {
	border-bottom-left-radius: 2px;
	border-bottom-right-radius: 2px;
}
#login-box button.btn-custom {
	border-radius: 2px;
	margin-top: 8px;
	background:#ff5252;
	border-color: rgba(48, 46, 45, 1);
	color: white;
	font-family: 'Nunito', sans-serif;
}
#login-box button.btn-custom:hover{
	-webkit-transition: all 500ms ease;
	-moz-transition: all 500ms ease;
	-ms-transition: all 500ms ease;
	-o-transition: all 500ms ease;
	transition: all 500ms ease;
	background: rgba(48, 46, 45, 1);
	border-color: #ff5252;
}
#particles-js{
  	width: 100%;
  	height: 100%;
  	background-size: cover;
  	background-position: 50% 50%;
  	position: fixed;
  	top: 0px;
  	z-index:1;
}
.center-block {
    display: block;
    margin-right: auto;
    margin-left: auto;
    float: right;
    padding-right: 39px;
}
	</style>
</head>
<body>

<div class="container">
	<div id="login-box">
		<div class="logo">
			<img src="admin/uploadimage/<?php echo $org_row['ORM_LOGO'];?> " class="img img-responsive img-circle center-block"/>
			<h1 class="logo-caption"><span class="tweak">Forgot</span>	Password</h1>
		</div><!-- /.logo -->
		<div class="controls">
			
			<div class="signup-form">
				<form action="" method="post">
					<?php
						if(isset($message)){
							echo $message;
						}
					?>
					<!--<p class="hint-text" style="color:#ffffff">Enter your registerd mobile number ! </p>
					<div class="form-group">
						<input type="text" class="form-control" name="phone" placeholder="Phone" id="phone" required="required" style="color: #333;">
					</div>-->
					<p class="hint-text" style="color:#ffffff">Enter your OTP !</p>
					<div class="form-group" style="display:block;" id="div_otp">
						<input type="text" class="form-control" id="otp" name="otp" placeholder="Enter OTP" required="required" style="color: #333;">
					</div>
					<!--<div class="form-group" id="div_reg">
						<button type="submit" class="btn btn-success btn-lg btn-block" id="register">Submit</button>
					</div>-->
					<input type="hidden" class="form-control" id="type" name="type" value="2">
					<div class="form-group" style="display:block;" id="div_final_reg">
						<button type="submit" class="btn btn-success btn-lg btn-block" id="register_process" name="btn-save">Submit</button>
					</div>
				</form>
				<div class="text-center" style="color:#ffffff">Have an account? Login in now. <a href="admin/index.php">Login</a></div>
			</div>
		</div>
		<!-- /.controls -->
	</div><!-- /#login-box -->
</div><!-- /.container -->
<div id="particles-js"></div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
<script type="text/javascript">
$.getScript("https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js", function(){
    particlesJS('particles-js',
      {
        "particles": {
          "number": {
            "value": 180,
            "density": {
              "enable": true,
              "value_area": 800
            }
          },
          "color": {
            "value": "#ffffff"
          },
          "shape": {
            "type": "circle",
            "stroke": {
              "width": 0,
              "color": "#000000"
            },
            "polygon": {
              "nb_sides": 5
            },
            "image": {
              "width": 100,
              "height": 100
            }
          },
          "opacity": {
            "value": 0.5,
            "random": false,
            "anim": {
              "enable": false,
              "speed": 1,
              "opacity_min": 0.1,
              "sync": false
            }
          },
          "size": {
            "value": 5,
            "random": true,
            "anim": {
              "enable": false,
              "speed": 40,
              "size_min": 0.1,
              "sync": false
            }
          },
          "line_linked": {
            "enable": true,
            "distance": 150,
            "color": "#ffffff",
            "opacity": 0.4,
            "width": 1
          },
          "move": {
            "enable": true,
            "speed": 6,
            "direction": "none",
            "random": false,
            "straight": false,
            "out_mode": "out",
            "attract": {
              "enable": false,
              "rotateX": 600,
              "rotateY": 1200
            }
          }
        },
        "interactivity": {
          "detect_on": "canvas",
          "events": {
            "onhover": {
              "enable": true,
              "mode": "repulse"
            },
            "onclick": {
              "enable": true,
              "mode": "push"
            },
            "resize": true
          },
          "modes": {
            "grab": {
              "distance": 400,
              "line_linked": {
                "opacity": 1
              }
            },
            "bubble": {
              "distance": 400,
              "size": 40,
              "duration": 2,
              "opacity": 8,
              "speed": 3
            },
            "repulse": {
              "distance": 200
            },
            "push": {
              "particles_nb": 4
            },
            "remove": {
              "particles_nb": 2
            }
          }
        },
        "retina_detect": true,
        "config_demo": {
          "hide_card": false,
          "background_color": "#b61924",
          "background_image": "",
          "background_position": "50% 50%",
          "background_repeat": "no-repeat",
          "background_size": "cover"
        }
      }
    );

});
</script>
<script>
/*
$(document).ready(function() {
	$('#register').on('click', function() { 
		var phone = $('#phone').val();
		$.ajax({
				url: "forgot_a.php",
				type: "POST",
				data: {
					type: 1,
					phone: phone
				},
				cache: false,
				success: function(dataResult){
					var dataResult = JSON.parse(dataResult); 
					if(dataResult.statusCode==200){
						$("#div_reg").hide();
						$("#div_final_reg").show();	
						$("#div_otp").show();		
					}
					else if(dataResult.statusCode==201){
					   alert("Mobile number not exists in our database !");
					}
					
				}
			});
	});
	$('#register_process').on('click', function(){ 
		var phone = $('#phone').val();
		var otp = $('#otp').val();
		$.ajax({
			url: "forgot_a.php",
			type: "POST",
			data: {
				type: 2,
				phone: phone,
				otp:otp
			},
			cache: false,
			success: function(dataResult){
				var dataResult = JSON.parse(dataResult); 
				if(dataResult.statusCode==200){
					alert("Password Sent Successfully to your mobile number");
				}
				else if(dataResult.statusCode==201){
				   alert("Invalid OTP . Try Again!");
				   $("#div_reg").hide();
					$("#div_final_reg").show();	
				    $("#div_otp").show();
				}
				
			}
		});
	});
});
*/
</script>
</body>
</html>