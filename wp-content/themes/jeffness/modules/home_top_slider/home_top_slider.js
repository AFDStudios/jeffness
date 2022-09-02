// Note: Requires flexslider 2 buddy.
jQuery(document).ready(function($) {
	if ( $('#front-page-slider-wrapper').length ) {
		// Flexslider
		$('.header-slider .flexslider').flexslider({
			animation: "slide",
			prevText: "",
			nextText: "",
			controlNav: false,
			directionNav: true,
			controlsContainer: '.home-top-slider-current-wrapper',
			after: function(slider) {
			$slideNumber = $(this).currentSlide;
				$('.home-top-slider-current').text(slider.currentSlide+1);
			}
		});
	}

	if ( $('#front-page-video-wrapper').length ) {

		if ( $('.video-youtube').length ) {
			// =========================
			// YOUTUBE CONTROLS
			// =========================

			// Play button
			$('.video-youtube .video-controls-wrapper .header-play-button').on('click', function(e) {
				$('.video-wrapper iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
				$(this).toggleClass('hidden');
				$('.header-pause-button').toggleClass('hidden');
			});

			// Pause Button
			$('.video-youtube .video-controls-wrapper .header-pause-button').on('click', function(e) {
				$('.video-wrapper iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'pauseVideo' + '","args":""}', '*');
				$(this).toggleClass('hidden');
				$('.header-play-button').toggleClass('hidden');
			});

			// Mute Button
			$('.video-youtube .video-controls-wrapper .header-mute-button').on('click', function(e) {
				$('.video-wrapper iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'mute' + '","args":""}', '*');
				$(this).toggleClass('hidden');
				$('.header-volume-button').toggleClass('hidden');
			});

			// Unmute Button
			$('.video-youtube .video-controls-wrapper .header-volume-button').on('click', function(e) {
				$('.video-wrapper iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'unMute' + '","args":""}', '*');
				$(this).toggleClass('hidden');
				$('.header-mute-button').toggleClass('hidden');
			});

			// Autoplay
			$('.video-wrapper iframe')[0].contentWindow.postMessage('{"event":"command","func":"' + 'playVideo' + '","args":""}', '*');
		}

		if ( $('.video-vimeo').length ) {
			// =========================
			// VIMEO CONTROLS
			// =========================

			var options = {
				width: 640,
				loop: true,
				autoplay: true,
				controls: false,
				// background: true,
				// muted: true,
			};

			var player = new Vimeo.Player('header-video', options);

			// Play button
			$('.video-vimeo .video-controls-wrapper .header-play-button').on('click', function(e) {
				player.play().then(function() {
					// the video was played
				}).catch(function(error) {
					switch (error.name) {
						case 'PasswordError':
							// the video is password-protected and the viewer needs to enter the
							// password first
							break;

						case 'PrivacyError':
							// the video is private
							break;

						default:
							// some other error occurred
							break;
					}
				});
				$(this).toggleClass('hidden');
				$('.header-pause-button').toggleClass('hidden');
			});

			// Pause Button
			$('.video-vimeo .video-controls-wrapper .header-pause-button').on('click', function(e) {
				player.pause().then(function() {
					// the video was paused
				}).catch(function(error) {
					switch (error.name) {
						case 'PasswordError':
							// the video is password-protected and the viewer needs to enter the
							// password first
							break;

						case 'PrivacyError':
							// the video is private
							break;

						default:
							// some other error occurred
							break;
					}
				});
				$(this).toggleClass('hidden');
				$('.header-play-button').toggleClass('hidden');
			});

			// Mute Button
			$('.video-vimeo .video-controls-wrapper .header-mute-button').on('click', function(e) {
				player.setVolume(0);
				$(this).toggleClass('hidden');
				$('.header-volume-button').toggleClass('hidden');
			});

			// Unmute Button
			$('.video-vimeo .video-controls-wrapper .header-volume-button').on('click', function(e) {
				player.setVolume(1);
				$(this).toggleClass('hidden');
				$('.header-mute-button').toggleClass('hidden');
			});

			// Autoplay & automute
			player.setVolume(0);
			player.play();
		}
	}

}); /* end of as page load scripts */