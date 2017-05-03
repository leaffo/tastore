<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=photo&act=capnhap_banner">Cập nhập Banner</a></li>
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
                <h4>Cập nhập Banner</h4>
              </div>
              <!-- Title Bar End -->
			              
              <form method="post" name="frm" action="index.php?com=photo&act=save_banner" enctype="multipart/form-data" class="basic-form inline-form">                              
                               
                <div class="col-md-2"><label>Banner hiện tại:</label></div>
                <div class="col-md-10">
                	<?php if($item['photo']!=NULL){ ?>            
                    <object width="410" height="75"  codebase="http://active.macromedia.com/flash4/cabs/swflash.cab#version=4,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">
                      <param NAME="_cx" VALUE="13414">
                      <param NAME="_cy" VALUE="6641">
                      <param NAME="FlashVars" VALUE>
                      <param NAME="Movie" VALUE="<?=_upload_hinhanh.$item['photo']?>">
                      <param NAME="Src" VALUE="<?=_upload_hinhanh.$item['photo']?>">
                      <param NAME="Quality" VALUE="High">
                      <param NAME="AllowScriptAccess" VALUE>
                      <param NAME="DeviceFont" VALUE="0">
                      <param NAME="EmbedMovie" VALUE="0">
                      <param NAME="SWRemote" VALUE>
                      <param NAME="MovieData" VALUE>
                      <param NAME="SeamlessTabbing" VALUE="1">
                      <param NAME="Profile" VALUE="0">
                      <param NAME="ProfileAddress" VALUE>
                      <param NAME="ProfilePort" VALUE="0">
                      <param NAME="AllowNetworking" VALUE="all">
                      <param NAME="AllowFullScreen" VALUE="false">
                      <param name="scale" value="ExactFit">
                      <embed src="<?=_upload_hinhanh.$item['photo']?>" quality="High" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" width="410" height="75" scale="ExactFit"></embed>
                    </object>            
                    <?php }else{ echo "Chưa có BANNER"; }?><br /><br />
                </div>
                
                <div class="col-md-2"><label>Thay đổi BANNER </label></div>
                <div class="col-md-10">
                	<input type="file" name="file" /> 
                    <span class="description">Width:410px&nbsp;-&nbsp;Height:75px&nbsp;Type:&nbsp;.swf | .jpeg | .gif | .png | .gif</span>
                    <br /><br />
                </div>
                
                <div class="col-md-2"><label>BANNER Trên SmartPhone hiện tại:</label></div>
                <div class="col-md-10">
                	<?php if($item['thumb']!=NULL){ ?>            
                    <img src="<?=_upload_hinhanh.$item['thumb']?>" width="410" height="75" border="0" />             
                    <?php }else{ echo "Chưa có BANNER Trên SmartPhone"; }?><br /><br />
                </div>
                
                <div class="col-md-2"><label>Thay đổi BANNER Trên SmartPhone </label></div>
                <div class="col-md-10">
                	<input type="file" name="file1" /> 
                    <span class="description">Width:410px&nbsp;-&nbsp;Height:75px&nbsp;Type:&nbsp; .jpeg | .gif | .png | .gif</span>
                    <br /><br />
                </div>
                                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=photo&act=capnhap_banner'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>

                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>