<?php
include '../includes/database.php';
include 'includes/functions.php';
 $org_id=$_SESSION["id"];
if(isset($_POST['submit'])){ 
    $dip_order 	=$_POST['dip_order'];
	$img 		=$_FILES["fileselect"]["size"];
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
			/*****Image check and save form category_images table**/
			if(($img >0)){
				$output_dir		 = "uploadimage/banner/"; /* Path for file upload */
				$RandomNum  	 = time();
				$ImageName  	 = str_replace(' ','-',strtolower($_FILES['fileselect']['name']));
				$ImageType   	 = $_FILES['fileselect']['type']; //"image/png", image/jpeg etc.
				$ImageExt 	 	 = substr($ImageName, strrpos($ImageName, '.'));
				$ImageExt        = str_replace('.','',$ImageExt);
				$ImageName       = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
				$NewImageName    = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
				$ret[$NewImageName]= $output_dir.$NewImageName;
				// Try to create the directory if it does not exist
				if (!file_exists($output_dir))
				{
					@mkdir($output_dir, 0777);
				}
				move_uploaded_file($_FILES["fileselect"]["tmp_name"],$output_dir."/".$NewImageName );
				$insert_img = "INSERT INTO `banner_mst`(`BAM_ORCD`, `BAM_ORD`, `BAM_IMG`) VALUES ($org_id,$dip_order,'".$NewImageName."')";
				$result = mysqli_query($conn,$insert_img);
			}
		}
			/*****Image check and save form category_images table *****/
		  header("Location:banner.php?status=200&page_id=$pageid");	
	}else{ 
		$duplicatecheck ="SELECT BAM_ORD FROM `banner_mst` WHERE BAM_ORD=$dip_order AND NOT BAM_BACD =$editid ";
		$query 	=mysqli_query($conn,$duplicatecheck);
		$count  =mysqli_num_rows($query);
		if($count ==1){
			header("Location:banner.php?status=300&page_id=$pageid");
		}else{
			/*****Image check and save form category_images table**/
			if($oldimg !=""){
				if(($img > 0)){
					$output_dir		 = "uploadimage/banner/"; /* Path for file upload */
					$RandomNum  	 = time();
					$ImageName  	 = str_replace(' ','-',strtolower($_FILES['fileselect']['name']));
					$ImageType   	 = $_FILES['fileselect']['type']; //"image/png", image/jpeg etc.
					$ImageExt 	 	 = substr($ImageName, strrpos($ImageName, '.'));
					$ImageExt        = str_replace('.','',$ImageExt);
					$ImageName       = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
					$NewImageName    = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
					$ret[$NewImageName]= $output_dir.$NewImageName;
					// Try to create the directory if it does not exist
					if (!file_exists($output_dir))
					{
						@mkdir($output_dir, 0777);
					}
					file_exists($output_dir.$oldimg);
					unlink($output_dir.$oldimg);
						
					move_uploaded_file($_FILES["fileselect"]["tmp_name"],$output_dir."/".$NewImageName );
					$insert_img = "UPDATE `banner_mst`SET `BAM_ORD`=$dip_order, `BAM_IMG`='".$NewImageName."' WHERE BAM_BACD=$editid";
					$result = mysqli_query($conn,$insert_img);
				}else{
					$insert_img = "UPDATE `banner_mst` SET `BAM_ORD`=$dip_order, `BAM_IMG`='".$oldimg."' WHERE BAM_BACD=$editid";
					$result = mysqli_query($conn,$insert_img);
				}
			}else{
				if(($img >0)){
					$output_dir		 = "uploadimage/banner/"; /* Path for file upload */
					$RandomNum  	 = time();
					$ImageName  	 = str_replace(' ','-',strtolower($_FILES['fileselect']['name']));
					$ImageType   	 = $_FILES['fileselect']['type']; //"image/png", image/jpeg etc.
					$ImageExt 	 	 = substr($ImageName, strrpos($ImageName, '.'));
					$ImageExt        = str_replace('.','',$ImageExt);
					$ImageName       = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
					$NewImageName    = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
					$ret[$NewImageName]= $output_dir.$NewImageName;
					// Try to create the directory if it does not exist
					if (!file_exists($output_dir))
					{
						@mkdir($output_dir, 0777);
					}
					move_uploaded_file($_FILES["fileselect"]["tmp_name"],$output_dir."/".$NewImageName );
					$insert_img = "INSERT INTO `banner_mst`(`BAM_ORCD`,`BAM_ORD`, `BAM_IMG`) VALUES ($org_id,$dip_order,'".$NewImageName."')";
					$result = mysqli_query($conn,$insert_img);
				}
			}
		}
		/*****Image check and save form category_images table *****/
		header("Location:banner.php?status=201&page_id=$pageid");
	}
}
if(isset($_GET['del'])){
	$delid=$_GET['del'];
	$query ="SELECT * FROM `banner_images` WHERE banner_id ='".$delid."' ";
	$res_query =mysqli_query($conn, $query);
	$row=mysqli_fetch_assoc($res_query);
	$imagename =$row['images'];
	$folder ='upload/banner/';
	$path= $folder.$imagename;
	
	 if(file_exists($path)){
		unlink($path);
		mysqli_query($conn,"DELETE FROM `banner_images` WHERE banner_id=$delid");
		header("Location:banner.php?editid=$delid&status=203&page_id=$pageid");
	}else{
		die('file does not exist');
	}  
}
if(isset($_GET['delitid'])){
	$delitId =$_GET['delitid'];
	$sql ="DELETE FROM `banner_mst` WHERE BAM_BACD=$delitId";
	if(mysqli_query($conn,$sql)){
		header("Location:banner.php?delitid=$delitId&status=203&page_id=$pageid");
	}else{
		echo "Error :".mysqli_error($conn);
	}
 }
?>