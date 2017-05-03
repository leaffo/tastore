<?php




$d->reset();
$sql="select id,tenkhongdau,ten,photo from #_products_cat where hienthi=1 order by stt asc";
$d->query($sql);
$result_product_cat=$d->result_array();


$d->reset();
	$sql = "select id,ten,tenkhongdau,thumb,photo,gia,giakhuyenmai,donvi,hot from #_products where hienthi=1 and banchay >0 order by id desc";
	$d->query($sql);
	$result_product_banchay= $d->result_array();




?>

<div class=" col-md-3 col-sm-3 padding0 block-left-se col-right-detail">
        
        	<!--<div class="block-danhgia">
            <img src="images/img_danhgia.png" />
            </div>!-->
            
            <h2 class="title-left">Sản phẩm cùng loại</h2>
            <?
			 foreach((array)$result_product as $k=>$v){
            ?>
            <div class="col-md-12 col-sm-12 col-xsm-12 col-xs-12 padding0  products-item ">
             	<div class="list-producst-item">
                	<a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><img src="<?=_upload_sanpham_l.$v['thumb']?>"></a>
                    <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><h2><?=$v['ten']?></h2></a>
                    <div class="price-products"> <span class="pricce-pro">
					<?=format_money($v['gia'],'đ')?></span><span class="donvi">/<?=$v['donvi']?></span></div>
                    <? if($v['hot']>0){?>
                    <div class="col-md-3 padding0 block-sale-item"> <img alt="sale" src="images/img_sale.png"></div>
                    <? }?>
                  
                    
                </div>
             </div>
             <? }?>
              
        </div>