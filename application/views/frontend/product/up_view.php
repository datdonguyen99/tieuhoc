<style>
	.hinh-up ul li{display: inline-block;list-style-type: none;margin: 5px;max-width: 250px;}
</style>
<div class="container main bs-docs-container">
	<div class="row" role="main">
		<div class="container">
			<div class="card panel panel-default formPanel">
				<?php echo isset($msg)?$msg:''; ?>
				<div class="bg-primary border-color-2 panel-heading card-header">
					<h3 class="text-center panel-title card-title" style="font-size: 20px;">ĐĂNG SẢN PHẨM</h3>
				</div>
				<div class="panel-body card-body">

					<div class="col-lg-12">
						<p style="margin: 5px 0 5px 0" class="text-danger">(*) Bắt buộc phải điền</p>
						<?php echo form_open('','role="form" class="formlogin2" id="upTin" enctype="multipart/form-data"');?>
						<div class="hinh-up" style="margin-bottom: 30px;display: inline-block">
							<label>Hình ảnh sản phẩm (tối đa 8 hình) (*)</label>
							<ul>
								<li><label>Hình 01:</label><input type="file" name="files[]" id="pos1" class="files" pos="1" /></li>
								<li><label>Hình 02:</label><input type="file" name="files[]" id="pos2" class="files" pos="2" /></li>
								<li><label>Hình 03:</label><input type="file" name="files[]" id="pos3" class="files" pos="3" /></li>
								<li><label>Hình 04:</label><input type="file" name="files[]" id="pos4" class="files" pos="4" /></li>
								<li><label>Hình 05:</label><input type="file" name="files[]" id="pos5" class="files" pos="5" /></li>
								<li><label>Hình 06:</label><input type="file" name="files[]" id="pos6" class="files" pos="6" /></li>
								<li><label>Hình 07:</label><input type="file" name="files[]" id="pos7" class="files" pos="7" /></li>
								<li><label>Hình 08:</label><input type="file" name="files[]" id="pos8" class="files" pos="8" /></li>
							</ul>
							<div id="uploaded_images">
								<div class="img-item"></div>
							</div>
						</div>

						<input type="hidden" name="id" value="<?php if(isset($edit)) echo $edit->id; ?>"/>
						<div>
							<div class="col-lg-10 col-sm-6 fl">
								<div class="form-group formField">
									<label>Tên sản phẩm (*)</label>
									<input type="text" class="form-control" name="name" id="name" placeholder="Tên sản phẩm ..." required value="<?php if(isset($edit)) echo $edit->name; ?>" />
								</div>
							</div>
							<div class="col-lg-2 col-sm-2 fl">
								<div class="form-group formField">
									<label>Hướng</label>
									<?php echo form_dropdown('huong',Product_model::$_huong,isset($edit)&&!empty($edit)?$edit->huong:'','class="form-control"'); ?>

									</div>
							</div>
						</div>
						<div>

							<div>
								<div class="col-lg-3 fl">
									<div class="form-group formField">
										<label>Giá (*)</label><span style="font-size: 12px;margin-left: 5px;color: red;" id="read_num"></span>
										<input type="text" class="form-control" name="price" id="formattedNumberField" placeholder="để 0 nếu muốn giữ giá bí mật" value="<?php if(isset($edit)) echo $edit->price; ?>" required />

									</div>
								</div>
								<div class="col-lg-3 fl">
									<div class="form-group formField">
										<label>Diện tích (m2)</label>
										<input type="number" class="form-control" name="dien_tich" id="dientich" placeholder="Diện tích (chỉ điền số)" value="<?php if(isset($edit)) echo $edit->dien_tich; ?>" />
									</div>
								</div>
								<div class="col-lg-3 fl">
									<div class="form-group formField">
										<label>Loại nhà đất (*)</label>
										<?php echo $loai_nha_dat; ?>
									</div>
								</div>
								<div class="col-lg-3 fl">
									<div class="form-group formField">
										<label>Loại hình (*)</label>
										<select name="hang_muc" class="form-control">
											<option value="ban">Bán</option>
											<option value="cho-thue">Cho thuê</option>
										</select>
									</div>
								</div>
							</div>
							<div>
								<div class="col-lg-3 fl">
									<div class="form-group formField">
										<label>Tỉnh thành</label>
										<?php echo $drop_province; ?>
									</div>
								</div>
								<div class="col-lg-3 fl">
									<div class="form-group">
										<label>Quận huyện</label>
										<?php echo $drop_district; ?>
									</div>
								</div>
								<div class="col-lg-3 fl">
									<div class="form-group">
										<label>Phường xã</label>
										<?php echo $drop_ward; ?>
									</div>
								</div>
								<div class="col-lg-3 fl">
									<div class="form-group">
										<label>Đường</label>
										<?php echo $drop_street; ?>
									</div>
								</div>
							</div>

							<div class="">
								<div class="form-group formField">
									<label>Nội dung sản phẩm (*)</label>
									<textarea style="height: 500px;width: 100%;display: inline-block;" rows="15" class="content" name="content" id="content" placeholder="Nội dung sản phẩm" required><?php if(isset($edit)) echo $edit->description; ?></textarea>
								</div>
							</div>
							<input type="submit" name="btn_send" class="center-block text-center btn btn-warning " value="    Đăng tin    " />

							<?php echo form_close(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

		<script src="/assets/js/bootstrap.min.js"></script>
		<script>
			function del_img(id){

				let src = id;

				if(src!='' && src!=undefined){
					$('#'+src).remove();
					let p = $('#'+src+'d').attr('pos');
					$('#pos'+p).val('');
					$('#'+src+'d').remove();
					// $.ajax({
					// 	url:"/frontend/Post/delete_image/"+src, //base_url() return http://localhost/tutorial/codeigniter/
					// 	type:"POST",
					// 	data:src,
					// 	contentType:false,
					// 	cache:false,
					// 	processData:false,
					// 	beforeSend:function()
					// 	{
					// 		//$('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
					// 	},
					// 	success:function(data)
					// 	{
					// 		$('#'+data).hide();
					// 		//$('#files').val('');
					// 	}
					// })
				}
			}
			$('a.del_img').click(function () {
				alert('xoa');
				let src = $(this).attr('del');
				alert(src);
				if(src!='' && src!=undefined){

					// $.ajax({
					// 	url:"/frontend/Post/delete_image/"+src, //base_url() return http://localhost/tutorial/codeigniter/
					// 	type:"POST",
					// 	data:src,
					// 	contentType:false,
					// 	cache:false,
					// 	processData:false,
					// 	beforeSend:function()
					// 	{
					// 		//$('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
					// 	},
					// 	success:function(data)
					// 	{
					// 		$('#'+data).hide();
					// 		//$('#files').val('');
					// 	}
					// })
				}
			});
			$(document).ready(function(){
				var csrf_token = $('input[name="csrf_tok_st"]').val();
				var imagesPreview = function(input, placeToInsertImagePreview) {
					if (input.files) {
						let p = $(input).attr('pos');
						//alert(p);
						var filesAmount = input.files.length;
						for (i = 0; i < filesAmount; i++) {
							var reader = new FileReader();
							reader.onload = function(event) {
								//$($.parseHTML('<img>')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
								$(placeToInsertImagePreview).append('<img id="img'+p+'" src="'+event.target.result+'" style="height: 60px;" /><a id="img'+p+'d" pos="'+p+'" href="javascript:del_img(\'img'+p+'\')" class="btn btn-danger del_img">Xóa</a><br/>');
							}
							reader.readAsDataURL(input.files[i]);

						}
					}
				};
				$('.files').change(function(){
					var files = $(this)[0].files;


					var error = '';
					var form_data = new FormData();
					for(var count = 0; count<files.length; count++)
					{
						let name = files[count].name;
						//console.log(name);
						var extension = name.split('.').pop().toLowerCase();
						if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
						{
							error += "Invalid " + count + " Image File";
							alert('Hình không đúng định dạng');
							$(this).val('');
							return;
						}
						else
						{
							form_data.append("files[]", files[count]);
							form_data.append("csrf_tok_st",csrf_token);
							//console.log(files[count]);
						}
					}
					if(error == '')
					{
						imagesPreview(this, 'div.img-item');
						// $.ajax({
						// 	url:"/frontend/Post/do_upload", //base_url() return http://localhost/tutorial/codeigniter/
						// 	type:"POST",
						// 	data:form_data,
						// 	contentType:false,
						// 	cache:false,
						// 	processData:false,
						// 	beforeSend:function()
						// 	{
						// 		$('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
						// 	},
						// 	success:function(data)
						// 	{
						// 		$('#uploaded_images').html(data);
						// 		$('#files').val('');
						// 	}
						// });
					}
					else
					{
						alert(error);
					}
				});

			});
			$('#price').keyup(function(event){
				// skip for arrow keys
				if(event.which >= 37 && event.which <= 40) return;

				// format number
				$(this).val(function(index, value) {
					return value
						.replace(/\D/g, "")
						.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
						;
				});
			});

		</script>
