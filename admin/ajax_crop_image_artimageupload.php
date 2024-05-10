<?php
	include '../includes/database.php';
	include 'includes/functions.php';

	$org_id=$_SESSION["id"];
	
	$category_id=$_POST['category_id'];
	$subcat_id=$_POST['subcat_id'];
	$imgtype=$_POST['imgtype'];
	$title=ucwords( mysqli_real_escape_string($conn,$_POST['title']));
	$data= mysqli_real_escape_string($conn,$_POST['data']);

	$image = $_FILES['file']['name'];
	$page_id=$_POST["page_id"];

	$output_dir = "uploadimage/";
    
	if($_POST['type'] ==1)
	{
		$image =$_FILES['file']['name'];
		$imageName = date("Y.m.d").time().'.png';
		if (!file_exists($output_dir ))
		{
			@mkdir($output_dir , 0777);
		}
		$success = move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir. $imageName);
		//if everything was ok send back an json response
		if($success != false)
		{
			$sql = "INSERT INTO `gal_dtl01`(`GAD_PGCD`,`GAD_ORCD`, `GAD_CACD`, `GAD_SBCACD`, `GAD_TITL`, `GAD_DESC`,`GAD_IMG`, 
			`GAD_IMGTP`, `GAD_STAT`, `GAD_CANC`) 
			VALUES ($page_id,$org_id,$category_id,$subcat_id,'$title','".$data."','".$imageName."',$imgtype,1,0)";
			$result =mysqli_query($conn, $sql);
			echo json_encode(array("success"=>true,"status"=>200,"page_id"=>$page_id));
		}
		else
		{
			echo json_encode(array("success"=>false,"page_id"=>$page_id, "Error"=>mysqli_error($conn)));
		}
		mysqli_close($conn); 
	}

	if($_POST['type'] ==2)
	{
		$edit_id=$_POST["id"];
		$oldimg=$_POST["oldimg"];
		
		$image =$_FILES['file']['name'];
		$imageName = date("Y.m.d").time().'.png';
		if (!file_exists($output_dir . $org_id))
		{
			@mkdir($output_dir . $org_id, 0777);
		}
		if($oldimg !='' && $image !='')
		{
			unlink($output_dir.$oldimg);
		}
		$success = move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir. $imageName);
		if($success != false)
		{
			$sql = "UPDATE `gal_dtl01` SET `GAD_PGCD`=$page_id,`GAD_ORCD`='" . $org_id . "',
			`GAD_CACD`=$category_id,`GAD_SBCACD`=$subcat_id,`GAD_TITL`='" . $title . "',`GAD_DESC`='" . $data . "',
			`GAD_IMG`='". $imageName."',`GAD_IMGTP`=$imgtype,`GAD_STAT`=1,`GAD_CANC`=0 WHERE GAD_GACD = $edit_id ";
			$result =mysqli_query($conn, $sql);
			echo json_encode(array("success"=>true,"status"=>201,"page_id"=>$page_id));
		}
		else
		{
			echo json_encode(array("success"=>false,"page_id"=>$page_id, "Error"=>mysqli_error($conn)));
		}
		mysqli_close($conn);  
	}	
?>