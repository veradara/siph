<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Base.php");


class Setting extends Base
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // load model
        $this->load->model('m_setting');
        $this->load->model('m_home');
        // Load library
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }


    public function index()
    {
        $result['detail'] = $this->m_setting->get_detail_setting();
        $result['setting'] = $this->m_setting->getAll();
        $this->template->set('title', 'Setting Petshop Ku');
        $this->template->load('default', 'contents', 'setting/index', $result);
    }


    public function save_process()
    {
        // validation form
        $this->form_validation->set_rules('about_us', 'Tentang Kami', 'required');
        $this->form_validation->set_rules('site_name', 'Nama Situs', 'required');
        $this->form_validation->set_rules('description', 'Deskripsi', 'required');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('setting');
        } else {
            $update = array(
                'about_us'               => $this->input->post('about_us'),
                'site_name'              => $this->input->post('site_name'),
                'description'            => $this->input->post('description'),
            );

            $where = array('id' => 1);

            // insert process
            $return = $this->m_setting->update($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('setting');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('setting');
            }
        }
    }


    public function profile()
    {
        $result['detail'] = $this->m_setting->get_detail_setting();
        $result['user'] = $this->m_home->get_detail_profile();

        $this->form_validation->set_rules('fullname', 'username', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'username', 'required');
        $this->form_validation->set_rules('address', 'username', 'required');
        $this->form_validation->set_rules('phone', 'username', 'required');

        if ($this->form_validation->run() == false) {
            $this->template->load('default', 'contents', 'setting/profile', $result);
        } else {
            $data = [
                'fullname' => $this->input->post('fullname'),
                'username' => $this->input->post('username'),
		'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
            ];

            $upload_image = $_FILES['file']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['upload_path'] = './uploads/users/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('file')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('file', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }

            //$this->db->where('email', $result['user']['id_users']);
	    $this->db->where('id_users', $this->input->post('id_users'));
            $this->db->update('users', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Profile Berhasil Diubah!</div>');
            redirect('setting/profile');
        }   
    }
}
