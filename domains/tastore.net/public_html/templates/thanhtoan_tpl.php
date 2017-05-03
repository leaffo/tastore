<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
		remove_product($_REQUEST['pid']);
	}
	else if($_REQUEST['command']=='clear'){
		unset($_SESSION['cart']);
	}
	else if($_REQUEST['command']=='update'){
		$max=count($_SESSION['cart']);
		for($i=0;$i<$max;$i++){
			$pid=$_SESSION['cart'][$i]['productid'];
			$q=intval($_REQUEST['product'.$pid]);
			if($q>0 && $q<=999){
				$_SESSION['cart'][$i]['qty']=$q;
			}
			else{
				$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
			}
		}
	}
?>
<script language="javascript">
	function del(pid){
		if(confirm('Do you really mean to delete this item')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('This will empty your shopping cart, continue?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
</script>
<script>
 $().ready(function(e) {
	 
	$('.payments-cart').click(function(){
		
		$('.frm_cart').submit();
		
		})
	 
    $('.btn-del').click(function(){
		questtion=confirm("Bạn có muốn xóa sản phẩm này ra giỏ hàng không");
		if(questtion){
		$(this).parent().slideToggle();
		id=$(this).attr('data-id');
		
			remove_cart(id);
		}
		})
		
	$('.price-products strong, .total-price ').priceFormat({
				 prefix: '',
				  centsLimit: 3,
    suffix: 'VNĐ'
				});
				
				
		
	$('.soluong').change(function(){
		soluong=$(this).val()
		price=$(this).attr('data-price');
		id_products=$(this).attr('data-id');
	
		tongtien=soluong*price*1;
		$(this).parent().parent().find('.price-products strong').html(tongtien);
		// get total
		get_total_cart();
		
		
		// update record
		update_cart(id_products,soluong)
		
			$('.price-products strong').priceFormat({
				 prefix: '',centsLimit: 3,
    suffix: 'VNĐ'
				}); 
		
		});
		
		
		
		// get function data
	function get_total_cart(){
		$.ajax({
				url:"ajax.php",
				type:"post",
				data:"total_cart=1",
				async:true,
				success:function(result){
					$(".total-price").html(result);
						}
				});
		}
	function update_cart($id,$sl){
		
		$.ajax({
				url:"ajax.php",
				type:"post",
				data:"update_cart="+$id+'sl='+$sl,
				async:true,
				success:function(result){
					$(".total-price").html(result);
						}
				});
		
		}
	
	function remove_cart($id){
		$.ajax({
				url:"ajax.php",
				type:"post",
				data:"remove_cart="+$id,
				async:true,
				success:function(result){
					$(".total-price").html(result);
						}
				});
		
		}
	
	
	
	$('.rdo-payment').click(function(){
		
		$(this).parent().parent().find('.active_li').removeClass('active_li');
		$(this).parent().addClass('active_li');
		});
		
		$('.btn-cart').click(function(){
			$('.frm-payment').submit();
			
			});
			
		$('.payment-online').click(function(){
			
			$('.block-form-paymentonline').submit();
			})
});
</script>
<link href="css/style_cart.css" rel="stylesheet">
<script src= "js/jquery.price_format.2.0.js"></script>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>

<div class="container ">
  <div ng-app="" >
    <div class="col-md-12 col-xs-12 block-content-tab">
      <div class="block-content-tab-about  row">
        <h2 class="title-tab title-content-about">Thanh toán</h2>
        <?php
    date_default_timezone_set('Asia/Krasnoyarsk');
?>
        <?
	   $max=count($_SESSION['cart']);
		
	   for($i=0;$i<$max;$i++){
		   // get products info
		   
		   $pid=$_SESSION['cart'][$i]['productid'];
			$q=$_SESSION['cart'][$i]['qty'];					
		   $name_product=get_product_name($pid);
		   $price_product=get_price($pid);
		   $tongtien_record=$q*$price_product;
		   $photo_product=get_product_photo($pid);
		   
       ?>
        <div class=" col-md-12 col-sm-12 col-xsm-12 col-xs-12 block-content-cart-item">
          <div class="col-md-1 col-sm-1 col-xsm-1 col-xs-1 img-cart"><img src="<?=_upload_sanpham_l.$photo_product?>" width="" /> </div>
          <div class=" col-md-5 col-sm-5 col-xsm-5 col-xs-5 name-cart"> <span>
            <?=$name_product?>
            </span> <br />
            <br />
            <span class="price-product">Giá: <strong>
            <?=format_money($price_product)?>
            </strong></span> </div>
          <div class=" col-md-2 col-sm-2 col-xsm-2 col-xs-4 number-cart-item">Số lượng: <br />
            <input class="soluong" data-id='<?=$pid?>' data-price="<?=$price_product?>" ng-model="qty<?=$i?>" min="1" required="required" type="number" name="soluong" value="{{<?=$q?> }}" />
          </div>
          <div class=" col-md-3 col-sm-3 col-xsm-3 col-xs-3 total-cart-item"> <span> Tổng tiền</span> <br />
            <span class="price-products"><strong>
            <?=$tongtien_record?>
            </strong></span> </div>
          <div class=" col-md-1 col-sm-1 col-xsm-1 col-xs-1 btn-del" data-id="<?=$pid?>"> <i class="glyphicon glyphicon-trash  img-del"></i> </div>
        </div>
        <? } ?>
        <div class="col-md-6 col-sm-12 col-xsm-12 col-xs-12  total-cart">
          <h2>Tổng giá trị đơn hàng: <span class="total-price">
            <?=get_order_total()?>
            </span></h2>
            
            
            <?
			 // create code order
			 function fns_Rand_digit($min,$max,$num)
				{
					$result='';
					for($i=0;$i<$num;$i++){
						$result.=rand($min,$max);
					}
					return $result;	
				}		
			 $order_code='HD_'.fns_Rand_digit(0,9,6);
			 
			 $_SESSION['hd_online']=$order_code;
			 //get ip client
			 
		
		//check_array($_SESSION['customer']);
	
			 
            ?>
          <form  class="block-form-paymentonline" action="thanh-toan-online.html" method="post">
            <input type="hidden" name="Title" value="VPC 3-Party" />
            <input type="hidden" name="virtualPaymentClientURL" size="63" value="http://mtf.onepay.vn/onecomm-pay/vpc.op" maxlength="250" />
            <?	//Merchant ID    ?>
            <input type="hidden" name="vpc_Merchant" value="ONEPAY" size="20" maxlength="16" />
            <?php /*?>Merchant AccessCode<?php */?>
            <input type="hidden" name="vpc_AccessCode" value="D67342C2" size="20" maxlength="8" />
            <?php /*?>Merchant Transaction Reference<?php */?>
            <input type="hidden" name="vpc_MerchTxnRef" value="<?php echo date ( 'YmdHis' ) . rand ();?>" size="20" maxlength="40" />
            <?php /*?> Transaction OrderInfo<?php */?>
            <input type="hidden" name="vpc_OrderInfo" value="<?=$order_code?>" size="20" maxlength="34" />
            <?php /*?>Purchase Amount<?php */?>
            <input type="hidden" name="vpc_Amount" value="<?=get_order_total()*100?>" size="20"	maxlength="10" />
            <?php /*?>   Receipt ReturnURL<?php */?>
            <input type="hidden" name="vpc_ReturnURL" size="45" value="http://localhost/caulacbodautu/?com=ket-qua-thanh-toan" maxlength="250" />
          
          <?php /*?>   <br /> VPC Version<?php */?>
            <input type="hidden" name="vpc_Version" value="2" size="20"
				maxlength="8" />
           
         <?php /*?>   <br /> Command Type<?php */?>
            <input type="hidden" name="vpc_Command" value="pay" size="20"
				maxlength="16" />
          
        <?php /*?>   <br />   Payment Server Display Language Locale<?php */?>
            <input type="hidden" name="vpc_Locale" value="vn" size="20"
				maxlength="5" />
            
          <?php /*?> <br /> Currency code<?php */?>
            <input type="hidden" name="vpc_Currency" value="VND" size="20"
				maxlength="5" />
          
         <?php /*?>    <br /> Addition Infomation
            IP address<?php */?>
            <input type="hidden" name="vpc_TicketNo" maxlength="15" value="<?php  echo $_SERVER ['REMOTE_ADDR'];?>" />
         
        <?php /*?>     <br />  Shipping Address<?php */?>
            <input type="hidden" name="vpc_SHIP_Street01" value="<?=$_SESSION['customer']['diachi_nguoimua']?>" size="20" maxlength="500" />
           
         <?php /*?> <br />   Shipping Province<?php */ ?>
            <input type="hidden" name="vpc_SHIP_Provice" value="<?=$_SESSION['customer']['diachi_nguoimua']?>" size="20" maxlength="50" />
          
         <?php /*?>  <br />   Shipping City<?php */?>
            <input type="hidden" name="vpc_SHIP_City"value="<?=$_SESSION['customer']['thanhpho_nguoimua']?>" size="20" maxlength="50" />
           
          <?php /*?>  <br /> Shipping Country<?php */?>
            <input type="hidden" name="vpc_SHIP_Country" value="Viet Nam" size="20" maxlength="50" />
            <br />
         <?php /*?>   Customer Phone<?php */?>
            <input type="hidden" name="vpc_Customer_Phone" value="<?=$_SESSION['customer']['dienthoai_nguoimua']?>" size="20" maxlength="50" />
            <br />
           <?php /*?> Customer email<?php */?>
            <input type="hidden" name="vpc_Customer_Email" size="20" value="<?=$_SESSION['customer']['email_nguoimua']?>" maxlength="50" />
            <br />
         <?php /*?>   Customer User Id<?php */?>
            <input type="hidden" name="vpc_Customer_Id" value="thanhvt" size="20"	maxlength="50" />
          <?php /*?>  <input type="submit"	value="Pay Now!" /><?php */?>
          </form>
        </div>
        <form class="frm-payment" action="thanh-toan-3.html" method="post">
          <div class="col-md-6 control-cart">
            <fieldset>
              <legend>Chọn phương thức thanh toán</legend>
              <ul class="list-payment">
                <li>
                  <input class="rdo-payment" type="radio" name="payment" name="thanhtoan" value="thanhtoantienmat" />
                  Thanh toán tiền mặt
                  <ul class="content-payment">
                    <div class="payments-cart  btn-cart">Thanh toán</div>
                  </ul>
                </li>
                <li>
                  <input class="rdo-payment" type="radio" name="payment" name="thanhtoan"/>
                  Thanh toán ngân hàng
                  <ul class="content-payment">
                  
                    <div class="payments-cart payment-online  btn-cart1">Thanh toán</div>
                  </ul>
                </li>
              </ul>
            </fieldset>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
