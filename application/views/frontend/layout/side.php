<div id="left">
    <div class="wapdm">
        <div class="dm-left">
            <div class="dm-head">
                <p>DANH MỤC SẢN PHẨM CÂN</p>
            </div>
            <div class="dm-ct">
                <ul>
                    <?php
					$cates = Category_model::SelectByParentId(81);
					if(!empty($cates)){
						foreach($cates as $c){
							$link = Category_model::GetLink($c);
							?>
							<li><a href="<?php echo $link; ?>"><?php echo $c->name ?></a></li>
							<?php
						}
					}
					?>
                </ul>
            </div>
        </div>
    </div>

    <div class="wapdm">
        <div class="dm-left">
            <div class="dm-head">
                <p>THIẾT BỊ - PHỤ KIỆN CÂN</p>
            </div>
            <div class="dm-ct">
                <ul>
					<?php
					$cates = Category_model::SelectByParentId(82);
					if(!empty($cates)){
						foreach($cates as $c){
							$link = Category_model::GetLink($c);
							?>
							<li><a href="<?php echo $link; ?>"><?php echo $c->name ?></a></li>
							<?php
						}
					}
					?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php 


?>
