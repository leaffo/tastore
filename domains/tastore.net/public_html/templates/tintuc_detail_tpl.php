


 
    <h2 class="title-noibat"><?=$tintuc_detail[0]['ten']?></h2>
              <div class="block-products row">
               <div class="list-item col-md-12 col-sm-12 col-xsm-12 ">
               <div class=" col-md-5 col-sm-7 col-xsm-7 col-xs-12 img-news ">
               	<img  src="<?=_upload_tintuc_l.$tintuc_detail[0]['photo']?>" />
               </div>
               <div>   <?=$tintuc_detail[0]['mota']?></div>
                <?=$tintuc_detail[0]['noidung']?>
                  <!-- AddThis Button BEGIN -->
                            <div class="addthis_toolbox addthis_default_style ">
                            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
                            <a class="addthis_button_tweet"></a>
                            <a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal"></a>
                            <a class="addthis_counter addthis_pill_style"></a>
                            </div>
                            <script type="text/javascript">var addthis_config = {"data_track_addressbar":false};</script>
                            <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-51c3fae12493146d"></script>
                            <!-- AddThis Button END -->
               </div>
                
              </div>
   <h2 class="title-noibat">Các tin khác</h2>
   <div class="col-md-12">
   	<ul  class="list-li">
    	<? foreach((array)$tintuc_khac as $k=>$v){?>
    	<li><a href="<?=$_GET['com']?>/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><?=$v['ten']?></a></li>
        <? }?>
       
    </ul>
   </div>





