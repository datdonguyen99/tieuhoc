$('#province').change(function () {
	let id = $(this).val();
	let at = $(this).attr('tbl');
	if(id>>0){
		$.ajax({
			url: '/FunCom/getDistrict/'+id,
			type: 'GET',
			success: function(data){
				//alert(data);
				$('#district').html(data);
				if(at==1) {
					let qh = $('#district').val();
					$.get('/FunCom/getWardToTable/' + qh).done(function (rs) {
						$('#tbl-ward').html(rs);
					});
					let tt = $('#province').val();
					$.get('/FunCom/getDistrictToTable/' + tt).done(function (rs) {
						$('#tbl-district').html(rs);
					});
				}
			}
		});
	}
});

function getPhuongXa(qh){
	if(qh>0){
		$.ajax({
			url: '/FunCom/getWard/'+id,
			type: 'GET',
			success: function(data){
				//alert(data);
				$('#ward').html(data);
				//alert(data);

			}
		});
	}
}

$('#district').change(function () {
	let id = $(this).val();
	let at = $(this).attr('tbl');
	if(id>0){
		$.ajax({
			url: '/FunCom/getWard/'+id,
			type: 'GET',
			success: function(data){
				//alert(data);
				$('#ward').html(data);
				//alert(data);
				let qh = $('#district').val();

				if(at==1)
				{
					$.get('/FunCom/getWardToTable/'+qh).done(function (rs) {
						$('#tbl-ward').html(rs);
						let px = $('#ward').val();
						if(px>0 && px != undefined)
						{
							$.get('/FunCom/getStreetToTable/'+px).done(function (ps) {
								$('#tbl-street').html(ps);
							});
						}
						else{

						}
					});
				}
			}
		});
	}
});

$('#ward').change(function () {
	let id = $(this).val();
	let at = $(this).attr('tbl');

	if(id>0){
		$.ajax({
			url: '/FunCom/getStreet/'+id,
			type: 'GET',
			success: function(data){
				//alert(data);
				if(data!='0' && data!=0) {
					$('#street').html(data);
					//alert(data);
					let px = $('#ward').val();
					if(at==1)
					{
						$.get('/FunCom/getStreetToTable/' + px).done(function (ps) {
							if (ps != '') {
								$('#tbl-street').html(ps);
							}

						});
					}
				}
				else{
					//alert(11);
					$('#street').html("<option value=\"7641\">-Chọn đường-</option>");
				}
			}
		});
	}
});

$("#contact_form").submit(function (event) {
	var formData = {
		name: $("#name").val(),
		email: $("#email").val(),
		content:$("#content").val(),
		phone: $("#phone").val(),
		superheroAlias: $("#superheroAlias").val()
	};
	$('.note').text("Data 's sending ...");
	$.ajax({
		type: "POST",
		url: "/frontend/Contact/request_form",
		data: formData,
		dataType: "json",
		encode: true,
	}).done(function (data) {
		if(data==1){
			$('.note').text("Send successful");
		}
		else{
			$('.note').text(data);
		}
	});

	event.preventDefault();
});

