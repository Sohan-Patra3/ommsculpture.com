<?php
	error_reporting(0);
	
	include 'includes/topheader.php';
	include 'includes/header.php';
	
	$pageid=base64_decode($_GET['pageid']);
	$catid=base64_decode($_GET['catid']);

	if($catid)
	{
		$sql ="SELECT * FROM `gal_dtl01` WHERE GAD_CANC=0 AND GAD_CACD=$catid ";
		$Csql ="SELECT * FROM `cat_mst01` WHERE CAM_CACD=$catid ";
	}
	else
	{
		$sql ="SELECT * FROM `gal_dtl01` WHERE GAD_CANC=0 ";
		$Csql ="SELECT * FROM `cat_mst01` ";
	}

	$query=mysqli_query($conn,$sql);
	$Cquery=mysqli_query($conn,$Csql);
	$catrows=mysqli_fetch_assoc($Cquery);
	//print_r($catrows);
?>

<!-- Category Grid View Start Here -->
<section class="bg-accent-shadow-body fixed-menu-mt" style="padding-top: 9px;">
	<div class="container">
		<div class="row">
			<div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
				<div class="gradient-wrapper item-mb">
					<div class="gradient-title">
						<div class="row">
							<div class="col-12" style="text-align:center">
								<h2 style="color:<?= ($settings['menutitle_color'])?$settings['menutitle_color']:""?>;font-size:<?= ($settings['menutitle_fontsize'])?$settings['menutitle_fontsize']:""?>;font-family:<?= ($settings['menutitle_fontfamily'])?$settings['menutitle_fontfamily']:""?>;"><?php echo isset($_GET['catid'])?$catrows['CAM_CANM']:"Image Gallery";?></h2>
							</div>
							<div class="col-8">
							
							</div>
						</div>
					</div>	
					
					<div id="category-view" class="category-grid-layout1 gradient-padding zoom-gallery">
						<div class="row">
							<?php while($imageGal=mysqli_fetch_assoc($query)): ?>
							<div class="col-5new col-md-12 col-sm-12 col-12">
								<div class="product-box item-mb zoom-gallery">
									<div class="item-mask-wrapper">
										<div class="item-mask secondary-bg-box"><img src="admin/uploadimage/<?php echo $imageGal['GAD_ORCD'];?>/<?php echo $imageGal['GAD_IMG'];?>" alt="categories" class="img-fluid" style="height:400px; width:800px">
											<div class="trending-sign" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i> </div>
											<ul class="info-link">
												<li><a href="admin/uploadimage/<?php echo $imageGal['GAD_ORCD'];?>/<?php echo $imageGal['GAD_IMG'];?>" class="elv-zoom" data-fancybox-group="gallery" title="Title Here"><i class="fa fa-arrows-alt" aria-hidden="true"></i></a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						    <?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
			
			<div class="order-xl-1 order-lg-1 col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12">
				<div class="sidebar-item-box">
					<div class="gradient-wrapper">
						<div class="gradient-title" style="text-align:center">
							<h3 style="color:<?= ($settings['menutitle_color'])?$settings['menutitle_color']:""?>;font-size:<?= ($settings['menutitle_fontsize'])?$settings['menutitle_fontsize']:""?>;font-family:<?= ($settings['menutitle_fontfamily'])?$settings['menutitle_fontfamily']:""?>;">All Categories </h3>
						</div>
						<ul class="sidebar-category-list">
							<?php
							$sql="SELECT * FROM `cat_mst01`";
							$query=mysqli_query($conn,$sql);
							while($crow=mysqli_fetch_assoc($query))
							{
								$catid=$crow['CAM_CACD'];
								$sql1="SELECT COUNT(*) AS c FROM `gal_dtl01` WHERE GAD_CACD=$catid";
								$query1=mysqli_query($conn,$sql1);
								while($countRow=mysqli_fetch_assoc($query1))
								{
									?>
									<li>
										<a href="img_gallery.php?catid=<?php echo base64_encode($catid);?>" >
											<!--<img src="img/product/ctg1.png" alt="category" class="img-fluid">-->
											<?php echo $crow['CAM_CANM'];?><span>(<?php echo $countRow['c'];?>)</span>
										</a>
									</li>
									<?php 
								} 
							} 
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Category Grid View End Here -->

<?php
	include 'includes/topfooter.php';
	include 'includes/footer.php';
 ?>
