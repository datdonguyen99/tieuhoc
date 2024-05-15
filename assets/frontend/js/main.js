function doEnter(evt) {
    var key;
    if (evt.keyCode == 13 || evt.which == 13) {
        onSearch(evt);
    }
}

function onSearch(evt) {
    var keyword = document.getElementById("keyword").value;
    if (keyword == '' || keyword == nhaptukhoatimkiem) {
        alert(chuanhaptukhoa);
    } else {
        location.href = "tim-kiem.php?keyword=" + keyword;
        loadPage(document.location);
    }
}

function doEnter2(evt) {
    var key;
    if (evt.keyCode == 13 || evt.which == 13) {
        onSearch2(evt);
    }
}

function onSearch2(evt) {
    var keyword2 = document.getElementById("keyword2").value;
    if (keyword2 == '' || keyword2 == nhaptukhoatimkiem) {
        alert(chuanhaptukhoa);
    } else {
        location.href = "tim-kiem.php?keyword=" + keyword2;
        loadPage(document.location);
    }
}
$(document).ready(function() {
    $("#menu ul li").hover(function() {
        $(this).find('ul:first').css({
            visibility: "visible",
            display: "none"
        }).show(300);
    }, function() {
        $(this).find('ul:first').css({
            visibility: "hidden"
        });
    });
    $("#menu ul li").hover(function() {
        $(this).find('>a').addClass('active2');
    }, function() {
        $(this).find('>a').removeClass('active2');
    });
});
$('.click_ajax').click(function() {
    if (isEmpty($('#ten_lienhe').val(), nhaphoten)) {
        $('#ten_lienhe').focus();
        return false;
    }
    if (isEmpty($('#diachi_lienhe').val(), nhapdiachi)) {
        $('#diachi_lienhe').focus();
        return false;
    }
    if (isEmpty($('#dienthoai_lienhe').val(), nhapsodienthoai)) {
        $('#dienthoai_lienhe').focus();
        return false;
    }
    if (isPhone($('#dienthoai_lienhe').val(), nhapsodienthoai)) {
        $('#dienthoai_lienhe').focus();
        return false;
    }
    if (isEmpty($('#email_lienhe').val(), emailkhonghople)) {
        $('#email_lienhe').focus();
        return false;
    }
    if (isEmail($('#email_lienhe').val(), emailkhonghople)) {
        $('#email_lienhe').focus();
        return false;
    }
    if (isEmpty($('#tieude_lienhe').val(), nhapchude)) {
        $('#tieude_lienhe').focus();
        return false;
    }
    if (isEmpty($('#noidung_lienhe').val(), nhapnoidung)) {
        $('#noidung_lienhe').focus();
        return false;
    }
    document.frm.submit();
});
$(function() {
    $('.hien_menu').click(function() {
        $('nav#menu_mobi').css({
            height: "auto"
        });
    });
    // $('nav#menu_mobi').mmenu({
    //     extensions: ['effect-slide-menu', 'pageshadow'],
    //     searchfield: true,
    //     counters: true,
    //     navbar: {
    //         title: 'Menu'
    //     },
    //     navbars: [{
    //         position: 'top',
    //         content: ['searchfield']
    //     }, {
    //         position: 'top',
    //         content: ['prev', 'title', 'close']
    //     }]
    // });
});
var x, i, j, l, ll, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
	selElmnt = x[i].getElementsByTagName("select")[0];
	ll = selElmnt.length;
	/* For each element, create a new DIV that will act as the selected item: */
	a = document.createElement("DIV");
	a.setAttribute("class", "select-selected");
	a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
	x[i].appendChild(a);
	/* For each element, create a new DIV that will contain the option list: */
	b = document.createElement("DIV");
	b.setAttribute("class", "select-items select-hide");
	for (j = 1; j < ll; j++) {
		/* For each option in the original select element,
		create a new DIV that will act as an option item: */
		c = document.createElement("DIV");
		c.innerHTML = selElmnt.options[j].innerHTML;
		c.addEventListener("click", function(e) {
			/* When an item is clicked, update the original select box,
			and the selected item: */
			var y, i, k, s, h, sl, yl;
			s = this.parentNode.parentNode.getElementsByTagName("select")[0];
			sl = s.length;
			h = this.parentNode.previousSibling;
			for (i = 0; i < sl; i++) {
				if (s.options[i].innerHTML == this.innerHTML) {
					s.selectedIndex = i;
					h.innerHTML = this.innerHTML;
					y = this.parentNode.getElementsByClassName("same-as-selected");
					yl = y.length;
					for (k = 0; k < yl; k++) {
						y[k].removeAttribute("class");
					}
					this.setAttribute("class", "same-as-selected");
					break;
				}
			}
			h.click();
		});
		b.appendChild(c);
	}
	x[i].appendChild(b);
	a.addEventListener("click", function(e) {
		/* When the select box is clicked, close any other select boxes,
		and open/close the current select box: */
		e.stopPropagation();
		closeAllSelect(this);
		this.nextSibling.classList.toggle("select-hide");
		this.classList.toggle("select-arrow-active");
	});
}

function closeAllSelect(elmnt) {
	/* A function that will close all select boxes in the document,
	except the current select box: */
	var x, y, i, xl, yl, arrNo = [];
	x = document.getElementsByClassName("select-items");
	y = document.getElementsByClassName("select-selected");
	xl = x.length;
	yl = y.length;
	for (i = 0; i < yl; i++) {
		if (elmnt == y[i]) {
			arrNo.push(i)
		} else {
			y[i].classList.remove("select-arrow-active");
		}
	}
	for (i = 0; i < xl; i++) {
		if (arrNo.indexOf(i)) {
			x[i].classList.add("select-hide");
		}
	}
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);

