<h3>Thêm bản đồ</h3>

<form name="frm" method="post" action="index.php?com=company&act=save" enctype="multipart/form-data" class="nhaplieu">
   	  
    <b>Tên</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br />   
	<b>Google Maps</b><br />
    <p style="color:#FF0000;">Lưu ý: Chỉnh trong IFRAME - Width='100%' Height='450'</p>
    	<div>
	 <textarea name="noidung" cols="50" rows="10" placeholder="Copy đoạn nhúng IFRAME nhúng Bản đồ do Google cung cấp. Lưu ý: Chỉnh trong IFRAME - Width='100%' Height='450px'"><?=$item['noidung']?></textarea></div>
    <br />
	
	
	<b>Số thứ tự</b> <input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px"><br>
	
	<b>Hiển thị</b> <input type="checkbox" name="hienthi" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?>><br />
	
	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=company&act=man'" class="btn" />
</form>