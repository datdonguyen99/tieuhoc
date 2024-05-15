<div>
	<form action="" method="post">
		<div class="clearfix row form-group">
			<div class="col-sm-2">
				<label>Loại</label>
				<?php echo $types; ?>
			</div>
			<div class="col-sm-5">
				<label>Tiêu đề</label>
				<input type="text" name='name' class='form-control' value='<?php echo $item->name ? $item->name : '' ?>' />
			</div>
			<div class="col-sm-5">
				<label>Hình ảnh</label>
				<div class="input-group form-group">
					<input id="inp_thumb" type="text" name="thumb" class="form-control" placeholder="Link hình hoặc tải lên... size-max: 1280x500" value='<?php echo $item->thumb ?>' />
					<span class="input-group-btn ">
						<a href='/filemanager/dialog.php?type=1&akey=f970ce5bc016b5c5ca08e2e39c2cc937&field_id=inp_thumb&fldr=category_img/<?php echo date('Ym') ?>' class="btn btn-default iframe-btn" type="button"><i class="fa fa-upload"></i> Browse</a>
					</span>
				</div>
			</div>

		</div>

		<div class="clearfix row form-group">
			<div class="col-sm-2">
				<label>Mã màu nền</label>
				<input type="text" name="background" class="form-control" placeholder="#FF43CE (không có cứ bỏ trống)">
			</div>
			<div class="col-sm-8">
				<label>Liên kết</label>
				<input type="text" name='link' class='form-control' placeholder="Không có cứ để trống" value='<?php echo $item->link ?>'  />
			</div>
			<div class="col-sm-2">
				<label>Thứ tự</label>
				<input type="number" min="0" max="100" name='sort_order' class='form-control' value='<?php echo $item->sort_order ?>'  />
			</div>
		</div>
		<div class="clearfix row form-group">
			<div class="col-sm-12">
				<label>Mô tả</label>
				<input type="text" placeholder="Dạng hiển thị chú thích nhỏ dưới Tiêu đề (không có cứ để trống)" class="form-control" name="description" value="<?php echo $item->description; ?>">
			</div>
		</div>
        <Div class="clearfix">
            <h5>Chú thích: <span style="color: red">Các ảnh làm banner/slider phải có kích thước giống nhau(vd: cùng là 1280x500)</span></h5>

        </Div>
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
	<div class="text-center">
		<img id="img_preview" src="<?php echo $item->thumb ?>" class="image-reponsive" />
	</div>
</div>

<script>
	jQuery(document).ready(function($) {
		$("#inp_thumb").change(function(event) {
			$("#img_preview").attr('src', $(this).val());
		});
	});
</script>
