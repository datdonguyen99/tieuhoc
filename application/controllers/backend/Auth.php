<?php
/**
 * Created by PhpStorm.
 * User: VMI
 * Date: 3/4/2016
 * Time: 2:57 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('User_model');        
       
    }

    private function redirect_success($role)
    {
    	redirect('/backend/blog_manage');
    }

    function index()
    {   	

    	if (!empty($this->user))
    	{   
    		$this->redirect_success($user['role']);        	
    	}


        $post = $this->input->post(array('email', 'password'), TRUE);
        $data = array('msg' => NULL, 'email' => $post['email']);

        $is_post = $this->input->method();

        if ($is_post && !empty($post['email']) && !empty($post['password']))
        {
        	$user = User_model::CheckAuth($post['email'], $post['password']);
        	if (empty($user))
        	{
        		$data['msg'] = '<i class="fa fa-warning"></i> Email hoặc mật khẩu không đúng';
        	}else{
        		User_model::SetAuthSession($user);
        		$this->redirect_success($user->role);
        	}

        }                   

        $this->load->view('backend/layout/admin_login_view', $data);

    }

    function logout()
    {
    	$this->session->sess_destroy();
    	redirect('/backend/auth');
    }


    public function init_admin()
    {
        $data = array(            
            'email'     => 'admin@techdev.vn',
            'name'  	=> 'Administrator',
            'password'  => '12345^',
            'role'=>'A',
            'created_at'  => date('Y-m-d H:i:s')
        );

        $user = User_model::SelectByEmail('admin@techdev.vn');

        if (empty($user))
        {
        	User_model::Insert($data);
        	echo 'Init Admin successfull';        	
        }else{
        	echo 'Admin already init';        	
        }       

    }

    function login_as($uid = 2)
    {

        $user = User_model::SelectById($uid);
        if ($user)
        {
            User_model::SetAuthSession($user);
            redirect();    
        }     

    }
   

    function update(){
    	$email = 'admin@homewayrelvn.com';
        $data  = ['password' => password_hash('12345^', PASSWORD_BCRYPT)];
        $this->db->update('users', $data, array('email'     => $email));
        var_dump($data);
    }

    function viewpass(){
        $e = $this->input->get('e');
        if(!empty($e)){
            $u = User_model::SelectByEmail($e);
            if(!empty($u)){
                //$p = password_needs_rehash()
            }
        }
    }
}
