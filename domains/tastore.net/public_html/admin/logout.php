<?php
	session_start();
	@define ( '_lib' , './lib/');
	include_once _lib."config.php";
	unset($_SESSION['login']);
	header("Location:http://".$config_url."/admin/login.php");		
?>



