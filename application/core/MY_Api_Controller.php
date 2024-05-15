<?php
class Api_Controller extends MY_Controller
{
    /**
     * summary
     */
    protected $result;
    public function __construct()
    {
    	return;
        parent::__construct();
        $this->result = array('success' => FALSE, 'message' => NULL);


        if (isset($_SERVER['HTTP_ORIGIN']))
        {
            header("Access-Control-Allow-Origin: ". $_SERVER['HTTP_ORIGIN']);
            header("Access-Control-Allow-Credentials: true");
        }



        $method = $this->input->method();

        if ($method == 'options')
        {
            header('Access-Control-Allow-Headers: x-requested-with,content-type');
            header("Access-Control-Allow-Methods: GET, POST, HEAD");
            echo 1;
            exit;
        }


        $this->user_info = $this->session->userdata('userinfo');
        if(! $this->user_info)
        {
            $this->result['message'] = 'Chua login';
            $this->json_output();
            die;
        }
    }


    protected function json_output($data = NULL)
    {
        if ($data == NULL)
        {
            $data = $this->result;
        }
        header('Content-type: application/json');
        $json =  json_encode($data, JSON_UNESCAPED_UNICODE);
        //$json = preg_replace('/"([a-zA-Z]+[a-zA-Z0-9]*)":/','$1:', $json);
        echo $json;
        exit;
    }



    protected function get_paginate(){
        $page  = (int) $this->input->get('page', TRUE);
        $limit = (int) $this->input->get('limit', TRUE);

        if ($page < 1){ $page = 1; }
        if ($limit < 1){ $limit = 30; }

        return array('page' => $page, 'limit' => $limit);
    }

    protected function get_page(){
    	$page = (int) $this->input->get('page',TRUE);
    	if( $page < 1 )
    		$page = 1;
    	return $page;
    }


}
