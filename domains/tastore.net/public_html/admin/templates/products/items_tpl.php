<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=<?=$_GET['com']?>&act=<?=$_GET['act']?>">Sản phẩm</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  	  	<!--<div class="inner" style="margin-bottom:10px;">
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Chỉ nên có tối đa 4-5 bản đồ, tên bản đồ không nên đặt dài quá!</p>
            </div>
        </div>-->
        
      <!-- Inline Form Start -->      	      
        <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="inner">
          	            
            <!-- Title Bar Start -->
            <div class="title-bar"> 
              <div class="col-md-8" style="padding-left:0px; padding-top:7px; padding-bottom:7px;">                 
              	<h4>Sản phẩm</h4>      
              </div>
              <div class="col-md-4 paging_0px">  
              	<form action="index.php?com=<?=$_GET['com']?>&act=<?=$_GET['act']?><?=$chuoi_noi_curpage?>" method="post" class="inline-form">
                	<div id="timkiem_khung">
                    	<input type="text" name="search" id='search' value="<?=@$_REQUEST['search']?>" placeholder="Nhập tên cần tìm ..." class='timkiem_input' />
                        <input type="image" name="btnSearch" src="media/images/search-focus.png" value="Tìm kiếm" id='nut_timkiem' />
                    </div>                    
                </form>
              </div>
              <div class="clear"></div>      
            </div>
            <!-- Title Bar End -->                                  
            
            <!-- Table Holder Start -->
            <div class="table-holder">

              <table class="stripe-rows" cellspacing="0" cellpadding="0" width="100%" border="1">            
                <thead>
                  <th style="width:2%;">STT</th>                                                    
                  <th>Hình ảnh</th>
                   <th>Danh mục cấp 1</th>
                   <th>Danh mục cấp 2</th>
                  <th>Tên</th>
                  <th>Thêm ảnh</th>
                   <th style="width:2%;">Khuyến mãi</th>
                  <th style="width:2%;">Nổi bật</th>
                  <th style="width:2%;">Mua nhiều</th>
                  <th style="width:5%;">Tình trạng (C/H)</th>
                  <th style="width:2%;">Hiển thị</th>
                  <th style="width:2%;">Sửa</th>
                  <th style="width:2%;">Xóa</th>
                </thead>
                <tbody>
                  <?php 
				  	if(count($items)!=0){
						foreach($items as $k=>$v){
				  ?>
                  <tr>
                    <td style="width:5%;"><?=$v['stt']?></td>
                      <td style="width:5%;"><img src="<?=_upload_sanpham.$v['photo']?>" width="60" /></td>                    
                      <td style="width:15%;">
		
		 <?php
				$sql_danhmuc="select ten from table_products_cat where id='".$v['id_cat']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
		
		</td>
        <td style="width:15%;">
		
		 <?php
				$sql_danhmuc="select ten from table_products_item where id='".$v['id_item']."'";
				$result=mysql_query($sql_danhmuc);
				$item_danhmuc =mysql_fetch_array($result);
				echo @$item_danhmuc['ten']
			?>      
		
		</td>
                    <td><a href="index.php?com=<?=$_GET['com']?>&act=edit&id_cat=<?=$v['id_cat']?>&id_item=<?=$v['id_item']?>&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" style="text-decoration:none;"><?=$v['ten']?></a></td>
                    
                      <td><a href="index.php?com=hinhanh&act=man&idc=H<?=$v['id']?>">Thêm ảnh</a></td>
                    
                    <td style="width:5%;"><a href="index.php?com=<?=$_GET['com']?>&act=<?=$_GET['act']?>&hot=<?=$v['id']?><?=$chuoi_noi_curpage?>"><img src="<?=($v['hot']>0)?'media/images/yes-km.gif':'media/images/no-km.gif'?>" border="0" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=<?=$_GET['com']?>&act=<?=$_GET['act']?>&noibat=<?=$v['id']?><?=$chuoi_noi_curpage?>"><img src="<?=($v['noibat']>0)?'media/images/yes-km.gif':'media/images/no-km.gif'?>" border="0" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=<?=$_GET['com']?>&act=<?=$_GET['act']?>&banchay=<?=$v['id']?><?=$chuoi_noi_curpage?>"><img src="<?=($v['banchay']>0)?'media/images/yes-km.gif':'media/images/no-km.gif'?>" border="0" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=<?=$_GET['com']?>&act=<?=$_GET['act']?>&tinhtrang=<?=$v['id']?><?=$chuoi_noi_curpage?>"><img src="<?=($v['tinhtrang']>0)?'media/images/active_1.png':'media/images/active_0.png'?>" border="0" /></a></td>
                     <td style="width:5%;"><a href="index.php?com=<?=$_GET['com']?>&act=<?=$_GET['act']?>&hienthi=<?=$v['id']?><?=$chuoi_noi_curpage?>"><img src="<?=($v['hienthi']>0)?'media/images/active_1.png':'media/images/active_0.png'?>" border="0" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=<?=$_GET['com']?>&act=edit&id_cat=<?=$v['id_cat']?>&id_item=<?=$v['id_item']?>&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" style="text-decoration:none;"><img src="media/images/edit.png" border="0" title="Sửa" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=<?=$_GET['com']?>&act=delete&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" title="Xóa" /></a></td>
                  </tr>
                  <?php	
						}
					}
				  ?>
                                                      
                </tbody>
              </table>
              <div class="clear"></div>

            </div>
            <!-- Table Holder End -->
            
			<div class="col-md-12 margin_bottom_10px">
                <div class="col-md-4 paging_0px">                  
                  <a href="index.php?com=<?=$_GET['com']?>&act=add<?=$chuoi_noi_curpage?>" class="btn btn-success"><i class="fa fa-check"></i> Thêm mới</a>
                  
                </div>
                <div class="col-md-8 paging_0px">    
                  <div class="paging"><?=$paging['paging']?></div>
                </div>
    
                <div class="clearfix"></div>
			</div>
            <div class="clearfix"></div>

          </div>
        </div>
        <!-- Inline Form End -->
  </div>