<?php 

$count_online=count_online();

$d->reset();
	$sql = "select id,ten,tenkhongdau from #_baiviet where hienthi=1 order by stt,id desc";
	$d->query($sql);
	$result_thongtin = $d->result_array();
	

	
	$d->reset();
	$sql = "select * from #_yahoo where hienthi=1 order by stt asc";
	$d->query($sql);
	$result_yahoo = $d->result_array();
?>

<div class="footer">
<div class="container padding0">
    <div class="col-md-3 col-sm-3 col-xs-12 col-xsm-12 bolck-info ">
    <h2>THÔNG TIN MUA HÀNG</h2>
    	<ul class="list-menu-footer">
        	
			<?
			 foreach((array)$result_thongtin as $k=>$v){
            ?>
        	<li><a href="thong-tin-mua-hang/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><?=$v['ten']?></a></li>
            <? }?>
            
        </ul>
    </div>
<div class="col-md-4 col-sm-4 col-xs-12 col-xsm-12 bolck-info ">
<h2>THÔNG TIN LIÊN HỆ</h2>
<ul class="list-info">
        	<li><img src="images/icon1.png" class="img-li"> <?=$result_company['diachi']?></li>
            <li><img src="images/icon2.png" class="img-li"> Điện thoại:  <?=$result_company['dienthoai']?></li>
            <li><img src="images/icon3.png" class="img-li"> Email:  <?=$result_company['email']?></li>
            <li class="online-httt-item"><img src="images/icon4.png" class="img-li"> 
            <?
			 foreach((array)$result_yahoo as $k=>$v){
				 if($v['skype']!=''){
            ?>
            <a href="skype:<?=$v['skype']?>?call"><img src="images/icon_skype.png" /> </a>
            <? } }?></li>
             <li class="online-httt-item"><img src="images/icon5.png" class="img-li">
              <?
			 foreach((array)$result_yahoo as $k=>$v){
			if($v['yahoo']!=''){
            ?>
            <a href="ymsgr:sendIM?<?=$v['yahoo']?>">
<img src="http://opi.yahoo.com/online?u=<?=$v['yahoo']?>&amp;m=g&amp;t=2" alt=""/>
</a> <? }?>
            <? }?>
             </li>
        </ul>
</div>
<div class="col-md-5 col-sm-5 col-xs-12 col-xsm-12 bolck-face ">
	<h2>THEO DÕI QUA FACEBOOK</h2>
   <div class="fan_book" style=" "> 
    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


<iframe src="https://www.facebook.com/plugins/page.php?href=<?=$result_company['fanface']?>&tabs=timeline&width=400&height=200&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="400" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe><br />
	</div>				
                </div>
</div>
</div>


</div>
<div class="line-footer">
<div class="container padding0"><?=$result_company['mota']?></div>
</div> 