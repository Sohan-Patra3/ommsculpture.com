<?php
include 'includes/topheader.php';
?>

<link rel="stylesheet" href="css/costum.css">
<!--<link rel="icon" href="assets/img/favicon.png" sizes="20x20" type="image/png">
<link rel="stylesheet" href="assets/css/vendor.css">
<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/responsive.css">-->

<?php
include 'includes/header.php';
include 'admin/includes/functions.php';
?>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background: #F1F4FD;
}

.slider-wrapper {
    overflow: hidden;
    white-space: nowrap;

}

.slider-wrapper .image-list {
    display: inline-block;
    white-space: nowrap;
    animation: scroll 60s linear infinite;
}

.slider-wrapper .image-list .image-item {
    width: 325px;
    height: 400px;
    object-fit: cover;
    margin-right: 4px;
}

img {
    margin: 4px;
}

@keyframes scroll {
    0% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(-100%);
    }
}

.one {

    margin-top: 50px;
}
</style>

<!-- Map Area Start Here "-->
<section class="service-layout1 fixed-menu-mt full-width-container  pl-5 pr-5" style="background: white;">
    <div class="container-fluid">
        <div class="row w3-hide-small w3-hide-medium">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div id="demo" class="carousel slide swiper-slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
						$sql = "SELECT * FROM `banner_mst` ORDER BY BAM_ORCD ASC";
						$query = mysqli_query($conn, $sql);
						$i = 0;
						while ($brows = mysqli_fetch_assoc($query)) {
							$i++;
						?>
                        <div class="carousel-item  <?php if ($i == 1) {
															echo "active";
														} else {
															echo "";
														} ?>">
                            <img src="admin/uploadimage/banner/<?php echo $brows['BAM_IMG']; ?>"
                                style="width:100%;max-height: 700px; " alt="Los Angeles" class="center">
                            <!--  <img src="https://source.unsplash.com/random/?god,handcraft" alt="" style="width: 100%; height:670px">-->

                        </div>
                        <?php
						}
						?>

                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>

            <!--
			<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 pl-0">
			    <div class="row">
			        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        				<div class="sidebar-item-box">
        					<div class="panel panel-default noticeboard">
                                <div class="buttom">&nbsp;</div>
                                <div class="">
                                    <div class="LeftCornar"></div><div class="RightCornar"></div>
            						<div class="Title">
										<span id="lblNoticeBoard">Notice Board</span>
            						</div>
                                    <div class="panel-body" style="background-color:#fff; border:none; margin-top:28px;">
										<ul class="list-group NoListBullet" style="height: 180px;">
											<marquee class="scroll_news pl-3" direction="up" scrollamount="2" id="scroll_notice"> 
												<?php
												$sql = "SELECT * FROM `pag_dtl01` WHERE PAD_PACD=10 AND PAD_CANC=0 ORDER BY PAD_PGCD ASC";
												$query = mysqli_query($conn, $sql);
												while ($Nrows = mysqli_fetch_assoc($query)) {
												?>
													<li>
														<div onMouseOver="document.getElementById('scroll_notice').stop();" onMouseOut="document.getElementById('scroll_notice').start();">
															<div><h4><?php echo $Nrows['PAD_TITL']; ?></h4></div>
															<div><a href="admin/uploadimage/<?php echo $Nrows['PAD_IMG'] ?>" target="_blank"><?php echo $Nrows['PAD_DESC']; ?></a></div>
														</div>
													</li>
													<?php
												}
													?>				                							
                						    </marquee> 
                						</ul>							
                                    </div>
                                </div>
                            </div>
        			    </div>
        			</div>
					
        			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        			    <div class="sidebar-item-box">
                        	<div class="panel panel-default noticeboard">
                        		<div class="buttom">&nbsp;</div>
                        		<div class="">
                        			<div class="LeftCornar"></div><div class="RightCornar"></div>
                        			<div class="Title1">
										<span id="lblNoticeBoard" class="text-black">Photo Gallery</span>
                        			</div>
                        			<div class="panel-body" style="background-color:#fff; border:none; margin-top:28px;">
                        				<div id="demo1" class="carousel slide" data-ride="carousel">
                        					<div class="carousel-inner1 row">
												<?php
												$sql = "SELECT * FROM `gal_dtl01` WHERE GAD_CANC=0 ORDER BY GAD_ORCD";
												$query = mysqli_query($conn, $sql);
												$i = 0;
												while ($brows = mysqli_fetch_assoc($query)) {
													if ($i % 3 == 0) {
														$sel = "sele";
													}
													$i++;
												?>
													<div class=" carousel-item <?php echo $sel; ?>  <?php if ($i == 3) {
																										echo "active";
																									} else {
																										echo "";
																									} ?> ">
														<a href="img_gallery.php?pageid=<?php echo base64_encode(6); ?>&catid=<?php echo base64_encode($brows['GAD_CACD']); ?>">                        							    
															<img src="admin/uploadimage//<?php echo $brows['GAD_ORCD']; ?>/<?php echo $brows['GAD_IMG']; ?>" class="center" alt="Los Angeles"  style="width:auto;height:180px;">                       									
														</a>
														<!--<img src="admin/uploadimage/<?php echo $imageGal['GAD_ORCD']; ?>/<?php echo $imageGal['GAD_IMG']; ?>"  alt="Los Angeles"  style="width:100%;height:180px;">-->
            <!--</div>
                        							<?php
												}
													?>
                        					</div>
                        					<a class="carousel-control-prev" href="#demo1" data-slide="prev">
                        						<span class="carousel-control-prev-icon"></span>
                        					</a>
                        					<a class="carousel-control-next" href="#demo1" data-slide="next">
                        						<span class="carousel-control-next-icon"></span>
                        					</a>
                        				</div>                        										
                        			</div>
                        		</div>
                        	</div>
                        </div>
        			</div>
			    </div>
		    </div>
			-->
        </div>

        <!-- For Mobile -->
        <div class="row w3-hide-large">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-right:0px">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
						$sql = "SELECT * FROM `banner_mst` ORDER BY BAM_ORCD ASC";
						$query = mysqli_query($conn, $sql);
						$i = 0;
						while ($brows = mysqli_fetch_assoc($query)) {
							$i++;
						?>
                        <div class="carousel-item  <?php if ($i == 1) {
															echo "active";
														} else {
															echo "";
														} ?> ">
                            <img src="admin/uploadimage/banner/<?php echo $brows['BAM_IMG']; ?>" alt="Los Angeles"
                                style="width:100%;height:180px;">
                        </div>
                        <?php
						}
						?>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>

            <!-- For Mobile -->
            <!--
			<div class=" col-12 pl-0" style="padding-right:0px">
				<div class="sidebar-item-box" style="padding-left: 15px;">
					<div class="panel panel-default noticeboard">
						<div class="buttom">&nbsp;</div>
						<div class="">
							<div class="LeftCornar"></div><div class="RightCornar"></div>
							<div class="Title" style="left: 26%;">
								<span id="lblNoticeBoard">Notice Board</span>
							</div>
							<div class="panel-body" style="background-color:#fff; border:none; margin-top:28px;">
								<ul class="list-group NoListBullet" style="height: 180px;">
									<marquee class="scroll_news pl-3" direction="up" scrollamount="2" id="scroll_notice"> 
										<?php
										$sql = "SELECT * FROM `pag_dtl01` WHERE PAD_PACD=10 AND PAD_CANC=0 ORDER BY PAD_PGCD ASC";
										$query = mysqli_query($conn, $sql);
										while ($Nrows = mysqli_fetch_assoc($query)) {
										?>
											<li>
												<div onMouseOver="document.getElementById('scroll_notice').stop();" onMouseOut="document.getElementById('scroll_notice').start();">
													<div><h4><?php echo $Nrows['PAD_TITL']; ?></h4></div>
													<div><a href="admin/uploadimage/<?php echo $Nrows['PAD_IMG'] ?>" target="_blank"><?php echo $Nrows['PAD_DESC']; ?></a></div>
												</div>
											</li>
											<?php
										}
											?>				
										<!--<div onmouseover="document.getElementById('scroll_notice').stop();" onmouseout="document.getElementById('scroll_notice').start();">
											<li class="Page-list-group-item">
												<div style="font-weight:bold; font-size:7pt;" class="underline">
													<span><h6>Mirror Log Scale Example</h6></span>
												</div>
												<div>
													<a href="admin/uploadimage/html5_tutorial (1).pdf" target="_blank"></a> 
												</div>
												<div style="height:10px;">&nbsp;</div>
											</li>
										</div> -->
            <!--
									</marquee> 
								</ul>							
							</div>
						</div>
					</div>
				</div>
				-->
        </div>

        <!-- For Mobile -->
        <!--
			<div class=" col-12 pl-0" style="padding-right:0px">
				<div class="sidebar-item-box">
					<div class="panel panel-default noticeboard">
                        <div class="buttom">&nbsp;</div>
						<div class="">
                            <div class="LeftCornar"></div><div class="RightCornar"></div>
    						<div class="Title1">
								<span id="lblNoticeBoard" class="text-black">Photo Gallery</span>
    						</div>
                            <div class="panel-body" style="background-color:#fff; border:none; margin-top:28px;">
        						<ul class="list-group NoListBullet" style="height: 180px;">
                                	<div id="demo1" class="carousel slide" data-ride="carousel">
                    					<div class="carousel-inner1 row">
                    						<?php
											$sql = "SELECT * FROM `gal_dtl01` WHERE GAD_CANC=0 ORDER BY GAD_ORCD";
											$query = mysqli_query($conn, $sql);
											$i = 0;
											while ($brows = mysqli_fetch_assoc($query)) {
												if ($i % 3 == 0) {
													$sel = "sele";
												}
												$i++;
											?>
												<div class=" carousel-item <?php echo $sel; ?>  <?php if ($i == 3) {
																									echo "active";
																								} else {
																									echo "";
																								} ?> ">
													<a href="img_gallery.php?pageid=<?php echo base64_encode(6); ?>&catid=<?php echo base64_encode($brows['GAD_CACD']); ?>"><img src="admin/uploadimage//<?php echo $brows['GAD_ORCD']; ?>/<?php echo $brows['GAD_IMG']; ?>" class="center" alt="Los Angeles"  style="width:auto;height:180px;"></a>
													<!--<img src="admin/uploadimage/<?php echo $imageGal['GAD_ORCD']; ?>/<?php echo $imageGal['GAD_IMG']; ?>"  alt="Los Angeles"  style="width:100%;height:170px;">-->
        <!--</div>
                    							<?php
											}
												?>
                    					</div>
                    					<a class="carousel-control-prev" href="#demo1" data-slide="prev">
                    						<span class="carousel-control-prev-icon"></span>
                    					</a>
                    					<a class="carousel-control-next" href="#demo1" data-slide="next">
                    						<span class="carousel-control-next-icon"></span>
                    					</a>
                    				</div>
        						</ul>							
                            </div>
                        </div>
                    </div>
			    </div>				
			</div>
			-->
    </div>
    </div>
