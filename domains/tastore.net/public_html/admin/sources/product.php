<?php	if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin();

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

#=========SẢN PHẨM==================================================
$chuoi_noi = ((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"").((@$_REQUEST['id_cat2']!="")?("&id_cat2=".$_REQUEST['id_cat2'].""):"");
$chuoi_noi_curpage = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").$chuoi_noi.((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):"");
#=========DANH MỤC CẤP 1 ================================	
$chuoi_noi_curpage1 = ((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):"");
#======DANH MỤC CẤP 2====================================
$chuoi_noi2 = ((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"");
$chuoi_noi_curpage2 = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").$chuoi_noi2.((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):"");
#==========DANH MỤC CẤP 3================================	
$chuoi_noi3 = ((@$_REQUEST['id_cat']!="")?("&id_cat=".$_REQUEST['id_cat'].""):"").((@$_REQUEST['id_cat1']!="")?("&id_cat1=".$_REQUEST['id_cat1'].""):"");
$chuoi_noi_curpage3 = ((@$_REQUEST['search']!="")?("&search=".$_REQUEST['search'].""):"").$chuoi_noi3.((@$_REQUEST['curPage']!="")?("&curPage=".$_REQUEST['curPage'].""):"");
#==========HÌNH ẢNH SẢN PHẨM=============================================	

switch($act){
	#=========SẢN PHẨM==================================================
	case "man":
		get_items();		
		$template = "product/items";
		break;
	case "add":		
		$template = "product/item_add";
		break;
	case "edit":		
		get_item();
		$template = "product/item_add";
		break;
	case "save":
		save_item();
		break;
	case "delete":
		delete_item();
		break;
	
		
	#=========DANH MỤC CẤP 1 ================================	
	case "man_cat":
		get_cats();		
		$template = "product/cats";
		break;
	case "add_cat":		
		$template = "product/cat_add";
		break;
	case "edit_cat":		
		get_cat();
		$template = "product/cat_add";
		break;
	case "save_cat":
		save_cat();
		break;
	case "delete_cat":
		delete_cat();
		break;
	#==========DANH MỤC CẤP 2================================	
	case "man_cat1":
		get_cat1s();
		$template = "product/cat1";
		break;
	case "add_cat1":		
		$template = "product/cat1_add";
		break;
	case "edit_cat1":		
		get_cat1();
		$template = "product/cat1_add";
		break;
	case "save_cat1":
		save_cat1();
		break;
	case "delete_cat1":
		delete_cat1();
		break;
	#==========DANH MỤC CẤP 3================================	
	case "man_cat2":
		get_cat2s();
		$template = "product/cat2";
		break;
	case "add_cat2":		
		$template = "product/cat2_add";
		break;
	case "edit_cat2":		
		get_cat2();
		$template = "product/cat2_add";
		break;
	case "save_cat2":
		save_cat2();
		break;
	case "delete_cat2":
		delete_cat2();
		break;
	
	
	#==========HÌNH ẢNH SẢN PHẨM=============================================	
	case "man_photo":
		get_photos();
		$template = "product/photo";
		break;
	case "add_photo":		
		$template = "product/photo_add";
		break;
	case "edit_photo":		
		get_photo();
		$template = "product/photo_edit";
		break;
	case "save_photo":
		save_photo();
		break;
	case "delete_photo":
		delete_photo();
		break;		
		
	default:
		$template = "index";
}

#SẢN PHẨM====================================

function thaydoi_hienthi($a,$table,$com,$act,$chuoi_noi_curpage){
	global $d;
	if($_REQUEST[$a]!='')
	{
		$id_up = intval($_REQUEST[$a]);
		$sql_sp = "SELECT id,$a FROM $table where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->fetch_array();
		$spdc1=$cats[$a];
		if($spdc1==0){
			$sqlUPDATE_ORDER = "UPDATE $table SET $a = 1 WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else{
			$sqlUPDATE_ORDER = "UPDATE $table SET $a = 0  WHERE  id = ".$id_up."";
			$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");	
		}	
		redirect("index.php?com=$com&act=$act".$chuoi_noi_curpage);	
	}
}

function get_items(){
	global $d, $items, $paging, $chuoi_noi_curpage;
	
	thaydoi_hienthi('noibat','table_product','product','man',$chuoi_noi_curpage);
	thaydoi_hienthi('spbanchay','table_product','product','man',$chuoi_noi_curpage);
	thaydoi_hienthi('spmoi','table_product','product','man',$chuoi_noi_curpage);
	thaydoi_hienthi('hot','table_product','product','man',$chuoi_noi_curpage);
	thaydoi_hienthi('hienthi','table_product','product','man',$chuoi_noi_curpage);	
	thaydoi_hienthi('tinhtrang','table_product','product','man',$chuoi_noi_curpage);		
		
	#-------------------------------------------------------------------------------
	$sql = "select * from #_product where id!=0 ";
	
	if((int)$_REQUEST['id_cat']!=''&&(int)$_REQUEST['id_cat']!=0)	
		$sql.=" and id_cat=".(int)$_REQUEST['id_cat']."";
	if((int)$_REQUEST['id_cat1']!=''&&(int)$_REQUEST['id_cat1']!=0)
		$sql.=" and id_cat1=".(int)$_REQUEST['id_cat1']."";
	if((int)$_REQUEST['id_cat2']!=''&&(int)$_REQUEST['id_cat2']!=0)	
		$sql.=" and id_cat2=".(int)$_REQUEST['id_cat2']."";		
	
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and ten like '%$ten%'";
	}
		
	$sql.=" order by id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man";
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];	
	
	if(isset($_REQUEST['id_cat']))
		$url .= "&id_cat=".$_REQUEST['id_cat'];
	if(isset($_REQUEST['id_cat1']))
		$url .= "&id_cat1=".$_REQUEST['id_cat1'];
	if(isset($_REQUEST['id_cat2']))
		$url .= "&id_cat2=".$_REQUEST['id_cat2'];
		
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_item(){
	global $d, $item, $chuoi_noi_curpage;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man".$chuoi_noi_curpage);
	
	$sql = "select * from #_product where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man".$chuoi_noi_curpage);
	$item = $d->fetch_array();
}

