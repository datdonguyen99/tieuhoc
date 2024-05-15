<?php
if(empty($product)) return;
?>
<style>
	.banner-absolute{position: absolute;}
</style>
<section class="listings-content-wrapper section-padding-100">
	<div class="container">
		<div class="row">
			<div class="col-12">

				<div class="single-listings-sliders owl-carousel">
					<?php
					//print_r($imgs);
					if(!empty($imgs)){
						foreach ($imgs as $img){
							if($hi==0){
								echo "<img src='$img' style='max-height: 500px; object-fit: contain;' />";
							}
							else echo "<img src='$img->img_url' style='max-height: 500px; object-fit: contain;' />";

						}
					}
					?>
					</div>
			</div>
		</div>
		<div class="row justify-content-lg-start">
			<div class="breadcrumb">
				<?php
				$this->load->view("frontend/layout/breadcrum",array('loai_nha_dat'=>$loai_nha_dat,'product'=>$product)); ?>
			</div>
			<div class="col-9 col-lg-9 col-md-6 col-sm-12" id="right-content">
				<div class="listings-content">
<!--					<div class="list-price">-->
<!--						<p>--><?php //echo $product->price_short; ?><!--</p>-->
<!--					</div>-->
					<h1 style="font-size: 32px;"><?php echo (($lang=="en")?$product->name_en:$product->name) ." - ". $product->ma_tin; ?></h1>
					<p class="location"><img src="/assets/images/local.jpg" alt="" /><?php echo $product->address; ?></p>
					<p>
						</p>

					<div class="property-meta-data d-flex align-items-end">
						<div class="new-tag">
							<span class="fa fa-home" style="font-size: 18px;color: green;"></span>
						</div>
						<div class="bathroom">
							<span class="fa fa-bath" style="font-size: 18px;color: green;"></span>
							<span><?php echo $product->so_wc; ?></span>
						</div>
						<div class="garage">
							<span class="fa fa-bed" style="font-size: 18px;color: green;"></span>
							<span><?php echo $product->so_phong; ?></span>
						</div>
						<div class="space">
							<span class="fa fa-ruler-horizontal"
								  style="font-size: 18px;color: green;"></span>
							<span><?php echo $product->dien_tich; ?> m2</span>
						</div>
					</div>
				</div>
				<div>
					<?php echo ($lang=="en")?$product->content_en:$product->content; ?>
				</div>
				<div class="tienich">
					<h5>Tiện ích</h5>
					<ul>
						<?php
						if(!empty($product->tien_ich)){
							$ti = explode(";",$product->tien_ich);
							if(count($ti)>0){
								foreach ($ti as $value){
									echo "<li style=\"display: inline-block;margin: 10px; list-style-type: circle;\"><span class='fa fa-circle-check' style='padding-right: 10px;color: green;'></span>".Product_model::$_tien_ich[$value][$lang]."</li>";
								}
							}
						}
						?>
					</ul>
				</div>
				<div>
					<?php
					if($hi==1){
					if(!empty($imgs)){
						foreach ($imgs as $img){
							echo "<img src='$img->img_url' class='img-responsive' /><br/>";
						}
					}
					}
					?>
				</div>


			</div>
			<div class="col-3 col-lg-3 col-md-6 col-sm-12">
				<div class="banner-right" style="">
					<img src="/uploads/banner_right.jpg" class="img-responsive" />
				</div>
			</div>
		</div>
		<hr/>
		<div class="row" id="tinlienquan">
			<div class="col-12">
				<div class="listings-maps mt-100">
					<h4><?php echo ($lang=="en")?"Related":"Tin liên quan"; ?></h4>
					<div id="relation">
						<?php
						if(!empty($relation)){
							foreach ($relation as $item){
								$link = Product_model::GetLink($item,$lang);
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
														 style="font-size: 18px;color: green;"></span> <?php echo ($lang=="en")?$item->price_short_en:$item->price_short; ?>
												</p>
											</div>
										</div>

										<div class="property-content">
											<h5><a href="<?php echo $link; ?>"><?php echo ($lang=="en")?$item->name_en:$item->name; ?></a></h5>
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
	$(document).ready(function () {
		var i = 1;
		let po = $('.banner-right').offset().top;
		$(window).scroll(function(e) {
			e.preventDefault();

			let stop = $('#tinlienquan').offset().top;
			//console.log('stop-' + stop);
			var height = $(document).scrollTop();

			//console.log(po);
			if(height  >= po + 500 && height <= stop-520) {

				//$('.banner-right').css('position','fixed');
				//$('.banner-right').css('top',0);
				//return;
				$('.banner-right').addClass('banner-right-fixed');
				$('.banner-right').removeClass('banner-absolute');
				$('.banner-right').css('top',0);
			}
			else if(height >= stop-520){
				//console.log(height);
				$('.banner-right').removeClass('banner-right-fixed');
				$('.banner-right').addClass('banner-absolute');
				$('.banner-right').css('top',stop-1240);
			}
			else{
				$('.banner-right').removeClass('banner-right-fixed');
				$('.banner-right').removeClass('banner-absolute');

				//return;
			}
		});
	});
</script>
