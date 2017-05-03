<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "exact",
        elements : "noidung,mota,mota1",
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


<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=company&act=capnhap">Cập nhập thông tin công ty</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <!-- Inline Form Start -->
        <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="inner">

            <!-- Title Bar Start -->
            <div class="title-bar">
              <h4>Cập nhập thông tin công ty</h4>
            </div>
            <!-- Title Bar End -->

            <form method="post" name="frm" action="index.php?com=company&act=save_capnhat" enctype="multipart/form-data" class="basic-form inline-form" style="padding:10px;">
            	<!-- Tabs Navigation Start -->
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#home" data-toggle="tab">THÔNG TIN CÔNG TY</a></li>
                 <?php /*?> <li><a href="#profile" data-toggle="tab">THÔNG TIN LIÊN HỆ</a></li><?php */?>
                  <li><a href="#messages" data-toggle="tab">THÔNG TIN FOOTER</a></li>
                  <li><a href="#settings" data-toggle="tab">SEO WEBSITE</a></li>
                </ul>
                <!-- Tabs Navigation End -->

                <!-- Tab panes -->
                <div class="tab-content" style="border-bottom:1px solid #2C3E50;">
                  <div class="tab-pane active" id="home">
                        <?php if ($_REQUEST['act']=='capnhat'){?>
                <div class="col-md-2"><label>Banner hiện tại</label></div>
                <div class="col-md-10"><img src="<?=_upload_tintuc.$item['photo']?>"  width="150" alt="NO PHOTO" /><br /><br /></div>
                <?php }?>
                <div class="col-md-2"><label>Hình ảnh</label></div>
                <div class="col-md-10">
                	<input type="file" name="file" /> 
                    <span class="description">Type: .jpg|.gif|.png|.jpeg &nbsp;&nbsp;;&nbsp;&nbsp; Ảnh chuẩn: 130x130 (theo px)</span>
                    <br /><br />
                </div>
                  
                  	<div class="col-md-2"><label>Tên công ty</label></div>
                    <div class="col-md-10 paging_0px"><input type="text" name="ten" id="ten" value="<?=$item['ten']?>" placeholder="Tên công ty" /></div>
                    <div class="col-md-2"><label>Địa chỉ</label></div>
                    <div class="col-md-10 paging_0px"><input type="text" name="diachi" id="diachi" value="<?=$item['diachi']?>" placeholder="Địa chỉ" /></div>
                    <div class="col-md-2"><label>Hotline</label></div>
                    <div class="col-md-10 paging_0px"><input type="text" name="dienthoai" id="dienthoai" value="<?=$item['dienthoai']?>" placeholder="Hotline" /></div>
                    <div class="col-md-2"><label>Email</label></div>
                    <div class="col-md-10 paging_0px"><input type="text" name="email" id="email" value="<?=$item['email']?>" placeholder="Email" /></div>
                    
                    <div class="col-md-2"><label>Email gmail</label></div>
                    <div class="col-md-10 paging_0px"><input type="text" name="emailgmail" id="emailgmail" value="<?=$item['emailgmail']?>" placeholder="Email" /></div>
                    <div class="col-md-2"><label>Pass</label></div>
                    <div class="col-md-10 paging_0px"><input type="text" name="passemail" id="passemail" value="<?=$item['passemail']?>" placeholder="Email" /></div>
                    
                    
                    <div class="col-md-2"><label>Website</label></div>
                    <div class="col-md-10 paging_0px"><input type="text" name="website" id="website" value="<?=$item['website']?>" placeholder="Ví dụ: vietit.vn" /></div>
                    <div class="col-md-2"><label>Fan Facebook</label></div>
                    <div class="col-md-10 paging_0px">
                    <input type="text" name="fanface" id="fanface" value="<?=$item['fanface']?>" placeholder="" /></div> 
                       <div class="col-md-2"><label>Tài khoản ngân hàng</label></div>
                    <div class="col-md-10 paging_0px">
                    <textarea name="noidung" id="noidung"><?=$item['noidung']?></textarea>
                    </div>  
                    
                    <div class="clearfix"></div>                                      
                  </div>

                  <div class="tab-pane" id="profile">
                  	<div></div>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="tab-pane" id="messages">
                  	<div><textarea name="mota" id="mota"><?=$item['mota']?></textarea></div>
                    
                    <div class="clearfix"></div>
                  </div>

                  <div class="tab-pane" id="settings">
                  	<div class="col-md-2"><label>Title</label></div>
                    <div class="col-md-10 paging_0px"><input type="text" name="title" id="title" value="<?=$item['title']?>" placeholder="Title của website" /></div>
                    <div class="col-md-2"><label>Keywords</label></div>
                    <div class="col-md-10 paging_0px"><textarea name="keywords" cols="50" rows="6" placeholder="Keywords của website"><?=$item['keywords']?></textarea></div>
                    <div class="col-md-2"><label>Description</label></div>
                    <div class="col-md-10 paging_0px"><textarea name="description" cols="50" rows="6" placeholder="Description của website"><?=$item['description']?></textarea></div>                    
                                        
                    <div class="clearfix"></div>
                  </div>
                </div>
                                     
              <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
              
              <div class="col-md-10 col-md-offset-2 paging_0px">                  
                <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu thông tin</button>
                <button type="button" onclick="javascript:window.location='index.php'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
              </div>

              <div class="clearfix"></div>

            </form>

          </div>
        </div>
        <!-- Inline Form End -->
  </div>