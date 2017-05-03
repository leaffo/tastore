


 
    <h2 class="title-noibat title_giohang">Giỏ hàng của tôi  <span>( Đang Có ( <?=get_total()?> ) Sản phẩm)</span></h2>
              <div class="block-products ">
               <div class=" block-faq">
               <div class="list-item col-md-12 col-sm-12 col-xsm-12 ">
               <table border="0" class=" table-m-gh">
          <tr class="title-block-cart title_cart_m_gh">
            <td>Sản phẩm</td>
            <td class="hidden-m">Giá </td>
            <td>Số lượng</td>
            <td class="hidden-m">Giảm</td>
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
                
          <tr class="row-<?=$pid?>">
            <td class="img-block-cart"><img class="img-cart-m-gh" width="50" src="<?=_upload_sanpham_l.$photo_product?>" /> <span><?=$name_product?></span></td>
            <td class="hidden-m"><?=format_money_m($price_product)?></td>
            <td><input name="soluong" data-id="<?=$pid?>" type="number" min="1" value="<?=$q?>" class="sl_cart soluong_m_gh" /><br />
            <span data-id="<?=$pid?>" class="btn_x_cart btn_delete_cart_top btn_xoa_cart">Bỏ sản phẩm <img src="images/btn_x_cart.png" /></span>
		</td>
            <td class="hidden-m"><?=$giam?></td>
            <td><span class="total_product<?=$pid?>"><?=$tongtien_sp?></span></td>
          </tr>
          <? }?>
        </table>
        <a class="btn-tieptuc-mua_m_gh" href="san-pham.html">Tiếp tục mua hàng</a>
         <?
 $tongtien=format_money_m(get_order_total(),"<sup>đ</sup>");
 ?>
  <table width="260" border="0" class="table-thongke-gh">
  <tr class="total-all">
    <td><b>Tổng chưa giảm</b></td>
    <td><b class="tongtien"><?=$tongtien?></b></td>
  </tr>
  <tr>
    <td>Phí đống gói <br />và giao hàng</td>
    <td><span style="color:#f00">Chưa có</span></td>
  </tr>
  <tr class="thanhtien">
    <td><strong>Thàng tiền</strong></td>
    <td class="price-thanhtien"><strong class="tongtien"><?=$tongtien?></strong><br />
    <span>Đã bao gồm VAT</span>
    </td>
  </tr>
  <tr>
    <td colspan="2"><a href="dat-hang.html"><img src="images/btn_dathang.png" /></a></td>
  </tr>
</table>

               </div>
                </div>
              </div>





