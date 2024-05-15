<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Category_manage extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('Filter_model');


        $this->load->model('Category_filter_model');

        $this->load->library('VM_Pagination');


        $this->category_type  = $this->input->get('type', TRUE);
        $cate_types = array('category' => 'Categry', 'menu' => 'Menu Top', 'landingpage' => 'Landingpage');

        if (!isset($cate_types[$this->category_type])) {
            $this->category_type = 'menu';
        }

        $this->temp['title']    = 'Danh mục ' . $cate_types[$this->category_type];
        $this->temp['template'] = 'backend/category/category_manage_view';

        $this->temp['data']['cate_type'] = $this->category_type;



        $all_items  =  Category_model::SelectAll($this->category_type);
        $this->temp['data']['category_select'] = Category_model::GetSelectOption($all_items, 'parent_id', 'id="category_id"');


        $this->temp['data']['msg'] = $this->session->flashdata('msg');
    }

    public function index()
    {
        $this->filter_data();
        $this->render();
    }


    private function filter_data()
    {
        $limit = 500;
        $this->temp['data']['items'] = $items =  Category_model::SelectPage($this->page, $limit, $total, null);

        $list_child = Category_model::sub_child($items);
        //        echo "<pre>";print_r($list_child);die;

        $stt = 0;
        $this->temp['data']['list_rows'] = Category_model::cms_list_row2($list_child, $stt, "vi");
        $this->temp['data']['list_rows_en'] = Category_model::cms_list_row2($list_child, $stt, "en");

        $this->temp['data']['pagination'] = VM_Pagination::bootstrap($total, '', $limit);
    }


    private function post_data()
    {
        if ($this->input->method() != 'post') {
            return NULL;
        }

        $field = Category_model::$_field;

        $data = $this->input->post($field, TRUE);

        $this->load->helper('text');

        if (empty($data['slug'])) {
            $data['slug'] = url_title(convert_accented_characters($data['name']), '-', TRUE);
        }

        if (empty($data['slug_en'])) {
            $data['slug_en'] = url_title(convert_accented_characters($data['name_en']), '-', TRUE);
        }

        $data['type'] = $this->input->post('type');
        $data['show_home'] = $this->input->post('show_home');

        return $data;
    }


    public function update($id = 0)
    {
        if ($id == 0) {
            $this->temp['title']    =  'Thêm danh mục';
            $this->temp['data']['title_action']  = '<i class="fa fa-plus"></i> Thêm mới';
        } else {
            $this->temp['title']    =  'Chỉnh sửa danh mục';
            $this->temp['data']['title_action'] = '<i class="fa fa-edit"></i> Chỉnh sửa';
        }

        $item = Category_model::SelectById($id);
        $this->temp['data']['msg']  = '';


        $data = $this->post_data();
        if (empty($data['lang'])) $data['lang'] = "vi";

        if (!empty($data['name'])) {
            if (empty($data['meta_title'])) {
                $data['meta_title'] = $data['name'];
            }

            $data['content'] = $_POST['content'];
            $data['content_en'] = $_POST['content_en'];

            if (empty($data['meta_description'])) {
                $data['meta_description'] = $_POST['meta_description'];
            }
            if (empty($item)) {

                $id = Category_model::Insert($data);
                if (empty($data['sort_order']) && $id > 0) {
                    Category_model::Update($id, array('sort_order' => $id));
                }
                //

                $this->update_links_data($id);

                $this->temp['data']['msg']  = 'Thêm thành công';
            } else {
                //print_r($data);
                Category_model::Update($id, $data);
                $item = Category_model::SelectById($id);
                $this->update_links_data($id);
                $this->temp['data']['msg']  = 'Cập nhật thành công';
            }
        } else if (!empty($_POST)) {
            $this->temp['data']['msg'] = 'Tiêu đề và nội dung không được để trống';
        }

        if (empty($item)) {
            $item = (object)  $this->input->get(Category_model::$_field, TRUE);
            $item->parent_id = (int) $this->input->post('parent_id', TRUE);
        }

        $this->temp['data']['item']  = $item;
        if (!empty($item)) {
            //print_r($item);
            $this->category_type = $item->type;
        }
        $this->temp['data']['types'] = form_dropdown('type', Category_model::$_types, $this->category_type, 'class="form-control"');
        $this->temp['data']['show_home'] = form_dropdown('show_home', array('1' => 'Show Home', '0' => 'Hidden Home'), !empty($item->show_home) ? $item->show_home : '', 'class="form-control"');
        $this->temp['template'] = 'backend/category/category_manage_update_view';
        $opts = array('vi' => 'Tiếng Việt', 'en' => 'Tiếng Anh');
        $this->temp['data']['lang'] = form_dropdown('lang', $opts, isset($item->lang) ? $item->lang : 0, 'class=""');

        $this->render();
    }


    private function update_links_data($id)
    {
        $filter_id = $this->input->post('filter_id', TRUE);

        if (empty($filter_id)) {
            return FALSE;
        }

        $data = [];
        foreach ($filter_id as $v) {
            if ($v > 0) {
                $data[] = array(
                    'category_id'  => $id,
                    'filter_id' => $v
                );
            }
        }
    }

    public function sort_order($id)
    {
        $id   = (int) $id;
        $type = $this->input->post('type', TRUE);

        $cate  = Category_model::SelectById($id);
        if (empty($cate)) {
            echo 0;
            return FALSE;
        }

        $data = array('sort_order' => $cate->sort_order);

        if ($type == '+') {
            $data['sort_order']++;
        } else {
            if ($cate->sort_order >= 1) {
                $data['sort_order']--;
            }
        }

        if ($data['sort_order'] != $cate->sort_order) {
            Category_model::Update($id, $data);
            echo 1;
        } else {
            echo 0;
        }
    }

    function delete($id)
    {
        $id = (int) $id;
        if ($id > 0) {
            $item = Category_model::SelectById($id);
            if ($item) {
                Category_model::Delete($id);
                echo $id;
                return TRUE;
            }
        }
        echo 0;
    }
}
