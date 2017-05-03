<?php







$d->reset();
	$sql = "select id,ten,tenkhongdau,thumb,photo,gia,giakhuyenmai,donvi,hot from #_products where hienthi=1 and banchay >0 order by id desc";
	$d->query($sql);
	$result_product_banchay= $d->result_array();
	
	
$d->reset();
	$sql = "select id,ten,tenkhongdau,thumb,photo,mota from #_news where hienthi=1 and tinnoibat >0 order by id desc";
	$d->query($sql);
	$result_blog_hot= $d->result_array();

	$d->reset();
	$sql_slider = "select ten,photo,id_photo from #_hinhanh where hienthi=1 and id_photo='QC-2' order by stt,id desc ";
	$d->query($sql_slider);
	$result_quangcao2=$d->result_array();


?>

<div class=" col-md-3 col-sm-4 padding0 block-left-se">
        
        	<ul>
            	<?
				 foreach((array)$result_product_cat as $k=>$v){
					 
					$d->reset();
					$sql="select id,tenkhongdau,ten,photo from #_products_item where hienthi=1 and id_cat='".$v['id']."' order by stt asc";
					$d->query($sql);
					$result_product_item=$d->result_array();
					 
                ?>
            	<li <?=(count($result_product_item)>0)?'class="top-sub"':''?> ><a <? if(count($result_product_item)==0){?> href="san-pham/<?=$v['tenkhongdau']?>.html" <? }?> title="<?=$v['ten']?>"><?=$v['ten']?></a>	
                	<ul>
                    	<?
						 foreach((array)$result_product_item as $k1=>$v1){
                        ?>
                    	<li><a href="san-pham/<?=$v['tenkhongdau']?>/<?=$v1['tenkhongdau']?>/<?=$v1['id']?>.html"><?=$v1['ten']?></a></li>
                        <? }?>
                      
                    </ul>
                </li>
                <? }?>
             
            </ul>
            
            <?
			 if($com!='hoi-dap'){
            ?>
            
            <h2 class="title-left">Mua nhiều nhất</h2>
            <?
			 foreach((array)$result_product_banchay as $k=>$v){
            ?>
            <div class="col-md-12 col-sm-12 col-xsm-12 col-xs-12 padding0  products-item ">
             	<div class="list-producst-item">
                	<a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><img src="<?=_upload_sanpham_l.$v['thumb']?>"></a>
                    <a title="<?=$v['ten']?>" href="san-pham/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><h2><?=$v['ten']?></h2></a>
                    <div class="price-products"><span class="pricce-promotion"><?=format_money($v['giakhuyenmai'],'đ')?> </span> <span class="pricce-pro">
					<?=format_money($v['gia'],'đ')?></span><span class="donvi">/<?=$v['donvi']?></span></div>
                    <? if($v['hot']>0){?>
                    <div class="col-md-3 padding0 block-sale-item"> <img alt="sale" src="images/img_sale.png"></div>
                    <? }?>
                  
                    
                </div>
             </div>
             <? }?>
              <h2 class="title-left">Blog</h2>
               <div class="col-md-12 col-sm-12 col-xsm-12 col-xs-12 padding0  products-item ">
             	<div class="list-producst-item news-left">
                	<a href="blog/<?=$result_blog_hot[0]['tenkhongdau']?>/<?=$result_blog_hot[0]['id']?>.html">
                    <img src="<?=_upload_tintuc_l.$result_blog_hot[0]['photo']?>"></a>
                    <a href="blog/<?=$result_blog_hot[0]['tenkhongdau']?>/<?=$result_blog_hot[0]['id']?>.html"><h2><?=$result_blog_hot[0]['ten']?></h2></a>
                   <span><?=catchuoi($result_blog_hot[0]['mota'],200)?> </span><br />

                 
                    <a href="blog.html"><div class="news-more">Các tin khác</div></a>
                </div>
             </div>
             <?
			 foreach((array)$result_quangcao2 as $k=>$v){
             ?>
             <div class="col-md-12 col-sm-12 col-xsm-12 col-xs-12 padding0 asd-left">
             	<a href="<?=$v['ten']?>"  title="<?=$v['ten']?>">
                <img  src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a>
                </div>
               
                <? }?>
                <? }?>
        </div>