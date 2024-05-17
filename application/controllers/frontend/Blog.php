<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('SchoolInfoModel');
        // $this->load->model('Category_model');
        // $this->load->model('Upload_data_model');

        $this->load->helper('text');
        $this->load->helper('download');
        $this->temp['config']['home'] = 0;
    }

    public function detail($slug, $id)
    {
        $id = (int) $id;
        $item = Post_model::SelectById($id);
        $item = Post_model::ShowByLang($item, LANG);
        if (empty($item)) {
            redirect();
        }
        $old_news = Post_model::SelectOldNews($item->type);

        $view_num = $item->view_number + 1;
        $temp['view_number'] = $view_num;
        //Post_model::Update($id,$temp);
        // $this->temp['data']['category'] = Category_model::ShowByLang(Category_model::SelectById($item->category_id), LANG);
        // $this->temp['config']['category'] = $cate;
        // $this->temp['data']['category'] = Category_model::SelectById($id);
        $this->temp['data']['post'] = $item;
        $this->temp['data']['old_news'] = $old_news;
        // $this->temp['config']['post']      = $item;
        //$this->temp['data']['blog_tags'] = Tags_model::SelectByObjectIdType($item->id, $this->blog_type);
        // $this->temp['title'] = (!empty($item->meta_title)) ? $item->meta_title : $item->title;
        // $this->temp['description'] = ($this->lang == "en") ? $item->meta_description_en : $item->meta_description;
        // $this->temp['keywords'] = $item->meta_keywords;
        $this->temp['template'] = '/frontend/blog/blog_detail_view';

        // $this->temp['data']['lang'] = $this->lang;
        // $this->temp['data']['releated'] = Post_model::SelectByCategoryId2($item->category_id);
        // $this->temp['data']['files'] = Upload_data_model::SelectByObjID_ObjType($id, 'post');

        $this->render();
    }

    public function print($id)
    {
        $post = Post_model::SelectById($id);
        if ($post) {
            $data['post'] = $post;
            $this->load->view('frontend/blog/blog_preview_print_view', $data);
        }
    }

    public function download($id)
    {
        $post = Post_model::SelectById($id);
        if ($post) {
            $content = "<!DOCTYPE html>
                        <html lang='en'>
                            <head>
                                <meta charset='UTF-8'>
                                <title>{$post->slug}</title>
                            </head>
                            <body>
                                <h1>{$post->title}</h1>
                                <p>{$post->body}</p>
                            </body>
                        </html>";
            $filename = url_title($post->slug, 'dash', TRUE) . '.html';
            force_download($filename, $content);
        }
    }

    public function blog_list($slug)
    {
        $category =  Category_model::SelectBySlug($slug);
        if (empty($category)) {
            redirect();
        }
        $bread = array(
            'title' => $category->name
        );
        $this->temp['data']['items'] = Post_model::SelectByCategoryId($category->id, $this->page, $this->limit, $total);

        $this->temp['data']['pagination'] = VM_Pagination::bootstrap($total, '', $this->page);
        $this->temp['data']['category'] = $category;
        $this->temp['data']['bread'] = $bread;
        $this->temp['title'] = $category->meta_title;
        $this->temp['template'] = 'frontend/blog/blog_list_view';
        $page = 1;
        if ($this->input->get('p') > 0) $page = $this->input->get('p');
        $this->temp['data']['page'] = $page;
        $this->render();
    }


    public function tags_list($slug)
    {
        $keyword =  Keywords_model::SelectBySlug($slug);
        if (empty($keyword)) {
            redirect();
        }

        $this->temp['data']['items'] = Keywords_model::SelectPostByKey($keyword->id, $this->blog_type, $total, $this->page, $this->limit);

        $this->temp['data']['pagination'] = VM_Pagination::bootstrap($total, '', $this->page);
        $this->temp['data']['blog_keyword'] = $keyword;
        $this->temp['title']     = empty($keyword->meta_title) ? 'Tag ' . $keyword->keyword : $keyword->meta_title;
        $this->temp['template'] = 'frontend/blog/blog_tags_list_view';
        $this->render();
    }
}
