/* *
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 31/05/2010, 00:36
 */
// NukeViet Default Custom JS
var myTimerPage = "",
	myTimersecField = "",
	tip_active = !1,
	ftip_active = !1,
	tip_autoclose = !0,
	ftip_autoclose = !0,
	winX = 0,
	winY = 0,
	oldWinX = 0,
	oldWinY = 0,
	cRangeX = 0,
	cRangeY = 0,
	docX = 0,
	docY = 0,
    brcb = $('.breadcrumbs-wrap'),
    NVIsMobileMenu = false,
    gEInterval,
    siteMenu = $("#menu-site-default"),
    reCapIDs = [];

function winResize() {
	oldWinX = winX;
	oldWinY = winY;
	winX = $(window).width();
	winY = $(window).height();
	docX = $(document).width();
	docY = $(document).height();
	cRangeX = Math.abs(winX - oldWinX);
	cRangeY = Math.abs(winY - oldWinY);
}

function fix_banner_center() {
	var a = Math.round((winX - 1330) / 2);
	0 <= a ? ($("div.fix_banner_left").css("left", a + "px"), $("div.fix_banner_right").css("right", a + "px"), a = Math.round((winY - $("div.fix_banner_left").height()) / 2), 0 >= a && (a = 0), $("div.fix_banner_left").css("top", a + "px"), a = Math.round((winY - $("div.fix_banner_right").height()) / 2), 0 >= a && (a = 0), $("div.fix_banner_right").css("top", a + "px"), $("div.fix_banner_left").show(), $("div.fix_banner_right").show()) : ($("div.fix_banner_left").hide(), $("div.fix_banner_right").hide())
}

function timeoutsesscancel() {
	clearInterval(myTimersecField);
	$.ajax({
		url: nv_base_siteurl + "index.php?second=statimg",
		cache: !1
	}).done(function() {
		$("#timeoutsess").hide();
		myTimerPage = setTimeout(function() {
			timeoutsessrun()
		}, nv_check_pass_mstime)
	})
}

function timeoutsessrun() {
	clearInterval(myTimerPage);
	document.getElementById("secField").innerHTML = 60;
	jQuery("#timeoutsess").show();
	var a = (new Date).getTime();
	myTimersecField = setInterval(function() {
		var b = (new Date).getTime(),
			b = 60 - Math.round((b - a) / 1E3);
		0 <= b ? document.getElementById("secField").innerHTML = b : -3 > b && (clearInterval(myTimersecField), $(window).unbind(), window.location.reload())
	}, 1E3)
}

function locationReplace(url)
{
    if(history.pushState) {
        history.pushState(null, null, url);
    }
}

function checkWidthMenu() {
    NVIsMobileMenu = (theme_responsive && "absolute" == $("#menusite").css("position"));
    NVIsMobileMenu ? (
        $("li.dropdown ul", siteMenu).removeClass("dropdown-menu").addClass("dropdown-submenu"),
        $("li.dropdown a", siteMenu).addClass("dropdown-mobile"),
        $("ul li a.dropdown-toggle", siteMenu).addClass("dropdown-mobile"),
        $("li.dropdown ul li a", siteMenu).removeClass("dropdown-mobile")
    ) : (
        $("li.dropdown ul", siteMenu).addClass("dropdown-menu").removeClass("dropdown-submenu"),
        $("li.dropdown a", siteMenu).removeClass("dropdown-mobile"),
        $("li.dropdown ul li a", siteMenu).removeClass("dropdown-mobile"),
        $("ul li a.dropdown-toggle", siteMenu).removeClass("dropdown-mobile")
    )
}

function checkAll(a) {
    $(".checkAll", a).is(":checked") ? $(".checkSingle", a).not(":disabled").each(function() {
        $(this).prop("checked", !0)
    }) : $(".checkSingle", a).not(":disabled").each(function() {
        $(this).prop("checked", !1)
    });
    return !1
}

function checkSingle(a) {
	var b = 0,
		c = 0;
	$(".checkSingle", a).each(function() {
		$(this).is(":checked") ? b++ : c++
	});
	0 != b && 0 == c ? $(".checkAll", a).prop("checked", !0) : $(".checkAll", a).prop("checked", !1);
	return !1
}

