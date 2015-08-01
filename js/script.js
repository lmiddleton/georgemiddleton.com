$(document).ready(function(){
	// init slideshow timer
	var timer;

	// init slideshow buttons
	$('#play').click(function(event){
		
		// prevent href from firing
		event.preventDefault();

		// switch play/pause buttons
		$('#play').hide();
		$('#pause').show();
		
		// start timer
		timer = setInterval(function() {

			// grab all the thumbnails
			var thumbs = $('#thumbs-container').find('a');

			// loop over thumbs to find the active one
			var numThumbs = thumbs.length;
			for(var i = 0; i < numThumbs; i++) {
				if($(thumbs[i]).hasClass('active-thumb')) {
					// store the query string for the next thumbnail
					var next;
					// if we are at the end
					if((i + 1) == numThumbs) {
						// start again at the begininng
						next = $(thumbs[0]).attr('href');
					}
					else {
						// go to the next thumbnail
						next = $(thumbs[i + 1]).attr('href');
					}
					// parse for the category
					var category = next.split('.')[0];
					// parse for the image name
					var image = next.split('=')[1];

					$.ajax({
						url: 'advance-image.php',
						type: 'POST',
						data: {
							'category': category,
							'image': image
						},
						success: function(data, textStatus, xhr) {
							// convert return string to JSON
							var returnedData = JSON.parse(data);
							// fade current image out
							$('#img-parent').fadeOut({
								duration: 2000,
								complete: function(){
									$('#img-parent').html(returnedData.full_image);
									// fade new image in
									$('#img-parent').fadeIn({
										duration: 2000
									});
									// load return into thumb container
									$('#thumbs-container').html(returnedData.thumbnav);
								}
							});
						},
						error: function() {
							console.log();
						}
					});
					return;
				}
			}
		}, 6000);
	});

	$('#pause').click(function(event){
		// prevent href from firing
		event.preventDefault();

		// switch play/pause buttons
		$('#pause').hide();
		$('#play').show();

		// shut off the timer
		window.clearInterval(timer);
	});
});