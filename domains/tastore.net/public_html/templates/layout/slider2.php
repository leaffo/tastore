

 
<script src="js/jquery.bxslider.js" type="text/javascript"></script>
<link rel="stylesheet" href="css/jquery.bxslider.css" type="text/css" />
 <?php
	$d->reset();
	$sql_slider = "select photo from #_doitac order by stt,id desc";
	$d->query($sql_slider);
	$result_slider=$d->result_array();
	
	
?>
        	<ul id="slider2">
                <?php
				for($i=0;$i<count($result_slider);$i++)
				{
				?>
                <li><a href="#" title="">
                <img src="<?=_upload_hinhanh_l.$result_slider[$i]['photo']?>" alt="" height="" /></a></li>
             	<? }?>
            </ul>
            <script>
                $('#slider2').bxSlider({
                  mode: 'fade',
                  auto: true,
                  autoControls: true,
                  pause: 4800
                });
            </script>
            
      