<?php  if(!defined('_source')) die("Error");
if(!empty($_POST)){
	
	$d->reset();
					$sql="select email,emailgmail,passemail from #_company limit 0,1 ";
					$d->query($sql);
					$result_email=$d->result_array();
					
					//check_array($result_email);
					
					
					

	
	function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}
	
	$_SESSION['ma_hd']="HD_".fns_Rand_digit(0,9,6);
	$_SESSION['email_customer']=$_POST['email'];
	

	$title_bar='Đặt hàng - ';
	$info_body.='<link href="http://rautot.com/css/style_cart1.css" rel="stylesheet"><table style="border-collapse: collapse; border: 1px solid #8AC53F;width: 350px;" class="infocart" width="200" border="1">
  <tr>
    <td style=" padding:5px "> <strong>Họ tên</strong>: '.$_POST['daungu'].' '.$_POST['hoten'].' </td> 
  </tr>
  <tr>
    <td style=" padding:5px "> <strong> Điện thoại</strong>: '.$_POST['dienthoai'].' </td>
  </tr>
  <tr>
    <td style=" padding:5px "> <strong> Email</strong>: '.$_POST['email'].' </td>
  </tr>
  <tr>
  <td style=" padding:5px "> <strong> Địa chỉ</strong>: '.$_POST['diachi'].' </td>
  </tr>
   <tr>
  <td style=" padding:5px "> <strong>Tỉnh thành </strong>: '.$_POST['thinhthanh'].' </td>
  </tr>
   <tr>
  <td style=" padding:5px "> <strong>Quận huyện </strong>: '.$_POST['quanhuyen'].' </td>
  </tr>
  <tr>
    <td style=" padding:5px "> <strong> Mã hóa đơn</strong>: '.$_SESSION['ma_hd'].'</td>
  </tr>
  <tr>
  <td style=" padding:5px "> <strong>Ngày đặt hàng</strong>: '.date('d-m-Y H:i:s').'</td>
  </tr>
  <tr>
    <td style=" padding:5px "> <strong> Hình thức thanh toán </strong>: '.$_POST['phuonthucthanhtoan'].'</td>
  </tr>
  <tr>
    <td style=" padding:5px "> <strong> Tổng tiền thanh toán </strong>: <span class="total-main">'.format_money_m(get_order_total(),"<sup>đ</sup>").'<span></td>
  </tr>
  
</table>';
$body_cart='<table border="1" style="border-collapse: collapse;border: 1px solid #8AC53F;width: 650px; margin-top:20px">
          <tr style=" background: #8AC53F;color: #fff;text-transform: uppercase;font-family: arial;font-weight: bold;font-size: 12px;text-align: left;">
            <td style=" padding:5px ">Sản phẩm</td>
            <td style=" padding:5px ">Giá </td>
            <td style=" padding:5px ">Số lượng</td>
          
            <td style=" padding:5px ">Tổng</td>
          </tr>';
          
				$max=count($_SESSION['cart']);
	   for($i=0;$i<$max;$i++){
		      $pid=$_SESSION['cart'][$i]['productid'];
		   $q=$_SESSION['cart'][$i]['qty'];					
		   $name_product=get_product_name($pid);
		   $price_product=get_price($pid);
		$photo_product=get_product_photo($pid);
		$all_info=get_product_allinfo($pid);
		// tong tien tung san pham
		$tongtien_sp=format_money_m($q*$price_product);
		// tinh tien giam
		$giam=format_money_m($all_info['giakhuyenmai']-$all_info['gia']);
		
                
                
       $body_cart.='<tr>
            <td class="img-block-cart"><img style="float:left; margin-right:5px;" width="50" src="http://rautot.com/'._upload_sanpham_l.$photo_product.'" /> <span>'.$name_product.'</span></td>
            <td style=" padding:5px ">'.format_money_m($price_product).'</td>
            <td style=" padding:5px ">'.$q.'</td>
           
            <td style=" padding:5px ">'.$tongtien_sp.'</span></td>
          </tr>';
	   }
      $body_cart.='</table>';
$btn_xac_nhan='<a style="font-weight: bold;color: #fff;background: #7AB335;text-decoration: none;adding: 5px;margin-top: 10px;display: block; width: 200px;
line-height: 22px;" href="http://rautot.com/xac-nhan-don-hang/'.md5($_SESSION['ma_hd']).'.html">Click để xác nhận đơn hàng</a>';

	$body_admin=$info_body.$body_cart;
	 $body_customer=$body_admin.$btn_xac_nhan;
	
			$data['hoten'] = $_POST['hoten'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['madonhang'] = $_SESSION['ma_hd'];
			$data['diachi'] = $_POST['diachi'];
			$data['tongtien'] = get_order_total();
			$data['noidung'] = $body_admin;
			
			
			
			$data['ngaytao'] = time();
			
			$d->setTable('donhang');
			$d->insert($data);
	$email=$result_email[0]['email'];
	$email_customer=$_POST['email'];
	
	 $email_sys=$result_email[0]['emailgmail'];
	 $pass_sys=$result_email[0]['passemail'];
	
	//phpmailer_send($emai_gui,$ten_gui='rautot.vn',$emain_nhan='dangtunina@gmail.com',$chude='Thông tin đơn hàng',$noidung);
	phpmailer_send($email,'rautot.vn',$email,'Thông tin đơn hàng rautot.vn',$body_admin,$email_sys,$pass_sys);
	 if(phpmailer_send($email,'rautot.vn',$email_customer,'Thông tin đơn hàng rautot.vn',$body_customer,$email_sys,$pass_sys)>0){
		 
		
		 redirect('ket-qua-thanh-toan.html');
		 }else{
			 
			 transfer(" Gửi đơn hàng thành công", "dat-hang.html");
			 }



	 
	
}

?>



