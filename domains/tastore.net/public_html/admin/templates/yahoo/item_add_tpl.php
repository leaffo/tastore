
<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>



<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=yahoo&act=man">Tin tức</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

          <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="inner">

              <!-- Title Bar Start -->
              <div class="title-bar">
                <h4>Thêm mới</h4>
              </div>
              <!-- Title Bar End -->
			              
              <form method="post" name="frm" action="index.php?com=yahoo&act=save<?=$chuoi_noi_curpage?>" enctype="multipart/form-data" class="basic-form inline-form">              
            
                
                <div class="col-md-2"><label>Tên </label></div>
                <div class="col-md-10"><input type="text" name="ten" id="ten" value="<?=$item['ten']?>" placeholder="Tên" /></div>
                <div class="col-md-2"><label>yahoo </label></div>
                <div class="col-md-10"><input type="text" name="yahoo" id="yahoo" value="<?=$item['yahoo']?>" placeholder="Tên" /></div>
                <div class="col-md-2"><label>Skype </label></div>
                <div class="col-md-10"><input type="text" name="skype" id="skype" value="<?=$item['skype']?>" placeholder="Tên" /></div>
              <?php /*?>  <div class="col-md-2"><label>Điện thoại </label></div>
                <div class="col-md-10"><input type="text" name="dienthoai" id="dienthoai" value="<?=$item['dienthoai']?>" placeholder="Tên" /></div>
                <div class="col-md-2"><label>email </label></div>
                <div class="col-md-10"><input type="text" name="email" id="email" value="<?=$item['email']?>" placeholder="Tên" /></div><?php */?>
             
                <div class="col-md-2"><label>Số thứ tự</label></div>
                <div class="col-md-10"><input type="text" name="stt" id="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" placeholder="Số thứ tự" /></div>
                <div class="col-md-2"></div>
                <div class="col-md-10"><input type="checkbox" name="hienthi" class="icheck-blue" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /> <span class="hienthi_text">Hiển thị</span></div>
                
                
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=yahoo&act=man<?=$chuoi_noi_curpage?>'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>
                               
                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>



















