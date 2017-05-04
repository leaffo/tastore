<?php
$d->reset();
$sql = "select * from #_company ";
$d->query($sql);
$result_company = $d->fetch_array();

$d->reset();
$sql = "select id,ten,tenkhongdau from #_products where hienthi=1 order by stt asc";
$d->query($sql);
$result_product_cat = $d->result_array();

$d->reset();
$sql="select id,tenkhongdau,ten,photo from #_products_cat where hienthi=1 order by stt asc";
$d->query($sql);
$result_product_cat=$d->result_array();




?>
<script>
    $().ready(function(e) {



        $('.btn-menu').click(function(){

            $('.nav-m').slideToggle(function(){
                if($('.nav-m').width()>100){
                    $('.nav-m').animate({width:'0px',padding:'0px'},500)
                }else{
                    $('.nav-m').animate({height:'auto',width:'320px'},1000);
                }
            });




        });
        $('#list-nav-m ul li').click(function(){
            if($(this).hasClass('sub-m1')){
                $('#list-nav-m >ul >li >ul').slideDown();

            }
            if($(this).hasClass('sub-m')){

                $('#list-nav-m >ul >li >ul >li >ul').slideUp();
                $(this).find('ul').slideDown();



            }
        });
        $('#list-nav-m ul li ul li').click(function(){


            return true;
        })


        $('.bth_iconcart_m').animate({width:'85px'},2000)
    });
</script>
<script type="text/javascript">
    $().ready(function(e) {
        $('.btn-search').click(function(){

            $('.frm-search').submit();
        });

        $('.blok-left').click(function(){
            $('#list-nav-products').find('ul:first').slideToggle();
        });

        $('.block-right').click(function(){
            $('.info-cart-top').slideToggle();

        });

        $('.btn_hethang').click(function(){
            id=$(this).attr('data-id');
            $('.btn-dang-ky-mua-hang').attr('href','dang-ky-san-pham/'+id+'.html');
            $('.thongbao').trigger('click');

        });

    });
</script>


<!-- add cart-->
<script type="text/javascript">
    $().ready(function(e) {
        $(".btn-add-cart").click(function () {
            id_product=$(this).attr('data-id');

            $.ajax({
                url:"ajax.php",
                type:"post",
                data:"id_product="+ id_product,
                dataType:"json",
                success:function(data){

                    $('.info-cart').html(data.addcart);
                    $('.data-cart').html(data.data_list_cart);
                    $('.main_cart').html(data.list_main_cart);
                    $('.line_total').html(data.line_total);
                    $('.btn_view_cart').trigger('click');
                }
            });


            $("html, body").animate({scrollTop: 0},800);
            $('.info-cart-top').slideToggle(1000).delay(800).slideUp();
            return false;


        });

        $('body').on('click','.btn_xoa_cart', function() {

            id=$(this).attr('data-id');

            $('.row-'+id).slideUp(500);

            $.ajax({
                url:"ajax1.php",
                type:"get",
                data:"get_total="+ id,
                dataType:"json",
                success:function(data){
                    $('.tongtien').html(data.tongtien);
                }
            });




        });

        $('body').on('click','.btn_delete_cart_top', function() {
            $(this).parent().slideUp();
            id_product=$(this).attr('data-id');


            $.ajax({
                url:"ajax.php",
                type:"post",
                data:"del_id_product="+ id_product,
                dataType:"json",
                success:function(data){

                    $('.info-cart').html(data.addcart);
                    $('.data-cart').html(data.data_list_cart);
                    $('.main_cart').html(data.list_main_cart);
                    $('.line_total').html(data.line_total);
                }
            });

        });

    });



</script>
<script type="text/javascript">
    $().ready(function(e) {
        $(".btn-add-cart_detail").click(function () {
            id_product=$(this).attr('data-id');
            sl=$('.sl_detail').val();
            $.ajax({
                url:"ajax.php",
                type:"get",
                data:"id_product_detail="+ id_product+'&sl='+sl,
                dataType:"json",
                success:function(data){

                    $('.info-cart').html(data.addcart);
                    $('.data-cart').html(data.data_list_cart);
                    $('.main_cart').html(data.list_main_cart);
                    $('.line_total').html(data.line_total);
                    $('.item_cart_m').html(data.total_sp);
                    $('.btn_view_cart').trigger('click');
                }
            });


            $("html, body").animate({scrollTop: 0},800);
            $('.info-cart-top').slideToggle(1000).delay(800).slideUp();
            return false;


        });
        $('.top-sub').click(function(){
            $('.top-sub ul').slideUp();
            $(this).find('ul').slideDown();
        })
    });
</script>

<div class="btn-menu"><i class="glyphicon glyphicon-align-justify"></i></div>
<ul style="display:none">
    <li><a href="index.html">Trang chủ</a></li>
    <li><a href="khuyen-mai.html">Khuyến mãi</a></li>
    <li><a href="blog.html">Blog</a></li>
    <li><a href="hoi-dap.html">Hỏi đáp</a></li>
    <li><a href="lien-he.html">liên hệ</a></li>
