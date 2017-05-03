<script type="text/javascript" src="js/lightview.js"></script>
<link rel="stylesheet" type="text/css" href="css/lightview.css" />

    
    
    
    
<div id="section" class="section">
  <div class="wrapper">
    <div class="section-left">
      <div class="block">
          
             <h3>Thư viện ảnh</h3>
            <div class="content content-temp">
              <div class="mod-img">
               <?php
				for($i=0;$i<count($hinhanh_detail);$i++)
				{
			?>
            	<a href='<?=_upload_hinhanh_l.$hinhanh_detail[$i]['photo']?>' 
                    class='lightview'
                    data-lightview-group='example'  >
                    <img src='<?=_upload_hinhanh_l.$hinhanh_detail[$i]['photo']?>' alt='<?=$hinhanh_detail[$i]['ten']?>'/>
                </a>
				<? }?>
             </div>
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