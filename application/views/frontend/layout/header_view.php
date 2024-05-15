<?php
$banner = Banner_model::SelectByType('head', 1);
$title = "";
$logo = "";
$ten_pgd = "";
$ten_truong = "";
if (isset($common)) {
	foreach ($common as $key => $value) {
		//print_r($value);
		if ($value->key == 'company_name') {
			$title = $value->value;
			$ten_truong = $value->value;
		}
		if ($value->key == "logo") $logo = $value->value;

		if ($value->key == "pgd") $ten_pgd = $value->value;
		//if($value->key=="pgd") $ten_pgd=$value->value;
	}
}
?>
<style>
	#pgd {
		display: inline-block;
		margin: 25px 20px 20px 20px;
		text-align: center;
		background: #f0f0ee;
		padding: 20px;
		border-radius: 10px;
		border: none;
		-webkit-border-radius: 10px;
		-moz-border-radius: 10px;
	}

	.ten-pgd {
		text-shadow: #0b8bc8;
		font-size: 16px;
		color: #1b6d85;
		text-transform: uppercase;
	}

	.ten-truong {
		text-shadow: #008d4c;
		font-size: 20px;
		color: #0b41a5;
		font-weight: 700;
		text-transform: uppercase;
	}

	@media (max-width: 768px) {
		#header {
			height: auto !important;
		}

		.navbar .navbar-collapse {
			position: relative !important;
			left: 0 !important;
			right: 0 !important;
			width: auto !important;
			max-width: none;
		}
	}
</style>

<div class="container">
	<div id="header" class="row" style="background: url(<?php echo count($banner) > 0 ? $banner[0]->thumb : '/assets/images/banner_codam.jpg';  ?>) no-repeat;">
		<div class="logo">
			<a title="<?php echo $title; ?>" href="/"><img src="<?php echo $logo; ?>" width="580" height="117" alt="<?php echo $title; ?>" /></a>
		</div>
		<div class="banner_site hidden-xs hidden">
			<h1>Phòng Giáo dục và Đào tạo Phước Long</h1>
			<h2>Trường Tiểu học A Vĩnh Phú Tây</h2>
		</div>
	</div>
	<div class="mobile-menu-toggle-btn animate">
		<i class="fa fa-bars" aria-hidden="true"></i>
	</div>
	<div class="row bgabout">
		<div class="col-sm-6 col-md-5 menuabout hidden-xs" style="padding-left: 0px;padding-right: 0px">
			<div class="clearfix panel metismenu">
				<aside class="sidebar">
					<nav class="sidebar-nav">
						<ul id="menu_140">
							<?php
							if (isset($menu[1]) && !empty($menu[1])) {
								$subs = Category_model::SelectByParentId($menu[1]->id);
								if (!empty($subs)) {
									foreach ($subs as $s) {
										$link = Category_model::GetLink($s);
							?>
										<li>
											<a title="<?php echo $s->name; ?>" href="<?php echo $link; ?>">
												<img src="<?php echo $s->url_thumb; ?>" /> &nbsp;<?php echo $s->name; ?>
											</a>
										</li>
							<?php
									}
								}
							}
							?>
						</ul>
					</nav>
				</aside>
			</div>
		</div>
		<div class="col-sm-18 col-md-19 slider" style="padding-left: 0px;padding-right: 0px">
			<div class="responsive-slider" data-spy="responsive-slider" data-autoplay="true">
				<div class="slides" data-group="slides">
					<ul>
						<?php
						$homeSliders = Banner_model::SelectByType('home-slider', 3);
						if (isset($homeSliders) && count($homeSliders) > 0) {
							foreach ($homeSliders as $s) {
						?>
								<li>
									<div class="slide-body" data-group="slide">
										<a href=""><img src="<?php echo $s->thumb; ?>" alt="<?php echo $s->name; ?>"></a>
									</div>
								</li>
						<?php
							}
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>