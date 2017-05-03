<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->

<div class="row breadcrumbs">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <ul class="breadcrumbs">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li><a href="index.php?com=contact&act=man">Email liên hệ</a></li>
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
      
      
      
      <!-- Table Holder Start -->
      <div class="table-holder">
        <table class="stripe-rows" cellspacing="0" cellpadding="0" width="100%" border="1">
          <thead>
          <th style="width:5%;">STT</th>
           
             <th>Họ tên</th>
             <th>Điện thoại</th>
            <th>Email</th>
           
              <th>Chủ đề</th>
               <th>Nội dung</th>
             <th>Ngày đặt</th>
          
     
           
           
            <th style="width:5%;">Xóa</th>
              </thead>
          <tbody>
            <?php 
				  	if(count($items)!=0){
						foreach($items as $k=>$v){
				  ?>
            <tr>
              <td style="width:5%;"><?=$k+1?></td>
             
                 <td><a href="index.php?com=contact&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" style="text-decoration:none;">
                <?=$v['ten']?>
                </a></td>
                <td><a href="index.php?com=contact&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" style="text-decoration:none;">
                <?=$v['dienthoai']?>
                </a></td>
                 <td><a href="index.php?com=contact&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" style="text-decoration:none;">
                <?=$v['email']?>
                </a></td>
              
                 <td><a href="index.php?com=contact&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" style="text-decoration:none;">
                <?=$v['tieude']?>
                </a></td>
                  <td><a href="index.php?com=contact&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" style="text-decoration:none;">
                <?=$v['noidung']?>
                </a></td>
             
                 <td>
                <?=make_date($v['ngaytao'])?>
                </td>
              
              
       
            
              <td style="width:5%;"><a href="index.php?com=contact&act=delete&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" title="Xóa" /></a></td>
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
      
      
      <div class="clearfix"></div>
    </div>
  </div>
  <!-- Inline Form End --> 
</div>
