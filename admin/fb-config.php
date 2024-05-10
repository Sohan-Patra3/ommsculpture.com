<?php
require 'fb-php-login/Facebook/autoload.php';
 
define('APP_id','253152935402402'); //  set your FB app id here
define('APP_SECRET','f47606097c3fb9a32d1ca7354bfb4d33'); //set your app secret here
 
$fb = new Facebook\Facebook([
  'app_id' => APP_id, // Replace {app-id} with your app id
  'app_secret' => APP_SECRET,
  'default_graph_version' => 'v2.2',
  ]);
  
  
?>