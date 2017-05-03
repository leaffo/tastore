
<?
$d->reset();
	$sql = "select id,ten,tenkhongdau from #_news_item where hienthi=1 order by stt asc";
	$d->query($sql);
	$loaitinleft = $d->result_array();
?>


  
    <h2 class="title-noibat">Blog</h2>
              <div class="block-products row">
                       <?php
	  $tintuc1=$tintuc;
			   if(count($tintuc1)>0){
			   for($i=0,$count_tintuc=count($tintuc1);$i<$count_tintuc;$i++){
		   ?>
            <div class="list-item col-md-12 col-sm-12 col-xsm-12 ">
            <div class="news-item1">
            <div class="col-md-4 col-sm-4 col-xsm-4 padding0">
            	<a href="<?=$_GET['com']?>/<?=$tintuc1[$i]['tenkhongdau']?>/<?=$tintuc1[$i]['id']?>.html" title="<?=$tintuc1[$i]['ten']?>"><img src="<?=_upload_tintuc_l.$tintuc1[$i]['thumb']?>" alt="<?=$tintuc1[$i]['ten']?>" /></a>
                </div>
                 <div class="col-md-8 col-sm-8 col-xsm-8">
                <h2><a href="<?=$_GET['com']?>/<?=$tintuc1[$i]['tenkhongdau']?>/<?=$tintuc1[$i]['id']?>.html" title="<?=$tintuc1[$i]['ten']?>"><?=$tintuc1[$i]['ten']?></a></h2>
                <p><?=$tintuc1[$i]['mota']?> </p>
                </div>
                <div class="clearb"></div>
            </div>
            </div>
              <?php } }else echo '<p>Nội dung đang cập nhật, bạn vui lòng xem các chuyên mục khác.</p>';  ?>
			  <div class="phantrang" ><?=$paging['paging']?></div>
              
              </div>
  

