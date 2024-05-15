$(document).ready(function(){
	var maxW = $(window).width();
	if(maxW > 601){
		function e() {
			var e = 0;
			$(".topic-selector__tile").each(function() {
				var t = $(this).find(".topic-selector__card-inner"),
				i = t.outerHeight();			
				i > e && (e = i)
			}), $(".topic-selector__tile").each(function() {
				$(this).css({
					minHeight: e
				})
			})
		}
		e(), window.addEventListener("resize", e);
		var t = 1,
		i = 0,
		n = !1;
		$(".topic-selector").find("[data-index='" + t + "']").css("opacity", "1"), $(".topic-selector__tile").on("mouseenter", function() {
			n = !0, $(".topic-selector").find("[data-index='" + i + "']").css("opacity", "0");
			var e = $(this).data("target");		
			$(".topic-selector__background").find("[data-index='" + e + "']").css("opacity", "1"), i = e
		}), $(".topic-selector__tile").on("mouseleave", function() {
			n = !1, setTimeout(function() {
				n === !1 && ($(".topic-selector").find("[data-index='" + i + "']").css("opacity", "0"), $(".topic-selector").find("[data-index='" + t + "']").css("opacity", "1"), i = 0)
			}, 100)
		}), $(".topic-selector__tile").on("focus", function() {
			n = !0, $(".topic-selector").find("[data-index='" + i + "']").css("opacity", "0");
			var e = $(this).data("target");
			$(".topic-selector__background").find("[data-index='" + e + "']").css("opacity", "1"), i = e
		})
	}
	function initSlick(){
		var course = $(".section_course .row_item");
		course.slick({
			slidesToShow: 3,
			rows:2,
			swipeToSlide: !0,
			autoplay: !0,
			autoplaySpeed: 2000,
			speed: 2000,
			dots: !1,
			arrows: !1,
			responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3,
				}
			},
			{
				breakpoint: 576,
				settings: {
					slidesToShow: 1,
				}
			}
			]
		});
	}
	initSlick();
	$('.section_course .box_header').on('click', 'li', function(event) {
		$('.mores').remove();
		$('.section_course .box_header ul li').removeClass('active');
		$(this).addClass('active');
		var type = $(this).data('type');
		$.ajax({
			type: "POST",
			url: ROOT+"ajax.php",
			data: { "m" : "home", "f" : "load_type", "type" : type, "lang_cur" : lang }
		}).done(function( string ) {
			var data = JSON.parse(string);
			$('.section_course .content .row_item').removeClass("slick-initialized").html(data.html);
			initSlick();
			if(data.num >= 6){
				$('.section_course .container').append('<div class="mores"><a href="'+data.link+'">Xem thêm</a></div>')
			}
			// setTimeout(function () {
			// 	$(".section_course .row_item").slick('refresh');
			// }, 500);
		});
	});
	$('.fa-angle-down').on('click', function(event) {
		var prev = $(this).parent();
		$(prev).find('ul').slideToggle(500);
	});
	$('.tab .tab-title').click(function(e){
		e.preventDefault();
		$(this).parent().siblings().children('.tab-title').removeClass('active');
		$(this).parent().siblings().children('.tab-content').slideUp();
		$(this).toggleClass('active');
		$(this).next().slideToggle();
		if($(window).width()<757){
			var self = this;
			setTimeout(function() {
				theOffset = $(self).offset();
				$('body,html').animate({ scrollTop: theOffset.top - 70 });
			}, 310);
		}
	});
})