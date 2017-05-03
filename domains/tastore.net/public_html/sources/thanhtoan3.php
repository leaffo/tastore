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

	
if(!empty($_POST)){
	if($_POST['payment']=="thanhtoantienmat"){
		
			// cuctomer information
			$order_code=fns_Rand_digit(0,9,6);
			
			$data['order_code'] =$order_code;
			$data['email'] =$_SESSION['dn'][0]['email'];
			$data['hoten_nguoimua'] = $_SESSION['customer']['hoten_nguoimua'];
			$data['dienthoai_nguoimua'] = $_SESSION['customer']['dienthoai_nguoimua'];
			$data['email_nguoimua'] = $_SESSION['customer']['email_nguoimua'];
			$data['diachi_nguoimua'] = $_SESSION['customer']['diachi_nguoimua'];
			
			$data['hoten_nguoinhan'] = $_SESSION['customer']['hoten_nguoinhan'];
			$data['dienthoai_nguoinhan'] = $_SESSION['customer']['dienthoai_nguoinhan'];
			$data['email_nguoinhan'] = $_SESSION['customer']['email_nguoinhan'];
			$data['diachi_nguoinhan'] = $_SESSION['customer']['diachi_nguoinhan'];
			$data['note'] = $_SESSION['customer']['note'];
			
			$data['ngaytao'] = time();
			
			// order information
			 $tring_body='<link href="'.$configurl.'css/style_email_cart.css" rel="stylesheet">';
			 
			 $tring_body.='<table class="info_customer_cart" width="50%" border="1" style="border: 1px solid #ccc;
border-collapse: collapse;
margin-bottom: 10px;">
			  <tr class="bt_cart" style="background: #39F;
color: #fff;">
				<td style="padding: 5px;">Thông tin người đặt</td>
				
			  </tr>
			   <tr>
			
				<td><strong>Họ tên người mua</strong>: '.$_SESSION['customer']['hoten_nguoimua'].' </td>
			  </tr>
			  <tr>
				
				<td><strong>Emal người mua</strong>: '.$_SESSION['customer']['email_nguoimua'].' </td>
			  </tr>
			  <tr>
				<td>Đ<strong>iện thoại người mua</strong> :  '.$_SESSION['customer']['dienthoai_nguoimua'].'</td>
				
			  </tr>
			  <tr>
				<td><strong>Địa chỉ người đặt</strong>: '.$_SESSION['customer']['diachi_nguoimua'].'</td>
				
			  </tr>
			 
			</table>
			';
			 $tring_body.='<table class="info_customer_cart" width="50%" border="1" style="border: 1px solid #ccc;
border-collapse: collapse;
margin-bottom: 10px;">
			  <tr class="bt_cart" style="background: #39F;color: #fff;">
				<td style="padding: 5px;">Thông tin người nhận</td>
			  </tr>
			   <tr>
				
				<td><strong>Họ tên người nhận</strong>: '.$_SESSION['customer']['hoten_nguoinhan'].'</td>
			  </tr>
			  <tr>
			
				<td><strong>Emal người nhận</strong>: '.$_SESSION['customer']['email_nguoinhan'].'</td>
			  </tr>
			  <tr>
			
				<td><strong>Điện thoại người nhận</strong>:'.$_SESSION['customer']['dienthoai_nguoinhan'].'</td>
			  </tr>
			  <tr>
				
				<td><strong>Địa chỉ người nhận</strong>:'.$_SESSION['customer']['diachi_nguoinhan'].'</td>
			  </tr>
			 
			</table>
			';
			 $tring_body.='<table class="info_customer_cart" width="100%" border="1" style="border: 1px solid #ccc;
border-collapse: collapse;
margin-bottom: 10px;">


<tr style="background: #39F;color: #fff;">
<td>STT</td>
<td>Hình ảnh</td>
<td>Tên</td>
<td>Giá x Số lượng</td>
<td>Thành tiền</td>
</tr>';
			  $max=count($_SESSION['cart']);
		
				   for($i=0;$i<$max;$i++){
					   // get products info
					   
					   $pid=$_SESSION['cart'][$i]['productid'];
						$q=$_SESSION['cart'][$i]['qty'];					
					   $name_product=get_product_name($pid);
					   $price_product=get_price($pid);
					   $tongtien_record=$q*$price_product;
					   $photo_product=get_product_photo($pid);
					   
					   
					 $tring_body.='  <tr>';
					 $tring_body.='<td>'.($i+1).'</td>';
					 $tring_body.='<td><img src="'.$configurl._upload_sanpham_l.$photo_product.'" width="50" /></td>';
					 $tring_body.='<td>'.$name_product.'</td>';
					 $tring_body.='<td>'.format_money($price_product).' x '.$q .'</td>';
					 $tring_body.='<td>'.format_money($tongtien_record).'</td>';
					 $tring_body.='</tr>';

		   
					}
					
				$tring_body.='<tr>
 <td colspan="5"><span class="total_cat">Tổng tiền: <span style="color: #f00;
font-weight: bold;" >'.format_money(get_order_total()).'</span></span>   -   <strong>
 Thanh Toán Bằng Tiền Mặt  </strong></td>
 </tr>

</table>';
			// end  order infomation
			
			$d->setTable('donhang_item');
			
			$data['noidung'] = $tring_body;
			
			$email=$company['email'];
			$chude="Thông tin đơn hàng !";
			
			 send_email($ip_hosting,$acount_email,$pass,$tring_body,$email,$chude);
			
			if($d->insert($data)){
				$_SESSION['cart']=NULL;
				transfer("Thông tin đơn hàng gửi thành công !", "./");
				
				}else{
					transfer("Đặt hàng thất bại !", "./");
					
					}
	
		
		
		}

	
	}
	
function send_email($ip_hosting,$acount_email,$pass,$body,$email,$chude){
	
	// file 02-smtp.php
//Nhúng thu vi?n phpmailer
require_once('phpmailer/class.phpmailer.php');
//Kh?i t?o d?i tu?ng
$mail = new PHPMailer();


/*=====================================
* THIET LAP THONG TIN GUI MAIL
*=====================================*/
 $mail->IsSMTP(); // G?i d?n class x? lý SMTP

$mail->Host = $ip_hosting; // tên SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // S? d?ng dang nh?p vào account
$mail->Host = $ip_hosting; // Thi?t l?p thông tin c?a SMPT
$mail->Port = 25; // Thi?t l?p c?ng g?i email c?a máy
$mail->Username = $acount_email; // SMTP account username
$mail->Password =$pass; // SMTP account password  

//Thiet lap thong tin nguoi gui va email nguoi gui
$mail->SetFrom($email,$chude);

//Thi?t l?p thông tin ngu?i nh?n
$mail->AddAddress($email, $chude);
//$mail->AddAddress("dangtuptit@gmail.com", "Liên Hệ Vdeltafuel.com ");

//Thi?t l?p email nh?n email h?i dáp
//n?u ngu?i nh?n nh?n nút Reply
$mail->AddReplyTo($email, $chude);

  /*=====================================
* THIET LAP NOI DUNG EMAIL
*=====================================*/

//Thi?t l?p tiêu d?
$mail->Subject = $chude;

//Thi?t l?p d?nh d?ng font ch?
$mail->CharSet = "utf-8";

//Thi?t l?p n?i dung chính c?a email
$mail->MsgHTML($body);
//$mail->Body = $body;
$mail->Send();
	}	
?>

