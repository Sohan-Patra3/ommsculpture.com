<?php
	//error_reporting(0);
	include '../../includes/database.php';
	include '../includes/functions.php';
	
	$siteurl="http://ommsculpture.com/";
	//$siteurl="172.16.16.210/ommsculpture.com/";
	
	$org_sql = "SELECT * FROM `org_mst01`";
	$org_result = mysqli_query($conn, $org_sql);
	$org_row = mysqli_fetch_assoc($org_result);

	$ssql = "SELECT * FROM `general_setting`";
	$sresult = mysqli_query($conn, $ssql);
	$settings = mysqli_fetch_assoc($sresult);
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $org_row['ORM_NAME'];?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="icon" href="<?= $siteurl ;?>admin/uploadimage/<?php echo $org_row['ORM_LOGO'];?>" type="image/gif"
        sizes="16x16">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="../../css/animate.min.css">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="../../css/font-awesome.min.css">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="../../vendor/OwlCarousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../../vendor/OwlCarousel/owl.theme.default.min.css">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="../../css/meanmenu.min.css">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="../../css/select2.min.css">
    <!-- Magnific CSS -->
    <link rel="stylesheet" type="text/css" href="../../css/magnific-popup.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../css/costum.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!--<div id="preloader"></div>-->
    <!-- Preloader End Here -->
    <div id="wrapper">
        <!-- Header Area Start Here -->
        <header>
            <div id="header-three" class="header-style3 header-fixed bg-body">
                <div class="header-top-bar top-bar-style3 w3-hide-small" style="background-color:#165b02;">
                    <div class="container">
                        <div class="row no-gutters">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="top-bar-left">
                                    <p class="d-none d-lg-block"
                                        style="color:<?= ($settings['topbar_color'])?$settings['topbar_color']:""?>;font-size:<?=  ($settings['topbar_fontsize'])?$settings['topbar_fontsize']:""?>;font-family:<?=  ($settings['topbar_fontfamily'])?$settings['topbar_fontfamily']:""?>;">
                                        <i class="fa fa-life-ring" aria-hidden="true"></i>Have any questions? +91
                                        <?php echo $org_row['ORM_CONO'];?> or <?php echo $org_row['ORM_MAIL'];?>
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                                <div class="top-bar-right">
                                    <p class="d-none d-lg-block">
                                        <i class="fa fa-edit text-warning float-right"
                                            onclick="parent.location='<?= $siteurl ;?>admin/my-account.php';"
                                            style="font-size: 25px; margin-top:-19px;"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="main-menu-area" id="sticker" style="background-color:#ffffff;">
                    <div class="container" style="padding: 0px;">
                        <div class="row no-gutters d-flex align-items-center ">
                            <div class="col-lg-2 col-md-2 col-sm-3">
                                <div class="logo-area">
                                    <a href="<?= $siteurl ;?>admin/webclone/web-index.php" class="img-fluid">
                                        <img src="<?= $siteurl ;?>admin/uploadimage/<?php echo $org_row['ORM_LOGO'];?>"
                                            alt="logo"
                                            style="height:<?= ($settings['logo_height'])?$settings['logo_height']:""?>;width:<?= ($settings['logo_width'])?$settings['logo_width']:""?>;">
                                    </a>
                                    <i class="fa fa-edit text-success float-right"
                                        onclick="parent.location='<?= $siteurl ;?>admin/my-account.php';"
                                        style="font-size: 19px; margin-top:15px;"></i>
                                </div>
                            </div>

                            <!--<div class="col-lg-8 col-md-8 col-sm-6 possition-static my_header">-->
                            <div class="cp-main-menu">
                                <nav>
                                    <ul>
                                        <li class="active"><a
                                                href="<?= $siteurl ;?>admin/webclone/web-index.php">Home</a></li>
                                        <?php
												//PAM_ORDER IN(1,2,3,4,6)
												$sql="SELECT * FROM `pag_mst01` WHERE PAM_CANC=0 AND PAM_STAT=3 ORDER BY PAM_ORDER ASC";
												$query=mysqli_query($conn,$sql);
												while($prow=mysqli_fetch_assoc($query))
												{
													?>
                                        <li class=""><a
                                                href="<?= $siteurl ;?><?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>"><?= $prow['PAM_PANM'];?></a>
                                        </li>
                                        <?php 
												} 
												?>
                                    </ul>
                                </nav>
                            </div>
                            <!--</div>-->
                            <div class="dropdown">
                                <button class="dropbtn">About Omm Stone
                                    <i class="fa fa-caret-down"></i>
                                </button>
                                <div class="dropdown-content">
                                    <?php
											//AND PAM_ORDER IN(1,2,3,4,6)
											$sql="SELECT * FROM `pag_mst01` WHERE PAM_STAT=1 AND PAM_CANC=0 ORDER BY PAM_ORDER ASC";
											$query_row=get__data($sql);
											foreach($query_row as $prow)
											{
												?>
                                    <a
                                        href="<?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>"><?= $prow['PAM_PANM'];?></a>
                                    <?php 
											}
											?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Menu Area Start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li class="active"><a
                                                href="<?= $siteurl ;?>admin/webclone/web-index.php">Home</a></li>
                                        <?php
												//PAM_ORDER IN(1,2,3,4,6)
												$sql="SELECT * FROM `pag_mst01` WHERE PAM_CANC=0 AND PAM_STAT=3 ORDER BY PAM_ORDER ASC";
												$query=mysqli_query($conn,$sql);
												while($prow=mysqli_fetch_assoc($query))
												{
													?>
                                        <li class=""><a
                                                href="<?= $siteurl ;?><?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>"><?= $prow['PAM_PANM'];?></a>
                                        </li>
                                        <?php 
												} 
												?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mobile Menu Area End -->
        </header>

        <!-- Header Area End Here -->

        <!-- Map Area Start Here -->
        <section class="service-layout1 fixed-menu-mt full-width-container  pl-5 pr-5">
            <div class="container-fluid">
                <!--<a href="https://ommsculpture.com/admin/banner.php?page_id=12"  target="_top">Add Banner</a>-->
                <div class="row w3-hide-small w3-hide-medium">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <p class="align-center m-0">
                            <i class="fa fa-plus text-info float-left"
                                onclick="parent.location='<?= $siteurl ;?>admin/banner.php?page_id=12';"
                                style="font-size: 25px; margin-top:25px;margin-left: -34px;"></i>
                        </p>
                        <div id="demo" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php
									$sql = "SELECT * FROM `banner_mst` ORDER BY BAM_BACD ASC";
									$query =mysqli_query($conn,$sql);
									$i=0;
									while($brows =mysqli_fetch_assoc($query ))
									{ 
										$i++;
										?>
                                <div class="carousel-item  <?php if($i==1){ echo "active";}else{ echo "";}?> ">
                                    <img src="<?= $siteurl ;?>admin/uploadimage/banner/<?php echo $brows['BAM_IMG'] ;?>"
                                        alt="Los Angeles" style="width:100%;height:500px;"
                                        onclick="parent.location='<?= $siteurl ;?>admin/banner.php?editid=<?= $brows['BAM_BACD'];?>&page_id=12';">
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
										<div class="panel panel-default noticeboard" >
											<div class="buttom">&nbsp;</div>
											<div class="">
												<div class="LeftCornar"></div><div class="RightCornar"></div>
												<div class="Title">
												  <span id="lblNoticeBoard">Notice Board</span>
												</div>
												<div class="panel-body" style="background-color:#fff; border:none; margin-top:28px;">
													<p class="align-center m-0">
														<i class="fa fa-plus text-info float-right" onclick="parent.location='<?= $siteurl ;?>admin/noticeboard.php?page_id=10';" style="font-size: 25px; margin-top:-38px;margin-right: -44px;"></i>
													</p>
													<ul class="list-group NoListBullet" style="height: 180px;">
													   <marquee class="scroll_news pl-3" direction="up" scrollamount="2" id="scroll_notice"> 
															<?php
															$sql = "SELECT * FROM `pag_dtl01` WHERE PAD_PACD=10 AND PAD_CANC=0 ORDER BY PAD_PGCD ASC";
															$query =mysqli_query($conn,$sql);
															while($Nrows =mysqli_fetch_assoc($query ))
															{
																?>
																<li>
																	<div onMouseOver="document.getElementById('scroll_notice').stop();" onMouseOut="document.getElementById('scroll_notice').start();">
																		<div><h4><?php echo $Nrows['PAD_TITL'];?> <i class="fa fa-edit text-success" onclick="parent.location='https://ommsculpture.com/admin/noticeboard.php?editid=<?= $Nrows['PAD_PGCD'];?>&page_id=10';" style="font-size: 18px;"></i></h4> </div>
																		<div style="margin-top:-17px"><a href="<?= $siteurl ;?>admin/uploadimage/<?php echo $Nrows['PAD_IMG'] ?>" target="_blank"><?php echo $Nrows['PAD_DESC'];?></a></div>
																		<br>
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
										<div class="panel panel-default noticeboard" >
											<div class="buttom">&nbsp;</div>
											<div class="">
												<div class="LeftCornar"></div><div class="RightCornar"></div>
												<div class="Title1">
													<span id="lblNoticeBoard" class="text-black">Photo Gallery</span>
												</div>
												<p class="align-center m-0">
													<i class="fa fa-plus text-info float-right" onclick="parent.location='<?= $siteurl ;?>admin/img_gallery.php?page_id=6';" style="font-size: 25px; margin-top:-38px;margin-right: -44px;"></i>
												</p>
												<div class="panel-body" style="background-color:#fff; border:none; margin-top:28px;">
													<div id="demo1" class="carousel slide" data-ride="carousel">
														<div class="carousel-inner1 row">
															<?php
															$sql = "SELECT * FROM `gal_dtl01` WHERE GAD_CANC=0";
															$query =mysqli_query($conn,$sql);
															$i=0;
															while($brows =mysqli_fetch_assoc($query ))
															{  
																if($i % 3 == 0)
																{
																	$sel="sele";
																}
																$i++;
																?>
																<div class=" carousel-item <?php echo $sel;?>  <?php if($i==3){ echo "active";}else{ echo "";} ?> ">
																	<a href="<?= $siteurl ;?>img_gallery.php?pageid=<?php echo base64_encode(6);?>&catid=<?php echo base64_encode($brows['GAD_CACD']);?>">
																		<img src="<?= $siteurl ;?>admin/uploadimage/<?php echo $brows['GAD_ORCD'];?>/<?php echo $brows['GAD_IMG'] ;?>" class="img-thumbnail" alt="Los Angeles"  style="width:100%;height:180px;" >
																	</a>
																	<!--<img src="admin/uploadimage/<?php echo $imageGal['GAD_ORCD'];?>/<?php echo $imageGal['GAD_IMG'];?>"  alt="Los Angeles"  style="width:100%;height:180px;">-->
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
            </div>
        </section>

        <!--
			<div class="gradient-title pl-5 pr-5">
				<h2> <marquee direction="left" id="scroll_news"><div onMouseOver="document.getElementById('scroll_news').stop();" onMouseOut="document.getElementById('scroll_news').start();">A scrolling text created with HTML Marquee element.</div></marquee>	</h2>
			</div>
			-->
        <!-- Map Area End Here -->

        <?php 
				$sql = "SELECT * FROM `pag_mst01` where PAM_PACD=14";//14
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_assoc($result);
			?>

        <section class="service-layout1  full-width-container bg-accent pl-5 pr-5" style="background-color: #ffffff;">
            <div class="container-fluid">
                <div class="row w3-hide-small " style="margin-left: -5px; margin-right: 8px;">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <br />
                        <br />
                        <br />
                        <br />
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <img src="http://www.ommsculpture.com/admin/uploadimage/logo-1.png" class="logo">
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h2 class="text-center"><?php echo $row['PAM_PANM'];?></h2>
                        <div class="row">
                            <!--
							   <div class="col-lg-3 col-md-4 col-sm-12 col-12 item-mb pr-1 pl-1">
									<div class="service-box1 bg-body text-center"  onclick="parent.location='<?= $siteurl ;?>admin/category.php?page_id=14';" style="height: 250px;">
										<i class="fa fa-plus text-info float-left" onclick="parent.location='<?= $siteurl ;?>admin/category.php?page_id=14';" style="font-size: 50px; margin-top:85px;margin-left: 115px;"></i>
									</div>
								</div>
								-->
                            <?php
								$sql ="SELECT * FROM category_mst where status=1";
								$query=mysqli_query($conn,$sql);
								while($pageData=mysqli_fetch_array($query))
								{ 
									?>
                            <div class="col-lg-3 col-md-4 col-sm-6 item-mb pr-1 pl-1">
                                <a
                                    href="<?= $siteurl ;?>services.php?id=<?php echo  base64_encode($pageData['category_id']);?>">
                                    <div class="service-box1 bg-body text-center">
                                        <img src="<?= $siteurl ;?>admin/uploadimage/<?php echo $pageData['image'];?>"
                                            alt="service" class="img-fluid" style="width:100%; height: 215px;">
                                        <div>
                                            <h3 class="title-medium-dark mb-none"><?php echo $pageData['name'];?></h3>
                                            <!--<div class="view"  style="height:15px"><?php echo limit_text($pageData['description'], 5); ?> </div>-->
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <?php 
								} 
								?>
                            <div class="col-lg-3 col-md-4 col-sm-12 col-12 item-mb pr-1 pl-1">
                                <div class="service-box1 bg-body text-center"
                                    onclick="parent.location='<?= $siteurl ;?>admin/category.php?page_id=14';"
                                    style="height: 250px;">
                                    <i class="fa fa-plus text-info float-left"
                                        onclick="parent.location='<?= $siteurl ;?>admin/category.php?page_id=14';"
                                        style="font-size: 50px; margin-top:85px;margin-left: 40%;"></i>
                                </div>
                            </div>
                            <!--
								<div class="col-lg-3 col-md-3 col-sm-6 col-12 item-mb">
									<div class="service-box1 bg-body text-center"  onclick="parent.location='<?= $siteurl ;?>admin/category.php?page_id=14';" style="height: 250px;">
										<i class="fa fa-plus text-info float-left" onclick="parent.location='<?= $siteurl ;?>admin/category.php?page_id=14';" style="font-size: 50px; margin-top:70px;margin-left: 95px;"></i>
									</div>
								</div>
								-->
                        </div>
                    </div>
                    <?php
                    $sql = "SELECT * FROM gallery_mst WHERE status=1 order by orcd";
                    $query = mysqli_query($conn, $sql);
                   $i = 1;

                while ($pageData = mysqli_fetch_array($query)) 
{
	if ($i%2!=0)
	{
		$floatClass ='row flex-lg-row-reverse align-items-center g-5 py-5 my-5 ml-5';
	}
	else
	{
		$floatClass ='row flex-lg-row align-items-center g-5 py-5 my-5 ml-5 ml-5';
	}
    ?>
                    <div class="container col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mt-5"
                        style="box-shadow: 10px 10px 10px 10px rgba(128, 123, 122)">
                        <div class="<?php echo $floatClass ?>" style="width: 90%;">
                            <div class="col-8 col-sm-6 col-lg-4"
                                style="top: 0; left: 0; width: 100%; height: 100%; opacity: 1; transition: opacity 0.3s ease-in-out; transform: scale(1); overflow:hidden"
                                onmouseover="this.style.opacity=1; this.style.transform='scale(1.2)'"
                                onmouseout="this.style.opacity=1; this.style.transform='scale(1)'">
                                <img src="/ommsculpture.com/admin/uploadimage/homepageimg/<?php echo $pageData['image'];?>"
                                    class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                                    style="width: 100%; max-height:450px;" loading="lazy">
                            </div>
                            <div class="col-lg-6">
                                <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-center">
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
                    <div class="container col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mt-5"
                        style="box-shadow: 10px 10px 10px 10px rgba(128, 123, 122)">
                        <div class="service-box1 bg-body text-center"
                            onclick="parent.location='<?= $siteurl ;?>admin/gallery_img.php?page_id=22';"
                            style="height: 250px;">
                            <i class="fa fa-plus text-info float-left"
                                onclick="parent.location='<?= $siteurl ;?>admin/gallery_img.php?page_id=22';"
                                style="font-size: 50px; margin-top:100px;margin-left: 45%;"></i>
                        </div>
                    </div>
                </div>
            </div>

    </div>
    </div>
    </section>

    <section class="service-layout1  full-width-container bg-accent pl-5 pr-5" style="background-color: #ffffff;">
        <div class="row w3-hide-large">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="padding-right:0px">
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <?php
						$sql = "SELECT * FROM `banner_mst` ORDER BY BAM_ORCD ASC";
						$query =mysqli_query($conn,$sql);
						$i=0;
						while($brows =mysqli_fetch_assoc($query))
						{
							$i++;
							?>
                        <div class="carousel-item  <?php if($i==1){ echo "active";}else{ echo "";}?>">
                            <img src="<?= $siteurl ;?>admin/uploadimage/banner/<?php echo $brows['BAM_IMG'] ;?>"
                                alt="Los Angeles" style="width:100%;max-height:200px;"
                                onclick="parent.location='<?= $siteurl ;?>admin/banner.php?editid=<?= $brows['BAM_BACD'];?>&page_id=12';">
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
        </div>
        <div class="container-fluid">
            <div class="row w3-hide-large">
                <div class="col-xl-12 col-lg-8 col-md-12 col-sm-12 col-12">
                    <h2 class="text-center"><?php echo $row['PAM_PANM'];?></h2>
                    <div class="row">
                        <?php
								$sql ="SELECT * FROM category_mst where status=1";
								$query=mysqli_query($conn,$sql);
								while($pageData=mysqli_fetch_array($query))
								{ 
									?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                            <a href="services.php?id=<?php echo  base64_encode($pageData['category_id']);?>">
                                <div class="service-box1 bg-body text-center">
                                    <img src="<?= $siteurl ;?>admin/uploadimage/<?php echo $pageData['image'];?>"
                                        alt="service" class="img-fluid" style="height: 114px; width: 200px;">
                                    <h3 class="title-medium-dark mb-none">
                                        <?php echo $pageData['name'];?>
                                    </h3>
                                </div>
                            </a>
                        </div>
                        <?php 
								} 
								?>
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
                            <div class="service-box1  my_box bg-body text-center"
                                onclick="parent.location='<?= $siteurl ;?>admin/category.php?page_id=14';"
                                style="height: 217px;">
                                <i class="fa fa-plus text-info float-left"
                                    onclick="parent.location='<?= $siteurl ;?>admin/category.php?page_id=14';"
                                    style="font-size: 50px; margin-top:70px;margin-left: 40%;"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    $sql = "SELECT * FROM gallery_mst WHERE status=1 order by orcd";
                    $query = mysqli_query($conn, $sql);
                   $i = 1;

                while ($pageData = mysqli_fetch_array($query)) 
{
	if ($i%2!=0)
	{
		$floatClass ='row flex-lg-row-reverse align-items-center g-5 py-5';
	}
	else
	{
		$floatClass ='row flex-lg-row align-items-center g-5 py-5';
	}
    ?>
                <div class="container col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mt-5"
                    style="box-shadow: 10px 10px 10px 10px rgba(128, 123, 122)">
                    <div class="<?php echo $floatClass ?>" style="width: 90%;">
                        <div class="col-8 col-sm-6 col-lg-4"
                            style="top: 0; left: 0; width: 100%; height: 100%; opacity: 1; transition: opacity 0.3s ease-in-out; transform: scale(1); overflow:hidden"
                            onmouseover="this.style.opacity=1; this.style.transform='scale(1.2)'"
                            onmouseout="this.style.opacity=1; this.style.transform='scale(1)'">
                            <img src="/ommsculpture.com/admin/uploadimage/homepageimg/<?php echo $pageData['image'];?>"
                                class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                                style="width: 100%; max-height:450px;" loading="lazy">
                        </div>
                        <div class="col-lg-6">
                            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-center">
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

                <div class="container col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 mt-5"
                    style="box-shadow: 10px 10px 10px 10px rgba(128, 123, 122)">
                    <div class="service-box1 bg-body text-center"
                        onclick="parent.location='<?= $siteurl ;?>admin/gallery_img.php?page_id=22';"
                        style="height: 250px;">
                        <i class="fa fa-plus text-info float-left"
                            onclick="parent.location='<?= $siteurl ;?>admin/gallery_img.php?page_id=22';"
                            style="font-size: 50px; margin-top:85px;margin-left: 40%;"></i>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </section>

    <!-- Service Area Start Here -->
    <!--
			<section class="service-layout1  full-width-container bg-accent pl-5 pr-5">
				<div class="container-fluid">
					<div class="row w3-hide-small w3-hide-medium">
						<div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 col-12">
							<h2 class="text-center">Services</h2>
							<div class="row" >
								<?php
								$sql ="SELECT * FROM `pag_dtl01`,pag_mst01 WHERE PAD_PACD=PAM_PACD AND PAD_PACD=9 AND PAD_CANC=0";
								$query=mysqli_query($conn,$sql);
								while($pageData=mysqli_fetch_array($query))
								{ 
									?>
									<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
										<div class="service-box1 bg-body text-center" >
											<p class="align-center">
												<i class="fa fa-edit text-success float-right" onclick="parent.location='<?= $siteurl ;?>admin/services.php?page_id=9&editid=<?= $pageData['PAD_PGCD'];?>';" style="font-size: 25px; margin-top: -20px;"></i>
											</p>
											<img src="<?= $siteurl ;?>admin/uploadimage/<?php echo $pageData['PAD_IMG'];?>" alt="service" class="img-fluid" style="height: 114px; width: 200px;" >
											<h3 class="title-medium-dark mb-none"><a href="<?= $siteurl ;?>single-service.php?id=<?php echo  base64_encode($pageData['PAD_PGCD']);?>"><?php echo $pageData['PAD_TITL'];?></a></h3>
											<div class="view"><?php echo  substr($pageData['PAD_DESC'],0,10);?></div>
										</div>
									</div>
									<?php 
								} 
								?>
								<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
									<div class="service-box1 bg-body text-center"  onclick="parent.location='<?= $siteurl ;?>admin/services.php?page_id=9';" style="height: 281px;">
										<i class="fa fa-plus text-info float-left" onclick="parent.location='<?= $siteurl ;?>dmin/services.php?page_id=9';" style="font-size: 50px; margin-top:70px;margin-left: 85px;"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 col-12 pl-0">
						  
						</div>
					</div>
				</div>
			</section>
			-->

    <!--
			<section class="service-layout1 bg-accent">
				<div class="container">
					<h2 class="text-center">Services</h2>
					<div class="row">
						<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
							<div class="service-box1 bg-body text-center">
								<img src="admin/uploadimage/innovacion-ti-espana-reasonwhy.es_.png" alt="service" class="img-fluid" style="height: 114px; width: 200px;">
								<h3 class="title-medium-dark mb-none"><a href="single-service.php?id=NjA=">Mirror Log Scale</a></h3>
								<div class="view"><p>Dorem i</div>
							</div>
						</div>
						
						<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
							<div class="service-box1 bg-body text-center">
								<img src="admin/uploadimage/post-4.jpg" alt="service" class="img-fluid" style="height: 114px; width: 200px;">
								<h3 class="title-medium-dark mb-none"><a href="single-service.php?id=NjE=">Annual function 1</a></h3>
								<div class="view"><p>Dorem i</div>
							</div>
						</div>
						
						<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
							<div class="service-box1 bg-body text-center">
								<img src="admin/uploadimage/post-5.jpg" alt="service" class="img-fluid" style="height: 114px; width: 200px;">
								<h3 class="title-medium-dark mb-none"><a href="single-service.php?id=NjM=">Mirror Log Scale </a></h3>
								<div class="view"><p>Dorem i</div>
							</div>
						</div>
						
						<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
							<div class="service-box1 bg-body text-center">
								<img src="admin/uploadimage/post-6.jpg" alt="service" class="img-fluid" style="height: 114px; width: 200px;">
								<h3 class="title-medium-dark mb-none"><a href="single-service.php?id=NjQ=">catgory1</a></h3>
								<div class="view"><p>Dorem i</div>
							</div>
						</div>
						
						<div class="col-lg-3 col-md-6 col-sm-6 col-12 item-mb">
							<div class="service-box1 bg-body text-center">
								<img src="admin/uploadimage/post-7.jpg" alt="service" class="img-fluid" style="height: 114px; width: 200px;">
								<h3 class="title-medium-dark mb-none"><a href="single-service.php?id=NjU=">Service category</a></h3>
								<div class="view"><p>Dorem i</div>
							</div>
						</div>				
					</div>
				</div>
			</section>
			-->
    <!-- Service Area End Here -->


    <!-- Counter Area Start Here -->
    <?php
				$asql = "SELECT * FROM `adv_banner` ORDER BY id DESC LIMIT 1";
				$aquery =mysqli_query($conn,$asql);
				$arows =mysqli_fetch_assoc($aquery );
			?>

    <p class="align-center">
        <i class="fa fa-edit text-success float-right"
            onclick="parent.location='<?= $siteurl ;?>admin/advt_banner.php?editid=<?= $arows['id'];?>';"
            style="font-size: 25px; margin-top:44px;margin-right: 9px;"></i><br>
        <i class="fa fa-plus text-info float-right" onclick="parent.location='<?= $siteurl ;?>admin/advt_banner.php';"
            style="font-size: 25px; margin-top:50px;margin-right: -22px;"></i>
    </p>

    <section class="overlay-default s-space-equal overflow-hidden pl-5 pr-5"
        style="background-image: url('admin/uploadimage/pnggrad16rgb.png');margin-left:3rem; margin-right:3rem">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                        <div>
                            <img src="../../img/banner/counter1.png" alt="counter" class="img-fluid mb20-auto--md">
                        </div>
                        <div>
                            <div class="counter counter-title mt-4" data-num="00">1,00,000</div>
                            <h3 class="title-regular-light mt-3">Our Products</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                        <div>
                            <img src="../../img/banner/counter2.png" alt="counter" class="img-fluid mb20-auto--md">
                        </div>
                        <div>
                            <div class="counter counter-title mt-4" data-num="00">5,00,000</div>
                            <h3 class="title-regular-light mt-3">Our Happy Buyers</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-12">
                    <div class="d-md-flex justify-md-content-center counter-box text-center--md">
                        <div>
                            <img src="../../img/banner/counter3.png" alt="counter" class="img-fluid mb20-auto--md">
                        </div>
                        <div>
                            <div class="counter counter-title mt-4" data-num="00">2,00,000</div>
                            <h3 class="title-regular-light mt-3">Verified Users</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Counter Area End Here -->

    <!-- Subscribe Area Start Here -->
    <section class="bg-body s-space full-width-border-top pl-5 pr-5">
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

    <section class="bg-body full-width-border-top pl-5 pr-5 pb-1"></section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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


    <!-- Footer Area Start Here -->
    <footer>
        <div class="footer-area-top s-space-equal"
            style="background-color:<?= ($settings['footer_bgcolor'])?$settings['footer_bgcolor']:""?>;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg"
                                style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;">Quick
                                Links</h3>
                            <ul class="useful-link">
                                <?php
            							$sql="SELECT * FROM `pag_mst01` WHERE PAM_CANC=0 AND PAM_ORDER IN(1,2,3,4) ORDER BY PAM_ORDER ASC";
            							$query_row=get__data($sql);
            							foreach($query_row as $prow)
            							{
            								?>
                                <li><a href="<?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>"
                                        style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;"><?= $prow['PAM_PANM'];?></a>
                                </li>
                                <?php 
            							} 
            							?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg"
                                style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;">Privacy
                                Policy</h3>
                            <ul class="useful-link">
                                <?php
            								$sql="SELECT * FROM `pag_mst01` WHERE PAM_CANC=0 AND PAM_ORDER IN(6) ORDER BY PAM_ORDER ASC";
            								$query_row=get__data($sql);
            								foreach($query_row as $prow){
            
            							?>
                                <li><a href="<?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>"
                                        style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;"><?= $prow['PAM_PANM'];?></a>
                                </li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg"
                                style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;">Help &amp;
                                Support</h3>
                            <ul class="useful-link">
                                <?php
            								$sql="SELECT * FROM `pag_mst01` WHERE PAM_CANC=0 AND PAM_ORDER IN(5) ORDER BY PAM_ORDER ASC";
            								$query_row=get__data($sql);
            								foreach($query_row as $prow){
            
            							?>
                                <li><a href="<?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>"
                                        style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;"><?= $prow['PAM_PANM'];?></a>
                                </li>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>


                    <?php 
				                $sql = "SELECT * FROM `org_mst01` ";//14 
			                   	$result = mysqli_query($conn, $sql);
			                 	$row = mysqli_fetch_assoc($result);
		                     	?>

                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="footer-box">
                            <h3 class="title-medium-light title-bar-left size-lg"
                                style="color:<?= ($settings['footer_color'])?$settings['footer_color']:""?>;">Follow Us
                                On</h3>
                            <ul class="folow-us">
                                <li>
                                    <a href="<?php echo $row['ORM_GP']; ?>">
                                        <img src="../../img/footer/follow1.jpg" alt="follow">
                                    </a>
                                </li>
                            </ul>

                            <ul class="social-link">
                                <li class="fa-classipost">
                                    <a href="<?php echo $row['ORM_FB']; ?>">
                                        <img src="../../img/footer/facebook.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="tw-classipost">
                                    <a href="<?php echo $row['ORM_TW']; ?>">
                                        <img src="../../img/footer/twitter.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="yo-classipost">
                                    <a href="<?php echo $row['ORM_YT']; ?>">
                                        <img src="../../img/footer/youtube.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="pi-classipost">
                                    <a href="<?php echo $row['ORM_PT']; ?>">
                                        <img src="../../img/footer/pinterest.jpg" alt="social">
                                    </a>
                                </li>
                                <li class="li-classipost">
                                    <a href="<?php echo $row['ORM_LI']; ?>">
                                        <img src="../../img/footer/linkedin.jpg" alt="social">
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
                        <p>Copyright © <?php echo $row['ORM_NAME'];?> <?= date('Y');?></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-12 text-right text-center-mb">
                        <ul>
                            <li>
                                <img src="../../img/footer/card1.jpg" alt="card">
                            </li>
                            <li>
                                <img src="../../img/footer/card2.jpg" alt="card">
                            </li>
                            <li>
                                <img src="../../img/footer/card3.jpg" alt="card">
                            </li>
                            <li>
                                <img src="../../img/footer/card4.jpg" alt="card">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End Here -->
    </div>

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
                        <h2 class="item-danger"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>There's
                            Something Wrong With This Ads?</h2>
                    </div>
                    <div class="gradient-padding reduce-padding">
                        <form id="report-abuse-form">
                            <div class="form-group">
                                <label class="control-label" for="first-name">Your E-mail</label>
                                <input type="text" id="first-name" class="form-control"
                                    placeholder="Type your mail here ...">
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="control-label" for="first-name">Your Reason</label>
                                    <textarea placeholder="Type your reason..." class="textarea form-control"
                                        name="message" id="form-message" rows="7" cols="20"
                                        data-error="Message field is required" required></textarea>
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
    <!-- Report Abuse Modal End-->

    <script>
    //alert(document.URL);https://ommsculpture.com/admin/banner.php?page_id=12
    var currentLocation = document.URL;
    var currentpath = window.location.pathname;
    var host = window.location.hostname;
    var url = 'http://ommsculpture.com/admin/banner.php?page_id=12';

    function editBanner() {
        console.log(url);
        //window.location.replace('https://ommsculpture.com/admin/banner.php?page_id=12');
        window.history.pushState(url);
    }
    </script>

    <!-- jquery-->
    <script src="http://www.ommsculpture.com/js/jquery-2.2.4.min.js "></script>
    <!-- Popper js -->
    <script src="http://www.ommsculpture.com/js/popper.js"></script>
    <!-- Bootstrap js -->
    <script src="http://www.ommsculpture.com/js/bootstrap.min.js "></script>
    <!-- Owl Cauosel JS -->
    <script src="http://www.ommsculpture.com/vendor/OwlCarousel/owl.carousel.min.js "></script>
    <!-- Meanmenu Js -->
    <script src="http://www.ommsculpture.com/js/jquery.meanmenu.min.js "></script>
    <!-- Srollup js -->
    <script src="http://www.ommsculpture.com/js/jquery.scrollUp.min.js "></script>
    <!-- jquery.counterup js -->
    <script src="http://www.ommsculpture.com/js/jquery.counterup.min.js"></script>
    <script src="http://www.ommsculpture.com/js/waypoints.min.js"></script>
    <!-- Select2 Js -->
    <script src="http://www.ommsculpture.com/js/select2.min.js"></script>
    <!-- Isotope js -->
    <script src="http://www.ommsculpture.com/js/isotope.pkgd.min.js"></script>
    <!-- Magnific Popup -->
    <script src="http://www.ommsculpture.com/js/jquery.magnific-popup.min.js"></script>
    <!-- Custom Js -->
    <script src="http://www.ommsculpture.com/js/main.js"></script>

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

</body>

</html>