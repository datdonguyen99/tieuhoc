<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Notification extends Frontend_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Post_model');
        $this->load->model('SchoolInfoModel');
        $this->load->helper('text');
        $this->temp['config']['home'] = 0;
    }

    public function index()
    {
        $allNoti = Post_model::SelectByType(0, 20);
        $this->temp['data']['all_notification'] = $allNoti;
        $this->temp['template'] = '/frontend/notification/all_notification_view';

        $this->render();
    }
}

/* End of file Notification.php */
