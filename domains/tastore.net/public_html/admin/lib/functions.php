<?php if (!defined('_lib')) die("Error");
#
#	$id_connect : ket noi database
#
function magic_quote($str, $id_connect = false)
{
    if (is_array($str)) {
        foreach ($str as $key => $val) {
            $str[$key] = escape_str($val);
        }

        return $str;
    }

    if (is_numeric($str)) {
        return $str;
    }

    if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }

    if (function_exists('mysql_real_escape_string') AND is_resource($id_connect)) {
        return mysql_real_escape_string($str, $id_connect);
    } elseif (function_exists('mysql_escape_string')) {
        return mysql_escape_string($str);
    } else {
        return addslashes($str);
    }
}

#
#	$id_connect : ket noi database
#
function escape_str($str, $id_connect = false)
{
    if (is_array($str)) {
        foreach ($str as $key => $val) {
            $str[$key] = escape_str($val);
        }

        return $str;
    }

    if (is_numeric($str)) {
        return $str;
    }

    if (get_magic_quotes_gpc()) {
        $str = stripslashes($str);
    }

    if (function_exists('mysql_real_escape_string') AND is_resource($id_connect)) {
        return "'" . mysql_real_escape_string($str, $id_connect) . "'";
    } elseif (function_exists('mysql_escape_string')) {
        return "'" . mysql_escape_string($str) . "'";
    } else {
        return "'" . addslashes($str) . "'";
    }
}


function phpmailer_send($emai_gui, $ten_gui = 'rautot.vn', $emain_nhan = 'dangtunina@gmail.com', $chude = 'Thông tin đơn hàng', $noidung, $email_sys, $pass_sys)
{
// file 02-smtp.php
//Nhúng thu vi?n phpmailer
    require_once('phpmailer/class.phpmailer.php');
//Kh?i t?o d?i tu?ng
    $mail = new PHPMailer();


//define('GUSER', 'vietphuong.edu.vn'); // tài khoản đăng nhập Gmail
//define('GPWD', 'vietphuong123'); // mật khẩu cho cái mail này  
//

    define('GUSER', $email_sys); // tài khoản đăng nhập Gmail
    define('GPWD', $pass_sys); // mật khẩu cho cái mail này
    /*=====================================
    * THIET LAP THONG TIN GUI MAIL
    *=====================================*/
    $mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
    $mail->CharSet = 'UTF-8';
    $mail->IsSMTP(); // bật chức năng SMTP
    $mail->SMTPDebug = 0;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
    $mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
    $mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 465;
    $mail->Username = GUSER;
    $mail->Password = GPWD;

//Thiet lap thong tin nguoi gui va email nguoi gui
    $mail->SetFrom($emai_gui, $ten_gui);

//Thi?t l?p thông tin ngu?i nh?n
    $mail->AddAddress($emain_nhan, $chude);


//Thi?t l?p email nh?n email h?i dáp
//n?u ngu?i nh?n nh?n nút Reply
    $mail->AddReplyTo($emai_gui, $chude);

    /*=====================================
  * THIET LAP NOI DUNG EMAIL
  *=====================================*/

//Thi?t l?p tiêu d?
    $mail->Subject = $chude;

//Thi?t l?p d?nh d?ng font ch?
    $mail->CharSet = "utf-8";

//Thi?t l?p n?i dung chính c?a email
    $mail->MsgHTML($noidung);
//$mail->Body = $body;
    if ($mail->Send()) {
        return '1';
    } else {
        return '-1';
    }

}


