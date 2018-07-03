var winWidth = $(window).width();

$(document).ready(function(){

	// init svg4everybody
	svg4everybody();

	ageGate();

	// Get url params
	var params={};window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(str,key,value){params[key] = value;});

	// Droptab init
	$('#primary-nav ul').droptab({
		breakWidth : 768,
		targetWidth : $('header'),
		openMsg : 'Menu'
	});

	// Init parallax and scroll reveal on 1025+ only
	if (winWidth >= 1025) {
		// Parallax
		$('.parallax').parallax(0, .5, true);

		// Scroll Reveal
		window.sr = ScrollReveal();
	}

	if (params.scrollto) {
		scrollTo(params.scrollto);
	}

	// Contact Form
	if($('#contact-form').length){
		var stop = false;

		$('#contact-form').on('submit', function(e){
			e.preventDefault();

			$('[required]').each(function(){
				if($(this).val() === ''){
					stop = true;
				};
			});

			if(!stop){
				$('#contact-form .btn').addClass('hidden');
				$('#contact-spinner').removeClass('hidden');
				$.ajax({
					type: 'POST',
					url: 'contact-form.php',
					data: $('#contact-form .item').serializeArray(),
					success: function(info){
						$('#contact-form')[0].reset();
						$('#contact-msg').addClass('text-success').html(info);
					},
					error: function(){
						$('#contact-msg').addClass('text-danger').html("Uh oh, we ran into a problem sending your message.  Please try again later, or give us a call.");
					},
					complete: function(){
						$('#contact-spinner').fadeOut('fast', function(){
							$('#contact-msg').fadeIn('fast');
						});
					}
				});
			}
		});
	}

	// Twitter Feed
	if($('#twfeed').length){
		var displaylimit = 4,
			twitterprofile = "surfbrewery",
			screenname = "Surf Brewery",
			showdirecttweets = true,
			showretweets = true,
			showtweetlinks = true,
			showprofilepic = false,
			loadingHTML = '';

	    loadingHTML += '<div class="spinner col-xs-12 text-xs-center"><img src="svg/loader-white.svg" alt="Images loading..."></div>';

	    $('#twitter-feed').html(loadingHTML);

	    $.getJSON('get-tweets.php',
	        function(feeds) {
	            //alert(feeds);
	            var feedHTML = '',
	            	displayCounter = 1;

	            for (var i=0; i<feeds.length; i++) {
	                var tweetscreenname = feeds[i].user.name,
	                	tweetusername = feeds[i].user.screen_name,
	                	profileimage = feeds[i].user.profile_image_url_https.replace('normal', 'bigger'),
	                	status = feeds[i].text,
	                	isaretweet = false,
	                	isdirect = false,
	                	tweetid = feeds[i].id_str;

	                //If the tweet has been retweeted, get the profile pic of the tweeter
	                if(typeof feeds[i].retweeted_status != 'undefined'){
						profileimage = feeds[i].retweeted_status.user.profile_image_url_https.replace('normal', 'bigger');
						tweetscreenname = feeds[i].retweeted_status.user.name;
						tweetusername = feeds[i].retweeted_status.user.screen_name;
						tweetid = feeds[i].retweeted_status.id_str
						isaretweet = true;
					};

	                //Check to see if the tweet is a direct message
	                if (feeds[i].text.substr(0,1) == "@") {
	                    isdirect = true;
	                }

	                //console.log(feeds[i]);

	                if (((showretweets == true) || ((isaretweet == false) && (showretweets == false))) && ((showdirecttweets == true) || ((showdirecttweets == false) && (isdirect == false)))) {
	                    if ((feeds[i].text.length > 1) && (displayCounter <= displaylimit)) {
	                        if (showtweetlinks == true) {
	                            status = addlinks(status);
	                        }

	                        feedHTML += '<article id="twt'+i+'" class="twt col-xs-12 col-sm-6 col-xl-3">';
	                        feedHTML += '<div class="first clearfix">';
	                        feedHTML += '<div class="col-xs-12 p-l-0 twt-author">';
	                        feedHTML += '<img src="'+profileimage+'" class="responsive-img pull-xs-left m-r-1" alt="'+tweetusername+'" />';
	                        feedHTML += '<h4>'+tweetusername+'</h4>'
	                        feedHTML += '<small><span class="at"><a href="https://twitter.com/'+tweetusername+'" class="t-white">@'+tweetusername+'</a></span> - <time class="time">'+relative_time(feeds[i].created_at)+'</time></small>';
	                        feedHTML += '</div>';
	                        feedHTML += '</div>';
	                        feedHTML += '<div class="second clearfix">';
	                        feedHTML += '<div class="col-xs-12 twt-body white-bg">';
	                        feedHTML += '<div class="inner">';
	                        feedHTML += '<p>'+status+'</p>';
	                        feedHTML += '</div>';
	                        feedHTML += '</div>';
	                        feedHTML += '</div>';
	                        feedHTML += '</article>';
	                    }
	                }
	            }
		    	$('#twfeed > .row').html(feedHTML);
		    	twitterReveal();
	    	}
	    );
	}

	// Instagram Feed
	if($("#instfeed").length){
		var $feed = $("#instfeed").find('.feed');
		if(sesStorage()){
			if(sessionStorage.getItem("instContent") === null || sessionStorage.getItem("instContent").length < 1000){
				// console.log('loading instagram from script');
				populateInstagram($feed);
				setTimeout(function(){
					sessionStorage.setItem("instContent", $("#instfeed").html());
					instagramTimer($feed);
				},500);
			} else {
				// console.log('loading instagram from loc storage');
				$("#instfeed").empty().html(sessionStorage.getItem("instContent"));
				instagramReveal();
			}
		} else {
			populateInstagram($feed);
			instagramTimer($feed);
		}

	}
});

