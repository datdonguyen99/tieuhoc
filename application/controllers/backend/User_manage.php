<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_manage extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('VM_Pagination');
        //$this->load->model('Filter_model');
        //$this->load->model('Filter_group_model');
        //$this->load->model('Category_filter_model');

        $this->temp['title']    = 'QL User';
        $this->temp['template'] = 'backend/user_manage_view';

    }

    public function index($id=0)
    {
		$_fields = array('name','email','phone','password');
		$data = $this->input->post($_fields,TRUE);

		if ($_POST && $data && $id==0) {
			$data['role']='M';
			User_model::Insert($data);
			$this->temp['data']['msg'] = Commons::ShowSuccessMessage("Thêm mới thành công");
		}
		else if($_POST && $data && $id>0){
			$this->temp['data']['uc'] = User_model::SelectById($id);
			if($this->temp['data']['uc'])
			{
				$dt['name'] = $data['name'];
				$dt['email'] = $data['email'];
				if(!empty($data['password']))
					$dt['password'] = $data['password'];
				User_model::Update($id, $dt);
				$this->temp['data']['msg'] = Commons::ShowSuccessMessage("Cập nhật thành công");
			}
		}
		if($id>0){
			$this->temp['data']['uc'] = User_model::SelectById($id);
		}
		$this->temp['data']['users'] = User_model::SelectAll();
		$this->render();
    }

    public function get_list_user()
    {
        $list = User_model::SelectAll();
        echo json_encode($list);
        return TRUE;
    }


    public function created_user()
    {

        $_fields = array('name','email','phone');
        $data = $this->input->post($_fields,TRUE);

        if ($_POST && $data)
        {
            $data['password'] = '1234';
            User_model::Insert($data);
            echo $data;
            return TRUE;
        }
        return FALSE;
    }

    function delete($uid){
    	if($uid>0){
    		$u = User_model::SelectById($uid);
    		if($u && $u->role!='A'){
    			User_model::Delete($uid);
    			echo $uid;
    			//redirect('/backend/User_manage');
			}
		}
    	echo 0;
	}

}
