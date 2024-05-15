<section class="featured-properties-area section-padding-150-50">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-heading wow fadeInUp">
					<h2 style="color: green;"><?php echo ($lang=="en")?$category->name_en:$category->name; ?></h2>
					<hr/>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			$p=false;
			if (!empty($products)) {
				foreach ($products as $item) {
					if($p) $link = Post_model::GetLink($item, $lang);
					else $link = Product_model::GetLink($item, $lang);
					$name = $lang=="en"?$item->name_en:$item->name;
					?>
					<div class="col-12 col-md-6 col-xl-4">
						<div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">

							<div class="property-thumb">
								<a href="<?php echo $link; ?>"><img src="<?php echo $item->thumb; ?>" alt="" /></a>
								<div class="tag">
									<span><?php echo $p ? "": Product_model::$_hang_muc[$item->hang_muc][$lang]; ?></span>
								</div>
								<div class="list-price">
									<p><span class="fa fa-dollar"
											 style="font-size: 18px;color: green;"></span> <?php echo $p ? "": ($lang=="en")?$item->price_short_en:$item->price_short; ?>
									</p>
								</div>
							</div>

							<div class="property-content">
								<h5><a href="<?php echo $link; ?>"><?php echo $p ? (($lang=="en")?$item->title_en:$item->title) : ($name ." - ".$item->ma_tin); ?></a></h5>
								<?php
								if($p){

									echo ($lang=="en")?"<p>$item->meta_description_en</p>":"<p>$item->meta_description</p>";
								}
								else {
									?>
									<p class="location"><img src="/assets/images/local.jpg"
															 alt=""><?php echo $item->address; ?></p>
									<p></p>
									<div
										class="property-meta-data d-flex align-items-end justify-content-between">
										<div class="new-tag">
													<span class="fa fa-home"
														  style="font-size: 18px;color: green;"></span>
										</div>
										<div class="bathroom">
													<span class="fa fa-bath"
														  style="font-size: 18px;color: green;"></span>
											<span><?php echo $item->so_wc; ?></span>
										</div>
										<div class="garage">
													<span class="fa fa-bed"
														  style="font-size: 18px;color: green;"></span>
											<span><?php echo $item->so_phong; ?></span>
										</div>
										<div class="space">
										<span class="fa fa-ruler-horizontal"
											  style="font-size: 18px;color: green;"></span>
											<span><?php echo $item->dien_tich; ?> m2</span>
										</div>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>

</section>
