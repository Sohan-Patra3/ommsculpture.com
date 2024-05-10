<?php
	include '../includes/database.php';
	include 'includes/functions.php';
	 $org_id=$_SESSION["id"];
	 $title		=$_POST['title'];
	 $go_api	=$_POST['go_api'];
	 $addr1		=$_POST['addr1'];
	 $addr2		=$_POST['addr2'];
	 $email		=$_POST['email'];
	 $phone		=$_POST['phone'];
	 $id        =$_POST['id'];
	 $page_id	=$_POST["page_id"];
	 

	if(isset($_POST['submit'])){
		$sql = "SELECT * FROM `pag_dtl01` where PAD_PACD=$page_id and PAD_ORCD=$org_id";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) == 0) {
			
			$sql = "INSERT INTO `pag_dtl01`(`PAD_PACD`, `PAD_ORCD`, `PAD_TITL`, `PAD_DESC`, `PAD_IMG`,`PAD_API`, `PAD_ADSO`, `PAD_ADST`, `PAD_MAIL`, `PAD_PHN`, `PAD_STAT`, `PAD_CANC`) VALUES ($page_id,$org_id,'".$title."','','','".$go_api."','".$addr1."','".$addr2."','".$email."','".$phone."',1,0)";
			if (mysqli_query($conn, $sql)) {
			echo "Data Insert successfully";
			header("Location: contact_us.php?page_id=$page_id&status=200");
			
			} 
			else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}else{
			$sql = "UPDATE pag_dtl01 set PAD_ORCD='" . $org_id . "', PAD_TITL='" . $title . "', PAD_DESC='', PAD_IMG='',PAD_API='" . $go_api . "', PAD_ADSO='" . $addr1 . "', PAD_ADST='" . $addr2 . "', PAD_MAIL='". $email."',PAD_PHN='". $phone."', PAD_STAT='1' ,PAD_CANC='0' WHERE PAD_PACD='" . $id . "'";
			if (mysqli_query($conn, $sql)) {
				echo $msg='<p style="color:green;">Data Updated successfully</p>';
				header("Location: contact_us.php?page_id=$page_id&status=200");
			}else {
			
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			mysqli_close($conn);
		}
	}
	
?>