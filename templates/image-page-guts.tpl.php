<div id="ss-controls">
	<a <?php print_prev_href($this->paintings, $this->category, $this->prev_image) ?>>&lt;prev</a>
	<a href="" id="play">play slideshow</a>
	<a href="" id="pause" class="hidden">pause slideshow</a>
	<a <?php print_next_href($this->paintings, $this->category, $this->next_image) ?>>next&gt;</a>
</div>
<div id="img-parent">
	<?php echo $this->full_image;?>
</div>
<div id="thumb-nav">
	<?php echo $this->thumbnav;?>
</div>