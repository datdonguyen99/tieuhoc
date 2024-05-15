<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_manage extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Contact_model');

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

        $items = Contact_model::Filter($key,$page,$limit, $total);
        $this->temp['data']['key'] = $key_temp;
        $this->temp['data']['pagination'] = VM_Pagination::bootstrap($total, '', $limit);
        $this->temp['data']['items'] = $items;
        $this->temp['template'] = 'backend/contact/contact_manage_view';
        $this->render();

    }

    public function detail($contact_id)
    {
        $contact_id = (int)$contact_id;
        $contact = Contact_model::SelectById($contact_id);
        Contact_model::Update($contact_id,['is_viewed' => 1]);
        $this->temp['data']['item'] = $contact;
        $this->temp['template'] = 'backend/contact/contact_manage_detail';
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


}
