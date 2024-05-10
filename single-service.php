<?php
include 'includes/topheader.php';
include 'includes/header.php';
if(isset($_GET['id'])){
$id=base64_decode($_GET['id']);
$sql ="SELECT * FROM `pag_dtl01`,pag_mst01 WHERE PAD_PACD=PAM_PACD AND PAD_PGCD=$id AND PAD_CANC=0";
$query=mysqli_query($conn,$sql);
$pageData=mysqli_fetch_assoc($query);

$category_id=$pageData['PAD_CACD'];
$csql ="SELECT * FROM `category_mst` WHERE category_id =$category_id";
$cquery=mysqli_query($conn,$csql);
$categoryData=mysqli_fetch_assoc($cquery);
	
}
 ?>
 <style>
.caption {
    margin: auto;
    display: block !important;
    width: 80%;
    max-width: 50%;
    text-align: center;
    color: #ccc;
    padding: 0px 0;
    height: 250px;
    object-fit: content;
}
 </style>
<!-- Product Area Start Here -->
<section class="s-space-bottom-full bg-accent-shadow-body">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="gradient-wrapper item-mb">
					<div class="gradient-title">
						<h2 style="color:<?= ($settings['menutitle_color'])?$settings['menutitle_color']:""?>;font-size:<?= ($settings['menutitle_fontsize'])?$settings['menutitle_fontsize']:""?>;font-family:<?= ($settings['menutitle_fontfamily'])?$settings['menutitle_fontfamily']:""?>;"><?php echo $categoryData['name'];?> ->	<?php echo $pageData['PAD_TITL'];?> </h2>
					</div>
					<div class="gradient-padding reduce-padding">
						<div class=" mb-50">
							<div class="tab-content">
								<div class="tab-pane fade active show" id="related1">
									<img alt="single" src="admin/uploadimage/<?php echo $pageData['PAD_IMG'];?>" class="caption" >
								</div>
							</div>
						</div>
						<div class="section-title-left-dark child-size-xl title-bar item-mb">
							<h3 style="color:<?= ($settings['pagetitle_color'])?$settings['pagetitle_color']:""?>;font-size:<?= ($settings['pagetitle_fontsize'])?$settings['pagetitle_fontsize']:""?>;font-family:<?= ($settings['pagetitle_fontfamily'])?$settings['pagetitle_fontfamily']:""?>;"> Details:</h3>
							<div class="text-medium-dark"><?php echo $pageData['PAD_DESC'];?></div>
						</div>
						<!--<ul class="item-actions border-top">
							<li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i>Save Ad</a></li>
							<li><a href="#"><i class="fa fa-share-alt" aria-hidden="true"></i>Share ad</a></li>
							<li><a href="#"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>Report abuse</a></li>
						</ul>-->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Product Area End Here -->
<?php
include 'includes/topfooter.php';
include 'includes/footer.php';
 ?>