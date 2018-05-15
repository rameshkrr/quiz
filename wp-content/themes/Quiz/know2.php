<?php
/*
 * Template Name: know-strength2
 * Template Post Type: post, page, product
 */
  
 get_header();  ?>

 <script>
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
                    document.getElementById('status').innerHTML = 'We are connected.';
                    document.getElementById('login').style.visibility = 'hidden';
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
        }(document, 'script', 'facebook-jssdk'));

        // login with facebook with extra permissions
        function login() {
            FB.login(function(response) {
                if (response.status === 'connected') {
                    FB.Canvas.startTimer();

                    document.getElementById('status').innerHTML = 'We are connected.';
                    document.getElementById('login').style.visibility = 'hidden';
                    document.getElementById('logout').style.visibility = 'visible';
                    
                } else if (response.status === 'not_authorized') {
                	
                    document.getElementById('status').innerHTML = 'We are not logged in.';
                   
                } else {
                    document.getElementById('status').innerHTML = 'You are not logged into Facebook.';
                    document.getElementById('logout').style.visibility = 'hidden';
                }
            }, {
                scope: 'email'
            });
        }

        // getting basic user info
        function getInfo() {
            FB.api('/me', 'GET', {
                fields: 'first_name,last_name,name,id,picture.width(150).height(150)'
            }, function(response) {
                document.getElementById('status').innerHTML = "<img src='" + response.picture.data.url + "'>";
            });
        }
        var paragraphArray = ['<h2>Para 1 </h2>', '<h2>Para 2 </h2>'];
        var pickRandom = function(paragraphArray) {
            //random index of paragraphArray
            var randomInt = Math.floor(Math.random() * paragraphArray.length);
            //ensure random integer isn't the same as last
            if (randomInt == _oldInt)
                pickRandom(paragraphArray);
            else {
                _oldInt = randomInt;
                return paragraphArray[randomInt];
            }
        }

        function getMutual() {
            FB.api(
                '/me',
                'GET', {
                    "fields":"birthday,email"
                },
                function(response) {

                    document.getElementById('date').innerHTML = 'Your Birthday is ' + response.birthday + '<br>' + pickRandom(paragraphArray);
                    //document.getElementById('date').innerHTML = pickRandom(paragraphArray);
                }
            );
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
    </script>



    <div id="status"></div>
    <button onclick="getInfo()">Get info with picture</button>
    <button onclick="login()" id="login">Login</button>
    <div id="date"></div>
    <button onclick="getMutual()" id="">Know your strength according to your birth day</button>
    <button onclick="fbLogoutUser()" id="logout" style="visibility: hidden;">Logout</button>