// dem so nguoi online //
/////////////////////////
function count_online()
{
    /*
    CREATE TABLE `camranh_online` (
      `id` int(10) unsigned NOT NULL auto_increment,
      `session_id` varchar(255) NOT NULL,
      `time` int(10) unsigned NOT NULL,
      PRIMARY KEY  (`id`)
    ) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
    */
    global $d;
    $time = 600; // 10 phut
    $ssid = session_id();

    // xoa het han
    $sql = "delete from #_online where time<" . (time() - $time);
    $d->query($sql);
    //
    $sql = "select id,session_id from #_online order by id desc";
    $d->query($sql);
    $result['dangxem'] = $d->num_rows();
    $rows = $d->result_array();
    $i = 0;
    while (($rows[$i]['session_id'] != $ssid) && $i++ < $result['dangxem']) ;

    if ($i < $result['dangxem']) {
        $sql = "update #_online set time='" . time() . "' where session_id='" . $ssid . "'";
        $d->query($sql);
        $result['daxem'] = $rows[0]['id'];
    } else {
        $sql = "insert into #_online (session_id, time) values ('" . $ssid . "', '" . time() . "')";
        $d->query($sql);
        $result['daxem'] = mysql_insert_id();
        $result['dangxem']++;
    }

    return $result; // array('dangxem'=>'', 'daxem'=>'')
}

function check_array($array)
{
    echo "<pre>";

    print_r($array);
    echo "<pre>";
}

function make_date($time, $dot = '.', $lang = 'vi', $f = false)
{

    $str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y", $time) : date("m{$dot}d{$dot}Y", $time);
    if ($f) {
        $thu['vi'] = array('Chủ nhật', 'Thứ hai', 'Thứ ba', 'Thứ tư', 'Thứ năm', 'Thứ sáu', 'Thứ bảy');
        $thu['en'] = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $str = $thu[$lang][date('w', $time)] . ', ' . $str;
    }
    return $str;
}

function alert($s)
{
    echo '<script language="javascript"> alert("' . $s . '") </script>';
}

function delete_file($file)
{
    return @unlink($file);
}

function upload_image($file, $extension, $folder, $newname = '')
{
    if (isset($_FILES[$file]) && !$_FILES[$file]['error']) {
        //$ext = end(explode('.',$_FILES[$file]['name']));
        $array_ext = explode('.', $_FILES[$file]['name']);
        $ext = end($array_ext);
        $name = basename($_FILES[$file]['name'], '.' . $ext);

        if (strpos($extension, $ext) === false) {
            alert('Chỉ hỗ trợ upload file dạng ' . $extension);
            return false; // không hỗ trợ
        }

        if ($newname == '' && file_exists($folder . $_FILES[$file]['name']))
            for ($i = 0; $i < 100; $i++) {
                if (!file_exists($folder . $name . $i . '.' . $ext)) {
                    $_FILES[$file]['name'] = $name . $i . '.' . $ext;
                    break;
                }
            }
        else {
            $_FILES[$file]['name'] = $newname . '.' . $ext;
        }

        if (!copy($_FILES[$file]["tmp_name"], $folder . $_FILES[$file]['name'])) {
            if (!move_uploaded_file($_FILES[$file]["tmp_name"], $folder . $_FILES[$file]['name'])) {
                return false;
            }
        }
        return $_FILES[$file]['name'];
    }
    return false;
}


function setWidthHeight($width, $height, $maxWidth, $maxHeight)
{
    $ret = array($width, $height);
    $ratio = $width / $height;
    if ($width > $maxWidth || $height > $maxHeight) {
        $ret[0] = $maxWidth;
        $ret[1] = $ret[0] / $ratio;
        if ($ret[1] > $maxHeight) {
            $ret[1] = $maxHeight;
            $ret[0] = $ret[1] * $ratio;
        }
    }
    return $ret;
}

