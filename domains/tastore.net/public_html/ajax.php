<?php
session_start();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."function_user.php";
	include_once _lib."class.database.php";
	include_once _lib."functions_giohang.php";
	include_once _lib."file_requick.php";
	
?>
<?
	function get_list_cart(){
		$tongtien=format_money(get_order_total());
		$max=count($_SESSION['cart']);
		
		$list_cart='<ul class="">';
	   for($i=0;$i<$max;$i++){
		   
		   $pid=$_SESSION['cart'][$i]['productid'];
		   $q=$_SESSION['cart'][$i]['qty'];					
		   $name_product=get_product_name($pid);
		   $price_product=format_money_m(get_price($pid));
		   $tongtien_record=$q*$price_product;
		   $photo_product=get_product_photo($pid);
		   
			$list_cart.=' <li>
                	
                <img class="img_cart" src="'._upload_sanpham_l.$photo_product.'" />
                <h2>'.$name_product.'</h2><br />
                    <span>'.$q.' x '.$price_product.'</span>
                <div style=" clear:both"></div>
                <img data-id="'.$pid.'" class="btn_delete_cart_top" src="images/btn_delete.png" />
                </li> ';
				
	   }
	   $list_cart.='</ul>';
	   $tong_tien='Tổng: '.$tongtien;
	   
	   $list_main_acrt='<h3>Giỏ hàng của tôi <span>(Đang có '.get_total().' sản phẩm)</span></h3>
		<table border="0" class="table">
          <tr class="title-block-cart">
            <td>Sản phẩm</td>
            <td>Giá </td>
            <td>Số lượng</td>
            <td>Giảm</td>
            <td>Tổng</td>
          </tr>';
	   
	   
				$max=count($_SESSION['cart']);
	   for($i=0;$i<$max;$i++){
		      $pid=$_SESSION['cart'][$i]['productid'];
		   $q=$_SESSION['cart'][$i]['qty'];					
		   $name_product=get_product_name($pid);
		   $price_product=get_price($pid);
		$photo_product=get_product_photo($pid);
		$all_info=get_product_allinfo($pid);
		// tong tien tung san pham
		$tongtien_sp=format_money_m($q*$price_product);
		// tinh tien giam
		$giam=format_money_m($all_info['giakhuyenmai']-$all_info['gia']);
		
		
		$list_main_acrt.=' <tr>
            <td class="img-block-cart"><img width="50" src="'._upload_sanpham_l.$photo_product.'" /> <span>'.$name_product.'</span></td>
            <td>'.format_money_m($price_product).'</td>
            <td><input name="soluong" data-id="'.$pid.'"  type="number" min="1" value="'.$q.'" class="sl_cart" /><br>
			<span data-id="'.$pid.'" class="btn_x_cart btn_delete_cart_top">Bỏ sản phẩm <img src="images/btn_x_cart.png" /></span>
			</td>
            <td>'.$giam.'</td>
            <td><span class="total_product'.$pid.'">'.$tongtien_sp.'</span></td>
          </tr>';
	   
	   }
	    $list_main_acrt.= ' </table><a href="san-pham.html" class="next-add">Tiếp tục mua hàng</a>';
		 $tongtien=format_money_m(get_order_total(),"<sup>đ</sup>");
		$list_main_acrt.='<table width="260" border="0" class="table-thongke">
  <tr class="total-all">
    <td><b>Tổng chưa giảm</b></td>
    <td><b>'.$tongtien.'</b></td>
  </tr>
  <tr>
    <td>Phí đóng gói <br />và giao hàng</td>
    <td><span style="color:#f00">Chưa có</span></td>
  </tr>
  <tr class="thanhtien">
    <td><strong>Thành tiền</strong></td>
   <td class="price-thanhtien"><strong class="tongtien">'.$tongtien.'</strong><br />
    <span>Đã bao gồm VAT</span>
    </td>
  </tr>
  <tr>
    <td colspan="2"><a href="dat-hang.html"><img src="images/btn_dathang.png" /></a></td>
  </tr>
</table>';
	   
	
	   
	   
	   
	   
	   
		$array_cart_list=array(
				'addcart'=>'<li><span>Giỏ hàng:</span> '.get_total().' Sản phẩm</li>
        <li class="li-price">Giá: <strong>'.$tongtien.'</strong></li>',
				"data_list_cart" =>$list_cart,
				"list_main_cart" =>$list_main_acrt,
				"line_total" =>$tong_tien,
				"total_sp" =>'('.get_total().')'
		
			);
		
		  return json_encode($array_cart_list);
		
		
		}
if(!empty($_POST['id_product']))
	{   
	 $is_products=$_POST['id_product'];
	addtocart($is_products,1,0);
	
	// add cart
	 echo get_list_cart();
		}
if(!empty($_GET['id_product_detail']))
	{   
	 $is_products=$_GET['id_product_detail'];
	 $sl=$_GET['sl'];
	addtocart($is_products,$sl,0);
	
	// add cart
	 echo get_list_cart();
		}		
if(!empty($_POST['del_id_product']))
	{   
	 $is_products=$_POST['del_id_product'];
	remove_product($is_products);
	
	// show cart
	 echo get_list_cart();
		}		
