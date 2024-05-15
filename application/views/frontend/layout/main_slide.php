<?php
if(isset($home) && $home==1) {
	?>
	<div id="main_slide" class="home">
		<div id="preloader">
			<div id="status"></div>
		</div>
		<div class="home-banner">
			<div class="desktopslide hide-for-small-only">
				<div class="carousel">
					<div class="slide slide-one">
						<div class="slide-bg"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="fading-overlay"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="tagline-holder">
							<div class="tagline two" data-in-effect="fadeIn" data-in-shuffle="false"
								 data-out-effect="fadeOut" data-out-shuffle="false" data-id="56"
								 data-color="#b6d946" data-stt="4" style="opacity: 0;"><p>"Taxation is the price which civilized communities pay for the opportunity of remaining civilized."</p></div>
						</div>
					</div>

					<div class="slide ">
						<div class="slide-bg"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="fading-overlay"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="tagline-holder">
							<div class="tagline two" data-in-effect="fadeIn" data-in-shuffle="false"
								 data-out-effect="fadeOut" data-out-shuffle="false" data-id="58"
								 data-color="#544a54" data-stt="1" style="opacity: 0;"><p>Build your own dreams, or someone else will hire you to build theirs.</p></div>
						</div>
					</div>

					<div class="slide ">
						<div class="slide-bg"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="fading-overlay"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="tagline-holder">
							<div class="tagline two" data-in-effect="fadeIn" data-in-shuffle="false"
								 data-out-effect="fadeOut" data-out-shuffle="false" data-id="60"
								 data-color="#caf501" data-stt="10" style="opacity: 0;"><p>“Price is what you pay, value is what you get.”</p></div>
						</div>
					</div>
					<div class="slide ">
						<div class="slide-bg"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="fading-overlay"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="tagline-holder">
							<div class="tagline two" data-in-effect="fadeIn" data-in-shuffle="false"
								 data-out-effect="fadeOut" data-out-shuffle="false" data-id="60"
								 data-color="#caf501" data-stt="10" style="opacity: 0;"><p>"Belief connection - Properity Consolidation"</p></div>
						</div>
					</div>
				</div>
				<div class="row overlap hide-for-small-only">
					<div class="scroll-to"><a href="#" class="animated subtleBounce infinite"><img
								src="/assets/images/down-arrow.png"
								alt="scrolldown"></a></div>
				</div>
			</div>
			<div class="mobslide show-for-small-only">
				<div class="mobile-banner">
					<div class="slide">
						<div class="slide-bg"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="fading-overlay "
							 style="background-image:url('https://bizlegalgroup.com/uploads/banner/2021_10/landmark-2.jpg');"></div>
						<div class="tagline-holder" style="background:#e76f60">
							<div class="tagline three" data-in-effect="fadeIn" data-in-shuffle="false"
								 data-out-effect="fadeOut" data-out-shuffle="false" style="opacity: 0;"><p>"Taxation is the price which civilized communities pay for the opportunity of remaining civilized."</p></div>
						</div>
					</div>

					<div class="slide">
						<div class="slide-bg"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="fading-overlay "
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="tagline-holder" style="background:#c05a93">
							<div class="tagline four" data-in-effect="fadeIn" data-in-shuffle="false"
								 data-out-effect="fadeOut" data-out-shuffle="false" style="opacity: 0;"><p>Build your own dreams, or someone else will hire you to build theirs.
								</p></div>
						</div>
					</div>

					<div class="slide">
						<div class="slide-bg"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="fading-overlay "
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="tagline-holder" style="background:#8c9e4e">
							<div class="tagline five" data-in-effect="fadeIn" data-in-shuffle="false"
								 data-out-effect="fadeOut" data-out-shuffle="false" style="opacity: 0;"><p>“Price is what you pay, value is what you get.”</p></div>
						</div>
					</div>

					<div class="slide">
						<div class="slide-bg"
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="fading-overlay "
							 style="background-image:url('/uploads/taxlawvn-banner-2.jpg');"></div>
						<div class="tagline-holder" style="background:#8c9e4e">
							<div class="tagline five" data-in-effect="fadeIn" data-in-shuffle="false"
								 data-out-effect="fadeOut" data-out-shuffle="false" style="opacity: 0;"><p>"Belief connection - Properity Consolidation"</p></div>
						</div>
					</div>
				</div>
				<div class="row overlap hide-for-small-only">
					<div class="scroll-to"><a href="#" class="animated subtleBounce infinite"><span>Scroll</span>
							<img
								src="/assets/images/down-arrow.png"
								alt="scrolldown"></a></div>
				</div>
			</div>
		</div>
	</div>
	<?php
}
else{
	if(isset($category) && !empty($category)) {
		?>
		<div id="main_slide">
			<div class="row_item slick-initialized slick-slider">
				<div class="slick-list draggable"><div class="slick-track" style="opacity: 1; width: 1520px; transform: translate3d(0px, 0px, 0px);"><div class="item slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" style="width: 1520px;" tabindex="0">
							<a href="#" target="_self" tabindex="0"><img class=" ls-is-cached lazyloaded" src="/assets/frontend/images/back_cate.png" alt="Banner Career" title="#htmlcaption_1"></a>
						</div></div></div>

			</div>
			<div class="title_nav">
				<div class="title animated fadeInDown">
					<h3><strong><?php echo $category->name; ?></strong></h3>
					<p><?php echo $category->meta_description; ?></p>
					<?php
					if(isset($post) && !empty($post)){
						echo "<h2>$post->title</h2>";
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
}?>

