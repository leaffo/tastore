<?php	if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

$chuoi_noi_curpage = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:'');

switch($act){
	case "man":
		get_mails();
		$template = "newsletter/items";
		break;
	
	case "add":
		$template = "newsletter/item_add";
		break;
	
	case "edit":		
		get_mail();
		$template = "newsletter/item_add";
		break;	
		
	case "send":		
		send($config_host,$config_email,$config_pass);
		break;
	
	case "save":		
		save_mail();
		break;	
	
	case "delete":
		delete();
		break;	

		
	default:
		$template = "index";
}


function get_mails(){
	global $d, $items, $paging, $chuoi_noi_curpage;
	
	$sql = "select * from #_newsletter ";
	
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and email like '%$ten%'";
	}
	$sql .= " order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=newsletter&act=man";
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];	
	$maxR=2;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_mail(){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=newsletter&act=man".$chuoi_noi_curpage);
	
	$sql = "select * from #_newsletter where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=newsletter&act=man".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save_mail(){
	global $d, $chuoi_noi_curpage;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=newsletter&act=man".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['email'] = magic_quote($_POST['email']);
	$data['stt'] = magic_quote($_POST['stt']);
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){

		$d->setTable('newsletter');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=newsletter&act=man".$chuoi_noi_curpage);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=newsletter&act=man".$chuoi_noi_curpage);
	}else{
		
		$d->setTable('newsletter');
		if($d->insert($data))
			redirect("index.php?com=newsletter&act=man");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=newsletter&act=man".$chuoi_noi_curpage);
	}
}


function delete(){
	global $d, $chuoi_noi_curpage;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$sql = "delete from #_newsletter where id='".$id."'";
		$d->query($sql);
		if($d->query($sql))
			redirect("index.php?com=newsletter&act=man".$chuoi_noi_curpage);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=newsletter&act=man".$chuoi_noi_curpage);
	}else transfer("Không nhận được dữ liệu", "index.php?com=newsletter&act=man".$chuoi_noi_curpage);
	
		
}


function send($host,$email,$pass){	
	global $d, $chuoi_noi_curpage;

	$file_name= q_tenhinh($_FILES['file']['name']);
	
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=newsletter&act=man".$chuoi_noi_curpage);
	
	if($file = upload_image("file", 'doc|docx|pdf|rar|zip|ppt|pptx|xls|xlsx|jpg|png|gif|jpeg|DOC|DOCX|PDF|RAR|ZIP|PPT|PPTX|XLS|XLSX|JPG|PNG|GIF|JPEG', _upload_hinhanh,$file_name)){
		$data['file'] = $file;
	}
	
	
	$d->setTable('company');
	$d->select();
	$company_mail = $d->fetch_array();
		
	
	if(isset($_POST['listid'])){		
		
		include_once "../media/phpMailer/class.phpmailer.php";	
		$mail = new PHPMailer();
		$mail->IsSMTP(); // Gọi đến class xử lý SMTP
		$mail->SMTPAuth   = true;                  // Sử dụng đăng nhập vào account
		$mail->Host       = $host;     // Thiết lập thông tin của SMPT		
		$mail->Username   = $email; // SMTP account username
		$mail->Password   = $pass;            // SMTP account password
		
				
		//Thiet lap thong tin nguoi gui va email nguoi gui
		$mail->SetFrom($email, "Đăng ký nhận tin - ".$company_mail['ten']);
		
		if(isset($_POST['guitoanbo'])){
			$d->reset();
			$sql = "select email from #_newsletter where hienthi=1";
			$d->query($sql);
			if($d->num_rows()>0){
				while($row = $d->fetch_array()){
					$mail->AddAddress($row['email'], $company_mail['ten']);
				}
			}
		}
		else{
			$listid = explode(",",$_POST['listid']); 
			for ($i=0 ; $i<count($listid) ; $i++){
				$idTin=$listid[$i]; 
				$id =  intval($idTin);		
				$d->reset();
				$sql = "select email from #_newsletter where id='".$id."' and hienthi=1";
				$d->query($sql);
				if($d->num_rows()>0){
					while($row = $d->fetch_array()){
						$mail->AddAddress($row['email'], $company_mail['ten']);
					}
				}
			}
		}
		/*=====================================
		 * THIET LAP NOI DUNG EMAIL
 		*=====================================*/

		//Thiết lập tiêu đề
		$mail->Subject    = '['.$_POST['ten'].']';
		$mail->IsHTML(true);
		//Thiết lập định dạng font chữ
		$mail->CharSet = "utf-8";	
		$body = $_POST['noidung'];
		
		$mail->Body = $body;
		if($data['file']){
		$mail->AddAttachment(_upload_hinhanh.$data['file']);
		}
		if($mail->Send())
		transfer("Thông tin đã được gửi đi.", "index.php?com=newsletter&act=man".$chuoi_noi_curpage);
		else
		transfer("Hệ thống bị lỗi, xin thử lại sau.", "index.php?com=newsletter&act=man".$chuoi_noi_curpage);
	
	}
	
}

?>