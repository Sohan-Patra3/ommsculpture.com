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

<!-- About Area Start Here -->
<section class="s-space-bottom-full bg-accent-shadow-body fixed-menu-mt" style="padding-top: 9px;">
	<div class="container">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb--sm">
				<div class="gradient-wrapper">
					<div class="gradient-title">
						<h2 style="color:<?= ($settings['menutitle_color'])?$settings['menutitle_color']:""?>;font-size:<?= ($settings['menutitle_fontsize'])?$settings['menutitle_fontsize']:""?>;font-family:<?= ($settings['menutitle_fontfamily'])?$settings['menutitle_fontfamily']:""?>;"><?php echo $pageData['PAM_PANM'];?></h2>
					</div>
					<div class="about-us gradient-padding">
						<img src="admin/uploadimage/<?php echo $pageData['PAD_IMG'];?>" alt="about" class="img-fluid w3-hide-small w3-hide-medium" style="width:1455px;height: 271px;">
						<!--<img src="admin/uploadimage/<?php echo $pageData['PAD_IMG'];?>" alt="about" class="img-fluid w3-hide-large " style="width:1000px;height: 200px;">-->
						<h3 style="color:<?= ($settings['pagetitle_color'])?$settings['pagetitle_color']:""?>;font-size:<?= ($settings['pagetitle_fontsize'])?$settings['pagetitle_fontsize']:""?>;font-family:<?= ($settings['pagetitle_fontfamily'])?$settings['pagetitle_fontfamily']:""?>;"><?php echo $pageData['PAD_TITL'];?></h3>
						<p><?php echo $pageData['PAD_DESC'];?></p>
					</div>
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