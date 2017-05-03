<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) die("Error");
$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	//GIỚI THIỆU
	case "capnhap":
		gets(0,'capnhap');
		$template = "about/item_add";
		break;
	case "save":
		save(0,'capnhap');
		break;
	
	//GIỚI THIỆU 1
	case "capnhap1":
		gets(1,'capnhap1');
		$template = "about/item1_add";
		break;
	case "save1":
		save(1,'capnhap1');
		break;
		
	//GIỚI THIỆU 2
	case "capnhap2":
		gets(2,'capnhap2');
		$template = "about/item2_add";
		break;
	case "save2":
		save(2,'capnhap2');
		break;
		
		
		
		
		
		
		
	//GIỚI THIỆU 3
	case "capnhap3":
		gets(3,'capnhap3');
		$template = "about/item3_add";
		break;
	case "save3":
		save(3,'capnhap3');
		break;
	
	//GIỚI THIỆU 4
	case "capnhap4":
		gets(4,'capnhap4');
		$template = "about/item4_add";
		break;
	case "save4":
		save(4,'capnhap4');
		break;
	
	//GIỚI THIỆU 5
	case "capnhap5":
		gets(5,'capnhap5');
		$template = "about/item5_add";
		break;
	case "save5":
		save(5,'capnhap5');
		break;	
	
	//GIỚI THIỆU 6
	case "capnhap6":
		gets(6,'capnhap6');
		$template = "about/item6_add";
		break;
	case "save6":
		save(6,'capnhap6');
		break;	
		
	//GIỚI THIỆU 7
	case "capnhap7":
		gets(7,'capnhap7');
		$template = "about/item7_add";
		break;
	case "save7":
		save(7,'capnhap7');
		break;						
	
	//GIỚI THIỆU 8
	case "capnhap8":
		gets(8,'capnhap8');
		$template = "about/item8_add";
		break;
	case "save8":
		save(8,'capnhap8');
		break;
		
	//GIỚI THIỆU 9
	case "capnhap9":
		gets(9,'capnhap9');
		$template = "about/item9_add";
		break;
	case "save9":
		save(9,'capnhap9');
		break;			
		
	default:
		$template = "index";
}


//GIỚI THIỆU
function gets($c,$act){
	global $d, $item;

	$sql = "select * from #_about where com=$c";
	$d->query($sql);
	$item = $d->fetch_array();
}

function save($c,$act){
	global $d;
	
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=about&act=$act");			
	
	$sql = "select * from #_about where com=$c limit 0,1";
	$d->query($sql);
	if($d->num_rows()!=0){
		$d->reset();
		
		$data['mota'] = magic_quote($_POST['mota']);
		$data['noidung'] = magic_quote($_POST['noidung']);
		
		$data['title'] = magic_quote($_POST['title']);
		$data['description'] = magic_quote($_POST['description']);
		$data['keywords'] = magic_quote($_POST['keywords']);
		
		$d->setTable('about');
		$d->setWhere('com',''.$c);
		if($d->update($data))
			transfer("Dữ liệu được cập nhập", "index.php?com=about&act=$act");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=about&act=$act");
	}
	else{
		$d->reset();
		$data['com'] = $c;
		
		$data['mota'] = magic_quote($_POST['mota']);
		$data['noidung'] = magic_quote($_POST['noidung']);
		
		$data['title'] = magic_quote($_POST['title']);
		$data['description'] = magic_quote($_POST['description']);
		$data['keywords'] = magic_quote($_POST['keywords']);
		
		$d->setTable('about');
		if($d->insert($data))
			transfer("Dữ liệu được thêm vào", "index.php?com=about&act=$act");
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=about&act=$act");	
	}
			
}


?>