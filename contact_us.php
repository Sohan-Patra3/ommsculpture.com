<?php
	include 'includes/topheader.php';
	include 'includes/header.php';
	if(isset($_GET['pageid']))
	{
		$pageid=base64_decode($_GET['pageid']);
		$sql ="SELECT * FROM `pag_dtl01`,pag_mst01 WHERE PAD_PACD=PAM_PACD AND PAD_PACD=$pageid AND PAD_CANC=0";
		$query=mysqli_query($conn,$sql);
		$pageData=mysqli_fetch_assoc($query);
	}
?>

<!-- Contact Area Start Here -->
<section class="s-space-bottom-full bg-accent-shadow-body fixed-menu-mt" style="padding-top: 9px;">
	<div class="container">
		<div class="row">
			<div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-12">
				<div class="gradient-wrapper mb--sm">
					<div class="gradient-title">
						<h2 style="color:<?= ($settings['menutitle_color'])?$settings['menutitle_color']:""?>;font-size:<?= ($settings['menutitle_fontsize'])?$settings['menutitle_fontsize']:""?>;font-family:<?= ($settings['menutitle_fontfamily'])?$settings['menutitle_fontfamily']:""?>;">Contact With us</h2>
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
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14884.88568090953!2d86.68773520649796!3d21.14358482497765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a1c76d98ad0c14d%3A0x1320196d5d33514d!2sChhatria%2C%20Odisha!5e0!3m2!1sen!2sin!4v1672141826261!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
						</div>
						<h3 style="color:<?= ($settings['pagetitle_color'])?$settings['pagetitle_color']:""?>;font-size:<?= ($settings['pagetitle_fontsize'])?$settings['pagetitle_fontsize']:""?>;font-family:<?= ($settings['pagetitle_fontfamily'])?$settings['pagetitle_fontfamily']:""?>;"><?php echo $pageData['PAD_TITL'];?></h3>
						<form id="contact-form" class="contact-form" method="post" action="contactus_a.php">
							<fieldset>
								<div class="row">
									<div class="col-12">
										<div class="form-group">
											<input type="text" placeholder="Your Name" class="form-control" name="name" id="form-name" data-error="Name field is required" required  onkeypress="CheckSpace(event)" >
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="tel" placeholder="Your Mobile Number" class="form-control" name="mobile" id="form-email" data-error="Mobile field is required" required onkeypress="CheckSpace(event)">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="email" placeholder="Your E-mail" class="form-control" name="email" id="form-email" data-error="Email field is required" required onkeypress="CheckSpace(event)">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<input type="text" placeholder="Subject" class="form-control" name="subject" id="form-subject" data-error="Subject field is required" required onkeypress="CheckSpace(event)">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-12">
										<div class="form-group">
											<textarea placeholder="Message" class="textarea form-control" name="message" id="form-message" rows="7" cols="20" data-error="Message field is required" required onkeypress="CheckSpace(event)"></textarea>
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
			<div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12" style="padding-top: 1px;">
				<div class="sidebar-item-box">
					<ul class="sidebar-more-option">
						<li>
                            <a href="#">
							<?php echo $pageData['PAD_ADSO'];?><br><br><br>
							<?php echo $pageData['PAD_ADST'];?><br><br><br>
							<?php echo $pageData['PAD_MAIL'];?><br><br><br>
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
</script>

<?php
	include 'includes/topfooter.php';
	include 'includes/footer.php';
?>
