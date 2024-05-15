<?php foreach ($products as $p) {
	$link = Product_model::GetLink($p);
	?>
	<div class="item">
		<div class="item1">
			<p class="sp_img"><a href="<?php echo $link; ?>"
								 title="Cân phân tích PA 214 Ohaus ">
					<img src="<?php echo $p->thumb; ?>"
						 alt="<?php echo $p->name; ?>" /></a></p>
			<div class="ten-sp">
				<h3 class="sp_name"><a href="<?php echo $link; ?>"
									   title="Cân phân tích PA 214 Ohaus<?php echo $p->name; ?>"><?php echo $p->name; ?></a></h3>
				<p class="sp_gia">
					Giá:
					<span class="giamoi motgia"> <?php echo !empty($p->price)?number_format($p->price,0,'','.'):"Liên hệ" ?></span>
				</p>
			</div>
			<div class="xct">
				<a href="<?php echo $link; ?>"
				   title="<?php echo $p->name; ?>">xem chi tiết</a>
			</div>
		</div>
		<!---END .item-->
	</div>
<?php  } ?>