function tipHide() {
	$("[data-toggle=tip]").attr("data-click", "y").removeClass("active");
	$("#tip").hide();
	tip_active = !1;
	tipAutoClose(!0)
}

function ftipHide() {
	$("[data-toggle=ftip]").attr("data-click", "y").removeClass("active");
	$("#ftip").hide();
	ftip_active = !1;
	ftipAutoClose(!0)
}

function tipAutoClose(a) {
	!0 != a && (a = !1);
	tip_autoclose = a
}

function ftipAutoClose(a) {
	!0 != a && (a = !1);
	ftip_autoclose = a
}

function tipShow(a, b, callback) {
    tip_active && tipHide();
    ftip_active && ftipHide();
    $("[data-toggle=tip]").removeClass("active");
    $(a).attr("data-click", "n").addClass("active");
    if (typeof callback != "undefined") {
        $("#tip").attr("data-content", b).show("fast", function() {
            if (callback == "recaptchareset") {
                if ($('[data-toggle=recaptcha]', this).length) {
                    reCaptcha2Recreate(this);
                    "undefined" != typeof grecaptcha ? reCaptcha2OnLoad() : reCaptcha2ApiLoad()
                } else if ($("[data-recaptcha3]", this).length) {
                    "undefined" != typeof grecaptcha ? reCaptcha3OnLoad() : reCaptcha3ApiLoad()
                }
            } else if (typeof window[callback] === "function") {
                window[callback]()
            }
        });
    } else {
        $("#tip").attr("data-content", b).show("fast");
    }
    tip_active = 1;
}

function ftipShow(a, b, callback) {
    if ($(a).is(".qrcode") && "no" == $(a).attr("data-load")) {
        return qrcodeLoad(a), !1;
    }
    tip_active && tipHide();
    ftip_active && ftipHide();
    $("[data-toggle=ftip]").removeClass("active");
    $(a).attr("data-click", "n").addClass("active");
    if (typeof callback != "undefined") {
        $("#ftip").attr("data-content", b).show("fast", function() {
            if (callback == "recaptchareset") {
                if ($('[data-toggle=recaptcha]', this).length) {
                    reCaptcha2Recreate(this);
                    "undefined" != typeof grecaptcha ? reCaptcha2OnLoad() : reCaptcha2ApiLoad()
                } else if ($("[data-recaptcha3]", this).length) {
                    "undefined" != typeof grecaptcha ? reCaptcha3OnLoad() : reCaptcha3ApiLoad()
                }
            } else if (typeof window[callback] === "function") {
                window[callback]()
            }
        });
    } else {
        $("#ftip").attr("data-content", b).show("fast");
    }
    ftip_active = 1;
};

function openID_load(a) {
    tip_active && tipHide();
    ftip_active && ftipHide();
    nv_open_browse($(a).attr("href"), "NVOPID", 550, 500, "resizable=no,scrollbars=1,toolbar=no,location=no,titlebar=no,menubar=0,location=no,status=no");
    return !1
}

function openID_result() {
    var resElement = $("#openidResult");
    resElement.fadeIn();
    setTimeout(function() {
        if (resElement.data('redirect') != '') {
            window.location.href = resElement.data('redirect');
        } else if (resElement.data('result') == 'success') {
            location.reload();
        } else {
            resElement.hide(0).html('').data('result', '').data('redirect', '');
        }
    }, 5000);
}

// QR-code

function qrcodeLoad(a) {
	var b = new Image,
		c = $(a).data("img");
	$(b).load(function() {
		$(c).attr("src", b.src);
		$(a).attr("data-load", "yes").click()
	});
	b.src = nv_base_siteurl + "index.php?second=qr&u=" + encodeURIComponent($(a).data("url"))
};
// Switch tab

function switchTab(a) {
	if ($(a).is(".current")) return !1;
	var b = $(a).data("switch").split(/\s*,\s*/),
		c = $(a).data("obj");
	$(c + " [data-switch]").removeClass("current");
	$(a).addClass("current");
	$(c + " " + b[0]).removeClass("hidden");
	for (i = 1; i < b.length; i++) $(c + " " + b[i]).addClass("hidden")
};
// Change Captcha

