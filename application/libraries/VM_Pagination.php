<?php class VM_Pagination
{
    function __construct()
    {
    	$ci = & get_instance();
        $ci->load->library('pagination');
    }

    public static function bootstrap($total_num, $base_url='', $per_page = 20, $num_links = 5){
        if (empty($base_url)){
            $base_url = current_url();
        }

        $config = array(
            'base_url'      => $base_url,
            'per_page'      => $per_page,
            'num_links'     => $num_links,
            'total_rows'    => $total_num,

            'first_url'     => '?page=1',
            'use_page_numbers'      => TRUE,
            'page_query_string'     => TRUE,
            'query_string_segment'  => 'page',
            'first_link'            => 'First',
            'prev_link'             => '&laquo;',
            'next_link'             => '&raquo;',
            'last_link'             => 'Last'

        );

        $config['cur_tag_open']     = '<li class="active"><a href="#">';
        $config['cur_tag_close']    = '</a></li>';

        $config['num_tag_open']     = '<li>';
        $config['num_tag_close']    = '</li>';
        $config['next_tag_open']    = '<li>';
        $config['next_tag_close']   = '</li>';
        $config['prev_tag_open']    = '<li>';
        $config['prev_tag_close']   = '</li>';
        $config['first_tag_open']   = '<li>';
        $config['first_tag_close']  = '</li>';
        $config['last_tag_open']    = '<li>';
        $config['last_tag_close']   = '</li>';

        $pagination = new CI_Pagination($config);

        $page_link  = '<ul class="pagination">'.$pagination->create_links().'</ul>';
        return $page_link;
    }
}