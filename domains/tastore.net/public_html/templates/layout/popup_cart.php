<script type="text/javascript">
$().ready(function(e) {
	 $('body','html').on('change','.sl_cart', function() { 
   // $('.sl_cart').change(function(){
		sl=$(this).val();

		id_product=$(this).attr('data-id');
		
			 $.ajax({
						url:"ajax1.php",
						type:"get",
						data:"id_product="+id_product+"&sl="+sl,
						dataType:"json",
						success:function(data1){
						$('.total_product'+id_product).html(data1.total_poducts);
						$('.tongtien').html(data1.tongtien);
						}
		 			});
		
		})
});
</script>

<div id="block_popup_cart" class="main_cart" style=" width:780px;display: none;">
							
		<h3>Giỏ hàng của tôi <span>(Đang có <?=get_total()?> sản phẩm)</span></h3>
		<table border="0" class="table">
          <tr class="title-block-cart">
            <td>Sản phẩm</td>
            <td>Giá </td>
            <td>Số lượng</td>
            <td>Giảm</td>
            <td>Tổng</td>
          </tr>
          <?
				$max=count($_SESSION['cart']);
	   for($i=0;$i<$max;$i++){
		      $pid=$_SESSION['cart'][$i]['productid'];
		   $q=$_SESSION['cart'][$i]['qty'];					
		   $name_product=get_product_name($pid);
		   $price_product=get_price($pid);
		$photo_product=get_product_photo($pid);
		$all_info=get_product_allinfo($pid);
		// tong tien tung san pham
		$tongtien_sp=format_money_m($q*$price_product,'<sup>đ</sup>');
		// tinh tien giam
		$giam=format_money_m($all_info['giakhuyenmai']-$all_info['gia']);
		
                ?>
                
          <tr>
            <td class="img-block-cart"><img width="50" src="<?=_upload_sanpham_l.$photo_product?>" /> <span><?=$name_product?></span></td>
            <td><?=format_money_m($price_product)?></td>
            <td><input name="soluong" data-id="<?=$pid?>" type="number" min="1" value="<?=$q?>" class="sl_cart" /><br />
            	<span data-id="<?=$pid?>" class="btn_x_cart btn_delete_cart_top">Bỏ sản phẩm <img src="images/btn_x_cart.png" /></span>
</td>
            <td><?=$giam?></td>
            <td><span class="total_product<?=$pid?>"><?=$tongtien_sp?></span></td>
          </tr>
          <? }?>
        </table>
        <a href="san-pham.html" class="next-add">Tiếp tục mua hàng</a>
 
 <?
 $tongtien=format_money_m(get_order_total(),"<sup>đ</sup>");
 ?>
  <table width="260" border="0" class="table-thongke">
  <tr class="total-all">
    <td><b>Tổng chưa giảm</b></td>
    <td><b class="tongtien"><?=$tongtien?></b></td>
  </tr>
  <tr>
    <td>Phí đóng gói <br />và giao hàng</td>
    <td><span style="color:#f00">Chưa có</span></td>
  </tr>
  <tr class="thanhtien">
    <td><strong>Thành tiền</strong></td>
    <td class="price-thanhtien"><strong class="tongtien"><?=$tongtien?></strong><br />
    <span>Đã bao gồm VAT</span>
    </td>
  </tr>
  <tr>
    <td colspan="2"><a href="dat-hang.html"><img src="images/btn_dathang.png" /></a></td>
  </tr>
</table>
	</div>


<!--popup thong bao het hang
-->
<a class="thongbao fancybox" href="#thongbaohethang"></a>
<div id="thongbaohethang" style=" display:none">
<h2>Sản phẩm bạn chọn hiện đã hết hàng, bạn có thể đăng ký đặt mua khi sản phẩm đó có hàng</h2>
<a class="btn-dang-ky-mua-hang" href="dang-ky-san-pham/2.html">Đăng ký mua hàng</a>
</div>


<a href="gio-hang.html"><div class="bth_iconcart_m"><span class="item_cart_m">(<?=get_total()?>)</span></div></a>