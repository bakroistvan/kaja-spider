window.fbAsyncInit = function() {
    FB.init({
		appId      : appId,
		xfbml      : true,
		version    : 'v2.3'
    });



    FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			console.log('Logged in.');
		} else {
			FB.login();
		}
		
		console.log(response.authResponse.accessToken);
		FB.api(
			"/116495811806493/feed?fields=message,picture,full_picture,attachments&limit=2",
			function (response) {
				if (response && !response.error) {
					/* handle the result */
					console.log(response);
					$('#muskatli').append(response.data[0].message.replace(new RegExp("\n", 'g'), '</br>') + '</br>');
				}
		    }
		);
		FB.api(
			"/675297079184846/feed?fields=message,picture,full_picture,attachments&limit=2",
			function (response) {
				if (response && !response.error) {
					/* handle the result */
					console.log(response);
					$('#kefa').append(response.data[0].message.replace(new RegExp("\n", 'g'), '</br>') + '</br>');

					for(var i = 0; i < response.data[0].attachments.data[0].subattachments.data.length; i++) {
						var im =response.data[0].attachments.data[0].subattachments.data[i].media.image.src;
						$('#kefa').append('<a target=_blank" href="' + im + '"><img class="minim" src="' + im + '"></a>');
					}
				}
		    }
		);
		FB.api(
			"/124245150953481/feed?fields=message,picture,full_picture,attachments&limit=2",
			function (response) {
				if (response && !response.error) {
					/* handle the result */
					console.log(response);
					$('#chili').append(response.data[0].message.replace(new RegExp("\n", 'g'), '</br>') + '</br>');

					for(var i = 0; i < response.data[0].attachments.data[0].subattachments.data.length; i++) {
						var im =response.data[0].attachments.data[0].subattachments.data[i].media.image.src;
						$('#chili').append('<a target=_blank" href="' + im + '"><img src="' + im + '"></a>');
					}
					
					

				}
		    }
		);
		FB.api(
			"/168988876483576/feed?fields=message,picture,full_picture,attachments&limit=2",
			function (response) {
				if (response && !response.error) {
					/* handle the result */
					console.log(response);
					$('#krinet').append(response.data[0].message.replace(new RegExp("\n", 'g'), '</br>') + '</br>');
				}
		    }
		);
	});
};

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


