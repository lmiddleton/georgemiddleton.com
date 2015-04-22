$(document).ready(function(){
	// init slideshow button
	$('#play').click(function(event){
		
		// prevent href from firing
		event.preventDefault();
		
		// start timer
		var timer = setInterval(function() {
			console.log('change');

			// grab all the thumbnails
			var thumbs = $('#thumb-nav').find('a');
			console.log(thumbs);

			// loop over thumbs to find the active one
			var numThumbs = thumbs.length;
			for(var i = 0; i < numThumbs; i++) {
				console.log(thumbs[i]);
				if($(thumbs[i]).hasClass('active-thumb')) {
					// switch to the next one
					console.log('switch!');
					return;
				}
			}

			// once 

			// find the highlighted thumbnail
			//var current = $('#thumb-nav').find('a.active-thumb');
			//console.log(current);

			// get the href from the current image
			//var href = $('#img-parent a').attr('href');
			//console.log(href);

			// call the href
			// doesn't work because timer gets blown out when new page loads..
			//window.location.assign(href);
		}, 3000);

		

	});
});