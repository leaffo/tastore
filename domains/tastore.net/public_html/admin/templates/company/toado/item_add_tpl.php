<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=company&act=man1">Bản đồ</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<div class="inner" style="margin-bottom:10px;">
  			<!--GHI CHÚ-->
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Chỉ nên có tối đa 4-5 bản đồ, tên bản đồ không nên đặt dài quá, nên đặt số thứ tự chính xác để dễ quản lý!</p>
            </div>
            <!--END GHI CHÚ-->
        </div>
    
    
		<!-- Inline Form Start -->
          <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="inner">

              <!-- Title Bar Start -->
              <div class="title-bar">
                <h4>Bản đồ</h4>
              </div>
              <!-- Title Bar End -->

              <form method="post" name="frm" action="index.php?com=company&act=save1<?=$chuoi_noi_curpage?>" enctype="multipart/form-data" class="basic-form inline-form">
                <div class="col-md-2"><label>Tiêu đề bản đồ</label></div>
                <div class="col-md-10"><input type="text" name="title" id="title" value="<?=$item['title']?>" placeholder="Tiêu đề bản đồ" /></div>
                <div class="col-md-2"><label>Tên công ty</label></div>
                <div class="col-md-10"><input type="text" name="ten" id="ten" value="<?=$item['ten']?>" placeholder="Tên công ty" /></div>
                <div class="col-md-2"><label>Địa chỉ</label></div>
                <div class="col-md-10"><input type="text" name="diachi" id="diachi" value="<?=$item['diachi']?>" placeholder="Địa chỉ" /></div>
                <div class="col-md-2"><label>Điện thoại</label></div>
                <div class="col-md-10"><input type="text" name="dienthoai" id="dienthoai" value="<?=$item['dienthoai']?>" placeholder="Điện thoại" /></div>
                <div class="col-md-2"><label>Tọa độ</label></div>
                <div class="col-md-10"><input type="text" name="title" id="title" value="<?=$item['title']?>" placeholder="Ví dụ: 10.834718,106.622268" /></div>
                <div class="col-md-2"><label>Số thứ tự</label></div>
                <div class="col-md-10"><input type="text" name="stt" id="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" placeholder="Số thứ tự" /></div>
                <div class="col-md-2"></div>
                <div class="col-md-10"><input type="checkbox" name="hienthi" class="icheck-blue" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /> <span class="hienthi_text">Hiển thị</span></div>
                
                
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=company&act=man1<?=$chuoi_noi_curpage?>'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>

                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>