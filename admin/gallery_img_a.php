<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	 $org_id=$_SESSION["id"];
	 $data= mysqli_real_escape_string($conn,$_POST['data']);
	 $title=$_POST['title'];
	 $service_photo=$_FILES['photo'];
	 $oldimg=$_POST['oldimg'];
	 $edit_id=$_POST['id'];
	 $page_id=$_POST["page_id"];
	 $sequence = $_POST['dip_order'];
	
	$photo =insertphoto($service_photo,$oldimg );
	
	if(isset($_POST['submit'])){
		if($edit_id ==''){
			
			// $sql = "INSERT INTO `pag_dtl01`(`PAD_PACD`, `PAD_ORCD`, `PAD_TITL`, `PAD_DESC`, `PAD_IMG`, `PAD_STAT`, `PAD_CANC`) 
			// VALUES ($page_id,$org_id,'$title','".$data."','".$photo."',1,0)";
			$sql="INSERT INTO `gallery_mst`(`orcd`,`name`,  `description`, `image`,`status` ,`sequence`) VALUES ($org_id,'$title','$data','$photo',1,'$sequence')";
			if (mysqli_query($conn, $sql)) {
				echo "Category added successfully";
				header("Location: gallery.php?page_id=$page_id&status=200");
				//header('Location: about-view.php');
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}else{
			$sql = "UPDATE `gallery_mst` SET `name`='" . $title . "',`description`='" . $data . "',`image`='". $photo."' WHERE category_id = $edit_id ";
			if (mysqli_query($conn, $sql)) {
				echo "Data Updated successfully";
				header("Location: gallery_img.php?page_id=$page_id&status=201");
			}else {
		
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
			}
	}
	
	
?>