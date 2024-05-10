<?php
include 'includes/database.php';
if($_POST['type']==1){
	$email =mysqli_real_escape_string($conn,$_POST['email']);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if(mysqli_query($conn,"INSERT INTO `subscribe`( `email`) VALUES ('$email')")){
		echo "Subscribed Successfully !.";
	}else{
		echo "Error Occured !.";
	}
}
?>