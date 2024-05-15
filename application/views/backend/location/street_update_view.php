<div>
	<form action="" method="post">
		<div class="clearfix row form-group">
			<div class="col-lg-3">
				<label>Chọn tỉnh thành</label>
				<?php echo $drop_province; ?>
			</div>
			<div class="col-lg-3">
				<label>Chọn quận huyện</label>
				<?php echo $drop_district; ?>
			</div>
			<div class="col-lg-3">
				<label>Chọn phường xã</label>
				<?php echo $drop_ward; ?>
			</div>
			<div class="col-lg-3">
				<label>Tên đường</label>
				<input type="text" name='street_name' class='form-control' value='<?php echo isset($item->street_name) ? $item->street_name : '' ?>' />
			</div>
		</div>
		<div class='clearfix'>
			<ul class='list-inline'>
				<li><a href="<?php echo $base_link ?>" class="btn btn-default"><i class="fa fa-arrow-left"></i> Cancel</a></li>
				<!--				<li><button type='submit' name="btn-save" class='btn btn-primary'>--><?php //echo $btn_submit ?><!--</button></li>-->
				<li><button type='submit' name="btn-save-back" class='btn btn-default'>Save & Back</button></li>

				<li><?php echo $msg ?></li>
			</ul>
		</div>
	</form>
	<hr>
</div>
<style>
	.cell_thumb{width: 140px; height: 90px;}
</style>
<div>
	<div>
		<a href="<?php echo $base_link ?>" class='btn btn-primary' data-toggle='tooltip' title='Thêm mới'><i class="fa fa-plus"></i> Thêm mới</a>

	</div>
	<table class="table table-bordered " id="tbl-street">
		<tr>
			<th>Tên đường</th>
			<th width="120"></th>
		</tr>
		<?php foreach ($items as $e) { ?>
			<tr>
				<td><a href="<?php echo $base_link .'/edit/'. $e->id ?>"><?php echo $e->street_name ?></a></td>
				<td>
					<ul class="list-inline">
						<li><a data-toggle='tooltip' title='Chỉnh sửa' href="<?php echo $base_link .'/edit/'. $e->id ?>" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a></li>

						<li><a data-toggle='tooltip' title='Xóa' class='btn btn-danger btn-sm delete' href="<?php echo $base_link .'/delete/'. $e->id ?>"><i class="fa fa-trash"></i></a></li>
					</ul>
				</td>
			</tr>
		<?php } ?>
	</table>
</div>
