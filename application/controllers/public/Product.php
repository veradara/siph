<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{



	public function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->load->library('session');
		// load model
		$this->load->model('m_produk');
		$this->load->model('m_home');
		$this->load->model('M_setting');
	}

	public function index($categories_id = '')
	{
		// get all article
		$data['product'] = $this->m_produk->get_all_product_by_categories($categories_id);
		$data['cat_prod'] = $this->m_home->get_category_product();

		$data['title'] = 'Petshop';
		$data['count_cart'] = $this->m_home->get_count_cart();
		$data['setting'] = $this->M_setting->getAll();
		$this->load->view('layouts/header', $data);
		$this->load->view('public/product_categories');
		$this->load->view('layouts/footer');
	}


	public function search()
	{
		// get all article
		$data['product'] = $this->m_produk->get_all_product_by_search($this->input->post('search'));
		$data['cat_prod'] = $this->m_home->get_category_product();

		$data['title'] = 'Petshop';
		$data['count_cart'] = $this->m_home->get_count_cart();
		$data['setting'] = $this->M_setting->getAll();
		$this->load->view('layouts/header', $data);
		$this->load->view('public/product_categories');
		$this->load->view('layouts/footer');
	}

	public function detail($id = '')
	{
		$data['setting'] = $this->M_setting->getAll();
		$data['detail'] = $this->m_produk->get_detail_produk($id);
		$data['cat_prod'] = $this->m_home->get_category_product();

		$data['title'] = 'Petshop';
		$data['count_cart'] = $this->m_home->get_count_cart();
		$this->load->view('layouts/header', $data);
		$this->load->view('public/product_detail');
		$this->load->view('layouts/footer');
	}
}
