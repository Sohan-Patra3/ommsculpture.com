<?php
	include 'includes/topheader.php';
	include 'includes/header.php';
	
	//$pageid=base64_decode($_GET['pageid']);
	$category_id=base64_decode($_GET['id']);
    //echo $category_id;
    
	$sql1 ="SELECT * FROM `pag_dtl01` as p,category_mst as c WHERE p.PAD_CACD=c.category_id  
	AND p.PAD_CANC=0 AND p.PAD_CACD=$category_id";
	$query=mysqli_query($conn,$sql1);

	$sql2 = "SELECT * FROM `pag_mst01` where PAM_PACD=14";
	$result = mysqli_query($conn, $sql2);
	$row = mysqli_fetch_assoc($result);

	$sql3 = "SELECT * FROM `pag_mst01` where PAM_PACD=9";
	$result1 = mysqli_query($conn, $sql3);
	$row1 = mysqli_fetch_assoc($result1);
	
	$sql4 ="SELECT * FROM category_mst as c WHERE category_id=$category_id";
	$result2 = mysqli_query($conn, $sql4);
	$row2 = mysqli_fetch_assoc($result2);
?>

<link rel="stylesheet" href="css/costum.css">

<!-- About Area Start Here -->
<section class="s-space-bottom-full bg-accent-shadow-body ">
	<div class="container">
		<section class="service-layout1">
			<div class="container">
				<div class="gradient-title">
					<h2 class="text-center" style="color:<?= ($settings['menutitle_color'])?$settings['menutitle_color']:""?>;
    					font-size:<?= ($settings['menutitle_fontsize'])?$settings['menutitle_fontsize']:""?>;
    					font-family:<?= ($settings['menutitle_fontfamily'])?$settings['menutitle_fontfamily']:""?>;"><?php echo 'STATUES OF '.strtoupper($row2['name']);?>
    					<!--$row1['PAM_PANM'] single-service.php?-->
					</h2>
				</div>
				<div class="row pt-1" style="padding-left:0.75rem;padding-right:0.75rem">
					<?php 
					while($pageData=mysqli_fetch_array($query))
					{ 
						?>
						<div class="col-5new col-md-3 col-sm-4 col-4 my-2">
							<a href="art_gallery.php?pageid=<?php echo  base64_encode($pageData['PAD_PGCD']);?>">
    							<div class="service-box1 bg-body text-center" style="width: 100%; height: 480px; overflow:hidden">
    								<img src="admin/uploadimage/<?php echo $pageData['PAD_IMG'];?>" alt="service" class="img-fluid" style="width:100%; height: 440px;">
    								<br>
    								<h3 class="title-medium-dark mb-none" ><?php echo strtoupper($pageData['PAD_TITL']);?></h3>
									<!--<div class="view" style="height:15px"><?php echo  substr($pageData['PAD_DESC'],0,30);?></div>-->
    							</div>
							</a>
						</div>
						<?php 
					} 
					?>					
				</div>
			</div>
		</section>
	</div>
</section>
<!-- About Area End Here -->

<style>
    .center 
    {
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 50%;
	}
	
	.logo 
	{
		display: block;
		margin-left: auto;
		margin-right: auto;
		width: 3%;
	}
</style>

<?php
	include 'includes/topfooter.php';
	include 'includes/footer.php';
 ?>