function save_item(){
	global $d, $name, $chuoi_noi, $chuoi_noi_curpage;
	
	$file_name=q_tenhinh($_FILES['file']['name']);	
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man".$chuoi_noi_curpage);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	
	//Dữ liệu chung
	$data['id_cat'] = (int)$_POST['id_cat'];
	$data['id_cat1'] = (int)$_POST['id_cat1'];
	$data['id_cat2'] = (int)$_POST['id_cat2'];		
	
	$data['ten'] = magic_quote($_POST['ten']);
	$data['tenkhongdau'] = q_bodautv($_POST['ten']);
			
	/*//Trả về 1 mảng.
	$mang = $_POST['array'];
	//Nối thành 1 chuỗi
	$chuoi = implode(",", $mang);
	
	$data['array'] = $chuoi;*/
				
	$data['tag'] = magic_quote($_POST['tag']);
	$data['masp'] = magic_quote($_POST['masp']);
	$data['soluong'] = magic_quote($_POST['soluong']);
	
	$data['title'] = magic_quote($_POST['title']);
	$data['description'] = magic_quote($_POST['description']);
	$data['keywords'] = magic_quote($_POST['keywords']);
	
	$data['gia'] = magic_quote($_POST['gia']);
	$data['giacu'] = magic_quote($_POST['giacu']);
			
	$data['mota'] = magic_quote($_POST['mota']);
	$data['noidung'] = magic_quote($_POST['noidung']);
			
	$data['stt'] = magic_quote($_POST['stt']);
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;	
	
	if($id){		//Sửa	
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;	
			$data['thumb'] = create_thumb($data['photo'], 550, 395, _upload_sanpham,$file_name,2);
			$d->setTable('product');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}			
		}
		//Riêng							
		$data['ngaysua'] = time();
				
		$d->setTable('product');
		$d->setWhere('id', $id);
		if($d->update($data)){			
			transfer("Cập nhật dữ liệu thành công", "index.php?com=product&act=man".$chuoi_noi_curpage);
		}else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man".$chuoi_noi_curpage);
	}else{		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 550, 395, _upload_sanpham,$file_name,2);
			
		}
		//Riêng				
		$data['ngaytao'] = time();
		
		$d->setTable('product');
		if($d->insert($data)){
			transfer("Thêm sản phẩm thành công", "index.php?com=product&act=man".$chuoi_noi);
		}else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man".$chuoi_noi_curpage);
	}
}

