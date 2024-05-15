<div class="container">
    <div class="row">
        <section itemscope=""  class="right-content col-lg-9 col-lg-push-3">
            <div class="col-md-12 list-blog">
                <h1 class="title-page margin-top-0"><?php echo $blog_keyword->keyword?></h1>
                <div class="list-article clearfix">
                    <div class="row">
                        <?php foreach ($items as $p):
                            $link = Post_model::GetLink($p);
                            $post_date = date('d/m/Y', strtotime($p->created_date));

                            ?>
                            <div class="col-md-6 col-sm-12 col-xs-12 article-clear">
                                <div class="article clearfix">
                                    <div class="article-img">
                                        <a href="<?php echo $link?>">
                                            <img src="<?php echo $p->thumb?>" alt="<?php echo $p->title?>" title="<?php echo $p->title?>">
                                        </a>
                                    </div>
                                    <div class="article-info clearfix">
                                        <a href="<?php echo $link?>" title="<?php echo $p->title?>">
                                            <h3 class="article-name">
                                                <?php echo $p->title?>
                                            </h3>
                                        </a>
                                        <p class="article-date-create">
                                            <span>Đăng bởi <span class="name-admin">Admin</span></span>
                                            <span class="line"></span>
                                            <span><time datetime="<?php echo $post_date?>" class="entry-date"><?php echo $post_date?></time></span>
                                        </p>
                                        <p class="article-des"><?php echo $p->short_description?></p>
                                    </div>

                                    <div class="article-action">
                                        <a href="<?php echo $link?>">Xem thêm<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;?>

                    </div>
                </div>

                <?php echo $pagination ?>

            </div>



        </section>

        <aside class="left left-content blog-side-bar-clear col-lg-3 col-lg-pull-9">
            <div class="side-bar">

                <?php $this->load->View('frontend/blog/blog_sidebar_view')?>


                <div class="blogs-tags clearfix">
                    <h2>Tags</h2>
                    <div class="list-tag">
                        <?php
                        if (!empty($items)):
                            $tags = $items[0]->tags;
                            $tags = explode(',',$tags);

                            foreach ($tags as $t):
                                $tag = url_title(convert_accented_characters($t), '-', TRUE);
                                $link = '/tag-tin-tuc/'.$tag;
                                ?>
                                <span><a href="<?php echo $link?>"><?php echo $t?>, </a></span>


                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>

            </div>
        </aside>


    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="line-end"></div>
        </div>
    </div>
</div>