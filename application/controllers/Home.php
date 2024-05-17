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
		$this->load->model('SchoolInfoModel');

		$this->temp['title'] = isset($this->cf[10]) ? $this->cf[10]->value : "Trang chủ";
	}

	function index()
	{
		$this->temp['template'] = 'frontend/home_view';
		$this->temp['config']['home'] = 1;
		$this->temp['data']['side_bars'] = SchoolInfoModel::SelectAll();
		$this->temp['data']['side_bar_sliders'] = Banner_model::SelectByType('side-bar-slider', 8);

		$this->render();
	}
}
