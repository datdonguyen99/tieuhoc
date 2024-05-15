<!-- <nav class="second-nav" id="menusite"> -->
<!-- <div class="bg box-shadow menu-res"> -->

<!-- <nav class="navbar navbar-default"> -->

<!-- <div class=" navbar-collapse lateral-left" id=""> -->
<ul class="navbar-nav slimmenu">
    <li class="nav-item">
        <a title="Trang chủ" href="/"><em class="fa fa-lg fa-home">&nbsp;</em>
        </a>
    </li>
    <?php
    if (isset($menu) && !empty($menu)) {
        foreach ($menu as $m) {
            $subs = Category_model::SelectByParentId($m->id);
            $link = Category_model::GetLink($m);
            if (!empty($subs)) {
                echo "<li class='nav-item dropdown'><a class='nav-link dropdown-toggle' id='navbarDropdown_$m->id' role='button' data-bs-toggle='dropdown' aria-expanded='false' title='$m->name' href='#'>$m->name</a>";
                echo "<ul aria-labelledby='navbarDropdown_$m->id'>";
                foreach ($subs as $sb) {
                    $link = Category_model::GetLink($sb);
                    echo "<li><a class='dropdown-item' title='$sb->name' href='$link'>$sb->name</a></li>";
                }
                echo "</ul>";
            } else
                echo "<li class='nav-item'><a title='$m->name' href='$link'>$m->name</a>";
            echo "</li>";
    ?>
    <?php
        }
    }
    ?>
</ul>
<!-- </div> -->
<!-- </nav> -->
<!-- </div>
</nav> -->