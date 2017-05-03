  
  <?  
  
  $array_select_type=array ( "Cập nhật sau cùng","Giá từ cao tới thấp","Giá từ Thấp tới cao","Đánh giá từ cao tới thấp");
  ?>		
  		<div class="title-noibat1 title-right-m"><?=$danhmuc[0]['ten']?></div>
  			<div class="title-noibat1 title-right-md">
				<div class="col-md-7 col-sm-12 padding0"><?=$breadrum?> <span> Có ( <?=count($result_products)?> ) Sản phẩm</span></div>
             	<?php /*?><div class="col-md-5 block-selct padding0 "> Sắp xếp theo: 
                <select name="select_type">
                	<? for($i=0;$i<count($array_select_type);$i++){?>
                	<option value="<?=$i?>"><?=$array_select_type[$i]?></option>
                   
                   	<? }?>
                </select> </div><?php */?>
            	
             </div>
              <div class="block-products row">
              	<?
				 foreach((array)$result_products as $k=>$v){
                ?>
             <div class="col-md-4 col-sm-6 col-xsm-6 col-xs-12  products-item ">
             	<div class="list-producst-item">
                	<a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><img src="<?=_upload_sanpham_l.$v['thumb']?>"></a>
                    <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><h2><?=$v['ten']?></h2></a>
                    <div class="price-products"><span class="pricce-promotion"><? if($v['giakhuyenmai']!=''){ echo format_money($v['giakhuyenmai'],'đ');}?>  </span> <span class="pricce-pro">
					<?=format_money($v['gia'],'đ')?></span><span class="donvi">/<?=$v['donvi']?></span></div>
                    <? if($v['hot']>0){?>
                    <div class="col-md-3 padding0 block-sale-item"> <img alt="sale" src="images/img_sale.png"></div>
                    <? }?>
                 <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html">   <div class=" block-opa">
                    
                    </div></a>
                    <div class="col-md-6 col-sm-6 col-xsm-6 col-xs-6 block-cart-item"><a title="<?=$v['ten']?>" >
                     <img class="<?=($v['tinhtrang']>0)? 'btn-add-cart':'btn_hethang';?>" data-id="<?=$v['id']?>" src="images/bg_btn_cart1.png"></a></div>
                    <div class="col-md-6 col-sm-6 col-xsm-6 col-xs-6 block-right-item"><a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"> <img src="images/img_detail1.png"></a></div>
                    
                </div>
             </div> 
             <? }?> 
             </div>