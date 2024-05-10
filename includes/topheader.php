<?php
	include "database.php";
	$sql="SELECT * FROM `org_mst01` ";
	$row=getdata($sql);
	
	$ssql = "SELECT * FROM `general_setting`";
	$settings =getdata($ssql);
?>

<!doctype html>
<html class="no-js" lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title><?php echo $row['ORM_NAME'];?></title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="admin/uploadimage/<?php echo $row['ORM_LOGO']; ?>">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<!-- Animate CSS -->
		<link rel="stylesheet" href="css/animate.min.css">
		<!-- Font-awesome CSS-->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Owl Caousel CSS -->
		<link rel="stylesheet" href="vendor/OwlCarousel/owl.carousel.min.css">
		<link rel="stylesheet" href="vendor/OwlCarousel/owl.theme.default.min.css">
		<!-- Main Menu CSS -->
		<link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- Select2 CSS -->
		<link rel="stylesheet" href="css/select2.min.css">
		<!-- Magnific CSS -->
		<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
		<!-- Custom CSS -->
		<link rel="stylesheet" href="style.css">
	</head>
</html>