<aside class="aside-item collection-category blog-category">
    <div class="blogs-cate clearfix">
        <h2>Danh mục bài viết</h2>
        <div class="blogs-cate-info">
            <ul>
                <?php foreach ($blog_categories as $c):
                    $link = '/tin-tuc'.Category_model::GetLink($c);
                    ?>
                    <li>
                        <a href="<?php echo $link?>">
                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                            <?php echo $c->name?>
                        </a>
                    </li>
                <?php endforeach;?>

            </ul>
        </div>
    </div>
</aside>


<div class="top-blogs clearfix">
    <h2>Bài viết nổi bật</h2>
    <div class="list-top-blogs">
        <ul>
            <?php foreach ($top_view as $p):
                $link = Post_model::GetLink($p);
                $post_date = date('d/m/Y', strtotime($p->created_date));

                ?>
                <li class="clearfix">
                    <div class="blog-img">
                        <a href="<?php echo $link?>">
                            <img src="<?php echo $p->thumb?>" alt="<?php echo $p->title?>">
                        </a>
                    </div>
                    <div class="blog-info">
                        <h3 class="b-name line-clamp">
                            <a href="<?php echo $link?>" title="<?php echo $p->title?>"><?php echo $p->title?></a>
                        </h3>
                        <p class="b-date"><time datetime="<?php echo $post_date?>" class="entry-date"><?php echo $post_date?></time></p>
                    </div>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>