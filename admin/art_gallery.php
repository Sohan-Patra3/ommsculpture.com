<?php
	error_reporting(0);
	
	include 'includes/topheader.php';
	include 'includes/header.php';
	
	$pageid=base64_decode($_GET['pageid']);
	$imgtypeid=base64_decode($_GET['imgtypeid']);
    
    $sql ="SELECT * FROM `pag_dtl01` WHERE PAD_PGCD=$pageid AND PAD_CANC=0";
    $query=mysqli_query($conn,$sql);
    $rows=mysqli_fetch_assoc($query);
    
	if($imgtypeid)
	{
		$Gsql ="SELECT * FROM `gal_dtl01` WHERE GAD_IMGTP=$imgtypeid AND GAD_SBCACD=$pageid";
	}
	else
	{
		$Gsql ="SELECT * FROM `gal_dtl01` WHERE GAD_SBCACD=$pageid";
	}
	$Gquery=mysqli_query($conn,$Gsql);
	//$galrows=mysqli_fetch_assoc($Gquery);
	//print_r($galrows);
?>

<!-- Category Grid View Start Here -->
<section class="bg-accent-shadow-body fixed-menu-mt" style="padding-top: 1px;">
    <div class="container-img-txt">
        <img src="admin/uploadimage/<?php echo $rows['PAD_IMG'];?>" alt="about" class="img-fluid w3-hide-small w3-hide-medium" style="width:100%;height: 271px;">
        <div class="centered">
            <h1 style="color:white;text-align:center;"><? echo strtoupper($rows['PAD_TITL'])." STATUE GALLERY";?></h1>
        </div>
    </div>
	<div class="container">
		<div class="row">
			<div class="order-xl-2 order-lg-2 col-xl-10 col-lg-8 col-md-12 col-sm-12 col-12">
				<div class="gradient-wrapper item-mb">
					<div class="gradient-title">
						<div class="row">
							<div class="col-12" style="text-align:center">
								<h2 style="color:<?= ($settings['menutitle_color'])?$settings['menutitle_color']:""?>;font-size:<?= ($settings['menutitle_fontsize'])?$settings['menutitle_fontsize']:""?>;font-family:<?= ($settings['menutitle_fontfamily'])?$settings['menutitle_fontfamily']:""?>;"><?php echo isset($_GET['pageid'])?$rows['PAD_TITL']." Statue Gallery":"Statue Gallery";?></h2>
							</div>
							<div class="col-8">
							    
							</div>
						</div>
					</div>	
					<div id="category-view" class="category-grid-layout1 gradient-padding zoom-gallery">
						<div class="row">
							<?php 
							while($galrows=mysqli_fetch_assoc($Gquery))
							{
							?>
							<div class="col-5new col-md-3 col-sm-4 col-4">
								<div class="product-box item-mb zoom-gallery">
									<div class="item-mask-wrapper">
										<div class="item-mask secondary-bg-box" style="height:370px; width:260px"><img src="admin/uploadimage/<?php echo $galrows['GAD_IMG'];?>" alt="categories" class="img-fluid" style="height:370px; width:260px">
											<div class="title-ctg" data-tips="Featured"> <i class="fa fa-bolt" aria-hidden="true"></i></div>
											<ul class="info-link">
											    <li>
											        <a href="admin/uploadimage/<?php echo $galrows['GAD_IMG'];?>" class="elv-zoom" data-fancybox-group="gallery" title="Title Here">
											            <i class="fa fa-eye" style="font-size:36px;color:white" aria-hidden="true"></i>
										            </a>
									            </li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						    <?php 
							}
						    ?>
						</div>
					</div>
				</div>
			</div>
			
			<div class="order-xl-1 order-lg-1 col-xl-2 col-lg-4 col-md-12 col-sm-12 col-12">
				<div class="sidebar-item-box">
					<div class="gradient-wrapper">
						<div class="gradient-title" style="text-align:center">
							<h3 style="color:<?= ($settings['menutitle_color'])?$settings['menutitle_color']:""?>;font-size:<?= ($settings['menutitle_fontsize'])?$settings['menutitle_fontsize']:""?>;font-family:<?= ($settings['menutitle_fontfamily'])?$settings['menutitle_fontfamily']:""?>;">Search Statue</h3>
						</div>
						<ul class="sidebar-category-list">
							<?php
							$sql="SELECT IMT_ID,IMT_NAME FROM `IMG_TYP` ORDER BY IMT_NAME";
							$query=mysqli_query($conn,$sql);
							while($crow=mysqli_fetch_assoc($query))
							{
								$imgtyp=$crow['IMT_ID'];
								
								$sql1="SELECT COUNT(*) AS totrec FROM `gal_dtl01` WHERE GAD_IMGTP=$imgtyp AND GAD_SBCACD=$pageid";
								$query1=mysqli_query($conn,$sql1);
								while($countRow=mysqli_fetch_assoc($query1))
								{
									?>
									<li>
										<a href="art_gallery.php?pageid=<?php echo base64_encode($pageid)?>&imgtypeid=<?php echo base64_encode($imgtyp);?>">
											<!--<img src="img/product/ctg1.png" alt="category" class="img-fluid">-->
											<?php echo $crow['IMT_NAME'];?><span>(<?php echo $countRow['totrec'];?>)</span>
										</a>
									</li>
								    <?php 
								} 
							} 
							?>
						</ul>
					</div>
				</div>
                <div></div>
                <div></div>
                <div></div>
			</div>
		</div>
	</div>
</section>
<!-- Category Grid View End Here -->

<?php
	include 'includes/topfooter.php';
	include 'includes/footer.php';
 ?>
