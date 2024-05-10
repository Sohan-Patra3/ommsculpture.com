<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	
	$org_id=$_SESSION["id"];
	
	if(isset($_POST['submit']))
	{ 
		$img 		=$_FILES["fileselect"]["size"];
		$editid 	=$_POST['id'];
		$oldimg 	=$_POST['oldimg'];
		$height 	=$_POST['height'];
		if($editid =='')
		{
			/*****Image check and save form category_images table**/
			if(($img >0))
			{
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
				$insert_img = "INSERT INTO `adv_banner`(`image`,`height`) VALUES ('".$NewImageName."',$height)";
				$result = mysqli_query($conn,$insert_img);
			}
			/*****Image check and save form category_images table *****/
			header("Location:advt_banner.php?status=200");	
		}
		else
		{ 
			/*****Image check and save form category_images table**/
			if($oldimg !="")
			{
				if(($img > 0))
				{
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
					$insert_img = "UPDATE `adv_banner`SET  `image`='".$NewImageName."',`height`=$height WHERE id=$editid";
					$result = mysqli_query($conn,$insert_img);
				}
				else
				{
					$insert_img = "UPDATE `adv_banner` SET `image`='".$oldimg."',`height`=$height WHERE id=$editid";
					$result = mysqli_query($conn,$insert_img);
				}
			}
			/*****Image check and save form category_images table *****/
			header("Location:advt_banner.php?status=201");
		}
	}
	
	if(isset($_GET['del']))
	{
		$delid=$_GET['del'];
		$query ="SELECT * FROM `adv_banner` WHERE id ='".$delid."' ";
		$res_query =mysqli_query($conn, $query);
		$row=mysqli_fetch_assoc($res_query);
		$imagename =$row['images'];
		$folder ='upload/banner/';
		$path= $folder.$imagename;
		
		if(file_exists($path))
		{
			unlink($path);
			mysqli_query($conn,"DELETE FROM `adv_banner` WHERE id=$delid");
			header("Location:advt_banner.php?editid=$delid&status=203");
		}
		else
		{
			die('file does not exist');
		}  
	}

	if(isset($_GET['delitid']))
	{
		$delitId =$_GET['delitid'];
		$sql ="DELETE FROM `adv_banner` WHERE id=$delitId";
		if(mysqli_query($conn,$sql))
		{
			header("Location:advt_banner.php?delitid=$delitId&status=203");
		}
		else
		{
			echo "Error :".mysqli_error($conn);
		}
	 }
?>