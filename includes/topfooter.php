<?php
    $sql="SELECT * FROM `org_mst01` ";
    $row=getdata($sql);
    
    $ssql = "SELECT * FROM `general_setting`";
    $settings =getdata($ssql);
?>

<!-- Footer Area Start Here -->
<footer>
	<div class="footer-area-top s-space-equal" style="background-color:<?= ($settings['footer_bgcolor'])?$settings['footer_bgcolor']:""?>;">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					<div class="footer-box">
						<h3 class="title-medium-light title-bar-left size-lg" style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;">Quick Links</h3>
						<ul class="useful-link">
							<?php
							$sql="SELECT * FROM `pag_mst01` WHERE PAM_STAT IN(2,3,4) AND PAM_CANC=0 AND PAM_ORDER IN(1,2,3,4,5,6,7) AND PAM_PACD NOT IN (5,6,9,14,22) ORDER BY PAM_ORDER ASC";
							$query_row=get__data($sql);
							foreach($query_row as $prow)
							{
								?>
								<li ><a href="<?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>" style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;"><?= $prow['PAM_PANM'];?></a></li>
								<?php 
							} 
							?>
						</ul>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					<div class="footer-box">
						<h3 class="title-medium-light title-bar-left size-lg" style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;">Privacy Policy</h3>
						<ul class="useful-link">
							<?php
								$sql="SELECT * FROM `pag_mst01` WHERE PAM_CANC=0 AND PAM_STAT=1 AND PAM_ORDER IN(1,2) ORDER BY PAM_ORDER ASC";
								$query_row=get__data($sql);
								foreach($query_row as $prow){

							?>
							 <li ><a href="<?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>" style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;"><?= $prow['PAM_PANM'];?></a></li>

							<?php } ?>
						</ul>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					<div class="footer-box">
						<h3 class="title-medium-light title-bar-left size-lg" style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;">Help &amp; Support</h3>
						<ul class="useful-link">
							<?php
								$sql="SELECT * FROM `pag_mst01` WHERE PAM_STAT IN(0,1) AND PAM_ORDER IN(1,3,4) AND PAM_PACD <> 1 AND PAM_PACD NOT IN (13)";
								$query_row=get__data($sql);
								foreach($query_row as $prow){

							?>
							 <li ><a href="<?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>" style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;"><?= $prow['PAM_PANM'];?></a></li>

							<?php } ?>
						</ul>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6 col-12">
					<div class="footer-box">
						<h3 class="title-medium-light title-bar-left size-lg" style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;">Follow Us On</h3>
						<ul class="folow-us">
							<li>
								<a href="<?php echo $row['ORM_GP']; ?>">
									<img src="img/footer/follow1.jpg" alt="follow">
								</a>
							</li>
						</ul>
						
						<ul class="social-link">
							<li class="fa-classipost">
								<a href="<?php echo $row['ORM_FB']; ?>">
									<img src="img/footer/facebook.jpg" alt="social">
								</a>
							</li>
							<li class="tw-classipost">
								<a href="<?php echo $row['ORM_TW']; ?>">
									<img src="img/footer/twitter.jpg" alt="social">
								</a>
							</li>
							<li class="yo-classipost">
								<a href="<?php echo $row['ORM_YT']; ?>">
									<img src="img/footer/youtube.jpg" alt="social">
								</a>
							</li>
							<li class="pi-classipost">
								<a href="<?php echo $row['ORM_PT']; ?>">
									<img src="img/footer/pinterest.jpg" alt="social">
								</a>
							</li>
							<li class="li-classipost">
								<a href="<?php echo $row['ORM_LI']; ?>">
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
					<p>Copyright ©  <?php echo $row['ORM_NAME'];?> <?= date('Y');?></p>
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
