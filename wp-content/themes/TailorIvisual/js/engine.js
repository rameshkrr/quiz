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