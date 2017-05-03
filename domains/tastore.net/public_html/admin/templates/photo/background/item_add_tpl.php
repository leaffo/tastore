<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=photo&act=capnhap_background">Cập nhập Background</a></li>
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
                <h4>Cập nhập Background</h4>
              </div>
              <!-- Title Bar End -->
			              
              <form method="post" name="frm" action="index.php?com=photo&act=save_background" enctype="multipart/form-data" class="basic-form inline-form">                              
              <div class="row">
              	<div class="col-md-6">                                 
                    <div class="col-md-4"><label>Hình hiện tại</label></div>
                    <div class="col-md-8"><img src="<?=_upload_hinhanh.$item['photo']?>"  width="150" alt="NO PHOTO" /><br /><br /></div>                                               
                    <div class="col-md-4"><label>Hình ảnh</label></div>
                    <div class="col-md-8">
                        <input type="file" name="file" /> 
                        <span class="description">Type: .jpg|.gif|.png|.jpeg &nbsp;&nbsp;;&nbsp;&nbsp; Ảnh chuẩn: 550x395 (theo px) - Nên lấy ảnh lớn gấp 2-3 lần.</span>
                        <br /><br />
                    </div>
                    <div class="col-md-4"><label>Sử dụng hình ảnh</label></div>
                    <div class="col-md-8"><input type="checkbox" name="hienthi" class="icheck-blue" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /></div>                    
                    <div class="clearfix"></div>
                </div>
                <div class="col-md-6">                                          
                    <div class="col-md-4"><label>Màu nền </label></div>
                    <div class="col-md-8"><input type="text" name="ten" value="<?=$item['ten']?>" placeholder="000000" id='colorpickerField1' /></div>
                    <div class="col-md-4"><label>Vị trí </label></div>
                    <div class="col-md-8">
                    	<select name="ten1">
                        	<option value="top left" <?=($item['ten1']=='top left')?' selected="selected"':''?>>Top Left</option>
                            <option value="top right" <?=($item['ten1']=='top right')?' selected="selected"':''?>>Top Right</option>
                            <option value="top center" <?=($item['ten1']=='top center')?' selected="selected"':''?>>Top Center</option>                            
                            <option value="bottom left" <?=($item['ten1']=='bottom left')?' selected="selected"':''?>>Bottom Left</option>
                            <option value="bottom right" <?=($item['ten1']=='bottom right')?' selected="selected"':''?>>Bottom Right</option>
                            <option value="bottom center" <?=($item['ten1']=='bottom center')?' selected="selected"':''?>>Bottom Center</option>                            
                        </select>
                    </div>
                    <div class="col-md-4"><label>Lặp/Ko lặp </label></div>
                    <div class="col-md-8">
                    	<select name="ten2">
                        	<option value="repeat" <?=($item['ten2']=='repeat')?' selected="selected"':''?>>Lặp lại</option>
                            <option value="repeat-x" <?=($item['ten2']=='repeat-x')?' selected="selected"':''?>>Lặp lại theo chiều ngang</option>
                            <option value="repeat-y" <?=($item['ten2']=='repeat-y')?' selected="selected"':''?>>Lặp lại theo chiều dọc</option>                            
                            <option value="no-repeat" <?=($item['ten2']=='no-repeat')?' selected="selected"':''?>>Không lặp lại</option>                                                
                        </select>
                    </div>
                    <div class="col-md-4"><label>Cố định</label></div>
                    <div class="col-md-8"><input type="checkbox" name="link" class="icheck-blue" <?=(!isset($item['link']) || $item['link']==1)?'checked="checked"':''?> /></div>                    
                    <div class="clearfix"></div>
                </div>                
                                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=photo&act=capnhap_background'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>

                <div class="clearfix"></div>
			  </div>	
              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>