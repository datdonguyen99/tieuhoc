<style>
	.thumbnail_preview {
		height: 96px;
		width: 128px;
	}
</style>

<h3 class='text-info'><i class="fa fa-pencil-square-o"></i> Quản lý bài viết</h3>
<div>
	<form action="" method='get'>
		<div class="clearfix row">
			<div class="col-sm-3">
				<label>Danh mục</label>
				<select name="category_id" id="category_id" class='form-control'>
					<option value="0">-- Tất cả --</option>
					<?php echo $category_options ?>
				</select>
			</div>
			<div class="col-sm-3">
				<label>Tiêu đề</label>
				<input type="text" name="key" class="form-control" placeholder="Tìm theo tiêu đề bài viết" value="<?php echo $key ?>" />
			</div>

			<div class="col-sm-6">
				<label>&nbsp;</label><br>
				<ul class='list-inline'>
					<li><button type='submit' class="btn btn-default"><i class='fa fa-search'></i> Xem</button> </li>
					<li><a href="<?php echo $base_link ?>/update" class='btn btn-primary'><i class="fa fa-plus"></i>Thêm mới</a></li>
				</ul>
			</div>
		</div>

		<div class="clearfix row">
		</div>
	</form>
</div>
<hr>
<div>
	<table class="table table-bordered ">
		<tr>
			<th width="20">#</th>
			<th width="130">Hình đại diện</th>
			<th>Tiêu đề</th>
			<th>Mục</th>
			<th></th>
		</tr>

		<?php
		// print_r($items[0]->id);
		foreach ($items as $e) {
			// $cate = Category_model::SelectById($e->category_id);
			$link = Post_model::GetLink($e);
			$u_name = "Admin";
			if ($e->user_id > 0) {
				$u = User_model::SelectById($e->user_id);
				if ($u) $u_name = $u->name;
			}
			$toggle_txt = ($e->is_deleted) ? '<i class="fa fa-eye-slash"></i> Hiện' : '<i class="fa fa-eye"></i> Ẩn';
			echo "<tr>
				<td>$e->id</td>
				<td><img class='thumbnail_preview' src='$e->thumb'></td>
				<td><a href='$link' target='_bank' >$e->title</a><br/>Tác giả: $u_name</td>
				<td>
					<ul class='list-inline'>
						<li><a href='{$base_link}/update/$e->id' class='btn btn-sm btn-default'><i class='fa fa-edit'></i> Chỉnh sửa</a></li>
						<li><a href='{$base_link}/delete/{$e->id}' class='delete btn btn-sm btn-default btn_toggle'>{$toggle_txt} </a></li>
					</ul>
				</td>
				</tr>";
		} ?>
	</table>

	<?php echo $pagination ?>
</div>


<script>
	$(document).ready(function() {
		$("#category_id").val(<?php echo $category_id ?>);

		$(".btn_toggle").click(function(e) {
			e.preventDefault();
			var href = $(this).attr('href');
			var $that = $(this);
			$.post(href, {}, function(res) {
				if (res == 1) {
					//window.location.reload();
					$that.html('<i class="fa fa-eye-slash  text-primary"></i> Show');
				} else {
					$that.html('<i class="fa fa-eye text-danger"></i> Hide');
				}

			}, 'json');
		});

	});
</script>