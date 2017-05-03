<?php if(!defined('_kiemtraweb_AT') || _kiemtraweb_AT!=$check_website_AT) daysangtranglogin(); ?>

<!-- Breadcrumbs Start -->
  <div class="row breadcrumbs">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
      <ul class="breadcrumbs">
        <li><a href="index.php"><i class="fa fa-home"></i></a></li>
        <li><a href="index.php?com=tin3cap&act=man_cat2">Danh mục cấp 3</a></li>
      </ul>
    </div>
  </div>
  <!-- Breadcrumbs End -->
        
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    	<!--<div class="inner" style="margin-bottom:10px;">
            <div class="message-box info">
              <i class="fa fa-exclamation-circle"></i>
              <p>Lưu ý: Chỉ nên có tối đa 4-5 bản đồ, tên bản đồ không nên đặt dài quá, nên đặt số thứ tự chính xác để dễ quản lý!</p>
            </div>
        </div>-->
    
    
		<!-- Inline Form Start -->
          <div class="boxed no-padding col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="inner">

              <!-- Title Bar Start -->
              <div class="title-bar">
                <h4>Danh mục cấp 3</h4>
              </div>
              <!-- Title Bar End -->
			
              <?php
				function get_main_category($a)
					{
						$sql="select * from table_tin3cap_cat where com='cat' order by stt asc,id desc";
						$stmt=mysql_query($sql);
						$str='
							<select id="id_cat" name="id_cat">
							 <option value="0">Chọn danh mục cấp 1</option>
							';
						while ($row=@mysql_fetch_array($stmt)) 
						{
							if($row["id"]==(int)@$a)
								$selected="selected";
							else 
								$selected="";
							$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
						}
						$str.='</select>';
						return $str;
					}
					function get_main_category1($a,$b)
					{
						$sql="select * from table_tin3cap_cat where com='cat1' and id_cat=$a order by stt asc,id desc";
						$stmt=mysql_query($sql);
						$str='
							<select id="id_cat1" name="id_cat1">
							 <option value="0">Chọn danh mục cấp 2</option>
							';
						while ($row=@mysql_fetch_array($stmt)) 
						{
							if($row["id"]==(int)@$b)
								$selected="selected";
							else 
								$selected="";
							$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
						}
						$str.='</select>';
						return $str;
					}
					
				?>
                
                <script type="text/javascript">
					$(document).ready(function(e) {
						$("#id_cat").change(function(e) {
							var id=$(this).val();
							$.ajax({
								url:'ajax/cat_tin3cap.php',
								type:'get',
								data:'id='+id,
								dataType:'html',
								success:function(data){
									$("#cat_div").html(data);
									$("#id_cat1").selectbox();   	
								}
							});
						});
					});
				</script>

              <form method="post" name="frm" action="index.php?com=tin3cap&act=save_cat2<?=$chuoi_noi_curpage3?>" enctype="multipart/form-data" class="basic-form inline-form">
                <div class="col-md-2"><label>Danh mục cấp 1 </label></div>
                <div class="col-md-10"><?=get_main_category($item['id_cat']);?></div>
                <div class="col-md-2"><label>Danh mục cấp 2 </label></div>
                <div class="col-md-10" id='cat_div'><?=get_main_category1(@$item["id_cat"],$item["id_cat1"]);?></div>
                
                <div class="col-md-2"><label>Tên </label></div>
                <div class="col-md-10"><input type="text" name="ten" id="ten" value="<?=$item['ten']?>" placeholder="Tên" /></div>
                
                <div class="col-md-2"><label>Title</label></div>
                <div class="col-md-10"><input type="text" name="title" id="title" value="<?=$item['title']?>" placeholder="Title" /></div>
                <div class="col-md-2"><label>Keywords</label></div>
                <div class="col-md-10"><textarea name="keywords" cols="50" rows="6" placeholder="Keywords"><?=$item['keywords']?></textarea></div>
                <div class="col-md-2"><label>Description</label></div>
                <div class="col-md-10"><textarea name="description" cols="50" rows="6" placeholder="Description"><?=$item['description']?></textarea></div>   
                
                <div class="col-md-2"><label>Số thứ tự</label></div>
                <div class="col-md-10"><input type="text" name="stt" id="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" placeholder="Số thứ tự" /></div>
                <div class="col-md-2"></div>
                <div class="col-md-10"><input type="checkbox" name="hienthi" class="icheck-blue" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> /> <span class="hienthi_text">Hiển thị</span></div>
                
                
				<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                
                <div class="col-md-10 col-md-offset-2">                  
                  <button type="button" onclick="javascript:document.frm.submit()" class="btn btn-success"><i class="fa fa-check"></i> Lưu</button>
                  <button type="button" onclick="javascript:window.location='index.php?com=tin3cap&act=man_cat2<?=$chuoi_noi_curpage3?>'" class="btn btn-info"><i class="fa fa-share"></i> Thoát</button>
                </div>

                <div class="clearfix"></div>

              </form>

            </div>
          </div>
          <!-- Inline Form End -->
	</div>