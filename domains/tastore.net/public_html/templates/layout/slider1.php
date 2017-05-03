

 
<script src="js/jquery.bxslider.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css" />
 <?php
	$d->reset();
	$sql_slider = "select ten,photo,id_photo from #_hinhanh where hienthi=1 and id_photo='QC-Sl1' order by stt,id desc ";
	$d->query($sql_slider);
	$result_slider=$d->result_array();
	
	
	$d->reset();
	$sql_slider = "select ten,photo,id_photo from #_hinhanh where hienthi=1 and id_photo='QC-1' order by stt,id desc ";
	$d->query($sql_slider);
	$result_quangcao1=$d->result_array();
	

?>
        	<ul id="slider">
                <?php
				foreach((array)$result_slider as $k=>$v)
				{
				?>
                <li><a href="<?=$v['ten']?>" target="_blank" title="<?=$v['ten']?>"><img  src="<?=_upload_hinhanh_l.$v['photo']?>" alt="<?=$v['ten']?>" /></a></li>
             	<? }?>
            </ul>

             <script>
                $('#slider').bxSlider({
                  mode: 'fade',
                  auto: true,
                  autoControls: true,
                  pause: 4800
				 
                });
            </script>
            
     
     
<?
 foreach((array)$result_quangcao1 as $k=>$v){
?>

  <div class="col-md-6 col-sm-6 col-xsm-6 col-xs-6 <? if(($k+1)%2!=0){?> block-asd1 <? }else{?> block-asd2 <? }?>">
           	<div class="block-asd-item"><a target="_blank" href="<?=$v['ten']?>">
            <img src="<?=_upload_hinhanh_l.$v['photo']?>">
            </a>
            </div>
            </div>
<? }?>
           






