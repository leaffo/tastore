<script language="javascript">
	function del(pid){
		if(confirm('Bạn có muốn xóa sản phẩm này không')){
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
<?php 
	$now = getdate();
?>

<style type="text/css">
.contentinformationleft input{ border:1px solid #ccc; margin:5px; width:315px; height:30px;}
textarea{border: 1px solid #ccc;
width: 318px;
margin-left: 5px;
height: 86px;
}

.buttonviewdetail{width: 129px;
background: #38B04A;
height: 50px;
font-size: 25px;
color: #fff;
text-transform: capitalize;
border: 1px solid #fff;}
</style>
 <?
 $d->reset();
$sql="select id,tenkhongdau,ten from #_taikhoannganhang where hienthi=1 order by stt asc";
$d->query($sql);
$result_account_payment=$d->result_array();
  ?>
  <script>
	j(document).ready(function(e) {
	
		j('.del_cart_payment').click(function(){
			id=j(this).attr('data-id')
			j.ajax({
					url:"ajax.php",
					type:"post",
					data:"add_card="+id,
					async:true,
					success:function(result){
						j(".mess").html(result);
							}
					});
			j(this).parent().parent().fadeOut();		
			})
			
			j('.account_payment').change(function(){
				id=j(this).val();
					j.ajax({
					url:"ajax.php",
					type:"post",
					data:"id_payment="+id,
					async:true,
					success:function(result){
						j(".description-payment").html(result);
							}
					});
				j('.description-payment').show();
				})
	});

</script>
   <form name="form1" method="post" action="thanh-toan1.html">
<input type="hidden" name="pid" />
<input type="hidden" name="command" />  
<div class="container">
<div class="block">
            	<h3><span><span>Thanh Toán</span></span></h3>
                <div class="content">
             <div class="content content_cart">
        	  <div class="left_cart">
              	<div class="title_cart"> 1.Tóm tắc đơn hàng</div>
                <ul class="list_left_cart">
                <?
				$max=count($_SESSION['cart']);
				for($i=0;$i<$max;$i++){
					$pid=$_SESSION['cart'][$i]['productid'];
					$pkl=$_SESSION['cart'][$i]['productkl'];
					$q=$_SESSION['cart'][$i]['qty'];
					$pname=get_product_name($pkl);
					$pphoto=get_product_photo($pkl);
					
				 ?>
                	<li><img src="<?=_upload_hinhanh_l.$pphoto?>" />
                    	<span><?=$pname?></span><br /> <b><?=format_money(get_price($pid))?> x <?=$q?></b>
                 			 <b><img data-id="<?=$pid?>_/<?=$pkl?>_/0" class="del_cart_payment" src="images/delete1.png"></b>
                       
                    </li>
                    
                    <? }?>
                </ul>
              </div>
              <div class="right_cart1 right_cart right_cart1">
              <div class="title_cart"> 2.Địa chỉ giao hàng</div>
             
              <table width="584" border="0">
                  <tr>
                    <td width="22%">Họ tên:</td>
                    <td width="78%"><?=$_SESSION['infor_cart']['username']?></td>
                  </tr>
                  <tr>
                    <td>Điện thoại</td>
                    <td><?=$_SESSION['infor_cart']['dienthoai']?></td>
                  </tr>
                  <tr>
                    <td>Địa chỉ</td>
                    <td><?=$_SESSION['infor_cart']['diachi']?></td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td><?=$_SESSION['infor_cart']['email']?></td>
                    	
                       
                  </tr>
                  <tr>
                    <td></td>
                    <td><a href="thanh-toan.html">Thay đỗi địa chỉ</a></td>
                    	
                       
                  </tr>
                  
                  
                   
                    <td>
             			
                  </tr>
                  
                  
                  <tr>
                  	<td> <?php
	
		if($ngay_error!='')
		{
		echo "*".$ngay_error;
		echo '<br/>';
		}
		if($ten_error!='')
		{
		echo "*".$ten_error;
		echo '<br/>';
		}
		if($dienthoai_error!='')
		{
		echo "*". $dienthoai_error;
		echo '<br/>';
		}
		if($diachi_error!='')
		{
		echo "*". $diachi_error;
		echo '<br/>';
		}
		if($email_error!='')
		{
		echo "*". $email_error;
		echo '<br/>';
		}
		if($noidung_error!='')
		{
		echo "*". $noidung_error;
		echo '<br/>';
		}
		if($phuongthuc_error!='')
		{
		echo "*". $phuongthuc_error;
		echo '<br/>';
		}
		?></td>
                    <td>  <input style="margin-right:20px;"title='tiếp tục' alt='tiếp tục' 
                    class="buttonviewdetail" type="submit" name="next" value="Tiếp tục" style="cursor:pointer;" onclick="js_submit();"/></td>
                  </tr>
                </table>

              </div>
              <div class="right_payment">
             	  <div class="title_cart">3.Hình thức thanh toán</div>
                  <ul class="list_payment">
                  <li>
                   <input type="radio" checked="checked"  name="hinhthucthanhtoan" value="Thanh toán bằng tiền mặt" /> <span class="tienmat"> Thanh toán bằng tiền mặt</span><br />
            </li>
            <li>
                    <input type="radio"   name="hinhthucthanhtoan" value="Thanh toán bằng ATM" /><span class="bangthe">Bằng thẻ ATM có internet Banking</span></li></ul>
               	 <b>  Chuyển vào tài khoản</b></p>
                 <select class="account_payment" name="taikhoannganhang">
                 
                 	<? foreach((array)$result_account_payment as $k=>$v){?>
                 	<option i value="<?=$v['id']?>"><?=$v['ten']?></option>
                  <? }?>
                 </select>
                 
                 <?
 $d->reset();
	$sql="select id,tenkhongdau,ten,noidung from #_taikhoannganhang where hienthi=1 order by stt asc";
	$d->query($sql);
	$result_account_payment=$d->result_array();
	
 ?>
                 <span class="description-payment">
                <? echo $result_account_payment[0]['noidung'];?>
                 </span>
              </div>
	    </div>
             
              <div class="clearb"></div>
            </div>
          </div><!--end block-->
          
          </div>
          </form>