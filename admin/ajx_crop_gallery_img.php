<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	
	$org_id=$_SESSION["id"];
	$data= mysqli_real_escape_string($conn,$_POST['data']);
	$title=ucwords( mysqli_real_escape_string($conn,$_POST['title']));
	$image = $_FILES['file']['name'];
	$page_id=$_POST["page_id"];

	$output_dir = "uploadimage/homepageimg/";

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
			$sql="INSERT INTO `gallery_mst`(`orcd`,`name`,  `description`, `image`,`status`) VALUES ($org_id,'$title','$data','$imageName',1)";
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
			$sql = "UPDATE `gallery_mst` SET `name`='" . $title . "',`description`='" . $data . "',`image`='". $imageName."' WHERE category_id = $edit_id ";
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