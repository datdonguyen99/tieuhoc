<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog_manage extends Admin_Controller
{
	protected $page;
	function __construct()
	{
		parent::__construct();
		$this->load->model('Post_model');
		$this->load->model('Upload_data_model');
		$this->load->model('Banner_model');
		$this->load->model('Category_model');
		$this->load->model('Keywords_model');
		$this->load->model('Tags_model');
		$this->temp['template'] = 'backend/blog/blog_manage_view';
		$this->temp['title'] = 'Bài viết';
		$this->blog_type = 'news';
		$this->page = $this->input->get('page');
		if (empty($this->page)) $this->page = 1;
	}

	private function post_data()
	{
		if ($this->input->method() != 'post') {
			return NULL;
		}

		$field = Post_model::$_fields; //array('title', 'category_id', 'thumb', 'meta_description','meta_keywords', 'short_description', 'slug', 'tags','banner_thumb','meta_title');
		$data = $this->input->post($field, TRUE);
		$data['body'] = $_POST['body'];
		$data['body_en'] = $_POST['body_en'];
		//if(empty($data['lang'])) $data['lang'] = "vi";
		$this->load->helper('text');

		if (empty($data['meta_description'])) {
			if (!empty($data['short_description'])) {
				$data['meta_description'] = $data['short_description'];
			} else $data['meta_description'] = word_limiter(strip_tags($data['body']), 20);
		}
		if (empty($data['meta_keywords'])) {
			if (!empty($data['tags'])) {
				$data['meta_keywords'] = $data['tags'];
			} else $data['meta_keywords'] = word_limiter(strip_tags($data['body']), 20);
		}

		if (empty($data['slug'])) {
			$data['slug'] = url_title(convert_accented_characters($data['title']), '-', TRUE);
		}

		if (empty($data['slug_en'])) {
			$data['slug_en'] = url_title(convert_accented_characters($data['title_en']), '-', TRUE);
		}

		$data['news_update'] = intval($data['news_update']);
		if (empty($data['thumb'])) $data['thumb'] = "/assets/images/No_Image_Available.jpg";

		return $data;
	}



	public function index()
	{
		$this->filter_data();
		$this->render();
	}

	private function filter_data()
	{
		$key = $this->input->get('key', TRUE);
		$category_id = (int) $this->input->get('category_id', TRUE);

		$keyword_id = (int) $this->input->get('keyword_id', TRUE);


		$this->temp['data']['category_id'] = $category_id;
		$this->temp['data']['key']	= $key;


		$limit = 25;

		if (!empty($key) || !empty($category_id)) {
			$this->temp['data']['items'] = Post_model::Filter($key, $category_id, $this->page, $limit, $total);
		} else {

			$this->temp['data']['items'] = Post_model::SelectPage($this->page, $limit, $total, TRUE);
		}

		if ($keyword_id > 0) {
			$this->temp['data']['items'] = Post_model::SelectByKeyWordId($keyword_id, $this->page, $limit, $total);
		}


		$this->load->library('VM_Pagination');

		$this->temp['data']['pagination'] = VM_Pagination::bootstrap($total, '', $limit);
	}


	public function update($id = 0)
	{
		$item = Post_model::SelectById($id);
		$this->temp['data']['msg']  = '';

		$data = $this->post_data();
		//$banner_data['thumb'] = $data['banner_thumb'] ;
		//$banner_data['post_id'] = $id ;
		//$banner_data['type'] = $this->blog_type;
		$banner = Banner_model::SelectByPostId($id);
		unset($data['banner_thumb']);
		if (!empty($data['title']) && !empty($data['body'])) {
			if (empty($item)) {
				$data['created_date'] = date('Y-m-d H:i:s');
				$tag = explode(',', $data['tags']);

				$item = Post_model::SelectBySlug($data['slug']);

				if ($item) {
					$this->temp['data']['msg']  = Commons::ShowErrorMessage('Bài viết đã tồn tại, lưu ý tiêu đề phải viết là duy nhất', true, true);
				} else {
					$data['user_id'] = $this->user_info['id'];
					$id_ob = Post_model::Insert($data);

					//insert banner
					//                	$banner_data['post_id'] = $id_ob;
					//                	Banner_model::Insert($banner_data);

					//insert data upload file
					$files = $this->uploadFileVB($id_ob);


					if ($tag) {
						self::keyword($tag, $id_ob);
					}

					$this->temp['data']['msg']  = Commons::ShowSuccessMessage('Thêm thành công', true);
				}
			} else {
				$data['created_date'] = date('Y-m-d H:i:s');

				Post_model::Update($id, $data);

				//insert data upload file
				$this->uploadFileVB($id);

				//$this->update_banner($banner_data);
				$tag = explode(',', $data['tags']);

				$list_tag = Tags_model::SelectByObjectIdType($id);

				foreach ($list_tag as $l) {
					Tags_model::Delete($l->id);
				}

				self::keyword($tag, $id);
				$item = Post_model::SelectById($id);
				$this->temp['data']['msg']  = Commons::ShowSuccessMessage('Cập nhật thành công', true);
			}
		} else if (!empty($_POST)) {
			$this->temp['data']['msg'] = Commons::ShowErrorMessage('Tiêu đề và nội dung không được để trống', true, true);
		}

		if (empty($item)) {
			$item = new stdClass();
			$item->title = NULL;
			$item->title_en = NULL;
			$item->thumb = NULL;
			$item->body  = NULL;
			$item->body_en  = NULL;
			$item->meta_description = NULL;
			$item->meta_description_en = NULL;
			$item->meta_keywords = NULL;
			$item->meta_keywords_en = NULL;
			$item->meta_title_en = NULL;
			$item->short_description = NULL;
			$item->category_id = 0;
			$item->tags = NULL;
			$item->meta_title = '';
			$item->news_update = false;
			$item->lang = 'vi';
		}



		$this->temp['data']['title_action'] = ($id == 0) ? '<i class="fa fa-plus"></i> Thêm mới' : '<i class="fa fa-edit"></i> Chỉnh sửa';

		$this->temp['data']['item']  = $item;
		$this->temp['data']['banner']  = $banner;

		$this->temp['template'] = 'backend/blog/blog_update_view';
		$this->temp['data']['category_options'] = Category_model::SelectOptionHtml('menu', $item->category_id);
		$opts = array('vi' => 'Tiếng Việt', 'en' => 'Tiếng Anh');
		$this->temp['data']['lang'] = form_dropdown('lang', $opts, isset($item->lang) ? $item->lang : "vi", 'class=""');
		// $this->temp['data']['files'] = $id > 0 ? Upload_data_model::SelectByObjID_ObjType($id, 'post') : null;
		$this->render();
	}

	private function uploadFileVB($post_id)
	{
		if ($post_id < 1) return;
		$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'doc', 'docx', 'xls', 'xlsx');
		$targetDir = "uploads/vanban/";
		$thumb_arr = array();
		foreach ($_FILES['files']['name'] as $key => $val) {
			$image_name = $_FILES['files']['name'][$key];
			$tmp_name     = $_FILES['files']['tmp_name'][$key];
			$size         = $_FILES['files']['size'][$key];
			$type         = $_FILES['files']['type'][$key];
			$error         = $_FILES['files']['error'][$key];

			// File upload path
			$fileName = basename($_FILES['files']['name'][$key]);
			$targetFilePath = $targetDir . $fileName;

			// Check whether file type is valid
			$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
			if (in_array($fileType, $allowTypes)) {
				// Store images on the server
				if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFilePath)) {
					$thumb_arr[] = "/" . $targetFilePath;
					Upload_data_model::Insert(array('file_name' => $fileName, 'file_type' => $fileType, 'file_size' => $size, 'obj_id' => $post_id, 'obj_type' => 'post', 'meta_link' => "/" . $targetFilePath));
				}
			}
		}
		return $thumb_arr;
	}


	function delete($id)
	{
		$id = (int) $id;

		$is_deleted = -1;
		if ($id > 0) {
			$item = Post_model::SelectById($id);
			if ($item) {
				Post_model::Delete($id);
			}
		}

		echo $is_deleted;
	}

	public  function keyword($tag, $id_ob)
	{
		$data_tag = array();
		$data_key = array();
		foreach ($tag as $t) {
			$t = trim($t);

			if (empty($t)) {
				continue;
			}

			$data_key['keyword'] = $t;
			$key = Keywords_model::SelectByKeyWord($t);
			if ($key && $id_ob) {

				$data_tag['object_id'] = $id_ob;

				$data_tag['keyword_id'] = $key->id;

				Tags_model::Insert($data_tag);
			} else if (!$key) {
				$data_key['slug'] =  url_title(convert_accented_characters($t), '-', TRUE);

				$data_key['created_date'] =  date('Y-m-d H:i:s');

				$key = Keywords_model::Insert($data_key);

				$data_tag['keyword_id'] = $key;

				$data_tag['object_id'] = $id_ob;
				Tags_model::Insert($data_tag);
			}
		}
	}

	public function update_banner($data)
	{
		$item  = Banner_model::SelectByPostId($data['post_id'], $data['type']);
		if ($item) {
			Banner_model::Update($item->id, $data);
		} else {
			Banner_model::Insert($data);
		}
	}
}
