<?php ob_start();?>

<?php require_once("config.php"); ?>
<?php
	session_unset();
	setcookie('loggedin','',time()-60*60*24*7);
	setcookie('admin','',time()-60*60*24*7);
	setcookie('stuff','',time()-60*60*24*7);
	setcookie('username','',time()-60*60*24*7);
	session_destroy();
	redirect_to('login.php');
?>
	
<?php include("include/footer.php"); ?>
