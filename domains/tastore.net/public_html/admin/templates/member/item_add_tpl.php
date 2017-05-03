<?php
	if(!isset($item)){
?>
<script language="javascript" src="media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.frm.email, "Chưa nhập email.")){
		return false;
	}
	
	if(isEmpty(document.frm.password, "Chưa nhập mật khẩu.")){
		return false;
	}
	
	if(document.frm.password.value.length<6){
		alert("Mật khẩu phải từ 6 ký tự trở lên.");
		document.frm.oldpassword.focus();
		return false;
	}
	
	if(!isEmpty(document.frm.email) && !check_email(document.frm.email.value)){
		alert('Email không hợp lệ.');
		document.frm.email.focus();
		return false;
	}
}
</script>
<?php
	}
?>
<h3>Quản lý thành viên</h3>

<form name="frm" method="post" action="index.php?com=member&act=save<?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>" enctype="multipart/form-data" class="nhaplieu" onSubmit="return js_submit();">

	<b>Email</b> <input type="text" name="email" id="email" value="<?=$item['email']?>" class="input" /><br />
	<b>Mật khẩu</b> <input type="password" name="password" id="password" value="" class="input" /><span class="require">*</span><br />
    <b>Họ tên</b> <input type="text" name="ten" id="ten" value="<?=$item['ten']?>" class="input" /><br />	
	<b>Điện thoại</b> <input type="text" name="dienthoai" value="<?=$item['dienthoai']?>" class="input" /><br />
    <b>Giới tính</b> 
    	<input type="radio" <?=(!isset($item['sex']) || $item['sex']==1)?' checked="checked"':''?> name="gioitinh" value="1" /> Nam &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" <?=($item['sex']==0)?' checked="checked"':''?> name="gioitinh" value="0" /> Nữ &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" <?=($item['sex']==2)?' checked="checked"':''?> name="gioitinh" value="2" /> Khác
    
    <br />
    <b>Địa chỉ</b> <input type="text" name="diachi" id="diachi" value="<?=$item['diachi']?>" class="input" /><br />
	<b>Ngày sinh </b> <input type="text" name="ngaysinh" id='ngaysinh' value="<?=$item['ngaysinh']?>" class="input" /><br />
	
	<!--
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	-->
	<b>Kích hoạt</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=member&act=man<?php if($_REQUEST['curPage']!='') echo "&curPage=".$_REQUEST['curPage'];?>'" class="btn" />
</form>