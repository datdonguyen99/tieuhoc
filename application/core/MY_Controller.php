<?php
/**
 * Created by PhpStorm.
 * User: VMI
 * Date: 3/3/2016
 * Time: 9:20 AM
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_Controller extends MY_Controller
{
    protected $cus_info;
    protected $cf;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->model('Post_model');
        $this->load->model('Config_model');
        $this->load->model('Banner_model');
        //$hotline  = Config_model::SelectByKey('hotline');
        //$email  = Config_model::SelectByKey('email');
        //$address  = Config_model::SelectByKey('address');
        $this->cf = Config_model::SelectAll();
        //print_r($cf);
        $this->temp['config']['common']= $this->cf;
        $this->temp['config']['menu'] = Category_model::SelectMenuParent();
        //define content for left-side
        //$this->temp['data']['chude'] = "";

    }
}

class MY_Controller extends CI_Controller
{
    protected $temp;    
    function __construct()
    {

        parent::__construct();
        $this->load->driver('cache', array('adapter' => 'apc', 'backup' => 'file'));
        //$this->load->model('Customer_model');
        $this->load->model('Category_model');
        $this->temp['title']  = '';
        $this->temp['style']  = '';
        $this->temp['data']   = array();
        $this->temp['layout'] = 'frontend/layout/master_view';

        $this->page = (int) $this->input->get('page', TRUE);
        if ($this->page<1){ $this->page = 1; }

        $this->limit = (int) $this->input->get('limit', TRUE);
        if ($this->limit == 0){ $this->limit = 20; }

		if(isset($_GET['lang'])) {

			set_cookie("lang",$_GET['lang'],3600*60);
			$lang=$_GET['lang'];
			//get_cookie("lang");
			//echo $lang."ok";
			flush();
		}
		else if(get_cookie("lang")) {
			$lang=get_cookie("lang");
			//echo $lang;
		}
		else {
			//echo $_SESSION["lang"];
			$lang="vi";
			set_cookie("lang",$lang,3600*60);
		}
		//echo get_cookie("lang");
		define('LANG',$lang);
    }

    function render()
    {
        $this->load->view($this->temp['layout'], $this->temp);
    }

}


// class Admin_Controller extends MY_Controller
// {
//     protected $user_info;
//     function __construct()
//     {
//         parent::__construct();
//         $this->load->model('User_model');

//         $this->temp['layout'] = 'backend/layout/admin_layout_view';
//         $this->user_info = User_model::GetAuthSession();

//         if (empty($this->user_info) && !User_model::CheckAuthRoleIsAdmin($this->user_info))
//         {
//             redirect();
//         }

//         $this->user_info['avatar']  = 'https://cdn4.iconfinder.com/data/icons/mayssam/512/user-128.png';

//         $this->temp['role'] 		= $this->user_info['role'];
//         $this->temp['data']['role'] = $this->user_info['role'];
//         $total = 0;
//         $this->temp['user_info'] = $this->user_info;
//         $this->temp['data']['stt'] = ($this->page - 1 )* $this->limit;
//         $this->temp['data']['base_link'] = '/backend/' . $this->router->class ;

//     }

//     function is_admin()
//     {
//         return $this->user_info['role'] == 1;
//     }
    
//     protected function get_post_data($_field=array(),$rs=TRUE)
//     {
//     	if( is_array($_field) && !empty($_field)){
//     		return $this->input->post($_field,$rs);
//     	}
//     	else
//     		return null;
//     }

// }
// class Frontend_Controller extends MY_Controller
// {
//     protected $cus_info;
//     function __construct()
//     {
//         parent::__construct();
//         $this->load->model('Category_model');
//         $this->load->model('Post_model');
//         $this->load->model('Config_model');
//         $this->load->model('Banner_model');
//         $hotline  = Config_model::SelectByKey('hotline');
//         $email  = Config_model::SelectByKey('email');
//         $address  = Config_model::SelectByKey('address');
//         $this->temp['config']['hotline']= $hotline;
//         $this->temp['config']['email']= $email;
//         $this->temp['config']['address']= $address;
//         $this->temp['main_menu'] = Category_model::SelectMenuParent();
//     }


// }

/**
 * summary
 */


/**
 * Api controller
 */
