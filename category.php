<?php
    include 'includes/topheader.php';
    include 'includes/header.php';
    include 'admin/includes/functions.php';
    
    $pageid=base64_decode($_GET['pageid']);
    
    $sql ="SELECT * FROM category_mst where status=1";
    $query=mysqli_query($conn,$sql);
    
    $sql = "SELECT * FROM `pag_mst01` where PAM_PACD=$pageid";//14
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<!-- About Area Start Here -->
<section class="s-space-bottom-full bg-accent-shadow-body fixed-menu-mt" style="padding-top: 9px;">
	<div class="container">
		<section class="service-layout1">
			<div class="container">
				<div class="gradient-title">
					<h2 class="text-center" style="color:<?= ($settings['menutitle_color'])?$settings['menutitle_color']:""?>;
				    font-size:<?= ($settings['menutitle_fontsize'])?
				    $settings['menutitle_fontsize']:""?>;font-family:<?= ($settings['menutitle_fontfamily'])?$settings['menutitle_fontfamily']:""?>;"><?php echo $row['PAM_PANM'];?></h2>
				</div>
				
				<div class="row1 pt-1"  style="padding-left:0.75rem;padding-right:0.75rem">
				    <?php 
				    while($pageData=mysqli_fetch_array($query))
				    { 
				        ?>
    					<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb pr-1 pl-1">
    						<a href="services.php?id=<?php echo  base64_encode($pageData['category_id']);?>">
    						<div class="service-box2 bg-body text-center">
    							<img src="admin/uploadimage/<?php echo $pageData['image'];?>" alt="service" class="img-fluid" style="width:100%; height:215px; ">	
    							<div>
        							<h3 class="title-medium-dark mb-none" >	<?php echo $pageData['name'];?></h3>
        							<!--<div class="view" style="height:15px"><?php echo  limit_text($pageData['description'],5);?></div>-->
        						</div>
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
<?php
    include 'includes/topfooter.php';
    include 'includes/footer.php';
?>