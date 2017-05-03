<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

	<!-- Logo Start -->
    <a href="index.php">
      <div class="logo-container">
        <h1>ADMIN</h1>
      </div>
    </a>
    <!-- Logo End -->

    <!-- Sidebar -->
    <div class="responsive-menu">
      <a href="#" onclick="return false;"><i class="fa fa-bars"></i></a>
    </div>
    <!-- Sidebar End -->

    <!-- Menu Start -->
    <div class="tocify-nav-container">
    <ul class="menu tocify-box">
      <li class="parent purple <?=($com=='product')?'active':''?>">
        <a href="product" class="menu_click <?=($_SESSION['menu']['product']==2)?'':' close-child'?>">
          <span class="menu-icon"><i class="fa fa-align-justify"></i></span>
          <span class="menu-text">SẢN PHẨM</span>
        </a>
        <ul class="child" <?=($_SESSION['menu']['product']==2)?' style="display: none;"':' style="display: block;"'?>>
          <li><i class="fa fa-check"></i> <a href="index.php?com=products&act=man_list">Danh mục cấp 1</a></li>
          <li><i class="fa fa-check"></i> <a href="index.php?com=products&act=man_cat">Danh mục cấp 2</a></li>
          <!--<li><i class="fa fa-check"></i> <a href="index.php?com=product&act=man_">Danh mục cấp 3</a></li>-->
          <li><i class="fa fa-check"></i> <a href="index.php?com=products&act=man">Danh sách sản phẩm</a></li>
          
           <li><i class="fa fa-check"></i> <a href="index.php?com=donvi&act=man">Danh sách đơn vị</a></li>
          <?php /*?> <li><i class="fa fa-check"></i> <a href="index.php?com=hinhanh&act=man">Danh sách hình ảnh</a></li><?php */?>
        </ul>
      </li>

      <?php /*?><li class="parent purple <?=($com=='about')?'active':''?>">
        <a href="about" class="menu_click <?=($_SESSION['menu']['about']==2)?'':' close-child'?>">
          <span class="menu-icon"><i class="fa fa-file-text-o"></i></span>
          <span class="menu-text">MODULE 1 BÀI VIẾT</span>
        </a>
        <ul class="child" <?=($_SESSION['menu']['about']==2)?' style="display: none;"':' style="display: block;"'?>>
          <li><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap">Giới thiệu</a></li>
<!--          <li><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap1">Tuyển dụng</a></li>    -->
<!--          <li><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap2">Quà tặng</a></li>-->
<!--		  <li><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap3">Mới về</a></li> -->
<!--		  <li><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap4">Sắp có hàng</a></li>-->
<!--		  <li><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap5">Tạm hết hàng</a></li>   -->
<!--		  <li><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap6">Trao đổi hàng</a></li>-->
		  <li><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap7">Chữ quảng cáo</a></li>
<!--		  <li><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap8">Chữ chạy 2</a></li>-->
<!--		  <li><i class="fa fa-check"></i> <a href="index.php?com=about&act=capnhap9">chữ 3</a></li>                 -->
        </ul>
      </li><?php */?>

      <li class="parent purple <?=($com=='tintuc' || $com=='hoidap')?'active':''?>">
        <a href="tinnho" class="menu_click <?=($_SESSION['menu']['tintuc']==2)?'':' close-child'?>">
          <span class="menu-icon"><i class="fa fa-clipboard"></i></span>
          <span class="menu-text">MODULE TIN TỨC</span>
        </a>
        <ul class="child" <?=($_SESSION['menu']['tintuc']==2)?' style="display: none;"':' style="display: block;"'?>>
          <li><i class="fa fa-check"></i> <a href="index.php?com=tintuc&act=man">Blog</a></li>
          <li><i class="fa fa-check"></i> <a href="index.php?com=hoidap&act=man">Hỏi đáp</a></li>
          <li><i class="fa fa-check"></i> <a href="index.php?com=baiviet&act=man">Quy trình mua hàng</a></li>
          <?php /*?><li><i class="fa fa-check"></i> <a href="index.php?com=faq&act=man">Quản lý faq</a></li>
          
          <li><i class="fa fa-check"></i> <a href="index.php?com=post&act=man">Quy trình mua hàng</a></li><?php */?>
       
          
        </ul>
      </li>



      <li class="parent purple <?=($com=='photo')?'active':''?>">
        <a href="photo" class="menu_click <?=($_SESSION['menu']['photo']==2)?'':' close-child'?>">
          <span class="menu-icon"><i class="fa fa-th"></i></span>
          <span class="menu-text">MODULE KHÁC</span>
        </a>
        <ul class="child" <?=($_SESSION['menu']['photo']==2)?' style="display: none;"':' style="display: block;"'?>>
         
          <li><i class="fa fa-check"></i> <a href="index.php?com=hinhanh&idc=QC-Sl1&act=man">Quản lý SlideShow</a></li>
          <li><i class="fa fa-check"></i> <a href="index.php?com=hinhanh&idc=QC-1&act=man">Quảng cáo 1</a></li>
           <li><i class="fa fa-check"></i> <a href="index.php?com=hinhanh&idc=QC-2&act=man">Quảng cáo 2</a></li>
           <li><i class="fa fa-check"></i> <a href="index.php?com=hinhanh&idc=QC-3&act=man">Quảng cáo 3</a></li>
           <li><i class="fa fa-check"></i> <a href="index.php?com=yahoo&act=man">Hỗ trợ trực tuyến</a></li>
           <li><i class="fa fa-check"></i> <a href="index.php?com=tinhthanh&act=man_cat">Tỉnh/TP</a></li>
           <li><i class="fa fa-check"></i> <a href="index.php?com=tinhthanh&act=man">Quận/huyện</a></li>
           
           
            <li><i class="fa fa-check"></i> <a href="index.php?com=company&act=capnhat">Cấu hình</a></li>
     		<li><i class="fa fa-check"></i> <a href="index.php?com=donhang&act=man">Đơn Hàng</a></li>
           <?php /*?><li><i class="fa fa-check"></i> <a href="index.php?com=dangkysanpham&act=man">Đăng ký sản phẩm</a></li>
           <li><i class="fa fa-check"></i> <a href="index.php?com=contact&act=man">Email liên hệ</a></li><?php */?>

       
        </ul>
      </li>


    </ul>
    </div>
    <!-- Menu End -->