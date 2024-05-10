<head>
	<body>
		<?php
			/*
			include "database.php";
			$sql="SELECT * FROM `org_mst01` ";
			$query=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($query);
			
			$ssql = "SELECT * FROM `general_setting`";
			$sresult = mysqli_query($conn, $ssql);
			$settings = mysqli_fetch_assoc($sresult);
			*/
			
			//print_r($settings);
		?>
		
		<!--<div id="preloader"></div>-->
		<!-- Preloader End Here -->
		<div id="wrapper">
			<!-- Header Area Start Here -->
			<header>
				<div id="header-three" class="header-style3 header-fixed bg-body">
					<div class="header-top-bar top-bar-style3 w3-hide-small bg-dark" style="background-color:<?= ($settings['topbar_bgcolor'])?$settings['topbar_bgcolor']:""?>;display:flex; justify-content:center;">
						<div class="container">
							<div class="row no-gutters">
								<div class="col-lg-6 col-md-6 col-sm-6 col-6">
									<div class="top-bar-left mx-5">
										<p class="d-none d-lg-block" style="color:<?= ($settings['topbar_color'])?$settings['topbar_color']:""?>;font-size:<?=  ($settings['topbar_fontsize'])?$settings['topbar_fontsize']:""?>;font-family:<?=  ($settings['topbar_fontfamily'])?$settings['topbar_fontfamily']:""?>;">
											<i class="fa fa-life-ring" aria-hidden="true"></i>Have Any Query? +91 <?php echo $row['ORM_CONO']; ?> or <?php echo $row['ORM_MAIL']; ?>
										</p>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-6">								  
								</div>
							</div>
						</div>
					</div>
					
					<div class="main-menu-area" id="sticker" style="background-color:<?= ($settings['menubar_bgcolor'])?$settings['menubar_bgcolor']:""?>;">
						<div class="container">
							<div class="row no-gutters d-flex align-items-center">
								<div class="col-lg-2 col-md-2 col-sm-3">
									<div class="logo-area">
										<a href="index.php" class="img-fluid"><img src="admin/uploadimage/<?php echo $row['ORM_LOGO']; ?>" alt="logo" style="height:<?= ($settings['logo_height'])?$settings['logo_height']:""?>;width:<?= ($settings['logo_width'])?$settings['logo_width']:""?>;"></a>
									</div>
								</div>
								<!--<div class="col-lg-8 col-md-5 col-sm-6 possition-static">-->
									<div class="cp-main-menu">
										<nav>
											<ul><!-- style="color: <?= ($settings['menubar_color'])?$settings['menubar_color']:""?>;font-size:<?= ($settings['menubar_fontsize'])?$settings['menubar_fontsize']:""?>;font-family:<?= ($settings['menubar_fontfamily'])?$settings['menubar_fontfamily']:""?>;"-->
												<li class="active"><a  href="index.php"  ><i class="fa fa-home"></i></a></li>
												<?php
												//AND PAM_ORDER IN(1,2,3,4,6)
												$sql="SELECT * FROM `pag_mst01` WHERE PAM_STAT=3 AND PAM_CANC=0 AND PAM_PACD NOT IN (23) ORDER BY PAM_ORDER ASC";
												$query_row=get__data($sql);
												foreach($query_row as $prow)
												{
													?>
													<li class=""><a href="<?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>"  ><?= $prow['PAM_PANM'];?></a></li>
													<?php 
												} 
												?>
											</ul>   
										</nav>
									</div>
									
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
												<a href="<?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>"  ><?= $prow['PAM_PANM'];?></a>
												<?php 
											}
											?>
                                        </div>
                                    </div>
								<!--</div>-->
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
											<li class="active"><a  href="index.php">Home</a></li>
											<?php
											$sql="SELECT * FROM `pag_mst01` WHERE PAM_CANC=0 AND PAM_ORDER IN(1,2,3,4,5) ORDER BY PAM_ORDER ASC";
											$query_row=get__data($sql);
											foreach($query_row as $prow)
											{
												?>
												<li class="active"><a href="<?= $prow['PAM_LINK'];?>?pageid=<?= base64_encode($prow['PAM_PACD']);?>"><?= $prow['PAM_PANM'];?></a></li>
												<?php 
											} 
											?>										   
										</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
					<hr>
				</div>
				<!-- Mobile Menu Area End -->
			</header>
			<!-- Header Area End Here -->
		</div>
	</body>
</head>