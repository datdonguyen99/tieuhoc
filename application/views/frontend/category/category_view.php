<?php $this->load->view('frontend/layout/breadcrum',array('category'=>$category)); ?>
<div class="news_column panel panel-default">
<div class="panel-body">
	<h1 class="title margin-bottom-lg" itemprop="headline"><?php echo $category->name; ?></h1>

	<div class="clear"></div>

	<div id="page-bodyhtml" class="bodytext margin-bottom-lg">
		<?php echo $category->content; ?>
	</div>
</div>
</div>
