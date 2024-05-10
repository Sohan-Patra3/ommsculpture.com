<?php  
	include '../includes/database.php';
	include 'includes/functions.php';
 	$org_id=$_SESSION["id"];

	if($_POST['type'] ==1){
	 	 $delit_id=$_POST['id'];
	 	$sql = "UPDATE  `category_mst` SET `status`=0 WHERE category_id = $delit_id";
		if (mysqli_query($conn, $sql)) {
		echo json_encode(array("statusCode"=>200));
		} 
		else {
		echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($conn);
	}

	
?>