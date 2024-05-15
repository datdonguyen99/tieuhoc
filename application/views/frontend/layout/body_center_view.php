<div class=" panel-default">
    <div class="blocknew">
        <h3>Sự kiện nhà trường</h3>
    </div>
    <div class="hCat-content">
        <ul style="padding-left: 0px;">
            <?php
            $events = Post_model::SelectByType(1);

            if (isset($events) && count($events) > 0) {
                foreach ($events as $e) {
                    $link = Post_model::GetLink($e);
            ?>
                    <li class="clearfix">
                        <a href="<?php echo $link; ?>" title="<?php echo $e->title; ?>"><img src="<?php echo $e->thumb; ?>" alt="<?php echo $e->title; ?>" width="80px" height="90px" class="img-thumbnail pull-left" /></a>
                        <a class="show" href="<?php echo $link; ?>"><?php echo $e->title; ?></a>
                        <p><?php echo $e->meta_description; ?></p>
                    </li>
            <?php
                }
            }
            ?>
        </ul>
    </div>
</div>