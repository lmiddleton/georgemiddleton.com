<title>George Middleton</title>
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/reset.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script src="js/script.js"></script>
<style>
	body {
		/*font-family: "Lucida Grande", "Lucida Sans Unicode", sans-serif;*/
		font-family: 'Open Sans', sans-serif;
		min-width: 1028px;
	}

	h1 {
		/*color: #555555;*/
		color: white;
		display: inline-block;
		font-size: 1.4em;
		/*margin-right: 0.5em;*/
		margin-bottom: 0em;
	}

	#media-links-parent {
		display: inline-block;
		/*display: none;*/
		/*position: absolute;*/
		float: right;
		right: 0;
		top: 0px;
	}

	strong {
		font-weight: bold;
	}

	p {
		margin-bottom: 2.5em;
		line-height: 1.5em;
	}

	#container {
		background-color: white;
		/*height: 685px;*/	/* MCA height */
		min-height: 700px;
		margin: auto;	/* center MCA horizontally */
		position: relative;
		width: 1028px;	/* MCA width */
		padding-bottom: 15px; /* footer height */
		margin-top: 2.5em;
	}

	#header {
		/*background-color: #444444;*/
		background-color: #666666;
		padding-top: 3em;
		padding-bottom: 0.2em;
		/*margin-top: 0.5em;*/
	}

	#header-guts {
		margin: auto;
		/*width: 900px;*/ /* max full size */
		width: 1028px;
	}

	#nav {
		color: #828992;
		/*display: inline;*/
		font-size: .9em;
		margin-bottom: 1.7em;
		margin-top: 0.5em;
		/*width: 800px;*/
		width: 1028px;
	}

	#nav a.text {
		/*margin-left: .5em;*/
		/*margin-right: .5em;*/
	}

	#nav img.divider {
		margin-left: .5em;
		margin-right: .5em;
	}

	#media-links-parent a.img {
		margin-left: .3em;
		margin-right: .3em;
	}

	#ss-controls {
		/*background-color: green;*/
		font-size: 0.8em;
		text-align: center;
		margin-top: -1.5em;
		margin-bottom: 0.5em;
		/*width: 800px;*/ /* max full size */
	}

	#ss-controls a {
		margin-right: 0.5em;
	}

	#img-parent {
		/*background-color: yellow;*/
		float: left;
		text-align: center;
		width: 800px; /* max full size */
	}

	img.full {
		border: solid 1px #efefef;
		/*width: 800px;*/
		max-width: 800px;
	}

	#thumb-nav {
		/*background-color: yellow;*/
		float: right;
		vertical-align: top;
	}

	.caption {
		/*background-color: white;*/
		color: #828992;
		font-size: 0.8em;
		margin-top: 1em;
		margin-bottom: 1.5em;
		text-align: center;
	}

	.caption form {
		display: inline;
	}

	.caption input {
		margin-left: 0.5em;
		margin-top: -0.5em;
		vertical-align: middle;
	}

	span.title {
		font-weight: bold;
	}

	.text-container {
		color: #6a6a6a;
		font-size: .9em;
		padding-top: 1em;
		text-align: justify;
		width: 900px; /* max full size */
	}

	#footer {
		/*background-color: orange;*/
		bottom: 0;
		color: #828992;
		font-size: 0.7em;
		height: 15px;
		clear: both;
		position: absolute;
		text-align: center;
		width: 800px; /* max full size */
	}

	#nav a {
		color: #aaaaaa;
	}

	a:link {
		color: #828992;
		text-decoration: none;
	}

	a:visited {
		color: #828992;
		text-decoration: none;
	}

	a:hover {
		color: #828992;
		text-decoration: underline;
	}

	a:active {
		color: #828992;
		text-decoration: none;
	}

	a.active {
		text-decoration: underline;
	}

	a.thumb img {
		border: solid 2px white;
	}

	a.active-thumb img {
		border: solid 2px #070707;
	}

	.hidden {
		display: none;
	}

	#bio-link {
		margin-top: 3em;
		text-align: center;
	}

	button.button{
		clear:both;
		background-color: #aaa;
		border: 0 none;
		border-radius:4px;
		color: #FFFFFF;
		cursor: pointer;
		display: inline-block;
		font-size: 12px;
		font-weight: bold;
		height: 20px;
		line-height: 20px;
		margin: -3px 0 0 10px;
		padding: 0 22px;
		text-align: center;
		text-decoration: none;
		vertical-align: top;
		white-space: nowrap;
		width: auto;
	}

	button.button:hover {
		background-color: #666;
	}

	.caption a.print-available {
		clear:both;
		background-color: #aaa;
		border: 0 none;
		border-radius:4px;
		color: #FFFFFF;
		cursor: pointer;
		display: inline-block;
		font-size: 12px;
		font-weight: bold;
		height: 20px;
		line-height: 20px;
		margin: -3px 0 0 10px;
		padding: 0 22px;
		text-align: center;
		text-decoration: none;
		vertical-align: top;
		white-space: nowrap;
		width: auto;
	}

	.caption a.print-available:hover {
		background-color: #666;
	}

	a.button {
		clear:both;
		background-color: #aaa;
		border: 0 none;
		border-radius:4px;
		color: #FFFFFF;
		cursor: pointer;
		display: inline-block;
		font-size: 15px;
		font-weight: bold;
		height: 32px;
		line-height: 32px;
		margin: -3px 0 0 10px;
		padding: 0 22px;
		text-align: center;
		text-decoration: none;
		vertical-align: top;
		white-space: nowrap;
		width: auto;
	}

	a.button:hover {
		background-color: #666;
	}

	#mc_embed_signup form {
		padding: 0 !important;
	}

</style>
<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
<!-- 
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style>
-->