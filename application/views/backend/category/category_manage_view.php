<style>
	#category_dragg {
		position: relative;
	}

	.ui-state-highlight {
		background-color: yellow
	}

	.ui-state-default {
		background-color: #fff
	}

	/*.table>tbody+tbody {*/
	/*border-top: none !important;*/
	/*}*/
	.lang ul li {
		display: inline-block;
		list-style: none;
		background: #c4e3f3;
		padding: 10px;
		margin-left: 10px;
	}
</style>
<div class="lang">
	<!-- <ul>
		<li><button id="tv">Tiếng Việt</button></li>
		<li><button id="ta">Tiếng Anh</button></li>
	</ul> -->

	<script>
		$('#tv').click(function() {
			$('#d_tv').show();
			$('#d_ta').hide();
		});
		$('#ta').click(function() {
			$('#d_ta').show();
			$('#d_tv').hide();
		});
	</script>
	<hr />
</div>
<div>
	<form action="" method='get'>
		<div class="clearfix row">

			<div class="col-sm-6">
				<label>&nbsp;</label><br>
				<ul class='list-inline'>
					<li><a href="<?php echo $base_link . '/update'; ?>" class='btn btn-primary'><i class="fa fa-plus"></i>Thêm mới</a></li>
				</ul>
			</div>

		</div>

		<div class="clearfix row">

		</div>
	</form>
</div>
<div id="d_tv">
	<div>
		<table class="table table-bordered " id="category_dragg">
			<thead>
				<tr class='active'>
					<th width="20">#</th>
					<th>Tên danh mục</th>
					<th>Loại mục</th>
					<th width='200'></th>
				</tr>
			</thead>

			<?php echo $list_rows ?>
		</table>
	</div>

	<?php echo $pagination ?>
</div>
<!-- <div id="d_ta" style="display: none;">
	<div>
		<table class="table table-bordered " id="category_dragg">
			<thead>
				<tr class='active'>
					<th width="20">#</th>
					<th>Tên danh mục</th>
					<th>Loại mục</th>
					<th width='200'></th>
				</tr>
			</thead>

			<?php echo $list_rows_en; ?>
		</table>
	</div>

	<?php echo $pagination ?>
</div> -->