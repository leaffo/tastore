
<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>
		
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <div class="col-sm-9 paging_right_10px" style="margin-bottom:10px;">
          	 <ul class="header_ul">
              <li>
                <a href="index.php" target="_blank">Trang chủ</a>
              </li> 
              
              <li>
                <a href="../index.php" target="_blank">Xem website</a>
              </li> 
              
             <?php /*?> <li <?=($com=='company' && $act=='capnhap')?' class="active"':''?>>
                <a href="index.php?com=company&act=capnhap">Thông Tin Công Ty</a>
              </li>                               
              <li <?=($com=='company' && $act=='man1')?' class="active"':''?>>
                <a href="index.php?com=company&act=man1">Bản đồ</a>
              </li>
              <li>
                <a href="index.php?com=newsletter&act=man">Email đăng ký</a>
              </li><?php */?>
            </ul>
          
          	
          </div>
          <div class="col-sm-3">
          	<ul class="right-icons" id="step3">
              <li>
                <a href="index.php?com=user&act=admin_edit" class="user" title="Quản lý tài khoản"><i class="fa fa-user"></i></a>
                <ul class="dropdown">              
                  <li><a href="index.php?com=user&act=admin_edit" title="Quản lý tài khoản"><i class="fa fa-user"></i>Quản lý tài khoản</a></li>
                  <li><a href="index.php?com=user&act=logout" title="Thoát tài khoán"><i class="fa fa-sign-out"></i>Thoát</a></li>
                </ul>
              </li>                               
              <li>
                <a href="index.php?com=user&act=logout" class="lock" title="Thoát khỏi Admin"><i class="fa fa-sign-out"></i></a>
              </li>
            </ul>
          </div>
          <div class="clear"></div>
        </div>
        