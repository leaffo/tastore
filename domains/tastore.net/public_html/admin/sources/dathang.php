<?php	if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){

	//--ĐẶT HÀNG-----------------------------------
	case "man":
		gets();
		$template = "dathang/item";
		break;
	case "add":
		$template = "dathang/item_add";
		break;
	case "edit":
		get();
		$template = "dathang/item_add";
		break;
	case "save":
		save();
		break;
	case "delete":
		delete();
		break;
	
	
	default:
		$template = "index";
}

#==ĐẶT HÀNG==================================
function gets(){
	global $d, $items, $paging;
			
	$sql = "select * from #_dathang order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=dathang&act=man";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=dathang&act=man".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	
	$sql = "select * from #_dathang where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=dathang&act=man");
	$item = $d->fetch_array();
}

function save(){
	global $d;
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=dathang&act=man".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
		
	if($id){
				
		$data['ten'] = $_POST['ten'];	
		$data['masp'] = $_POST['masp'];	
		$data['hoten'] = $_POST['hoten'];	
		$data['diachi'] = $_POST['diachi'];	
		$data['dienthoai'] = $_POST['dienthoai'];	
		$data['email'] = $_POST['email'];	
		$data['noidung'] = $_POST['noidung'];	
		$data['tinhtrang'] = $_POST['tinhtrang'];	
		
		
		$d->setTable('dathang');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=dathang&act=man".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dathang&act=man".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	}else{
		
	}
}

function delete(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_dathang where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_dathang.$row['photo']);
				delete_file(_upload_dathang.$row['thumb']);
			}
			$sql = "delete from #_dathang where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=dathang&act=man".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=dathang&act=man".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	}else transfer("Không nhận được dữ liệu", "index.php?com=dathang&act=man".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
}




?>