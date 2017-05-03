

<? 
$d->reset();
	$sql = "select photo from #_quangcao where hienthi=1  order by rand()";
	$d->query($sql);
	$result_gallary = $d->result_array();
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
<script>
$().ready(function(e) {
	function check_email(email)
{
	emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
	return emailRegExp.test(email);
}

function check_Exist(email){
	}

	$('.btn-register').click(function(){
		
  if($('#tendoanhnghiep').val()==''){
	  alert('Vui lòng nhập tên doanh nghiệp');
	  $("#tendoanhnghiep").focus();
	  return false;
	  }
	if($('#name').val()==''){
	  alert('Vui lòng nhập họ tên');
	  $("#name").focus();
	  return false;
	  } 
	 if(!check_email($('#email').val())){
		
	 
	  alert('Vui lòng nhập email');
	  $("#email").focus();
	  return false;
	  }
	  
	  
	  
	  if($('#dienthoai').val()==''){
	  alert('Vui lòng nhập số điện thoại');
	  $("#dienthoai").focus();
	  return false;
	  } 
	  
		 
	  $('.frm_search').submit();
	  
		});
	
	// ajax check
	
	$('#email').keypress(function(){
		
		email=$(this).val();
		
		
		if(!check_email(email)){
			
			$(this).addClass('err');
			}else{
				$(this).removeClass('err');
				}
		
		})
	

			
				
	
	
	
});
</script>


<?
//check_array($_SESSION['dn']);
?>
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
     
       	<h2 class="title-tab title-content-about">THÔNG TIN THÀNH VIÊN</h2>
        
       <div class="col-md-8 bg_register">
       		
                
                <form class="frm_search" role="form" method="post" action="thong-tin-tai-khoan.html">
  <div class="form-group">
    <label for="exampleInputEmail1">Tên doanh nghiệp</label>
    <input  type="text" id="tendoanhnghiep" value="<?=$_SESSION['dn'][0]['tendoanhnghiep']?>" class="form-control erro" name="tendoanhnghiep"  placeholder="Nhập tên doanh nghiệp">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Họ và tên</label>
    <input type="text" class="form-control" name="name" value="<?=$_SESSION['dn'][0]['ten']?>" id="name"  placeholder="Nhập họ và tên">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" id="email" value="<?=$_SESSION['dn'][0]['email']?>"  placeholder="Nhập email">
  
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Điện thoại</label>
    <input type="text" class="form-control" name="dienthoai" id="dienthoai" value="<?=$_SESSION['dn'][0]['dienthoai']?>" placeholder="Nhập điện thoại">
  </div>
  

  
 
  <button type="button" class="btn btn-register btn-default">Cập nhật</button>

</form>
       </div>
      
     </div>
     </div>
  </div>
  
  
  
  
 

