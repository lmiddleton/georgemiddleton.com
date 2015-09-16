<div class="text-container" style="width: 100%;">
	<div style="display: table; width: 100%;">
		<div style="display: table-cell; width: 50%; text-align: left; padding-right: 3em; padding-left: 3em;">
			<img src="images/full/<?php echo $this->full_filename;?>" alt="<?php echo $this->title;?>" class="full" style="width: 100%;" />
			<div class="caption" style="text-align: center; line-height: 1.7em; font-size: 0.9em;">
				<span class="title"><?php echo $this->title;?></span>, <?php echo $this->medium;?>, <?php echo $this->size;?><br />
				&copy;<?php echo $this->date;?>, <?php echo $this->edition;?>, <?php echo $this->price;?>
			</div>
		</div>
		<div style="display: table-cell; width: 50%; text-align: left; vertical-align: top;">
			<div style="background-color: #F7F7F7; padding: 1em;">
				<p>
					My inkjet prints are made with the highest quality archival pigment inks, papers, or canvas. They are hand-signed, numbered, and dated, and include a certificate of authenticity. Prints on paper include a 1/2 inch border for framing; gallery-wrapped canvas prints have hand-painted edges.
				</p>

				<p>
					Please contact me directly for a discount on orders of two or more prints. Payment is through Paypal. Massachusetts customers add 6.25% sales tax. Shipping cost is included in the price and is via either USPS, UPS, or FedEx. Please allow two weeks to receive your order.
				</p>

				<p>
					If you are dissatisfied for any reason with your purchase, you may return the work within 14 days for a full refund.
				</p>
				<div class="paypal" style="text-align: center;"><?php echo $this->paypalCode;?></div>
			</div>
		</div>
	</div>
</div>