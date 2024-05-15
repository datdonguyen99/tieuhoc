<?php $this->load->view('frontend/layout/breadcrum',array('category'=>$category)); ?>
<div class="news_column">
	<?php
	if(isset($posts) && count($posts)>0){
		foreach ($posts as $post){
			$link = Post_model::GetLink($post);
			$date = date_create($post->created_date)->format('d/m/Y H:i:s');
			?>
			<div class="panel panel-default">
				<div class="panel-body featured">
					<a href="<?php echo $link; ?>" title="<?php echo $post->title; ?>"><img alt="<?php echo $post->title; ?>" src="<?php echo $post->thumb; ?>" width="100" class="img-thumbnail pull-left imghome"></a>
					<h2>
						<a href="<?php echo $link; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title; ?></a>
					</h2>
					<div class="text-muted hidden">
						<ul class="list-unstyled list-inline">
							<li>
								<em class="fa fa-clock-o">&nbsp;</em> <?php echo $date; ?>
							</li>
							<li>
								<em class="fa fa-eye">&nbsp;</em> Đã xem: <?php echo $post->view_number; ?>
							</li>
						</ul>
					</div>
					<p>
						<?php echo $post->meta_description; ?>
					</p>
				</div>
			</div>
	<?php
		}
	}
	?>
</div>