</section>

<!--<div class="gradient-title pl-5 pr-5">
	<h2> <marquee direction="left" id="scroll_news"><div onMouseOver="document.getElementById('scroll_news').stop();" onMouseOut="document.getElementById('scroll_news').start();">A scrolling text created with HTML Marquee element.</div></marquee>	</h2>
</div>-->
<!-- Map Area End Here -->

<!-- Service Area Start Here -->
<?php
$sql = "SELECT * FROM `pag_mst01` where PAM_PACD=14"; //14
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<section class="service-layout1  full-width-container bg-accent pl-5 pr-5 mb-3" style="background: white;">
    <div class="container-fluid">
        <div class="row w3-hide-small" style="margin-left: -5px; margin-right: 8px;">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <br />
                <br />
                <br />
                <br />
                <br />
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <img src="admin/uploadimage/<?php $sql1 = "SELECT * FROM `org_mst01`";
											$result1 = mysqli_query($conn, $sql1);
											$row1 = mysqli_fetch_assoc($result1);
											echo $row1['ORM_LOGO']; ?>" class="logo" style="height: 70px; width:97px;">
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                <h2 class="text-center"><?php echo 'Omm Stone ' . $row['PAM_PANM']; ?></h2>
                <div class="container-fluid col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="row">
                        <?php
						$sql = "SELECT * FROM category_mst where status=1 order by orcd";
						$query = mysqli_query($conn, $sql);
						while ($pageData = mysqli_fetch_array($query)) {
						?>

                        <div class="col-5new col-md-3 col-sm-4 col-4 mt-2">
                            <!--col-lg-3 col-md-4 col-sm-6 item-mb container mt-3-->
                            <!--col-lg-2 col-md-3 col-sm-5 item-mb pr-1 pl-1 container mt-3-->
                            <a href="services.php?id=<?php echo  base64_encode($pageData['category_id']); ?>">
                                <div class="service-box bg-body text-center container">
                                    <img src="admin/uploadimage/<?php echo $pageData['image']; ?>" alt="service"
                                        class="img-fluid container-fluid" style="height: 215px; width:100%">
                                </div>
                                <div>
                                    <h3 class="title-medium-dark mb-none" style="text-align: center;">
                                        <?php echo strtoupper($pageData['name']); ?>
                                    </h3>
                                    <!--<div class="view" style="height:15px"><?php echo limit_text($pageData['description'], 5); ?></div>-->
                                </div>
                            </a>
                        </div>

                        <?php
						}
						?>
                    </div>
                </div>
            </div>
            <?php
			$sql = "SELECT * FROM gallery_mst WHERE status=1 order by orcd";
			$query = mysqli_query($conn, $sql);
			$i = 1;

			while ($pageData = mysqli_fetch_array($query)) {
				if ($i % 2 != 0) {
					$floatClass = 'row flex-lg-row-reverse align-items-center g-5 py-5 my-5 ml-5';
				} else {
					$floatClass = 'row flex-lg-row align-items-center g-5 py-5 my-5 ml-5 ml-5';
				}
			?>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5"
                style="box-shadow: 10px 10px 10px 10px rgba(128, 123, 122)">
                <!--container col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mt-5-->
                <div class="<?php echo $floatClass ?>" style="width: 90%;">
                    <div class="col-8 col-sm-6 col-lg-4"
                        style="top: 0; left: 0; width: 100%; height: 100%; opacity: 1; transition: opacity 0.3s ease-in-out; transform: scale(1); overflow:hidden"
                        onmouseover="this.style.opacity=1; this.style.transform='scale(1.2)'"
                        onmouseout="this.style.opacity=1; this.style.transform='scale(1)'">
                        <img src="admin/uploadimage/homepageimg/<?php echo $pageData['image']; ?>"
                            class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                            style="width: 100%; max-height:450px;" loading="lazy">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-center">
                            <?php echo strtoupper($pageData['name']); ?></h1>
                        <p class="lead" style="text-align: justify;">
                            <?php echo strtoupper($pageData['description']); ?></p>
                    </div>
                </div>
            </div>
            <?php
				$i++;
			}
			?>
        </div>
    </div>
