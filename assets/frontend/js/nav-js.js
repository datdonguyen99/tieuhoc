$(document).ready(function(){
	if(window.matchMedia("(max-width: 767px)").matches){
		// The viewport is less than 768 pixels wide
		var a = $(".classy-nav-container"), s = $(".classynav ul"), o = $(".classynav > ul > li"),
			l = $(".classy-navbar-toggler"), i = $(".classycloseIcon"), t = $(".navbarToggler"), d = $(".classy-menu");


		i.on("click", function () {
			d.removeClass("menu-on"), t.removeClass("active")
		});
		//o.has(".dropdown").addClass("cn-dropdown-item");
		//o.has(".megamenu").addClass("megamenu-item");
		a.removeClass('breakpoint-off');
		a.addClass('breakpoint-on');
		s.find("li a").each(function () {
			//$(this).length > 0 && ($(this).parent("li").addClass("has-down").append('<span class="dd-trigger"></span>'), $(this).parent("li").addClass("has-down").append('<span class="dd-arrow"></span>'))
		});
		s.find("li .dd-trigger").on("click", function (n) {
			n.preventDefault(), $(this).parent("li").toggleClass("active"),$(this).parent("li").find("ul").each(function () {
				$(this).slideToggle(300)
			})
		});
		$(".megamenu-item, .cn-dropdown-item").addClass("pr12");
		s.find("li .dd-trigger").on("click", function (n) {
			n.preventDefault(), $(this).parent("li").children(".megamenu");
		});
	} else{
		// The viewport is at least 768 pixels wide
		//alert("This is a tablet or desktop.");
	}
});




