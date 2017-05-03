$(document).ready(function($){
    
	//Menu click trên di động
    $('.responsive-menu>a').click(function(){
      var menu = $('ul.menu', '.sidebar');
      if ($(menu).is(':visible')) {
        $(menu).slideUp(800);
      } else {
        $(menu).slideDown(800);
      }
    });

  /*** Display menu children if it has some ***/
  $('li.parent>a', 'ul.menu').click(function(){
    var link = $(this);
    var obj = $(this).parent();
    var child = $('ul.child', obj);

    if ($(child).is(':visible')) {
      $(child).slideUp(400);
      $(link).removeClass('close-child');
    } else {
      $(child).slideDown(400);
      $(link).addClass('close-child');
    }

    return false;
  });
  
  //Lưu SESSION
  $(".menu_click").click(function(e) {
	  var id=$(this).attr('href');
	  $.ajax({
		  url:'ajax/menu_close.php',
		  type:'get',
		  data:'id='+id,
		  success:function(data){ }
	  });
  });   
  
  
  function tinhchinhweb(){                
        var qh = $("#q_noidung").width();
		if(qh>980){
		    var qw = $("#noidung_web").width();
            $(".footer-line").width(qw-20);
            var qh11 = $(".footer-line").height()+32;      
            $("#noidung_web").css('margin-bottom',qh11);    
          
			var qh1 = $('#q_left').height();
			if(qh1 < $("#q_main").height())
				qh1 = $("#q_main").height();
			$("#q_left").height(qh1);
			$("#q_main").height(qh1-qh11);                                            
		}
  }  
  window.onload = function(){ tinhchinhweb(); };
  
  //Cuộn menu
  $( window ).scroll(function() {
	  var qh = $("#q_noidung").width();
	  if(qh>980){
		  var toci = $(".tocify-box").height();
		  var mh = $(window).height();
		  if(window.scrollY > 55 && toci < mh){
			  $(".tocify-box").css('top',0);
			  $(".tocify-box").css('position','fixed');
			  $(".tocify-box").css('width','200px');
		  }else
		  $(".tocify-box").css('top','auto');
	  }
  });
  
});