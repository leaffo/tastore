<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
if(isset($_REQUEST['id'])){
$id=$_REQUEST['id'];}
switch($act){

	case "man":
		get_items();
		$template = "products/items";
		break;
	case "add":		
		$template = "products/item_add";
		break;
	case "edit":		
		get_item();
		$template = "products/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	#===================================================	
	case "man_cat":
		get_cats();
		$template = "products/cats";
		break;
	case "add_cat":		
		$template = "products/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "products/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
		#===================================================	
	case "man_danhmuc":
		get_danhmucs();
		$template = "products/danhmucs";
		break;
	case "add_danhmuc":		
		$template = "products/danhmuc_add";
		break;
	case "edit_danhmuc":		
		get_danhmuc();
		$template = "products/danhmuc_add";
		break;
	case "save_danhmuc":
		save_danhmuc();
		break;
	case "delete_danhmuc":
		delete_danhmuc();
		break;
	#===================================================	
	case "man_list":
		get_lists();
		$template = "products/lists";
		break;
	case "add_list":		
		$template = "products/list_add";
		break;
	case "edit_list":		
		get_list();
		$template = "products/list_add";
		break;
	case "save_list":
		save_list();
		break;
	case "delete_list":
		delete_list();
		break;
	default:
		$template = "index";
}

#====================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_items(){
	global $d, $items, $paging;	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hot']!='')
	{
	$id_up = $_REQUEST['hot'];
	 $sql_sp = "SELECT id,hot FROM table_products where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['hot'];
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_products SET hot ='$time' WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_products SET hot =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------
		if($_REQUEST['banchay']!='')
	{
	$id_up = $_REQUEST['banchay'];
	$sql_sp = "SELECT id,banchay FROM table_products where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['banchay'];
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_products SET banchay ='$time' WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_products SET banchay =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#-------------------------------------------------------------
		if($_REQUEST['spmoi']!='')
	{
	$id_up = $_REQUEST['spmoi'];
	$sql_sp = "SELECT id,spmoi FROM table_products where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$time=time();
	$hienthi=$cats[0]['spmoi'];
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_products SET spmoi ='$time' WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_products SET spmoi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	#----------------------------------------------------------------------------------------
		if($_REQUEST['noibat']!='')
		{
		$id_up = $_REQUEST['noibat'];
		$sql_sp = "SELECT id,noibat FROM table_products where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$time=time();
		$hienthi=$cats[0]['noibat'];
			if($hienthi==0)
			{
			$sqlUPDATE_ORDER = "UPDATE table_products SET noibat ='$time' WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
			$sqlUPDATE_ORDER = "UPDATE table_products SET noibat =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
	#-------------------------------------------------------------------------------
	
		if($_REQUEST['vip']!='')
		{
		$id_up = $_REQUEST['vip'];
		$sql_sp = "SELECT id,vip FROM table_products where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$time=time();
		$hienthi=$cats[0]['vip'];
			if($hienthi==0)
			{
			$sqlUPDATE_ORDER = "UPDATE table_products SET vip ='$time' WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}
			else
			{
			$sqlUPDATE_ORDER = "UPDATE table_products SET vip =0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
			}	
		}
	#-------------------------------------------------------------------------------
	
	#----------------------------------------------------------------------------------------
	
		if($_REQUEST['hienthi']!='')
		{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_products where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_products SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sql UPDATE_ORDER");
		}
		else
		{
		 $sqlUPDATE_ORDER = "UPDATE table_products SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sql UPDATE_ORDER");
		}	
		}
	
	if($_REQUEST['tinhtrang']!='')
		{
		$id_up = $_REQUEST['tinhtrang'];
		$sql_sp = "SELECT id,tinhtrang FROM table_products where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['tinhtrang'];
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_products SET tinhtrang =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sql UPDATE_ORDER");
		}
		else
		{
		 $sqlUPDATE_ORDER = "UPDATE table_products SET tinhtrang =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sql UPDATE_ORDER");
		}	
		}	
	#-------------------------------------------------------------------------------
	$sql = "select * from #_products";	
	
	
	if(!empty($_POST)){
		$sql.=" where  ten like '%".$_POST['search']."%'";
		}
		
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".(int)$_REQUEST['id_cat']."";
	}
	
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and id_item=".(int)$_REQUEST['id_item']."";
	}
		if((int)$_REQUEST['id_item2']!='')
	{
	$sql.=" and id_item2=".(int)$_REQUEST['id_item2']."";
	}
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	
	$url=getCurrentPageURL();
	$maxR=15;
	$maxP=20;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=products&act=man");
	
	$sql = "select * from #_products where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=products&act=man");
	$item = $d->fetch_array();	
}

