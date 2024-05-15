<h3><?php echo $title_action ?> Bài viết</h3>
<hr>
<div>
	<?php echo form_open_multipart(); ?>
	<ul class="nav nav-tabs" role="tablist" style="display: none;">
		<li class="nav-item">
			<a class="nav-link active" href="#profile" role="tab" data-toggle="tab">Tiếng việt</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="#buzz" role="tab" data-toggle="tab">Tiếng Anh</a>
		</li>
	</ul>

	<!-- Tab panes -->
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane fade in active" id="profile">
			<div class="clearfix row form-group">
				<div class="col-sm-8">
					<label>Tiêu đề</label>
					<input type="text" name='title' class='input-lg form-control' value="<?php echo $item->title ?>" /><br />
					<input type="text" name='meta_title' class='input-lg form-control' value="<?php echo $item->meta_title ?>" placeholder="Meta title SEO" />
				</div>
				<div class="col-sm-4">
					<label>Danh mục</label>
					<select name="category_id" id="category_id" class='form-control input-lg'>
						<option value="0">-- Tất cả --</option>
						<?php echo $category_options ?>
					</select>
				</div>
			</div>

			<div class='clearfix form-group row'>
				<div class="col-sm-6">
					<label>Hình đại diện</label>

					<div class="input-group form-group">
						<input id="inp_thumb" type="text" name="thumb" class="input-lg form-control" placeholder="Link hình hoặc tải lên... size-max: 1366x768" value='<?php echo $item->thumb ?>' />
						<span class="input-group-btn ">
							<a href='/filemanager/dialog.php?type=1&akey=f970ce5bc016b5c5ca08e2e39c2cc937&field_id=inp_thumb' class="btn btn-lg btn-default iframe-btn" type="button"><i class="fa fa-upload"></i> Browse</a>
						</span>
					</div>
				</div>

				<div class="col-sm-6">
					<label>Preview</label>
					<div>
						<img id="preview_thumb" style="width:100%; height: 252px" src="" alt="Hình đại diện" />
					</div>
				</div>

				<!--            <div class="col-sm-6 form-group">-->
				<!--                <label>Preview banner</label>-->
				<!--                <div>-->
				<!--                    <img id="preview_banner" style="width:100%; height: 252px" src="" alt="Hình đại diện" />-->
				<!--                </div>-->
				<!--            </div>-->
				<div class="col-sm-6 form-group">
					<div class='form-group'>
						<label>Tags (Keywords)</label>
						<input id='inp_tag' type="text" class='form-control tag_input' name='tags' />
					</div>


				</div>

				<div class="col-sm-6">
					<p>
						<label>Mô tả ngắn (Meta description)</label> <span id="short_description_length"></span>
						<textarea style="height: 100px" name="short_description" id="short_description" cols="3" rows="12" class='form-control ' max-length="1024"><?php echo $item->short_description ?></textarea>
					</p>
				</div>

			</div>


			<div class='clearfix form-group'>
				<label>Nội dung</label>
				<textarea name="body" id="body_content" cols="30" rows="10" class='tinymce form-control'><?php echo $item->body ?></textarea>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane fade" id="buzz">
			<div class="clearfix row form-group">
				<div class="col-sm-12">
					<label>Tiêu đề</label>
					<input type="text" name='title_en' class='input-lg form-control' value="<?php echo $item->title_en ?>" /><br />
					<input type="text" name='meta_title_en' class='input-lg form-control' value="<?php echo $item->meta_title_en ?>" placeholder="Meta title SEO" />
				</div>

			</div>

			<div class='clearfix form-group row'>
				<div class="col-sm-12">
					<p>
						<label>Mô tả ngắn (Meta description)</label> <span id="short_description_length"></span>
						<textarea style="height: 100px" name="meta_description_en" id="short_description" cols="3" rows="12" class='form-control ' max-length="1024"><?php echo $item->meta_description_en ?></textarea>
					</p>
				</div>

			</div>


			<div class='clearfix form-group'>
				<label>Nội dung</label>
				<textarea name="body_en" id="body_content" cols="30" rows="10" class='tinymce form-control'><?php echo $item->body_en ?></textarea>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<label>Upload file Văn Bản (nếu có)</label>
				<!--					<input type="file" name="files" multiple class="form-control">-->
				<div class="list-files"></div>
				<?php
				if (isset($files) && count($files) > 0) {
					echo "<h3>Danh sách các file đã đính kèm</h3>";
					foreach ($files as $file) {

						echo "<div style='display: inline-block;width: 260px;margin: 10px;' id='item-$file->id'>
<span style='display: inline-block' ><i style='float: left;margin-right: 20px;' class='fa fa-file'></i><a href='$file->meta_link' target='_blank' style='width: 150px;display: block;object-fit: cover'>$file->file_name</a></span><span style='display: inline-block'><input type='button' data-link='/backend/Blog_manage/del_file/$file->id' class='del btn btn-warning' value='Xóa'></span>
</div>";
					}
				}
				?>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="form-group">
			<label for="news_update">Là bài News update</label>
			<span style="float: left;margin: 0 5px;display: block;"><input type="checkbox" name="news_update" class="checkbox" id="news_update" value="1" <?php if ($item->news_update == true) echo "checked" ?> />
			</span>
		</div>
	</div>
	<div class='clearfix'>
		<ul class='list-inline'>
			<li><a href="<?php echo $base_link ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Quay lại</a></li>
			<li><button type='submit' class='btn btn-primary'><?php echo $title_action ?></button></li>
			<li><?php echo $msg ?></li>
		</ul>
	</div>
	</form>
</div>

<link rel="stylesheet" href="/assets/jquery/jquery.tagsinput.min.css">



<script src="/assets/jquery/jquery.tagsinput.min.js"></script>

<script>
	$(document).ready(function() {
		$('.list-files').imageUploader({
			imagesInputName: 'files',
		});
		$("#category_id").val(<?php echo $item->category_id ?>);



		$("#meta_decscription").keydown(function(e) {
			var $len = $("#meta_description_length");
			var v = 160 - this.value.length;
			if (v < 0 && e.keyCode != 8 && e.keyCode != 46) {
				e.preventDefault();
				return false;
			}
			$len.html(v);
		});

		$("#preview_thumb").click(function() {
			$("#inp_thumb").trigger('blur');
		});

		$("#inp_thumb").blur(function() {
			var link = this.value;
			$("#preview_thumb").attr('src', link);
		}).trigger('blur');

		$("#preview_banner").click(function() {
			$("#banner_thumb").trigger('blur');
		});

		$("#banner_thumb").blur(function() {
			var link = this.value;
			$("#preview_banner").attr('src', link);
		}).trigger('blur');

		$('.tag_input').tagsInput({
			width: '100%',
			delimiter: ',',
			height: 'auto'
		});


		$('#inp_tag').importTags('<?php echo $item->tags ?>');


	});
</script>