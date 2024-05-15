<section class="featured-properties-area section-padding-100-50">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-heading wow fadeInUp">
					<h2 style="color: green;">KẾT QUẢ TÌM KIẾM</h2>
					<hr/>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			if (!empty($chdv)) {
				foreach ($chdv as $item) {
					$link = Product_model::GetLink($item);
					?>
					<div class="col-12 col-md-6 col-xl-4">
						<div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">

							<div class="property-thumb">
								<a href="<?php echo $link; ?>"><img src="<?php echo $item->thumb; ?>" alt="" /></a>
								<div class="tag">
									<span><?php echo Product_model::$_hang_muc[$item->hang_muc]; ?></span>
								</div>
								<div class="list-price">
									<p><span class="fa fa-dollar"
											 style="font-size: 18px;color: green;"></span> <?php echo $item->price_short; ?>
									</p>
								</div>
							</div>

							<div class="property-content">
								<h5><a href="<?php echo $link; ?>"><?php echo $item->name . " - ".$c_chdv->ma_muc.$item->stt; ?></a></h5>
								<p class="location"><img src="/assets/images/local.jpg"
														 alt=""><?php echo $item->address; ?></p>
								<!--								<p>--><?php //echo word_limiter($item->description,20, " "); ?><!--</p>-->
								<div class="property-meta-data d-flex align-items-end justify-content-between">
									<div class="new-tag">
										<span class="fa fa-home" style="font-size: 18px;color: green;"></span>
									</div>
									<div class="bathroom">
										<span class="fa fa-bath" style="font-size: 18px;color: green;"></span>
										<span><?php echo $item->so_wc; ?></span>
									</div>
									<div class="garage">
										<span class="fa fa-bed" style="font-size: 18px;color: green;"></span>
										<span><?php echo $item->so_phong; ?></span>
									</div>
									<div class="space">
										<span class="fa fa-ruler-horizontal"
											  style="font-size: 18px;color: green;"></span>
										<span><?php echo $item->dien_tich; ?> m2</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			}
			else echo "Không tìm thấy sản phẩm nào";
			?>

		</div>
	</div>
</section>