function change_captcha(a) {
    if ($('[data-toggle=recaptcha]').length) {
        "undefined" != typeof grecaptcha ? reCaptcha2OnLoad() : reCaptcha2ApiLoad()
    } else if ($("[data-recaptcha3]").length) {
        "undefined" != typeof grecaptcha ? reCaptcha3OnLoad() : reCaptcha3ApiLoad()
    }

    if ($("img.captchaImg").length) {
        $("img.captchaImg").attr("src", nv_base_siteurl + "index.php?scaptcha=captcha&nocache=" + nv_randomPassword(10));
        "undefined" != typeof a && "" != a && $(a).val("");
    }
    return !1
}

//Form Ajax-login
function loginForm(redirect) {
    if (nv_is_user == 1) {
        return !1;
    }
    if (redirect != '') {
        redirect = '&nv_redirect=' + redirect;
    }
    $.ajax({
        type: 'POST',
        url: nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=users&' + nv_fc_variable + '=login' + redirect,
        cache: !1,
        data: '&nv_ajax=1',
        dataType: "html"
    }).done(function(a) {
        modalShow('', a, 'recaptchareset')
    });
    return !1
}


// ModalShow

function modalShow(a, b, callback) {
    "" != a && 'undefined' != typeof a && $("#sitemodal .modal-content").prepend('<div class="modal-header"><h2 class="modal-title">' + a + '</h2></div>');
    $("#sitemodal").find(".modal-title").html(a);
    $("#sitemodal").find(".modal-body").html(b);
    var scrollTop = false;
    if (typeof callback != "undefined") {
        if (callback == "recaptchareset") {
            scrollTop = $(window).scrollTop();
            $('#sitemodal').on('show.bs.modal', function() {
                if ($('[data-toggle=recaptcha]', this).length) {
                    reCaptcha2Recreate(this);
                    "undefined" != typeof grecaptcha ? reCaptcha2OnLoad() : reCaptcha2ApiLoad()
                } else if ($("[data-recaptcha3]", this).length) {
                    "undefined" != typeof grecaptcha ? reCaptcha3OnLoad() : reCaptcha3ApiLoad()
                }
            });
        }
    }
    if (scrollTop) {
        $("html,body").animate({
            scrollTop: 0
        }, 200, function() {
            $("#sitemodal").modal({
                backdrop: "static"
            });
        });
        $('#sitemodal').on('hide.bs.modal', function() {
            $("html,body").animate({
                scrollTop: scrollTop
            }, 200);
        });
    } else {
        $("#sitemodal").modal({
            backdrop: "static"
        });
    }
    $('#sitemodal').on('hidden.bs.modal', function() {
        $("#sitemodal .modal-content").find(".modal-header").remove();
    });
}

function modalShowByObj(a, callback) {
	var b = $(a).attr("title"),
		c = $(a).html();
	modalShow(b, c, callback)
}
// Build google map for block Company Info

