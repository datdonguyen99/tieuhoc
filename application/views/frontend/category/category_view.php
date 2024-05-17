<?php
$this->load->view('frontend/layout/bread_crum_view', array('category' => $data['category'], 'parentCategory' => $data['parentCategory']));
?>

<div class="page panel panel-default" itemtype="http://schema.org/Article" itemscope>
	<div class="panel-body">
		<h1 class="title margin-bottom-lg" itemprop="headline"><?php echo $data['category']->name; ?></h1>

		<div id="page-bodyhtml" class="bodytext margin-bottom-lg">
			<h1><?php echo $data['category']->name; ?></h1>

			<p style="font-weight: bold;text-align: justify;font-style: italic;"><?php echo $data['category']->description; ?></p>

			<div class="bodytext">
				<div class="title_news" style="margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14.7719993591309px;">
					<p style="margin: 0px 0px 20px; padding: 0px; text-align: justify; font-weight: bold;"><span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><?php echo $data['category']->meta_description; ?></span></span></p>

					<!-- <p style="margin: 0px 0px 20px; padding: 0px; text-align: justify; font-weight: bold;"><span style="font-size:14px;"><span style="font-family:times new roman,times,serif;">+ Trường Tiểu học Lý Thái Tổ được thành lập năm 2005.</span></span></p> -->
				</div>

				<div class="nd" style="margin: 0px; padding: 5px; text-align: justify; color: rgb(0, 0, 0); font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 14.7719993591309px;">
					<p style="margin: 0px; padding: 0px;"><span style="font-size:14px;"><span style="font-family:times new roman,times,serif;"><?php echo $data['category']->content; ?></span></span></p>

				</div>
			</div>
		</div>
	</div>
</div>