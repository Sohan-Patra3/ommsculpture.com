<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	
	$org_id=$_SESSION["id"];
 
	$img_cat=$_POST['img_cat'];
	$id=$_POST['id'];
	$page_id=$_POST["page_id"];
	$image = $_FILES['file']['name'];

	$output_dir = "uploadimage/";
	$imageName = date("Y.m.d").time().'.png';

	if (!file_exists($output_dir . $org_id))
	{
		@mkdir($output_dir . $org_id, 0777);
	}
	$success = move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir.$org_id.'/'. $imageName);
	//if everything was ok send back an json response
	
	if($success != false)
	{
		$sql = "INSERT INTO `gal_dtl01`(`GAD_ORCD`, `GAD_CACD`, `GAD_IMG`, `GAD_STAT`, `GAD_CANC`) VALUES ($org_id,$img_cat,'".$imageName."',1,0)";
		$result =mysqli_query($conn, $sql);
		echo json_encode(array("success"=>true,"status"=>200));
	}
	else
	{
		echo json_encode(array("success"=>false,"Error"=>mysqli_error($conn)));
	}
	mysqli_close($conn); 
?>