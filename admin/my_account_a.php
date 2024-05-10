<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	 $org_id 		=$_SESSION["id"];
	 $org_name		=$_POST['org_name'];
	 $org_domain	=$_POST['org_domain'];
	 $admin_name	=$_POST['admin_name'];
	 $admin_email	=$_POST['admin_email'];
	 $admin_phone	=$_POST['admin_phone'];
	 $admin_psw		=$_POST['admin_psw'];
	// $facebook		=mysqli_real_escape_string($conn,$_POST['facebook']);
	// $twitter		=mysqli_real_escape_string($conn,$_POST['twitter']);
	// $youtube		=mysqli_real_escape_string($conn,$_POST['youtube']);
	 //$pinterest		=mysqli_real_escape_string($conn,$_POST['pinterest']);
	 //$linkedin		=mysqli_real_escape_string($conn,$_POST['linkedin']);
	 //$google_play	=mysqli_real_escape_string($conn,$_POST['google_play']);
	 $id 			=$_POST['id'];
	 $page_id		=$_POST["page_id"];
	
	if(isset($_POST['submit'])){
		// $sql = "SELECT * FROM `pag_dtl01` where PAD_PACD=$page_id and PAD_ORCD=$org_id";
		// $result = mysqli_query($conn, $sql);
		if ($id =='') {
			
			$sql = "INSERT INTO `org_mst01`(`ORM_NAME`, `ORM_DMNM`, `ORM_CPNM`, `ORM_MAIL`, `ORM_LOGO`, `ORM_PROF`, `ORM_CONO`, `ORM_PASS`,`ORM_STAT`, `ORM_CANC`) VALUES ('".$org_name."','".$org_domain."','".$admin_name."','".$admin_email."','','','".$admin_phone."','".$admin_psw."',1,0)";
			if (mysqli_query($conn, $sql)) {
			echo "Data Insert successfully";
			header('Location: my-account.php?status=200');
			
			} 
			else { 
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}else{
			//$sql = "UPDATE `org_mst01` SET `ORM_NAME`='".$org_name."',`ORM_DMNM`='".$org_domain."',`ORM_CPNM`='".$admin_name."',`ORM_MAIL`='".$admin_email."',`ORM_CONO`='".$admin_phone."',`ORM_PASS`='".$admin_psw."',`ORM_STAT`=1,`ORM_CANC`=0 WHERE  ORM_ORCD='" . $id . "'";
			if($_POST['type'] == 1){
				$sql = "UPDATE `org_mst01` SET `ORM_NAME`='".$org_name."',`ORM_DMNM`='".$org_domain."',`ORM_CPNM`='".$admin_name."',`ORM_MAIL`='".$admin_email."',`ORM_CONO`='".$admin_phone."',`ORM_STAT`=1,`ORM_CANC`=0 WHERE  ORM_ORCD='" . $id . "'";
			}
			if($_POST['type'] == 2){
				$sql = "UPDATE `org_mst01` SET `ORM_PASS`='".$admin_psw."',`ORM_STAT`=1,`ORM_CANC`=0 WHERE  ORM_ORCD='" . $id . "'";
			}
			if($_POST['type'] == 3){
				$sql = "UPDATE `org_mst01` SET `ORM_FB`='".$facebook."',`ORM_TW`='".$twitter."',`ORM_YT`='".$youtube."',`ORM_PT`='".$pinterest."',`ORM_LI`='".$linkedin."',`ORM_GP`='".$google_play."',`ORM_STAT`=1,`ORM_CANC`=0 WHERE  ORM_ORCD='" . $id . "'";
			}
			if (mysqli_query($conn, $sql)) {
				header('Location: my-account.php?status=200');
			}else {
			
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
	
?>
