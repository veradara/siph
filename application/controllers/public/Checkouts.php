<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Checkouts extends CI_Controller
{


    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('session');
        // load model
        $this->load->model('m_cart');
        $this->load->model('m_home');
        $this->load->model('m_checkouts');
        $this->load->model('M_setting');

        $this->load->library('form_validation');

        $userdata = $this->session->all_userdata();
        if (empty($userdata['username'])) {
            redirect('/', 'refresh');
        }
    }

    public function index()
    {

        $data['cat_prod'] = $this->m_home->get_category_product();
        $data['all_history'] = $this->m_checkouts->get_all_history();

        $data['title'] = 'Petshop';
        $data['count_cart'] = $this->m_home->get_count_cart();
        $data['setting'] = $this->M_setting->getAll();
        $this->load->view('layouts/header', $data);
        $this->load->view('public/transaction_history');
        $this->load->view('layouts/footer');
    }

    public function save($id_cart)
    {
        // get all  
        $userdata = $this->session->all_userdata();
        if (empty($id_cart) || empty($userdata['id'])) {
            $this->session->set_flashdata('error', 'Failed !!, Silahkan login terlebih dahulu');
            redirect('/', 'refresh');
        }

        // get total proice
        $total = $this->m_cart->get_total_price($id_cart);


        $data['total'] = $total;
        $data['id_cart'] = $id_cart;

        $data['cat_prod']     = $this->m_home->get_category_product();
        $data['title']         = 'Petshop';
        $data['count_cart'] = $this->m_home->get_count_cart();
        $data['setting'] = $this->M_setting->getAll();


        $this->load->view('layouts/header', $data);
        $this->load->view('public/checkouts_confirm');
        $this->load->view('layouts/footer');
    }


    public function save_process($id_cart)
    {
        // get all  
        $userdata = $this->session->all_userdata();
        if (empty($id_cart) || empty($userdata['id'])) {
            $this->session->set_flashdata('error', 'Failed !!, Silahkan login terlebih dahulu');
            redirect('/', 'refresh');
        }


        // get total proice
        $total = $this->m_cart->get_total_price($id_cart);

        $insert = [
            'id_cart'          => $id_cart,
            'total_price'      => $total,
            'updated_at'      => date('Y-m-d H:i:s'),
            'payment_status' => '0',
        ];

        // insert process
        $return = $this->m_checkouts->insert_checkout($insert, $id_cart);
        if ($return) {

            $this->session->set_flashdata('success', 'Checkout sukses, silah kan upload bukti bayar pada halaman ini!!');
            redirect('/public/checkouts/');
        } else {
            $this->session->set_flashdata('error', 'Failed !!');
            redirect('/public/checkouts/');
        }
    }


    public function update_process()
    {
        // validation form
        $this->form_validation->set_rules('id_checkout', 'ID', 'required');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('public/checkouts/');
        } else {
            // check file 
            $config['upload_path'] = './uploads/bukti/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 10240;

            // load library
            $this->load->library('upload', $config);
            $userdata = $this->session->all_userdata();


            if (!empty($_FILES['file']['name'])) {
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('public/checkouts/' . $this->input->post('id_product'));
                } else {
                    $data = $this->upload->data();
                    $update = array(
                        'payment_status'                 => '1',
                        'file'                   => $data['file_name'],
                        'updated_at'             => date('Y-m-d H:i:s')
                    );
                }
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('public/checkout/');
            }

            $where = array('id_checkout' => $this->input->post('id_checkout'));

            // insert process
            $return = $this->m_checkouts->update_checkout($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('public/checkouts/');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('public/checkouts/');
            }
        }
    }
}