function initializeMap() {
	var ele = 'company-map';
	var map, marker, ca, cf, a, f, z;
	ca = parseFloat($('#' + ele).data('clat'));
	cf = parseFloat($('#' + ele).data('clng'));
	a = parseFloat($('#' + ele).data('lat'));
	f = parseFloat($('#' + ele).data('lng'));
	z = parseInt($('#' + ele).data('zoom'));
	map = new google.maps.Map(document.getElementById(ele), {
		zoom: z,
		center: {
			lat: ca,
			lng: cf
		}
	});
	marker = new google.maps.Marker({
		map: map,
		position: new google.maps.LatLng(a, f),
		draggable: false,
		animation: google.maps.Animation.DROP
	});
}
$(function() {
	winResize();
	fix_banner_center();
	// Modify all empty link
	$('a[href="#"], a[href=""]').attr("href", "javascript:void(0);");
	// Add rel="noopener noreferrer nofollow" to all external links
    $('a[href^="http"]').not('a[href*="' + location.hostname + '"]').not('[rel*=dofollow]').attr({
        target: "_blank",
        rel: "noopener noreferrer nofollow"
    });

    // Smooth scroll to top
	$("#totop,#bttop,.bttop").click(function() {
		$("html,body").animate({
			scrollTop: 0
		}, 800);
		return !1
	});
	//Search form
	$(".headerSearch button").on("click", function() {
		if ("n" == $(this).attr("data-click")) return !1;
		$(this).attr("data-click", "n");
		var a = $(this).parents('.headerSearch').find('input'),
			c = a.attr("maxlength"),
			b = strip_tags(a.val()),
			d = $(this).attr("data-minlength");
		a.parent().removeClass("has-error");
		"" == b || b.length < d || b.length > c ? (a.parent().addClass("has-error"), a.val(b).focus(), $(this).attr("data-click", "y")) : window.location.href = $(this).attr("data-url") + rawurlencode(b);
		return !1
	});
	$(".headerSearch input").on("keypress", function(a) {
		13 != a.which || a.shiftKey || (a.preventDefault(), $(".headerSearch button").trigger("click"))
	});
	// Show messger timeout login users
	nv_is_user && (myTimerPage = setTimeout(function() {
		timeoutsessrun()
	}, nv_check_pass_mstime));
	// Show confirm message on leave, reload page
	$("form.confirm-reload").change(function() {
		$(window).bind("beforeunload", function() {
			return nv_msgbeforeunload
		})
	});
	// Tooltip
	$(".form-tooltip").tooltip({
		selector: "[data-toggle=tooltip]",
		container: "body"
	});
	$("[data-rel='tooltip'][data-content!='']").removeAttr("title").tooltip({
		container: "body",
		html: !0,
		title: function() {
			return ("" == $(this).data("img") || !$(this).data("img") ? "" : '<img class="img-thumbnail pull-left" src="' + $(this).data("img") + '" width="90" />') + $(this).data("content")
		}
	});
	// Change site lang
	$(".nv_change_site_lang").change(function() {
		document.location = $(this).val()
	});
	// Menu bootstrap
	$("#menu-site-default a").hover(function() {
		$(this).attr("rel", $(this).attr("title"));
		$(this).removeAttr("title")
	}, function() {
		$(this).attr("title", $(this).attr("rel"));
		$(this).removeAttr("rel")
	});
	//Tip + Ftip
	$("[data-toggle=collapse]").click(function(a) {
		tipHide();
		ftipHide();
		$(".header-nav").is(".hidden-ss-block") ? setTimeout(function() {
			$(".header-nav").removeClass("hidden-ss-block")
		}, 500) : $(".header-nav").addClass("hidden-ss-block")
	});
	$(document).on("keydown", function(a) {
		27 === a.keyCode && (tip_active && tip_autoclose && tipHide(), ftip_active && ftip_autoclose && ftipHide())
	});
	$(document).on("click", function() {
		tip_active && tip_autoclose && tipHide();
		ftip_active && ftip_autoclose && ftipHide()
	});
	$("#tip, #ftip").on("click", function(a) {
		a.stopPropagation()
	});
	$("[data-toggle=tip], [data-toggle=ftip]").click(function() {
		var a = $(this).attr("data-target"),
			d = $(a).html(),
			b = $(this).attr("data-toggle"),
			c = "tip" == b ? $("#tip").attr("data-content") : $("#ftip").attr("data-content");
		var callback = $(this).data("callback");
        a != c ? ("" != c && $('[data-target="' + c + '"]').attr("data-click", "y"), "tip" == b ? ($("#tip .bg").html(d), tipShow(this, a, callback)) : ($("#ftip .bg").html(d), ftipShow(this, a, callback))) : "n" == $(this).attr("data-click") ? "tip" == b ? tipHide() : ftipHide() : "tip" == b ? tipShow(this, a, callback) : ftipShow(this, a, callback);
		return !1
	});
	// Google map
	if ($('#company-address').length) {
		$('#company-map-modal').on('shown.bs.modal', function() {
			if (!$('#googleMapAPI').length) {
				var script = document.createElement('script');
				script.type = 'text/javascript';
				script.id = 'googleMapAPI';
				script.src = 'https://maps.googleapis.com/maps/api/js?' + ($(this).data('apikey') != '' ? 'key=' + $(this).data('apikey') + '&' : '') + 'callback=initializeMap';
				document.body.appendChild(script);
			} else {
				initializeMap();
			}
		})
	};
	// maxLength for textarea
	$("textarea").on("input propertychange", function() {
		var a = $(this).prop("maxLength");
		if (!a || "number" != typeof a) {
			var a = $(this).attr("maxlength"),
				b = $(this).val();
			b.length > a && $(this).val(b.substr(0, a))
		}
	});
	//Alerts
	$("[data-dismiss=alert]").on("click", function(a) {
		$(this).is(".close") && $(this).parent().remove()
	});
	//OpenID
	$("#openidBt").on("click", function() {
		openID_result();
		return !1
	});
    //Change Localtion
    $("[data-location]").on("click",function(){
        locationReplace($(this).data("location"))
    })
});
// Fix bootstrap multiple modal
$(document).on({
	'show.bs.modal': function() {
		var zIndex = 1040 + (10 * $('.modal:visible').length);
		$(this).css('z-index', zIndex);
        setTimeout(function() {
			$('.modal-backdrop').not('.modal-stack').css('z-index', zIndex - 1).addClass('modal-stack');
		}, 0);
	},
	'hidden.bs.modal': function() {
		if ($('.modal:visible').length > 0) {
			setTimeout(function() {
				$(document.body).addClass('modal-open');
			}, 0);
		}
	}
}, '.modal');
$(window).on("resize", function() {
	winResize();
	fix_banner_center();
	if (150 < cRangeX || 150 < cRangeY) tipHide(), ftipHide()
});
// Load Social script - lasest
$(window).on('load', function() {
	(0 < $(".fb-share-button").length || 0 < $(".fb-like").length) && (1 > $("#fb-root").length && $("body").append('<div id="fb-root"></div>'), function(a, b, c) {
		var d = a.getElementsByTagName(b)[0];
		var fb_app_id = ($('[property="fb:app_id"]').length > 0) ? '&appId=' + $('[property="fb:app_id"]').attr("content") : '';
		var fb_locale = ($('[property="og:locale"]').length > 0) ? $('[property="og:locale"]').attr("content") : ((nv_lang_data == "vi") ? 'vi_VN' : 'en_US');
		a.getElementById(c) || (a = a.createElement(b), a.id = c, a.src = "//connect.facebook.net/" + fb_locale + "/all.js#xfbml=1" + fb_app_id, d.parentNode.insertBefore(a, d));
	}(document, "script", "facebook-jssdk"));

	0 < $(".twitter-share-button").length &&
	function() {
		var a = document.createElement("script");
		a.type = "text/javascript";
		a.src = "//platform.twitter.com/widgets.js";
		var b = document.getElementsByTagName("script")[0];
		b.parentNode.insertBefore(a, b);
	}();
});



