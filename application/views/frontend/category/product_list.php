<div class="container" id="">

	<div class="home-product product-4-you">
		<h2 class="fl"><?php echo isset($cate_title)?$cate_title:''; ?></h2>

		<div class="clear"></div>
		<!--			<link rel="stylesheet" href="https://staticfile.batdongsan.com.vn/lib/microtip/microtip.min.css">-->
		<link rel="stylesheet" href="/assets/frontend/css/microtip.min.css" type="text/css">
		<ul class="remove-padding">
			<?php
			if(!empty($products)){
				$k = 1;
				foreach ($products as $pr){
					$link = Product_model::GetLink($pr,$lang);
					$tmp = array();
					if(!empty($pr->street_name))
						$tmp[] = $pr->street_name;
					if(!empty($pr->ward_name))
						$tmp[] = $pr->ward_name;
					if(!empty($pr->district_name))
						$tmp[] = $pr->district_name;
					if(!empty($pr->province_name))
						$tmp[] = $pr->province_name;
					$address = implode(',',$tmp);
					$num_img = count(explode(';',$pr->images));
					$name = $lang=="en"?$pr->name_en:$pr->name;
					?>
					<li class="<?php echo $k>8?'hide-item':''; ?>">
						<div class="vip5" rel="28606882" uid="1511466">
							<div class="product-thumb ">
								<a title="<?php echo $name; ?>"
								   href="<?php echo $link; ?>">
									<img
										src="<?php echo $pr->thumb; ?>"
										alt="<?php echo $name; ?>">
								</a>
								<span class="product-feature">
                                                                                            </span>
								<span class="product-media"><?php echo $num_img; ?></span>
							</div>
							<div class="home-product-bound">
								<div class="p-title textTitle">
									<a href="<?php echo $link; ?>"
									   title="<?php echo $pr->name; ?>"><?php echo $name; ?></a>
								</div>
								<div class="product-price"><?php echo ($lang=="en")?$pr->price_short_en:$pr->price_short; ?></div>
								<span class="ic_dot">·</span>
								<div class="pro-m2"><?php echo $pr->dien_tich; ?> m²</div>
								<!--									<div class="product-address">-->
								<!--										<a href="/ban-nha-rieng-hai-ba-trung-hn" title="Hai Bà Trưng">Hai Bà Trưng</a>,-->
								<!--										<a href="/ban-nha-rieng-ha-noi" title="Hà Nội">Hà Nội</a>-->
								<!--									</div>-->
								<!--									<div class="product-date">-->
								<!--										Hôm nay-->
								<!--										<span class="tooltip-time">20/01/2021</span>-->
								<!--									</div>-->
								<span class="tooltipMarking <?php echo $pr->id; ?>" aria-label="Bấm để lưu tin" data-microtip-position="bottom"
									  role="tooltip">
                                <i class="iconSave" data-productid="<?php echo $pr->id; ?>"
								   data-avatar="<img class=&quot;product-avatar-img&quot; src=&quot;<?php echo $pr->thumb; ?>&quot;/>"

								   data-title="<?php echo $name; ?>"
								   data-price="<?php echo ($lang=="en")?$pr->price_short_en:$pr->price_short; ?>" data-area="<?php echo $pr->dien_tich; ?> m²"
								   data-room="" data-toilets="0" data-address="<?php echo $address; ?>" data-description=""

								   data-url="<?php echo $link; ?>"
								   data-totalmedia="<?php echo $num_img; ?>" data-createbyuser="<?php echo $pr->creator_id; ?>"></i>
                            </span>
							</div>
						</div>
					</li>
					<?php
					++$k;
				}
			}
			?>
		</ul>
		<div class="clear"></div>
		<div id="ucHomeProductInterest_pnlViewMore">
			<div class="home-viewmore">
				<a href="javascript:void(0)" id="prd-viewmore">
					Mở rộng&nbsp;&nbsp;<img src="/assets/images/icon-down-blue.png">
				</a>
			</div>
		</div>
	</div>

</div>
