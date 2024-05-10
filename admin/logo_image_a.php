<?php
error_reporting(0);
include '../includes/database.php';
include 'includes/functions.php';


 if(isset($_POST['submit'])){
	$logo =$_POST['logo'];
 	$admin =$_POST['admin'];
	if($logo ==1){
		$logoImage =$_FILES['photo'];
		$updateId =$_POST['logo_id'];
		$OldlogoImage =$_POST['old_logo_img'];
		$photo =insertphoto($logoImage,$OldlogoImage );
		
		$sql = "UPDATE `org_mst01` SET `ORM_LOGO`='".$photo."' WHERE  ORM_ORCD='" . $updateId . "'";
		if (mysqli_query($conn, $sql)) {
			header("Location: my-account.php?status=202");
		} 
		else {
			header("Location: my-account.php?status=203");
		}
	}else{
		$adminImage =$_FILES['admin_photo'];
		$adminId =$_POST['id'];
		$OldadminImage =$_POST['old_admin_img'];
		$image =insertphoto($adminImage,$OldadminImage );
		
		$sql = "UPDATE `org_mst01` SET `ORM_PROF`='".$image."' WHERE  ORM_ORCD='" . $adminId . "'";
		if (mysqli_query($conn, $sql)) {
			header("Location: my-account.php?status=204");
		} 
		else {
			header("Location: my-account.php?status=205");
		}
	}
 	
	mysqli_close($conn);
 }

 if(isset($_POST['update'])){
	$logo =$_POST['logo'];
 	$admin =$_POST['admin'];
	if($logo ==1){
		$logoImage =$_FILES['photo'];
		$updateId =$_POST['logo_id'];
		$OldlogoImage =$_POST['old_logo_img'];
		$photo =insertphoto($logoImage,$OldlogoImage );
		
		$sql = "UPDATE `org_mst01` SET `ORM_LOGO`='".$photo."' WHERE  ORM_ORCD='" . $updateId . "'";
		if (mysqli_query($conn, $sql)) {
			header("Location: my-account.php?status=202");
		} 
		else {
			header("Location: my-account.php?status=203");
		}
	}else{
		$adminImage =$_FILES['admin_photo'];
		$adminId =$_POST['id'];
		$OldadminImage =$_POST['old_admin_img'];
		$image =insertphoto($adminImage,$OldadminImage );
		
		$sql = "UPDATE `org_mst01` SET `ORM_PROF`='".$image."' WHERE  ORM_ORCD='" . $adminId . "'";
		if (mysqli_query($conn, $sql)) {
			header("Location: my-account.php?status=204");
		} 
		else {
			header("Location: my-account.php?status=205");
		}
	}
 	
	mysqli_close($conn);
 }
 
 
if($_POST['type'] ==1){
	$old_psw =$_POST['postpsw'];
	$id =$_POST['postid'];

	$sql1 ="SELECT * FROM org_mst01 WHERE ORM_PASS='$old_psw' and ORM_ORCD = '".$id."' ";
	$result  = mysqli_query($conn, $sql1);
	$row = mysqli_num_rows($result);
	if($row >0){
		echo 1 ;
	}else{
		echo 2;
	}
}

if($_POST['type'] ==2){
	$change_psw =$_POST['postCNFpsw'];
	$UPDATE_id =$_POST['postid'];

	$sql ="UPDATE `org_mst01` SET `ORM_PASS`='".$change_psw."' WHERE  ORM_ORCD='" . $UPDATE_id . "'";
	//$result  = mysqli_query($conn, $sql1);
	if (mysqli_query($conn, $sql)) {
		echo "Successfully Update your password";
	} 
	else {
		echo "Error occured ! try again";
	}
	mysqli_close($conn);
}
if($_POST['type'] ==5){
	 $facebook		=mysqli_real_escape_string($conn,$_POST['facebook']);
	 $twitter		=mysqli_real_escape_string($conn,$_POST['twitter']);
	 $youtube		=mysqli_real_escape_string($conn,$_POST['youtube']);
	 $pinterest		=mysqli_real_escape_string($conn,$_POST['pinterest']);
	 $linkedin		=mysqli_real_escape_string($conn,$_POST['linkedin']);
	 $google_play	=mysqli_real_escape_string($conn,$_POST['google_play']);
     $UPDATE_id 		=$_POST['postid'];
	$sql ="UPDATE `org_mst01` SET `ORM_FB`='".$facebook."', `ORM_TW`='".$twitter."', `ORM_YT`='".$youtube."', `ORM_PT`='".$pinterest."', `ORM_LI`='".$linkedin."', `ORM_GP`='".$google_play."' WHERE  ORM_ORCD=$UPDATE_id ";
	//$result  = mysqli_query($conn, $sql1);
	if (mysqli_query($conn, $sql)) {
		echo "Successfully Update your password";
	} 
	else {
		echo "Error occured ! try again";
	}
	mysqli_close($conn);
}


?>