<script language="javascript" src="media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.frm.username, "Chưa nhập tên đăng nhập.")){
		return false;
	}
	
	if(isEmpty(document.frm.oldpassword, "Chưa nhập mật khẩu cũ.")){
		return false;
	}
	
	if(!isEmpty(document.frm.new_pass) && document.frm.new_pass.value.length<5){
		alert("Mật khẩu phải nhiều hơn 4 ký tự.");
		document.frm.new_pass.focus();
		return false;
	}
	
	if(!isEmpty(document.frm.new_pass) && document.frm.new_pass.value!=document.frm.renew_pass.value){
		alert("Nhập lại mật khẩu mới không chính xác.");
		document.frm.renew_pass.focus();
		return false;
	}
	
	if(!isEmpty(document.frm.email) && !check_email(document.frm.email.value)){
		alert('Email không hợp lệ.');
		document.frm.email.focus();
		return false;
	}
}
</script>


  <!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=user&act=admin_edit">Tài khoản Admin</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<!-- Inline Form Start -->
          <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="inner">

              <!-- Title Bar Start -->
              <div class="title-bar">
                <h4>Tài khoản Admin</h4>
              </div>
              <!-- Title Bar End -->

              <form method="post" name="frm" action="index.php?com=user&act=admin_edit" enctype="multipart/form-data" class="basic-form inline-form" onSubmit="return js_submit();">
                <div class="col-md-2"><label for="email">Tên đăng nhập <span style="color:#F00;">*</span></label></div>
                <div class="col-md-10"><input type="text" name="username" id="username" value="<?=$item['username']?>" placeholder="Tên đăng nhập" /></div>
                <div class="col-md-2"><label for="password">Mật khẩu <span style="color:#F00;">*</span></label></div>
                <div class="col-md-10"><input type="password" name="oldpassword" id="oldpassword" placeholder="********" /></div>
                <div class="col-md-2"><label for="password">Mật khẩu mới</label></div>
                <div class="col-md-10"><input type="password" name="new_pass" id="new_pass" placeholder="********" /></div>
                <div class="col-md-2"><label for="password">Nhập lại MK mới</label></div>
                <div class="col-md-10"><input type="password" name="renew_pass" placeholder="********" /></div>
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-round btn-lg btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php'" class="btn btn-round btn-lg btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>

                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>
   