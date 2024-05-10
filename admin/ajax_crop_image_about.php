<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	
	$org_id=$_SESSION["id"];
	
	//catch the image sent from client
	$data= mysqli_real_escape_string($conn,$_POST['data']);
	$title=ucwords( mysqli_real_escape_string($conn,$_POST['title']));
	$image 		= $_FILES['file']['name'];
	$page_id 	=$_POST['page_id'];

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
			$sql="INSERT INTO `pag_dtl01`(`PAD_PACD`, `PAD_ORCD`, `PAD_TITL`, `PAD_DESC`, `PAD_IMG`, `PAD_STAT`, `PAD_CANC`) VALUES ($page_id,$org_id,'".$title."','".$data."','".$imageName."',1,0)";
			$result =mysqli_query($conn, $insert_img);
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
			$sql = "UPDATE pag_dtl01 set PAD_ORCD=$org_id , PAD_TITL='" . $title . "', PAD_DESC='" . $data . "', PAD_IMG='". $imageName."', PAD_STAT='1' ,PAD_CANC=0 WHERE PAD_PACD= $page_id";
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