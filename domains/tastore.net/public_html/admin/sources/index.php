<?php	if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	
	case "delete":
		delete();
		break;	
	
	default:
        get();
		$template = "index";
}


function get(){
	global $d, $items, $paging;
	$sql = "select * from #_thongbao order by id desc";
	$d->query($sql);
	$items = $d->result_array();
    
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=index";		
	$maxR=12;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
    
}
function delete(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();
		$sql = "delete from #_thongbao where id='".$id."'";
		
		if($d->query($sql))
			redirect("index.php?com=index");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=index");
	}else transfer("Không nhận được dữ liệu", "index.php?com=index");
}


?>