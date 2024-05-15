<style>
	.select2-container ul>li{
		width: 100% ; color: #000 !important;  padding: 3px 5px !important;
	}
</style>

<div>
	<?php echo form_open(); ?>
	<ul class="nav nav-tabs" role="tablist" style="display: none;">
		<li class="nav-item">
			<a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Tiếng Việt</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Tiếng Anh</a>
		</li>
	</ul>
<br/>
	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="profile">
			<div class="clearfix row form-group">
				<div class="col-sm-4">
					<label>Tên danh mục <small class="text-danger">*</small></label>
					<input type="text" name='name' class='form-control' value='<?php echo $item->name ?>' />
				</div>
				<div class="col-sm-4">
					<label>Danh mục cha</label>
					<?php echo $category_select ?>
				</div>
				<div class="col-sm-2">
					<label>Loại mục</label>
					<?php
					echo $types;
					?>
				</div>
				<div class="col-sm-2">
					<label>Hiện thị ở body Trang chủ</label>
					<?php
					echo $show_home;
					?>
				</div>
			</div>

			<div class="clearfix row form-group">
				<div class="col-sm-5">
					<label>Tiêu đề trang</label>
					<input type="text" name='meta_title' class='form-control' value='<?php echo $item->meta_title ?>' placeholder="Để trống nếu dùng như tên danh mục" />
				</div>
				<div class="col-sm-5">
					<label>Hình đại diện</label>
					<div class="input-group form-group">
						<input id="inp_thumb" type="text" name="url_thumb" class="form-control" placeholder="Link hình hoặc tải lên... size-max: 1366x768" value='<?php echo $item->url_thumb ?>' />
						<span class="input-group-btn ">
						<a href='/filemanager/dialog.php?type=1&akey=f970ce5bc016b5c5ca08e2e39c2cc937&field_id=inp_thumb&fldr=category_img/<?php echo date('Ym') ?>' class="btn btn-default iframe-btn" type="button"><i class="fa fa-upload"></i> Browse</a>
					</span>
					</div>
				</div>
				<div class="col-sm-2">
					<label>Thứ tự hiển thị</label>
					<input type="number" class="form-control" name="sort_order" placeholder="1" value="<?php echo $item->sort_order; ?>" />
				</div>
			</div>


			<div class='clearfix form-group'>
				<div>
					<label>Mô tả ngắn (Meta description SEO)</label>
					<textarea name="meta_description" id="meta_decscription" cols="30" rows="12" class='form-control' max-length="512"><?php echo $item->meta_description ?></textarea>
				</div>
			</div>

			<div class='clearfix form-group'>
				<div>
					<label>Nội dung</label>
					<textarea name="content" id="decscription" cols="30" rows="20" class='tinymce form-control'><?php echo $item->content; ?></textarea>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="buzz" desc="TiengAnh">

			<div class="clearfix row form-group">
				<div class="col-sm-6">
					<label>Tên danh mục <small class="text-danger">*</small></label>
					<input type="text" name='name_en' class='form-control' value='<?php echo $item->name_en ?>' />
				</div>
			</div>

			<div class="clearfix row form-group">
				<div class="col-sm-5">
					<label>Tiêu đề trang (Meta Title SEO)</label>
					<input type="text" name='meta_title_en' class='form-control' value='<?php echo $item->meta_title_en ?>' placeholder="Để trống nếu dùng như tên danh mục" />
				</div>
			</div>


			<div class='clearfix form-group'>
				<div>
					<label>Mô tả ngắn (Meta description SEO)</label>
					<textarea name="meta_description_en" id="meta_decscription" cols="30" rows="12" class='form-control' max-length="512"><?php echo $item->meta_description_en ?></textarea>
				</div>
			</div>

			<div class='clearfix form-group'>
				<div>
					<label>Nội dung</label>
					<textarea name="content_en" id="decscription" cols="30" rows="20" class='tinymce form-control'><?php echo $item->content_en; ?></textarea>
				</div>
			</div>
		</div>
	</div>
	<div class='clearfix'>
		<ul class='list-inline'>
			<li><a href="<?php echo $base_link. '?type='. $cate_type ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Quay lại</a></li>
			<li><button type='submit' class='btn btn-primary'><?php echo $title_action ?></button></li>
			<li><?php echo $msg ?></li>
		</ul>
	</div>
	<?php echo form_close(); ?>
</div>


<script>
	$(document).ready(function(){
	    $("#category_id").val(<?php echo $item->parent_id ?>);
	});
</script>
