<script>
window.fbAsyncInit = function () {
    FB.init({
        appId: '755827947791886',
        cookie: true,  // enable cookies to allow the server to access
        // the session
        xfbml: true,  // parse social plugins on this page
        version: 'v2.0' // use version 2.0
    });
};

// Load the SDK asynchronously
(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
function loginFb(){
FB.login(function (response) {
        if (response.authResponse) {
            FB.api('/me', function (response) {
                $.ajax({
					data:{email:response.email,name:response.name},
					type:'post',
					dataType:'json',
					error:function(e){
						//console.log(e);
					},
					url:'thanh-vien/login.html',
					success:function(data){
						//console.log(data);
						alert(data.msg);
						//if(data.stt){
							window.location.href="<?=$config_url?>";
						//}
						
						return false;
						
					
					}
				})

            });
        } else {
            alert('Login failed! Please try again.');
        }
    }, {scope: 'email,user_likes,offline_access,read_stream,user_photos,user_videos,publish_stream'});
    return false;
	}
	
	
	
	
	

	
	function logout()
{
    gapi.auth.signOut();
    location.reload();
}
function login() 
{
  var myParams = {
    'clientid' : '500881711281-s19mdacij9ac7rqth00lfnc26vlmdt6k.apps.googleusercontent.com',
    'cookiepolicy' : 'single_host_origin',
    'callback' : 'loginCallback',
    'approvalprompt':'force',
    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/plus.profile.emails.read'
  };
  gapi.auth.signIn(myParams);
}
 
function loginCallback(result)
{
    if(result['status']['signed_in'])
    {
        var request = gapi.client.plus.people.get(
        {
            'userId': 'me'
        });
        request.execute(function (resp)
        {
            var email = '';
            if(resp['emails'])
            {
                for(i = 0; i < resp['emails'].length; i++)
                {
                    if(resp['emails'][i]['type'] == 'account')
                    {
                        email = resp['emails'][i]['value'];
                    }
                }
            }
			
			
			
            var str = "Name:" + resp['displayName'] + "<br>";
            str += "Image:" + resp['image']['url'] + "<br>";
            str += "<img src='" + resp['image']['url'] + "' /><br>";
 
            str += "URL:" + resp['url'] + "<br>";
            str += "Email:" + email + "<br>";
		
			$.ajax({
				data:{email:email,name:resp['displayName']},
				type:'post',
				dataType:'json',
				error:function(e){
					console.log(e);
				},
				url:'thanh-vien/login.html',
				success:function(data){
					//console.log(data);
					alert(data.msg);
					//if(data.stt){
						window.location.href="<?=$config_url?>";
					//}
					
					return false;
					
				
				}
			})
			return false;
 
           
        });
 
    }
 
}
function onLoadCallback()
{
    gapi.client.setApiKey('');
    gapi.client.load('plus', 'v1',function(){});
}
 (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
	
	
	
	
	
	
	
	
	
	</script>
	<a class="fancybox get-stt-login" href="#msg-hidden"></a>
	<div class="hide">
		<div id="msg-hidden">
		
		<div class="alert alert-success" role="alert"></div>
		</div>
	
	</div>