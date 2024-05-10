<?php
	include '../includes/database.php';
	
	if(count($_POST)>0)
	{
		$phone_email=$_POST['phone_email'];
		$result = mysqli_query($conn,"SELECT * FROM org_mst01 
		WHERE (ORM_MAIL='$phone_email' or ORM_CONO='$phone_email') and ORM_PASS = '". $_POST["password"]."'");
		$row  = mysqli_fetch_array($result);
		if(is_array($row))
		{
			$_SESSION["id"] = $row['ORM_ORCD'];
			$_SESSION["name"] = $row['ORM_NAME'];
		} 
		else
		{
			$message = "Invalid Login Id or Password!";
		}
		if(isset($_SESSION["id"])) 
		{ 
			header("Location:dashboard.php");
		}
	}
	$org_sql = "SELECT * FROM `org_mst01`";
	$org_result = mysqli_query($conn, $org_sql);
	$org_row = mysqli_fetch_assoc($org_result);
?>

<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="icon" href="uploadimage/<?php echo $org_row['ORM_LOGO'];?>" type="image/gif" sizes="16x16">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!------ Include the above in your HEAD tag ---------->
		<style type="text/css">
			@import url('https://fonts.googleapis.com/css?family=Nunito');
			@import url('https://fonts.googleapis.com/css?family=Poiret+One');

			body, html 
			{
				height: 100%;
				background-repeat: no-repeat;    /*background-image: linear-gradient(rgb(12, 97, 33),rgb(104, 145, 162));*/
				background:black;
				position: relative;
			}

			#login-box 
			{
				position: absolute;
				top: 140px;
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
			
			#login-box .logo .logo-caption 
			{
				font-family: 'Poiret One', cursive;
				color: white;
				text-align: center;
				margin-bottom: 0px;
			}

			#login-box .logo .tweak 
			{
				color: #ff5252;
			}
			
			#login-box .controls 
			{
				padding-top: 30px;
			}

			#login-box .controls input 
			{
				border-radius: 0px;
				background: rgb(98, 96, 96);
				border: 0px;
				color: white;
				font-family: 'Nunito', sans-serif;
			}
			
			#login-box .controls input:focus 
			{
				box-shadow: none;
			}

			#login-box .controls input:first-child 
			{
				border-top-left-radius: 2px;
				border-top-right-radius: 2px;
			}

			#login-box .controls input:last-child 
			{
				border-bottom-left-radius: 2px;
				border-bottom-right-radius: 2px;
			}

			#login-box button.btn-custom 
			{
				border-radius: 2px;
				margin-top: 8px;
				background:#ff5252;
				border-color: rgba(48, 46, 45, 1);
				color: white;
				font-family: 'Nunito', sans-serif;
			}
			
			#login-box button.btn-custom:hover
			{
				-webkit-transition: all 500ms ease;
				-moz-transition: all 500ms ease;
				-ms-transition: all 500ms ease;
				-o-transition: all 500ms ease;
				transition: all 500ms ease;
				background: rgba(48, 46, 45, 1);
				border-color: #ff5252;
			}
			
			#particles-js
			{
				width: 100%;
				height: 100%;
				background-size: cover;
				background-position: 50% 50%;
				position: fixed;
				top: 0px;
				z-index:1;
			}
		</style>
	</head>
	
	<body>
		<div class="container">
			<div id="login-box">
				<div class="logo">
				<img src="uploadimage/<?php echo $org_row['ORM_LOGO'];?>" class="img img-responsive img-circle center-block" style="height: 100px;"/>
					<h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
				</div>
				<!--
				<div class="logo" style="margin-top: -29px;">
					<h1 class="logo-caption"><span class="tweak" style="font-size: 27px;font-weight: 900;"><?php echo $org_row['ORM_NAME'];?></span></h1>
				   
					<p align="center" style="font-size: 10px;">Powered By</a></p>
					<a href="https://www.becoblue.com" target="_blank" style="font-size: 18px;"><img src="../new_beco.jpg" class="img img-responsive  center-block" style="height:25px;margin-top: -10px;"/></a>
				</div> 
				-->
				<!-- /.logo -->
				<div class="controls">
					<!-- 
					<form action="" method="post">
						<input type="text" name="username" placeholder="Username" class="form-control" /><br>
						<input type="text" name="username" placeholder="Password" class="form-control" />
						<button type="button" class="btn btn-default btn-block btn-custom">Login</button>
					</form>
					-->
					<div class="signup-form">
						<form action="" method="post">
							<?php
							if(isset($_GET['status']))
							{
								if($_GET['status']==200)
								{
									$message="<p style='color:green;text-align:center;'>Registration Successful !Please Login.</p>";
									//echo $message;
									alert: ($message);
								}
							}
							?>
							<div class="form-group">
								<input type="text" class="form-control" name="phone_email" placeholder="Phone or Email" required="required">
							</div>
							
							<div class="form-group">
								<input type="password" class="form-control" name="password" placeholder="Password" required="required">
							</div>        
							
							<div class="form-group">
								<button type="submit" class="btn btn-success btn-lg btn-block">Login</button>
							</div>
							
							<div class="text-center" style="color:#ffffff">Forgot Password ? <a href="../forgot_pass.php?type=1">Click</a></div>
						</form>
						<!--<div class="text-center" style="color:#ffffff">New user register here ? <a href="register.php">Register</a></div>-->
					</div>
				</div><!-- /.controls -->
			</div><!-- /#login-box -->
		</div><!-- /.container -->
		<div id="particles-js"></div>
		
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>
		<script type="text/javascript">
			$.getScript("https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js", function()
			{
				particlesJS('particles-js',
				{
					"particles": 
					{
						"number": 
						{
							"value": 180,
							"density": 
							{
								"enable": true,
								"value_area": 800
							}
						},
						
						"color": 
						{
							"value": "#ffffff"
						},
						
						"shape": 
						{
							"type": "circle",
							"stroke": 
							{
								"width": 0,
								"color": "#000000"
							},
							
							"polygon": 
							{
								"nb_sides": 5
							},
							
							"image": 
							{
								"width": 100,
								"height": 100
							}
						},
						
						"opacity": 
						{
							"value": 0.5,
							"random": false,
							"anim": 
							{
								"enable": false,
								"speed": 1,
								"opacity_min": 0.1,
								"sync": false
							}
						},
						
						"size": 
						{
							"value": 5,
							"random": true,
							"anim": 
							{
								"enable": false,
								"speed": 40,
								"size_min": 0.1,
								"sync": false
							}
						},
						
						"line_linked": 
						{
							"enable": true,
							"distance": 150,
							"color": "#ffffff",
							"opacity": 0.4,
							"width": 1
						},
						
						"move": 
						{
							"enable": true,
							"speed": 6,
							"direction": "none",
							"random": false,
							"straight": false,
							"out_mode": "out",
							"attract": 
							{
								"enable": false,
								"rotateX": 600,
								"rotateY": 1200
							}
						}
					},
					
					"interactivity": 
					{
						"detect_on": "canvas",
						"events": 
						{
							"onhover": 
							{
								"enable": true,
								"mode": "repulse"
							},
							
							"onclick": 
							{
								"enable": true,
								"mode": "push"
							},
							"resize": true
						},
						
						"modes": 
						{
							"grab": 
							{
								"distance": 400,
								"line_linked": 
								{
									"opacity": 1
								}
							},
							
							"bubble": 
							{
								"distance": 400,
								"size": 40,
								"duration": 2,
								"opacity": 8,
								"speed": 3
							},
							
							"repulse": 
							{
								"distance": 200
							},
							
							"push": 
							{
								"particles_nb": 4
							},
							
							"remove": 
							{
								"particles_nb": 2
							}
						}
					},
					
					"retina_detect": true,
					"config_demo": 
					{
						"hide_card": false,
						"background_color": "#b61924",
						"background_image": "",
						"background_position": "50% 50%",
						"background_repeat": "no-repeat",
						"background_size": "cover"
					}
				});
			});
		</script>
	</body>
</html>