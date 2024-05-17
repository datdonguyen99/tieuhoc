<?php
// print_r($data['post']);
// print_r($data['old_news']);
if (empty($data['post'])) return;
?>

<div class="news_column panel panel-default">
    <div class="panel-body">
        <h3 class="title margin-bottom-lg"><?php echo  $data['post']->title; ?></h3>
        <div class="row margin-bottom-lg">
            <div class="col-md-12">
                <span class="h5"><?php echo $data['post']->created_date; ?></span>
            </div>
            <div class="col-md-12">
                <ul class="list-inline text-right">
                    <li>
                        <a class="dimgray" title="In ra" href="javascript: void(0)" onclick="nv_open_browse('posts/print/' + encodeURIComponent('<?php echo isset($data['post']->id) ? $data['post']->id : ''; ?>'),'',840,500,'resizable=yes,scrollbars=yes,toolbar=no,location=no,status=no');return false">
                            <em class="fa fa-print fa-lg">&nbsp;</em>
                        </a>
                    </li>
                    <li>
                        <a class="dimgray" title="Lưu bài viết này" href="<?php echo site_url('posts/download/' . $data['post']->id); ?>">
                            <em class="fa fa-save fa-lg">&nbsp;</em>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix">
            <div class="hometext m-bottom"></div>
        </div>
        <div id="news-bodyhtml" class="bodytext margin-bottom-lg">
            <strong><span style="font-family: Arial, Helvetica, sans-serif; text-align: justify;"><?php echo $data['post']->body; ?></span></strong>
        </div>
        <div class="margin-bottom-lg">
            <p class="h5 text-right">
                <strong>Nguồn tin: </strong>ad
            </p>
        </div>
    </div>
</div>

<div class="news_column panel panel-default">
    <div class="panel-body other-news">
        <p class="h3"><strong>Những tin cũ hơn</strong></p>
        <div class="clearfix">
            <ul class="related">
                <?php
                if (isset($data['old_news']) && count($data['old_news']) > 0) {
                    foreach ($data['old_news'] as $p) {
                        $link = Post_model::GetLink($p);
                ?>
                        <li>
                            <a class="list-inline" href="<?php echo $link; ?>" data-placement="bottom" data-content="<?php echo $p->meta_description; ?>" data-img="<?php echo $p->thumb; ?>" data-rel="tooltip" data-original-title="" title="<?php echo $p->thumb; ?>">
                                <i class="fa fa-newspaper-o"></i>
                                <?php echo $p->title; ?></a>
                            <em>(<?php echo $p->created_date; ?>)</em>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>