window.mobileAndTabletCheck = function() {
	let check = false;
	(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
	return check;
};
$('.iconSave').click(function () {

	let id = $(this).attr('data-productid');
	let img = $(this).attr('data-avatar');
	let address = $(this).attr('data-address');
	let title = $(this).attr('data-title');
	let price = $(this).attr('data-price');
	let url = $(this).attr('data-url');
	let dien_tich = $(this).attr('data-area');
	let num_img = $(this).attr('data-totalmedia');
	let creator = $(this).attr('data-createbyuser');
	let cls = ($(this).attr('class'));
	let spl = cls.split(' ');
	if(id>0 && spl.length<2){
		$('.listSave .content p').remove();
		var html = $('.listSave .content').html();
		html += '<div class="item" prid="'+id+'">' +
			'<a href="'+url+'">' +
			img +
			' 	<div class="text-content">' +
			' 		<div class="title">'+title+'</div>' +
			'		<div class="time">Giá: '+price+' | '+dien_tich+'</div>'+
			'   </div>' +
			'</a>' +
			//'                                                <span class="ic_save itemUnSave" data-productid="29198427" o-id="" style="display: none; margin-top: 8.5px;"></span>' +
			'</div>';
		$('.listSave .content').html(html);
		$(this).addClass('active');
		$('.tooltipMarking.'+id).attr('aria-label','Bấm để hủy lưu tin');

		countItemSave();
		saveCookie('news_save',30);
		//$(this).removeClass('iconSave');
	}
	else{

		removeItemSave(id,this);
		countItemSave();
	}
});
function saveCookie(name, days) {
	var t = [];
	var ht = "";
	$('.listSave .content .item').each(function (index, element) {
		let id = $(this).attr('prid');
		if(t.indexOf(id)<0)
		{
			t.push(id);
			ht += element.outerHTML.toString();
			//alert(html);
		}
	});
	var expires = "";
	let value = t.toString();
	//alert(value);
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days*24*60*60*1000));
		expires = "; expires=" + date.toUTCString();
	}

	document.cookie = name + "=" + (value || "")  + expires + "; path=/";
	//document.cookie = name + "_html='" + ( ht +"'" || "'")  + expires + "; path=/";

}

