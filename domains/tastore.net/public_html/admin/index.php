<?php ob_start();
	session_start();
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './lib/');

	include_once _lib."config.php";

    @define ( '_kiemtraweb_AT' , $check_website_AT);

	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."q_functions.php";
	include_once _lib."library.php";
	include_once _lib."class.database.php";



	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

	$d = new database($config['database']);

	include_once _lib."new.php";

	//Kiểm tra tính hợp lệ
	if((!isset($_SESSION[$login_name]) || $_SESSION[$login_name]==false) && $act!="login"){
		$_SESSION[$login_name] = false;
		unset($_SESSION['login']);
		redirect("index.php?com=user&act=login");
	}
	if(isset($_SESSION['login'])){
		$username = htmlspecialchars(strip_tags(addslashes(trim($_SESSION['login']['username']))));
		$username = magic_quote($username);
		$password = taomatkhau($_SESSION['login']['password']);
		$sql = "select ten from #_user where username='$username' and password='$password' and role=3";
		$d->query($sql);
		if($d->num_rows() == 0){
			$_SESSION[$login_name] = false;
			unset($_SESSION['login']);
			redirect("index.php?com=user&act=login");
		}
	}

	$active_menu = '';
	switch($com){
		//Quản lý thành viên
		case 'user':
			$source = "user";
			break;
		case 'member':
			$source = "member";
			break;
		case 'newsletter':
			$source = "newsletter";
			break;
		case 'faq':
			$source = "faq";
			$source = "faq";
			break;	
		
		case 'donvi':
			$source = "donvi/donvi";
			break;	
		case 'hinhanh':
			$source = "hinhanh/hinhanh";
			break;		
		case 'tintuc':
			$source = "tintuc";
			break;		
			
		case 'hoidap':
			$source = "hoidap";
			break;
		case 'baiviet':
			$source = "baiviet";
			break;		
		case 'post':
			$source = "post";
			break;		


		//TIN 1 NỘI DUNG
		case 'about':
			$active_menu = 'about';
			$source = "about";
			break;
//        Size
        case 'size':

            $source = "size";
            break;

		




		//THông tin công ty
		case 'company':
			
			$source = "company";
			break;
		case 'yahoo':
			
			$source = "yahoo";
			break;	
	case 'tinhthanh':
			
			$source = "tinhthanh";
			break;
        //THông tin don hang
        case 'donhang':
            $source = "donhang";
            break;
			
		  case 'dangkysanpham':
            $source = "dangkysanpham";
            break;	

        //THông tin don hang
        case 'dathang':

            $source = "dathang";
            break;


     




		//LIÊN QUAN ĐẾN SẢN PHẨM

		case 'products':
			$source = "product/product";
			break;
		case 'donhang':
			$source = "sanpham/donhang";
			break;
		case 'contact':
			$source = "contact";
			break;	



		default:
			$source = "index";
			$template = "index";
			break;
	}


	if($source!="") include _source.$source.".php";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="" />
  <meta name="copyright" content="Nina.Vn - Version 6-2014" />

  <title>Administrator </title>
  

  <?php if($act!="login"){	//Nếu không ở trong trang đăng nhập ?>
  <link rel="stylesheet" type="text/css" href="media/assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="media/assets/font-awesome/css/font-awesome.min.css">

  <!--[if lt IE 9]>
  <script src="media/js/html5shiv.js"></script>
  <script src="media/js/respond.min.js"></script>
  <![endif]-->

  <!-- Assets -->
  <link rel='stylesheet' type='text/css' href='media/assets/jquery-ui/ui-lightness/jquery-ui-1.10.3.custom.css' />
  <link rel='stylesheet' type='text/css' href='media/assets/icheck/flat/_all.css' /> <!--nút check-->

  <?php if($template=="index"){ ?>
  <link rel='stylesheet' type='text/css' href='media/assets/fullcalendar/fullcalendar.css' />
  <?php } ?>

  <!-- Theme Styles -->
  <link rel="stylesheet" type="text/css" href="media/css/style.css">
  <link rel="stylesheet" type="text/css" href="media/css/responsive.css">


  <?php }else{ //Nếu là trang đăng nhập ?>
  <link rel="stylesheet" type="text/css" href="./media/assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./media/assets/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="./media/css/style.css">
  <link rel="stylesheet" type="text/css" href="./media/css/responsive.css">
  <link rel="stylesheet" type="text/css" href="./media/css/animate.css">

  <!--[if lt IE 9]>
  <script src="./media/js/html5shiv.js"></script>
  <script src="./media/js/respond.min.js"></script>
  <![endif]-->
  <style>
     html {
       overflow: hidden !important;
     }
  </style>
  <?php } ?>

  <!-- Javascript -->
