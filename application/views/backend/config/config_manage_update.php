<style>
	.select2-container ul>li{
		width: 100% ; color: #000 !important;  padding: 3px 5px !important;
	}
</style>

<div>
	<?php echo form_open_multipart(); ?>
		<div class="clearfix row form-group">			
			<div class="col-sm-12">
				<label>Tiêu đề <small class="text-danger">*</small></label>
				<input type="text" name='name' class='form-control' value='<?php echo isset($item->name) ? $item->name : '' ?>' />
			</div>
		</div>

		<div class="clearfix row form-group">			
			<div class="col-sm-12">
				<label>Giá trị</label>
				<input type="text" name='value' class='form-control' value='<?php echo isset($item->value)? $item->value : '' ?>'  />
			</div>
			<div class="col-sm-12">
				<label>Trường hợp này dùng cho Logo</label>
				<div class="list-files"></div>
			</div>
            <div class="col-sm-12" style="margin-top: 25px"> <button type='submit' class='btn btn-primary'>Chỉnh sửa</button></div>

			
		</div>
	<?php
	if(isset($msg)) echo $msg;
	?>

</div>


<script>
	$(document).ready(function(){
		$('.list-files').imageUploader({
			imagesInputName: 'files',
		});
	    //$("#category_id").val(<?php //echo $item->parent_id ?>//);
	    //$("#filter_id").val([<?php //echo $filter_value ?>//]).select2();
	});	
</script>