function removeItemSave(pid,obj) {
	$('.listSave .content .item').each(function (index, element) {
		let id = $(this).attr('prid');
		if(pid==id){
			//alert(id);
			$(element).remove();
			$('.tooltipMarking.'+id).attr('aria-label','Bấm để lưu tin');
			$(obj).removeClass('active');
		}
	});
	let html = $('.listSave .content').html();
	saveCookie('news_save',30);
}
function countItemSave(){
	var i = 0;
	$('.listSave .content .item').each(function (index) {
		i++;
	});
	if(i>0){
		//alert(i);
		$('.mnu-notify-icon-unread').text(i);
		$('.mnu-notify-icon-unread').show();
		$('.listSave .footer').show();
	}
	else{
		$('.mnu-notify-icon-unread').text('');
		$('.mnu-notify-icon-unread').hide();
		$('.listSave .footer').hide();
	}
}
function getCookie(cname) {
	var name = cname + "=";
	var ca = document.cookie.split(';');
	for(var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}
$(document).ready(function () {
	$('.nav-item .nav-link').click(function () {
		let hm = $(this).attr('hangmuc');
		$('#hang-muc').val(hm);
	});

	function format_num(num) {
		var n = parseInt(n);
		if (n == 0) {
			return num;
		}
		return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	};
	$(".num_format").each(function () {
		var num = $(this).text().trim();
		$(this).text(format_num(num));
	});

	$(".currency_format").each(function () {
		var num = $(this).text().trim();
		$(this).text(format_num(num) + ' đ');
	});
	$("#formattedNumberField").on('keyup', function(){
		var n = parseInt($(this).val().replace(/\D/g,''),10);
		$(this).val(n.toLocaleString());
			//do something else as per updated question
			//myFunc(); //call another function too
			let re = readNumber(n.toLocaleString());
			$('#read_num').text(re);
	});

	function readNumber(num) {
		let t = num.toString().split(',');
		if(t.length==2){
			return t[0].toString() + ' nghìn đồng';
		}
		if(t.length==3){
			return  t[0].toString() + ' triệu đồng';
		}
		if(t.length==4){
			return  t[0].toString() + ' tỷ đồng';
		}
		if(t.length==5){
			return  t[0].toString() + '.'+t[1].toString() + ' tỷ đồng';
		}
	}

	$('.sold').click(function () {
		let id = $(this).attr('p-id');
		//alert(id);
		if(!isNaN(id) && id>0){
			//alert(id);
			$.post('/make-sold/'+id).done(function (data) {
				$('#dd_'+id).hide();
				$('#ac_'+id).html('<i style="color: red;">Đã bán</i>');
			});
		}
	});

});

$('#notiSave').click(function () {
	//alert(mobileAndTabletCheck());
	if(mobileAndTabletCheck()){
		location.href= '/tin-da-luu';
		return;
	}
	else
	{
		$('.listSave').show();
	}
});
$('#prd-viewmore').click(function () {
	$('.product-4-you ul li').each(function (index,element) {
		let cls = $(element).attr('class');
		if($(this).is('.hide-item')){
			$(element).removeClass('hide-item');
		}
	});
	$(this).hide();
});

$(document).mouseup(function(e)
{
	var container = $(".listSave");

	// if the target of the click isn't the container nor a descendant of the container
	if (!container.is(e.target) && container.has(e.target).length === 0)
	{
		container.hide();
	}
});
$('.filter-more').click(function () {

	$('.home-filter-2').show();
	$('.home-filter-2').removeClass('slideClose');
	$('.home-filter-2').addClass('slideOpen m-t-10');
	$(this).hide();
	$('.filter-less').show();
});

$('.filter-less').click(function () {

	$('.home-filter-1').show();
	$('.home-filter-1').removeClass('slideClose');
	$('.home-filter-1').addClass('slideOpen');
	$('.home-filter-2').hide();
	$(this).hide();
	$('.filter-more').show();
});

$('.key-search').click(function () {
$('.home-search').show();
$(this).hide();
$('.tab-content').removeClass('main_background_color');
});
/*o
(function ($) {

 "use strict";

    

		//---------------------------------------------

		//Nivo slider

		//---------------------------------------------



			$('#ensign-nivoslider-3').nivoSlider({

				effect: 'random',

				slices: 15,

				boxCols: 8,

				boxRows: 4,

				animSpeed: 500,

				pauseTime: 5000,

				startSlide: 0,

				directionNav: true,

				controlNavThumbs: true,

				pauseOnHover: true,

				manualAdvance: false

			 }); 

})(jQuery);

 */

$("#hometabs li a").click(function () {
	var t = $(this).attr("data-tab"), i;
	function r() {
		$("#" + t).tabslet({
			mouseevent: "hover",
			attribute: "data-index",
			container: $("#" + t).find(".news-show"),
			element_container: $("#" + t).find(".list-news"),
			autorotate: !0,
			delay: 4e3,
			active: 1,
			animation: !0
		})
	}


	$(this).hasClass("actived") || ($("#hometabs li a").removeClass("actived"), $(this).addClass("actived"), $(".newscontain").hide(), $("#" + t).fadeIn("slow"), t === "hometab3" ? $("#tabview").attr("href", "/loi-khuyen") : t === "hometab4" ? $("#tabview").attr("href", "/phong-thuy") : $("#tabview").attr("href", "/tin-tuc"));
	//i = t === "hometab2" ? n.getNewNewsAsHtmlUrl : t === "hometab3" ? n.getAdviceNewsAsHtmlUrl : t === "hometab4" ? n.getFengshuiNewsAsHtmlUrl : "";
	i ? u(i).then(function (n) {
		$(`#${t}`).html(n)
	}).then(r) : r()
});
	//
	// $("#hometab1").tabslet({
	// 	mouseevent: "hover",
	// 	attribute: "data-index",
	// 	container: $("#hometab1").find(".news-show"),
	// 	element_container: $("#hometab1").find(".list-news"),
	// 	autorotate: !0,
	// 	delay: 4e3,
	// 	active: 1,
	// 	animation: !0
	// });

$('.classycloseIcon').click(function (e) {
	console.log('close');
	 $('.classy-menu').removeClass('menu-on');
	$('.navbarToggler').removeClass('active');
});

$('.classy-navbar-toggler').click(function (e) {
	console.log('showmenu');
	 $('.classy-menu').addClass('menu-on');
	 $('.navbarToggler').addClass('active');
});


