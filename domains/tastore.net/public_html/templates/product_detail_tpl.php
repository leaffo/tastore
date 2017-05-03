

<div class="title-noibat1">
  <?=$breadrum?>
</div>
<div class="block-products">
  <div class="list-item block-info-main-products col-md-9 col-sm-12 col-xsm-12 ">
  <div class="col-md-6 col-sm-6 padding-lef0">
  <div class="img-pro-detail">
    
      <a class="fancybox" href="<?=_upload_sanpham_l.$result_detail[0]['photo']?>" data-fancybox-group="gallery" title=" <?=$result_detail[0]['ten']?>"><img class="img-detail" src="<?=_upload_sanpham_l.$result_detail[0]['thumb']?>" alt=""></a>
    
   <div>
   
   
   

	<?
	 if(count($hinhanh)>0){
    ?>
    <div class="jcarousel-wrapper">
    	
        <div class="jcarousel">
        <ul>
        <?
		 for($i=0;$i<count($hinhanh);$i++){
        ?>
        <li>
          <a class="fancybox"  data-fancybox-group="gallery" href="<?=_upload_hinhanh_l.$hinhanh[$i]['photo']?>"  title="<?=$row_detail['ten']?>">
          <img src="<?=_upload_hinhanh_l.$hinhanh[$i]['photo']?>" class="jshop_img_thumb" /></a>
          
          </li>
                      <? }?>
                      </ul>                                        
            </div>
			
                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
       </div>
     <? }?>  
 
   </div>
    
  </div>
  </div>
   <div class="col-md-6 col-sm-6 padding0">
  <table width="100%" border="0" class="info-porduct-detail">
  <tr>
    <td> <h2><?=$result_detail[0]['ten']?></h2></td>
  </tr>
  <tr>
    <td> <span class="price-old"><?=format_money($result_detail[0]['giakhuyenmai'])?></span></td>
  </tr>
  <tr>
    <td><span class="price-new"><?=format_money($result_detail[0]['gia'])?></span></td>
  </tr>
  <tr>
    <td class="block-info-cart1">
    	<div class="info-cart1">
    	<span>Số lượng</span><br />
		<input min="1" value="1" name="soluong" class="sl_detail" type="number" /> <b><?=$result_detail[0]['donvi']?></b>
        </div>
         <img data-id="<?=$result_detail[0]['id']?>" class="btn_cart_detail <?=($result_detail[0]['tinhtrang']>0)? 'btn-add-cart_detail':'btn_hethang';?>" src="images/icon_cart_detail.png" />
    </td>
  </tr>
  <tr>
    <td class="block-info-cart1 padding10">
   	 <span>Gọi đặt hàng ngay</span><br />
      <span class="hotline1"><?=$result_company['dienthoai']?> </span> <span> ( Mã sp: <?=$result_detail[0]['maso']?> )</span>
    </td>
  </tr>
</table>
<span class="description-detail">
<?=$result_detail[0]['dieukhoan']?>
</span>
  </div>
  
  <div class="description-m">
<?=$result_detail[0]['dieukhoan']?>

  </div>
  
  <div class="col-md-12 col-sm-12 block-content-detail padding0">
  <h2>Chi tiết sản phẩm</h2>
  <?=$result_detail[0]['noidung']?>

<a href="http://www.facebook.com/share.php?u=<?=getCurrentPageURL()?>"><img src="images/img_share.png" /></a>

  </div>
  
  
  
  
</div>

<?  include _template."layout/right_detail.php"?>
</div>
