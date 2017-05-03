
<?

	
	$d->reset();
	$sql = "select * from #_products where hienthi=1 and id_cat='".$_GET['idc']."' order by id  desc limit 0,3";
	$d->query($sql);
	$result_products = $d->result_array();
?>

    <h2 class="title-noibat">Đăng ký thành công</h2>
              <div class="block-products">
               <div class=" block-faq">
               <div class="col-md-4  block-icon-cart"><img src="images/icon_check.png" class="images-icon-cart" /></div>
               <div class="col-md-8 col-sm-12 block-end-register">
              	<h2>Cảm ơn bạn đã đặt hàng trước</h2>
				<span>Chúng tôi sẽ liên hệ lại với bạn sau khi có hàng</span>
               </div>
               
               </div>
              </div>
         <h2 class="title-noibat">Có thể bạn quan tâm</h2>         
   <div class="block-products row">
              	<?
				 foreach((array)$result_products as $k=>$v){
                ?>
             <div class="col-md-4 col-sm-6 col-xsm-6 col-xs-12  products-item ">
             	<div class="list-producst-item">
                	<a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><img src="<?=_upload_sanpham_l.$v['thumb']?>"></a>
                    <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><h2><?=$v['ten']?></h2></a>
                    <div class="price-products"><span class="pricce-promotion"><?=format_money($v['giakhuyenmai'],'đ')?> </span> <span class="pricce-pro">
					<?=format_money($v['gia'],'đ')?></span><span class="donvi">/<?=$v['donvi']?></span></div>
                    <? if($v['hot']>0){?>
                    <div class="col-md-3 padding0 block-sale-item"> <img alt="sale" src="images/img_sale.png"></div>
                    <? }?>
                    <div class=" block-opa">
                    
                    </div>
                    <div class="col-md-6 col-sm-6 col-xsm-6 col-xs-6 block-cart-item"><a title="<?=$v['ten']?>" >
                     <img class="btn-add-cart" data-id="<?=$v['id']?>" src="images/bg_btn_cart1.png"></a></div>
                    <div class="col-md-6 col-sm-6 col-xsm-6 col-xs-6 block-right-item"><a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"> <img src="images/img_detail1.png"></a></div>
                    
                </div>
             </div> 
             <? }?> 
             </div>

