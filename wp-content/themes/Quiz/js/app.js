/* 
//global to store previous random int
        _oldInt = null;
        // initialize and setup facebook js sdk
        window.fbAsyncInit = function() {
            FB.init({
                appId: '1766710230059408',
                xfbml: true,
                version: 'v2.5'
            });
            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    var uid = response.authResponse.userID;
                    var accessToken = response.authResponse.accessToken;
                    document.getElementById('status').innerHTML = 'We are connected.';
                    document.getElementById('login').style.display = 'none';
                } else if (response.status === 'not_authorized') {
                    document.getElementById('status').innerHTML = 'We are not logged in.'
                } else {
                    document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
                }
            });
        };
        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
                        xfbml = false;
        }(document, 'script', 'facebook-jssdk'));
 function myFacebookLogin() {
  FB.login(function(){}, {scope: 'publish_actions'});
}

             function fbLogoutUser() {
    FB.getLoginStatus(function(response) {
        if (response && response.status === 'connected') {
            FB.logout(function(response) {
                document.location.reload();
            });
        }
    });
}*/

// initialize and setup facebook js sdk
        window.fbAsyncInit = function() {
            FB.init({
              appId      : '1766710230059408',
              xfbml      : true,
              version    : 'v2.5'
            });
/*            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    document.getElementById('status').innerHTML = 'We are connected.';
                    document.getElementById('login').style.visibility = 'hidden';
                } else if (response.status === 'not_authorized') {
                    document.getElementById('status').innerHTML = 'We are not logged in.'
                } else {
                    document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
                }
            });*/
        };
        (function(d, s, id){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        
        // login with facebook with extra permissions
        function login() {
            FB.login(function(response) {
                if (response.status === 'connected') {
                    document.getElementById('status').innerHTML = 'We are connected.';
                    document.getElementById('login').style.visibility = 'hidden';
                    document.getElementById('logout').style.visibility = 'visible';
                    getInfo();
                    //drawcanvas();
                } else if (response.status === 'not_authorized') {
                    document.getElementById('status').innerHTML = 'We are not logged in.'
                } else {
                    document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
                }
            }, {scope: 'email'});
        }
        
        // getting basic user info
        function getInfo() {

            FB.api('/me', 'GET', {fields: 'first_name,last_name,name,id,picture.width(150).height(150)'}, function(response) {
          //profile picture

          //document.getElementById('status2').innerHTML = "<div class='hello'> + <img id='op' src='" + response.picture.data.url + "'> +</div>";
          var canvas = document.getElementById("myCanvas");
          var context = canvas.getContext("2d");
          /*context.fillStyle = "green";
          context.fillRect(50, 50, 100, 100);*/
          base_image = new Image();
          base_image.src = response.picture.data.url;
          base_image.onload = function(){
            context.drawImage(base_image, 10, 10);
            context.font = "20px Calibri";
            context.fillStyle="#fff";
            context.fillText("My TEXT!", 50, 100);
          }
            });
        
    }
        function drawcanvas(){
            var canvas = document.getElementById("myCanvas");
          var context = canvas.getContext("2d");
          context.fillStyle = "green";
          context.fillRect(50, 50, 100, 100);
        }
             function fbLogoutUser() {
    FB.getLoginStatus(function(response) {
        if (response && response.status === 'connected') {
            FB.logout(function(response) {
                document.location.reload();
            });
        }
    });
}