//Function modified from Stack Overflow
function addlinks(data) {
    //Add link to all http:// links within tweets
    data = data.replace(/((https?|s?ftp|ssh)\:\/\/[^"\s\<\>]*[^.,;'">\:\s\<\>\)\]\!])/g, function(url) {
        return '<a href="'+url+'" >'+url+'</a>';
    });

	//Add link to @usernames used within tweets
	data = data.replace(/\B@([_a-z0-9]+)/ig, function(reply) {
		return '<a href="http://twitter.com/'+reply.substring(1)+'" style="font-weight:lighter;" >'+reply.charAt(0)+reply.substring(1)+'</a>';
	});
    return data;
}

function relative_time(time_value) {
	var values = time_value.split(" "),
		time_value = values[1] + " " + values[2] + ", " + values[5] + " " + values[3],
		parsed_date = Date.parse(time_value),
		relative_to = (arguments.length > 1) ? arguments[1] : new Date(),
		delta = parseInt((relative_to.getTime() - parsed_date) / 1000),
		shortdate = time_value.substr(4,2) + " " + time_value.substr(0,3);

	delta = delta + (relative_to.getTimezoneOffset() * 60);

	if(delta < (60*60)) {
		return (parseInt(delta / 60)).toString() + 'm ago';
	} else if(delta < (120*60)) {
		return '1h ago';
	} else if(delta < (24*60*60)) {
		return (parseInt(delta / 3600)).toString() + 'h ago';
	} else if(delta < (48*60*60)) {
		return '1 day ago';
	} else {
		return shortdate;
	}
}

function populateInstagram(feed) {
	feed.instagram({
		userId: '344093441',
		accessToken: '344093441.1677ed0.f844a4f856c34b71af468a020c03c013',
		image_size: 'standard_resolution',
		show: 12
	}).find('.spinner').addClass('hidden');
}
// accessToken: '192419885.c3888bb.9f089d5294b14728b11eef445e7b71a5',

function sesStorage() {
	try {
		return 'sessionStorage' in window && window['sessionStorage'] !== null;
	} catch (e) {
		return false;
	}
}

function twitterReveal() {
	if (winWidth >= 1025) {
		sr.reveal('.twt')
		.reveal('#twt1',{delay:50})
		.reveal('#twt2',{delay:100})
		.reveal('#twt3',{delay:150});
	} else {
		$('.twt').css('visibility','visible');
	}

}

function instagramReveal() {
	if (winWidth >= 1025) {
		sr.reveal('.instagram-placeholder')
		.reveal('#inst1', {delay: 50})
		.reveal('#inst2', {delay:100})
		.reveal('#inst3', {delay:150})
		.reveal('#inst4', {delay:200})
		.reveal('#inst5', {delay:250})
		.reveal('#inst6', {delay:300})
		.reveal('#inst7', {delay:350})
		.reveal('#inst8', {delay:400})
		.reveal('#inst9', {delay:450})
		.reveal('#inst10',{delay:500})
		.reveal('#inst11',{delay:550});
	} else {
		$('.instagram-placeholder').css('visibility','visible');
	}
}

function instagramTimer($feed) {
	var instTimer = setInterval(function () {
		if ($feed.data('loaded')) {
			clearInterval(instTimer);
			instagramReveal();
		}
	}, 500);
}

function ageGate() {
	var $ageGate = $('#age-gate-modal'),
		$yesBtn = $('#age-gate-yes-btn'),
		$noBtn = $('#age-gate-no-btn');

	if(sessionStorage.getItem('surfAgeGate') !== 'true'){

		$ageGate.modal('show');

		$yesBtn.on('click', function (e) {
			e.preventDefault();
			sessionStorage.setItem('surfAgeGate', true);
			$ageGate.modal('hide');
		});

		$noBtn.on('click', function (e) {
			e.preventDefault();
			window.location.replace('http://www.google.com/search?q=How+many+days+until+I+turn+21%3F');
		});
	}

}
