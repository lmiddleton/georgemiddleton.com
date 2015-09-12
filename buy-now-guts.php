<div class="text-container" style="width: 100%;">
	<div style="display: table; width: 100%;">
		<div style="display: table-cell; width: 50%; text-align: left; padding-right: 3em; padding-left: 3em;">
			<img src="images/full/<?php echo $this->full_filename;?>" alt="<?php echo $this->title;?>" class="full" style="width: 400px;" />
			<div class="caption" style="text-align: left; width: 400px; line-height: 1.7em; font-size: 0.9em;">
				<span class="title"><?php echo $this->title;?></span><br />
				<?php echo $this->medium;?>, <?php echo $this->size;?>, <?php echo $this->edition;?><br />
				<?php echo $this->price;?>
			</div>
		</div>
		<div style="display: table-cell; width: 50%; text-align: left; vertical-align: top;">
			<div style="background-color: #F7F7F7; padding: 1em;">
				<p>
					Inkjet prints are made with archival pigment inks and papers, are hand-signed, numbered, and dated, and include a certificate of authenticity.
				</p>

				<p>
					Please contact me directly for a discount on orders of two or more prints. Payment is through PayPal. Massachusetts customers add 6.25% sales tax.
				</p>

				<p>
					Shipping is included and via USPS. Please allow two weeks to receive your order.
				</p>

				<p>
					If you are dissatisfied for any reason with your purchase, you may return the work within 14 days for a full refund.
				</p>
				<div class="paypal"><?php echo $this->paypalCode;?></div>
			</div>
		</div>
	</div>
</div>