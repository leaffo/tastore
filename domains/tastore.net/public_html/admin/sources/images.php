<?php	if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	//CAT
	case "man_cat":
		get_cats();
		$template = "images/cat";
		break;
	case "add_cat":
		$template = "images/cat_add";
		break;
	case "edit_cat":
		get_cat();
		$template = "images/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
		
	//HÌNH ẢNH	
	case "man":
		get_items();
		$template = "images/photos";
		break;
	case "add":
		$template = "images/photo_add";
		break;
	case "edit":
		get_item();
		$template = "images/photo_edit";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	default:
		$template = "index";
}

#====================================
#==CẤP 1====================================
function get_cats(){
	global $d, $items, $paging;
			
	
	if(@$_REQUEST['noibat']!='')
	{
		$id_up = @$_REQUEST['noibat'];
		$sql_sp = "SELECT id,noibat FROM table_images_cat where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$noibat=$cats[0]['noibat'];
		//echo "id:". $spdc1;
		if($noibat==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_images_cat SET noibat =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_images_cat SET noibat =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}	
		redirect("index.php?com=images&act=man_cat".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));	
	}
	
	if(@$_REQUEST['hienthi']!='')
	{
		$id_up = @$_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_images_cat where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		//echo "id:". $spdc1;
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_images_cat SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_images_cat SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}	
		redirect("index.php?com=images&act=man_cat".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));	
	}
	
	$sql = "select * from #_images_cat where com=1 order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=images&act=man_cat";
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=images&act=man_cat".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	
	$sql = "select * from #_images_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=images&act=man_cat");
	$item = $d->fetch_array();
}

function save_cat(){
	global $d;
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=images&act=man_cat".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	$data['com'] = 1;
	if($id){
		$id =  intval($_POST['id']);
		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_images,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 210, 180, _upload_images,$file_name,2);
			$d->setTable('images_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_images.$row['photo']);
				delete_file(_upload_images.$row['thumb']);
			}
		}		
		$data['ten'] = ($_POST['ten']);
		
		$mota = $_POST['mota'];
		$noidung = $_POST['noidung'];
		if (get_magic_quotes_gpc()== false) {    		
			$mota= mysql_real_escape_string($mota); 
			$noidung= mysql_real_escape_string($noidung);     
		}   
		$data['mota'] = $mota;
		$data['noidung'] = $noidung;
				
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('images_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=images&act=man_cat".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=images&act=man_cat".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	}else{
		
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_images,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 210, 180, _upload_images,$file_name,2);
		}		
		$data['ten'] = ($_POST['ten']);
		
		$mota = $_POST['mota'];
		$noidung = $_POST['noidung'];
		if (get_magic_quotes_gpc()== false) {    		
			$mota= mysql_real_escape_string($mota); 
			$noidung= mysql_real_escape_string($noidung);     
		}   
		$data['mota'] = $mota;
		$data['noidung'] = $noidung;
		
		$data['title'] = $_POST['title'];
		$data['description'] = $_POST['description'];
		$data['keywords'] = $_POST['keywords'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		
		$d->setTable('images_cat');
		if($d->insert($data))
			redirect("index.php?com=images&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=images&act=man_cat");
	}
}

function delete_cat(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_images_cat where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_images.$row['photo']);
				delete_file(_upload_images.$row['thumb']);
			}
			$sql = "delete from #_images_cat where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=images&act=man_cat".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=images&act=man_cat".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	}else transfer("Không nhận được dữ liệu", "index.php?com=images&act=man_cat".(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
}



#==HÌNH ẢNH==================================
function get_items(){
	global $d, $items, $paging;
	
	
	
	
	if(@$_REQUEST['hienthi']!='')
	{
		$id_up = @$_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_images where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		//echo "id:". $spdc1;
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_images SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_images SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
	
		}	
		redirect("index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));	
	}
	
	$sql = "select * from #_images where id_cat='".(intval($_REQUEST['id_cat']))."' order by id desc";
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'');
	$maxR=20;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	
	$sql = "select * from #_images where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	$item = $d->fetch_array();
}

function save_item(){
	global $d;
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	if($id){
		$data['id_cat'] = ($_POST['id_cat']);	
		if($photo = upload_image("file", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_images,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 210, 180, _upload_images,$file_name,2);
			$d->setTable('images');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_images.$row['photo']);
				delete_file(_upload_images.$row['thumb']);
			}
		}		
		$data['ten'] = ($_POST['ten']);
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		
		$d->setTable('images');
		$d->setWhere('id', $id);
		if($d->update($data))
				redirect("index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	}else{
		$data['id_cat'] = ($_POST['id_cat']);	
		for($i=0;$i<5;$i++){
			$file_name=q_tenhinh($_FILES['file'.$i]['name']);
			if($photo = upload_image("file$i", 'jpg|png|gif|jpeg|JPEG|JPG|PNG|GIF',_upload_images,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 210, 180, _upload_images,$file_name,2);
				
				$data['ten'] = ($_POST['ten'.$i]);		
			
				$data['stt'] = $_POST['stt'.$i];
				$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
				
				
				$d->setTable('images');
				if($d->insert($data)){
				}
				else
					transfer("Lưu dữ liệu bị lỗi", "index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
			}		
			
		}
		redirect("index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	}
}

function delete_item(){
	global $d;
	
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_images where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_images.$row['photo']);
				delete_file(_upload_images.$row['thumb']);
			}
			$sql = "delete from #_images where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
	}else transfer("Không nhận được dữ liệu", "index.php?com=images&act=man".(($_REQUEST['id_cat']!='')?'&id_cat='.$_REQUEST['id_cat']:'').(($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''));
}


?>