<div class="wrapper">
	<div class="fr">
		<p style="text-align: right">
			<strong> CỔNG THÔNG TIN
				<?php
				if (isset($common[10])) {
					echo mb_strtoupper($common[10]->value, 'UTF-8');
				}
				?>
			</strong><br />

			<strong>Địa chỉ:&nbsp;&nbsp;&nbsp;</strong>
			<?php
			if (isset($common[1])) {
				echo $common[1]->value;
			}
			?>

			<br />
			<strong>Điện thoại:&nbsp;&nbsp;&nbsp;</strong>
			<?php
			if (isset($common[0])) {
				echo $common[0]->value;
			}
			?>

			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<strong>Email:&nbsp;&nbsp;&nbsp;</strong>
			<?php
			if (isset($common[2])) {
			?>
				<a href="mailto:<?php echo $common[2]->value; ?>" target="_blank"><?php echo $common[2]->value; ?></a>
			<?php
			}
			?>
		</p>
	</div>
	<div class="clear"></div>
</div>