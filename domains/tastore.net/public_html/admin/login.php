<?php
	@define ( '_lib' , './lib/');
	include_once _lib."config.php";
	
	
?>

<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Quản trị website">
    <meta name="author" content="Phạm duy tâm vinh">

    <title>Administrator</title>
	
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,greek-ext,cyrillic-ext,vietnamese,greek' rel='stylesheet' type='text/css'>

    <!-- Bootstrap Core CSS -->
    <link href="http://<?=$config_url?>/admin/media/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="http://<?=$config_url?>/bootstrap-3.2.0/css/bootstrap.css">
    <!-- MetisMenu CSS -->
    <link href="http://<?=$config_url?>/admin/media/css/plugins/metisMenu/metisMenu.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://<?=$config_url?>/admin/media/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://<?=$config_url?>/admin/media/font-awesome-4.2.0/css/font-awesome.css" rel="stylesheet" type="text/css">
	
	<link href="http://<?=$config_url?>/admin/media/css/login.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Tài khoản quản trị</h3>
						<p class="loading normal"></p>
                    </div>
                    <div class="panel-body">
                        <form action="index.php?com=user&act=login" method="post" role="form" id="frm-login" >
                            <fieldset>
								<p class="message error"></p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Tài khoản" name="username" type="username" autofocus onkeypress="doEnter(event)" />
									<p class="message user"></p>
								</div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Mật khẩu" name="password" type="password" value="" onkeypress="doEnter(event)" />
									<p class="message pass"></p>
								</div>
                                <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Ghi nhớ
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="#" class="btn btn-lg btn-success btn-block">Đăng nhập</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery Version 1.11.0 -->
    <script src="http://<?=$config_url?>/admin/media/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="http://<?=$config_url?>/admin/media/js/bootstrap.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="http://<?=$config_url?>/admin/media/js/plugins/metisMenu/metisMenu.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="http://<?=$config_url?>/admin/media/js/sb-admin-2.js"></script>
	
	<script>
		$(document).ready(function(){
			$('a.btn-lg').click(function(){
				login();
				return false;
				
			})
		})
		
		function login(){
			$('p.message.error').hide();
			var frm = $('#frm-login');
			var name = frm.find('input[name=username]');
			if(name.val()==''){
				$('p.message.user').html("Bạn chưa nhập tài khoản.").fadeIn();
				name.focus();
				return false;
			}else{
				$('p.message.user').hide();
			}
			
			var pass = frm.find('input[name=password]');
			if(pass.val()==''){
				$('p.message.pass').html("Bạn chưa nhập mật khẩu.").fadeIn();
				pass.focus();
				return false;
			}else{
				$('p.message.pass').hide();
			}
			
			$.ajax({
				type: "POST",
				url : "http://<?=$config_url?>/admin/ajax/login.php",
				data: "username="+name.val()+"&password="+pass.val(),
				beforeSend: function(){
					$('p.loading').fadeIn();
				},
				success: function(result){
					if(result){
						$(location).attr('href',result);
					}else{
						$('p.loading').fadeOut();
						$('p.message.error').html("Tài khoản hoặc mật khẩu không đúng").fadeIn();
					}
				}
			})
			
			//frm.submit();
		}		
		function doEnter(evt){
			var key;
			if(evt.keyCode == 13 || evt.which == 13){
				login();
			}else{
				return false;	
			}
		}
	</script>
	
</body>

</html>


