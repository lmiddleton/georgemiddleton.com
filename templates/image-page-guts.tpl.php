<div id="img-parent">
	<?php echo $this->full_image;?>
</div>
<div id="thumb-nav">
	<div id="ss-controls" style="display: table; width: 100%;">
		<div style="display: table-cell; text-align: right;">
			<a <?php print_prev_href($this->paintings, $this->category, $this->prev_image) ?> style="">&lt; prev</a>
		</div>
		<!-- <a href="" id="play">play</a> -->
		<!-- <a href="" id="pause" class="hidden">pause</a> -->
		<div style="display: table-cell; text-align: left;">
			<a <?php print_next_href($this->paintings, $this->category, $this->next_image) ?> style="">next &gt;</a>
		</div>
	</div>
	<div id="thumbs-container">
		<?php echo $this->thumbnav;?>
	</div>
</div>