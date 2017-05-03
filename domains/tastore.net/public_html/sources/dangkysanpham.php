<?php
if(!empty($_POST)){

		$d->reset();
	$sql = "select id,ten,tenkhongdau,gia,photo,donvi,id_cat from #_products where hienthi=1 and id='".$_POST['id_products']."' order by stt asc";
	$d->query($sql);
	$result_products = $d->result_array();
	
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
  <td style=" padding:5px "> <strong> Tên sản phẩm </strong>:<a href="san-pham/'.$result_products[0]['tenkhongdau'].'/'.$result_products[0]['id'].'.html"> '.$result_products[0]['ten'].'</a> </td>
  </tr>
  <tr>
  <td style=" padding:5px "> <strong> số lượng</strong>: '.$_POST['soluong'].' </td>
  </tr>

  <tr>
  <td style=" padding:5px "> <strong>Ngày đăng ký</strong>: '.date('d-m-Y H:i:s').'</td>
  </tr>


  
</table>';


	
	
			$data['hoten'] = $_POST['hoten'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['diachi'] = $_POST['diachi'];
			$data['noidung'] = $info_body;
			
			
			
			$data['ngaytao'] = time();
			
			$d->setTable('dangkysanpham');
	
	
	//phpmailer_send($emai_gui,$ten_gui='rautot.vn',$emain_nhan='dangtunina@gmail.com',$chude='Thông tin đơn hàng',$noidung);
	 if($d->insert($data)){
		 
		
		 redirect('ket-qua-dang-ky/'.$result_products[0]['id_cat'].'.html');
		 }else{
			 
			 transfer(" Gửi đơn hàng thất bại", "index.html");
			 }



	 
	
}

?>