function delete_product($id){
	global $d;	
	$d->reset();
				
	//Xóa ảnh con của nó
	$sql = "select photo,thumb from #_product_photo where id_cat=$id";
	$d->query($sql);
	if($d->num_rows()>0){
		while($row = $d->fetch_array()){
			delete_file(_upload_sanpham.$row['photo']);
			delete_file(_upload_sanpham.$row['thumb']);
		}
	}
	$sql = "delete from #_product_photo where id_cat=$id";
	$d->query($sql);
			
	//Xóa ảnh của nó
	$sql = "select photo,thumb from #_product where id=$id";
	$d->query($sql);
	if($d->num_rows()>0){
		while($row = $d->fetch_array()){
			delete_file(_upload_sanpham.$row['photo']);
			delete_file(_upload_sanpham.$row['thumb']);
		}			
	}	
	$sql = "delete from #_product where id=$id";
	if($d->query($sql))
		return 1;
	return 0;
}

function delete_item(){
	global $d,$chuoi_noi_curpage;	
	
	if(isset($_GET['id'])){
		$id =  intval($id);		
		if(delete_product($id)==0)
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man".$chuoi_noi_curpage);
	}else if (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  intval($idTin);	
			if(delete_product($id)==0)
				transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man".$chuoi_noi_curpage);
		}
		transfer("Xóa dữ liệu thành công", "index.php?com=product&act=man".$chuoi_noi_curpage);
	}
	else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man".$chuoi_noi_curpage);
}


#DANH MỤC CẤP 1====================================

function get_cats(){
	global $d, $items, $paging,$chuoi_noi_curpage1;
	
	thaydoi_hienthi('hienthi','table_product_cat','product','man_cat',$chuoi_noi_curpage1);
	thaydoi_hienthi('hot','table_product_cat','product','man_cat',$chuoi_noi_curpage1);
	thaydoi_hienthi('noibat','table_product_cat','product','man_cat',$chuoi_noi_curpage1);
		
	$sql = "select * from #_product_cat where com='cat' ";
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and ten like '%$ten%'";
	}
	$sql .= " order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_cat";
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];	
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat(){
	global $d, $item,$chuoi_noi_curpage1;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat".$chuoi_noi_curpage1);
	
	$sql = "select * from #_product_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat".$chuoi_noi_curpage1);
	$item = $d->fetch_array();	
}

function save_cat(){
	global $d,$chuoi_noi_curpage1;		
	$file_name=q_tenhinh($_FILES['file']['name']);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat".$chuoi_noi_curpage1);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	
	//Dữ liệu chung
	$data['com'] = 'cat';
	$data['tenkhongdau'] = q_bodautv($_POST['ten']);
	$data['ten'] = magic_quote($_POST['ten']);
	
	$data['title'] = magic_quote($_POST['title']);
	$data['description'] = magic_quote($_POST['description']);
	$data['keywords'] = magic_quote($_POST['keywords']);
	
	$data['stt'] = magic_quote($_POST['stt']);
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;			
			$d->setTable('product_cat');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);				
			}
		}									
		
		$d->setTable('product_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat".$chuoi_noi_curpage1);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat".$chuoi_noi_curpage1);
	}else{
		if($photo = upload_image("file", 'jpg|jpeg|png|gif|JPG|JPEG|PNG|GIF', _upload_sanpham,$file_name)){
			$data['photo'] = $photo;						
		}
							
		$d->setTable('product_cat');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat");
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat".$chuoi_noi_curpage1);
	}
}

function delete_cat(){
	global $d, $chuoi_noi_curpage1;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();	
		
		//Xóa ảnh con của sản phẩm con
		$sql = "select id from #_product where id_cat='".$id."'";
		$d->query($sql);
		$row = $d->fetch_array();
		if(delete_product($row['id'])==0)
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat".$chuoi_noi_curpage1);
		
		//Xóa danh mục cấp 2 (danh mục cấp 2)							
		$sql = "delete from #_product_cat where com='cat1' and id_cat=$id";
		$d->query($sql);
		//Xóa danh mục cấp 3 (danh mục cấp 3)							
		$sql = "delete from #_product_cat where com='cat2' and id_cat=$id";
		$d->query($sql);
		
		//Xóa chính nó	(danh mục cấp 1)	
		$sql = "select photo from #_product_cat where id='".$row['id']."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
			}
		}
				
		$sql = "delete from #_product_cat where id=$id";
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat".$chuoi_noi_curpage1);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat".$chuoi_noi_curpage1);
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat".$chuoi_noi_curpage1);
}

#======DANH MỤC CẤP 2====================================

