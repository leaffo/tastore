
<?

	$d->reset();
					$sql="select email from #_company limit 0,1 ";
					$d->query($sql);
					$result_email=$d->result_array();
					

$d->reset();
	$sql = "select * from #_donhang order by id desc";
	$d->query($sql);
	$result_donhang = $d->result_array();
	
		$ma_HD='';
		$email_customer='';
	foreach((array)$result_donhang as $k=>$v){
		if(md5($v['madonhang'])==$_GET['idc']){
			$email_customer=$v['email'];
			$ma_HD=$v['madonhang'];
			$data['hienthi'] ='1';
			$d->setWhere('id',$v['id']);
			$d->setTable('donhang');
			$d->update($data);
			
		
		} 
		}
		$body_admin="Cám ơn bạn đã xác nhận đơn hàng ".$ma_HD." thành công";
		$email=$result_email[0]['email'];
		
phpmailer_send($email,'rautot.com',$email_customer,'Thông tin đơn hàng rautot.com',$body_admin);
?>

    <h2 class="title-noibat">Xác nhận đơn hàng</h2>
              <div class="block-products">
               <div class=" block-faq">
               
               <? //=$_GET['idc']?>
               	<h2 class="title-xacnhan">Xác nhận đơn hàng <?=$ma_HD?> thành công</h2>
               
               </div>
              </div>
  

