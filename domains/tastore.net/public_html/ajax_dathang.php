<?php
session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."function_user.php";
	include_once _lib."class.database.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	
?>


<?
if(!empty($_GET['id_thanhpho']))
	{   
 	 $d->reset();
	$sql = "select id,ten,tenkhongdau,gia from #_tinhthanh where hienthi=1 and id_item='".$_GET['id_thanhpho']."' order by stt asc";
	$d->query($sql);
	$result_tinhthanh = $d->result_array();
	$tring_option='<option value="0">Vui lòng chọn tỉnh/Thành phố </option>';
	foreach((array)$result_tinhthanh as $k=>$v){
		
		$tring_option.='<option data-id="'.$v['id'].'" value="'.$v['ten'].'">'.$v['ten'].' </option>';
		
		}
	$d->reset();
	$sql = "select id,ten,tenkhongdau,gia from #_tinhthanh_item where hienthi=1 and id='".$_GET['id_thanhpho']."' order by stt asc";
	$d->query($sql);
	$result_tinhthanh_item = $d->result_array();
	$phivanchuyen=format_money($result_tinhthanh_item[0]['gia'],'<sup> đ</sup>');
	
		$tong_thanhtoan=format_money_m((get_order_total()+$result_tinhthanh_item[0]['gia']),' đ');
	 
	$result_tinhthanh=array(
		'tinhthanh'=>$tring_option,
		'phivanchuyen'=>$phivanchuyen,
		'tongtien'=>$tong_thanhtoan
	);
echo json_encode($result_tinhthanh);

		}
		
if(!empty($_GET['id_quan']))
	{   
	
	$d->reset();
	$sql = "select id,ten,tenkhongdau,gia,id_item from #_tinhthanh where hienthi=1 and id='".$_GET['id_quan']."' order by stt asc";
	$d->query($sql);
	$result_tinhthanh = $d->result_array();
	
 	 $d->reset();
	$sql = "select id,ten,tenkhongdau,gia from #_tinhthanh_item where hienthi=1 and id='".$result_tinhthanh[0]['id_item']."' order by stt asc";
	$d->query($sql);
	$result_tinhthanh_item = $d->result_array();
	
	$tongphivanchuyen=$result_tinhthanh_item[0]['gia']+$result_tinhthanh[0]['gia'];
	
	$phivanchuyen=format_money($tongphivanchuyen,'<sup> đ</sup>');
	
		$tong_thanhtoan=format_money_m((get_order_total()+$tongphivanchuyen),' đ');
	 
	$result_quan=array(
		
		'phivanchuyen'=>$phivanchuyen,
		'tongtien'=>$tong_thanhtoan
	);
echo json_encode($result_quan);

		}
		
?>