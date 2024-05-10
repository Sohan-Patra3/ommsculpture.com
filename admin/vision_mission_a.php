<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	 $org_id=$_SESSION["id"];
	 $data=mysqli_real_escape_string($conn,$_POST['data']);
	 $title=$_POST['title'];
	 $a_photo=$_FILES['photo'];
	 $oldimg=$_POST['oldimg'];
	 $page_id=$_POST["page_id"];
	 $id=$_POST['id'];
	 $photo =insertphoto($a_photo,$oldimg );
	// echo '<pre>';
 //  	print_r($a_photo);die();

	if(isset($_POST['submit'])){
		$sql = "SELECT * FROM `pag_dtl01` where PAD_PACD=$page_id and PAD_ORCD=$org_id";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 0) {
			//$photo =insertphoto($vm_photo,$oldimg);
			$sql = "INSERT INTO `pag_dtl01`(`PAD_PACD`, `PAD_ORCD`,`PAD_TITL`, `PAD_DESC`, `PAD_IMG`, `PAD_STAT`, `PAD_CANC`) VALUES ($page_id,$org_id,'".$title."','".$data."','".$photo."',1,0)";
			if (mysqli_query($conn, $sql)) {
			echo "Data Insert successfully";
			header("Location: vision_mission.php?page_id=$page_id&status=200");
			//header("Location: vision_mission-view.php?id=$page_id&status=200");
			//header('Location: about-view.php');
			}else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}else{
			$sql = "UPDATE pag_dtl01 set PAD_ORCD='" . $org_id . "',PAD_TITL='" . $title . "', PAD_DESC='" . $data . "', PAD_IMG='". $photo."', PAD_STAT='1' ,PAD_CANC='0' WHERE PAD_PACD='" . $id . "'";
			if (mysqli_query($conn, $sql)) {
				echo "Data Updated successfully";
				header("Location: vision_mission.php?page_id=$page_id&status=201");
			}else {
			
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
	/*
	if(isset($_POST['update'])){
		
		// $photo =updatephoto($a_photo, $oldimg );
			$sql = "UPDATE pag_dtl01 set PAD_ORCD='" . $org_id . "', PAD_DESC='" . $data . "', PAD_IMG='". $photo."', PAD_STAT='1' ,PAD_CANC='0' WHERE PAD_PACD='" . $id . "'";
			if (mysqli_query($conn, $sql)) {
				echo "Data Updated successfully";
				header('Location: vision_mission-view.php?id='.$page_id);
			}else {
			
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
		mysqli_close($conn);
	}*/
?>