function get_cat1s(){
	global $d, $items, $paging, $chuoi_noi_curpage2;
	
	thaydoi_hienthi('hienthi','table_product_cat','product','man_cat1',$chuoi_noi_curpage2);
	thaydoi_hienthi('noibat','table_product_cat','product','man_cat1',$chuoi_noi_curpage2);
	
	
	$sql = "select * from #_product_cat where com='cat1'";
		
	if((int)$_REQUEST['id_cat']!='')
		$sql.=" and id_cat=".$_REQUEST['id_cat']."";
	
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and ten like '%$ten%'";
	}
	
	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_cat1";
	if(isset($_REQUEST['id_cat']))
		$url .= "&id_cat=".$_REQUEST['id_cat'];		
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];		
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat1(){
	global $d, $item, $chuoi_noi_curpage2;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat1".$chuoi_noi_curpage2);
	
	$sql = "select * from #_product_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat1".$chuoi_noi_curpage2);
	$item = $d->fetch_array();	
}

function save_cat1(){
	global $d, $chuoi_noi_curpage2, $chuoi_noi2;
		
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat1".$chuoi_noi_curpage2);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['com'] = 'cat1';
	$data['id_cat'] = intval($_POST['id_cat']);
	$data['tenkhongdau'] = q_bodautv($_POST['ten']);
	$data['ten'] = magic_quote($_POST['ten']);
	
	$data['title'] = magic_quote($_POST['title']);
	$data['description'] = magic_quote($_POST['description']);
	$data['keywords'] = magic_quote($_POST['keywords']);
	
	$data['stt'] = magic_quote($_POST['stt']);
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){					
		$d->setTable('product_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat1".$chuoi_noi_curpage2);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat1".$chuoi_noi_curpage2);
	}else{		
		$d->setTable('product_cat');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat1".$chuoi_noi2);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat1".$chuoi_noi_curpage2);
	}
}

function delete_cat1(){
	global $d, $chuoi_noi_curpage2;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
		
		//Xóa ảnh con của nó
		$sql = "select id from #_product where id_cat1='".$id."'";
		$d->query($sql);
		$row = $d->fetch_array();
		if(delete_product($row['id'])==0)
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat1".$chuoi_noi_curpage2);
		
		//Xóa danh mục cấp 3 (danh mục cấp 3)							
		$sql = "delete from #_product_cat where com='cat2' and id_cat1=$id";
		$d->query($sql);
		
		//Xóa chính nó (danh mục cấp 2)			
		$sql = "delete from #_product_cat where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat1".$chuoi_noi_curpage2);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat1".$chuoi_noi_curpage2);
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat1".$chuoi_noi_curpage2);
}

#====================================


#======DANH MỤC CẤP 3====================================
function get_cat2s(){
	global $d, $items, $paging,$chuoi_noi_curpage3;
	
	thaydoi_hienthi('hienthi','table_product_cat','product','man_cat2',$chuoi_noi_curpage3);
	thaydoi_hienthi('noibat','table_product_cat','product','man_cat2',$chuoi_noi_curpage3);	
	
	$sql = "select * from #_product_cat where com='cat2'";
		
	if((int)$_REQUEST['id_cat']!='')
		$sql.=" and id_cat=".$_REQUEST['id_cat']."";
	if((int)$_REQUEST['id_cat1']!='')
		$sql.=" and id_cat1=".$_REQUEST['id_cat1']."";
	
	if($_REQUEST['search']!=''){
		$ten = magic_quote($_REQUEST['search']);
		$ten = str_replace('%20',' ',$ten);
		$sql.=" and ten like '%$ten%'";
	}

	$sql.=" order by stt asc,id desc";
	
	$d->query($sql);
	$items = $d->result_array();
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_cat2";
	if(isset($_REQUEST['search']))
		$url .= "&search=".$_REQUEST['search'];	
		
	if(isset($_REQUEST['id_cat']))
		$url .= "&id_cat=".$_REQUEST['id_cat'];
	if(isset($_REQUEST['id_cat1']))
		$url .= "&id_cat1=".$_REQUEST['id_cat1'];
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_cat2(){
	global $d, $item,$chuoi_noi_curpage3;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat2".$chuoi_noi_curpage3);
	
	$sql = "select * from #_product_cat where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_cat2".$chuoi_noi_curpage3);
	$item = $d->fetch_array();	
}

function save_cat2(){
	global $d,$chuoi_noi3,$chuoi_noi_curpage3;
		
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat2".$chuoi_noi_curpage3);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";
	//Dùng chung
	$data['com'] = 'cat2';
	$data['id_cat'] = intval($_POST['id_cat']);
	$data['id_cat1'] = intval($_POST['id_cat1']);
	$data['tenkhongdau'] = q_bodautv($_POST['ten']);
	$data['ten'] = magic_quote($_POST['ten']);
	
	$data['title'] = magic_quote($_POST['title']);
	$data['description'] = magic_quote($_POST['description']);
	$data['keywords'] = magic_quote($_POST['keywords']);
	
	$data['stt'] = magic_quote($_POST['stt']);
	$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
	
	if($id){					
		$d->setTable('product_cat');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_cat2".$chuoi_noi_curpage3);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_cat2".$chuoi_noi_curpage3);
	}else{		
		$d->setTable('product_cat');
		if($d->insert($data))
			redirect("index.php?com=product&act=man_cat2".$chuoi_noi3);
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_cat2".$chuoi_noi_curpage3);
	}
}

