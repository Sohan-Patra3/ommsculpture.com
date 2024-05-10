<?php
include '../includes/database.php';
include 'includes/functions.php';
$id					=$_POST['id'];
$pageid				=$_POST['pageid'];
$org_id 			=$_SESSION["id"];
$service 			=$_SESSION["service"];
$sub_service 			=$_SESSION["sub_service"];
//Top Bar
$service 	=mysqli_real_escape_string($conn,$_POST['service']);
$sub_service	=mysqli_real_escape_string($conn,$_POST['sub_service']);

    $sql1 ="UPDATE `pag_mst01` SET PAM_PANM='$service' WHERE PAM_PACD=14";	
	if (mysqli_query($conn, $sql1)) {
		//echo "Data Insert successfully";
		
	}
	$sql ="UPDATE `pag_mst01` SET PAM_PANM='$sub_service' WHERE PAM_PACD=9";	
	if (mysqli_query($conn, $sql)) {
		//echo "Data Insert successfully";
		
	}
	header("Location: menu_setting.php?status=200 &page_id=$pageid");

?>