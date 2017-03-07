window.fbAsyncInit = function() {
    FB.init({
      appId      : '1742888459273167',
      xfbml      : true,
      version    : 'v2.5'
    });
	FB.getLoginStatus(function(response) {
	  if (response.status === 'connected') {
	    console.log('Logged in.');
	  }
	  else {
	    console.log('not logged in');
	  }
	});
  };	
  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));