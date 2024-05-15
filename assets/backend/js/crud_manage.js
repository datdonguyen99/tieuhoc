jQuery(document).ready(function($) {
    //Delete

    $("a.delete").click(function(e){
        e.preventDefault(); 
        if (!confirm('Bạn có chắc chắc muốn xóa?'))
        {
          return false;
        }


        var href = $(this).attr('href');
        var that = $(this);

        $.post(href, {data: 1}, function(res){
          if (res == 1){
            that.parents('tr').remove();  
          }

          

        },'json');
        location.reload(true);
        return false;
      });


    $('.btn_browse_file').fancybox({
        minHeight: 590,
        width     : 1200,
        type      : 'iframe',
        autoScale : true
    });

    

    $('.iframe-btn').fancybox({
        minHeight: 590,
        width     : 1200,
        type      : 'iframe',
        autoScale : true
    });


    $('.btn_browse_file').each(function(){
        var target = $(this).attr('data-target');
        var href = '/filemanager/dialog.php?type=1&akey=f970ce5bc016b5c5ca08e2e39c2cc937&field_id='  + target;
        $(this).attr('href', href);        
    });



    //Init textarea   

    var today = new Date();
    var postimg = 'postimg/' + today.getFullYear() + '' + (today.getMonth()+1);

    var tinymce = tinyMCE.init({
      selector: 'textarea.tinymce',
      height: 300,
      entity_encoding : "raw",
      relative_urls: false,

      inline_styles : true, image_advtab: true ,
      plugins: [
      'advlist autolink lists link image charmap print preview anchor',
      'searchreplace visualblocks code fullscreen',
      'insertdatetime media table contextmenu paste code colorpicker textcolor responsivefilemanager'
      ],
      toolbar: 'insertfile undo redo | styleselect | bold italic | forecolor | backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table | link  image fullscreen',
      content_css: [      
       //'/assets/plugins/tinymce/skins/lightgray/style.css'
      ],

      external_filemanager_path: "/filemanager/",
      filemanager_title:"Browse file" ,
      external_plugins: { "filemanager" : "/filemanager/plugin.min.js"},
      filemanager_access_key: 'f970ce5bc016b5c5ca08e2e39c2cc937&foldr=',

    });

    $(".money_format").each(function(index, el) {
    	    	
    	var f = formatCurrency(el.innerText);
    	el.innerText = f;
    	
    });


    function formatCurrency(num, c, d, t)
    {	
    	var c = c || 0, t = t || ',', d = d || '.', ser = (c == 0) ? 2: c,
    	s = Number(num).toFixed(ser).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');

    	if (c == 0)
    	{
    		s = s.substr(0, s.length - 3);
    	}

    	if (d != '.')
    	{
    		s = s.replace('.', 'x').replace('x', d);
    	}
    	if ( t != ',')
    	{
    		s = s.replace(/,/g, 'y').replace(/y/g, t);
    	}	

    	return s;
    }

    /*Menu*/

    (function(){
    	var url = window.location.pathname;
    	if (url == ''){
    		url = '/backend/order_manage';
    	}
    	$(".sidebar-menu li a").each(function(index, el) {
    		var href = $(this).attr('href');
    		if (url.indexOf(href)>=0)
    		{
    			$(this).parent('li').addClass('active');
    			$(this).parents('li.treeview').addClass('active');
    		}
    	});
    })();

    $('.del').click(function (e) {
		let link = $(this).attr('data-link');
		if(link != '' && link != undefined){
			if (!confirm('Bạn có chắc chắc muốn xóa?'))
			{
				return false;
			}

			$.ajax({
				type: 'GET',
				url: link,

			}).done(function (data) {
				if(data != ''){
					$("#item-"+data).hide();

					//alert(data);
				}
			});
		}
    	//e.preventDefault();
	});

});
