<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner_manage extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Banner_model');
		$this->load->library('VM_Pagination');
		$this->temp['title']	= 'Banner';

		$this->temp['data']['msg'] = $this->session->flashdata('msg');
	}

	public function index()
	{

		$this->temp['data']['items'] = Banner_model::SelectPage($this->page, 20, $total);

		$this->temp['data']['pagination'] = VM_Pagination::bootstrap($total, '', $this->limit);

		$this->temp['template'] = 'backend/banner/banner_manage_view';

		$this->render();
	}

	public function create()
	{
		$data = $this->post_data();
		$item = (object) $data;
		$item->id = 0;

		if (!empty($_POST)) {
			if (!empty($item->name) && !empty($item->thumb)) {
				//$data['type'] = 'home-slider';
				Banner_model::Insert($data);
				$this->session->set_flashdata('msg', '<span class="text-success">Create success</span>');

				if (isset($_POST['btn-save-back'])) {
					redirect($this->temp['data']['base_link']);
				}

				$item = (object) $this->input->get(Banner_model::$_field, TRUE);
			} else {
				$this->temp['data']['msg'] = '<span class="text-warning">Vui lòng nhập tiêu đề, hình banner, link</span>';
			}
		}

		$this->temp['data']['item'] = $item;

		$this->temp['data']['btn_submit'] = '<i class="fa fa-save"></i> Create';
		$this->temp['title']	= 'Tạo Banner';
		$this->temp['template'] = 'backend/banner/banner_manage_update_view';
		$this->loadTypes('');
		$this->render();
	}

	private function loadTypes($type)
	{
		$this->temp['data']['types'] = form_dropdown('type', Banner_model::$_type, $type, 'class="form-control"');
	}

	public function edit($id)
	{
		$id = (int) $id;

		$item = Banner_model::SelectById($id);
		if (empty($item)) {
			redirect($this->temp['data']['base_link']);
		}

		$data = $this->post_data();
		if (!empty($_POST)) {

			if (!empty($data['name']) && !empty($data['thumb'])) {
				//$data['type'] = 'home-slider';
				Banner_model::Update($id, $data);
				$this->session->set_flashdata('msg', '<span class="text-success">Save success</span>');

				if (isset($_POST['btn-save-back'])) {
					redirect($this->temp['data']['base_link']);
				}

				$item = Banner_model::SelectById($id);
			} else {
				$this->temp['data']['msg'] = '<span class="text-warning">Vui lòng nhập tiêu đề, hình banner, link</span>';
			}
		}

		$this->temp['data']['item'] = $item;

		$this->temp['title']	= 'Edit Banner';
		$this->temp['data']['btn_submit'] = '<i class="fa fa-save"></i> Save';
		$this->temp['template'] = 'backend/banner/banner_manage_update_view';
		$this->loadTypes($item->type);
		$this->render();
	}

	private function post_data()
	{
		$field = Banner_model::$_field;
		$data = $this->input->post($field, TRUE);
		return $data;
	}

	function delete($id)
	{
		if ($id > 0) {
			Banner_model::Delete($id);
			echo $id;
		}
	}
}

/* End of file Banner_manage.php */
/* Location: ./application/controllers/backend/Banner_manage.php */
