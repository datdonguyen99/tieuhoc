<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<?php
	$this->load->view("frontend/layout/head", array('title' => $title));
	?>
</head>

<body style="" ondragstart="return false;" ondrop="return false;">
	<div class="mobile-menu-wrap">

	</div>

	<div class="body-bg">
		<div class="wraper">
			<header>
				<?php $this->load->view("frontend/layout/header_view", $config); ?>
			</header>

			<div class="headerSearch col-sm-5 col-md-6 ">
				<div class="input-group">
					<input type="text" class="form-control" maxlength="60" placeholder="Tìm kiếm...">
					<span class="input-group-btn">
						<button type="button" class="btn btn-info" data-url="/seek/?q=" data-minlength="3" data-click="y">
							<em class="fa fa-search fa-lg"></em>
						</button>
					</span>
				</div>
			</div>

			<section>
				<div class="container" id="body">
					<div class="row">
						<?php $this->load->view("frontend/layout/nav_bar_view", $config); ?>
					</div>

					<div class="row">
						<?php
						// $is_homepage = ($this->uri->segment(1) == '' || $this->uri->segment(1) == 'home');
						$is_homepage = $config['home'] == 1 ? true : false;
						if ($is_homepage) {
							if (isset($template)) {
								if ($template != "") {
									$this->load->view($template);
								}
							}
						} else { ?>
							<div class="col-md-18">
								<?php
								print_r("OK");
								if (isset($template)) {
									if ($template != "") {
										$this->load->view($template);
									}
								}
								?>
							</div>
							<div class='col-md-6'>
								<?php $this->load->view('frontend/layout/body_rightside_view'); ?>
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="bgbottom">
					<div class="container">
						<br /><span style="color:rgb(180, 17, 0);"><span style="font-size: 14px;"><strong><span style="font-family: tahoma,geneva,sans-serif;">&nbsp;&nbsp; HOẠT ĐỘNG NHÀ TRƯỜNG</span></strong></span></span><br />&nbsp;
					</div>
				</div>
			</section>

			<footer id="footer" class="wraper">
				<?php $this->load->view("frontend/layout/footer_view", $config); ?>
			</footer>
		</div>
	</div>




	<div id="ims-scroll_left" class=""></div>
	<div id="ims-scroll_right" class=""></div>
	<div id="ims-loading">
		<div class="nb-spinner"></div>
	</div>
	<div id="ims-data"></div>
	<div id="BactoTop" class="text-color" style="display: none;"><i class="fal fa-arrow-up"></i></div>
	<div class='overlay'></div>

	<script src="/assets/js/jquery/jquery.min.js?t=1715159737"></script>
	<script>
		var nv_base_siteurl = "/",
			nv_lang_data = "vi",
			nv_lang_interface = "vi",
			nv_name_variable = "nv",
			nv_fc_variable = "op",
			nv_lang_variable = "language",
			nv_module_name = "news",
			nv_func_name = "main",
			nv_is_user = 0,
			nv_my_ofs = 7,
			nv_my_abbr = "+07",
			nv_cookie_prefix = "nv4c_Cgoz2",
			nv_check_pass_mstime = 1738000,
			nv_area_admin = 0,
			nv_safemode = 0,
			theme_responsive = 1,
			nv_recaptcha_ver = 2,
			nv_recaptcha_sitekey = "6LcNwC8UAAAAAMm8ZTYNygweLUQtOU0IapbDRk69",
			nv_recaptcha_type = "image",
			XSSsanitize = 1;
	</script>
	<script src="/assets/js/language/vi.js?t=1715159737"></script>
	<script src="/assets/js/DOMPurify/purify3.js?t=1715159737"></script>
	<script src="/assets/js/global.js?t=1715159737"></script>
	<script src="/assets/js/site.js?t=1715159737"></script>
	<script src="/themes/edu08/js/news.js?t=1715159737"></script>
	<script src="/themes/edu08/js/main.js?t=1715159737"></script>
	<script src="/themes/edu08/js/custom.js?t=1715159737"></script>
	<script type="text/javascript" src="/assets/js/jquery/jquery.metisMenu.js?t=1715159737"></script>
	<script type="text/javascript">
		$(function() {
			$('#menu_140').metisMenu({
				toggle: false
			});
			$("#menu_140 li").last().css('border-bottom', 'none');
			$("#menu_140 li").first().css('background', 'none');
		});
	</script>
	<script type="text/javascript" src="/themes/edu08/js/jquery.flexisel.js?t=1715159737"></script>
	<script type="text/javascript" src="/themes/edu08/js/responsive-slider.js?t=1715159737"></script>
	<script type="text/javascript" src="/themes/edu08/js/jquery.slimmenu.js?t=1715159737"></script>
	<script type="text/javascript" src="/assets/js/jquery-ui/jquery-ui.min.js?t=1715159737"></script>
	<script type="text/javascript">
		$('ul.slimmenu').slimmenu({
			collapserTitle: '',
			easingEffect: 'easeInOutQuint',
			animSpeed: 'medium',
			indentChildren: true,
			childrenIndenter: '&raquo;'
		});
	</script>
	<script src="/assets/js/jquery/jquery.cookie.js?t=1715159737" type="text/javascript"></script>
	<script src="/assets/js/jquery/jquery.treeview.min.js?t=1715159737" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("#navigation67").treeview({
				collapsed: true,
				unique: true,
				persist: "location"
			});
		});
	</script>
	<script type="text/javascript">
		$(window).on('load', function() {
			$("#flexiselDemo3").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 3
					},
					landscape: {
						changePoint: 640,
						visibleItems: 3
					},
					tablet: {
						changePoint: 768,
						visibleItems: 5
					}
				}
			});
		});
	</script>
	<script type="text/javascript" src="/assets/js/superfish/hoverIntent.js?t=1715159737"></script>
	<script type="text/javascript" src="/assets/js/superfish/superfish.js?t=1715159737"></script>
	<script type="text/javascript" src="/assets/js/superfish/supersubs.js?t=1715159737"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("ul.sf-menu").superfish({
				pathClass: 'current'
			});
		});
	</script>
	<script src="/themes/default/js/contact.js?t=1715159737"></script>
	<script src="/themes/edu08/js/bootstrap.min.js?t=1715159737"></script>

</body>

</html>