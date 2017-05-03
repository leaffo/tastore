
<?
$d->reset();
	$sql = "select id,ten,tenkhongdau,gia from #_tinhthanh_item where hienthi=1 order by stt asc";
	$d->query($sql);
	$result_tinhthanh_item = $d->result_array();

$d->reset();
	$sql = "select id,ten,tenkhongdau,gia from #_tinhthanh where hienthi=1 order by stt asc";
	$d->query($sql);
	$result_tinhthanh1 = $d->result_array();
	
	
	$d->reset();
	$sql = "select id,ten,tenkhongdau,gia,photo,donvi from #_products where hienthi=1 and id='".$_GET['idc']."' order by stt asc";
	$d->query($sql);
	$result_products = $d->result_array();
?>
<script type="text/javascript">
$().ready(function(e) {
	$('.thinhthanh').change(function(){
		id_thanhpho=$('.thinhthanh > option:selected').attr('data-id');
		 $.ajax({
						url:"ajax_dathang.php",
						type:"get",
						data:"id_thanhpho="+ id_thanhpho,
						dataType:"json",
						success:function(data){
						$('.quanhuyen').html(data.tinhthanh);
						$('.phi-dong-goi').html(data.phivanchuyen);
						$('.tongthanhtoan').html(data.tongtien)
						}
		 			});
		
		});
		
	$('.quanhuyen').change(function(){
		id_quan=$('.quanhuyen option:selected').attr('data-id');
		
		
		 $.ajax({
						url:"ajax_dathang.php",
						type:"get",
						data:"id_quan="+ id_quan,
						dataType:"json",
						success:function(data){
					
						$('.phi-dong-goi').html(data.phivanchuyen);
						$('.tongthanhtoan').html(data.tongtien)
						}
		 			});
		
		});
		
		$('.btn_dangky_mua').click(function(){
			$('.btn-submit').trigger('click');
			
			})
		
		$('.address').keyup(function(){
			
			$('.diachigiaohang').html($(this).val());
			})
	$('.dienthoai').keyup(function(){
			
			$('.dienthoaigiaohang').html('Điện thoại: '+$(this).val());
			})		
		
});

</script>
    <h2 class="title-noibat">Đăng ký đặt mua sản phẩm khi có hàng</h2>
              <div class="block-products">
              <div class=" block-faq">
              <div class="col-md-5 col-sm-12 col-xsm-12 col-xs-12 block-info-main padding0">
                    <div class="block-dat-sp">
                    <img src="<?=_upload_sanpham_l.$result_products[0]['photo']?>" />
                    <a href="san-pham/<?=$result_products[0]['tenkhongdau']?>/<?=$result_products[0]['id']?>.html"><h2><?=$result_products[0]['ten']?></h2></a>
                    <div><?=format_money($result_products[0]['gia'],"đ")?><span> /<?=$result_products[0]['donvi']?></span></div>
                    </div>
                    
                     
                   </div>
                   <div class="col-md-7 col-sm-12 col-xsm-12 col-xs-12 right-dat-mua padding0">
                   <form name="frm-dathang" action="dang-ky-san-pham.html" method="post">
                   	<div class="block-info-customer">
                    	<strong class="col-md-12 col-sm-12  col-xsm-12 col-xs-12 padding0">Thông  tin người mua:</strong>
                        <label class="col-md-3 col-sm-3 col-xsm-3 col-xs-11">Họ tên:</label>
                       <span class="col-md-2 col-sm-2 col-xsm-2 col-xs-3 padding0"> 
                       <select class="" name="daungu">
                        	<option value="Anh">Anh </option>
                            <option value="Chị">Chị </option>
                        </select>
                        </span>
                        <input class="col-md-7 col-sm-7 col-xsm-7 col-xs-8" required="required" name="hoten" type="text" value="" />
                         <label class="col-md-3 col-sm-3 col-xsm-3 col-xs-11">Điện thoại:</label>
                        <input  class="col-md-9 col-sm-9 col-xsm-9 col-xs-11 dienthoai" required="required" type="text" name="dienthoai" value="" />
                         <label class="col-md-3 col-sm-3 col-xsm-3 col-xs-11">Email:</label>
                        <input class="col-md-9 col-sm-9 col-xsm-9 col-xs-11" type="email" name="email" value="" />
                         <label class="col-md-3 col-sm-3 col-xsm-3 col-xs-11">Tỉnh/TP:</label>
                        <span class="col-md-9 col-sm-9 col-xsm-9 col-xs-11 padding0" />
                         <select class="thinhthanh" name="thinhthanh" required="required">
                         <option value="">Vui lòng chọn tỉnh/Thành phố </option>
                         	<?
							 foreach((array)$result_tinhthanh_item as $k=>$v){
                            ?>
                        	<option data-id="<?=$v['id']?>" value="<?=$v['ten']?>"><?=$v['ten']?> </option>
                            <? }?>
                           
                        </select>
                        </span>
                         <label class="col-md-3 col-sm-3 col-xsm-3 col-xs-12">Quận/huyện:</label>
                        <span class="col-md-9 col-sm-9 col-xsm-9 col-xs-12 padding0" />
                         <select class="quanhuyen" name="quanhuyen" required="required">
                         <option value="">Vui lòng chọn Quận/Huyện </option>
                        		<?
							 foreach((array)$result_tinhthanh as $k=>$v){
                            ?>
                        	<option  data-id="<?=$v['id']?>" value="<?=$v['ten']?>"><?=$v['ten']?> </option>
                            <? }?>
                           
                        </select>
                        </span>
                        <label class="col-md-3 col-sm-3 col-xsm-3 col-xs-11">Địa chỉ:</label>
                       <span  class="col-md-9 col-sm-9 col-xsm-9 col-xs-11 padding0">
                        <textarea name="diachi" class="address" required="required" placeholder="Số nhà, Tên đường, Tên tòa nhà (Nếu có), Phường xã"  name="" /></textarea>
                      
                       </span>
                       <label class="col-md-3 col-sm-3 col-xsm-3 col-xs-11">Tên sản phẩm:</label>
                       <span  class="col-md-9 col-sm-9 col-xsm-9 col-xs-11 padding0">
                        
                        <a href="san-pham/<?=$result_products[0]['tenkhongdau']?>/<?=$result_products[0]['id']?>.html">
                        <h2 class="name-product-add"><?=$result_products[0]['ten']?></h2></a>
                      <input type="hidden" value="<?=$_GET['idc']?>" name="id_products" />
                       </span>
                       <label class="col-md-3 col-sm-3 col-xsm-3 col-xs-11">Số lượng</label>
                       <span  class="col-md-9 col-sm-9 col-xsm-9 col-xs-11 padding0">
                        <input name="soluong" type="number" required="required" min="1" value="1" />
                      
                       </span>
                      
                       <label class="col-md-3 col-sm-3 col-xsm-3 col-xs-12"></label>
                       <span  class="col-md-9 col-sm-9 col-xsm-9 col-xs-12 padding0"> 
                       <img src="images/bg_dangky_mua.png" class="btn_dangky_mua" />
                      
                       </span>
                       
                    </div>
                    <input class="btn-submit" type="submit" style=" display:none;" />
                    </form>
                   	</div>
                   
              </div>
              </div>
  