$(".search-cate .select-custom").click(function () {

	$(".search-cate").find(".advance-select-options").show();
	$(document).unbind("mousedown");
	//f();
	$(document).mousedown(function (n) {
		var t = $(".search-cate");
		t.is(n.target) || t.has(n.target).length !== 0 || ($(".search-cate").find(".advance-select-options").hide(), $("body").trigger("click"), $(document).unbind("mousedown"), s(5))
	})
});
$("#divCatagoryReOptions").find("li").click(function (n) {
	$("#divCatagoryReOptions").find("li").find("span").removeClass("active current");
	$(this).children("span").addClass("active current");
	var t = parseInt($(this).attr("vl")), i = $(this).text();
	$("#lblCurrCate").text(i);
	//h.val(t);
	$(".search-cate").find(".advance-select-options").hide();
	n.preventDefault();
	n.stopPropagation()
});
$(".home-search-tab li").click(function () {
	var n = $(this).attr("ptype");
	var i='';
	n === 38 ? (i += "<ul>", i += '<li vl="0"><span>Tất cả nhà đất<\/span><\/li>', i += '<li vl="324"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/chungcu.png" />Căn hộ chung cư<\/span><\/li>', i += '<li vl="362"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/nhaban.png" />Các loại nhà bán<\/span>', i += '<ul style="min-width: 210px !important;">', i += '<li vl="41"><span>Nhà riêng<\/span><\/li>', i += '<li vl="325"><span>Nhà biệt thự, liền kề<\/span><\/li>', i += '<li vl="163"><span>Nhà mặt phố<\/span><\/li>', i += "<\/ul>", i += "<\/li>", i += '<li vl="361"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/datban.png" />Các loại đất bán<\/span>', i += '<ul style="min-width: 210px !important;">', i += '<li vl="40"><span>Đất nền dự án<\/span><\/li>', i += '<li vl="283"><span>Bán đất<\/span><\/li>', i += "<\/ul>", i += "<\/li>", i += '<li vl="44"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/trangtrai.png" />Trang trại, khu nghỉ dưỡng<\/span><\/li>', i += '<li vl="45"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/khonhaxuong.png" />Kho, nhà xưởng<\/span><\/li>', i += '<li vl="48"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/bdskhac.png" />Bất động sản khác<\/span><\/li>', i += "<\/ul>") : (i += "<ul>", i += '<li vl="0"><span>Tất cả nhà đất<\/span><\/li>', i += '<li vl="326"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/thuechungcu.png" /> Căn hộ chung cư<\/span><\/li>', i += '<li vl="52"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/thuenharieng.png" /> Nhà riêng<\/span><\/li>', i += '<li vl="51"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/thuenhapho.png" /> Nhà mặt phố<\/span><\/li>', i += '<li vl="57"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/thuenhatro.png" /> Nhà trọ, phòng trọ<\/span><\/li>', i += '<li vl="50"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/thuevanphong.png" /> Văn phòng<\/span><\/li>', i += '<li vl="55"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/thuekiot.png" /> Cửa hàng, ki ốt<\/span><\/li>', i += '<li vl="53"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/thuekho.png" /> Kho, nhà xưởng, đất<\/span><\/li>', i += '<li vl="59"><span><img src="https://file4.batdongsan.com.vn/images/newhome/icon3x/thuebdskhac.png" /> Bất động sản khác<\/span><\/li>', i += "<\/ul>");
	$(".home-search-tab li").removeClass("actived");
	$(".home-search-tab li[ptype=" + n + "]").addClass("actived");
	$("#divCatagoryReOptions").html(i);
});

$("#divLoai").AdvanceHiddenDropbox({
	id: "divLoaiOptions",
	hddValue: ["hdCboLoai", "hdCboDistrict"],
	onShow: function () {
		//f()
		$("#divWard").AdvanceHiddenDropbox({
			id: "divWardOptions",
			hddValue: "hdCboWard",
			onShow: function () {
				//f()
			},
			onClose: function (n) {
				//s(n)
			}
		});
	},
	onClose: function (n) {
		//s(n)
	}
});
$("#divWard").AdvanceHiddenDropbox({
	id: "divWardOptions",
	hddValue: "hdCboWard",
	onShow: function () {
		//f()
	},
	onClose: function (n) {
		//s(n)
	}
});
$("#divStreet").AdvanceHiddenDropbox({
	id: "divStreetOptions",
	hddValue: "hdCboStreet",
	onShow: function () {
		//f()
	},
	onClose: function (n) {
		//s(n)
	}
});
$("#divPrice").AdvanceHiddenDropbox({
	id: "divPriceOptions",
	minValue: "txtPriceMinValue",
	maxValue: "txtPriceMaxValue",
	unit: "money",
	lblMin: "lblPriceMin",
	lblMax: "lblPriceMax",
	hddValue: "hdCboPrice",
	onShow: function () {
		//f()
	},
	onClose: function (n) {
		//s(n)
	}});

$('.xth').click(function (){
	var page = $(this).attr('page');
	//alert(page);
	var cid = $(this).attr('cate-id');
	//var ex = $(this).attr('data-exclude-id');

	if(page>0 && cid>0){
		$.ajax({
			url: '/load-more-product-by-category/'+cid+'/'+page,
			type: 'GET',
			success: function(data){
				//alert(data);
				if(data=='0' || data==0){
					$(this).hide();
				}
				else{ $('#category-'+cid).append(data);
					$(this).attr('page',(parseInt(page)+1));
				}
			}
		});
	}
});



$(document).mouseup(function(e)
{
	var container = $(".advance-select-options");

	// if the target of the click isn't the container nor a descendant of the container
	if (!container.is(e.target) && container.has(e.target).length === 0)
	{
		container.hide();
	}
});
