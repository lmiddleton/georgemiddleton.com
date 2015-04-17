<div id="ss-controls">
	<a href="">&lt;prev</a>
	<a href="">play slideshow</a>
	<a <?php print_next_href($this->category, $this->next_image) ?>>next&gt;</a>
</div>
<div id="img-parent">
	<?php render_full_img($this->image, $this->next_image, $this->category);?>
</div>
<div id="thumb-nav">
	<?php echo $this->thumbnav;?>
</div>