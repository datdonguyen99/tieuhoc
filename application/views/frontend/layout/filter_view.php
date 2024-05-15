<?php

?>
<div class="home-search">
	<div class="home-search-tool">
		<ul class="home-search-tab">
			<li class="actived" ptype="38">Nhà đất bán</li>
			<li ptype="49">Nhà đất cho thuê</li>
		</ul>
		<div class="home-search-content">

			<div class="home-filter home-filter-1 m-t-10">

				<div class="w170 search-filter">
					<div class="custom-select">
						<?php echo $real_types; ?>
					</div>
				</div>
				<div class="w170 search-filter">
					<div class="custom-select">
						<?php echo $phuong_xa; ?>
					</div>
				</div>
				<div class="w170 search-filter">
					<div class="custom-select">
						<?php echo $duong; ?>
					</div>
				</div>
				<div class="w170 search-filter">
					<div class="custom-select">
						<select>
							<option value="DuAn">Dự án</option>
							<option value="all">Tất cả</option>
						</select>
					</div>
				</div>
				<input type="submit" value="Tìm kiếm" class="btn-home-search" name="btn-search">



				<div class="search-action search-action1">
					<a href="javascript:void(0)" class="m-r-10 filter-more">
						<img src="https://file4.batdongsan.com.vn/images/newhome/icon-down-arrow.png" />
						Thêm
					</a>
					<!--									<a href="javascript:void(0)" class="action-reset-search-form">-->
					<!--										<img src="https://file4.batdongsan.com.vn/images/newhome/search-reset.png" />-->
					<!--										Xóa-->
					<!--									</a>-->
				</div>
			</div>
			<div class="home-filter home-filter-2 slideClose">
				<div class="w170 search-filter">
					<div class="custom-select">
						<?php echo $muc_gia ?>
					</div>
				</div>
				<div class="w170 search-filter">
					<div class="custom-select">
						<?php echo $dien_tich ?>
					</div>
				</div>
				<div class="w170 search-filter">
					<div class="custom-select">
						<?php echo $so_phong ?>
					</div>
				</div>
				<div class="w170 search-filter">
					<div class="custom-select">
						<?php echo $huong ?>
					</div>
				</div>
				<div class="search-action search-action2">
					<a href="javascript:void(0)" class="filter-less">
						<img src="https://file4.batdongsan.com.vn/images/newhome/up-arrow.png"> Thu gọn
					</a>
					<!--									<a href="javascript:void(0)" class="action-reset-search-form">-->
					<!--										<img src="https://file4.batdongsan.com.vn/images/newhome/search-reset.png"> Xóa-->
					<!--									</a>-->
				</div>

			</div>

		</div>
	</div>
</div>
