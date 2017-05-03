<?php	if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$id=$_REQUEST['id'];
if(isset($_REQUEST['id_cat'])){$_SESSION['id_cat']=(int)$_REQUEST['id_cat'];}
switch($act){	
	#=========DANH MỤC 1==========================================	
	case "man":
		gets();
		$template = "product1/cats";
		break;
	case "add":		
		$template = "product1/cat_add";
		break;
	case "edit":		
		get();
		$template = "product1/cat_add";
		break;
	case "save":
		save();
		break;
	case "delete":
		delete();
		break;
		
	
	
	
	#=========TÌNH TRẠNG==========================================	
	case "man_tinhtrang":
		get_tinhtrangs();
		$template = "product1/tinhtrang/cats";
		break;
	case "add_tinhtrang":		
		$template = "product1/tinhtrang/cat_add";
		break;
	case "edit_tinhtrang":		
		get_tinhtrang();
		$template = "product1/tinhtrang/cat_add";
		break;
	case "save_tinhtrang":
		save_tinhtrang();
		break;
	case "delete_tinhtrang":
		delete_tinhtrang();
		break;
	
	#=========PHƯƠNG THỨC THANH TOÁN===========================	
	case "man_ptthanhtoan":
		get_ptthanhtoans();
		$template = "product1/phuongthucthanhtoan/cats";
		break;
	case "add_ptthanhtoan":		
		$template = "product1/phuongthucthanhtoan/cat_add";
		break;
	case "edit_ptthanhtoan":		
		get_ptthanhtoan();
		$template = "product1/phuongthucthanhtoan/cat_add";
		break;
	case "save_ptthanhtoan":
		save_ptthanhtoan();
		break;
	case "delete_ptthanhtoan":
		delete_ptthanhtoan();
		break;
	#=========PHƯƠNG THỨC GIAO NHẬN===========================	
	case "man_ptgiaonhan":
		get_ptgiaonhans();
		$template = "product1/phuongthucgiaonhan/cats";
		break;
	case "add_ptgiaonhan":		
		$template = "product1/phuongthucgiaonhan/cat_add";
		break;
	case "edit_ptgiaonhan":		
		get_ptgiaonhan();
		$template = "product1/phuongthucgiaonhan/cat_add";
		break;
	case "save_ptgiaonhan":
		save_ptgiaonhan();
		break;
	case "delete_ptgiaonhan":
		delete_ptgiaonhan();
		break;
	
	
	
	
	#TÌM KIẾM NÂNG CAO
	#=========KHOẢNG GIÁ===========================	
	case "man_khoanggia":
		get_khoanggias();
		$template = "product1/timkiemnangcao/khoanggia/cats";
		break;
	case "add_khoanggia":		
		$template = "product1/timkiemnangcao/khoanggia/cat_add";
		break;
	case "edit_khoanggia":		
		get_khoanggia();
		$template = "product1/timkiemnangcao/khoanggia/cat_add";
		break;
	case "save_khoanggia":
		save_khoanggia();
		break;
	case "delete_khoanggia":
		delete_khoanggia();
		break;
		
	#=========GIÁ TỪ===========================	
	case "man_giatu":
		get_giatus();
		$template = "product1/timkiemnangcao/giatu/cats";
		break;
	case "add_giatu":		
		$template = "product1/timkiemnangcao/giatu/cat_add";
		break;
	case "edit_giatu":		
		get_giatu();
		$template = "product1/timkiemnangcao/giatu/cat_add";
		break;
	case "save_giatu":
		save_giatu();
		break;
	case "delete_giatu":
		delete_giatu();
		break;
	
	#=========GIÁ ĐẾN===========================	
	case "man_giaden":
		get_giadens();
		$template = "product1/timkiemnangcao/giaden/cats";
		break;
	case "add_giaden":		
		$template = "product1/timkiemnangcao/giaden/cat_add";
		break;
	case "edit_giaden":		
		get_giaden();
		$template = "product1/timkiemnangcao/giaden/cat_add";
		break;
	case "save_giaden":
		save_giaden();
		break;
	case "delete_giaden":
		delete_giaden();
		break;
	
	#=========HƯỚNG===========================	
	case "man_huong":
		get_huongs();
		$template = "product1/timkiemnangcao/huong/cats";
		break;
	case "add_huong":		
		$template = "product1/timkiemnangcao/huong/cat_add";
		break;
	case "edit_huong":		
		get_huong();
		$template = "product1/timkiemnangcao/huong/cat_add";
		break;
	case "save_huong":
		save_huong();
		break;
	case "delete_huong":
		delete_huong();
		break;
	
	#=========THÀNH PHỐ===========================	
	case "man_thanhpho":
		get_thanhphos();
		$template = "product1/timkiemnangcao/thanhpho/cats";
		break;
	case "add_thanhpho":		
		$template = "product1/timkiemnangcao/thanhpho/cat_add";
		break;
	case "edit_thanhpho":		
		get_thanhpho();
		$template = "product1/timkiemnangcao/thanhpho/cat_add";
		break;
	case "save_thanhpho":
		save_thanhpho();
		break;
	case "delete_thanhpho":
		delete_thanhpho();
		break;
	#=========QUẬN HUYỆN===========================	
	case "man_quanhuyen":
		get_quanhuyens();
		$template = "product1/timkiemnangcao/thanhpho/quanhuyen/cats";
		break;
	case "add_quanhuyen":		
		$template = "product1/timkiemnangcao/thanhpho/quanhuyen/cat_add";
		break;
	case "edit_quanhuyen":		
		get_quanhuyen();
		$template = "product1/timkiemnangcao/thanhpho/quanhuyen/cat_add";
		break;
	case "save_quanhuyen":
		save_quanhuyen();
		break;
	case "delete_quanhuyen":
		delete_quanhuyen();
		break;
	#=========ĐƯỜNG PHỐ===========================	
	case "man_duongpho":
		get_duongphos();
		$template = "product1/timkiemnangcao/thanhpho/duongpho/cats";
		break;
	case "add_duongpho":		
		$template = "product1/timkiemnangcao/thanhpho/duongpho/cat_add";
		break;
	case "edit_duongpho":		
		get_duongpho();
		$template = "product1/timkiemnangcao/thanhpho/duongpho/cat_add";
		break;
	case "save_duongpho":
		save_duongpho();
		break;
	case "delete_duongpho":
		delete_duongpho();
		break;
	
	
	default:
		$template = "index";
}

