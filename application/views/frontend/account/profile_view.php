<div class="container">
    <div class="row">
        <div class="col-lg-2">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="text-center text-aqua">Xin chào <?php echo $user['name'] ?></h3>
                </div>
                <div class="panel-body">
                    <div style="display: inline-block;margin-bottom: 10px;width: 100%;" class="fa fa-user-circle center-block"><a href="/tai-khoan">Tài khoản</a></div>
                    <div style="display: inline-block;margin-bottom: 10px;width: 100%;" class="fa fa-newspaper-o center-block" ><a href="/tin-da-dang">Tin đã đăng</a></div>
                </div>
            </div>
        </div>
        <div class="col-lg-10">
            <div class="panel">
                <div class="panel-body">
					<h2 class="center-block text-warning text-center">Tin đã đăng</h2>
					<hr />
					<div>
						<table class="table table-bordered table-responsive">
							<tr>
								<th>Tên tin</th>
								<th>Ngày đăng</th>
								<th>Số lượt xem</th>
								<th></th>
							</tr>
							<?php
							if(isset($products) && !empty($products)){
								foreach ($products as $p){
									$link = Product_model::GetLink($p);
									$d = new Datetime($p->created_date);
									?>
							<tr>
								<td>
									<div style="font-weight: 700;margin-bottom: 10px;"><a href="<?php echo $link; ?>" target="_blank"><?php echo $p->name; ?></a></div>
									<div><span>Giá: <?php echo Common::readNumberToText($p->price); ?></span> | <span>Diện tích: <?php echo $p->dien_tich. ' m2' ?></span></div>
								</td>
								<td class="text-center"><?php echo $d->format('d-m-Y');  ?></td>
								<td class="text-center"><?php echo $p->views; ?></td>
								<td class="text-center">
								<div id="ac_<?php echo $p->id; ?>"><?php
									if(empty($p->sold_date)){
										echo "<button class='btn btn-danger sold' id='dd_$p->id' p-id='$p->id'>Đánh dấu Đã bán</button>";
									}
									else{
										echo "<i style='color: red;display: block;' id='db_$p->id'>Đã bán</i>";
									}
									?>
								</div>
								</td>
							</tr>
							<?php
								}
							}
							?>
						</table>
					</div>
					<div class="pagination">
						<?php echo $pagination; ?>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
