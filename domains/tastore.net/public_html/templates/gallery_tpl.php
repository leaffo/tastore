
<div id="section" class="section">
  <div class="wrapper">
    <div class="section-left">
      <div class="block">
          <h3>Thư viện ảnh</h3>
          <div class="content content-temp">
            	<script>
				$(document).ready(function(){
					// hide #back-top first
					$(".mod-products>div:nth-child(3n+3)").addClass("div-end");
				});
				</script>
                <div class="mod-products mod-products-1">
                    <?php
				for($i=0;$i<count($hinhanh_item);$i++)
				{
				?>
            	<div>
                	<a href="thu-vien-anh/hinh-anh/<?=$hinhanh_item[$i]['id']?>.html" title=""><img src="<?=_upload_hinhanh_l.$hinhanh_item[$i]['photo']?>" alt="<?=$hinhanh_item[$i]['ten']?>" /></a>
                    <h2><a href="thu-vien-anh/hinh-anh/<?=$hinhanh_item[$i]['id']?>.html" title="<?=$hinhanh_item[$i]['ten']?>"><?=$hinhanh_item[$i]['ten']?></a></h2>
              </div>
               <? }?>
                </div><!--end mod-products-->
        		<div class="clearb"></div>
            </div>
          <!--end content block-->
        </div>
    </div>
    <!--end sec left-->
    <? include _template."layout/right.php";?>
    <div class="clearb"></div>
  </div>
  <!--end wrapper--> 
</div>
<!--end section-->