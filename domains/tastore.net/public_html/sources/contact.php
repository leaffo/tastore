<?php if(!defined('_source')) die("Error");
		$title_bar .= "Liên hệ - ";
		if(!empty($_POST)){
			$data['ten'] = $_POST['ten'];
			$data['diachi'] = $_POST['diachi'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['email'] = $_POST['email'];
			$data['tieude'] = $_POST['tieude1'];
			$data['noidung'] = $_POST['noidung'];
			
			
			$data['ngaytao'] = time();
			
			$d->setTable('contact');
			//$d->insert($data);
			
			//infor@vdeltafuel.com
			
			
			$to['name'] ='Dang anh Tu';
			$to['email'] ='dangtuptit@gmail.com';
			$from['name'] = $_POST['ten'];
			$from['email'] = $_POST['email'];
			$subject = "Thông tin liên hệ ";
			$body = '<table>';
			$body .= '
					
			<tr><th colspan="2">&nbsp;</th></tr>
			<tr>
			<th colspan="2">Thư liên hệ từ website <a href="http://inlogo.us">http://inlogo.us</a></th>
			</tr>
			<tr>
				<th colspan="2">&nbsp;</th>
			</tr>
			<tr>
					<th>Họ tên :</th><td>'.$_POST['ten'].'</td>
			</tr>		
			
			<tr>	
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
			</tr>		
			<tr>	
					<th>Email :</th><td>'.$_POST['email'].'</td>
			</tr>		
			<tr>	
					<th>Tiêu đề :</th><td>'.$_POST['tieude1'].'</td>
			</tr>		
			<tr>	
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
					
			</tr>';
			$body .= '</table>';
	?>				
<?php
// file 02-smtp.php
//Nhúng thu vi?n phpmailer
require_once('phpmailer/class.phpmailer.php');
//Kh?i t?o d?i tu?ng
$mail = new PHPMailer();


/*=====================================
* THIET LAP THONG TIN GUI MAIL
*=====================================*/
 $mail->IsSMTP(); // G?i d?n class x? lý SMTP

$mail->Host = "103.3.245.249"; // tên SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // S? d?ng dang nh?p vào account
$mail->Host = "103.3.245.249"; // Thi?t l?p thông tin c?a SMPT
$mail->Port = 25; // Thi?t l?p c?ng g?i email c?a máy
$mail->Username = "infor@vdeltafuel.com"; // SMTP account username
$mail->Password = "123qwe"; // SMTP account password  

//Thiet lap thong tin nguoi gui va email nguoi gui
$mail->SetFrom($_POST['email'],$_POST['ten']);

//Thi?t l?p thông tin ngu?i nh?n
$mail->AddAddress("dangtuptit@gmail.com", "Liên Hệ Vdeltafuel.com ");
$mail->AddAddress("dangtuptit@gmail.com", "Liên Hệ Vdeltafuel.com ");

//Thi?t l?p email nh?n email h?i dáp
//n?u ngu?i nh?n nh?n nút Reply
$mail->AddReplyTo("dangtuptit@gmail.com","Liên Hệ Vdeltafuel.com ");

  /*=====================================
* THIET LAP NOI DUNG EMAIL
*=====================================*/

//Thi?t l?p tiêu d?
$mail->Subject = "Liên Hệ Vdeltafuel.com ";

//Thi?t l?p d?nh d?ng font ch?
$mail->CharSet = "utf-8";

//Thi?t l?p n?i dung chính c?a email
$mail->MsgHTML($body);
//$mail->Body = $body;
$mail->Send();

?>
			
			
			<?
		
		
		$d->setTable('contact');
		if($d->insert($data))
			transfer("Thông tin liên hệ Đã được gửi", "./");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=contact&id=".$_REQUEST['id']."");
		}
			
?>