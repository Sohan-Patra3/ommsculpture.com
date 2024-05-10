<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	
	$org_id=$_SESSION["id"];
	
	$category_id=$_POST['category_id'];
	$subcat_id=$_POST['subcat_id'];
	$imgtype=$_POST['imgtype'];
	$title=$_POST['title'];
	$data= mysqli_real_escape_string($conn,$_POST['data']);
	$service_photo=$_FILES['photo'];
	$oldimg=$_POST['oldimg'];
	
	$edit_id=$_POST['id'];
	$page_id=$_POST["page_id"];

	$photo =insertphoto($service_photo,$oldimg );
	
	if(isset($_POST['submit']))
	{
		if($edit_id =='')
		{
			$sql = "INSERT INTO `gal_dtl01`(`GAD_PGCD`,`GAD_ORCD`, `GAD_CACD`, `GAD_SBCACD`, `GAD_TITL`, `GAD_DESC`,`GAD_IMG`, 
			`GAD_IMGTP`, `GAD_STAT`, `GAD_CANC`) 
			VALUES ($page_id,$org_id,$category_id,$subcat_id,'$title','".$data."','".$photo."',$imgtype,1,0)";
			if (mysqli_query($conn, $sql)) 
			{
				echo "Data Insert successfully";
				header("Location: artimageupload.php?page_id=$page_id&status=200");
				//header('Location: about-view.php');
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
		else
		{
			$sql = "UPDATE `gal_dtl01` SET `GAD_PGCD`=$page_id,`GAD_ORCD`='" . $org_id . "',
			`GAD_CACD`=$category_id,`GAD_SBCACD`=$subcat_id,`GAD_TITL`='" . $title . "',`GAD_DESC`='" . $data . "',
			`GAD_IMG`='". $photo."',`GAD_IMGTP`=$imgtype,`GAD_STAT`=1,`GAD_CANC`=0 WHERE GAD_GACD = $edit_id ";
			if (mysqli_query($conn, $sql)) 
			{
				echo "Data Updated successfully";
				header("Location: artimageupload.php?page_id=$page_id&status=201");
			}
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
?>