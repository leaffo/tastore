
<?

	
	$d->reset();
	$sql = "select id,ten,tenkhongdau from #_faq where hienthi=1 order by stt asc";
	$d->query($sql);
	$result_faq = $d->result_array();
	
	$_SESSION['cart']=NULL;
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
    <h2 class="title-noibat">Hoàn tất đơn hàng</h2>
              <div class="block-products">
               <div class=" block-faq">
               <div class="col-md-4  block-icon-cart"><img src="images/icon_cart_end.png" class="images-icon-cart" /></div>
               <div class="col-md-8 col-sm-12 block-end-cart">
              	<h2>Cảm ơn bạn đã mua hàng</h2>
				<span>Mã số đơn hàng của bạn là:<strong>  <?=$_SESSION['ma_hd']?></strong></span><br />
				<ul>
                	<li>Thời gian giao hàng dự kiến <strong> 3 - 4 ngày làm việc</strong>, không kể thứ 7 - chủ nhật</li>
                    <li>Thông tin chi tiết đơn hàng đã được gửi đến email  <span class="emai-kq"> <?=$_SESSION['email_customer']?> </span> bạn vui lòng kiểm tra hộp thư nếu không tìm thấy vui lòng tìm thêm trong hộp thu Spam hoặc Unk Folder</li>
                </ul>
                <div class="block-lkweb">
                <h3>Câu hỏi thường gặp</h3>
                <ul>
                	<?
					 foreach((array)$result_faq as $k=>$v){
                    ?>
                	<li><a href="faq/<?=$v['tenkhongdau']?>/<?=$v['id']?>.html"><?=$v['ten']?> </a></li>
                    <? }?>
                   
                </ul>
                
                </div>
                <a class="tiep-tuc-mua" href="san-pham.html"><strong>Tiếp tục mua hàng</strong></a>
               </div>
               
               </div>
              </div>
  

