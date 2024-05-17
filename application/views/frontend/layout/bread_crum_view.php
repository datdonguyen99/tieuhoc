<?php
// print_r($category);
// print_r('------------');
// print_r($parentCategory);
?>


<ul class="row breadcrumbs list-none" itemscope itemtype="https://schema.org/BreadcrumbList">
    <?php
    if (isset($parentCategory) && !empty($parentCategory)) {
    ?>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="/" itemprop="item" title="Trang nhất">
                <span itemprop="name"><?php echo $parentCategory[0]->name; ?></span>
            </a>
            <i class="hidden" itemprop="position" content="1"></i>
        </li>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="/" itemprop="item" title="<?php echo $parentCategory[0]->name; ?>">
                <span class="txt" itemprop="name"><?php echo $category->name; ?></span>
            </a>
            <i class="hidden" itemprop="position" content="2"></i>
        </li>
    <?php
    } else {
    ?>
        <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
            <a href="/" itemprop="item" title="Trang nhất">
                <span itemprop="name"><?php echo $category->name; ?></span>
            </a>
            <i class="hidden" itemprop="position" content="1"></i>
        </li>
    <?php
    }
    ?>
</ul>