function save_item(){
	global $d;
	$file_name_rand=fns_Rand_digit(0,9,3);
	$file_name=changeTitle($_POST['ten']).'-'.$file_name_rand;	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=products&act=man");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	
	
	if($id){
		$id =  themdau($_POST['id']);
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'],  700, 700, _upload_sanpham,$file_name,1);		
			$d->setTable('products');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);	
				delete_file(_upload_sanpham.$row['thumb']);				
			}
		}
		
		
		
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_item2'] = (int)$_POST['id_item2'];		
		$data['ten'] = $_POST['ten'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['donvi'] = $_POST['donvi'];
		$data['maso'] = $_POST['maso'];	
		$data['giakhuyenmai'] = $_POST['giakhuyenmai'];	
		$data['thoigian'] = $_POST['thoigian'];	
		$data['gia'] = $_POST['gia'];	
		$data['luotmua'] = $_POST['luotmua'];		
		$data['lienhe'] = $_POST['lienhe'];	
		$data['xuatxu'] = $_POST['xuatxu'];	
		$data['noidung'] = $_POST['noidung'];	
		$data['hinhanh'] = $_POST['hinhanh'];
		$data['diemnoibat'] = $_POST['diemnoibat'];	
		$data['luuykhimua'] = $_POST['luuykhimua'];
		$data['tinhtrang'] =isset($_POST['hienthi']) ? 1 : 0;	
		//$data['giaproducts'] = $_POST['giaproducts'];	
		$data['dieukhoan'] = $_POST['dieukhoan'];
		$data['video'] = $_POST['video'];	
		
				
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$d->setTable('products');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=products&act=man&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=products&act=man");
	}else{
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
		$data['photo'] = $photo;		
		$data['thumb'] = create_thumb($photo,   700, 700, _upload_sanpham,$file_name.'1',1);
		
		
		}
		
		
		$data['donvi'] = $_POST['donvi'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['id_cat'] = (int)$_POST['id_cat'];	
		$data['id_item'] = (int)$_POST['id_item'];
		$data['id_item2'] = (int)$_POST['id_item2'];		
		$data['ten'] = $_POST['ten'];	
		$data['tenkhongdau'] = changeTitle($_POST['ten']);	
		$data['video'] = $_POST['video'];	
		$data['luotmua'] = $_POST['luotmua'];
		$data['maso'] = $_POST['maso'];	
		$data['thoigian'] = $_POST['thoigian'];	
		$data['gia'] = $_POST['gia'];	
		$data['giakhuyenmai'] = $_POST['giakhuyenmai'];
		$data['diemnoibat'] = $_POST['diemnoibat'];	
		$data['luuykhimua'] = $_POST['luuykhimua'];	
		$data['lienhe'] = $_POST['lienhe'];	
		$data['xuatxu'] = $_POST['xuatxu'];	
		$data['noidung'] = $_POST['noidung'];
		$data['hinhanh'] = $_POST['hinhanh'];
		$data['dieukhoan'] = $_POST['dieukhoan'];		
		$data['tinhtrang'] =isset($_POST['hienthi']) ? 1 : 0;	
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$d->setTable('products');
		//check_array($data);
		
	//die;
		
		if($d->insert($data))
			redirect("index.php?com=products&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=products&act=man");
	}
}

