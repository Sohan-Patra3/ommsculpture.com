<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	
	$org_id=$_SESSION["id"];

	$image =$_FILES['file']['name'];
	$height=$_POST["height"];

	$output_dir = "uploadimage/banner/";

	if($_POST['type'] ==1)
	{
		/*****Image check and save form category_images table**/
		$imageName = date("Y.m.d").time().'.png';
		if (!file_exists($output_dir))
		{
			@mkdir($output_dir , 0777);
		}
		$success = move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir. $imageName);
		//if everything was ok send back an json response
		if($success != false)
		{
			$sql = "INSERT INTO `adv_banner`(`image`, `height`, `cancel`,`status`) VALUES ('".$imageName."',$height,0,1)";
			$result =mysqli_query($conn, $sql);
			echo json_encode(array("success"=>true,"status"=>200));
		}
		else
		{
			echo json_encode(array("success"=>false,"Error"=>mysqli_error($conn)));
		}
		mysqli_close($conn); 
	}

	if($_POST['type'] ==2)
	{
		$edit_id=$_POST["id"];
		$oldimg=$_POST["oldimg"];
		$imageName = date("Y.m.d").time().'.png';

		if (!file_exists($output_dir))
		{
			@mkdir($output_dir , 0777);
		}
		if($oldimg !='' && $image !='')
		{
			unlink($output_dir.$oldimg);
		}
		$success = move_uploaded_file($_FILES["file"]["tmp_name"], $output_dir. $imageName);
		//if everything was ok send back an json response
		if($success != false)
		{
			$sql = "UPDATE `adv_banner `SET `height`=$height, `image`='".$imageName."' WHERE id=$edit_id";
			$result =mysqli_query($conn, $sql);
			echo json_encode(array("success"=>true,"status"=>200));
		}
		else
		{
			echo json_encode(array("success"=>false,"Error"=>mysqli_error($conn)));
		}
		mysqli_close($conn); 	
	}	
?>
