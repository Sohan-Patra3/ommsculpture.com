<?php
include '../includes/database.php';
include 'includes/functions.php';
 $org_id=$_SESSION["id"];
	//$org_id =$_GET['del'];
	$img_gallery_id =$_GET['imgId'];
    $sql = "DELETE FROM `gal_dtl01` WHERE GAD_GACD =$img_gallery_id AND GAD_ORCD = $org_id";
	if (mysqli_query($conn, $sql)) {
		header("Location:img_gallery.php?status=203");
	} 
	else {
		echo "Error :".mysqli_error();
	}
	mysqli_close($conn);
		

/* $post_id =$_GET['del'];
    $imgId =$_GET['imgId'];
	$catid=$_GET['catid'];
	$query ="SELECT post_id,id,image FROM `category_images` WHERE post_id ='".$post_id."' and id='".$imgId."'";
	$res_query =mysqli_query($conn, $query);
	$row=mysqli_fetch_assoc($res_query);
	$folderName=$row['post_id'].'/';
	 $imagename =$row['image'];
	 $folder ='uploads/';
	$path= $folder.$folderName.$imagename;
	
	
	 if(file_exists($path)){
		unlink($path);
		mysqli_query($conn,"DELETE FROM `category_images` WHERE id=$imgId");
		header("Location:business_details.php?id=$post_id&status=203&catid=$catid");
	}else{
		die('file does not exist');
	}   */
?>