// Hide Cookie Notice Popup
function cookie_notice_hide() {
    nv_setCookie(nv_cookie_prefix + '_cn', '1', 365);
    $(".cookie-notice").hide()
}

function isRecaptchaCheck() {
    if (nv_recaptcha_sitekey == '') return 0;
    return (nv_recaptcha_ver == 2 || nv_recaptcha_ver == 3) ? nv_recaptcha_ver : 0
}

function reCaptcha2Recreate(obj) {
    $('[data-toggle=recaptcha]', $(obj)).each(function() {
        var callFunc = $(this).data('callback'),
            pnum = $(this).data('pnum'),
            btnselector = $(this).data('btnselector'),
            size = ($(this).data('size') && $(this).data('size') == 'compact') ? 'compact' : '';
        var id = "recaptcha" + (new Date().getTime()) + nv_randomPassword(8);
        if (callFunc) {
            $(this).replaceWith('<div id="' + id + '" data-toggle="recaptcha" data-callback="' + callFunc + '" data-size="' + size + '"></div>');
        } else {
            $(this).replaceWith('<div id="' + id + '" data-toggle="recaptcha" data-pnum="' + pnum + '" data-btnselector="' + btnselector + '" data-size="' + size + '"></div>')
        }
    })
}

var reCaptcha2OnLoad = function() {
    $('[data-toggle=recaptcha]').each(function() {
        var id = $(this).attr('id'),
            callFunc = $(this).data('callback'),
            size = ($(this).data('size') && $(this).data('size') == 'compact') ? 'compact' : '';

        if (typeof window[callFunc] === 'function') {
            if (typeof reCapIDs[id] === "undefined") {
                reCapIDs[id] = grecaptcha.render(id, {
                    'sitekey': nv_recaptcha_sitekey,
                    'type': nv_recaptcha_type,
                    'size': size,
                    'callback': callFunc
                })
            } else {
                grecaptcha.reset(reCapIDs[id])
            }
        } else {
            var pnum = parseInt($(this).data('pnum')),
                btnselector = $(this).data('btnselector'),
                btn = $('#' + id),
                k = 1;

            for (k; k <= pnum; k++) {
                btn = btn.parent();
            }
            btn = $(btnselector, btn);
            if (btn.length) {
                btn.prop('disabled', true);
            }

            if (typeof reCapIDs[id] === "undefined") {
                reCapIDs[id] = grecaptcha.render(id, {
                    'sitekey': nv_recaptcha_sitekey,
                    'type': nv_recaptcha_type,
                    'size': size,
                    'callback': function() {
                        reCaptcha2Callback(id, false)
                    },
                    'expired-callback': function() {
                        reCaptcha2Callback(id, true)
                    },
                    'error-callback': function() {
                        reCaptcha2Callback(id, true)
                    }
                })
            } else {
                grecaptcha.reset(reCapIDs[id])
            }
        }
    })
}

