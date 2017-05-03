<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

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

<script language="javascript">				
	function select_onchange1()
	{				
		var b=document.getElementById("id_cat");
		window.location ="index.php?com=products&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_cat="+b.value;	
		return true;
	}
	function select_onchange2()
	{	
		var b=document.getElementById("id_cat");
		var c=document.getElementById("id_item");
		window.location ="index.php?com=products&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?><?php if($_REQUEST['id']!='') echo"&id=".$_REQUEST['id']; ?>&id_cat="+b.value+"&id_item="+c.value;	
		return true;
	}
		function select_onchange3()
	{	
		var b=document.getElementById("id_cat");
		var c=document.getElementById("id_item");
		var x=document.getElementById("id_item2");
		window.location ="index.php?com=products&act=<?php if($_REQUEST['act']=='edit') echo 'edit'; else echo 'add';?>&id_cat="+b.value+"&id_item="+c.value+"&id_item2="+x.value;	
		return true;
	}

	
</script>
<?php	
	function get_main_cat()
	{
		$sql_huyen="select * from table_products_cat order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select onchange="select_onchange1()" id="id_cat" name="id_cat">
			<option value="0">Chọn danh mục</option>
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_cat"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	if(!isset($item['ten'])) $item['ten']="";
?>
<?
	function get_main_item()
	{
		$sql_huyen="select * from table_products_item where id_cat='".$_REQUEST['id_cat']."'  order by id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select id="id_item" name="id_item" onchange="select_onchange21()"  class="main_font">
			<option>Chọn danh mục</option>			
			';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if($row_huyen["id"]==(int)@$_REQUEST["id_item"])
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=<?=$_GET['com']?>&act=man">Danh mục</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<!--<div class="inner" style="margin-bottom:10px;">
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Chỉ nên có tối đa 4-5 bản đồ, tên bản đồ không nên đặt dài quá, nên đặt số thứ tự chính xác để dễ quản lý!</p>
            </div>
        </div>-->
    
    
		<!-- Inline Form Start -->
          <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="inner">

              <!-- Title Bar Start -->
              <div class="title-bar">
                <h4>Thêm mới</h4>
              </div>
              <!-- Title Bar End -->
			              
              <form method="post" name="frm" action="index.php?com=<?=$_GET['com']?>&act=save<?=$chuoi_noi_curpage?>" enctype="multipart/form-data" class="basic-form inline-form">  
              
              
               <div class="col-md-12"><label>Danh mục cấp 1 </label></div>
				  <div class="col-md-3"> <?=get_main_cat();?></div>
                   <div class="col-md-12"><label>Danh mục cấp 2 </label></div>
				  <div class="col-md-3"> <?=get_main_item();?></div>
                              
                <?php if ($_REQUEST['act']=='edit'){?>
                <div class="col-md-12"><label>Hình hiện tại</label></div>
                <div class="col-md-12"><img src="<?=_upload_sanpham.$item['photo']?>"  width="150" alt="NO PHOTO" /><br /><br /></div>
                <?php }?>
                <div class="col-md-12"><label>Hình ảnh</label></div>
                
               
                <div class="col-md-12">
                	<input type="file" name="file" /> 
                    <span class="description">Type: .jpg|.gif|.png|.jpeg &nbsp;&nbsp;;&nbsp;&nbsp; </span>
                    <br /><br />
                </div>
                 
                <div class="col-md-12"><label>Mã SP </label></div>
                <div class="col-md-6"><input type="text" name="maso" id="maso" value="<?=$item['maso']?>" placeholder="" /></div>  
                <div class="col-md-12"><label>Tên </label></div>
                <div class="col-md-6"><input type="text" name="ten" id="ten" value="<?=$item['ten']?>" placeholder="Tên" /></div>
                <div class="col-md-12"><label>Giá </label></div>
                <div class="col-md-6"><input type="text" name="gia" id="gia" value="<?=$item['gia']?>" placeholder="gia" /></div>
                <div class="col-md-12"><label>Giá khuyến mãi </label></div>
                <div class="col-md-6"><input type="giakhuyenmai" name="giakhuyenmai" id="giakhuyenmai" value="<?=$item['giakhuyenmai']?>" placeholder="Tên" /></div>
                 <div class="col-md-12"><label>Đơn vị</label></div>
                <div class="col-md-3">
                <?
					$sql_donvi = "select ten,id from #_donvi  order by stt asc";
				$d->query($sql_donvi);
				$result_donvi = $d->result_array();
                ?>
                <select name="donvi" id="donvi">
                	<option value="0">Chọn đơn vị</option>
                    	<?
						 foreach((array)$result_donvi as $k=>$v){
                        ?>
                	
                   	<? if($v['ten']==$item['donvi']){?>
                    <option selected="selected" value="<?=$v['ten']?>"><?=$v['ten']?></option>
                    <? }else{?>
                    <option value="<?=$v['ten']?>"><?=$v['ten']?></option>
                    <? }?>
                     <? }?>
                </select>
                </div>
                
                <div class="col-md-12"><label>Mô tả</label></div>
                <div class="col-md-6"><textarea name="dieukhoan" cols="50" rows="6" placeholder="Mô tả ngăn"><?=$item['dieukhoan']?></textarea></div>   
               
                <div class="col-md-12"><label>Nội dung </label></div>
                <div class="col-md-12"><textarea name="noidung" id="noidung" placeholder="Nội dung"><?=$item['noidung']?></textarea><br /></div>
                
               
                <div class="col-md-12"><label>Keywords</label></div>
                <div class="col-md-6"><textarea name="keywords" cols="50" rows="6" placeholder="Keywords"><?=$item['keywords']?></textarea></div>
                <div class="col-md-12"><label>Description</label></div>
                <div class="col-md-6"><textarea name="description" cols="50" rows="6" placeholder="Description"><?=$item['description']?></textarea></div>   
                
                <div class="col-md-12"><label>Số thứ tự</label></div>
                <div class="col-md-1"><input type="text" name="stt" id="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" placeholder="Số thứ tự" /></div>
                <div class="col-md-12"></div>
                <div class="col-md-12"><input type="checkbox" name="hienthi" class="icheck-blue" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /> <span class="hienthi_text">Hiển thị</span></div>
                
                
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-12 col-md-offset-1">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=<?=$_GET['com']?>&act=man<?=$chuoi_noi_curpage?>'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>
                               
                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>