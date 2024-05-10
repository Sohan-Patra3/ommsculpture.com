<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	 $org_id=$_SESSION["id"];
	 
	 $img_cat=$_POST['img_cat'];

	 $id=$_POST['id'];
	 $page_id=$_POST["page_id"];
	 $output_dir = "uploadimage/";
	 $fileCount = count($_FILES["image"]['name']);
	for($i=0; $i < $fileCount; $i++){
		$RandomNum   = time();
	
		$ImageName      = str_replace(' ','-',strtolower($_FILES['image']['name'][$i]));
		$ImageType      = $_FILES['image']['type'][$i]; 
	 
		$ImageExt = substr($ImageName, strrpos($ImageName, '.'));
		$ImageExt       = str_replace('.','',$ImageExt);
		$ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
		$NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
		
		$ret[$NewImageName]= $output_dir.$NewImageName;
		
	   
		if (!file_exists($output_dir . $org_id))
		{
			@mkdir($output_dir . $org_id, 0777);
		}
					
		move_uploaded_file($_FILES["image"]["tmp_name"][$i],$output_dir.$org_id."/".$NewImageName );
		
		 $sql = "INSERT INTO `gal_dtl01`(`GAD_ORCD`, `GAD_CACD`, `GAD_IMG`, `GAD_STAT`, `GAD_CANC`) VALUES ($org_id,$img_cat,'".$NewImageName."',1,0)";
		 
		 mysqli_query($conn, $sql);
	
	}
	mysqli_close($conn);
	header("Location: img_gallery.php?page_id=$id&status=200");


	
	
	
?>