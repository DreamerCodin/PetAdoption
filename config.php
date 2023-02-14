<?php
error_reporting(0);
session_start();
global $dblink;
$db_user ="root" ;
$db_pass ="";
$db_name ="azsoluti_pets";
$dblink = mysqli_connect('localhost',$db_user,$db_pass,$db_name);
	
	if(!$dblink){
		echo 'Connection Error';
	}
	function redirect_to($new_location) {
	  header("Location: " . $new_location);
	  exit;
	}
?>