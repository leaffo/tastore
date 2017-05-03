<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=tin3cap&act=man_cat1">Danh mục cấp 2</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
  	  	<!--<div class="inner" style="margin-bottom:10px;">
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Chỉ nên có tối đa 4-5 bản đồ, tên bản đồ không nên đặt dài quá!</p>
            </div>
        </div>-->
        
      <!-- Inline Form Start -->      	      
        <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="inner">
          	            
            <!-- Title Bar Start -->
            <div class="title-bar">
              <div class="col-md-8" style="padding-left:0px; padding-top:7px; padding-bottom:7px;">                 
              	<h4>Danh mục cấp 2</h4>      
              </div>
              <div class="col-md-4 paging_0px">  
              	<form action="index.php?com=tin3cap&act=man_cat1<?=$chuoi_noi_curpage2?>" method="post" class="inline-form">
                	<div id="timkiem_khung">
                    	<input type="text" name="search" id='search' value="<?=@$_REQUEST['search']?>" placeholder="Nhập tên cần tìm ..." class='timkiem_input' />
                        <input type="image" name="btnSearch" src="media/images/search-focus.png" value="Tìm kiếm" id='nut_timkiem' />
                    </div>                    
                </form>
              </div>
              <div class="clear"></div>  
            </div>
            
            <div class="title-bar">
              <div class="col-md-2 paging_0px" style="padding-top:5px;"><label>Lọc thông tin:</label></div>
              <div class="col-md-10 paging_0px">
                  <div class="col-md-3 paging_0px">                 
                    <?=get_main_category();?>
                  </div>              
              </div>
              <div class="clear"></div>  
            </div>
            <!-- Title Bar End -->  
                       
            <script language="javascript">
			function select_onchange(){
				var b=document.getElementById("id_cat");
				if(b.value!=0)
					window.location ="index.php?com=tin3cap&act=man_cat1&id_cat="+b.value+"";	
				else
					window.location ="index.php?com=tin3cap&act=man_cat1";	
				return true;
			}
			</script>
			<?php
				function get_main_category(){
					$sql="select * from table_tin3cap_cat where com='cat'  order by stt asc,id desc";
					$stmt=mysql_query($sql);
					$str='
						<select id="id_cat" name="id_cat" onchange="select_onchange()">
						 <option value="0">Chọn danh mục cấp 1</option>
						';
					while ($row=@mysql_fetch_array($stmt)) 
					{
						if($row["id"]==(int)@$_REQUEST["id_cat"])
							$selected="selected";
						else 
							$selected="";
						$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
					}
					$str.='</select>';
					return $str;
				}				
			?>                      
            
            <!-- Table Holder Start -->
            <div class="table-holder">
              <table class="stripe-rows" cellspacing="0" cellpadding="0" width="100%" border="1">           
                <thead>
                  <th style="width:5%">STT</th>                  
                  <th style="width:20%;">Danh mục cấp 1</th>                  
                  <th>Tên</th>
                  <!--<th style="width:5%">Nổi bật</th>-->
                  <th style="width:5%">Hiển thị</th>
                  <th style="width:5%">Sửa</th>
                  <th style="width:5%">Xóa</th>
                </thead>
                <tbody>
                  <?php 
				  	if(count($items)!=0){
						foreach($items as $k=>$v){
				  ?>
                  <tr>
                    <td style="width:5%"><?=$v['stt']?></td>
                    <td style=" width:20%;">
                    	<p><b><?php
							$sql_danhmuc1="select ten from table_tin3cap_cat where id='".$v['id_cat']."'";
							$result=mysql_query($sql_danhmuc1);
							$item_danhmuc1 =mysql_fetch_array($result);
							echo @$item_danhmuc1['ten'];
						?></b></p>
                    </td>
                    <td><a href="index.php?com=tin3cap&act=edit_cat1&id=<?=$v['id']?><?=$chuoi_noi_curpage2?>" style="text-decoration:none;"><?=$v['ten']?></a></td>
                    <!--<td style="width:5%;"><a href="index.php?com=tin3cap&act=man_cat1&noibat=<?=$v['id']?><?=$chuoi_noi_curpage2?>"><img src="<?=($v['noibat']==1)?'media/images/yes-km.gif':'media/images/no-km.gif'?>" border="0" /></a></td> -->                   
                    <td style="width:5%;"><a href="index.php?com=tin3cap&act=man_cat1&hienthi=<?=$v['id']?><?=$chuoi_noi_curpage2?>"><img src="<?=($v['hienthi']==1)?'media/images/active_1.png':'media/images/active_0.png'?>" border="0" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=tin3cap&act=edit_cat1&id=<?=$v['id']?><?=$chuoi_noi_curpage2?>"><img src="media/images/edit.png" border="0" title="Sửa" /></a></td>
                    <td style="width:5%;"><a href="index.php?com=tin3cap&act=delete_cat1&id=<?=$v['id']?><?=$chuoi_noi_curpage2?>" onClick="if(!confirm('Xác nhận xóa')) return false;"><img src="media/images/delete.png" border="0" title="Xóa" /></a></td>
                  </tr>
                  <?php	
						}
					}
				  ?>
                                                      
                </tbody>
              </table>
              <div class="clear"></div>

            </div>
            <!-- Table Holder End -->
            
			<div class="col-md-12 margin_bottom_10px">
                <div class="col-md-4 paging_0px">                  
                  <a href="index.php?com=tin3cap&act=add_cat1<?=$chuoi_noi_curpage2?>" class="btn btn-success"><i class="fa fa-check"></i> Thêm danh mục cấp 2</a>
                  <a href="index.php?com=tin3cap&act=man_cat1" class="btn btn-info"><i class="fa fa-share"></i> Thoát</a> 
                </div>
                <div class="col-md-8 paging_0px">    
                  <div class="paging"><?=$paging['paging']?></div>
                </div>
    
                <div class="clearfix"></div>
			</div>
            <div class="clearfix"></div>

          </div>
        </div>
        <!-- Inline Form End -->
  </div>