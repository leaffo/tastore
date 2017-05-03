

<? 
$d->reset();
	$sql = "select photo from #_quangcao where hienthi=1  order by rand()";
	$d->query($sql);
	$result_gallary = $d->result_array();
	
	
	$d->reset();
	$sql = "select * from table_donhang_item";
	$d->query($sql);
	$result_donhang = $d->result_array();
?>

<!-- include Cycle plugin -->
<script type="text/javascript" src="http://malsup.github.com/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow1').cycle({
		fx: 'fade' // choose your transition type, ex: fade, scrollUp, shuffle, etc...
	});
});
</script>


<div class="container ">
  
  <div class="block-left col-md-3">
  <div class="content-left">
		<h2 class="title-right">HÌNH ẢNH HOẠT ĐỘNG CLB</h2>
   <div class="slideshow1">
    	<?
		 foreach((array)$result_gallary as $k=>$v){
        ?>
		<img src="<?=_upload_hinhanh_l.$v['photo']?>" />
        <? }?>
		
	</div>
    <h2 class="title-right register">Đăng ký thành viên</h2>
    	<ul class="list-register">
        	<li class="register"><i class="glyphicon glyphicon-user"></i> <a href="dang-ky.html">Đăng ký thành viên</a></li>
            <li class="login"><i class="glyphicon glyphicon-lock"></i> <a href="dang-nhap.html">Đăng nhập thành viên</a></li>
        </ul>
  </div>
  <div style="clear:both"></div>
  </div>
  
  
  
    <div class="col-md-9 col-xs-12 block-content-tab">
    
      <div class="block-content-tab-about  row">
     
       	<h2 class="title-tab title-content-about">THÔNG TIN ĐƠN HÀNG</h2>
        
       <div class="col-md-8 bg_register">
       		
                
              <?=$result_donhang[0]['noidung']?>
       </div>
      
     </div>
     </div>
  </div>
  
  
  
  
 