</ul>
</div>
<div id="header">
    <div class="col-md-6 col-sm-5 col-xsm-12 col-xs-12 padding0 "> <a title="<?=$result_company['ten']?>" href="./">
            <img class="logo-main" src="<?=_upload_tintuc_l.$result_company['photo']?>" height="100"> </a></div>
    <div class="col-md-6 col-sm-7 col-xsm-12 col-xs-12 padding0">
        <ul class="list-mtop">
            <li><a href="index.html">Trang chủ</a></li>
            <li><a href="khuyen-mai.html">Khuyến mãi</a></li>
            <li><a href="blog.html">Blog</a></li>
            <li><a href="hoi-dap.html">Hỏi đáp</a></li>
            <li><a href="lien-he.html">liên hệ</a></li>
        </ul>
    </div>
    <div class="block-search">
        <div id="list-nav-products" class="col-md-3 col-sm-4 col-xs-0 padding0 ">
            <div  class=" blok-left"><strong>Danh mục sản phẩm </strong><img src="images/img_arow.png"></div>
            <ul>
                <?
                foreach((array)$result_product_cat as $k=>$v){

                    $d->reset();
                    $sql="select id,tenkhongdau,ten,photo from #_products_item where hienthi=1 and id_cat='".$v['id']."' order by stt asc";
                    $d->query($sql);
                    $result_product_item=$d->result_array();

                    ?>
                    <li <?=(count($result_product_item)>0)?'class="top-sub"':''?> ><a <? if(count($result_product_item)==0){?> href="san-pham/<?=$v['tenkhongdau']?>.html" <? }?> title="<?=$v['ten']?>"><?=$v['ten']?></a>
                        <ul>
                            <?
                            foreach((array)$result_product_item as $k1=>$v1){
                                ?>
                                <li><a href="san-pham/<?=$v['tenkhongdau']?>/<?=$v1['tenkhongdau']?>/<?=$v1['id']?>.html"><?=$v1['ten']?></a></li>
                            <? }?>

                        </ul>
                    </li>
                <? }?>

            </ul>
        </div>
        <div class="col-md-6 col-sm-8 col-xs-12">
            <div class="block-search-item">
                <form name="frm-search" method="post" class="frm-search" action="tim-kiem.html">
                    <input class="input-keyword" name="keywords" value="">
                    <span class="btn-search">Tìm kiếm</span>
                </form>
            </div>
            <div class="block-search-item-m">
                <form class="navbar-form padding0 padding-m0" role="search" method="post" action="tim-kiem.html">
                    <div class="input-group col-md-12 col-sm-12 col-xs-12 padding0">
                        <input type="text" class="form-control" placeholder="Search" name="keywords">
                        <div class="input-group-btn  padding0">
                            <button class="btn btn-default bg_btn_search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-3  padding0 block-right"> <a class="fancybox" href="#block_popup_cart"><img class="img-cat" src="images/img_cart.png"></a>
            <div class="block-cart-top">
                <ul class="info-cart">
                    <li><span>Giỏ hàng:</span> <?=get_total()?> Sản phẩm</li>
                    <li class="li-price">Giá: <strong><?=$tongtien=format_money(get_order_total());?></strong></li>
                </ul>




            </div>
            <div class="info-cart-top">
                <div class="data-cart">
                    <ul class="">
                        <?
                        if(isset($_SESSION['cart'])){
                            $max=count($_SESSION['cart']);
                            for($i=0;$i<$max;$i++){
                                $pid=$_SESSION['cart'][$i]['productid'];
                                $q=$_SESSION['cart'][$i]['qty'];
                                $name_product=get_product_name($pid);
                                $price_product=get_price($pid);
                                $photo_product=get_product_photo($pid);
                                ?>
                                <li>

                                    <img class="img_cart" src="<?=_upload_sanpham_l.$photo_product?>" />
                                    <h2><?=$name_product?></h2><br />
                                    <span><?=$q?> x <?=format_money_m($price_product)?></span>
                                    <div style=" clear:both"></div>
                                    <img data-id="<?=$pid?>" class="btn_delete_cart_top" src="images/btn_delete.png" />
                                </li>
                            <? }}?>
                    </ul>

                </div>
                <span class="line_total">Tổng: <?=$tongtien?></span>
                <a  href="#block_popup_cart"  class="btn_view_cart fancybox">xem giỏ hàng</a>
            </div>
            <img class="img-arow1" src="images/arow1.png"></div>
    </div>
</div>

<div id="list-nav-m" class="nav-m">
    <ul>
        <li><a href="index.html">Trang chủ</a></li>
        <li  class="sub-m1" ><a href="javascript:void(0)">Sản phẩm</a>
            <ul>
                <?
                foreach((array)$result_product_cat as $k=>$v){

                    $d->reset();
                    $sql="select id,tenkhongdau,ten,photo from #_products_item where hienthi=1 and id_cat='".$v['id']."' order by stt asc";
                    $d->query($sql);
                    $result_product_item=$d->result_array();

                    ?>
                    <li class="sub-m"><a href="<? if(count($result_product_item)>0){ echo 'javascript:void(0)';}{?>san-pham/<?=$v['tenkhongdau']?>.html" title=<? }?>"<?=$v['ten']?>"><?=$v['ten']?></a>
                        <ul>
                            <?
                            foreach((array)$result_product_item as $k1=>$v1){
                                ?>
                                <li><a href="san-pham/<?=$v['tenkhongdau']?>/<?=$v1['tenkhongdau']?>/<?=$v1['id']?>.html"><?=$v1['ten']?></a></li>
                            <? }?>

                        </ul>
                    </li>
                <? }?>


            </ul>
        </li>
        <li><a href="khuyen-mai.html">Khuyến mãi</a></li>
        <li><a href="blog.html">Blog</a></li>
        <li><a href="hoi-dap.html">Hỏi đáp</a></li>
        <li><a href="lien-he.html">Liên hệ</a></li>





    </ul>

    <div style="clear:both"></div>
</div>