function delete_item(){
	global $d;
	if($_REQUEST['id_cat']!='')
	{ $id_catt="&id_cat=".$_REQUEST['id_cat'];
	}
	if($_REQUEST['curPage']!='')
	{ $id_catt.="&curPage=".$_REQUEST['curPage'];
	}
	
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->reset();
		$sql = "select id,thumb, photo from #_products where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);			
			}
		$sql = "delete from #_products where id='".$id."'";
		$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=products&act=man".$id_catt."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=products&act=man");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select id,thumb, photo from #_products where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			$sql = "delete from #_products where id='".$id."'";
			$d->query($sql);
		}
			
		} redirect("index.php?com=products&act=man");} else transfer("Không nhận được dữ liệu", "index.php?com=products&act=man");
		
}

#====================================
function get_danhmucs(){
	global $d, $items, $paging;
	
	$sql = "select * from #_products_item2";
	
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}
	if((int)$_REQUEST['id_item']!='')
	{
	$sql.=" and id_item=".$_REQUEST['id_item']."";
	}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=products&act=man_danhmuc";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_danhmuc(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=products&act=man_danhmuc");
	
	$sql = "select * from #_products_item2 where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=products&act=man_danhmuc");
	$item = $d->fetch_array();
}

function save_danhmuc(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=products&act=man_danhmuc");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
	if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
				$data['photo'] = $photo;	
				$data['thumb'] = create_thumb($data['photo'], 185, 100, _upload_sanpham,$file_name,1);		
				$d->setTable('products');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);	
					delete_file(_upload_sanpham.$row['thumb']);				
				}
			}
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);		
		$data['id_cat'] = $_POST['id_cat'];	
		$data['id_item'] = $_POST['id_item'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('products_item2');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=products&act=man_danhmuc&curPage=".$_REQUEST['curPage']."");
		else
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
			$data['thumb'] = create_thumb($data['photo'], 185, 100, _upload_sanpham,$file_name,1);		
		}	
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=products&act=man_danhmuc");
	}else{		
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_item'] = $_POST['id_item'];
		$data['ten'] = $_POST['ten'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('products_item2');
		if($d->insert($data))
			redirect("index.php?com=products&act=man_danhmuc");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=products&act=man_danhmuc");
	}
}

function delete_danhmuc(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_products_item2 where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=products&act=man_danhmuc");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=products&act=man_danhmuc");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_products_item2 where id='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=products&act=man_danhmuc");} else transfer("Không nhận được dữ liệu", "index.php?com=products&act=man_danhmuc");
}

/*------------------------------------------*/