</section>

<!--<div class="container col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11">
    style="box-shadow: 10px 10px 10px 10px rgba(128, 123, 122)">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5 my-5" style="width: 90%;">
        <div class="col-8 col-sm-6 col-lg-4 gallery-item">
		<img src="/ommsculpture.com/img/ganesha.jpg" class="d-block mx-lg-auto img-fluid overlay" alt="Bootstrap Themes"
                width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">Responsive left-aligned hero with image</h1>
            <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most
                popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system,
                extensive prebuilt components, and powerful JavaScript plugins.</p>
        </div>
    </div>
</div>-->



<!--<img src="/ommsculpture.com/img/ganesha.jpg" alt="">-->


<section class="service-layout1  full-width-container bg-white pl-5 pr-5">
    <div class="container-fluid">
        <div class="row w3-hide-large">
            <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-12">
                <h2 class="text-center"><?php echo $row['PAM_PANM']; ?></h2>
                <div class="row">
                    <?php
					$sql = "SELECT * FROM category_mst where status=1";
					$query = mysqli_query($conn, $sql);
					while ($pageData = mysqli_fetch_array($query)) {
					?>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb pr-1 pl-1">
                        <a href="services.php?id=<?php echo  base64_encode($pageData['category_id']); ?>">
                            <div class="service-box1 bg-body text-center">
                                <img src="admin/uploadimage/<?php echo $pageData['image']; ?>" alt="service"
                                    class="img-fluid" style="height: 114px; width: 200px;">
                                <hr>
                                <h3 class="title-medium-dark mb-none">
                                    <a
                                        href="services.php?id=<?php echo  base64_encode($pageData['category_id']); ?>"><?php echo $pageData['name']; ?></a>
                                </h3>
                                <!--<div class="view"  style="height:15px"><?php echo limit_text($pageData['description'], 5); ?></div>-->
                            </div>
                        </a>
                    </div>
                    <?php
					}
					?>
                </div>
            </div>
            <?php
			$sql = "SELECT * FROM gallery_mst WHERE status=1 order by orcd";
			$query = mysqli_query($conn, $sql);
			$i = 1;

			while ($pageData = mysqli_fetch_array($query)) {
				if ($i % 2 != 0) {
					$floatClass = 'row flex-lg-row-reverse align-items-center g-5 py-5 my-5';
				} else {
					$floatClass = 'row flex-lg-row align-items-center g-5 py-5 my-5';
				}
			?>
            <div class="container col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-5"
                style="box-shadow: 10px 10px 10px 10px rgba(128, 123, 122)">
                <div class="<?php echo $floatClass ?>" style="width: 90%;">
                    <div class="col-8 col-sm-6 col-lg-4"
                        style="top: 0; left: 0; width: 100%; height: 100%; opacity: 1; transition: opacity 0.3s ease-in-out; transform: scale(1); overflow:hidden"
                        onmouseover="this.style.opacity=1; this.style.transform='scale(1.2)'"
                        onmouseout="this.style.opacity=1; this.style.transform='scale(1)'">
                        <img src="admin/uploadimage/homepageimg/<?php echo $pageData['image']; ?>"
                            class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                            style="width: 100%; max-height:450px;" loading="lazy">
                    </div>
                    <div class="col-lg-6">
                        <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
                            <?php echo strtoupper($pageData['name']); ?></h1>
                        <p class="lead">
                            <?php echo strtoupper($pageData['description']); ?></p>
                    </div>
                </div>
            </div>
            <?php
				$i++;
			}
			?>


        </div>
    </div>
