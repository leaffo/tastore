<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

            <div class="row breadcrumbs">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumbs">
                  <li><a href="index.php"><i class="fa fa-home"></i></a></li>
                  <li><a href="index.php">Trang chủ</a></li>
                </ul>
              </div>
            </div>
		
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 paging_0px">
              
              <!-- Row Start -->
              <div class="row">
              	<div class="col-sm-12">

                  <!-- Title Bar Start -->
                  <div class="standalone-title-bar green">
                    <i class="fa fa-check-square"></i>
                    Đơn hàng
                  </div>
                  <!-- Title Bar End -->

                  <div class="box" style="padding:9px;">
                  		<iframe width="100%" height="350" src="http://rautot.com/admin/index.php?com=donhang&act=man&no-head=1" frameborder="0" allowfullscreen></iframe>
                  </div>

                </div>
              

                <!-- Schedule Tasks Start -->
                <div class="col-sm-12">

                  <!-- Title Bar Start -->
                  <div class="standalone-title-bar green">
                    <i class="fa fa-check-square"></i>
                    Đăng ký sản phẩm
                  </div>
                    <div class="box" style="padding:9px;">
                  		<iframe width="100%" height="350" src="http://rautot.com/admin/index.php?com=dangkysanpham&act=man&no-head=1" frameborder="0" allowfullscreen></iframe>
                  </div>
                  
                  <!-- Title Bar End -->

                  <!-- Task List Start -->
                  

                </div>
                <!-- Schedule Tasks End -->

              </div>

            </div>

            <!-- Right Sidebar Start -->
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4  paging_0px">
              <div class="row">

              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 paging_right_10px">

                  <!-- Daily Traffic Start -->
                  <div class="box daily-traffic">

                    <!-- Title Bar Start -->
                    <div class="title-bar">
                      <i class="fa fa-bars"></i>Thống kê truy cập                      
                    </div>
                    <!-- Title Bar End -->

                    <div class="inner">
                      <div class="col-md-4">
                        <h3>Đang <br /> Online</h3>
                        <div class="count-to"><?=$online_visitors?><?php //$count=count_online(); echo $count['dangxem'];?></div>
                      </div>
                      <div class="col-md-4">
                        <h3>Hôm <br /> nay</h3>
                        <div class="count-to"><?=$today_visitors?></div>
                      </div>
                      <div class="col-md-4">
                        <h3>Hôm <br /> qua</h3>
                        <div class="count-to"><?=$yesterday_visitors?></div>
                      </div>
                    </div>
                    <div class="inner">
                      <div class="col-md-4">
                        <h3>Tuần <br /> này</h3>
                        <div class="count-to"><?=$week_visitors?></div>
                      </div>
                      <div class="col-md-4">
                        <h3>Tháng <br /> này</h3>
                        <div class="count-to"><?=$month_visitors?></div>
                      </div>
                      <div class="col-md-4">
                        <h3>Tổng <br /> truy cập</h3>
                        <div class="count-to"><?=$all_visitors?></div>
                      </div>
                    </div>

                  </div>
                  <!-- Daily Traffic End -->

              </div>

              
              </div>
              
              <div class="row">
                <div class="col-sm-12 paging_right_10px">   
                    <div class="box calendar">                 
                        <!-- Title Bar Start -->
                        <div class="title-bar"><i class="fa fa-signal"></i>Bây giờ : &nbsp;&nbsp;&nbsp;                       
                            <b id="clock">Loading...</b>
                            <script type="text/javascript"> 
                                function refrClock() {
                            
                                var d=new Date();
                                
                                var s=d.getSeconds();
                                
                                var m=d.getMinutes();
                                
                                var h=d.getHours();
                                
                                var am_pm;
                                
                                if (s<10) {s="0" + s}
                                
                                if (m<10) {m="0" + m}
                                
                                if (h>12)
                                
                                {h-=12;AM_PM = "PM"}
                                
                                else {AM_PM="AM"}
                                
                                if (h<10) {h="0" + h}
                            
                                document.getElementById("clock").innerHTML=" " + h + " : " + m + " : " + s + " " + AM_PM; 
                                setTimeout("refrClock()",1000); } 
                                refrClock();
                            </script>
                        </div>
                        <!-- Title Bar End -->
                    </div>                                        
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-12 paging_right_10px">
                    <div class="box calendar">
                        <!-- Title Bar Start -->
                        <div class="title-bar"><i class="fa fa-calendar"></i>Tiện ích :: Lịch</div>
                        <!-- Title Bar End -->
                        <div class="calendar-widget"></div>
                    </div>
                </div>

              </div>
</div>
            <!-- Right Sidebar End -->