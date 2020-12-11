<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Base.php");


class Produk extends Base
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
        // get data
        $total = $this->m_produk->get_total_produk();
        $data['setting'] = $this->m_setting->getAll();
        $this->load->library('pagination');
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'produk/index/';
        $config['total_rows'] = $total;
        $config['per_page'] = 25;
        $config['uri_segment'] = 3;
        $config['from'] = $this->uri->segment(3);
        $from = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data['produk'] = $this->m_produk->get_all_produk(array(empty($from) ? 0 : intval($from), $config['per_page']));

        $numb = empty($from) ? 1 : intval($from);
        $data["links"] = $this->pagination->create_links();
        $data["no"]    = $numb++;

        // assign data
        $this->template->set('title', 'produk Petshop Ku');
        $this->template->load('default', 'contents', 'produk/index.php', $data);
    }


    public function add($id = '')
    {
        $result['setting'] = $this->m_setting->getAll();
        $this->template->set('title', 'produk Petshop Ku');
        $result['categories'] = $this->m_produk->get_all_categories_form();
        $this->template->load('default', 'contents', 'produk/add', $result);
    }


    public function add_process()
    {
        // validation form
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('id_product_categories', 'Kategori', 'required');
        $this->form_validation->set_rules('quantity', 'Kuantitas', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('produk/add');
        } else {
            // check file 
            $config['upload_path'] = './uploads/produk/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 10240;

            // load library
            $this->load->library('upload', $config);
            $userdata = $this->session->all_userdata();


            if (!empty($_FILES['file']['name'])) {
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('produk/add');
                } else {
                    $data = $this->upload->data();
                    $insert = array(
                        'name'                   => $this->input->post('name'),
                        'id_product_categories'  => $this->input->post('id_product_categories'),
                        'quantity'               => $this->input->post('quantity'),
                        'price'                  => $this->input->post('price'),
                        'description'            => $this->input->post('description'),
                        'created_at'     => date('Y-m-d H:i:s'),
                        'updated_at'     => date('Y-m-d H:i:s'),
                        'file'           => $data['file_name'],
                        'updated_by'     => $userdata['id']
                    );
                }
            } else {
                $insert = array(
                    'name'                    => $this->input->post('name'),
                    'id_product_categories'  => $this->input->post('id_product_categories'),
                    'quantity'               => $this->input->post('quantity'),
                    'price'                  => $this->input->post('price'),
                    'description'            => $this->input->post('description'),
                    'created_at'             => date('Y-m-d H:i:s'),
                    'updated_at'             => date('Y-m-d H:i:s'),
                    'updated_by'             => $userdata['id']
                );
            }


            // insert process
            $return = $this->m_produk->insert_produk($insert);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('produk/add');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('produk/add');
            }
        }
    }

    public function edit($id = '')
    {
        $result['setting'] = $this->m_setting->getAll();
        $result['detail'] = $this->m_produk->get_detail_produk($id);
        $result['categories'] = $this->m_produk->get_all_categories_form();
        $this->template->set('title', 'produk Petshop Ku');
        $this->template->load('default', 'contents', 'produk/edit', $result);
    }

    public function edit_process()
    {
        // validation form
        $this->form_validation->set_rules('name', 'Nama', 'required');
        $this->form_validation->set_rules('id_product_categories', 'Kategori', 'required');
        $this->form_validation->set_rules('quantity', 'Kuantitas', 'required');
        $this->form_validation->set_rules('price', 'Harga', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');

        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('produk/edit/' . $this->input->post('id_product'));
        } else {
            // check file 
            $config['upload_path'] = './uploads/produk/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 10240;

            // load library
            $this->load->library('upload', $config);
            $userdata = $this->session->all_userdata();


            if (!empty($_FILES['file']['name'])) {
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('produk/edit/' . $this->input->post('id_product'));
                } else {
                    $data = $this->upload->data();
                    $update = array(
                        'name'                   => $this->input->post('name'),
                        'id_product_categories'  => $this->input->post('id_product_categories'),
                        'quantity'               => $this->input->post('quantity'),
                        'price'                  => $this->input->post('price'),
                        'description'            => $this->input->post('description'),
                        'updated_at'             => date('Y-m-d H:i:s'),
                        'file'                   => $data['file_name'],
                        'updated_by'             => $userdata['id']
                    );
                }
            } else {
                $update = array(
                    'name'                   => $this->input->post('name'),
                    'id_product_categories'  => $this->input->post('id_product_categories'),
                    'quantity'               => $this->input->post('quantity'),
                    'price'                  => $this->input->post('price'),
                    'description'            => $this->input->post('description'),
                    'updated_at'             => date('Y-m-d H:i:s'),
                    'updated_by'             => $userdata['id']
                );
            }

            $where = array('id_product' => $this->input->post('id_product'));

            // insert process
            $return = $this->m_produk->update_produk($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('produk/edit/' . $this->input->post('id_product'));
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('produk/edit/' . $this->input->post('id_product'));
            }
        }
    }


    public function delete($id = '')
    {
        if (empty($id)) {
            $this->session->set_flashdata('error', 'Internal Error !!');
            redirect('produk');
        }
        // get detail
        $result = $this->m_produk->get_detail_produk($id);
        if (!empty($result)) {
            // delete process
            if ($this->m_produk->delete_produk(array('id_product' => $id))) {
                // notification
                $this->session->set_flashdata('success', 'Data berhasil di hapus !!');
                redirect('produk');
            } else {
                // notification
                $this->session->set_flashdata('error', 'Data gagal di hapus !!');
                redirect('produk');
            }
        } else {
            // notification
            $this->session->set_flashdata('error', 'Data gagal di hapus !!');
            redirect('produk');
        }
    }
}
