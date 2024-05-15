<link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
<div class="container main bs-docs-container">
    <div class="row" role="main">
        <div class="container">
            <div class="panel panel-default formPanel">
                <?php echo isset($msg)?$msg:''; ?>
                <div class="bg-primary border-color-2 panel-heading">
                    <h3 class="text-center panel-title" style="font-size: 20px;">ĐĂNG SẢN PHẨM</h3>
                </div>

                <div class="panel-body">
					<div class="col-lg-12">
                    <p style="margin: 5px 0 5px 0" class="text-danger">(*) Bắt buộc phải điền</p>
                    <?php echo form_open('','role="form" class="formlogin2" id="upTin"');?>
                    <div class="" style="margin-bottom: 30px;display: inline-block">
                        <label>Hình ảnh sản phẩm (tối đa 8 hình) (*)</label>
                        <input type="file" name="files" id="files" multiple />
                        <div id="uploaded_images"></div>
                    </div>

                    <input type="hidden" name="id" value="<?php if(isset($edit)) echo $edit->id; ?>"/>
                    <div class="form-group formField">
                        <label>Tên sản phẩm (*)</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Tên sản phẩm ..." required value="<?php if(isset($edit)) echo $edit->name; ?>" />
                    </div>
					<div>

                    <div>
						<div class="col-lg-3">
							<div class="form-group formField">
								<label>Giá (*)</label>
								<input type="text" class="form-control" name="price" id="price" placeholder="Giá sản phẩm (để bằng 0 nếu muốn giữ giá bí mật)" value="<?php if(isset($edit)) echo $edit->price; ?>" required />
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group formField">
								<label>Diện tích (m2)</label>
								<input type="number" class="form-control" name="dientich" id="dientich" placeholder="Diện tích (chỉ điền số)" value="<?php if(isset($edit)) echo $edit->dien_tich; ?>" />
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group formField">
								<label>Loại nhà đất (*)</label>
								<?php echo $loai_nha_dat; ?>
							</div>
						</div>
						<div class="col-lg-3">
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
						<div class="col-lg-3">
							<div class="form-group formField">
								<label>Tỉnh thành</label>
								<?php echo $drop_province; ?>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Quận huyện</label>
								<?php echo $drop_district; ?>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="form-group">
								<label>Phường xã</label>
								<?php echo $drop_ward; ?>
							</div>
						</div>
						<div class="col-lg-3">
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


                    <div class="form-group form-group-lg formField">
                        <input type="submit" name="btn_send" class="pull-right btn-info btn" value="Đăng tin" />
                    </div>

                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

		<script src="/assets/js/bootstrap.min.js"></script>
<script>
	$('.del_img').click(function () {
		let src = $(this).attr('data-ref');
		alert(src);
		if(src!='' && src!=undefined){
			$.ajax({
				url:"/frontend/Post/delete_image/"+src, //base_url() return http://localhost/tutorial/codeigniter/
				type:"POST",
				data:src,
				contentType:false,
				cache:false,
				processData:false,
				beforeSend:function()
				{
					//$('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
				},
				success:function(data)
				{
					$('#'+data).hide();
					//$('#files').val('');
				}
			})
		}
	});
    $(document).ready(function(){
        var csrf_token = $('input[name="csrf_tok_st"]').val();
        $('#files').change(function(){
            var files = $('#files')[0].files;
            //console.log(files.length);
            var error = '';
            var form_data = new FormData();
            for(var count = 0; count<files.length; count++)
            {
                let name = files[count].name;
                console.log(name);
                var extension = name.split('.').pop().toLowerCase();
                if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
                {
                    error += "Invalid " + count + " Image File"
                }
                else
                {
                    form_data.append("files[]", files[count]);
                    form_data.append("csrf_tok_st",csrf_token);
                }
            }
            if(error == '')
            {

                $.ajax({
                    url:"/frontend/Post/do_upload", //base_url() return http://localhost/tutorial/codeigniter/
                    type:"POST",
                    data:form_data,
                    contentType:false,
                    cache:false,
                    processData:false,
                    beforeSend:function()
                    {
                        $('#uploaded_images').html("<label class='text-success'>Uploading...</label>");
                    },
                    success:function(data)
                    {
                        $('#uploaded_images').html(data);
                        $('#files').val('');
                    }
                });
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
