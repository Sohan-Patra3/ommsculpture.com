<?php
include '../includes/database.php';
include 'includes/functions.php';
$org_id=$_SESSION["id"];

$target_dir = "uploadimage/banner/";
//catch the image sent from client
$image 		= $_FILES['file']['name'];
$dip_order	= $_POST['dip_order'];
$pageid 	=$_POST['pageid'];
$editid 	=$_POST['id'];
$oldimg 	=$_POST['oldimg'];

if($editid ==''){
		$duplicatecheck ="SELECT BAM_ORD FROM `banner_mst` WHERE BAM_ORD=$dip_order ";
		$query 		=mysqli_query($conn,$duplicatecheck);
		$rowcount 	=mysqli_num_rows($query);
		if($rowcount >0){
			//header("Location:banner.php?status=300&page_id=$pageid");
		}else{
			$image =$_FILES['file']['name'];
			$imageName = date("Y.m.d").time().'.jpg';

			//putting all the content into a file
			if (!file_exists($target_dir)){
				@mkdir($target_dir, 0777);
			}
			$success = move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir. $imageName);
			//if everything was ok send back an json response
			if($success != false)
				$insert_img = "INSERT INTO `banner_mst`(`BAM_ORCD`, `BAM_ORD`, `BAM_IMG`) VALUES ($org_id,$dip_order,'".$imageName."')";
				$result = mysqli_query($conn,$insert_img);
			  //echo '{"success": true}';
				echo json_encode(array("success"=>true,"name"=>$image,"status"=>200,"page_id"=>$pageid));


		}
			/*****Image check and save form category_images table *****/
		//header("Location:banner.php?status=200&page_id=$pageid");
}else{
	$duplicatecheck ="SELECT BAM_ORD FROM `banner_mst` WHERE BAM_ORD=$dip_order AND NOT BAM_BACD =$editid ";
	$query 	=mysqli_query($conn,$duplicatecheck);
	$count  =mysqli_num_rows($query);
	if($count ==1){
		echo json_encode(array("success"=>true,"name"=>$image,"status"=>300,"page_id"=>$pageid));
		//header("Location:banner.php?status=300&page_id=$pageid");
	}else{
		/*****Image check and save form category_images table**/
		if($image !=""){
			$image =$_FILES['file']['name'];
			$imageName = date("Y.m.d").time().'.jpg';

			//putting all the content into a file
			if (!file_exists($target_dir)){
				@mkdir($target_dir, 0777);
			}
			$success = move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir. $imageName);
			//if everything was ok send back an json response
			if($success != false)
				$insert_img = "UPDATE `banner_mst`SET `BAM_ORD`=$dip_order, `BAM_IMG`='".$imageName."' WHERE BAM_BACD=$editid";
				$result = mysqli_query($conn,$insert_img);
			 	 //echo '{"success": true}';
				echo json_encode(array("success"=>true,"name"=>$image,"status"=>201,"page_id"=>$pageid));

		}else{
			$insert_img = "UPDATE `banner_mst` SET `BAM_ORD`=$dip_order, `BAM_IMG`='".$oldimg."' WHERE BAM_BACD=$editid";
			$result = mysqli_query($conn,$insert_img);
			echo json_encode(array("success"=>true,"name"=>$image,"status"=>201,"page_id"=>$pageid));
		}
	}

}

?>