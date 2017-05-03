<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	@define ( '_lib' , '../lib/');
	include_once _lib."config.php";
	include_once _lib."functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	
	$url = '';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "select * from #_user where username='".$username."' and com='user' and role=3";
	$d->query($sql);
	if($d->num_rows() == 1){
		$row = $d->fetch_array();
		if($row['password'] == md5($password)){
			$_SESSION['login']['id'] = $row['id'];
			$_SESSION['isLoggedIn'] = true;
			$_SESSION['login']['username'] = $row['username'];
			$_SESSION['login']['ajax'] = true;
			$url='http://'.$config_url.'/admin/index.php';
		}
	}
	echo $url;
?>



