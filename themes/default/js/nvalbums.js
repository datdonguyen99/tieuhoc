/* *
 * @Project NUKEVIET 3.1
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2011 VINADES.,JSC. All rights reserved
 * @Createdate 18-05-2011 20:50
 */

function nv_update_picture_views(id, module) {
    if (id > 0) {
        $.post(
        nv_base_siteurl + 'index.php?' + nv_lang_variable + '=' + nv_lang_data + '&' + nv_name_variable + '=' + module + '&nocache=' + new Date().getTime(),
        'updatepicview=1&id=' + id + '&num=' + nv_randomPassword(8), function(res) {
            res = res.split('|');
            $('[data-toggle="viewed' + id + '"]').html(res[1]);
        });
    }
}

$(document).ready(function() {
    $('[rel="modalimg"]').click(function(e) {
        e.preventDefault();
        var a, b;

        a = $(this).attr('title');
        b = '<img src="' + $(this).attr('href') + '" style="width:100%">';
        modalShow(a, b);
    });
});
