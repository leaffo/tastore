<script language="javascript" src="admin/media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.getElementById('ten'), "Xin nhập Họ tên.")){
		document.getElementById('ten').focus();
		return false;
	}
	
	/*if(isEmpty(document.getElementById('diachi'), "Vui lòng nhập địa chỉ")){
		document.getElementById('diachi').focus();
		return false;
	}*/
	if(!check_email(document.frm.email.value)){
		alert("Email không hợp lệ");
		document.frm.email.focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('dienthoai'), "Xin nhập Số điện thoại.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	
	
	
	
	if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ.")){
		document.getElementById('dienthoai').focus();
		return false;
	}
	if(isEmpty(document.getElementById('tieude1'), "Xin nhập Chủ đề.")){
		document.getElementById('tieude1').focus();
		return false;
	}
	
	if(isEmpty(document.getElementById('noidung'), "Xin nhập Nội dung.")){
		document.getElementById('noidung').focus();
		return false;
	}
	
	document.frm.submit();
}
</script>


<?php

	?>
<?php

	
?>
     


  <h2 class="title-noibat">Liên hệ</h2>
              <div class="block-products ">
                <div class=" block-faq">
              <div class="contact-form   col-md-12  col-sm-12 col-sx-12">
                    <form method="post" name="frm" action="lien-he.html">
                        <ul id="form-inner">
                           
                                <div class="col-md-2 col-sm-3 col-xsm-3 col-xs-12"><label  for="name">Họ và tên (<span>*</span>)</label></div>

                                  <div class="col-md-10 col-sm-9 col-xsm-9 col-xs-12  row"><input type="text" class="maxchar" id="ten" name="ten" /></div>
                                
                           <div style="clear:both"></div>
                               <div class="col-md-2 col-sm-3 col-xsm-3 col-xs-12">  <label for="email">Email (<span>*</span>)</label></div>
                               <div class="col-md-10 col-sm-9 col-xsm-9 col-xs-12 row"> <input type="email" class="maxchar" id="email" name="email"  /></div>
                              
                             <div style="clear:both"></div>
                                 <div class="col-md-2 col-sm-3 col-xsm-3 col-xs-12"><label for="email">Điện thoại (<span>*</span>)</label></div>
                               <div class="col-md-10 col-sm-9 col-xsm-9 col-xs-12 row"> <input type="email" class="maxchar" id="dienthoai" name="dienthoai"  /></div>
                               
                           <div style="clear:both"></div>
                            	   <div class="col-md-2 col-sm-3 col-xsm-3 col-xs-12"><label for="email">Chủ đề (<span>*</span>)</label></div>
                                <div class="col-md-10 col-sm-9 col-xsm-9 col-xs-12 row">  <input type="text" class="maxchar" id="tieude1" name="tieude1" /></div>
                             
                            <div style="clear:both"></div>
                                <div class="col-md-2 col-sm-3 col-xsm-3 col-xs-12"> <label for="message">Nội dung (<span>*</span>)</label></div>
                                <div class="col-md-10 col-sm-9 col-xsm-9 col-xs-12 row">  <textarea class="maxchar textarea" rows="6" id="noidung" name="noidung"></textarea></div> <div style="clear:both"></div>
                                
                                  <div style="clear:both"></div>
                                <div class="col-md-2 col-sm-3 col-xsm-3 col-xs-12"></div>
                                <div class="col-md-10 col-sm-9 col-xsm-9 col-xs-12 row"><img style="cursor:pointer"  onclick="js_submit()" src="images/btn_contact.png" />  </div> <div style="clear:both"></div>
                           
                           <div class="col-md-12"></div>
                            
                        </ul>
                    </form>
          		</div>
              </div>
              </div>










