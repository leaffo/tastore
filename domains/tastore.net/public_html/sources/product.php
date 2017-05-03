<?php  if(!defined('_source')) die("Error");



if(isset($_GET['id']))
{

 	#SP chi tiet
	$id =  addslashes($_GET['id']);
	$sql = "select photo,id_cat,id_item,thumb,ten,tenkhongdau,maso,gia,xuatxu,luotmua,lienhe,noidung,giakhuyenmai,diemnoibat,tinhtrang,luuykhimua,gia,dieukhoan,luotxem,id,id_item,donvi,tinhtrang from #_products where hienthi=1 and id='".$id."'";
	$d->query($sql);
	$result_detail = $d->result_array();
	$tieude="Chi tiết tin";
	 $title_bar.=$result_detail[0]['ten'].' - ';
	
	
	
	
 #sp cung loai
 	$sql = "select photo,thumb,ten,tenkhongdau,maso,gia,lienhe,noidung,dieukhoan,xuatxu,giakhuyenmai,id,id_item,donvi,tinhtrang from #_products where hienthi=1 and  id <>'".$result_detail[0]['id']."' and id_item='".$result_detail[0]['id_item']."' order by id desc limit 0,3";
	$d->query($sql);
	$result_product = $d->result_array();

 
	
	$breadrum='<a href="san-pham/'.$danhmuc_cat[0]['tenkhongdau'].'.html">'.$danhmuc_cat[0]['ten'].' > </a>';
	$breadrum.='<a href="san-pham/'.$danhmuc_cat[0]['tenkhongdau'].'/'.$danhmuc[0]['tenkhongdau'].'/'.$danhmuc[0]['id'].'.html">'.$danhmuc[0]['ten'].'</a>';

 
 
 
 
 $idc = addslashes($_GET['idc']);
	$sql_sp = "select id,thumb,ten,tenkhongdau,photo from #_products_cat where hienthi=1 and id='".$result_detail[0]['id_cat']."'  order by stt,ngaytao asc";
	$d->query($sql_sp);
	$danhmuc = $d->result_array();
	
	$sql_sp = "select id,thumb,ten,tenkhongdau,photo from #_products_item where hienthi=1 and id='".$result_detail[0]['id_item']."'  order by stt,ngaytao asc";
	$d->query($sql_sp);
	$danhmuc_item = $d->result_array();
	
	
	$breadrum='<a href="san-pham/'.$danhmuc[0]['tenkhongdau'].'.html">'.$danhmuc[0]['ten'].' > </a>';
	$breadrum.='<a href="san-pham/'.$danhmuc[0]['tenkhongdau'].'/'.$danhmuc_item[0]['tenkhongdau'].'/'.$danhmuc_item[0]['id'].'.html">'.$danhmuc_item[0]['ten'].' > </a>';
	$breadrum.="<a>".$result_detail[0]['ten'].' ('.$result_detail[0]['maso']." )</a>" ;
	
	$sql = "select * from #_hinhanh where hienthi=1  and id_photo ='H".$result_detail[0]['id']."'";
	$d->query($sql);
	$hinhanh = $d->result_array();


	
	$template ="product_detail";
 
}elseif(isset($_GET['idi']))
{

	  $idi = addslashes($_GET['idi']);
	

	$sql_sp = "select id,thumb,ten,tenkhongdau,photo,id_cat from #_products_item where hienthi=1 and id='$idi'  order by stt,ngaytao asc";
	$d->query($sql_sp);
	$danhmuc = $d->result_array();
	$title_bar .=$danhmuc[0]['ten'].' - ';
	$tile_cat=$danhmuc[0]['ten'];
	
	
	 $sql_sp = "select id,thumb,ten,tenkhongdau,photo from #_products_cat where hienthi=1 and id='".$danhmuc[0]['id_cat']."'  order by stt,ngaytao asc";
	$d->query($sql_sp);
	$danhmuc_cat = $d->result_array();
	
	$breadrum='<a href="san-pham/'.$danhmuc_cat[0]['tenkhongdau'].'.html">'.$danhmuc_cat[0]['ten'].' > </a>';
	$breadrum.='<a href="san-pham/'.$danhmuc_cat[0]['tenkhongdau'].'/'.$danhmuc[0]['tenkhongdau'].'/'.$danhmuc[0]['id'].'.html">'.$danhmuc[0]['ten'].'</a>';
	
	$tieude="Sản Phẩm ";
	$d->reset();
	 $sql_sp = "select id,ten,tenkhongdau,thumb,photo,gia,giakhuyenmai,donvi,tinhtrang,hot from #_products where hienthi=1 and id_item='".$idi."'   order by stt,ngaytao desc";
	$d->query($sql_sp);
	$result_products = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	
	$maxR=12;
	$maxP=5;
	$paging=paging_home($result_products, $url, $curPage, $maxR, $maxP);
	$result_product=$paging['source'];

	
	
}elseif(isset($_GET['idc']))
{

	 $idc = addslashes($_GET['idc']);
	 $sql_sp = "select id,thumb,ten,tenkhongdau,photo from #_products_cat where hienthi=1 and tenkhongdau='$idc'  order by stt,ngaytao asc";
	$d->query($sql_sp);
	$danhmuc = $d->result_array();
	$title_bar .=$danhmuc[0]['ten'].' - ';
	$tile_cat=$danhmuc[0]['ten'];
	$breadrum='<a href="san-pham/'.$danhmuc[0]['tenkhongdau'].'.html">'.$danhmuc[0]['ten'].'</a>';
	
	$d->reset();
	$sql_sp = "select id,ten,tenkhongdau,thumb,photo,gia,giakhuyenmai,donvi,tinhtrang,hot from #_products where hienthi=1 and id_cat='".$danhmuc[0]['id']."'   order by stt,ngaytao desc";
	$d->query($sql_sp);
	$result_products = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$tieude="Sản Phẩm ";
	$maxR=12;
	$maxP=5;
	$paging=paging_home($result_products, $url, $curPage, $maxR, $maxP);
	$result_products=$paging['source'];

}elseif(isset($_GET['idi1']))
{

	echo $idc = addslashes($_GET['idi1']);
	$sql_sp = "select id,thumb,ten,tenkhongdau,photo from #_products_item2 where hienthi=1 and id='$idc'  order by stt,ngaytao asc";
	$d->query($sql_sp);
	$danhmuc = $d->result_array();
	$title_bar .=$danhmuc[0]['ten'].' - ';
	$tile_cat=$danhmuc[0]['ten'];
	
	$d->reset();
	$sql_sp = "select id,thumb,ten,tenkhongdau,maso,photo,gia,xuatxu from #_products where hienthi=1 and id_item2='".$danhmuc[0]['id']."'   order by stt,ngaytao desc";
	$d->query($sql_sp);
	$result_products = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$tieude="Sản Phẩm ";
	$maxR=12;
	$maxP=5;
	$paging=paging_home($result_products, $url, $curPage, $maxR, $maxP);
	$result_products=$paging['source'];

}else{
	$d->reset();
	$sql_sp = "select id,ten,tenkhongdau,thumb,photo,gia,giakhuyenmai,donvi,tinhtrang,hot from #_products where hienthi=1  order by id desc";
	$d->query($sql_sp);
	$result_products = $d->result_array();
	$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
	$url=getCurrentPageURL();
	$maxR=12;
	$maxP=5;
	$paging=paging_home($result_products, $url, $curPage, $maxR, $maxP);
	$result_products=$paging['source'];
	$title_bar .= "Sản phẩm - ";
	$tile_cat=" Sản phẩm ";
	
	$breadrum='<a href="san-pham.html">Sản phẩm </a>';
}





	
	






















?>