function old(now) {
	var yesterday = new Date();
	yesterday.setDate(yesterday.getDate() - 1);
	yesterday.setHours(18);
	yesterday.setMinutes(0);

	return now > yesterday;
}

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
					var date = new Date(response.data[0].created_time);
					var style = old(date) ? '' : 'background: red';
					$('#muskatli').append('<span style="' + style + '">' + response.data[0].created_time + '</span></br>');
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
					var date = new Date(response.data[0].created_time);
					var style = old(date) ? '' : 'background: red';
					$('#kefa').append('<span style="' + style + '">' + response.data[0].created_time + '</span></br>');
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
					var date = new Date(response.data[0].created_time);
					var style = old(date) ? '' : 'background: red';
					$('#chili').append('<span style="' + style + '">' + response.data[0].created_time + '</span></br>');
					
					try {
						$('#chili').append(response.data[0].message.replace(new RegExp("\n", 'g'), '</br>') + '</br>');
						
						for(var i = 0; i < response.data[0].attachments.data[0].subattachments.data.length; i++) {
							var im =response.data[0].attachments.data[0].subattachments.data[i].media.image.src;
							$('#chili').append('<a target=_blank" href="' + im + '"><img src="' + im + '"></a>');
						}
					} catch(err) {;}
					
					$('#chili').append('<a target=_blank" href="' + response.data[0].attachments.data[0].media.image.src + '"><img src="' + response.data[0].attachments.data[0].media.image.src + '"></a>');
					
				}
		    }
		);
		FB.api(
			"/168988876483576/feed?fields=message,picture,full_picture,attachments&limit=2",
			function (response) {
				if (response && !response.error) {
					/* handle the result */
					console.log(response);
					var date = new Date(response.data[0].created_time);
					var style = old(date) ? '' : 'background: red';
					$('#krinet').append('<span style="' + style + '">' + response.data[0].created_time + '</span></br>');
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


