<div class="document-navbar">
    <div class="clearfix panel metismenu">
        <aside class="sidebar">
            <nav class="sidebar-nav">
                <ul id="menu_61">
                    <?php
                    $sideBarContent = SchoolInfoModel::SelectAll();
                    if (isset($sideBarContent) && count($sideBarContent) > 0) {
                        foreach ($sideBarContent as $s) {
                    ?>
                            <li class="current">
                                <a title="<?php echo $s->name; ?>" href="/"><img src="<?php echo $s->thumb; ?>" />
                                    &nbsp;<?php echo mb_strtoupper($s->name, 'UTF-8'); ?>
                                </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </nav>
        </aside>
    </div>
</div>

<div class="menuqt">
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
</div>

<div class="table">
    <div class="panel panel-default">
        <div class="panel-heading panel-table">
            Thống kê truy cập
        </div>
        <div class="panel-body">
            <ul class="counter list-none display-table">
                <li><span><em class="fa fa-bolt fa-lg fa-horizon"></em>Đang truy cập</span><span>1</span></li>
                <li><span><em class="fa fa-filter fa-lg fa-horizon margin-top-lg"></em>Hôm nay</span><span class="margin-top-lg">222</span></li>
                <li><span><em class="fa fa-calendar-o fa-lg fa-horizon"></em>Tháng hiện tại</span><span>4,802</span></li>
                <li><span><em class="fa fa-bars fa-lg fa-horizon"></em>Tổng lượt truy cập</span><span>149,272</span></li>
            </ul>
        </div>
    </div>
</div>