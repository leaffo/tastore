<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung",
		theme : "advanced",
		convert_urls : false,
		plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,imagemanager,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks",
height:"500px",
    width:"100%",
	remove_script_host : false,

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",		
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "lists/image_list.js",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : 'Bold text', inline : 'b'},
			{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
			{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
			{title : 'Example 1', inline : 'span', classes : 'example1'},
			{title : 'Example 2', inline : 'span', classes : 'example2'},
			{title : 'Table styles'},
			{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
		],

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>

<h3>Thông tin đặt hàng</h3>
<?php
function tinhtrang($i=0)
	{
		$sql="select * from table_product_phu where com='tinhtrang' order by stt,id desc";
		$stmt=mysql_query($sql);
		$str='
			<select id="tinhtrang" name="tinhtrang" class="main_font">					
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==$i)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	
	?>
<form name="frm" method="post" action="index.php?com=dathang&act=save<?=($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''?>" enctype="multipart/form-data" class="nhaplieu">
  
	<b>Họ tên:</b> <input type="text" name="hoten" value="<?=@$item['hoten']?>" class="input" /><br />
    <b>Địa chỉ:</b> <input type="text" name="diachi" value="<?=@$item['diachi']?>" class="input" /><br />
    <b>Điện thoại:</b> <input type="text" name="dienthoai" value="<?=@$item['dienthoai']?>" class="input" /><br />
    <b>Email:</b> <input type="text" name="email" value="<?=@$item['email']?>" class="input" /><br />
    <hr />
    <b>Tiêu đề:</b> <input type="text" name="ten" value="<?=@$item['ten']?>" class="input" /><br />
    <b>Ngày đặt:</b> <input type="text" name="masp" value="<?=@$item['masp']?>" class="input" /><br />
   <!-- <b>Giá bán:</b> <input type="text" name="gia" value="<?=@$item['gia']?>" class="input" /><br />
    <b>Mã màu:</b> <input type="text" name="mamau" value="<?=@$item['mamau']?>" class="input" /><br />-->
    <!--<b>Số lượng:</b> <input type="text" name="soluong" value="<?=@$item['soluong']?>" class="input" /><br />
	<hr /> -->
       	

	<b>Ghi chú</b><br/>
	<div>
	 <textarea name="noidung" id="noidung"><?=$item['noidung']?></textarea></div><br /><br />
    
    
    <b>Tình trạng:</b> <?=tinhtrang($item['tinhtrang'])?><br />
     
    	
	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
	<input type="submit" value="Lưu" class="btn" />
	<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=dathang&act=man<?=($_REQUEST['curPage']!='')?'&curPage='.$_REQUEST['curPage']:''?>'" class="btn" />
</form>