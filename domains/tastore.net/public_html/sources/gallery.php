<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);
	$sql = "select ten,photo from #_quangcao where hienthi=1 and id_item='".$id."'";
	$d->query($sql);
	$hinhanh_detail = $d->result_array();
	
	
	$sql_tintuc = "select ten,photo,id from #_hinhanh where hienthi=1 and id='".$id."'  order by stt asc";
	$d->query($sql_tintuc);
	$hinhanh_item = $d->result_array();
	$title_bar=$hinhanh_item[0]['ten'].' - ';
	
}else{
	$title_bar='Mẫu nhà đẹp - ';		
	
	$sql_tintuc = "select ten,photo,id from #_hinhanh where hienthi=1 and id_photo=0  order by stt asc";
	$d->query($sql_tintuc);
	$hinhanh_item = $d->result_array();
	/*$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=9;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];*/
}
?>