function get_cats(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	
		if($_REQUEST['hot']!='')
		{
		$id_up = $_REQUEST['hot'];
		$sql_sp = "SELECT id,hot FROM table_products_item where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hot'];
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_products_item SET hot =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sql UPDATE_ORDER");
		}
		else
		{
		 $sqlUPDATE_ORDER = "UPDATE table_products_item SET hot =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sql UPDATE_ORDER");
		}	
		}
	
	$sql = "select * from #_products_item";
	if(isset($_REQUEST['id_cat']))	{
	if((int)$_REQUEST['id_cat']!='')
	{
	$sql.=" where id_cat=".$_REQUEST['id_cat']."";
	}}
	$sql.=" order by stt";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=products&act=man_cat";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=products&act=man_cat");
	
	$sql = "select * from #_products_item where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=products&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=products&act=man_cat");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){		
	if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
				$data['photo'] = $photo;	
				$d->setTable('products_item');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);	
				}
			}
		$data['ten'] = $_POST['ten'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);		
		$data['id_cat'] = $_POST['id_cat'];			
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
	
		
		
		$d->setTable('products_item');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=products&act=man_cat&curPage=".$_REQUEST['curPage']."");
		else
		if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;		
		}	
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=products&act=man_cat");
	}else{		
		$data['id_cat'] = $_POST['id_cat'];
		$data['ten'] = $_POST['ten'];
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		
		$d->setTable('products_item');
		if($d->insert($data)) 
			redirect("index.php?com=products&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=products&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_products_item where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=products&act=man_cat");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=products&act=man_cat");
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
			
				$sql = "delete from #_products_item where id='".$id."'";
				$d->query($sql);
			
		} redirect("index.php?com=products&act=man_cat");} else transfer("Không nhận được dữ liệu", "index.php?com=products&act=man_cat");
}
/*---------------------------------*/
function get_lists(){
	global $d, $items, $paging;
	
	#----------------------------------------------------------------------------------------
	if($_REQUEST['hienthi']!='')
	{
	$id_up = $_REQUEST['hienthi'];
	$sql_sp = "SELECT id,hienthi FROM table_products_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hienthi'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_products_cat SET hienthi =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_products_cat SET hienthi =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	if($_REQUEST['hot']!='')
	{
	$id_up = $_REQUEST['hot'];
	$sql_sp = "SELECT id,hot FROM table_products_cat where id='".$id_up."' ";
	$d->query($sql_sp);
	$cats= $d->result_array();
	$hienthi=$cats[0]['hot'];
	if($hienthi==0)
	{
	$sqlUPDATE_ORDER = "UPDATE table_products_cat SET hot =1 WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}
	else
	{
	$sqlUPDATE_ORDER = "UPDATE table_products_cat SET hot =0  WHERE  id = ".$id_up."";
	$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	}	
	}
	
	$sql = "select * from #_products_cat";			
	$sql.=" order by stt,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=products&act=man_list";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_list(){
	global $d, $item;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=products&act=man_list");
	
	$sql = "select * from #_products_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=products&act=man_list");
	$item = $d->fetch_array();	
}

function save_list(){
	global $d;
	$file_name=fns_Rand_digit(0,9,12);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=products&act=man_list");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){	
	if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
				$data['photo'] = $photo;	
				//$data['thumb'] = create_thumb($data['photo'], 500, 350, _upload_sanpham,$file_name,1);		
				$d->setTable('products_cat');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo']);	
					//delete_file(_upload_sanpham.$row['thumb']);				
				}
			}
			
		if($photo = upload_image("file1", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name.'1')){
				$data['photo1'] = $photo;	
				$data['thumb'] = create_thumb($data['photo1'], 500,350, _upload_sanpham,$file_name.'1',1);		
				$d->setTable('products_cat');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_sanpham.$row['photo1']);	
					delete_file(_upload_sanpham.$row['thumb']);				
				}
			}
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];					
		$data['ten'] = $_POST['ten'];
		$data['mota'] = $_POST['mota'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		$d->setTable('products_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=products&act=man_list&curPage=".$_REQUEST['curPage']."");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=products&act=man_list");
	}else{
			if($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name)){
				$data['photo'] = $photo;	
		}	
		if($photo = upload_image("file1", 'jpg|png|gif|JPG|jpeg|JPEG', _upload_sanpham,$file_name.'1')){
				$data['photo1'] = $photo;	
				$data['thumb'] = create_thumb($data['photo1'], 500,350, _upload_sanpham,$file_name.'1',1);		
		}
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];				
		$data['ten'] = $_POST['ten'];
		$data['mota'] = $_POST['mota'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		
		$d->setTable('products_cat');
		if($d->insert($data))
			redirect("index.php?com=products&act=man_list");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=products&act=man_list");
	}
}

function delete_list(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();		
		
			$sql = "delete from #_products_cat where id='".$id."'";
			$d->query($sql);
		
		
		if($d->query($sql))
			redirect("index.php?com=products&act=man_list");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=products&act=man_list");
	}else transfer("Không nhận được dữ liệu", "index.php?com=products&act=man_list");
}
?>