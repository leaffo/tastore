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
if(!empty($_GET['id_product']))
	{   
 	 $is_products=$_GET['id_product'];
	  $sl=$_GET['sl'];
	addtocart($is_products,$sl,0);
	$gia=get_price($is_products);
	$total_product=format_money($gia*$sl,'<sup> đ</sup>');
	$tongtien=format_money_m(get_order_total(),'<sup> đ</sup>');
	$array_total=array(
		'total_poducts'=>$total_product,
		'tongtien'=>$tongtien
	);
echo json_encode($array_total);

		}
		

if(!empty($_GET['get_total']))
	{   
 	 

	$tongtien=format_money_m(get_order_total(),'<sup> đ</sup>');
	$array_total=array(
		'total_poducts'=>'dwadeaw',
		'tongtien'=>$tongtien
	);
echo json_encode($array_total);

		}
		
		
?>