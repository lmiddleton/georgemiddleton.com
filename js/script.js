$(document).ready(function(){
	// init slideshow button
	$('#play').click(function(event){
		
		// prevent href from firing
		event.preventDefault();
		
		// start timer
		var timer = setInterval(function() {
			console.log('change');
		}, 3000);

		// get the href from the current image
		var href = $('#img-parent a').attr('href');
		console.log(href);

		// call the href
		// doesn't work because timer gets blown out when new page loads..
		window.location.assign(href);

	});
});