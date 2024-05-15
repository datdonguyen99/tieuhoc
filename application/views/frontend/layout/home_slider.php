<div class="block_content clearfix">
	<div id="videotop40" class="flexslider col-md-12">
		<ul class="groups_notice slides">
			<?php
			if(isset($sliders) && count($sliders)>0){
				foreach ($sliders as $slider){
					?>
					<li class="clearfix">
						<div class="clearfix">
							<img src="<?php echo $slider->thumb; ?>" />
						</div>
					</li>
			<?php
				}
			}
			?>
		</ul>
	</div>

	<ul class="flex-direction-nav">
		<li class="flex-nav-prev"><a href="#" class="flex-next">Sau <i class="fa fa-angle-right fa-lg"></i></a></li>
		<li class="flex-nav-next"><a href="#" class="flex-prev"><i class="fa fa-angle-left fa-lg"></i> Trước</a></li>
	</ul>
</div>
