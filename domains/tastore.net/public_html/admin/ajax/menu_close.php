<?php	
	session_start();	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	@define ( '_lib' , './../lib/'); 

	include_once _lib."config.php";
    
    @define ( '_kiemtraweb_AT' , $check_website_AT);  //Một đoạn mã dành riêng cho 1 website.    
	
	$id = htmlspecialchars(addslashes(strip_tags(trim($_REQUEST['id']))));
	if($id!=''){
		if($_SESSION['menu'][$id]==1 || !isset($_SESSION['menu'][$id])){
			$_SESSION['menu'][$id] = 2;
		}
		else
			$_SESSION['menu'][$id] = 1;
	}
	echo $id;
?>     