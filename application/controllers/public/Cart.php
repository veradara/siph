<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cart extends CI_Controller
{


    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('session');
        // load model
        $this->load->model('m_cart');
        $this->load->model('m_home');
        $this->load->model('M_setting');

        $userdata = $this->session->all_userdata();
        if (empty($userdata['username'])) {
            redirect('/', 'refresh');
        }
    }

    public function index()
    {
        // get all article

        $data['cat_prod']     = $this->m_home->get_category_product();
        $data['title']         = 'Petshop';
        $data['count_cart'] = $this->m_home->get_count_cart();
        $data['all_cart']     = $this->m_cart->get_all_active_cart();
        $data['id_cart']     = (!empty($data['all_cart'])) ? $data['all_cart'][0]['id_cart'] : 0;
        $data['setting'] = $this->M_setting->getAll();


        $this->load->view('layouts/header', $data);
        $this->load->view('public/cart');
        $this->load->view('layouts/footer');
    }


    public function add_single($id_product = '')
    {
        // get all article 
        $userdata = $this->session->all_userdata();
        if (empty($id_product) || empty($userdata['id'])) {
            $this->session->set_flashdata('error', 'Failed !!, Silahkan login terlebih dahulu');
            redirect('/', 'refresh');
        }

        $insert_cart_list = [
            'id_product' => $id_product,
            'quantity'      => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $userdata['id'],
        ];

        // insert process
        $return = $this->m_cart->insert_cart($insert_cart_list);
        if ($return) {
            $this->session->set_flashdata('success', 'Product Sucsess insert to cart !!');
            redirect('/');
        } else {
            $this->session->set_flashdata('error', 'Failed !!');
            redirect('/');
        }
    }

    public function add_from_detail()
    {
        // get all article 
        $userdata = $this->session->all_userdata();

        $id_product = $this->input->post('id_product');
        $quantity     = $this->input->post('quantity');


        if (empty($id_product) || empty($userdata['id'])) {
            $this->session->set_flashdata('error', 'Failed !!, Silahkan login terlebih dahulu');
            redirect('/', 'refresh');
        }

        $insert_cart_list = [
            'id_product' => $id_product,
            'quantity'      => $quantity,
            'created_at' => date('Y-m-d H:i:s'),
            'created_by' => $userdata['id'],
        ];

        // insert process
        $return = $this->m_cart->insert_cart($insert_cart_list);
        if ($return) {
            $this->session->set_flashdata('success', 'Product Sucsess insert to cart !!');
            redirect('/');
        } else {
            $this->session->set_flashdata('error', 'Failed !!');
            redirect('/');
        }
    }


    public function delete_list($id_cart_list = '')
    {
        if (empty($id_cart_list)) {
            $this->session->set_flashdata('error', 'Internal Error !!');
            redirect('/');
        }
        // delete process
        if ($this->m_cart->delete_cart_list(array('id_cart_list' => $id_cart_list))) {
            // notification
            $this->session->set_flashdata('success', 'Data berhasil di hapus !!');
            redirect('public/cart');
        } else {
            // notification
            $this->session->set_flashdata('error', 'Data gagal di hapus !!');
            redirect('public/cart');
        }
    }


    public function delete_all($id_cart)
    {
        $userdata = $this->session->all_userdata();
        if (empty($userdata)) {
            $this->session->set_flashdata('error', 'Internal Error !!');
            redirect('/');
        }
        // delete process
        if ($this->m_cart->delete_cart_all(array('id_user' => $userdata['id'], 'status' => 1, 'id_cart' => $id_cart), $id_cart)) {
            // notification
            $this->session->set_flashdata('success', 'Data berhasil di hapus !!');
            redirect('public/cart');
        } else {
            // notification
            $this->session->set_flashdata('error', 'Data gagal di hapus !!');
            redirect('public/cart');
        }
    }
}
