<?php

/**
 * Created by PhpStorm.
 * User: VMI
 * Date: 3/3/2016
 * Time: 9:40 AM
 */

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Frontend_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->model('Post_model');
		$this->load->model('Banner_model');
		$this->load->model('Category_model');

		$this->temp['keywords'] = "";
		$this->temp['description'] = "";

		if (isset($this->cf[10]))
			$this->temp['title']  = $this->cf[10]->value;
		else
			$this->temp['title'] = "Trang chủ";
	}

	function index()
	{
		$this->temp['template'] = 'frontend/home_view';
		$this->temp['config']['home'] = 1;

		$this->render();
	}
}
