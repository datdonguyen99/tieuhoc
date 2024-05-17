<?php
// print_r($data['side_bars']);
// print_r($data['side_bar_sliders'][0]);
?>

<div class="treeviewedu08Action clearfix">
    <ul id="navigation67" class="treeview">
        <?php
        if (isset($data['side_bars']) && count($data['side_bars']) > 0) {
            foreach ($data['side_bars'] as $s) {
        ?>
                <li class="current">
                    <a title="<?php echo $s->name; ?>" href="/"><img src="<?php echo $s->thumb; ?>" /><br />
                        <?php echo mb_strtoupper($s->name, 'UTF-8'); ?>
                    </a>
                </li>
        <?php
            }
        }
        ?>
    </ul>
</div>
<div class="clear"></div>
<div class="lienkethuuich">
    <?php
    if (isset($data['side_bar_sliders']) && count($data['side_bar_sliders']) > 0) {
        $firstSideBar = $data['side_bar_sliders'][0];
    ?>
        <img class="title_lkhi" src="<?php echo $firstSideBar->thumb; ?>">
        <ul id="flexiselDemo3">
            <?php
            for ($i = 1; $i < count($data['side_bar_sliders']); ++$i) {
            ?>
                <li>
                    <a href=""><img src="<?php echo $data['side_bar_sliders'][$i]->thumb; ?>" height="100%" alt="" title="" /></a>
                </li>
        <?php
            }
        }
        ?>
</div>
<div class="clear"></div>
<div id="htqt">
    <div class="blocknew">
        <h3>HỆ THỐNG QUẢN TRỊ</h3>
    </div>
    <div class="panel-body hethongquangtri">
        <div class="style_nav">
            <ul id="sample-menu-4" class="sf-menu sf-navbar sf-js-enabled sf-shadow">
                <li>
                    <a title="Đăng nhập" href="/users/"><strong>Đăng nhập</strong></a>
                </li>
                <li>
                    <a title="Hộp thư ngành" href="/contact/"><strong>Hộp thư ngành</strong></a>
                </li>
                <li>
                    <a title="Thống kê giáo dục" href="/statistics/"><strong>Thống kê giáo dục</strong></a>
                </li>
                <li>
                    <a title="Diễn đàn giáo dục" href="/page/"><strong>Diễn đàn giáo dục</strong></a>
                </li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>