</section>

<!--<section class="service-layout1  full-width-container bg-accent pl-5 pr-5">
	<div class="container-fluid">
		<div class="row w3-hide-small w3-hide-medium">
			<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
			    <h2 class="text-center">Services</h2>
			    <div class="row">
					<?php
					$sql = "SELECT * FROM `pag_dtl01`,pag_mst01 WHERE PAD_PACD=PAM_PACD AND PAD_PACD=9 AND PAD_CANC=0";
					$query = mysqli_query($conn, $sql);
					while ($pageData = mysqli_fetch_array($query)) {
					?>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
							<div class="service-box1 bg-body text-center">
								<img src="admin/uploadimage/<?php echo $pageData['PAD_IMG']; ?>" alt="service" class="img-fluid" style="height: 114px; width: 200px;">
								<h3 class="title-medium-dark mb-none"><a href="single-service.php?id=<?php echo  base64_encode($pageData['PAD_PGCD']); ?>"><?php echo $pageData['PAD_TITL']; ?></a></h3>
								<div class="view"><?php echo  substr($pageData['PAD_DESC'], 0, 10); ?></div>
							</div>
						</div>
						<?php
					}
						?>        
        		</div>
			</div>
			<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 pl-0">
			  
			</div>
	    </div>
	</div>
</section>

