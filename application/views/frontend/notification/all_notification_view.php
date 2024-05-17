<?php
// print_r($data['all_notification']);
if (empty($data['all_notification'])) return;
?>

<div class="news_column">
    <?php
    if (isset($data['all_notification']) && count($data['all_notification']) > 0) {
        foreach ($data['all_notification'] as $n) {
            $link = Post_model::GetLink($n);
    ?>
            <div class="panel panel-default">
                <div class="panel-body featured">
                    <h2>
                        <a href="<?php echo $link; ?>" title="<?php echo $n->title; ?>"><?php echo $n->title; ?></a>
                    </h2>
                    <div class="text-muted">
                        <ul class="list-unstyled list-inline">
                            <li>
                                <em class="fa fa-clock-o">&nbsp;</em> <?php echo $n->created_date; ?>
                            </li>
                            <li>
                                <em class="fa fa-eye">&nbsp;</em> Đã xem: <?php echo $n->view_number; ?>
                            </li>
                            <li>
                                <em class="fa fa-comment-o">&nbsp;</em> Phản hồi: 0
                            </li>
                        </ul>
                    </div>
                    <p>
                    </p>
                </div>
            </div>
    <?php
        }
    }
    ?>
</div>