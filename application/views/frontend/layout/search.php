<div class="home-center home-center-search">
	<div class="search-box">
		<?php echo form_open('/search');?>
		<div class="key-search" style=""><input type="text" name="key-search" class="form-control" placeholder="Bạn cần tìm kiếm gì ..."></div>
		<div class="home-search">
			<div class="home-search-tool">
				<input type="hidden" name="hang_muc" id="hang-muc" value="ban" />
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item tab-home-border">
						<a class="nav-link active" href="#nhadatban" hangmuc="ban" role="tab" data-toggle="tab">Nhà đất bán</a>
					</li>
					<li class="nav-item tab-home-border">
						<a class="nav-link" href="#nhadatban" role="tab" hangmuc="cho-thue" data-toggle="tab">Nhà đất cho thuê</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content main_background_color">
					<div class="home-search-content">

						<div class="home-filter home-filter-1 slideOpen m-t-10">

							<div class="w170 search-filter">

								<?php echo $real_types; ?>

							</div>
							<div class="w170 search-filter">

								<?php echo $phuong_xa; ?>

							</div>
							<div class="w170 search-filter">

								<?php echo $duong; ?>

							</div>
							<div class="w170 search-filter">
								<?php echo $du_an; ?>
							</div>

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

								<?php echo $muc_gia ?>

							</div>
							<div class="w170 search-filter">

								<?php echo $dien_tich ?>

							</div>
							<div class="w170 search-filter">

								<?php echo $so_phong ?>

							</div>
							<div class="w170 search-filter">

								<?php echo $huong ?>

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
						<input type="submit" value="Tìm kiếm" class="btn-home-search" name="btn-search">
					</div>
				</div>


			</div>
		</div>


		<?php echo form_close();?>

	</div>
</div>
