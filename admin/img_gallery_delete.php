<?php
include '../includes/database.php';
include 'includes/functions.php';
 $org_id=$_SESSION["id"];
 
if($_POST['type'] == 1){
	$img_gallery_id = $_POST['id'];
	$sql = "DELETE FROM `gal_dtl01` WHERE GAD_GACD =$img_gallery_id";
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
	} 
	else {
		echo json_encode(array("statusCode"=>201));
	}
	mysqli_close($conn);
		
}
?>