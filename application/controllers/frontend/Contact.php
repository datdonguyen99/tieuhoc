<?php
class Contact extends Frontend_Controller
{
    function __construct()
    {
        parent::__construct();
        // $this->load->model('contact_model');
		$this->temp['config']['un_use_right_col']=true;
    }

    function index()
    {
        $data['content']['center'] = 'frontend/page/contact_view';
        $data['content']['rightside'] = NULL;
        $data['content']['leftside'] = 'frontend/layout/body_leftside_view';
        $this->load->view('../views/frontend/layout/master_view', $data);

        // $this->temp['template'] = "frontend/contact_view";
        // $this->temp['data']['config'] = $this->temp['config'];
        // $this->temp['data']['category'] = Category_model::SelectBySlug('lien-he');
        // if(isset($_POST[''])){

        // }
        // $this->render();
    }

    // function contact_form(){
    // 	$data = $this->input->post();
    // 	$note = 'Loại tài sản: '.$data['loai-tai-san'].'. Mục đích thẩm định: '.$data['muc-dich'];
    // 	$name = $data['name'];
    // 	$phone = $data['phone'];
    // 	//$message = $data['message'];
    // 	if(!empty($name) && !empty($phone)){
    // 		Contact_model::Insert(
    // 			array(
    // 				'full_name'=>$name,
    // 				'phone_number'=>$phone,
    // 				'note'=>$note
    // 			)
    // 		);
    // 		echo 1;
    // 		return;
    // 	}
    // 	else{
    // 		echo "Các trường dữ liệu không hợp lệ. Kiểm tra lại !";
    // 	}
    // }

    // function request_form(){
    //     $data = $this->input->post();
    //     $note = $data['content'];
    //     $name = $data['name'];
    //     $phone = $data['phone'];
    //     $email = $data['email'];
    //     if(filter_var($email, FILTER_VALIDATE_EMAIL)===false) {echo "Các trường dữ liệu không hợp lệ. Kiểm tra lại !";; return;}
    // 	if(preg_match('#<script>(. *?)</script>#s', $note, $matches)==1) {echo "Các trường dữ liệu không hợp lệ. Kiểm tra lại !";; return;}
    // 	$rsvalue = preg_match_all("/[[:alpha:]]+:\/\/[^<>[:space:]]+[[:alnum:]\/]/",$note, $out);
    // 	if ($rsvalue !== false && $rsvalue > 0)
    // 	{
    // 		echo "Các trường dữ liệu không hợp lệ. Kiểm tra lại !";; return;
    // 	}
    // 	if(!empty($name) && !empty($phone)){
    //         Contact_model::Insert(
    //             array(
    //                 'full_name'=>$name,
    //                 'phone_number'=>$phone,
    //                 'note'=>$note,
    // 				'email'=>$email
    //             )
    //         );
    //         echo 1;
    //         return;
    //     }
    //     else{
    //         echo "Các trường dữ liệu không hợp lệ. Kiểm tra lại !";
    //     }
    // }
}
