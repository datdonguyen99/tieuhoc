<style>
	.cell_thumb{width: 140px; height: 90px;}
</style>
<div>
	<div>
		<a href="<?php echo $base_link ?>/create" class='btn btn-primary' data-toggle='tooltip' title='Thêm mới'><i class="fa fa-plus"></i> Thêm mới</a>

	</div>
	<table class="table table-bordered">
		<tr>
			<th>Tiêu đề</th>
			<th width="150">Hình ảnh</th>
			<th>Liên kết</th>
			<th>Sắp xếp</th>
			<th>Loại banner</th>
			<th width="120"></th>
		</tr>
		<?php
		//print_r($items);
		foreach ($items as $e) { ?>
			<tr>
				<td><a href="<?php echo $base_link .'/edit/'. $e->id ?>"><?php echo $e->name ?></a></td>
				<td><img src="<?php echo $e->thumb ?>" class="cell_thumb"></td>
				<td><a href="<?php echo $e->link ?>" target="_blank"><?php echo $e->link ?></a></td>
				<td><?php echo $e->sort_order ?></td>
				<td><?php echo $e->type; ?></td>
				<td>
					<ul class="list-inline">						
						<li><a data-toggle='tooltip' title='Chỉnh sửa' href="<?php echo $base_link .'/edit/'. $e->id ?>" class="btn btn-sm btn-default"><i class="fa fa-edit"></i></a></li>
						
						<li><a data-toggle='tooltip' title='Xóa' class='btn btn-danger btn-sm delete' href="<?php echo $base_link .'/delete/'. $e->id ?>"><i class="fa fa-trash"></i></a></li>
					</ul>
				</td>
			</tr>	
		<?php } ?>		
	</table>
	<?php echo $pagination ?>
</div>
