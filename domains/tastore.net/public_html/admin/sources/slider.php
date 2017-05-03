<?php	if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch($act){
	case "man_photo":
		get_photos();
		$template = "slider/photos";
		break;
	case "add_photo":		
		$template = "slider/photo_add";
		break;
	case "edit_photo":
		get_photo();
		$template = "slider/photo_edit";
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

function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}

function get_photos(){
	global $d, $items, $paging;
	
	if(isset($_REQUEST['hienthi'])&&$_REQUEST['hienthi']!='')
	{
		$id_up = $_REQUEST['hienthi'];
		$sql_sp = "SELECT id,hienthi FROM table_slider where id='".$id_up."' ";
		$d->query($sql_sp);
		$cats= $d->result_array();
		$hienthi=$cats[0]['hienthi'];
		if($hienthi==0)
		{
		$sqlUPDATE_ORDER = "UPDATE table_slider SET hienthi =1 WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}
		else
		{
		$sqlUPDATE_ORDER = "UPDATE table_slider SET hienthi =0  WHERE  id = ".$id_up."";
		$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
		}	
	}
	
	$d->setTable('slider');
	$d->setOrder('stt,id desc');
	$d->select('*');
	$d->query();

	$items = $d->result_array();
	$curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
	$url="index.php?com=slider&act=man_photo";
	$maxR=10;
	$maxP=4;
	$paging=paging($items, $url, $curPage, $maxR, $maxP);
	$items=$paging['source'];

}

function get_photo(){
	global $d, $item, $list_cat;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
	transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man_photo");
	$d->setTable('slider');
	$d->setWhere('id', $id);
	$d->select();
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=slider&act=man_photo");
	$item = $d->fetch_array();	
}

function save_photo(){
	global $d;
	$file_name=fns_Rand_digit(0,9,15);
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man_photo");
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
			if($photo = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_slide,$file_name)){
				$data['photo'] = $photo;
				$data['thumb'] = create_thumb($data['photo'], 1366, 420, _upload_slide,$file_name,1);
				$d->setTable('slider');
				$d->setWhere('id', $id);
				$d->select();
				if($d->num_rows()>0){
					$row = $d->fetch_array();
					delete_file(_upload_slide.$row['photo']);
					delete_file(_upload_slide.$row['thumb']);
				}
			}
            $file_name=fns_Rand_digit(0,9,15);
            if($photo = upload_image("file1", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_slide,$file_name)){
                $data['photo1'] = $photo;
                $d->setTable('slider');
                $d->setWhere('id', $id);
                $d->select();
                if($d->num_rows()>0){
                    $row = $d->fetch_array();
                    delete_file(_upload_slide.$row['photo1']);
                }
            }

            $file_name=fns_Rand_digit(0,9,15);
            if($photo = upload_image("file2", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_slide,$file_name)){
                $data['photo2'] = $photo;
                $d->setTable('slider');
                $d->setWhere('id', $id);
                $d->select();
                if($d->num_rows()>0){
                    $row = $d->fetch_array();
                    delete_file(_upload_slide.$row['photo2']);
                }
            }

            $file_name=fns_Rand_digit(0,9,15);
            if($photo = upload_image("file3", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_slide,$file_name)){
                $data['photo3'] = $photo;
                $d->setTable('slider');
                $d->setWhere('id', $id);
                $d->select();
                if($d->num_rows()>0){
                    $row = $d->fetch_array();
                    delete_file(_upload_slide.$row['photo3']);
                }
            }

            $data['x1']=$_POST['x1'];
            $data['x2']=$_POST['x2'];
            $data['x3']=$_POST['x3'];

            $data['x_4']=$_POST['x_4'];
            $data['x_5']=$_POST['x_5'];

            $data['y1']=$_POST['y1'];
            $data['y2']=$_POST['y2'];
            $data['y3']=$_POST['y3'];

            $data['y_4']=$_POST['y_4'];
            $data['y_5']=$_POST['y_5'];


			$data['stt'] = $_POST['stt'];
            $data['danhmuc_id'] = $_POST['danhmuc_id'];
			$data['link'] = $_POST['link'];	
			$data['ten'] = $_POST['ten'];

            $data['title1'] = $_POST['title1'];
            $data['title2'] = $_POST['title2'];

			$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
			$d->reset();
			$d->setTable('slider');
			$d->setWhere('id', $id);
			if(!$d->update($data)) transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=slider&act=man_photo");
			redirect("index.php?com=slider&act=man_photo");
			
	}else{ 			
				if($data['photo'] = upload_image("file", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_slide,$file_name))
				{						
				    $data['thumb'] = create_thumb($data['photo'], 1366,420, _upload_slide,$file_name,1);
				}

                $file_name=fns_Rand_digit(0,9,15);
                if($photo = upload_image("file1", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_slide,$file_name)){
                    $data['photo1'] = $photo;
                }

                $file_name=fns_Rand_digit(0,9,15);
                if($photo = upload_image("file2", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_slide,$file_name)){
                    $data['photo2'] = $photo;
                }

                $file_name=fns_Rand_digit(0,9,15);
                if($photo = upload_image("file3", 'jpg|png|gif|JPG|PNG|GIF|jpeg|JPEG', _upload_slide,$file_name)){
                    $data['photo3'] = $photo;
                }

                $data['x1']=$_POST['x1'];
                $data['x2']=$_POST['x2'];
                $data['x3']=$_POST['x3'];

                $data['x_4']=$_POST['x_4'];
                $data['x_5']=$_POST['x_5'];

                $data['y1']=$_POST['y1'];
                $data['y2']=$_POST['y2'];
                $data['y3']=$_POST['y3'];

                $data['y_4']=$_POST['y_4'];
                $data['y_5']=$_POST['y_5'];


                $data['danhmuc_id'] = $_POST['danhmuc_id'];
                $data['stt'] = $_POST['stt'];
                $data['ten'] = $_POST['ten'];
                $data['title1'] = $_POST['title1'];
                $data['title2'] = $_POST['title2'];
                $data['link'] = $_POST['link'];
                $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
                $d->setTable('slider');
                if(!$d->insert($data)) transfer("Lưu dữ liệu bị lỗi", "index.php?com=slider&act=man_photo");

		redirect("index.php?com=slider&act=man_photo");
	}
}

function delete_photo(){
	global $d;
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		$d->setTable('slider');
		$d->setWhere('id', $id);
		$d->select();
		if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=slider&act=man_photo");
		$row = $d->fetch_array();
		delete_file(_upload_slide.$row['photo']);
		delete_file(_upload_slide.$row['thumb']);
		if($d->delete())
			redirect("index.php?com=slider&act=man_photo");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=slider&act=man_photo");
	}else transfer("Không nhận được dữ liệu", "index.php?com=slider&act=man_photo");
}

#====================================
function get_list_cat($id=0){
	global $d, $list_cat;
	
	$sql = "select * from #_tours order by id desc";
	$d->query($sql);
	$cats = $d->result_array();
	
	$list_cat = '<select name="id_item" class="input">';
	for($i=0, $count=count($cats); $i<$count; $i++)
		$list_cat .= '<option value="'.$cats[$i]['id'].'" '.(($cats[$i]['id']==$id)?'selected="selected"':'').'>'.$cats[$i]['tieude'].'</option>';
	$list_cat .= '</select>';
}


?>

	
