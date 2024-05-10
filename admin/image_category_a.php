<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	
	$org_id=$_SESSION["id"];
	$title		=mysqli_real_escape_string($conn,$_POST['title']);

	$id        =$_POST['id'];
	$page_id	=$_POST["page_id"];
	 

	if(isset($_POST['submit']))
	{
		//echo'hello';
		//$sql = "SELECT * FROM `cat_mst01` where  PAD_ORCD=$page_id";
		//$result = mysqli_query($conn, $sql);
		//if (mysqli_num_rows($result) == 0) {
		if($id =='')
		{
			$sql = "INSERT INTO `cat_mst01`(`CAM_CANM`, `CAM_ORCD`) VALUES ('".$title."',$org_id)";
			if (mysqli_query($conn, $sql)) 
			{
				echo 'Data Insert successfully';
				header("Location: img_category.php?page_id=$page_id&status=200");				
			} 
			else 
			{
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
		else
		{
			$sql = "UPDATE cat_mst01 set CAM_CANM='" . $title . "', CAM_ORCD=$org_id WHERE CAM_CACD='" . $id . "'";
			if (mysqli_query($conn, $sql)) 
			{
				echo'Data Updated successfully';
				header("Location: img_category.php?page_id=$id&status=201");
			}
			else 
			{			
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
	
	if(isset($_GET['delitid']))
	{
		$delitid =$_GET['delitid'];
		$sql="DELETE FROM `cat_mst01` WHERE CAM_CACD =$delitid";
		if(mysqli_query($conn,$sql))
		{
			header("Location: img_category.php?page_id=$page_id&status=203");
		}
		else
		{
			header("Location: img_category.php?page_id=$page_id&status=300");
		}
	}
?>