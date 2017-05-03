<?php 
 
	$d->reset();
	$sql_company1 = "select email from table_company ";
			$d->query($sql_company1);
			$company = $d->fetch_array();	
			
	function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}		
?>
<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
	
if(!empty($_POST)){
		$file_name=fns_Rand_digit(1,5,5);
		$_SESSION['madh']=$file_name;
		 $data['thanhvien']=$_SESSION['dn'];
		 $data['maso']=$_SESSION['madh'];
   		 $data['hinhthucthanhtoan']= $_POST['hinhthucthanhtoan'];
		  $data['ten']=$_SESSION['infor_cart']['username'];
		  $data['noidung']=$_SESSION['infor_cart']['noidung_ct'];
		  $data['ct_donhang']=$_SESSION['infor_cart']['ct_donhang'];
		  $data['ngaytao']=time();
		$d->setTable('hoadon1');
		if($d->insert($data)){
			$_SESSION['cart']=NULL;
			$_SESSION['promotions']=0;
				redirect("thanh-toan-thanh-cong.html");
		}else{
				redirect("thanh-toan.html");
			}
   
 
			
		}
?>
