

<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>



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
    	
    
      <?
				$idc=explode('-',$_GET['idc']);
				$ten="Tên ";
				if($idc[0]=='QC'){
					$ten="Link ";
					
					}
                ?>
		<!-- Inline Form Start -->
          <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="inner">

              <!-- Title Bar Start -->
              <div class="title-bar">
                <h4>Thêm mới</h4>
              </div>
              <!-- Title Bar End -->


			              
              <form method="post" name="frm" action="index.php?com=<?=$_GET['com']?>&act=save&idc=<?=$_REQUEST['idc']?><?=$chuoi_noi_curpage?>" enctype="multipart/form-data" class="basic-form inline-form">              
        
    	 <div class="col-md-12"><label><img src="<?=_upload_hinhanh.$item['photo']?>"  width="100" height="100"/>  </label></div>
          <div class="col-md-12"><label>Upload hình  </label></div>
         <div class="col-md-6"><input type="file" name="file" /></div>
                <div class="col-md-12"><label><?=$ten?>  </label></div>
                <div class="col-md-6"><input type="text" name="ten" id="ten" value="<?=$item['ten']?>" placeholder="<?=$ten?>" /></div>
     		
                <div class="col-md-12"><label>Số thứ tự</label></div>
                <div class="col-md-1"><input type="text" name="stt" id="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" placeholder="Số thứ tự" /></div>
                <div class="col-md-12"></div>
                <div class="col-md-12"><input type="checkbox" name="hienthi" class="icheck-blue" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /> <span class="hienthi_text">Hiển thị</span></div>
                
                
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-12 col-md-offset-1">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=<?=$_GET['com']?>&act=man&idc=<?=$_REQUEST['idc'];?><?=$chuoi_noi_curpage?>'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>
                               
                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>