


 
    <h2 class="title-noibat"><?=$tintuc_detail[0]['ten']?></h2>
              <div class="block-products ">
               <div class=" block-faq">
               <div class="list-item col-md-12 col-sm-12 col-xsm-12 ">
                <?=$tintuc_detail[0]['noidung']?>
               </div>
                </div>
              </div>
   <h2 class="title-noibat">Xem thêm</h2>
   <div class="col-md-12">
   	<ul  class="list-li">
    	<? foreach((array)$tintuc_khac as $k=>$v){?>
    	<li><a href="<?=$_GET['com']?>/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><?=$v['ten']?></a></li>
        <? }?>
       
    </ul>
   </div>