function delete_cat2(){
	global $d,$chuoi_noi_curpage3;
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
		
		//Xóa ảnh con của nó
		$sql = "select id from #_product where id_cat2='".$id."'";
		$d->query($sql);
		$row = $d->fetch_array();
		if(delete_product($row['id'])==0)
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man".$chuoi_noi_curpage3);

		//Xóa chính nó (danh mục cấp 2)			
		$sql = "delete from #_product_cat where id='".$id."'";
		if($d->query($sql))
			redirect("index.php?com=product&act=man_cat2".$chuoi_noi_curpage3);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_cat2".$chuoi_noi_curpage3);
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_cat2".$chuoi_noi_curpage3);
}

#====================================



#ẢNH PRODUCT========================================================
function get_photos(){
	global $d, $items, $paging, $chuoi_noi_curpage2;
	
	thaydoi_hienthi('hienthi','table_product_photo','product','man_photo',$chuoi_noi_curpage2);
		
	#-------------------------------------------------------------------------------
	$sql = "select * from #_product_photo";	
	if(isset($_REQUEST['id_cat']))
		$sql.=" where id_cat=".$_REQUEST['id_cat'];		
	$sql.=" order by id desc";
			
	$d->query($sql);
	$items = $d->result_array();
	
	
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=product&act=man_photo";
	$maxR=20;
	$maxP=10;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];
}

function get_photo(){
	global $d, $item, $chuoi_noi_curpage2;
	$id = isset($_GET['id']) ? intval($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo".$chuoi_noi_curpage2);
	
	$sql = "select * from #_product_photo where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=product&act=man_photo".$chuoi_noi_curpage2);
	$item = $d->fetch_array();
}

function save_photo(){
	global $d, $chuoi_noi_curpage2, $chuoi_noi2;			
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo".$chuoi_noi_curpage2);
	$id = isset($_POST['id']) ? intval($_POST['id']) : "";

	if($id){		
		$filename=q_tenhinh($_FILES['file']['name']);
		
		if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$filename)){
			$data['photo'] = $photo;
			$data['thumb'] = create_thumb($data['photo'], 550, 395, _upload_sanpham,$filename,2);
			$d->setTable('product_photo');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
		}				
		$data['id_cat'] = $_REQUEST['id_cat'];
		$data['ten'] = $_POST['ten'];
		
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$d->setTable('product_photo');
		$d->setWhere('id', $id);
		if($d->update($data))
			redirect("index.php?com=product&act=man_photo".$chuoi_noi_curpage2);
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_photo".$chuoi_noi_curpage2);
	}else{			
		for($i=0; $i<5; $i++){			
			$filename=q_tenhinh($_FILES['file'.$i]['name']);
			
			if($photo = upload_image("file$i", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_sanpham,$filename.$i)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 550, 395, _upload_sanpham,$filename.$i,2);
										
				$data['id_cat'] = $_REQUEST['id_cat'];
				$data['ten'] = $_POST['ten'.$i];
			
				$data['stt'] = $_POST['stt'.$i];
				$data['hienthi'] = isset($_POST['hienthi'.$i]) ? 1 : 0;
				$d->setTable('product_photo');
				if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_photo".$chuoi_noi_curpage2);
			}
		}
		redirect("index.php?com=product&act=man_photo".$chuoi_noi2);
	}
}

function delete_photo(){
	global $d,$chuoi_noi_curpage2;
		
	if(isset($_GET['id'])){
		$id =  intval($_GET['id']);
		$d->reset();
		$sql = "select id, photo,thumb from #_product_photo where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			while($row = $d->fetch_array()){
				delete_file(_upload_sanpham.$row['photo']);
				delete_file(_upload_sanpham.$row['thumb']);
			}
			$sql = "delete from #_product_photo where id='".$id."'";
			$d->query($sql);
		}
		if($d->query($sql))
			redirect("index.php?com=product&act=man_photo".$chuoi_noi_curpage2);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_photo".$chuoi_noi_curpage2);
	}else transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo".$chuoi_noi_curpage2);
}


?>