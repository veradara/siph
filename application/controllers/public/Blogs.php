<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blogs extends CI_Controller
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
		$data['artikel'] = $this->m_home->get_all_article();
		$data['cat_prod'] = $this->m_home->get_category_product();
		$data['title'] = 'Petshop';
		$data['count_cart'] = $this->m_home->get_count_cart();
		$data['setting'] = $this->M_setting->getAll();
		$this->load->view('layouts/header', $data);
		$this->load->view('public/blogs');
		$this->load->view('layouts/footer');
	}


	public function detail($id)
	{
		// get all article
		$data['detail'] = $this->m_home->get_detail_article($id);
		$data['cat_prod'] = $this->m_home->get_category_product();
		$data['title'] = 'Petshop';
		$data['count_cart'] = $this->m_home->get_count_cart();
		$data['setting'] = $this->M_setting->getAll();
		$this->load->view('layouts/header', $data);
		$this->load->view('public/blogs_detail');
		$this->load->view('layouts/footer');
	}

	public function pets_detail($id)
	{
		// get all article
		$data['detail'] = $this->m_home->get_detail_pets($id);
		$data['cat_prod'] = $this->m_home->get_category_product();
		$data['title'] = 'Petshop';
		$data['count_cart'] = $this->m_home->get_count_cart();
		$data['setting'] = $this->M_setting->getAll();
		$this->load->view('layouts/header', $data);
		$this->load->view('public/pets_detail');
		$this->load->view('layouts/footer');
	}
}
