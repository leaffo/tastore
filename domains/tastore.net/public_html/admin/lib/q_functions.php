<?php if(!defined('_lib')) die("Error");


//END Kiểm tra kết nối

function ngayint_ngaychu($a){
	
	$st = "/^[1-9][0-9]*$/";
	if(preg_match($st,$a)){ //Nếu là số nguyên		
		$time = time()-$a; //Thời gian còn lại
		if($time<0){
			$te = ' sau';
			$time = $time*(-1);
		}
		else
			$te = ' trước';
		
		$kq = '';
		if($time > 24*60*60){
			$n = intval($time/(24*60*60));
			if($n>0){
				$kq .= $n.' ngày ';			
				$time = $time - ($n*24*60*60);
			}
		}
		if($time > 60*60){
			$h = intval($time/(60*60));
			if($h>0){
				$kq .= $h.' giờ ';			
				$time = $time - ($h*60*60);
			}
		}
		if($time > 60){
			$p = intval($time/(60));
			if($p>0){
				$kq .= $p.' phút ';			
				$time = $time - ($p*60);
			}
		}
		if($time > 0){			
			$kq .= $time.' giây';						
		}
		$kq.=$te;
		echo $kq;
	}
	else{	//Nếu không là số nguyên
		echo '';
	}
}

function doitiensangchu($a){
	
	$st = "/^[1-9][0-9]*$/";
	if(preg_match($st,$a)){ //Nếu là số nguyên		
		$len = strlen($a);
		if($len>=9){
			$kq = intval(substr($a,0,$len-9));
			if($kq >= 1)
				echo "$kq Tỷ ";	
		}
		$a = substr($a,$len-9,$len-1);
		$len = strlen($a);
		if($len>=6){
			$kq = intval(substr($a,0,$len-6));
			if($kq >= 1)
				echo "$kq Triệu ";	
		}
		$a = substr($a,$len-6,$len-1);
		$len = strlen($a);
		if($len>=3){
			$kq = intval(substr($a,0,$len-3));
			if($kq >= 1)
				echo "$kq Ngàn ";	
		}
		$a = substr($a,0,$len);
		$len = strlen($a);
		if($len>=0){
			$kq = intval(substr($a,0,$len-3));	
			if($kq!=0)		
				echo "$kq Đồng ";	
		}
		/*$a=(double)($a);
		$kq = intval($a/1000000000);
		$a=$a%1000000000;
		if($kq>=1){
			echo "$kq Tỷ ";	
		}
		$kq = intval($a/1000000);
		$a=$a%1000000;
		if($kq>=1){
			echo "$kq Triệu ";	
		}
		$kq = intval($a/1000);
		$a=$a%1000;
		if($kq>=1){
			echo "$kq Ngàn ";	
		}
		$kq = intval($a/1);
		$a=$a%1;
		if($kq>=1){
			echo "$kq Đồng ";	
		}*/
	}
	else{	//Nếu không là số nguyên
		echo "Liên hệ";
	}
}

function q_chuoingaunhien($length) {
$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
$size = strlen( $chars );
for( $i = 0; $i < $length; $i++ ) {
$str .= $chars[ rand( 0, $size - 1 ) ];
 }
return $str;
}

function q_fns_Rand_digit($min,$max,$num,$tenhinh)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		$ten_anh=explode(".",$tenhinh);
		$result = $ten_anh[0]."-".$result;
		return $result;	
	}

	
