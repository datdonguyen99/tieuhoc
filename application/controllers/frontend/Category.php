<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category extends Frontend_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('SchoolInfoModel');
        $this->load->helper('text');
        $this->temp['config']['home'] = 0;
    }

    function index($slug, $id)
    {
        $this->temp['template'] = 'frontend/category/category_view';
        // $p = $this->input->get('p');
        // $total = 0;
        // if (empty($p)) $p = 1;
        // $size = 18;
        if ($slug) {
            $cate = Category_model::SelectBySlug($slug);
            if (empty($cate))
                redirect('/');
            $cate = Category_model::ShowByLang($cate, LANG);
            $parentCate = Category_model::SelectParentByParentId($cate->parent_id);
            $this->temp['data']['category'] = $cate;
            $this->temp['data']['parentCategory'] = $parentCate;;
            // $this->temp['config']['category'] = $cate;
            // if ($cate->parent_id > 0) {
            //     $this->temp['data']['pr'] = Category_model::SelectById($cate->parent_id);
            // } else $this->temp['data']['pr'] = $cate;
            // $this->temp['data']['pr'] = Category_model::ShowByLang($this->temp['data']['pr'], LANG);
            $this->temp['title'] = $cate->name;

            // $this->temp['data']['paging_posts'] = null;
            // $this->temp['data']['paging_products'] = null;
            // $posts = Post_model::SelectByCategoryId2Paging($cate->id, $p, $size);


            // if (!empty($posts)) {
            //     if (count($posts) < 1) {
            //         $this->temp['template'] = 'frontend/category/category_view';
            //     } else {
            //         $this->temp['data']['posts'] = $posts;
            //         $this->temp['data']['paging_posts'] = VM_Pagination::bootstrap($total, '/' . uri_string(), 18);
            //         $this->temp['template'] = 'frontend/blog/blog_list_view';
            //     }
            //     $total = Post_model::CountByCategoryID($cate->id);
            // } else {
            //     $products = Product_model::SelectByCateId($cate->id, $p, 18, $total);
            //     if ($products) {
            //         $this->temp['template'] = 'frontend/product/product_list';
            //         $this->temp['data']['products'] = $products;
            //         $this->temp['data']['paging_products'] = VM_Pagination::bootstrap($total, '/' . uri_string(), 18);
            //     } else {
            //         $this->temp['template'] = 'frontend/category/category_view';
            //     }
            // }

            // $this->temp['title'] = ($this->lang == "en") ? $cate->meta_title_en : $cate->meta_title;
            // $this->temp['description'] = ($this->lang == "en") ? $cate->meta_description_en : $cate->meta_description;
            // $this->temp['keywords'] = $cate->name;
            // $this->temp['data']['lang'] = $this->lang;
            // $this->temp['data']['page'] = $p;
            // $this->temp['data']['total'] = round($total / 2);
        } else {
            redirect('/');
        }
        //echo LANG;
        //print $this->temp['template'];
        $this->render();
    }

    // function loadTinDaLuu()
    // {
    //     $cookie = get_cookie('news_save');
    //     $this->temp['template'] = 'frontend/category/product_list';
    //     $this->temp['data']['cate_title'] = "Tin đã lưu";
    //     $this->temp['title'] = "Tin đã lưu";
    //     if (!empty($cookie)) {
    //         //var_dump($cookie);
    //         $pts = Product_model::SelectByListID($cookie);
    //         $this->temp['data']['products'] = $pts;
    //     }
    //     $this->render();
    // }

    // function loadTinTuc()
    // {
    //     $slug = 'tin-tuc';
    //     $cates = Category_model::SelectMenuParent('cate');
    //     $page = $this->input->get('page');
    //     if (empty($page)) $page = 1;
    //     $total = 0;
    //     if (!empty($cates)) {
    //         $li = array();
    //         foreach ($cates as $cate) {
    //             $li[] = $cate->id;
    //         }
    //         $this->temp['title'] = "Tất cả tin tức";
    //         $this->temp['data']['cate_title'] = "Tất cả tin tức";
    //         $this->temp['data']['posts'] = Post_model::SelectByCategoryIdList($li, $page, 21, $total);
    //     }
    //     $this->temp['data']['pagination'] = VM_Pagination::bootstrap($total, '/tin-tuc', 21);
    //     $this->temp['template'] = 'frontend/blog/blog_list_view';
    //     $this->render();
    // }

    // function loadProductMore($cate_id, $page = 1)
    // {
    //     if (!is_numeric($cate_id)) return;
    //     if ($cate_id < 1) return;
    //     if (!is_numeric($page)) return;
    //     if ($page < 1) return;
    //     $products = Product_model::SelectByCateId($cate_id, $page, 4, $total);
    //     if (!empty($products)) {
    //         echo $this->load->view('frontend/more/product_home_more', array('products' => $products), true);
    //         return;
    //     } else echo 0;
    //     return;
    // }

    // function Post($slug)
    // {
    //     if (empty($slug) || !is_numeric($id) || $id < 1)
    //         redirect('/');

    //     $product = Product_model::SelectById($id);
    //     if (empty($product))
    //         redirect('/');

    //     $this->temp['title'] = $product->name;
    //     $this->temp['description'] = $product->meta_description;
    //     $this->temp['keywords'] = $product->meta_keywords;
    //     $this->temp['f_image'] = $product->thumb;
    //     $this->temp['data']['product'] = $product;
    //     $cols = array(
    //         'views' => $product->views + 1
    //     );
    //     Product_model::Update($id, $cols);
    //     $this->render();
    // }
}
