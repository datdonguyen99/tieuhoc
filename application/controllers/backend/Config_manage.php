<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config_manage extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Config_model');

    }

    public function index()
    {
        $page = (int) $this->input->get('page', TRUE);
        $key  = $this->input->get('key',TRUE);
        $key_temp = '';
        $limit  = 20;
        if ($page <1){$page = 1;}
        $this->load->library('VM_Pagination');
        if ($key)
        {
            $key_temp = $key;
        }

        if(Count(Config_model::SelectAll())==0){
            self::insert_data_default();
        }

        $items = Config_model::Filter($key,$page,$limit, $total);
        $this->temp['data']['key'] = $key_temp;
        $this->temp['data']['pagination'] = VM_Pagination::bootstrap($total, '', $limit);
        $this->temp['data']['items'] = $items;
        
        $this->temp['template'] = 'backend/config/config_manage_view';
        $this->render();

    }

    public function update($id)
    {

        $_fields = array('name','value');
        $post_data = $this->input->post($_fields,TRUE);
        $title = 'Update';
        $item = Config_model::SelectById($id);

        if ($_POST)
        {
            $this->temp['data']['msg'] = Commons::ShowSuccessMessage('Cập nhật thành công');
			$url = $this->uploadFileLogo();
			if(!empty($url)){
				$post_data['value']=$url;
			}
            Config_model::Update($id,$post_data);

        }
        $this->temp['data']['item'] = $item;
        $this->temp['data']['title_action'] = $title;
        $this->temp['template'] = 'backend/config/config_manage_update';
        $this->render();
    }

    public function detail($config_id)
    {
        $config_id = (int)$config_id;
        $config = Config_model::SelectById($config_id);
        $this->temp['data']['item'] = $config;
        $this->temp['template'] = 'backend/config/config_manage_detail';
        $this->render();
    }


    public function delete($id)
    {
        $id = (int)$id;
        $store = Contact_model::SelectById($id);

        if ($store)
        {
            Contact_model::Delete($id);
            echo 1;
            return TRUE;
        }
        echo 0;
        return FALSE;
    }

    public function insert_data_default()
    {
        $data = Config_model::$_default_data;
        foreach ($data as $key=>$value )
        {
            $tmp['key'] = $value['key'];
            $tmp['value'] = $value['value'];
            $tmp['name'] = $value['name'];
            Config_model::Insert($tmp);
        }

    }

    public function test($key){
        $data = Config_model::get_news($key);
        echo "<pre>";print_r($data);die;
    }

	private function uploadFileLogo(){

		$allowTypes = array('jpg','png','jpeg','gif');
		$targetDir = "uploads/";
		$thumb_arr = array();
		foreach($_FILES['files']['name'] as $key=>$val){
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
			if(in_array($fileType, $allowTypes)){
				// Store images on the server
				if(move_uploaded_file($_FILES['files']['tmp_name'][$key], $targetFilePath)){
					$thumb_arr[] = "/".$targetFilePath;
					return "/".$targetFilePath;
					//Upload_data_model::Insert(array('file_name'=>$fileName,'file_type'=>$fileType,'file_size'=>$size,'obj_id'=>$post_id,'obj_type'=>'post','meta_link'=>"/".$targetFilePath));
				}
			}
		}
		return null;
	}
}
