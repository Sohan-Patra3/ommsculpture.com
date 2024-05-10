<?php
	include '../../includes/database.php';
	
	$siteurl="https://www.ommsculpture.com/";
	
	if(isset($_GET['pageid']))
	{
		$pageid=base64_decode($_GET['pageid']);
		$sql ="SELECT * FROM `pag_dtl01`,pag_mst01 WHERE PAD_PACD=PAM_PACD AND PAD_PACD=$pageid AND PAD_CANC=0";
		$query=mysqli_query($conn,$sql);
		$pageData=mysqli_fetch_assoc($query);
	}
?>

<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Becoblue |Dynamic </title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://www.ommsculpture.com/css/bootstrap.min.css">
		<!-- Animate CSS -->
		<link rel="stylesheet" href="https://www.ommsculpture.com/css/animate.min.css">
		<!-- Font-awesome CSS-->
		<link rel="stylesheet" href="https://www.ommsculpture.com/css/font-awesome.min.css">
		<!-- Owl Caousel CSS -->
		<link rel="stylesheet" href="https://www.ommsculpture.com/vendor/OwlCarousel/owl.carousel.min.css">
		<link rel="stylesheet" href="https://www.ommsculpture.com/vendor/OwlCarousel/owl.theme.default.min.css">
		<!-- Main Menu CSS -->
		<link rel="stylesheet" href="https://www.ommsculpture.com/css/meanmenu.min.css">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="https://www.ommsculpture.com/css/select2.min.css">
		<!-- Magnific CSS -->
		<link rel="stylesheet" type="https://www.ommsculpture.com/text/css" href="css/magnific-popup.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="https://www.ommsculpture.com/style.css">
	  <link rel="stylesheet" href="<?= $siteurl ;?>css/costum.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
	<body>
		<!--<div id="preloader"></div>-->
		<!-- Preloader End Here -->
		<div id="wrapper">
			<!-- Header Area Start Here -->
			<header>
				<div id="header-three" class="header-style3 header-fixed bg-body">
					<div class="header-top-bar top-bar-style3 w3-hide-small" style="background-color:#165b02;">
						<div class="container">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
									<div class="top-bar-left">
										<p class="d-none d-lg-block" style="color:#94f777;font-size:15px;font-family:'Open Sans', sans-serif;">
											<i class="fa fa-life-ring" aria-hidden="true"></i>Have any questions? +91 9437130468 or vikashcorporation@gmail.com                                    
										</p>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
								  <div class="top-bar-right">
										<p class="d-none d-lg-block">
											<i class="fa fa-edit text-warning float-right" onclick="parent.location='https://www.ommsculpture.com/admin/my-account.php';" style="font-size: 25px; margin-top:-19px;"></i>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="main-menu-area" id="sticker" style="background-color:#ffffff;">
						<div class="container">
							<div class="row no-gutters d-flex align-items-center">
								<div class="col-lg-2 col-md-2 col-sm-3">
									<div class="logo-area">
										<a href="<?= $siteurl ;?>admin/webclone/web-index.php" class="img-fluid"><img src="<?= $siteurl ;?>admin/uploadimage/300x150 (1).png" alt="logo" style="height:70px;width:160px;"></a>
										<i class="fa fa-edit text-success float-right" onclick="parent.location='https://www.ommsculpture.com/admin/my-account.php';" style="font-size: 19px; margin-top:21px;"></i>
									</div>
								</div>
								<div class="col-lg-8 col-md-8 col-sm-6 possition-static">
									<div class="cp-main-menu">
										<nav>
											<ul><!-- style="color: #000000 ;font-size:14px;font-family:'Open Sans', sans-serif;"-->
												<li class="active"><a  href="<?= $siteurl ;?>admin/webclone/web-index.php"  >Home</a></li>
												<li class=""><a href="<?= $siteurl ;?>admin/webclone/about_us.php?pageid=MQ=="  >About Us</a></li>
												<li class=""><a href="<?= $siteurl ;?>admin/webclone/vision_mission.php?pageid=Mg=="  >Vision & Mission</a></li>
												<li class=""><a href="<?= $siteurl ;?>admin/webclone/services.php?pageid=OQ=="  >Services</a></li>
												<li class=""><a href="<?= $siteurl ;?>admin/webclone/img_gallery.php?pageid=Ng=="  >Image Gallery</a></li>
												<li class=""><a href="<?= $siteurl ;?>admin/webclone/contact_us.php?pageid=Mw=="  >Contact Us</a></li>											                                          
											</ul>
										</nav>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Mobile Menu Area Start -->
				<div class="mobile-menu-area">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div class="mobile-menu">
									<nav id="dropdown">
										<ul>
											<li class="active"><a  href="<?= $siteurl ;?>admin/webclone/web-index.php">Home</a></li>
											<li class="active"><a href="<?= $siteurl ;?>admin/webclone/about_us.php?pageid=MQ==">About Us</a></li>
											<li class="active"><a href="<?= $siteurl ;?>admin/webclone/vision_mission.php?pageid=Mg==">Vision & Mission</a></li>
											<li class="active"><a href="<?= $siteurl ;?>admin/webclone/services.php?pageid=OQ==">Services</a></li>
											<li class="active"><a href="<?= $siteurl ;?>admin/webclone/img_gallery.php?pageid=Ng==">Image Gallery</a></li>
											<li class="active"><a href="<?= $siteurl ;?>admin/webclone/contact_us.php?pageid=Mw==">Contact Us</a></li>											                                       
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Mobile Menu Area End -->
			</header>
			<!-- Header Area End Here -->
			
			<!-- Contact Area Start Here -->
			<section class="s-space-bottom-full bg-accent-shadow-body fixed-menu-mt" style="padding-top: 9px;">
				<div class="container">
					<div class="row">
						<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
							<div class="gradient-wrapper mb--sm">
								<div class="gradient-title">
									<h2 style="color:<?= ($settings['menutitle_color'])?$settings['menutitle_color']:""?>;font-size:<?= ($settings['menutitle_fontsize'])?$settings['menutitle_fontsize']:""?>;font-family:<?= ($settings['menutitle_fontfamily'])?$settings['menutitle_fontfamily']:""?>;">Contact With us
									<p class="align-center">
										<i class="fa fa-edit text-success float-right" onclick="parent.location='https://www.ommsculpture.com/admin/contact_us.php?page_id=3';" style="font-size: 25px; margin-top: -20px;"></i>
									</p>
									</h2>
								</div>
								<?php
								if(isset($_GET['status']))
								{
									if($_GET['status']==200)
									{
										?>
										<div class="c-msg">
										<div class="alert alert-success myMessage">
											<strong>Success!</strong> Indicates a successful or positive action.
										</div>
										</div>
										<?php 
									} 
								} 
								?>
								<div class="contact-layout1 gradient-padding">
									<div class="google-map-area">
										<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29902.469203968547!2d84.217414708397!3d20.473050928294526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a23b30174c7d8e7%3A0x4aad9c2b13fed970!2sPhulbani%2C+Odisha%2C+India!5e0!3m2!1sen!2sus!4v1545024452930" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen=""></iframe>-->
										<div id="googleMap" style="width:100%;height:400px;" ></div>
									</div>
									<h3 style="color:<?= ($settings['pagetitle_color'])?$settings['pagetitle_color']:""?>;font-size:<?= ($settings['pagetitle_fontsize'])?$settings['pagetitle_fontsize']:""?>;font-family:<?= ($settings['pagetitle_fontfamily'])?$settings['pagetitle_fontfamily']:""?>;"><?php echo $pageData['PAD_TITL'];?></h3>
									<form id="contact-form" class="contact-form" method="post" action="contactus_a.php">
										<fieldset>
											<div class="row">
												<div class="col-12">
													<div class="form-group">
														<input type="text" placeholder="Your Name" class="form-control" name="name" id="form-name" data-error="Name field is required" required  ><!-- onkeypress="CheckSpace(event)"-->
														<div class="help-block with-errors"></div>
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<input type="tel" placeholder="Your Mobile Number" class="form-control" name="mobile" id="form-email" data-error="Mobile field is required" required >
														<div class="help-block with-errors"></div>
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<input type="email" placeholder="Your E-mail" class="form-control" name="email" id="form-email" data-error="Email field is required" required >
														<div class="help-block with-errors"></div>
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<input type="text" placeholder="Subject" class="form-control" name="subject" id="form-subject" data-error="Subject field is required" required >
														<div class="help-block with-errors"></div>
													</div>
												</div>
												<div class="col-12">
													<div class="form-group">
														<textarea placeholder="Message" class="textarea form-control" name="message" id="form-message" rows="7" cols="20" data-error="Message field is required" required ></textarea>
														<div class="help-block with-errors"></div>
													</div>
												</div>
												<div class="col-lg-4 col-md-4 col-sm-6 col-sm-12 col-12">
													<div class="form-group">
														<input type="hidden" class="form-control form-control-sm" value="<?php echo $pageid; ?>" name="page_id">
														<button type="submit" class="cp-default-btn-sm">Send Message</button>
													</div>
												</div>
												<div class="col-lg-8 col-md-8 col-sm-6 col-sm-12 col-12">
													<div class="form-response"></div>
												</div>
											</div>
										</fieldset>
									</form>
								</div>
							</div>
						</div>
						
						<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12" style="padding-top: 1px;">
							<div class="sidebar-item-box">
								<ul class="sidebar-more-option">
									<li>
										<a href="#">
										<?php echo $pageData['PAD_ADSO'];?>,<?php echo $pageData['PAD_ADST'];?><br>
										<?php echo $pageData['PAD_MAIL'];?><br>
										+91 <?php echo $pageData['PAD_PHN'];?>
										</a>
									</li>
								</ul>
							</div>
							<div class="sidebar-item-box">
								<!--<img src="img/banner/sidebar-banner1.jpg" alt="banner" class="img-fluid m-auto">-->
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Contact Area End Here -->

			<script>
				function CheckSpace(event)
				{
					if(event.which ==32)
					{
					  event.preventDefault();
					  return false;
					}
				}
				
				function initMap() 
				{
					//The location of Uluru
					var uluru = {lat:<?php echo $pageData['PAD_LAT'];?>, lng: <?php echo $pageData['PAD_LNG'];?>};
					//The map, centered at Uluru
					var map = new google.maps.Map(
					document.getElementById('googleMap'), {zoom: 4, center: uluru});
					//The marker, positioned at Uluru
					var marker = new google.maps.Marker({position: uluru, map: map});
				}
			</script>
			
			<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $pageData['PAD_API'];?>&callback=initMap"></script>
			<!-- Footer Area Start Here -->
			<footer>
				<div class="footer-area-top s-space-equal" style="background-color:#1a1c1d;">
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-6 col-sm-6 col-12">
								<div class="footer-box">
									<h3 class="title-medium-light title-bar-left size-lg" style="color:#ffffff;">Quick Links</h3>
									<ul><!-- style="color: #000000 ;font-size:14px;font-family:'Open Sans', sans-serif;"-->
										<li class="active"><a  href="<?= $siteurl ;?>admin/webclone/web-index.php"  >Home</a></li>
										<li class=""><a href="<?= $siteurl ;?>admin/webclone/about_us.php?pageid=MQ=="  >About Us</a></li>
										<li class=""><a href="<?= $siteurl ;?>admin/webclone/vision_mission.php?pageid=Mg=="  >Vision & Mission</a></li>
										<li class=""><a href="<?= $siteurl ;?>admin/webclone/services.php?pageid=OQ=="  >Services</a></li>
										<li class=""><a href="<?= $siteurl ;?>admin/webclone/img_gallery.php?pageid=Ng=="  >Image Gallery</a></li>
										<li class=""><a href="<?= $siteurl ;?>admin/webclone/contact_us.php?pageid=Mw=="  >Contact Us</a></li>									                                          
									</ul>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-12">
								<div class="footer-box">
									<h3 class="title-medium-light title-bar-left size-lg" style="color:#ffffff;">Privacy Policy</h3>
									<ul class="useful-link">
																		</ul>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-12">
								<div class="footer-box">
									<h3 class="title-medium-light title-bar-left size-lg" style="color:#ffffff;">Help &amp; Support</h3>
									<ul class="useful-link">
										<li ><a href="contact_us.php?pageid=Mw==" style="color:#ffffff;">Contact Us</a></li>
									</ul>
								</div>
							</div>
							<div class="col-lg-3 col-md-6 col-sm-6 col-12">
								<div class="footer-box">
									<h3 class="title-medium-light title-bar-left size-lg" style="color:#ffffff;">Follow Us On</h3>
									<ul class="folow-us">
										<li>
											<a href="https://accounts.google.com/signin/v2/identifier?passive=1209600&continue=https%3A%2F%2Fplay.google.com%2Fstore%2Faccount%3Fhl%3Den&followup=https%3A%2F%2Fplay.google.com%2Fstore%2Faccount%3Fhl%3Den&hl=en&flowName=GlifWebSignIn&flowEntry=ServiceLogin">
												<img src="img/footer/follow1.jpg" alt="follow">
											</a>
										</li>
									</ul>
									<ul class="social-link">
										<li class="fa-classipost">
											<a href="https://www.facebook.com/?stype=lo&jlou=AfexfBc7SX0BLMn49dIbC8BoEGAwgTzL3I-_FsZPKJbv5dLLDSUUIyGIuQrPcyUybrJu49f2g87RQ4-pwPHAuvsPTgpbDBpxqqFndewG-gdpLw&smuh=26049&lh=Ac8hzzW8r6f0T_Q_">
												<img src="img/footer/facebook.jpg" alt="social">
											</a>
										</li>
										<li class="tw-classipost">
											<a href="https://twitter.com/login?lang=en">
												<img src="img/footer/twitter.jpg" alt="social">
											</a>
										</li>
										<li class="yo-classipost">
											<a href="https://accounts.google.com/signin/v2/identifier?service=youtube&uilel=3&passive=true&continue=https%3A%2F%2Fwww.youtube.com%2Fsignin%3Faction_handle_signin%3Dtrue%26app%3Ddesktop%26hl%3Den%26next%3D%252F&hl=en&flowName=GlifWebSignIn&flowEntry=ServiceLogi">
												<img src="img/footer/youtube.jpg" alt="social">
											</a>
										</li>
										<li class="pi-classipost">
											<a href="https://in.pinterest.com/">
												<img src="img/footer/pinterest.jpg" alt="social">
											</a>
										</li>
										<li class="li-classipost">
											<a href="https://in.linkedin.com/">
												<img src="img/footer/linkedin.jpg" alt="social">
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<div class="footer-area-bottom">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 text-center-mb">
								<p>Copyright ©   Vikash Corporation2020</p>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-12 text-right text-center-mb">
								<ul>
									<li>
										<img src="img/footer/card1.jpg" alt="card">
									</li>
									<li>
										<img src="img/footer/card2.jpg" alt="card">
									</li>
									<li>
										<img src="img/footer/card3.jpg" alt="card">
									</li>
									<li>
										<img src="img/footer/card4.jpg" alt="card">
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- Footer Area End Here -->
		</div>
		
		<!-- Modal Start-->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<div class="title-default-bold mb-none">Login</div>
					</div>
					<div class="modal-body">
						<div class="login-form">
							<form>
								<label>Username or email address *</label>
								<input type="text" placeholder="Name or E-mail" />
								<label>Password *</label>
								<input type="password" placeholder="Password" />
								<div class="checkbox checkbox-primary">
									<input id="checkbox1" type="checkbox">
									<label for="checkbox1">Remember Me</label>
								</div>
								<button class="default-big-btn" type="submit" value="Login">Login</button>
								<button class="default-big-btn form-cancel" type="submit" value="">Cancel</button>
								<label class="lost-password"><a href="#">Lost your password?</a></label>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Modal End-->
		
		<!-- Report Abuse Modal Start-->
		<div class="modal fade" id="report_abuse" role="dialog">
			<div class="modal-dialog">
				<div class="modal-content report-abuse-area radius-none">
					<div class="gradient-wrapper">
						<div class="gradient-title">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h2 class="item-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>There's Something Wrong With This Ads?</h2>
						</div>
						<div class="gradient-padding reduce-padding">
							<form id="report-abuse-form">
								<div class="form-group">
									<label class="control-label" for="first-name">Your E-mail</label>
									<input type="text" id="first-name" class="form-control" placeholder="Type your mail here ...">
								</div>
								<div class="form-group">
									<div class="form-group">
										<label class="control-label" for="first-name">Your Reason</label>
										<textarea placeholder="Type your reason..." class="textarea form-control" name="message" id="form-message" rows="7" cols="20" data-error="Message field is required" required></textarea>
										<div class="help-block with-errors"></div>
									</div>
								</div>
								<div class="form-group">
									<button type="submit" class="cp-default-btn-sm">Submit Now!</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Report Abuse Modal End-->
		
		<!-- jquery-->
		<script src="https://www.ommsculpture.com/js/jquery-2.2.4.min.js "></script>
		<!-- Popper js -->
		<script src="https://www.ommsculpture.com/js/popper.js"></script>
		<!-- Bootstrap js -->
		<script src="https://www.ommsculpture.com/js/bootstrap.min.js "></script>
		<!-- Owl Cauosel JS -->
		<script src="https://www.ommsculpture.com/vendor/OwlCarousel/owl.carousel.min.js "></script>
		<!-- Meanmenu Js -->
		<script src="https://www.ommsculpture.com/js/jquery.meanmenu.min.js "></script>
		<!-- Srollup js -->
		<script src="https://www.ommsculpture.com/js/jquery.scrollUp.min.js "></script>
		<!-- jquery.counterup js -->
		<script src="https://www.ommsculpture.com/js/jquery.counterup.min.js"></script>
		<script src="https://www.ommsculpture.com/js/waypoints.min.js"></script>
		<!-- Select2 Js -->
		<script src="https://www.ommsculpture.com/js/select2.min.js"></script>
		<!-- Isotope js -->
		<script src="https://www.ommsculpture.com/js/isotope.pkgd.min.js"></script>
		<!-- Magnific Popup -->
		<script src="https://www.ommsculpture.com/js/jquery.magnific-popup.min.js"></script>
		<!-- Custom Js -->
		<script src="https://www.ommsculpture.com/js/main.js"></script>
	</body>
</html>