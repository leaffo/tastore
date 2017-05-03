<?php  if(!defined('_source')) die("Error");

 
if($_SESSION['dn'][0]['email']==''){
	 redirect("dang-nhap.html");
	}

	$sql = "select * from #_member where email='".$_SESSION['dn'][0]['email']."'";
	$d->query($sql);
	$resutl_member = $d->fetch_array();
	$title_bar="Thông tin thanh viên - ";
	if(!empty($_POST)){
		
		
		$data['tendoanhnghiep'] = $_POST['tendoanhnghiep'];
			$data['ten'] = $_POST['name'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['email'] = $_POST['email'];
			
			
			
			
				$d->setTable('member');
				
				$d->setWhere('id',$_SESSION['dn'][0]['id']);
				if($d->update($data)){
						transfer("Đăng ký thành thành công", "thong-tin-thanh-vien.html");
					}else{
							transfer("Đăng ký không thành công", "index.html");
						}
		
		}

?>