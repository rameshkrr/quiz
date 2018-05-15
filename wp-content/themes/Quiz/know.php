<?php
/*
 * Template Name: know-strength
 * Template Post Type: post, page, product
 */
  
 get_header();  ?>

<div class="container">
	<div class="col-sm-9">
 <script>
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
                    document.getElementById('logout').style.visibility = 'visible';
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
         
                } else if (response.status === 'not_authorized') {
  
                } else {

                }
            }, {
                scope: 'email'
            });
        }

        // Logout Function
      
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
    <div class="text-center">
    <div class="destitle">
	
	<h2><a href="<?php print get_permalink($post->ID) ?>"><?php print get_the_title(); ?></a></h2>

</div>
    <figure>
	<div class="overlaydesign"></div>
		<?php echo the_post_thumbnail('sparkling-featured'); ?>
</figure>
<button onclick="login()" id="login">Login With facebook</button>
    <button onclick="fbLogoutUser()" id="logout" style="visibility: hidden;">Logout</button>
</div>
</div>

<div class="col-sm-3"><?php get_sidebar() ?></div>
</div>