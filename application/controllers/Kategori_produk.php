<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Base.php");


class Kategori_produk extends Base
{


    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // load model
        $this->load->model('m_produk');
        $this->load->model('m_setting');
        // Load library
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        header("Access-Control-Allow-Origin: *");
        // get serach data
        $search               = $this->session->userdata('app_apprv_search');

        // get data
        $total = $this->m_produk->get_total_categories();
        $data['setting'] = $this->m_setting->getAll();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'kategori_produk/index/';
        $config['total_rows'] = $total;
        $config['per_page'] = 25;
        $config['uri_segment'] = 3;
        $config['from'] = $this->uri->segment(3);
        $from = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data['kategori_produk'] = $this->m_produk->get_all_categories(array(empty($from) ? 0 : intval($from), $config['per_page']));

        $numb = empty($from) ? 1 : intval($from);
        $data["links"] = $this->pagination->create_links();
        $data["no"]    = $numb++;

        // assign data
        $this->template->set('title', 'Artikel Petshop Ku');
        $this->template->load('default', 'contents', 'kategori_produk/index.php', $data);
    }


    public function add($id = '')
    {
        $data['setting'] = $this->m_setting->getAll();
        $this->template->load('default', 'contents', 'kategori_produk/add', $data);
    }


    public function add_process()
    {
        // validation form
        $this->form_validation->set_rules('name_categories', 'Nama Kategori', 'required');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('kategori_produk/add');
        } else {
            $insert = array(
                'name_categories'   => $this->input->post('name_categories'),
            );

            // insert process
            $return = $this->m_produk->insert_categories($insert);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('kategori_produk/add');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('kategori_produk/add');
            }
        }
    }

    public function edit($id = '')
    {
        $result['setting'] = $this->m_setting->getAll();
        $result['detail'] = $this->m_produk->get_detail_categories($id);
        $this->template->load('default', 'contents', 'kategori_produk/edit', $result);
    }

    public function edit_process()
    {
        // validation form
        $this->form_validation->set_rules('id_product_categories', 'Id Kategori', 'required');
        $this->form_validation->set_rules('name_categories', 'Nama Kategori', 'required');

        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('kategori_produk/edit/' . $this->input->post('id_product_categories'));
        } else {
            $update = array(
                'name_categories' => $this->input->post('name_categories'),
            );

            $where = array('id_product_categories' => $this->input->post('id_product_categories'));

            // insert process
            $return = $this->m_produk->update_categories($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('kategori_produk/edit/' . $this->input->post('id_product_categories'));
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('kategori_produk/edit/' . $this->input->post('id_product_categories'));
            }
        }
    }


    public function delete($id = '')
    {
        if (empty($id)) {
            $this->session->set_flashdata('error', 'Internal Error !!');
            redirect('kategori_produk');
        }
        // get detail
        $result = $this->m_produk->get_detail_categories($id);
        if (!empty($result)) {
            // delete process
            if ($this->m_produk->delete_categories(array('id_product_categories' => $id))) {
                // notification
                $this->session->set_flashdata('success', 'Data berhasil di hapus !!');
                redirect('kategori_produk');
            } else {
                // notification
                $this->session->set_flashdata('error', 'Data gagal di hapus !!');
                redirect('kategori_produk');
            }
        } else {
            // notification
            $this->session->set_flashdata('error', 'Data gagal di hapus !!');
            redirect('kategori_produk');
        }
    }
}
