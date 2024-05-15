<div>
    <form action="" method="post">
        <div class="clearfix row form-group">
            <div class="col-sm-6">
                <label>Tên Dối tác</label>
                <input type="text" name='TenPartner' class='form-control' value='<?php echo isset($item->TenPartner) ? $item->TenPartner : '' ?>' />
            </div>
            <div class="col-sm-6">
                <label>Hình ảnh (logo)</label>
                <div class="input-group form-group">
                    <input id="inp_thumb" type="text" name="imgUrl" class="form-control" placeholder="Link hình hoặc tải lên... size-max: 1366x768" value='<?php echo $item->imgUrl ?>' />
                    <span class="input-group-btn ">
						<a href='/filemanager/dialog.php?type=1&akey=f970ce5bc016b5c5ca08e2e39c2cc937&field_id=inp_thumb&fldr=category_img/<?php echo date('Ym') ?>' class="btn btn-default iframe-btn" type="button"><i class="fa fa-upload"></i> Browse</a>
					</span>
                </div>
            </div>

        </div>

        <div class="clearfix row form-group">
            <div class="col-sm-9">
                <label>Mô tả</label>
                <input type="text" multiple="multiple" name='Mota' class='form-control' value='<?php echo $item->Mota; ?>'  />
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