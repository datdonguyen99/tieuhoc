<div class="sidebar right-sidebar">
    <div class="sidebar-box">
        <h2>Đối tác tiêu biểu</h2>
        <div class="categories menu-sidebar">
            <ul>
        <?php
        $sv = Partner_model::SelectAll();
        if($sv){

                foreach($sv as $dv){
                    //$link = Category_model::GetLink($dv);
                    echo "<li class='center-block text-center'><img style='max-height: 100px;' src='$dv->imgUrl' /></li>";
                }

        }
        ?>
            </ul>
    </div>
        </div>
    <?php
    if(!isset($loadProduct)){
        ?>
        <div class="sidebar-box">
            <h2>Bài viết mới</h2>
            <div class="recent-post">
                <ul>
                    <?php
                    $posts = Post_model::SelectPage(1,10,$total);
                    if($posts){
                        foreach($posts as $p){
                            $link = Post_model::GetLink($p);
                            ?>
                            <li>
                                <h3><a href="<?php echo $link; ?>"><?php echo $p->title; ?></a></h3>
                                <span><?php echo word_limiter($p->meta_description,20," "); ?></span>
                                <p><a href="<?php echo $link; ?>">Xem chi tiết</a> </p>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php
    }
    else{
        ?>
        <div class="sidebar-box">
            <h2>Bài viết mới</h2>
            <div class="recent-post">
                <ul>
                    <?php
                    $products = Product_model::SelectAll();
                    if($products){
                        foreach($products as $p){
                            $link = Product_model::GetLink($p);
                            ?>
                            <li>
                                <h3><a href="<?php echo $link; ?>"><?php echo $p->name; ?></a></h3>
                                <p><?php echo word_limiter($p->description,10," "); ?></p>
                                <p style="font-weight: 700;"><?php echo 'Giá trọn gói: '.number_format($p->price,0,'','.'); ?>
                                <br/>
                                    <a class="btn btn-info" href="<?php echo $link; ?>">Xem chi tiết</a>
                                </p>
                            </li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
    <?php
    }
    ?>

</div>
