<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->

<div class="row breadcrumbs">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <ul class="breadcrumbs">
      <li><a href="index.php"><i class="fa fa-home"></i></a></li>
      <li><a href="index.php?com=donhang&act=man">Đơn hàng</a></li>
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
            <th>Mã_DH</th>
             <th>Họ tên</th>
             <th>Điện thoại</th>
             <th>Tổng tiền</th>
             <th>Ngày đặt</th>
          
     
            <th style="width:8%;">Xác nhận</th>
              <th style="width:8%;">Đã giao</th>
            <th style="width:10%;">Chi tiết</th>
            <th style="width:5%;">Xóa</th>
              </thead>
          <tbody>
            <?php 
				  	if(count($items)!=0){
						foreach($items as $k=>$v){
				  ?>
            <tr>
              <td style="width:5%;"><?=$k+1?></td>
              <td><a href="index.php?com=donhang&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" style="text-decoration:none;">
                <?=$v['madonhang']?>
                </a></td>
                 <td><a href="index.php?com=donhang&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" style="text-decoration:none;">
                <?=$v['hoten']?>
                </a></td>
                <td><a href="index.php?com=donhang&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" style="text-decoration:none;">
                <?=$v['dienthoai']?>
                </a></td>
                 <td>
                <?=format_money($v['tongtien'])?>
                </td>
                 <td>
                <?=make_date($v['ngaytao'])?>
                </td>
              
              
              <td style="width:5%;"><a href="index.php?com=donhang&act=man&hienthi=<?=$v['id']?><?=$chuoi_noi_curpage?>"><img src="<?=($v['hienthi']==1)?'media/images/active_1.png':'media/images/active_0.png'?>" border="0" /></a></td>
               <td style="width:5%;"><a href="index.php?com=donhang&act=man&dagiao=<?=$v['id']?><?=$chuoi_noi_curpage?>"><img src="<?=($v['dagiao']==1)?'media/images/active_1.png':'media/images/active_0.png'?>" border="0" /></a></td>
              <td style="width:5%;"><a href="index.php?com=donhang&act=edit&id=<?=$v['id']?><?=$chuoi_noi_curpage?>">Xem chi tiết</a></td>
              <td style="width:5%;"><a href="index.php?com=donhang&act=delete&id=<?=$v['id']?><?=$chuoi_noi_curpage?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" title="Xóa" /></a></td>
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