#DANH MỤC 1====================================

function gets(){
	global $d, $items, $paging;
	
	if($_REQUEST['noibat']!='')
	{
		$id_up = $_REQUEST['noibat'];
		$sql_spmoi = "SELECT id,noibat FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['noibat'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET noibat =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET noibat =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com=0 order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 0;
	if($id){	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}






#TÌNH TRẠNG====================================
function get_tinhtrangs(){
	global $d, $items, $paging;
	
		
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man_tinhtrang".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com='tinhtrang' order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man_tinhtrang";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_tinhtrang(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_tinhtrang".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man_tinhtrang".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save_tinhtrang(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_tinhtrang".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 'tinhtrang';
	if($id){	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man_tinhtrang".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man_tinhtrang".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man_tinhtrang");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man_tinhtrang".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete_tinhtrang(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man_tinhtrang".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man_tinhtrang".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_tinhtrang".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}

#PHƯƠNG THỨC THANH TOÁN====================================
function get_ptthanhtoans(){
	global $d, $items, $paging;		
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man_ptthanhtoan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com='ptthanhtoan' order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man_ptthanhtoan";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_ptthanhtoan(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_ptthanhtoan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man_ptthanhtoan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save_ptthanhtoan(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_ptthanhtoan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 'ptthanhtoan';
	if($id){	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man_ptthanhtoan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man_ptthanhtoan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
				
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man_ptthanhtoan");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man_ptthanhtoan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete_ptthanhtoan(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man_ptthanhtoan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man_ptthanhtoan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_ptthanhtoan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}

#PHƯƠNG THỨC GIAO NHẬN====================================
function get_ptgiaonhans(){
	global $d, $items, $paging;		
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man_ptgiaonhan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com='ptgiaonhan' order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man_ptgiaonhan";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_ptgiaonhan(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_ptgiaonhan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man_ptgiaonhan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save_ptgiaonhan(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_ptgiaonhan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 'ptgiaonhan';
	if($id){	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		$data['ten2'] = $_POST['ten2'];
		
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man_ptgiaonhan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man_ptgiaonhan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		$data['ten2'] = $_POST['ten2'];
				
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man_ptgiaonhan");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man_ptgiaonhan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete_ptgiaonhan(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man_ptgiaonhan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man_ptgiaonhan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_ptgiaonhan".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}


#TÌM KIẾM NÂNG CAO ----------------------------------------
#KHOẢNG GIÁ====================================
function get_khoanggias(){
	global $d, $items, $paging;		
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man_khoanggia".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com='khoanggia' order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man_khoanggia";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_khoanggia(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_khoanggia".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man_khoanggia".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save_khoanggia(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_khoanggia".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 'khoanggia';
	if($id){	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man_khoanggia".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man_khoanggia".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
				
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man_khoanggia");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man_khoanggia".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete_khoanggia(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man_khoanggia".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man_khoanggia".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_khoanggia".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}

#GIÁ TỪ====================================
function get_giatus(){
	global $d, $items, $paging;		
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man_giatu".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com='giatu' order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man_giatu";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_giatu(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_giatu".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man_giatu".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save_giatu(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_giatu".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 'giatu';
	if($id){	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man_giatu".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man_giatu".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
				
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man_giatu");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man_giatu".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete_giatu(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man_giatu".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man_giatu".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_giatu".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}

#GIÁ ĐẾN====================================
function get_giadens(){
	global $d, $items, $paging;		
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man_giaden".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com='giaden' order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man_giaden";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_giaden(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_giaden".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man_giaden".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save_giaden(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_giaden".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 'giaden';
	if($id){	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man_giaden".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man_giaden".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
				
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man_giaden");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man_giaden".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete_giaden(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man_giaden".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man_giaden".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_giaden".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}

#HƯỚNG====================================
function get_huongs(){
	global $d, $items, $paging;		
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man_huong".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com='huong' order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man_huong";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_huong(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_huong".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man_huong".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save_huong(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_huong".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 'huong';
	if($id){	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man_huong".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man_huong".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
				
		$noidung = $_POST['noidung'];		
		if (get_magic_quotes_gpc()== false) {    		
			$noidung= mysql_real_escape_string($noidung);     			
		}   	
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man_huong");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man_huong".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete_huong(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man_huong".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man_huong".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_huong".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}


#THÀNH PHỐ====================================
function get_thanhphos(){
	global $d, $items, $paging;		
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man_thanhpho".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com='thanhpho' order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man_thanhpho";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_thanhpho(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_thanhpho".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man_thanhpho".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save_thanhpho(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_thanhpho".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 'thanhpho';
	if($id){	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man_thanhpho".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man_thanhpho".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
						
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man_thanhpho");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man_thanhpho".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete_thanhpho(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
		
		//QUẬN HUYỆN -- ĐƯỜNG PHỐ
		$sql = "delete from #_product_phu where id_cat='".$id."'";
		$d->query($sql);
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man_thanhpho".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man_thanhpho".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_thanhpho".((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}

#QUẬN HUYỆN====================================
function get_quanhuyens(){
	global $d, $items, $paging;		
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man_quanhuyen".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com='quanhuyen'";
	if(isset($_REQUEST['id_cat'])){
		$sql .= " and id_cat=".$_REQUEST['id_cat'];
	}
	$sql .= " order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man_quanhuyen";
	if(isset($_REQUEST['id_cat'])){
		$url .= "&id_cat=".$_REQUEST['id_cat'];
	}
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_quanhuyen(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_quanhuyen".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man_quanhuyen".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save_quanhuyen(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_quanhuyen".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 'quanhuyen';
	if($id){	
		$data['id_cat'] = $_POST['id_cat'];
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man_quanhuyen".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man_quanhuyen".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		$data['id_cat'] = $_POST['id_cat'];
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
						
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man_quanhuyen");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man_quanhuyen".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete_quanhuyen(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
		
		//ĐƯỜNG PHỐ
		$sql = "delete from #_product_phu where id_cat1='".$id."'";
		$d->query($sql);
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man_quanhuyen".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man_quanhuyen".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_quanhuyen".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}

#ĐƯỜNG PHỐ====================================
function get_duongphos(){
	global $d, $items, $paging;		
	
	if($_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_spmoi = "SELECT id,hienthi FROM table_product_phu where id='".$id_up."' ";
		$d->query($sql_spmoi);
		$row_spmoi= $d->result_array();
		$spmoi1=$row_spmoi[0]['hienthi'];
		if($spmoi1==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_product_phu SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}
		redirect("index.php?com=product1&act=man_duongpho".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));	
	}
	
	
	$sql = "select * from #_product_phu where com='duongpho'";
	if(isset($_REQUEST['id_cat'])){
		$sql .= " and id_cat=".$_REQUEST['id_cat'];
	}
	if(isset($_REQUEST['id_cat1'])){
		$sql .= " and id_cat1=".$_REQUEST['id_cat1'];
	}
	$sql .= " order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product1&act=man_duongpho";
	if(isset($_REQUEST['id_cat'])){
		$url .= "&id_cat=".$_REQUEST['id_cat'];
	}
	if(isset($_REQUEST['id_cat1'])){
		$url .= "&id_cat1=".$_REQUEST['id_cat1'];
	}
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_duongpho(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_duongpho".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	
	$sql = "select * from #_product_phu where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product1&act=man_duongpho".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$item = $d->fetch_array();	
}

function save_duongpho(){
	global $d;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_duongpho".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 'duongpho';
	if($id){	
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_cat1'] = $_POST['id_cat1'];
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;		
		
		$d->setTable('product_phu');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product1&act=man_duongpho".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product1&act=man_duongpho".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else{	
		$data['id_cat'] = $_POST['id_cat'];
		$data['id_cat1'] = $_POST['id_cat1'];
		
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['ten'] = $_POST['ten'];
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
						
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('product_phu');
		if($d->insert($data))
			redirect("index.php?com=product1&act=man_duongpho");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product1&act=man_duongpho".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}
}

function delete_duongpho(){
	global $d;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
			
		//Xóa chính nó	(danh mục cấp 1)			
		$sql = "delete from #_product_phu where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product1&act=man_duongpho".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product1&act=man_duongpho".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
	}else transfer("Không nhận được dữ liệu", "index.php?com=product1&act=man_duongpho".((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):""));
}



?>