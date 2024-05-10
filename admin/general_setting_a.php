<?php
include '../includes/database.php';
include 'includes/functions.php';
$id					=$_POST['id'];
$pageid				=$_POST['pageid'];
$org_id 			=$_SESSION["id"];
//Top Bar
$top_bar_bgcolor 	=mysqli_real_escape_string($conn,$_POST['top_bar_bgcolor']);
$top_bar_fontsize	=mysqli_real_escape_string($conn,$_POST['top_bar_fontsize']);
$top_bar_fontfamily	=mysqli_real_escape_string($conn,$_POST['top_bar_fontfamily']);
$top_bar_color 		=mysqli_real_escape_string($conn,$_POST['top_bar_color']);

//Menu Bar
$menu_bar_bgcolor 	 =mysqli_real_escape_string($conn,$_POST['menu_bar_bgcolor']);
$menu_bar_fontsize	 =mysqli_real_escape_string($conn,$_POST['menu_bar_fontsize']);
$menu_bar_fontfamily =mysqli_real_escape_string($conn,$_POST['menu_bar_fontfamily']);
$menu_bar_color 	 =mysqli_real_escape_string($conn,$_POST['menu_bar_color']);

//Footer
$footer_bgcolor		 =mysqli_real_escape_string($conn,$_POST['footer_bgcolor']);
$footer_fontsize	 =mysqli_real_escape_string($conn,$_POST['footer_fontsize']);
$footer_fontfamily	 =mysqli_real_escape_string($conn,$_POST['footer_fontfamily']);
$footer_color		 =mysqli_real_escape_string($conn,$_POST['footer_color']);

//Menu Title
$menu_title_fontsize	 =mysqli_real_escape_string($conn,$_POST['menu_title_fontsize']);
$menu_title_fontfamily	 =mysqli_real_escape_string($conn,$_POST['menu_title_fontfamily']);
$menu_title_color		 =mysqli_real_escape_string($conn,$_POST['menu_title_color']);

//Page Title
$page_title_fontsize	 =mysqli_real_escape_string($conn,$_POST['page_title_fontsize']);
$page_title_fontfamily	 =mysqli_real_escape_string($conn,$_POST['page_title_fontfamily']);
$page_title_color		 =mysqli_real_escape_string($conn,$_POST['page_title_color']);

//Page Content
$page_content_fontsize	 =mysqli_real_escape_string($conn,$_POST['page_content_fontsize']);
$page_content_fontfamily =mysqli_real_escape_string($conn,$_POST['page_content_fontfamily']);
$page_content_color		 =mysqli_real_escape_string($conn,$_POST['page_content_color']);

$admin_menu_bgcolor		 =mysqli_real_escape_string($conn,$_POST['admin_menu_bgcolor']);
$admin_header		     =mysqli_real_escape_string($conn,$_POST['admin_header']);
$admin_menu_color		 =mysqli_real_escape_string($conn,$_POST['admin_menu_color']);
$logo_height			 =mysqli_real_escape_string($conn,$_POST['logo_height']);
$logo_width		 		 =mysqli_real_escape_string($conn,$_POST['logo_width']);

$created_by = $_SESSION["name"];
$ip_address = $_SERVER['REMOTE_ADDR'];
$sys_name 	= gethostname();
$date_time  = date("Y-m-d H:i:s");

 
if($id =='Add'){ 
	 $sql ="INSERT INTO `general_setting`(`page_id`,`org_id`, `topbar_bgcolor`, `topbar_fontsize`, `topbar_fontfamily`, `topbar_color`, `menubar_bgcolor`, `menubar_fontsize`, `menubar_fontfamily`, `menubar_color`, `footer_bgcolor`, `footer_fontsize`, `footer_fontfamily`, `footer_color`, `menutitle_fontsize`, `menutitle_fontfamily`, `menutitle_color`, `pagetitle_fontsize`, `pagetitle_fontfamily`, `pagetitle_color`, `pagecontent_fontsize`, `pagecontent_fontfamily`, `pagecontent_color`,`adminmenu_bgcolor`,`adminheader_bgcolor`,`adminmenu_color`,`logo_height`,`logo_width`, `created_by`, `ip_address`, `sys_name`, `date_time`) VALUES ($pageid,$org_id,'$top_bar_bgcolor','$top_bar_fontsize','$top_bar_fontfamily','$top_bar_color','$menu_bar_bgcolor','$menu_bar_fontsize','$menu_bar_fontfamily','$menu_bar_color','$footer_bgcolor','$footer_fontsize','$footer_fontfamily','$footer_color','$menu_title_fontsize','$menu_title_fontfamily','$menu_title_color','$page_title_fontsize','$page_title_fontfamily','$page_title_color','$page_content_fontsize','$page_content_fontfamily','$page_content_color','$admin_menu_bgcolor','$admin_header','$admin_menu_color','$logo_height','$logo_width','$created_by','$ip_address','$sys_name','$date_time')";	
	if (mysqli_query($conn, $sql)) {
		//echo "Data Insert successfully";
		header("Location: general_setting.php?status=200 &page_id=$pageid");
	}
}else{
	echo $sql ="UPDATE `general_setting` SET `page_id`=$pageid,`org_id`=$org_id,`topbar_bgcolor`='$top_bar_bgcolor',`topbar_fontsize`='$top_bar_fontsize',`topbar_fontfamily`='$top_bar_fontfamily',`topbar_color`='$top_bar_color',`menubar_bgcolor`='$menu_bar_bgcolor',`menubar_fontsize`='$menu_bar_fontsize',`menubar_fontfamily`='$menu_bar_fontfamily',`menubar_color`='$menu_bar_color ',`footer_bgcolor`='$footer_bgcolor',`footer_fontsize`='$footer_fontsize',`footer_fontfamily`='$footer_fontfamily',`footer_color`='$footer_color',`menutitle_fontsize`='$menu_title_fontsize',`menutitle_fontfamily`='$menu_title_fontfamily',`menutitle_color`='$menu_title_color',`pagetitle_fontsize`='$page_title_fontsize',`pagetitle_fontfamily`='$page_title_fontfamily',`pagetitle_color`='$page_title_color',`pagecontent_fontsize`='$page_content_fontsize',`pagecontent_fontfamily`='$page_content_fontfamily',`pagecontent_color`='$page_content_color',`adminmenu_bgcolor`='$admin_menu_bgcolor',`adminheader_bgcolor`='$admin_header',`adminmenu_color`='$admin_menu_color',`logo_height`='$logo_height',`logo_width`='$logo_width',`created_by`='$created_by',`ip_address`='$ip_address',`sys_name`='$sys_name',`date_time`='$date_time' WHERE id=$id";	
	if (mysqli_query($conn, $sql)) {
		//echo "Data Insert successfully";
		header("Location: general_setting.php?status=200 &page_id=$pageid");
	}
}
?>