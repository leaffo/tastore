<?php  if(!defined('_source')) die("Error");
if(isset($_GET['id'])){
	#tin tuc chi tiet
	$id =  addslashes($_GET['id']);
	$sql = "select ten,ngaytao,mota,noidung,photo,id,tenkhongdau from #_news where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$tintuc_detail = $d->result_array();
	$title_bar=$tintuc_detail[0]['ten'].' - ';
	#các tin cu hon
	$sql_khac = "select ten,ngaytao,tenkhongdau,ngaytao,id from #_news where hienthi=1 and id <>'".$id."'  order by stt,ngaytao desc limit 0,5";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();
	
	$sql_tintuc = "select ten,ngaytao,noidung,tenkhongdau,mota,photo,id from #_news where hienthi=1  order by stt asc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	
}elseif(isset($_GET['idc'])){
	 $id =  addslashes($_GET['idc']);
	$sql="select ten,ngaytao,id from #_news_item where tenkhongdau='$id' limit 0,1 ";
	$d->query($sql);
	$loaitin=$d->result_array();
	$title_bar=$loaitin[0]['ten'].' - ';
	$title_tcat=$loaitin[0]['ten'];
	$sql_tintuc = "select ten,ngaytao,tenkhongdau,mota,photo,thumb,id from #_news where hienthi=1 and id_item='".$loaitin[0]['id']."'  order by stt,ngaytao desc";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=9;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}else{
	
	
	
	 $id =  addslashes($_GET['com']);
	$sql="select ten,ngaytao,id from #_news_item where tenkhongdau='$id' limit 0,1 ";
	$d->query($sql);
	$loaitin=$d->result_array();
	$title_bar='Blog - ';
	$title_tcat=$loaitin[0]['ten'];
	
	$sql_tintuc = "select ten,ngaytao,noidung,thumb,tenkhongdau,mota,photo,id from #_news where hienthi=1 and id_item='".$loaitin[0]['id']."'  order by id desc ";
	$d->query($sql_tintuc);
	$tintuc = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=9;
	$maxP=5;
	$paging=paging_home($tintuc, $url, $curPage, $maxR, $maxP);
	$tintuc=$paging['source'];
}

?>