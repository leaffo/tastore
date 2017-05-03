
<?
$d->reset();
	$sql = "select id,ten,tenkhongdau,gia from #_tinhthanh_item where hienthi=1 order by stt asc";
	$d->query($sql);
	$result_tinhthanh_item = $d->result_array();

$d->reset();
	$sql = "select id,ten,tenkhongdau,gia from #_tinhthanh where hienthi=1 order by stt asc";
	$d->query($sql);
	$result_tinhthanh1 = $d->result_array();
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
		
		$('.btn-mayment').click(function(){
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
<script>
$().ready(function(e) {
    $('.thanh-toan-ngan-hang').click(function(){
	$('.thongtin-nganhang').slideDown();
		})
	$('.thanhtoantienmat').click(function(){
		
		$('.thongtin-nganhang').slideUp();
		})
});
</script>
    <h2 class="title-noibat">Địa chỉ giao hàng, thanh toán</h2>
              <div class="block-products">
              <div class=" block-faq">
                   <div class="col-md-7 col-sm-12 col-xsm-12 col-xs-12 padding0">
                   <form name="frm-dathang" action="dat-hang.html" method="post">
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
                        <input autocomplete="off" class="col-md-9 col-sm-9 col-xsm-9 col-xs-11 dienthoai" required="required" type="text" name="dienthoai" value="" />
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
                       <strong class="col-md-12 col-sm-12  col-xsm-12 col-xs-12 padding0">Phương thức thanh toán:</strong>
                       <ul class="list-paymet">
                       		<li><input class="thanhtoantienmat" name="phuonthucthanhtoan" value="Thanh toán tiền mặt" checked="checked" type="radio" /> <img src="images/icon_payment.png" /><span> Thanh toán tiền mặt</span></li>
                            <li><input class="thanh-toan-ngan-hang" name="phuonthucthanhtoan" value="Thanh toán qua ngân hàng" type="radio" /> <img src="images/icon_payment1.png" /><span> Thẻ ATM đăng ký internet Banking (miễn phí thanh toán)</span></li>
                            
                       </ul>
                       <div class=" col-md-12 thongtin-nganhang"><?=$result_company['noidung']?></div>
                       <label class="col-md-3 col-sm-3 col-xsm-3 col-xs-12"></label>
                       <span  class="col-md-9 col-sm-9 col-xsm-9 col-xs-12 padding0"> 
                       <img src="images/btn_payment.png" class="btn-mayment" />
                      
                       </span>
                    </div>
                    <input class="btn-submit" type="submit" style=" display:none;" />
                    </form>
                   	</div>
                   <div class="col-md-5 col-sm-12 col-xsm-12 col-xs-12 block-info-main padding0">
                    <strong class="col-md-12 col-sm-12  col-xsm-12 col-xs-12 padding0">Thông tin đơn hàng:</strong>
                    <div class="col-md-12 col-sm-12  col-xsm-12 col-xs-12 block-info-cart">
                    	<div class="title_info_cart"><h2>Đơn hàng</h2><span>(<?=get_total()?> sản phẩm)</span> <a class="fancybox" href="#block_popup_cart"> <div class="btn-update">Sửa</div></a></div>
                        <?
							$max=count($_SESSION['cart']);
						$tongtien=format_money(get_order_total(),' <sup>đ</sup>');
				   for($i=0;$i<$max;$i++){
						  $pid=$_SESSION['cart'][$i]['productid'];
					   $q=$_SESSION['cart'][$i]['qty'];					
					   $name_product=get_product_name($pid);
					   $price_product=get_price($pid);
					$photo_product=get_product_photo($pid);
					
						$tong_tien_sp=$q*$price_product;
							?>
                    	<div class="list-item-cart"> <?=$q?> x <?=$name_product?>  <span class="gia-info"><?=format_money($tong_tien_sp,'<sup>đ</sup>')?></span></div>
                      <? }?>
                       
                        <div class="list-item-cart"><strong>Tạm tính</strong>  <span class="gia-info"><strong><?=$tongtien?></strong></span></div>
                        <div class="list-item-cart"> Phí vận chuyển  <span class="gia-info phi-dong-goi">Chưa có</span></div>
                        
                        <div class="list-item-cart total-cart-main"><strong>Tổng cộng  </strong><span class="gia-info "><strong class="tongthanhtoan"><?=$tongtien?></strong></span></div>
                       
                    </div>
                     <div class="col-md-12 col-sm-12  col-xsm-12 col-xs-12 block-info-cart">
                     <strong>Địa chỉ giao hàng:</strong><br />
                     Địa chỉ: <span class="diachigiaohang"></span><br />
                     <span class="dienthoaigiaohang">Điện thoại: </span>
                     </div>
                   </div>
              </div>
              </div>
  

