<?php
include 'includes/topheader.php';
include 'includes/header.php';
$prows=array();
if(isset($_GET['pageid'])){
	$pageid=base64_decode($_GET['pageid']);
	if($pageid ==9){
		$sql ="SELECT * FROM `pag_dtl01`,pag_mst01 WHERE PAD_PACD=PAM_PACD AND PAD_PACD=$pageid AND PAD_CANC=0";
		$query=mysqli_query($conn,$sql);  
		while($page=mysqli_fetch_array($query)){
			$prows[]=$page;
		}
		
	}else{
		$sql ="SELECT * FROM `pag_dtl01`,pag_mst01 WHERE PAD_PACD=PAM_PACD AND PAD_PACD=$pageid AND PAD_CANC=0";
	}
	$query=mysqli_query($conn,$sql);
	$pageData=mysqli_fetch_assoc($query);
	
	
}
if(isset($_GET['status'])==200){
		$msg='<div class="alert alert-success success" role="alert" style="padding-top:5px;">Message Submitted Successfully .</div>';
	}
	elseif(isset($_GET['status'])==201){
		$msg='<div class="alert alert-danger success" role="alert"  style="padding-top:5px;"> Error Occured ! Please Fill All fields</div>';
	}
//print_r($prows);
 ?>
  <!-- About Area Start Here -->
<section class="s-space-bottom-full bg-accent-shadow-body ">
	<!--<div class="container">
		<div class="breadcrumbs-area">
			<ul>
				<li><a href="#">Home</a> -</li>
				<li class="active">Who We Are</li>
			</ul>
		</div>
	</div>-->
	<div class="container">
		<div class="row">
			<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12 ">
				<div class="gradient-wrapper">
					<div class="gradient-title">
						<h2><?php echo $pageData['PAM_PANM'];?></h2>
					</div>
					<div class="about-us gradient-padding">
						<?php if($pageid ==9){?>
						<section class="service-layout1 bg-accent pt-2">
							<div class="container">
								<div class="row">
									<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
										<div class="service-box1 bg-body text-center">
											<img src="img/service/service1.png" alt="service" class="img-fluid">
											<h3 class="title-medium-dark mb-none"><a href="category-list-layout1.html">Electronics</a></h3>
											<div class="view">(19,805)</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
										<div class="service-box1 bg-body text-center">
											<img src="img/service/service2.png" alt="service" class="img-fluid">
											<h3 class="title-medium-dark mb-none"><a href="category-grid-layout1.html">Vehicles</a></h3>
											<div class="view">(12,857)</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
										<div class="service-box1 bg-body text-center">
											<img src="img/service/service3.png" alt="service" class="img-fluid">
											<h3 class="title-medium-dark mb-none"><a href="category-list-layout2.html"> Jobs</a></h3>
											<div class="view">(16,267)</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
										<div class="service-box1 bg-body text-center">
											<img src="img/service/service4.png" alt="service" class="img-fluid">
											<h3 class="title-medium-dark mb-none"><a href="category-grid-layout2.html">Animals</a></h3>
											<div class="view">(1,245)</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
										<div class="service-box1 bg-body text-center">
											<img src="img/service/service5.png" alt="service" class="img-fluid">
											<h3 class="title-medium-dark mb-none"><a href="category-list-layout3.html">Sport </a></h3>
											<div class="view">(15,897)</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
										<div class="service-box1 bg-body text-center">
											<img src="img/service/service6.png" alt="service" class="img-fluid">
											<h3 class="title-medium-dark mb-none"><a href="category-grid-layout3.html">Appartment</a></h3>
											<div class="view">(13,657)</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
										<div class="service-box1 bg-body text-center">
											<img src="img/service/service7.png" alt="service" class="img-fluid">
											<h3 class="title-medium-dark mb-none"><a href="category-list-layout1.html">Education</a></h3>
											<div class="view">(19,227)</div>
										</div>
									</div>
									<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
										<div class="service-box1 bg-body text-center">
											<img src="img/service/service8.png" alt="service" class="img-fluid">
											<h3 class="title-medium-dark mb-none"><a href="category-grid-layout1.html">Garden</a></h3>
											<div class="view">(11,607)</div>
										</div>
									</div>
								</div>
							</div>
							
						</section>
						<?php }else if($pageid !=3){?>
						
						<img src="admin/uploadimage/<?php echo $pageData['PAD_IMG'];?>" alt="about" class="img-fluid" style="width:1000px;height: 500px;">
						<h3><?php echo $pageData['PAD_TITL'];?></h3>
						<p><?php echo $pageData['PAD_DESC'];?></p>
						<?php }else{ ?>
						<!--<div class="google-map-area">
							<div id="googleMap" style="width:100%; height:400px;"></div>
						</div>-->
						<div style=" margin-top:10px;"><?php  if(isset($msg)){echo $msg ;}?></div>
                        <div class="google-map-area">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29902.469203968547!2d84.217414708397!3d20.473050928294526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a23b30174c7d8e7%3A0x4aad9c2b13fed970!2sPhulbani%2C+Odisha%2C+India!5e0!3m2!1sen!2sus!4v1545024452930" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen=""></iframe>	
						</div>
					
						<h3><?php echo $pageData['PAD_TITL'];?></h3>
						<form id="contact-form" class="contact-form" method="post" action="contactus_a.php">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Your Name" class="form-control" name="name" id="form-name" data-error="Name field is required" required="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="tel" placeholder="Your Mobile Number" class="form-control" name="mobile" id="form-email" data-error="Mobile field is required" required="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="email" placeholder="Your E-mail" class="form-control" name="email" id="form-email" data-error="Email field is required" required="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="text" placeholder="Subject" class="form-control" name="subject" id="form-subject" data-error="Subject field is required" required="">
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea placeholder="Message" class="textarea form-control" name="message" id="form-message" rows="7" cols="20" data-error="Message field is required" required=""></textarea>
                                                    <div class="help-block with-errors"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-sm-12 col-12">
                                                <div class="form-group">
                                                    <button type="submit" class="cp-default-btn-sm">Send Message</button>
                                                </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8 col-sm-6 col-sm-12 col-12">
                                                <div class="form-response"></div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
						<?php } ?>
						
						
					</div>
				</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 pt-1">
				<div class="sidebar-item-box">
					 <ul class="sidebar-more-option">
					 <?php if($pageid ==3){?>
                        <li>
                            <a href="#">
							<?php echo $pageData['PAD_ADSO'];?>,<?php echo $pageData['PAD_ADST'];?><br>
							<?php echo $pageData['PAD_MAIL'];?><br>
							+91 <?php echo $pageData['PAD_PHN'];?>
							</a>
                        </li>
					 <?php }else{ ?>
						<li>
							<a href="post-ad.html"><img src="img/banner/more1.png" alt="more" class="img-fluid">Post a Free Ad</a>
						</li>
						<li>
							<a href="#"><img src="img/banner/more2.png" alt="more" class="img-fluid">Manage Product</a>
						</li>
						<li>
							<a href="favourite-ad-list.html"><img src="img/banner/more3.png" alt="more" class="img-fluid">Favorite Ad list</a>
						</li>
					 <?php } ?>
                    </ul>
				</div>
				<div class="sidebar-item-box">
					<img src="img/banner/sidebar-banner1.jpg" alt="banner" class="img-fluid m-auto">
				</div>
			</div>
		</div>
	</div>
</section>
        <!-- About Area End Here -->
<?php
include 'includes/topfooter.php';
include 'includes/footer.php';
 ?>