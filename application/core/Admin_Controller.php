<?php
class Admin_Controller extends MY_Controller
{
    protected $user_info;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

        $this->temp['layout'] = 'backend/layout/admin_layout_view';
        $this->user_info = User_model::GetAuthSession();

        if (empty($this->user_info) && !User_model::CheckAuthRoleIsAdmin($this->user_info))
        {
            redirect();
        }

        $this->user_info['avatar']  = 'https://cdn4.iconfinder.com/data/icons/mayssam/512/user-128.png';

        $this->temp['role'] 		= $this->user_info['role'];
        $this->temp['data']['role'] = $this->user_info['role'];
        $total = 0;
        $this->temp['user_info'] = $this->user_info;
        $this->temp['data']['stt'] = ($this->page - 1 )* $this->limit;
        $this->temp['data']['base_link'] = '/backend/' . $this->router->class ;

    }

    function is_admin()
    {
        return $this->user_info['role'] == 1;
    }
    
    protected function get_post_data($_field=array(),$rs=TRUE)
    {
    	if( is_array($_field) && !empty($_field)){
    		return $this->input->post($_field,$rs);
    	}
    	else
    		return null;
    }

}
