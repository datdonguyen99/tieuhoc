<?php

?>
<h3 class="breakcolumn">
	<a title="Trang" nhất="" href="/"><img src="/themes/edu02/images/icons/home.png" alt="Trang nhất"></a>
	<span class="breakcolumn">»</span>
	<?php
	$i=1;
	if(isset($category) && empty($category->parent_id)){
		++$i;
		$l = Category_model::GetLink($category);

		?>
		<a href="<?php echo $l; ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a>
				<?php
	}
	else if(isset($category) && !empty($category->parent_id)){
		$l = Category_model::GetLink($category);
		$category_par = Category_model::SelectById($category->parent_id);
		$category_par = Category_model::ShowByLang($category_par,LANG);
		$l_p = Category_model::GetLink($category_par,LANG);
		++$i;
		?>
		<a href="<?php echo $l_p; ?>" title="<?php echo $category_par->name; ?>"><?php echo $category_par->name; ?></a>
		<span class="breakcolumn">»</span>
		<a href="<?php echo $l; ?>" title="<?php echo $category->name; ?>"><?php echo $category->name; ?></a>
		<?php
	}
	if(isset($post) && !empty($post)){
		$post = Post_model::ShowByLang($post,LANG);
		$l = Post_model::GetLink($post);
		++$i;
		?>
		<a href="<?php echo $l; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title; ?></a>

		<?php
	}
	?>
</h3>