function bodautv($str)
{
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|�� �|ắ|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|�� �|ợ|ớ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|�� �|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|�� �|Ợ|Ở|Ớ|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/('|,|:|;|%|!|)/", '', $str);
    $str = preg_replace("/( )/", '-', $str);
    $str = preg_replace('/("|"|")/', '', $str);
    $str = str_replace('?', '', $str);

    return $str;
}

function transfer($msg, $page = "index.php")
{
    $showtext = $msg;
    $page_transfer = $page;
    include("./templates/transfer_tpl.php");
    exit();
}

function redirect($url = '')
{
    echo '<script language="javascript">window.location = "' . $url . '" </script>';
    exit();
}

function back($n = 1)
{
    echo '<script language="javascript">history.go = "' . -intval($n) . '" </script>';
    exit();
}

function chuanhoa($s)
{
    $s = str_replace("'", '&#039;', $s);
    $s = str_replace('"', '&quot;', $s);
    $s = str_replace('<', '&lt;', $s);
    $s = str_replace('>', '&gt;', $s);
    return $s;
}

function themdau($s)
{
    $s = addslashes($s);
    return $s;
}

function bodau($s)
{
    $s = stripslashes($s);
    return $s;
}

function dump($arr, $exit = 1)
{
    echo "<pre>";
    var_dump($arr);
    echo "<pre>";
    if ($exit) exit();
}

function paging($r, $url = '', $curPg = 1, $mxR = 5, $mxP = 5, $class_paging = 'btn btn-xs btn-default')
{
    $class_paging = 'btn btn-xs btn-default';

    if ($curPg < 1) $curPg = 1;
    if ($mxR < 1) $mxR = 5;
    if ($mxP < 1) $mxP = 5;
    $totalRows = count($r);
    if ($totalRows == 0)
        return array('source' => NULL, 'paging' => NULL);
    $totalPages = ceil($totalRows / $mxR);
    if ($curPg > $totalPages) $curPg = $totalPages;

    $_SESSION['maxRow'] = $mxR;
    $_SESSION['curPage'] = $curPg;

    $r2 = array();
    $paging = "";

    //-------------tao array------------------
    $start = ($curPg - 1) * $mxR;
    $end = ($start + $mxR) < $totalRows ? ($start + $mxR) : $totalRows;
    #echo $start;
    #echo $end;

    $j = 0;
    for ($i = $start; $i < $end; $i++)
        $r2[$j++] = $r[$i];

    //-------------tao chuoi------------------
    $curRow = ($curPg - 1) * $mxR + 1;
    if ($totalRows > $mxR) {
        $start = 1;
        $end = 1;
        $paging1 = "";
        for ($i = 1; $i <= $totalPages; $i++) {
            if (($i > ((int)(($curPg - 1) / $mxP)) * $mxP) && ($i <= ((int)(($curPg - 1) / $mxP + 1)) * $mxP)) {
                if ($start == 1) $start = $i;
                if ($i == $curPg) {
                    $paging1 .= " <a href='javascript:void(0);' class=\"btn btn-xs btn-info\">" . $i . "</a> ";//dang xem
                } else {
                    $paging1 .= " <a href='" . $url . "&curPage=" . $i . "'  class=\"{$class_paging}\">" . $i . "</a> ";
                }
                $end = $i;
            }
        }//tinh paging
        //$paging.= "Go to page :&nbsp;&nbsp;" ;
        #if($curPg>$mxP)
        #{
        $paging .= " <a href='" . $url . "' class=\"{$class_paging}\" >&laquo;</a> "; //ve dau

        #$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
        $paging .= " <a href='" . $url . "&curPage=" . ($curPg - 1) . "' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
        #}
        $paging .= $paging1;
        #if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)
        #{
        #$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
        $paging .= " <a href='" . $url . "&curPage=" . ($curPg + 1) . "' class=\"{$class_paging}\" >&#8250;</a> "; //ke

        $paging .= " <a href='" . $url . "&curPage=" . ($totalPages) . "' class=\"{$class_paging}\" >&raquo;</a> "; //ve cuoi
        #}
    }
    $r3['curPage'] = $curPg;
    $r3['source'] = $r2;
    $r3['paging'] = $paging;
    #echo '<pre>';var_dump($r3);echo '</pre>';
    return $r3;
}


function paging_home($r, $url = '', $curPg = 1, $mxR = 5, $mxP = 5, $class_paging = '')
{
    if ($curPg < 1) $curPg = 1;
    if ($mxR < 1) $mxR = 5;
    if ($mxP < 1) $mxP = 5;
    $totalRows = count($r);
    if ($totalRows == 0)
        return array('source' => NULL, 'paging' => NULL);
    $totalPages = ceil($totalRows / $mxR);
    if ($curPg > $totalPages) $curPg = $totalPages;

    $_SESSION['maxRow'] = $mxR;
    $_SESSION['curPage'] = $curPg;

    $r2 = array();
    $paging = "";

    //-------------tao array------------------
    $start = ($curPg - 1) * $mxR;
    $end = ($start + $mxR) < $totalRows ? ($start + $mxR) : $totalRows;
    #echo $start;
    #echo $end;

    $j = 0;
    for ($i = $start; $i < $end; $i++)
        $r2[$j++] = $r[$i];

    //-------------tao chuoi------------------
    $curRow = ($curPg - 1) * $mxR + 1;
    if ($totalRows > $mxR) {
        $start = 1;
        $end = 1;
        $paging1 = "";
        for ($i = 1; $i <= $totalPages; $i++) {
            if (($i > ((int)(($curPg - 1) / $mxP)) * $mxP) && ($i <= ((int)(($curPg - 1) / $mxP + 1)) * $mxP)) {
                if ($start == 1) $start = $i;
                if ($i == $curPg) {
                    $paging1 .= " <span style='display: inline-block; color: #FF0000; padding: 0px 5px; background: #F5F5FF; font-weight: bold; border: 1px solid #CCC;'>" . $i . "</span> ";//dang xem
                } else {
                    $paging1 .= " <a href='" . $url . "p=" . $i . "'  style='display: inline-block; color: #333; padding: 0px 5px; background: #F5F5FF; font-weight: bold; border: 1px solid #CCC;'>" . $i . "</a> ";
                }
                $end = $i;
            }
        }//tinh paging
        //$paging.= "Go to page :&nbsp;&nbsp;" ;
        #if($curPg>$mxP)
        #{
        $paging .= " <a href='" . $url . "' style='display: inline-block; color: #333; padding: 0px 5px; background: #F5F5FF; font-weight: bold; border: 1px solid #CCC;' >&laquo;</a> "; //ve dau

        #$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
        $paging .= " <a href='" . $url . "p=" . ($curPg - 1) . "' style='display: inline-block; color: #333; padding: 0px 5px; background: #F5F5FF; font-weight: bold; border: 1px solid #CCC;' >&#8249;</a> "; //ve truoc
        #}
        $paging .= $paging1;
        #if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)
        #{
        #$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
        $paging .= " <a href='" . $url . "p=" . ($curPg + 1) . "' style='display: inline-block; color: #333; padding: 0px 5px; background: #F5F5FF; font-weight: bold; border: 1px solid #CCC;' >&#8250;</a> "; //ke

        $paging .= " <a href='" . $url . "p=" . ($totalPages) . "' style='display: inline-block; color: #333; padding: 0px 5px; background: #F5F5FF; font-weight: bold; border: 1px solid #CCC;' >&raquo;</a> "; //ve cuoi
        #}
    }
    $r3['curPage'] = $curPg;
    $r3['source'] = $r2;
    $r3['paging'] = $paging;
    #echo '<pre>';var_dump($r3);echo '</pre>';
    return $r3;
}


function catchuoi($chuoi, $gioihan)
{
// nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
// thì không thay đổi chuỗi ban đầu
    if (strlen($chuoi) <= $gioihan) {
        return $chuoi;
    } else {
        /*
        so sánh vị trí cắt
        với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
        nếu vị trí khoảng trắng lớn hơn
        thì cắt chuỗi tại vị trí khoảng trắng đó
        */
        if (strpos($chuoi, " ", $gioihan) > $gioihan) {
            $new_gioihan = strpos($chuoi, " ", $gioihan);
            $new_chuoi = substr($chuoi, 0, $new_gioihan) . "...";
            return $new_chuoi;
        }
// trường hợp còn lại không ảnh hưởng tới kết quả
        $new_chuoi = substr($chuoi, 0, $gioihan) . "...";
        return $new_chuoi;
    }
}

function stripUnicode($str)
{
    if (!$str) return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );
    foreach ($unicode as $khongdau => $codau) {
        $arr = explode("|", $codau);
        $str = str_replace($arr, $khongdau, $str);
    }
    return $str;
}// Doi tu co dau => khong dau

