<h3><?php echo $title_action ?> Sản phẩm</h3>
<a href="/backend/Product_manage/update" class="pull-right btn btn-info">Thêm mới</a>
<hr>
<div>
    <form action="" method="post" enctype="multipart/form-data">
		<ul class="nav nav-tabs" role="tablist">
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
					<div class="col-sm-8">
						<label>Tên sản phẩm</label>
						<input type="text" name='name' class='input-lg form-control' value="<?php echo $item->name ?>" /><br>
						<input type="text" name='meta_title' class='form-control' value="<?php echo $item->meta_title ?>" placeholder="Meta title SEO" /><br>
						<input placeholder="Slug (Không điền sẽ tự động sinh)" class="form-control" name="slug" value="<?php echo $item->slug; ?>">
					</div>
					<div class="col-sm-4">
						<label>Danh mục</label>
						<select name="cate_id" class="form-control">
							<?php echo $category_options; ?>
						</select>
						<br/>
						<label>Hạng mục</label>
						<?php
						$opts = array();
						foreach (Product_model::$_hang_muc as $key=>$val){
							$opts[$key]=$val['vi'];
						}
						echo form_dropdown('hang_muc',$opts,$item->hang_muc,'class="form-control"') ?>
						<br/>
						<label>Diện tích</label>
						<input type="number" name="dien_tich" class="form-control" value="<?php echo $item->dien_tich; ?>" required> m2
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class='form-group'>
							<label>Giá</label>
							<!--                    <input id='price' type="number" class='form-control tag_input' name='price' />-->
							<input id='price' type="text" class='form-control' name='price' value="<?php echo $item->price; ?>" required />
						</div>
						<div class='form-group'>
							<label>Giá text</label>
							<!--                    <input id='price' type="number" class='form-control tag_input' name='price' />-->
							<input id='price_short' type="text" class='form-control' name='price_short' value="<?php echo $item->price_short; ?>" required />
						</div>

					</div>
					<div class="col-sm-3 col-lg-3">
						<div class='form-group'>
							<label>Hướng</label>
							<?php echo form_dropdown('huong',Product_model::$_huong,$item->huong,'class="form-control"'); ?>

						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class='form-group'>
							<label>Số phòng</label>
							<?php echo form_dropdown('so_phong',Product_model::$_so_phong,$item->so_phong,'class="form-control"'); ?>

						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class='form-group'>
							<label>Số WC</label>
							<?php echo form_dropdown('so_wc',Product_model::$_so_wc,$item->so_phong,'class="form-control"'); ?>

						</div>
					</div>
				</div>

				<div class='clearfix form-group row'>
					<div class="col-sm-6">
						<label>Hình đại diện</label>
						<div class="thumb-images"></div>
						<div class="input-group form-group">
							<!--                    <input id="inp_thumb" type="text" name="thumb" class="input-lg form-control" placeholder="Link hình hoặc tải lên... size-max: 1366x768" value='--><?php //echo $item->thumb ?><!--' />-->
							<!--					<span class="input-group-btn ">-->
							<!--						<a href='/filemanager/dialog.php?type=1&akey=f970ce5bc016b5c5ca08e2e39c2cc937&field_id=inp_thumb&fldr=/--><?php //echo date('Ym') ?><!--' class="btn btn-lg btn-default iframe-btn" type="button"><i class="fa fa-upload"></i> Browse</a>-->
							<!--					</span>-->
						</div>




					</div>

					<div class="col-sm-6">
						<label>Preview</label>
						<div>
							<img id="preview_thumb" style="width:100%; height: 252px" src="<?php echo $item->thumb; ?>" alt="Hình đại diện" />
						</div>
					</div>


					<div class="col-sm-3 col-lg-3">
						<div class="form-group">
							<label>Tỉnh thành</label>
							<?php echo $drop_province; ?>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="form-group">
							<label>Quận huyện</label>
							<?php echo $drop_district; ?>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="form-group">
							<label>Phường xã</label>
							<?php echo $drop_ward; ?>
						</div>
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class="form-group">
							<label>Đường</label>
							<?php echo $drop_street; ?>
						</div>
					</div>
					<div class="clear-box">

						<div class="col-sm-4 col-lg-4">
							<p>
								<label>Mô tả ngắn</label> <span id="short_description_length" ></span>
								<textarea style="height: 100px" name="description" id="short_description" cols="3" rows="12" class='form-control ' max-length="2024"><?php echo $item->description; ?></textarea>
							</p>
							<!--                <p>-->
							<!--                    <label>Meta Keyword</label> <span id="meta_keywords_length" ></span>-->
							<!--                    <textarea style="height: 100px" name="meta_keywords" id="meta_keywords" cols="3" rows="12" class='form-control' max-length="512">--><?php //echo $item->meta_keywords?><!--</textarea>-->
							<!--                </p>-->
							<!--                <p>-->
							<!--                    <label>Meta Description</label> <span id="meta_description_length" ></span>-->
							<!--                    <textarea style="height: 100px" name="meta_description" id="meta_description" cols="3" rows="12" class='form-control' max-length="512">--><?php //echo $item->meta_description?><!--</textarea>-->
							<!--                </p>-->
						</div>
						<div class="col-sm-4 col-lg-4">
							<p>
								<label>Meta description (SEO)</label> <span id="meta-description" ></span>
								<textarea style="height: 100px" name="meta_description" id="meta_description" cols="3" rows="12" class='form-control '><?php echo $item->meta_description; ?></textarea>
							</p>
						</div>
						<div class="col-lg-4 col-sm-4">
							<p>
								<label>Meta keywords (SEO)</label>
								<input type="text" name="meta_keywords" class="tag_input form-control" value="<?php echo $item->meta_keywords; ?>">
							</p>
						</div>
					</div>
				</div>


				<div class='clearfix form-group'>
					<label>Nội dung</label>
					<textarea name="content" id="body_content" cols="30" rows="10" class='tinymce form-control'><?php echo $item->content; ?></textarea>
				</div>
				<div class="form-group">
					<label>Hình trong nội dung</label>
					<div class="list-images"></div>

					<div class="input-group form-group">
						<!--				<input id="inp_img" type="text" name="images" class="input-lg form-control" placeholder="Link hình hoặc tải lên..."/>-->
						<!--				<span class="input-group-btn ">-->
						<!--						<a href='/filemanager/dialog.php?type=1&akey=f970ce5bc016b5c5ca08e2e39c2cc937&field_id=inp_img&fldr=/--><?php //echo date('Ym') ?><!--' class="btn btn-lg btn-default iframe-btn" type="button"><i class="fa fa-upload"></i> Browse</a>-->
						<!--					</span>-->
					</div>
					<div>
						<?php
						if(!empty($imgs)){
							foreach ($imgs as $img){
								echo "<div style='display: inline-block;width: 160px;margin: 10px;' id='item-$img->id'>
<span><img src='$img->img_url' style='width: 150px;display: block;object-fit: cover' /></span><span><input type='button' data-link='/backend/Product_manage/del_img/$img->id' class='del btn btn-warning' value='Xóa'></span>
</div>";
							}
						}
						?>
					</div>
				</div>
				<div class="form-group">
					<label>Tiện ích</label>
					<div>
						<?php
						$ti = array();
						if(!empty($item->tien_ich)){
							$ti = explode(";",$item->tien_ich);
						}
						foreach (Product_model::$_tien_ich as $key=>$val){
							if(count($ti>0)){
								if(in_array($key,$ti)){
									echo "<input type='checkbox'id='$key'  checked name='tien_ich[]' value='$key' /> <label for='$key'>{$val['vi']}</label><br/>";
								}
								else
									echo "<input type='checkbox'id='$key' name='tien_ich[]' value='$key' /> <label for='$key'>{$val['vi']}</label><br/>";
							}
						}
						?>
					</div>
				</div>
			</div>
			<div role="tabpanel" class="tab-pane fade" id="buzz" desc="TiengAnh">
				<div class="clearfix row form-group">
					<div class="col-sm-8">
						<label>Tên sản phẩm</label>
						<input type="text" name='name_en' class='input-lg form-control' value="<?php echo $item->name_en ?>" /><br>
						<input type="text" name='meta_title_en' class='form-control' value="<?php echo $item->meta_title_en; ?>" placeholder="Meta title SEO" /><br>
						<input placeholder="Slug (Không điền sẽ tự động sinh)" class="form-control" name="slug_en" value="<?php echo $item->slug_en; ?>">
					</div>
					<div class="col-sm-3 col-lg-3">
						<div class='form-group'>
							<label>Giá text</label>
							<!--                    <input id='price' type="number" class='form-control tag_input' name='price' />-->
							<input id='price_short' type="text" class='form-control' name='price_short_en' value="<?php echo $item->price_short_en; ?>" required />
						</div>

					</div>

				</div>
				<div class="clear-box form-group">

					<div class="col-sm-6 col-lg-6">
						<p>
							<label>Mô tả ngắn</label> <span id="short_description_length" ></span>
							<textarea style="height: 100px" name="description_en" id="short_description" cols="3" rows="12" class='form-control ' max-length="2024"><?php echo $item->description_en; ?></textarea>
						</p>
					</div>
					<div class="col-sm-6 col-lg-6">
						<p>
							<label>Meta description (SEO)</label> <span id="meta-description" ></span>
							<textarea style="height: 100px" name="meta_description_en" id="meta_description_en" cols="3" rows="12" class='form-control '><?php echo $item->meta_description_en; ?></textarea>
						</p>
					</div>
				</div>
				<div class='clearfix form-group'>
					<label>Nội dung</label>
					<textarea name="content_en" id="body_content" cols="30" rows="10" class='tinymce form-control'><?php echo $item->content_en; ?></textarea>
				</div>
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
    $(document).ready(function(){
        $("#meta_decscription").keydown(function(e){
            var $len = $("#meta_description_length");
            var v = 160 - this.value.length;
            if(v<0 && e.keyCode != 8 && e.keyCode != 46){
                e.preventDefault();
                return false;
            }
            $len.html(v);
        });

        $("#preview_thumb").click(function(){
            $("#inp_thumb").trigger('blur');
        });

        $("#inp_thumb").blur(function(){
            var link = this.value;
            $("#preview_thumb").attr('src', link);
        }).trigger('blur');

        $("#preview_banner").click(function(){
            $("#banner_thumb").trigger('blur');
        });

        $("#banner_thumb").blur(function(){
            var link = this.value;
            $("#preview_banner").attr('src', link);
        }).trigger('blur');

        $('.tag_input').tagsInput({width: '100%', delimiter: ',', height: 'auto'});

        let preloaded = [];
		$('.list-images').imageUploader(
			{
				preloaded: preloaded,
				imagesInputName: 'photos',
			}
		);
		$('.thumb-images').imageUploader({
			imagesInputName: 'thumb',
		});
    });
</script>
