<?php
defined('BASEPATH') or exit('No direct script access allowed');

class About_us extends CI_Controller
{

	public function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->library('session');
		// load model
		$this->load->model('m_home');
		$this->load->model('M_setting');
	}

	public function index()
	{
		// get all article
		$data['detail'] = $this->m_home->get_all_settings();
		$data['cat_prod'] = $this->m_home->get_category_product();
		$data['title'] = 'Petshop';
		$data['count_cart'] = $this->m_home->get_count_cart();
		$data['setting'] = $this->M_setting->getAll();

		$this->load->view('layouts/header', $data);
		$this->load->view('public/about_us');
		$this->load->view('layouts/footer');
	}
}
