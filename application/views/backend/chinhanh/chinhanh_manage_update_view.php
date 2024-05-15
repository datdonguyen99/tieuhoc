<div>
    <form action="" method="post">
        <div class="clearfix row form-group">
            <div class="col-sm-6">
                <label>Tên chi nhánh</label>
                <input type="text" name='TenChiNhanh' class='form-control' value='<?php echo isset($item->TenChiNhanh) ? $item->TenChiNhanh : '' ?>' />
            </div>
            <div class="col-sm-6">
                <label>Địa chỉ</label>
                <input type="text" name="DiaChi" class="form-control" value="<?php echo $item->DiaChi ? $item->DiaChi:""; ?>" />
            </div>

        </div>

        <div class="clearfix row form-group">
            <div class="col-sm-9">
                <label>Số điện thoại</label>
                <input type="text" name='SoDT' class='form-control' value='<?php echo $item->SoDT; ?>'  />
            </div>
            <div class="col-sm-3">
                <label>Thứ tự</label>
                <input type="number" min="0" max="100" name='SoTT' class='form-control' value='<?php echo $item->SoTT ?>'  />
            </div>
        </div>


        <div class='clearfix'>
            <ul class='list-inline'>
                <li><a href="<?php echo $base_link ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</a></li>
                <li><button type='submit' name="btn-save" class='btn btn-primary'><?php echo $btn_submit ?></button></li>
                <li><button type='submit' name="btn-save-back" class='btn btn-default'>Save & Back</button></li>

                <li><?php echo $msg ?></li>
            </ul>
        </div>

    </form>
    <hr>

</div>

<script>
    jQuery(document).ready(function($) {
        $("#inp_thumb").change(function(event) {
            $("#img_preview").attr('src', $(this).val());
        });
    });
</script>