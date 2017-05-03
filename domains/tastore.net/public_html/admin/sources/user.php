<?php	if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin();

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "login":
		if(!empty($_POST)) login();
		$template = "user/login";
		break;
	case "admin_edit":
		edit();
		$template = "user/admin_add";
		break;
	case "logout":
		logout();
		break;	
		
	
	default:
		$template = "index";
}


function edit(){
	global $d, $item, $login_name;
	$session_username = magic_quote($_SESSION['login']['username']);
	
	if(!empty($_POST)){
		$username = magic_quote($_POST['username']);		
		
		$sql = "select * from #_user where username!='$session_username' and username='$username' and role=3";
		$d->query($sql);
		if($d->num_rows() > 0) transfer("Tên đăng nhập này đã có","index.php?com=user&act=admin_edit");
		
		$sql = "select * from #_user where username='$session_username'";
		$d->query($sql);
		if($d->num_rows() == 1){
			$row = $d->fetch_array();
			if($row['password'] != taomatkhau($_POST['oldpassword'])) transfer("Mật khẩu không chính xác","index.php?com=user&act=admin_edit");
		}else{
			transfer("Tài khoản này không tồn tại, quý khách vui lòng kiểm tra lại!","index.php?com=user&act=admin_edit");
		}
		
		$data['username'] = $username;
		
		if($_POST['new_pass']!="") 
			$data['password'] = taomatkhau($_POST['new_pass']);		
		
		$d->reset();
		$d->setTable('user');
		$d->setWhere('username', $session_username);
		if($d->update($data)){
			$_SESSION[$login_name] = false;
			$_SESSION['isLoggedIn'] = false;
			unset($_SESSION['login']);
			unset($_SESSION['menu']);
			transfer("Dữ liệu đã được lưu, quý khách vui lòng thực hiện đăng nhập lại.","index.php");
		}
	}
	
	$sql = "select * from #_user where username='$session_username'";
	$d->query($sql);
	if($d->num_rows() == 1){
		$item = $d->fetch_array();
	}
}
	
function login(){
	global $d, $login_name;
	
	$username = htmlspecialchars(strip_tags(addslashes(trim($_POST['username']))));
	$username = magic_quote($username);
	$password = taomatkhau($_POST['password']);
	
	$sql = "select username from #_user where username='$username' and password='$password' and role=3";
	$d->query($sql);
	if($d->num_rows() == 1){		
		$_SESSION[$login_name] = true;
		$_SESSION['isLoggedIn'] = true;
		$_SESSION['login']['username'] = $_POST['username'];
		$_SESSION['login']['password'] = $_POST['password'];
		transfer("Đăng nhập thành công","index.php");		
	}
	transfer("Tên đăng nhập, mật khẩu không chính xác", "index.php?com=user&act=login");
}

function logout(){
	global $login_name;
	$_SESSION[$login_name] = false;
	$_SESSION['isLoggedIn'] = false;
	unset($_SESSION['login']);
	unset($_SESSION['menu']);
	transfer("Đăng xuất thành công", "index.php?com=user&act=login");
}
?>