function changeTitle($str)
{
    if (!$str) return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );
    foreach ($unicode as $khongdau => $codau) {
        $arr = explode("|", $codau);
        $str = str_replace($arr, $khongdau, $str);
    }

    $str = strtolower($str);
    $str = trim($str);
    $str = preg_replace('/[^a-zA-Z0-9\ ]/', '', $str);
    $str = str_replace("  ", " ", $str);
    $str = str_replace(" ", "-", $str);
    return $str;

}

function format_money($gia, $dv = ' VNĐ')
{
    if ($gia > 0) {
        $str = number_format($gia, 0, ",", ",");
        $str .= $dv;
    } else {
        $str = " Liên hệ";
    }
    return $str;
}

function format_money_m($gia, $dv = ' đ')
{
    if ($gia > 0) {
        $str = number_format($gia, 0, ",", ",");
        $str .= $dv;
    } else {
        $str = "0 đ";
    }
    return $str;
}

function getCurrentPageURL()
{
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"])) {
        if ($_SERVER["HTTPS"] == "on") {
            $pageURL .= "s";
        }
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    $pageURL = explode("&p=", $pageURL);
    return $pageURL[0];
}

function create_thumb($file, $width, $height, $folder, $file_name, $zoom_crop = '1')
{

// ACQUIRE THE ARGUMENTS - MAY NEED SOME SANITY TESTS?

    $new_width = $width;
    $new_height = $height;

    if ($new_width && !$new_height) {
        $new_height = floor($height * ($new_width / $width));
    } else if ($new_height && !$new_width) {
        $new_width = floor($width * ($new_height / $height));
    }

    $image_url = $folder . $file;
    $origin_x = 0;
    $origin_y = 0;
// GET ORIGINAL IMAGE DIMENSIONS
    $array = getimagesize($image_url);
    if ($array) {
        list($image_w, $image_h) = $array;
    } else {
        die("NO IMAGE $image_url");
    }
    $width = $image_w;
    $height = $image_h;

// ACQUIRE THE ORIGINAL IMAGE
    $array_exp = explode('.', $image_url);

    $image_ext = trim(strtolower(end($array_exp)));
    switch (strtoupper($image_ext)) {
        case 'JPG' :
        case 'JPEG' :
            $image = imagecreatefromjpeg($image_url);
            $func = 'imagejpeg';
            break;
        case 'PNG' :
            $image = imagecreatefrompng($image_url);
            $func = 'imagepng';
            break;
        case 'GIF' :
            $image = imagecreatefromgif($image_url);
            $func = 'imagegif';
            break;

        default :
            die("UNKNOWN IMAGE TYPE: $image_url");
    }

// scale down and add borders
    if ($zoom_crop == 3) {

        $final_height = $height * ($new_width / $width);

        if ($final_height > $new_height) {
            $new_width = $width * ($new_height / $height);
        } else {
            $new_height = $final_height;
        }

    }

    // create a new true color image
    $canvas = imagecreatetruecolor($new_width, $new_height);
    imagealphablending($canvas, false);

    // Create a new transparent color for image
    $color = imagecolorallocatealpha($canvas, 255, 255, 255, 127);

    // Completely fill the background of the new image with allocated color.
    imagefill($canvas, 0, 0, $color);

    // scale down and add borders
    if ($zoom_crop == 2) {

        $final_height = $height * ($new_width / $width);

        if ($final_height > $new_height) {

            $origin_x = $new_width / 2;
            $new_width = $width * ($new_height / $height);
            $origin_x = round($origin_x - ($new_width / 2));

        } else {

            $origin_y = $new_height / 2;
            $new_height = $final_height;
            $origin_y = round($origin_y - ($new_height / 2));

        }

    }

    // Restore transparency blending
    imagesavealpha($canvas, true);

    if ($zoom_crop > 0) {

        $src_x = $src_y = 0;
        $src_w = $width;
        $src_h = $height;

        $cmp_x = $width / $new_width;
        $cmp_y = $height / $new_height;

        // calculate x or y coordinate and width or height of source
        if ($cmp_x > $cmp_y) {

            $src_w = round($width / $cmp_x * $cmp_y);
            $src_x = round(($width - ($width / $cmp_x * $cmp_y)) / 2);

        } else if ($cmp_y > $cmp_x) {

            $src_h = round($height / $cmp_y * $cmp_x);
            $src_y = round(($height - ($height / $cmp_y * $cmp_x)) / 2);

        }

        // positional cropping!
        if ($align) {
            if (strpos($align, 't') !== false) {
                $src_y = 0;
            }
            if (strpos($align, 'b') !== false) {
                $src_y = $height - $src_h;
            }
            if (strpos($align, 'l') !== false) {
                $src_x = 0;
            }
            if (strpos($align, 'r') !== false) {
                $src_x = $width - $src_w;
            }
        }

        imagecopyresampled($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);

    } else {

        // copy and resize part of an image with resampling
        imagecopyresampled($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    }


    $new_file = $file_name . '_' . $new_width . 'x' . $new_height . '.' . $image_ext;
// SHOW THE NEW THUMB IMAGE
    if ($func == 'imagejpeg') $func($canvas, $folder . $new_file, 100);
    else $func($canvas, $folder . $new_file, floor($quality * 0.09));

    return $new_file;
}


function ChuoiNgauNhien($sokytu)
{
    $chuoi = "ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
    for ($i = 0; $i < $sokytu; $i++) {
        $vitri = mt_rand(0, strlen($chuoi));
        $giatri = $giatri . substr($chuoi, $vitri, 1);
    }
    return $giatri;
}

function showDigits($digits = '00000')
{
    $ret = "";
    $digits = str_split($digits);
    foreach ($digits as $digit) {
        $ret .= '<img src="images/counter/' . $digit . '.jpg" align="absmiddle" />';
    }
    return $ret;
}

function _substr($str, $n)
{
    if (strlen($str) < $n) return $str;
    $html = substr($str, 0, $n);
    $html = substr($html, 0, strrpos($html, ' '));
    return $html . '...';
}

function daysangtranglogin()
{
    $_SESSION[$login_name] = false;
    unset($_SESSION['login']);
    if ($_REQUEST['com'] != 'user' || $_REQUEST['act'] != 'login')
        redirect("index.php?com=user&act=login");
}

function taomatkhau($str)
{
    $temp = md5(trim($str));
    return $temp;
}


//Các hàm do check_website_AT đã xây dựng và thấy OK
function q_bodautv($str)
{
    if (!$str) return false;
    $unicode = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ',
        'D' => 'Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị',
        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
    );
    foreach ($unicode as $khongdau => $codau) {
        $arr = explode("|", $codau);
        $str = str_replace($arr, $khongdau, $str);
    }

    $str = strtolower($str);
    $str = trim($str);
    $str = preg_replace('/[^a-zA-Z0-9\ ]/', '', $str);
    $str = str_replace("  ", " ", $str);
    $str = str_replace(" ", "-", $str);
    return $str;
}

function q_tenhinh($tenhinh)
{    //Tạo tên hình, truyền vào $_FILES['file']['name']
    $ten_anh = explode(".", $tenhinh);
    $result = q_bodautv($ten_anh[0]) . "-" . time() . rand(0, 9);
    return $result;
}


?>