<section class="service-layout1  full-width-container bg-accent pl-5 pr-5">
	<div class="container-fluid" >
		<div class="row w3-hide-large">
			<div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-12">
			    <h2 class="text-center">Services</h2>
			    <div class="row">
					<?php
					$sql = "SELECT * FROM `pag_dtl01`,pag_mst01 WHERE PAD_PACD=PAM_PACD AND PAD_PACD=9 AND PAD_CANC=0";
					$query = mysqli_query($conn, $sql);
					while ($pageData = mysqli_fetch_array($query)) {
					?>
						<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
							<div class="service-box1 bg-body text-center">
								<img src="admin/uploadimage/<?php echo $pageData['PAD_IMG']; ?>" alt="service" class="img-fluid" style="height: 114px; width: 200px;">
								<h3 class="title-medium-dark mb-none"><a href="single-service.php?id=<?php echo  base64_encode($pageData['PAD_PGCD']); ?>"><?php echo $pageData['PAD_TITL']; ?></a></h3>
								<div class="view"><?php echo  substr($pageData['PAD_DESC'], 0, 10); ?></div>
							</div>
						</div>
						<?php
					}
						?>        
        		</div>
			</div>
			<div class="col-xl-12 col-lg-4 col-md-12 col-sm-12 col-12 pl-0">
			  
			</div>
	    </div>
	</div>
</section>-->

