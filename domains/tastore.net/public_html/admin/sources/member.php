<?php	if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){	
	case "man":
		get_items();
		$template = "member/items";
		break;
	case "add":
		$template = "member/item_add";
		break;
	case "edit":
		get_item();
		$template = "member/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	default:
		$template = "index";
}

//////////////////
function get_items(){
	global $d, $items, $paging;
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_member where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$spdc1=$cats[0]['hienthi'];
		if($spdc1==0)
		{
			$sqlUPDATE_ORDER = "UPDATE table_member SET hienthi =1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
			$sqlUPDATE_ORDER = "UPDATE table_member SET hienthi =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}	
		redirect("index.php?com=member&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));			
	}
	
	
	$sql = "select * from #_member where role=1 order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=member&act=man";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=member&act=man");
	
	$sql = "select * from #_member where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=member&act=man");
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=member&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){ // cap nhat
		$id =  themdau($_POST['id']);
		
		// kiem tra
		/*$d->reset();
		$d->setTable('member');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()>0){
			$row = $d->fetch_array();
			if($row['role'] != 1) transfer("Bạn không có quyền trên tài khoản này.<br>Mọi thắc mắc xin liên hệ quản trị website.", "index.php?com=member&act=man");
		}*/
		
		if($_POST['password']!="")
			$data['password'] = md5($_POST['password']);
		$data['email'] = $_POST['email'];
		$data['ten'] = $_POST['ten'];
		$data['sex'] = $_POST['gioitinh'];
		$data['dienthoai'] = $_POST['dienthoai'];		
		$data['diachi'] = $_POST['diachi'];
		$data['ngaysinh'] = $_POST['ngaysinh'];
		
		$d->reset();
		$d->setTable('member');
		$d->setWhere('id', $id);
		if($d->update($data))
			transfer("Dữ liệu đã được cập nhật", "index.php?com=member&act=man");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=member&act=man");
	
	}else{ // them moi
	
		// kiem tra ten trung
		$d->reset();
		$d->setTable('member');
		$d->setWhere('email', $_POST['email']);
		$d->select();
		if($d->num_rows()>0) transfer("Email dăng nhập này đã tồn tại.<br>Xin chọn Email khác.", "index.php?com=member&act=add");
		
		if($_POST['password']=="") transfer("Chưa nhập mật khẩu", "index.php?com=member&act=add");
				
		$data['email'] = $_POST['email'];
		$data['ten'] = $_POST['ten'];
		$data['sex'] = $_POST['gioitinh'];
		$data['dienthoai'] = $_POST['dienthoai'];		
		$data['diachi'] = $_POST['diachi'];
		$data['ngaysinh'] = $_POST['ngaysinh'];
		$data['role'] = 1;
		
		$d->setTable('member');
		if($d->insert($data))
			transfer("Dữ liệu đã được lưu", "index.php?com=member&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=member&act=man");
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		// kiem tra
		$d->reset();
		$d->setTable('member');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()>0){
			$row = $d->fetch_array();
			if($row['role'] != 1) transfer("Bạn không có quyền trên tài khoản này.<br>Mọi thắc mắc xin liên hệ quản trị website.", "index.php?com=member&act=man");
		}
		
		// xoa item
		$sql = "delete from #_member where id='".$id."'";
		if($d->query($sql))
			transfer("Dữ liệu đã được xóa", "index.php?com=member&act=man");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=member&act=man");
	}else transfer("Không nhận được dữ liệu", "index.php?com=member&act=man");
}



?>