<?php




$d->reset();
$sql="select id,tenkhongdau,ten,photo from #_products_cat where hienthi=1 order by stt asc";
$d->query($sql);
$result_product_cat=$d->result_array();

$d->reset();
	$sql = "select id,ten,tenkhongdau,thumb,photo,gia,giakhuyenmai,donvi,hot from #_products where hienthi=1 and banchay >0 order by id desc";
	$d->query($sql);
	$result_product_banchay= $d->result_array();
	
	$d->reset();
	$sql = "select id,ten,tenkhongdau,thumb,photo,mota from #_news where hienthi=1 and tinnoibat >0 order by id desc limit 0,5";
	$d->query($sql);
	$result_blog_hot= $d->result_array();

$d->reset();
	$sql_slider = "select ten,photo,id_photo from #_hinhanh where hienthi=1 and id_photo='QC-3' order by stt,id desc ";
	$d->query($sql_slider);
	$result_quangcao3=$d->result_array();

?>

<div class=" col-md-3 col-sm-4 padding0 block-left-se">

              <h2 class="title-left">Bài tiêu biểu</h2>
               <div class="col-md-12 col-sm-12 col-xsm-12 col-xs-12 padding0  products-item ">
             	<div class="list-producst-item news-left">
               	<ul class="list-news">
                	<?
					 foreach((array)$result_blog_hot as $k=>$v){
                    ?>
                    <li><a href="blog/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><?=$v['ten']?></a></li>
                    <? }?>
                    </ul>
                  
                    
                </div>
             </div>
              <h2 class="title-left">Quảng cáo</h2>
               <?
			 foreach((array)$result_quangcao3 as $k=>$v){
             ?>
             <div class="col-md-12 col-sm-12 col-xsm-12 col-xs-12 padding0 asd-left">
             	<a target="_blank" href="<?=$v['ten']?>"  title="<?=$v['ten']?>">
                <img  src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a>
                </div>
               
                <? }?>
                
        </div>