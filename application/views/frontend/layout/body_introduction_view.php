<div class="row">
	<div class="col-md-24">
		<div id="blockid_32" class="col-md-24">
			<div class="marquee_text">
				<?php
				$ten_truong = "";
				if (isset($common)) {
					foreach ($common as $key => $value) {
						//print_r($value);
						if ($value->key == 'company_name') {
							//$title = $value->value;
							$ten_truong = $value->value;
						}
					}
				}
				?>
				Chào mừng các bạn đến với trang Web <?php echo $ten_truong; ?>
			</div>
		</div>
	</div>
</div>