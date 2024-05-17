<div class=" panel-default">
    <div class="blocknew">
        <h3><a href="/vi/news/groups/Tin-moi-nhat/">Thông báo mới</a></h3>
    </div>
    <div class="group_news">
        <ul style="padding: 0px">
            <?php
            $listNotification = Post_model::SelectByType(0);
            if (isset($listNotification) && count($listNotification) > 0) {
                foreach ($listNotification as $n) {
                    $link = Post_model::GetLink($n);
                    // print_r($link);
            ?>
                    <li class="clearfix">
                        <a class="show" href="<?php echo $link; ?>">
                            <em class="fa fa-angle-right"></em> &nbsp; <?php echo $n->title; ?>
                        </a>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
    <div class="text-right">
        <strong><a href="/thong-bao/">Tất cả >> </a></strong>
    </div>
</div>