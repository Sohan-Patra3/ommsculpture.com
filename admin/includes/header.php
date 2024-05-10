<?php
	include '../includes/database.php';

	//$siteurl="http://172.16.16.207/ommsculpture.com/";
	
    $siteurl="https://ommsculpture.com/";
    
	if(empty($_SESSION['id']))
	{
		header("location:index.php");
		exit();
	}
	
	$sql = "SELECT * FROM `org_mst01`";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$ssql = "SELECT * FROM `general_setting`";
	$sresult = mysqli_query($conn, $ssql);
	$settings = mysqli_fetch_assoc($sresult);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<title><?php echo $row['ORM_NAME'];?></title>
		<!-- Custom fonts for this template-->
		<link rel="icon" href="uploadimage/<?php echo $row['ORM_LOGO'];?>" type="image/gif" sizes="16x16">
		<link rel="stylesheet" href="<?= $siteurl;?>admin/plugin/bootstrap.min.css">
		<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<!-- Custom styles for this template-->
		<link href="css/sb-admin-2.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>admin/plugin/data-table/jquery.dataTables.min.css">
		<link rel="stylesheet" href="<?php echo $siteurl;?>admin/plugin/data-table/buttons.dataTables.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $siteurl;?>admin/plugin/data-table/select.dataTables.min.css"/> 

		<!-- image crop  -->
		<script type="text/javascript" charset="utf8" src="<?= $siteurl;?>admin/plugin/jquery.min.js"></script>
		<!-- <link rel="stylesheet" href="<?= $siteurl;?>admin/plugin/jquery.Jcrop.css" type="text/css" />
		<script src="<?php echo $siteurl;?>admin/plugin/jquery.Jcrop.min.js"></script> -->
		<!-- image crop  -->
		<!-- image crop Autoselected -->
		<link rel="stylesheet" href="<?= $siteurl;?>admin/plugin/crop-select-js.min.css" type="text/css" />
		<!-- image crop Autoselected -->

		<?php 
		if(isset($_GET['page_id']) == null)
		{
			?>
			<script type="text/javascript" charset="utf8" src="<?php echo $siteurl;?>admin/plugin/data-table/jquery.dataTables.min.js"></script>
			<script type="text/javascript" src="<?php echo $siteurl;?>admin/plugin/data-table/dataTables.buttons.min.js"></script>
			<script type="text/javascript" src="<?php echo $siteurl;?>admin/plugin/data-table/buttons.flash.min.js"></script>
			<script type="text/javascript" src="<?php echo $siteurl;?>admin/plugin/data-table/jszip.min.js"></script>
			<script type="text/javascript" src="<?php echo $siteurl;?>admin/plugin/data-table/pdfmake.min.js"></script>
			<script type="text/javascript" src="<?php echo $siteurl;?>admin/plugin/data-table/vfs_fonts.js"></script>
			<script type="text/javascript" src="<?php echo $siteurl;?>admin/plugin/data-table/buttons.html5.min.js"></script>
			<script type="text/javascript" src="<?php echo $siteurl;?>admin/plugin/data-table/buttons.print.min.js"></script>
			<script type="text/javascript" src="<?php echo $siteurl;?>admin/plugin/data-table/dataTables.select.min.js"></script>
			<?php 
		} 
		?>
	</head>

	<body id="page-top">
		<!-- Page Wrapper -->
		<div id="wrapper">
			<!-- Sidebar -->
			<ul class="navbar-nav <?= ($settings['adminmenu_bgcolor'])?$settings['adminmenu_bgcolor']:"bg-gradient-primary"?> sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:<?= ($settings['adminmenu_bgcolor'])?$settings['adminmenu_bgcolor']:""?>;">
				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
					<div class="sidebar-brand-icon rotate-n-0 ml-n5">
						<img class="img-profile " src="uploadimage/<?php echo $row['ORM_LOGO'];?>" style="height:<?= ($settings['logo_height'])?$settings['logo_height']:""?>;width:<?= ($settings['logo_width'])?$settings['logo_width']:""?>;">
					</div>
					<!--<div class="sidebar-brand-text mx-3"><?php echo $row['ORM_NAME'];?> <sup><?php echo $row['ORM_DMNM'];?></sup></div>-->
				</a>

				<!-- Divider -->
				<hr class="sidebar-divider my-0">

				<!-- Nav Item - Dashboard -->
				<li class="nav-item active">
					<a class="nav-link" href="dashboard.php">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span style="color:<?= ($settings['adminmenu_color'])?$settings['adminmenu_color']:""?>;">Dashboard</span></a>
				</li>

				<!-- Divider -->
				<hr class="sidebar-divider">

				<!-- Heading 
				<div class="sidebar-heading">#4e73df
					Interface
				</div>-->

				<!-- Nav Item - Pages Collapse Menu -->
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span style="color:<?= ($settings['adminmenu_color'])?$settings['adminmenu_color']:""?>;">Page Setup</span>
					</a>
					<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<?php
							//OR PAM_STAT=0
							$sql = "SELECT `PAM_PACD`, `PAM_PANM`, `PAM_LINK`, `PAM_STAT`, `PAM_CANC` 
							FROM `pag_mst01` WHERE PAM_STAT=1 and PAM_CANC=0 order by PAM_ORDER";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_assoc($result)) 
							{
								?>
								<a class="collapse-item" href="<?php echo $row['PAM_LINK']; ?>?page_id=<?php echo $row['PAM_PACD']; ?>"><?php echo $row['PAM_PANM']; ?></a>
								<?php
							}
							?>
						</div>
					</div>
				</li>

				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span style="color:<?= ($settings['adminmenu_color'])?$settings['adminmenu_color']:""?>;">Master Setup</span>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<?php
							//OR PAM_STAT=0
							$sql = "SELECT `PAM_PACD`, `PAM_PANM`, `PAM_LINK`, `PAM_STAT`, `PAM_CANC` 
							FROM `pag_mst01` WHERE PAM_STAT=4 and PAM_CANC=0 order by PAM_ORDER";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_assoc($result)) 
							{
								?>
								<a class="collapse-item" href="<?php echo $row['PAM_LINK']; ?>?page_id=<?php echo $row['PAM_PACD']; ?>"><?php echo $row['PAM_PANM']; ?></a>
								<?php
							}
							?>
						</div>
					</div>
				</li>
				
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span style="color:<?= ($settings['adminmenu_color'])?$settings['adminmenu_color']:""?>;">Upload Image</span>
					</a>
					<div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<?php
							$sql = "SELECT `PAM_PACD`, `PAM_PANM`, `PAM_LINK`, `PAM_STAT`, `PAM_CANC` FROM `pag_mst01` WHERE PAM_STAT=2 and PAM_CANC=0 order by PAM_ORDER";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_assoc($result)) 
							{
								?>
								<a class="collapse-item" href="<?php echo $row['PAM_LINK']; ?>?page_id=<?php echo $row['PAM_PACD']; ?>"><?php echo $row['PAM_PANM']; ?></a>
								<?php
							}
							?>
						
						</div>
					</div>
				</li>
		  
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span style="color:<?= ($settings['adminmenu_color'])?$settings['adminmenu_color']:""?>;">Settings</span>
					</a>
					<div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<?php
							$sql = "SELECT `PAM_PACD`, `PAM_PANM`, `PAM_LINK`, `PAM_STAT`, `PAM_CANC` FROM `pag_mst01` WHERE PAM_STAT=0 and PAM_CANC=0 order by PAM_ORDER";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_assoc($result)) 
							{ 
								?>
								<a class="collapse-item" href="<?php echo $row['PAM_LINK']; ?>?page_id=<?php echo $row['PAM_PACD']; ?>"><?php echo $row['PAM_PANM']; ?></a>
								<?php
							}
							?>
							<!--<a class="collapse-item" href="advt_banner.php">Advertise Banner</a>-->
						</div>
					</div>
				</li>
				
				<li class="nav-item"><a href="contact_inquiry.php"  class="nav-link collapsed">  <i class="fas fa-fw fa-users"></i>Inquiry</a></li>
			</ul>
			<!-- End of Sidebar -->

			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
				<!-- Main Content -->
				<div id="content">
					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light <?= ($settings['adminheader_bgcolor'])?$settings['adminheader_bgcolor']:"bg-white"?> topbar mb-4 static-top shadow" style="background-color:<?= ($settings['adminheader_bgcolor'])?$settings['adminheader_bgcolor']:""?>;">
						<!-- Sidebar Toggle (Topbar) -->
						<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
							<i class="fa fa-bars"></i>
						</button>

						<!-- Topbar Search 
						<form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
							<div class="input-group">
								<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
								<div class="input-group-append">
									<button class="btn btn-primary" type="button">
										<i class="fas fa-search fa-sm"></i>
									</button>
								</div>
							</div>
						</form>
						-->
						
						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">
							<!-- Nav Item - Search Dropdown (Visible Only XS) -->
							<li class="nav-item dropdown no-arrow d-sm-none">
								<a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-search fa-fw"></i>
								</a>
								<!-- Dropdown - Messages -->
								<div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
									<form class="form-inline mr-auto w-100 navbar-search">
										<div class="input-group">
											<input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
											<div class="input-group-append">
												<button class="btn btn-primary" type="button">
												<i class="fas fa-search fa-sm"></i>
												</button>
											</div>
										</div>
									</form>
								</div>
							</li>

							<div class="topbar-divider d-none d-sm-block"></div>
							<?php 
							$sql = "SELECT * FROM `org_mst01`";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
							?>
							<!-- Nav Item - User Information -->
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline <?= ($settings['adminmenu_color'])?'text-gray-600':"text-gray-600"?> small" style="color:<?= ($settings['adminmenu_color'])?$settings['adminmenu_color']:""?>;">Admin</span>
									<img class="img-profile rounded-circle" src="uploadimage/<?php echo $row['ORM_PROF'] ;?>" >
								</a>
								<!-- Dropdown - User Information -->
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<a class="dropdown-item" href="my-account.php">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										My Account
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							</li>
						</ul>
					</nav>
					<!-- End of Topbar -->