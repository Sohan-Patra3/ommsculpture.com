<?php
include 'includes/topheader.php';
include 'includes/header.php';
if(isset($_GET['pageid'])){
	$pageid=base64_decode($_GET['pageid']);
	$sql ="SELECT * FROM `pag_dtl01`,pag_mst01 WHERE PAD_PACD=PAM_PACD AND PAD_PACD=$pageid AND PAD_CANC=0";
	$query=mysqli_query($conn,$sql);
	$pageData=mysqli_fetch_assoc($query);
}
 ?>
  <!-- About Area Start Here -->
<section class="s-space-bottom-full bg-accent-shadow-body fixed-menu-mt" style="padding-top: 9px;">
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
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb--sm">
				<div class="gradient-wrapper">
					<div class="gradient-title">
						<h2><?php echo $pageData['PAM_PANM'];?></h2>
					</div>
					<div class="about-us gradient-padding">
						<!--<img src="img/banner/about.jpg" alt="about" class="img-fluid">-->
						<img src="admin/uploadimage/<?php echo $pageData['PAD_IMG'];?>" alt="about" class="img-fluid w3-hide-small w3-hide-medium" style="width:1000px;height: 500px;">
						<img src="admin/uploadimage/<?php echo $pageData['PAD_IMG'];?>" alt="about" class="img-fluid w3-hide-large " style="width:1000px;height: 200px;">
						<h3><?php echo $pageData['PAD_TITL'];?></h3>
						<p><?php echo $pageData['PAD_DESC'];?></p>
						
					</div>
				</div>
			</div>
			<!--<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
				<div class="sidebar-item-box">
					<ul class="sidebar-more-option">
						<li>
							<a href="post-ad.html"><img src="img/banner/more1.png" alt="more" class="img-fluid">Post a Free Ad</a>
						</li>
						<li>
							<a href="#"><img src="img/banner/more2.png" alt="more" class="img-fluid">Manage Product</a>
						</li>
						<li>
							<a href="favourite-ad-list.html"><img src="img/banner/more3.png" alt="more" class="img-fluid">Favorite Ad list</a>
						</li>
					</ul>
				</div>
				<div class="sidebar-item-box">
					<img src="img/banner/sidebar-banner1.jpg" alt="banner" class="img-fluid m-auto">
				</div>
			</div>-->
		</div>
	</div>
</section>
        <!-- About Area End Here -->
<?php
include 'includes/topfooter.php';
include 'includes/footer.php';
 ?>