<!--<section class="service-layout1 bg-accent  ">
	<div class="container">
		<h2 class="text-center">Services</h2>
		<div class="row">
			<?php
			$sql = "SELECT * FROM `pag_dtl01`,pag_mst01 WHERE PAD_PACD=PAM_PACD AND PAD_PACD=9 AND PAD_CANC=0";
			$query = mysqli_query($conn, $sql);
			while ($pageData = mysqli_fetch_array($query)) {
			?>
				<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
					<div class="service-box1 bg-body text-center">
						<img src="admin/uploadimage/<?php echo $pageData['PAD_IMG']; ?>" alt="service" class="img-fluid" style="height: 114px; width: 200px;">
						<h3 class="title-medium-dark mb-none"><a href="single-service.php?id=<?php echo  base64_encode($pageData['PAD_PGCD']); ?>"><?php echo $pageData['PAD_TITL']; ?></a></h3>
						<div class="view"><?php echo  substr($pageData['PAD_DESC'], 0, 10); ?></div>
					</div>
				</div>
				<?php
			}
				?>
		</div>
	</div>
</section>

<!-- Service Area End Here -->
<section class="service-layout1  full-width-container bg-accent pl-5 pr-5 bg-white">
    <div class="one">
        <div class="slider-wrapper">
            <div class="image-list">
                <?php
            $sql = "SELECT * FROM picture_gal where status=1";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <a href="review.php?id=<?php echo $row['category_id']; ?>">
                    <img src="admin/uploadimage/galleryimg/<?php echo $row['image']; ?>" alt="" class="image-item">
                </a>
                <?php
            }
            ?>
            </div>
        </div>
    </div>
</section>
<!-- Counter Area Start Here -->
<div class="bg-white" style="width: 100%;">
    <section class="overlay-default s-space-equal overflow-hidden pl-5 pr-5 mt-5 bg-white"
        style="background-image: url('admin/uploadimage/pnggrad16rgb.png');margin-left:3rem; margin-right:3rem ; ">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                        <div>
                            <img src="img/banner/counter1.png" alt="counter" class="img-fluid mb20-auto--md">
                        </div>
                        <div>
                            <?php
						$sql = "SELECT COUNT(*) AS TOTREC FROM gal_dtl01;";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
						?>
                            <div class="counter counter-title mt-4" data-num="<?php echo $row['TOTREC']; ?>"></div>
                            <h3 class="title-regular-light mt-3">Total Sculpture</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                        <div>
                            <img src="img/banner/counter2.png" alt="counter" class="img-fluid mb20-auto--md">
                        </div>
                        <div>
                            <?php
						$sql = "SELECT COUNT(*) AS TOTREC FROM picture_gal;";
						$result = mysqli_query($conn, $sql);
						$row = mysqli_fetch_assoc($result);
						?>
                            <div class="counter counter-title mt-4" data-num="<?php echo $row['TOTREC']; ?>"></div>
                            <h3 class="title-regular-light mt-3">Our Happy Buyers</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                        <div>
                            <img src="img/banner/counter3.png" alt="counter" class="img-fluid mb20-auto--md">
                        </div>
                        <div>
                            <div class="counter counter-title mt-4" data-num="115"></div>
                            <h3 class="title-regular-light mt-3">Verified Users</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Counter Area End Here -->

<!-- Subscribe Area Start Here -->
<section class="bg-body s-space full-width pl-5 pr-5">
    <div class="container">
        <div class="section-title-dark">
            <h2 class="size-sm">Receive The Best Offers</h2>
            <p>Stay in touch with Classified Ads Wordpress Theme and we'll notify you about best ads</p>
        </div>
        <form action="JavaScript:void(0);">
            <div class="input-group mb-3">
                <input type="email" class="form-control" placeholder="Enter Your Email" id="email">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="Subscribe">Subscribe</button>
                </div>
            </div>
            <p class="text-danger" id="error" style="padding-left:223px"></p>
        </form>
    </div>
</section>

<!-- Subscribe Area End Here -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</script>

<script type="text/javascript">
$(document).on("click", "#Subscribe", function() {
    var email = $("#email").val();
    //alert(facebook);
    if (email != "") {
        $.ajax({
            url: "subscribe_a.php",
            type: "POST",
            cache: false,
            //enctype: "multipart/form-data",
            //processData: false,
            data: {
                type: 1,
                email: email
            },
            success: function(dataResult) {
                alert(dataResult);
            }
        });
    } else {
        var text = "Please enter your Email Id !.";
        $("#error").html(text);
    }
});
</script>

<style>
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}

.logo {
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