
<div id="img-parent">
	<?php echo $this->full_image;?>
</div>
<div id="thumb-nav">
	<div id="ss-controls">
		<a <?php print_prev_href($this->paintings, $this->category, $this->prev_image) ?>>&lt;prev</a>
		<a href="" id="play">play</a>
		<a href="" id="pause" class="hidden">pause</a>
		<a <?php print_next_href($this->paintings, $this->category, $this->next_image) ?>>next&gt;</a>
	</div>
	<div id="thumbs-container">
		<?php echo $this->thumbnav;?>
	</div>
</div>