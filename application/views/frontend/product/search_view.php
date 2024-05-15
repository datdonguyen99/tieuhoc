<?php
//if(empty($products)) return;

?>
<section class="listings-content-wrapper section-padding-100-70">
	<div class="south-search-area" style="margin-top: 150px;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="advanced-search-form">

						<div class="search-title">
							<p>Tìm kiếm</p>
						</div>
						<form action="/search" method="post" id="advanceSearch">
							<div class="row">
								<div class="col-12 col-md-4 col-lg-3">
									<div class="form-group">
										<input type="input" class="form-control" name="input" placeholder="Keyword">
									</div>
								</div>
								<div class="col-12 col-md-4 col-lg-3">
									<div class="form-group">
										<?php echo $drop_district; ?>
									</div>
								</div>
								<div class="col-12 col-md-4 col-lg-3">
									<div class="form-group">
										<?php echo $drop_ward; ?>
									</div>
								</div>
								<div class="col-12 col-md-4 col-lg-3">
									<div class="form-group">
										<?php echo $drop_sophong; ?>
									</div>
								</div>
								<div class="col-12 col-md-4 col-xl-2">
									<div class="form-group">
										<?php echo $drop_sowc; ?>
									</div>
								</div>
								<div class="col-12 col-md-4 col-xl-2">
									<div class="form-group">
										<?php echo $drop_huong; ?>
									</div>
								</div>
								<div class="col-12 col-md-4 col-xl-2">
									<div class="form-group">
										<?php echo $drop_dientich; ?>
									</div>
								</div>
								<div class="col-12 col-md-4 col-xl-2">
									<div class="form-group">
										<?php echo $drop_mucgia; ?>
									</div>
								</div>
								<div class="col-12 col-md-4 col-xl-2">
									<div class="form-group mb-0">
										<button type="submit" class="btn south-btn" name="btn-search">Search</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<hr/>
		<div class="row">
			<div class="col-12">
				<div class="listings-maps mt-15">
					<h4><?php echo $lang == "en" ? "Result": "Kết quả tìm kiếm"; ?></h4>
					<div id="relation">
						<?php
						if(!empty($products)){
							foreach ($products as $item){
								$link = Product_model::GetLink($item);
								?>
								<div class="col-12 col-md-6 col-xl-4">
									<div class="single-featured-property mb-50 wow fadeInUp" data-wow-delay="100ms">

										<div class="property-thumb">
											<a href="<?php echo $link; ?>"><img src="<?php echo $item->thumb; ?>" alt="" /></a>
											<div class="tag">
												<span><?php echo Product_model::$_hang_muc[$item->hang_muc][$lang]; ?></span>
											</div>
											<div class="list-price">
												<p><span class="fa fa-dollar"
														 style="font-size: 18px;color: green;"></span> <?php echo $lang == "en"? $item->price_short_en : $item->price_short; ?>
												</p>
											</div>
										</div>

										<div class="property-content">
											<h5><a href="<?php echo $link; ?>"><?php echo ($lang=='en'?$item->name_en: $item->name) . " - ".$item->ma_tin; ?></a></h5>
											<p class="location"><img src="/assets/images/local.jpg"
																	 alt=""><?php echo $item->address; ?></p>
											<p></p>
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
						else{
							echo $lang=="en"? "<p class='alert alert-warning'>No results</p>":"<p class='alert alert-warning'>Không tìm thấy kết quả nào</p>";
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script>
	$(document).ready(function () {
		$('img').css('width','100%!important');
		$('img').attr('width','');
		$('img').attr('height','');
	});
</script>