var reCaptcha2Callback = function(id, val) {
    var btn = $('#' + id),
        pnum = parseInt(btn.data('pnum')),
        btnselector = btn.data('btnselector'),
        k = 1;
    for (k; k <= pnum; k++) {
        btn = btn.parent();
    }
    btn = $(btnselector, btn);
    if (btn.length) {
        btn.prop('disabled', val);
    }
}

// reCaptcha v2 load
var reCaptcha2ApiLoad = function() {
    if (isRecaptchaCheck() == 2) {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.src = "//www.google.com/recaptcha/api.js?hl=" + nv_lang_interface + "&onload=reCaptcha2OnLoad&render=explicit";
        document.getElementsByTagName("head")[0].appendChild(a)
    }
}

// reCaptcha v3: reCaptcha3OnLoad
var reCaptcha3OnLoad = function() {
    grecaptcha.ready(function() {
        $("[data-recaptcha3]").length && (clearInterval(gEInterval), grecaptcha.execute(nv_recaptcha_sitekey, {
            action: "formSubmit"
        }).then(function(a) {
            $("[data-recaptcha3]").each(function() {
                if ($("[name=g-recaptcha-response]", this).length) $("[name=g-recaptcha-response]", this).val(a);
                else {
                    var b = $('<input type="hidden" name="g-recaptcha-response" value="' + a + '"/>');
                    $(this).append(b)
                }
            })
        }), gEInterval = setTimeout(function() {
            reCaptcha3OnLoad()
        }, 12E4))
    })
}

// reCaptcha v3 API load
var reCaptcha3ApiLoad = function() {
    if (isRecaptchaCheck() == 3) {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.src = "//www.google.com/recaptcha/api.js?render=" + nv_recaptcha_sitekey + "&onload=reCaptcha3OnLoad";
        document.getElementsByTagName("head")[0].appendChild(a)
    }
}



// Run Captcha
$(window).on('load', function() {
    0 < $(".zalo-share-button, .zalo-follow-only-button, .zalo-follow-button, .zalo-chat-widget").length && function() {
        var a = document.createElement("script");
        a.type = "text/javascript";
        a.src = "//sp.zalo.me/plugins/sdk.js";
        var b = document.getElementsByTagName("script")[0];
        b.parentNode.insertBefore(a, b);
    }();
    if ($('[data-toggle=recaptcha]').length) {
        reCaptcha2ApiLoad()
    } else if ($("[data-recaptcha3]").length) {
        reCaptcha3ApiLoad()
    }
});
