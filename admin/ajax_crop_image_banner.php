<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	
	$org_id=$_SESSION["id"];
	$dip_order=$_POST['dip_order'];

	$image = $_POST['image'];
	$big_image = $image ;//$_POST['orginalimage'];
	$page_id=$_POST["page_id"];

	$output_dir = "uploadimage/banner/";

	if($_POST['type'] ==1)
	{
		$duplicatecheck ="SELECT BAM_ORD FROM `banner_mst` WHERE BAM_ORD=$dip_order ";
		$query 		=mysqli_query($conn,$duplicatecheck);
		$rowcount 	=mysqli_num_rows($query);
		if($rowcount >0)
		{
			//header("Location:banner.php?status=300&page_id=$pageid");
		}
		else
		{
			/*****Image check and save form category_images table**/
			list($type, $image) = explode(';',$image);
			list(, $image) = explode(',',$image);
			$image = base64_decode($image);
			$imageName = date("Y.m.d").time().'.png';

			if (!file_exists($output_dir))
			{
				@mkdir($output_dir , 0777);
			}
			file_put_contents($output_dir.'/'.$imageName, $image);

			$sql = "INSERT INTO `banner_mst`(`BAM_ORCD`, `BAM_ORD`, `BAM_IMG`) VALUES ($org_id,$dip_order,'".$imageName."')";
			if (mysqli_query($conn, $sql)) 
			{
				echo "banner.php?page_id=$page_id&status=200";
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn); 
		}
	}

	if($_POST['type'] ==2)
	{
		$edit_id=$_POST["id"];
		$oldimg=$_POST["oldimg"];
		$duplicatecheck ="SELECT BAM_ORD FROM `banner_mst` WHERE BAM_ORD=$dip_order AND NOT BAM_BACD =$edit_id ";
		$query 	=mysqli_query($conn,$duplicatecheck);
		$count  =mysqli_num_rows($query);
		if($count ==1)
		{
			echo "banner.php?status=300&page_id=$pageid";
		}
		else
		{
			/*****Image check and save form category_images table**/
			list($type, $image) = explode(';',$image);
			list(, $image) = explode(',',$image);
			$image = base64_decode($image);
			$imageName = date("Y.m.d").time().'.png';

			if (!file_exists($output_dir))
			{
				@mkdir($output_dir , 0777);
			}
			file_put_contents($output_dir.'/'.$imageName, $image);

			$sql = "UPDATE `banner_mst`SET `BAM_ORD`=$dip_order, `BAM_IMG`='".$imageName."' WHERE BAM_BACD=$edit_id";
			if (mysqli_query($conn, $sql)) 
			{
				echo "banner.php?page_id=$page_id&status=201";
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn); 
		}
	}	
?>