function q_getCurrentPageURL() {
    $pageURL = 'http';
    if (@$_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if (@$_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= @$_SERVER["SERVER_NAME"].":".@$_SERVER["SERVER_PORT"].@$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= @$_SERVER["SERVER_NAME"].@$_SERVER["REQUEST_URI"];
    }
$pageURL = explode("/p=", $pageURL);
    return $pageURL[0].'/';
}




/*TEST*/
$font_path = "utm_cafeta-webfont.ttf"; // Font file
$font_size = 22; // in pixcels
$water_mark_text_2 = "NỘI THẤT MINH THÀNH"; // Watermark Text


//THÊM CHỮ QUY DỊNH TRONG BIẾN $chuoi_name VÀO ẢNH
//$data['photo'] = watermark_text(_upload_product,$photo,$file_name,$chuoi_name);				
//$data['thumb'] = create_thumb($data['photo'], 200, 135, _upload_product,$file_name,1);	
function watermark_text($folder,$oldimage_name, $new_image_name,$water_mark_text_2)
{
global $font_path, $font_size;
$image_ext = trim(strtolower(end(explode('.', $folder.$oldimage_name))));
$new_image_name=$new_image_name.'a.'.$image_ext;

list($owidth,$oheight) = getimagesize($folder.$oldimage_name);
$image = imagecreatetruecolor($owidth, $oheight);
$image_src = imagecreatefromjpeg($folder.$oldimage_name);
imagecopyresampled($image, $image_src, 0, 0, 0, 0, $owidth, $oheight, $owidth, $oheight);
$blue = imagecolorallocate($image, 255, 255, 255);
imagettftext($image, $font_size, 0, 20, $oheight-20, $blue, $font_path, $water_mark_text_2);

if($image_ext=='gif'){
	imagegif($image, $folder.$new_image_name, 100);
}
else if($filetype11 == "png") 
	imagepng($image, $folder.$new_image_name, 100);
else
	imagejpeg($image, $folder.$new_image_name, 100);

imagedestroy($image);
unlink($folder.$oldimage_name);
return $new_image_name;
}


/*Thêm ảnh lo go vào ảnh lớn*/
//Thêm logo bản quyền
//$data['photo'] =watermark_image(_upload_sanpham,$photo,$filename,_upload_hinhanh.$logo_sp['photo']);		
//----THUMB----------------------------
//$data['thumb'] = create_thumb($data['photo'], 500, 500, _upload_sanpham,$filename.time(),2);
function watermark_image($folder,$oldimage_name, $new_image_name,$image_path = "logo.png")
{
$image_ext = trim(strtolower(end(explode('.', $folder.$oldimage_name))));
$new_image_name=$new_image_name.'a.'.$image_ext;

list($owidth,$oheight) = getimagesize($folder.$oldimage_name);
$image = imagecreatetruecolor($owidth, $oheight);

//$image_src = imagecreatefromjpeg($folder.$oldimage_name);
$filetype11 = strtolower(substr($oldimage_name,strlen($oldimage_name)-4,4));
if($filetype11 == ".gif") 
	$image_src = imagecreatefromgif($folder.$oldimage_name);	
else if($filetype11 == ".png") 
	$image_src = imagecreatefrompng($folder.$oldimage_name);
else
	$image_src = imagecreatefromjpeg($folder.$oldimage_name);

imagecopyresampled($image, $image_src, 0, 0, 0, 0, $owidth, $oheight, $owidth, $oheight);

//$watermark = imagecreatefrompng($image_path);
$filetype111 = strtolower(substr($image_path,strlen($image_path)-4,4));
if($filetype111 == ".gif") $watermark = imagecreatefromgif($image_path);
else if($filetype111 == ".png"){ $watermark = imagecreatefrompng($image_path);
	

}
else
	$watermark = imagecreatefromjpeg($image_path);

list($w_width, $w_height) = getimagesize($image_path);
//$pos_x = $owidth/2 - $w_width/2;
//$pos_y = $oheight/2 - $w_height/2;
$pos_x = $owidth - $w_width-10;	//Xác định tọa độ điểm đặt ảnh
$pos_y = $oheight - $w_height-10;

imagecopy($image, $watermark, $pos_x, $pos_y, 0, 0, $w_width, $w_height);


if($filetype11 == ".gif") 
	imagegif($image, $folder.$new_image_name, 100);
else if($filetype11 == ".png"){ 	
	imagepng($image, $folder.$new_image_name, 100);
}
else
	imagejpeg($image, $folder.$new_image_name, 100);


imagedestroy($image);
unlink($folder.$oldimage_name);



return $new_image_name;

}


//THÊM CHỮ QUY DỊNH TRONG BIẾN $water_mark_text_2 ở trên VÀO ẢNH
//$data['photo'] = watermark_text(_upload_product,$photo,$file_name);				
//$data['thumb'] = create_thumb($data['photo'], 200, 135, _upload_product,$file_name,1);	
/*function watermark_text($folder,$oldimage_name, $new_image_name)
{
global $font_path, $font_size, $water_mark_text_2;
$image_ext = trim(strtolower(end(explode('.', $folder.$oldimage_name))));
$new_image_name=$new_image_name.'a.'.$image_ext;

list($owidth,$oheight) = getimagesize($folder.$oldimage_name);
$image = imagecreatetruecolor($owidth, $oheight);
$image_src = imagecreatefromjpeg($folder.$oldimage_name);
imagecopyresampled($image, $image_src, 0, 0, 0, 0, $owidth, $oheight, $owidth, $oheight);
$blue = imagecolorallocate($image, 255, 255, 255);
imagettftext($image, $font_size, 0, $owidth-255, $oheight-50, $blue, $font_path, $water_mark_text_2);
imagejpeg($image, $folder.$new_image_name, 100);
imagedestroy($image);
unlink($folder.$oldimage_name);
return $new_image_name;
}
*/


function q_ckemail($str){
	$re = '/^[a-zA-Z]+[a-zA-Z0-9_.]*\@[a-zA-Z]{2,}\.[a-zA-Z0-9]{2,}[a-zA-Z0-9.]*$/'; 
	if(preg_match($re, $str))
		return 1;
	return 0;
}
function q_ckcaptcha($str){
	if(strtoupper($_SESSION['captcha_code']) == strtoupper($str))
		return 1;
	return 0;
}
function q_isnumber($str){
	$re = '/^[0-9]+$/'; 
	if(preg_match($re, $str))
		return 1;
	return 0;
}

#----------------------------------------------------------	
?>