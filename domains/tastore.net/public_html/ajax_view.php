<?php
session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."function_user.php";
	include_once _lib."class.database.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	
?>

<?

	if(!empty($_POST['soluong']))
	{   
	 $sl=$_POST['soluong']*42;
	 
	 $d->reset();
	$sql_sp = "select id,ten,tenkhongdau,photo,giakhuyenmai,gia,luotmua from #_tour  where hienthi=1   order by id  desc limit $sl";
	$d->query($sql_sp);
	$result_product= $d->result_array();
	
	
	
	?>
    <div class="product_hot">
            <?
			for($j=0;$j<count($result_product);$j++)
			{
			 ?>
            <div class="products-item <? if(($j+1)%3==0){?>end-item <? }?>">
            	<a href="san-pham/<?=$result_product[$j]['tenkhongdau']?>/<?=$result_product[$j]['id']?>.html"><img src="<?=_upload_sanpham_l.$result_product[$j]['photo']?>" class="img-responsive"></a>

                <a class="name_products" href="san-pham/<?=$result_product[$j]['tenkhongdau']?>/<?=$result_product[$j]['id']?>.html"><?=$result_product[$j]['ten']?></a>
              	<span class="block-price">
                	<span class="product-promotion"><?=get_promotion($result_product[$j]['id'])?>%</span>
                    <span class="product-price">
                    <p> &nbsp; <? if($result_product[$j]['giakhuyenmai']>0){echo format_money($result_product[$j]['giakhuyenmai']);}?></p><p><?=format_money($result_product[$j]['gia'])?></p></span>
                </span> 
                <span class="number-bought"><i class=" glyphicon  glyphicon-thumbs-up"></i>Đã mua (<b><?=$result_product[$j]['luotmua']?></b>)</span> 
            </div>
          
            <? }?>
            
            </div>

<? }?>