<?


	
	
	$d->reset();
	$sql = "select id,ten,tenkhongdau,thumb,photo,gia,giakhuyenmai,donvi,hot,tinhtrang from #_products where hienthi=1 and hot >0 order by id desc";
	$d->query($sql);
	$result_product_hot= $d->result_array();
	
	$d->reset();
	$sql = "select id,ten,tenkhongdau,thumb,photo,gia,giakhuyenmai,donvi,hot,tinhtrang from #_products where hienthi=1 and noibat >0 order by id desc";
	$d->query($sql);
	$result_product_noibat= $d->result_array();
	

	
	
?>

<!--begin products-->

<h2 class="title-promotion">Khuyến mãi</h2>
<div class="block-products row">
  <?
				 foreach((array)$result_product_hot as $k=>$v){
                ?>
  <div class="col-md-4 col-sm-6 col-xsm-6 col-xs-12  products-item ">
    <div class="list-producst-item"> <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><img src="<?=_upload_sanpham_l.$v['thumb']?>"></a> <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html">
      <h2>
        <?=$v['ten']?>
      </h2>
      </a>
      <div class="price-products"><span class="pricce-promotion">
        <? if($v['giakhuyenmai']!=''){ echo format_money($v['giakhuyenmai'],'đ');}?>
        </span> <span class="pricce-pro">
        <?=format_money($v['gia'],'đ')?>
        </span><span class="donvi">/
        <?=$v['donvi']?>
        </span></div>
      <div class="col-md-3 padding0 block-sale-item"> <img alt="sale" src="images/img_sale.png"></div>
      <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html">
      <div class=" block-opa"> </div>
      </a>
      <div class="col-md-6 col-sm-6 col-xsm-6 col-xs-6 block-cart-item"> <a  title="<?=$v['ten']?>" > <img class="<?=($v['tinhtrang']>0)? 'btn-add-cart':'btn_hethang';?>" data-id="<?=$v['id']?>" src="images/bg_btn_cart1.png"></a></div>
      <div class="col-md-6 col-sm-6 col-xsm-6 col-xs-6 block-right-item"><a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"> <img src="images/img_detail1.png"></a></div>
    </div>
  </div>
  <? }?>
</div>
<h2 class="title-noibat">Sản phẩm nổi bật</h2>
<div class="block-products row">
  <?
				 foreach((array)$result_product_noibat as $k=>$v){
                ?>
  <div class="col-md-4 col-sm-6 col-xsm-6 col-xs-12  products-item ">
    <div class="list-producst-item"> <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><img src="<?=_upload_sanpham_l.$v['thumb']?>"></a> <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html">
      <h2>
        <?=$v['ten']?>
      </h2>
      </a>
      <div class="price-products"><span class="pricce-promotion">
        <? if($v['giakhuyenmai']!=''){ echo format_money($v['giakhuyenmai'],'đ');}?>
        </span> <span class="pricce-pro">
        <?=format_money($v['gia'],'đ')?>
        </span><span class="donvi">/
        <?=$v['donvi']?>
        </span></div>
      <? if($v['hot']>0){?>
      <div class="col-md-3 padding0 block-sale-item"> <img alt="sale" src="images/img_sale.png"></div>
      <? }?>
     <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"> <div class=" block-opa"> </div></a>
      <div class="col-md-6 col-sm-6 col-xsm-6 col-xs-6 block-cart-item"><a title="<?=$v['ten']?>"> <img class="<?=($v['tinhtrang']>0)? 'btn-add-cart':'btn_hethang';?>" data-id="<?=$v['id']?>" src="images/bg_btn_cart.png"></a></div>
      <div class="col-md-6 col-sm-6 col-xsm-6 col-xs-6 block-right-item"><a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"> <img src="images/img_detail.png"></a></div>
    </div>
  </div>
  <? }?>
</div>
