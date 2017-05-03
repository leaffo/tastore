<?php
//ob_start();
session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	
	$session=session_id();
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');

	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."q_functions.php";	//Các hàm bổ sung
	include_once _lib."functions_giohang.php";		
	include_once _lib."class.database.php";
	include_once _lib."file_requick.php";
	include_once _lib."new.php";	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<base href="http://<?=$config_url?>"  />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?=$title_bar?>
<?=$row_title['ten']?>
</title>
<link rel="shortcut icon" type="image/x-icon" href="/images/ficon.png">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

<meta name="keywords" content="<?=$row_meta['ten']?>" />
<meta name="description" content="<?=$row_meta['description']?>" />


<meta name="copyright" content="" />
<meta name="robots" content="noodp,index,follow" />
<meta name="DC.title" content="" />
<meta name="ICBM" content="" />
<meta name='revisit-after' content='1 days' />
<meta property="og:image" content="http://rautot.com/<?=_upload_sanpham_l.$result_detail[0]['thumb']?>" />
<meta property="og:url" content="<?=getCurrentPageURL()?>" />
<meta property="og:description" content="<?=$row_meta['ten']?>" />
<meta property="og:site_name" content="<?=$row_meta['description']?>" />


<link href="css/styleload.css" rel="stylesheet">

<!-- Khai báo sử dụng css của Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">
<!--<link href="css/animate.css" rel="stylesheet">
-->
<!-- Sửa lỗi HTML5 cho IE 8 trở xuống -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

<link href="css/style.css" rel="stylesheet">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
-->
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>


<!-- Add jQuery library -->
	<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="js/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
    
    

<script type="text/javascript">
$(document).ready(function() {
	$('.fancybox').fancybox();
});
</script>
  <link rel="stylesheet" type="text/css" href="css/jcarousel.responsive.css">
 
  <script type="text/javascript" src="css/jquery.jcarousel.min.js"></script>
  <script type="text/javascript" src="css/jcarousel.responsive.js"></script>

</head>
<body>
<div class="container "><div class="blokc-menu-m">
 
    <? include _template."layout/header.php"?>
  <div id="session">
  			<? // san pham
			 if($com=='san-pham'&&$_GET['id']!=''){ ?>
				 
           
				   <div class=" col-md-12 col-sm-12 col-xs-12 block-right-left-se">
					
                       <? include _template.$template."_tpl.php"?>
                       
                     
                        
                    </div>
				    
				<? }else{
            ?>
            
            
            
  		<?  
		if($com=='blog'||$com=='tin-tuc'){
			include _template."layout/right_news.php";
			}else{
		include _template."layout/left.php";
			}
		?>
        <!--end left-->
        <div class=" col-md-9 col-sm-8 col-xs-12 block-right-se block-right-slider">
        	<? if($com=='index'||$com==''){
			 include _template."layout/slider1.php";
			}
			 ?>
           <?  include _template.$template."_tpl.php"?>
   
            
        </div>
        
         <? }?>
  
  </div>
<!--  end session-->
  
</div>
<?  include _template."layout/footer.php"?>
<? include _template."layout/popup_cart.php"?>
            
</body>
</html>







 





















