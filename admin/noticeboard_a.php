<?php
include '../includes/database.php';
include 'includes/functions.php';
 $org_id=$_SESSION["id"];
 $link=$_POST['link'];
 $title=mysqli_real_escape_string($conn,$_POST['title']);
 $service_photo=$_FILES['photo'];
 $oldimg=$_POST['oldimg'];
 $edit_id=$_POST['id'];
 $page_id=$_POST["page_id"];

$photo =insertFiles($service_photo,$oldimg );

if(isset($_POST['submit'])){
	if($edit_id ==''){
		$sql = "INSERT INTO `pag_dtl01`(`PAD_PACD`, `PAD_ORCD`, `PAD_TITL`, `PAD_DESC`, `PAD_IMG`, `PAD_API`, `PAD_ADSO`, `PAD_ADST`, `PAD_MAIL`, `PAD_PHN`, `PAD_STAT`, `PAD_CANC`) VALUES ($page_id,$org_id,'".$title."','".$link."','".$photo."','','','','','',1,0)";
		if (mysqli_query($conn, $sql)) {
			echo "Data Insert successfully";
			header("Location: noticeboard.php?page_id=$page_id&status=200");
			//header('Location: about-view.php');
		} 
		else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
	}else{
		$sql = "UPDATE `pag_dtl01` SET `PAD_PACD`='".$page_id."',`PAD_ORCD`='" . $org_id . "',`PAD_TITL`='" . $title . "',`PAD_DESC`='" . $link . "',`PAD_IMG`='". $photo."',`PAD_API`='',`PAD_ADSO`='',`PAD_ADST`='',`PAD_MAIL`='',`PAD_PHN`='',`PAD_STAT`=1,`PAD_CANC`=0 WHERE PAD_PGCD = $edit_id ";
		if (mysqli_query($conn, $sql)) {
			echo "Data Updated successfully";
			header("Location: noticeboard.php?page_id=$page_id&status=201");
		}else {
	
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
		}
}

if(isset($_GET['delitid'])){
	$delitid =$_GET['delitid'];
	$sql="DELETE FROM `pag_dtl01` WHERE PAD_PGCD =$delitid";
	if(mysqli_query($conn,$sql)){
		header("Location: noticeboard.php?page_id=$page_id&status=203");
	}else{
		header("Location: noticeboard.php?page_id=$page_id&status=300");
	}
}
	
?>
