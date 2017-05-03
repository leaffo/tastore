


<div class="container ">
  
  <div class="block-left col-md-3">
  <div class="content-left">
	<h2 class="title-right">Danh mục dịch vụ</h2>
    <ul class="list-right">
    	 	<?
				 foreach((array)$result_service_cat as $k=>$v){
                ?>
            	<li><a href="dich-vu/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><?=$v['ten']?></a></li>
                <? }?>
    </ul>
  </div>
  <div style="clear:both"></div>
  </div>
  
  
  
    <div class="col-md-9 col-xs-12 block-content-tab">
    
      <div class="block-content-tab-about  row">
     
       	<h2 class="title-tab title-content-about">Dịch vụ</h2>
        
        <h1 class="title-content-pages">
            <?=$tintuc_detail[0]['ten']?>
          </h1>
     <?=$tintuc_detail[0]['noidung']?>
      
     </div>
     </div>
  </div>