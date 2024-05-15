<div class="container">
	<?php echo form_open('','role="form"') ?>
	<div class="form-group">
		<label>Tên:</label>
		<input class="form-control" type="text" name="name" value="<?php if(isset($uc)) echo $uc->name; ?>">
	</div>
	<div class="form-group">
		<label>Email:</label>
		<input class="form-control" type="email" name="email" value="<?php if(isset($uc)) echo $uc->email; ?>"/>
	</div>
	<div class="form-group">
		<label>Password:</label>
		<input class="form-control" type="password" name="password">
	</div>
	<div class="form-group">
		<input type="submit" value="Lưu" class="btn btn-info">
	</div>
	<?php if(isset($msg)) echo $msg; ?>
	<?php echo form_close(); ?>
</div>
<div class="container">
	<h2 class="center-block text-center">DANH SÁCH TÀI KHOẢN ĐÃ TẠO</h2>
	<hr/>
	<table class="table table-responsive table-bordered">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Email</th>
			<th></th>
			<th></th>
		</tr>
		<?php
		foreach ($users as $user){
			?>
		<tr>
			<td><?php echo $user->id; ?></td>
			<td><?php echo $user->name; ?></td>
			<td><?php echo $user->email; ?></td>
			<td>
				<a href="/backend/User_manage/index/<?php echo $user->id ?>" class="btn btn-info del">Sửa</a>
			</td>
			<td>
				<a href="/backend/User_manage/delete/<?php echo $user->id ?>" class="btn btn-danger delete">Xóa</a>
			</td>
		</tr>
		<?php
		}
		?>
	</table>
</div>
