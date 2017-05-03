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
	//dang ky nhan email
	if(!empty($_POST['emaildk']))
	{   
			
		$sql="select  ten,id from #_dangkynhanemail where ten='".$_POST['emaildk']."'";
		$d->query($sql);
		$result_email = $d->result_array();
		if(count($result_email)==0){
		
		$data['ten'] = $_POST['emaildk'];
		$data['ngaytao'] = time();
		
		$d->setTable('dangkynhanemail');
		if($d->insert($data)){
			echo"Đăng ký thành công";
			}else{
				echo "Đăng ký không thành công";
			}
		}else{
			echo "Bạn đã đăng ký nhận mail rồi !";
			}
	}
	
if(!empty($_POST['id_product']))
	{   
	$id_array=explode('=sl',$_POST['id_product']);
		addtocart($id_array[0],$id_array[1]);
	}
	
if(!empty($_POST['update_cart']))
	{   
	$id_array=explode('sl=',$_POST['update_cart']);
	
		update_cart($id_array[0],$id_array[1]);
		
		 echo format_money1(get_order_total());
	}	
	
if(!empty($_POST['remove_cart']))
	{   
	$id_cart=$_POST['remove_cart'];
	remove_product($id_cart);
		 echo format_money1(get_order_total());
	}	
		
	
	if(!empty($_POST['total_cart']))
	{   
	 echo format_money(get_order_total());
	}
	?>