<script src="media/js/jquery-1.7.2.min.js"></script>
<script src="media/assets/bootstrap/js/bootstrap.min.js"></script>

<?php if($act!="login"){	//Nếu không ở trong trang đăng nhập ?>
<!--JQUERY THÊM VÀO 1-->
  <!-- TinyMCE -->
  <script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>
  <!-- /TinyMCE -->
  <!--Màu sắc-->
  <link href="media/js/colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css" />
  <script src="media/js/colorpicker/colorpicker.js"></script>
  <script src="media/js/colorpicker/eye.js"></script>
  <script src="media/js/colorpicker/utils.js"></script>
  <script src="media/js/colorpicker/layout.js?ver=1.0.2"></script>

  <script type="text/javascript">
  $(document).ready(function(e) {
	$('#colorpickerField1').ColorPicker({
		onSubmit: function(hsb, hex, rgb, el) {
			$(el).val(hex);
			$(el).ColorPickerHide();
		},
		onBeforeShow: function () {
			$(this).ColorPickerSetColor(this.value);
		}
	}).bind('keyup', function(){
		$(this).ColorPickerSetColor(this.value);
	});
  });
  </script>


<!--END JQUERY THÊM VÀO 1-->
<?php } ?>

</head>

<body <?=($act=="login" && $com=='user')?' class="login-page"':''?>>

<?php
	if(($act=="login" && $com=='user') || !isset($_SESSION['login']) || $_SESSION[$login_name]==false){
		include _template.$template."_tpl.php";
	}
	else{
?>
<section class="content" id='q_noidung'>

  <!-- Sidebar Start -->
  <?
  if($_REQUEST['no-head']!=1){
  ?>
  <div class="sidebar" id='q_left'>
    <?php include _template."menu_tpl.php";?>
  </div>
  <? }?>
  <!-- Sidebar End -->

  <div class="content-liquid-full" id='q_main'>
    <div class="container"  id='noidung_web'>
<?
  if($_REQUEST['no-head']!=1){
  ?>
      <!-- Header Bar Start -->
      <div class="row header-bar" id="step2">
       
		<?php  include _template."header_tpl.php"?>
        
      </div><? }?>
      <!-- Header Bar End -->

          <!-- Row Start -->
          <div class="row">
              <?php include _template.$template."_tpl.php";?>
          </div>
          <!-- Row End -->


        <div class="clearfix"></div>
    </div>
  </div>
  <div class="clearfix"></div>
</section>



<?php
	}
?>

    <!-- Footer Line Start -->
    <div class="footer-line">
        <?php include _template."footer_tpl.php";?>
    </div>


<div class="clearfix"></div>

<?php if($act!="login"){	//Nếu không ở trong trang đăng nhập ?>

<!-- jQuery UI -->
<script src="media/assets/jquery-ui/jquery-ui-1.10.3.custom.min.js"></script>

<script src="media/assets/tocify/tocify.js"></script>

<!-- iCheck -->
<script src="media/assets/icheck/icheck.js"></script>

<!-- Demo -->
<script src="media/_demo/icheck/icheck.js"></script>
<script src="media/_demo/all-pages.js"></script>
<?php if($template=="index"){ ?>
<!-- CountTo -->
<script src="media/assets/jquery-countto/jquery.count-to.js"></script>
<script src="media/assets/fullcalendar/fullcalendar.min.js"></script>
<script type="text/javascript" src="media/_demo/page-index.js"></script>
<?php } ?>

<!--JQUERY THÊM VÀO 2-->
<!--PHẦN CODE SELECT BOX-->
  <link href="media/js/selectbox/css/jquery.selectbox.css" type="text/css" rel="stylesheet" />
  <script type="text/javascript" src="media/js/selectbox/js/jquery.selectbox-0.2.min.js"></script>


<!--END JQUERY THÊM VÀO 2-->

<?php }else{ //Nếu là trang đăng nhập ?>

<script type="text/javascript">
  $(document).ready(function(e) {
      function canhgiua(){
		  var min_height = $(window).height();
		  $('div.login-page-container').css('height', min_height);
		  if(min_height>280)
			$(".boxed").css('margin-top','-140px');
	  }
	  canhgiua();

	  //Load khi
	  window.onload = canhgiua();
	  window.onresize = canhgiua();

	  $("#login").submit(function(e) {
		  if($("#username").val()==''){
			  alert("Quý khách vui lòng nhập Username!");
			  $("#username").focus();
			  return false;
		  }
		  if($("#password").val()==''){
			  alert("Quý khách vui lòng nhập Password!");
			  $("#password").focus();
			  return false;
		  }
		  $(this).submit();
	  });
  });
</script>
<?php } ?>

</body>
</html>