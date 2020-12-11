<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{



    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->library('session');
        // load model
        $this->load->model('m_home');
        $this->load->model('m_users');
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
        $data['detail'] = $this->m_home->get_detail_profile();

        $data['title'] = 'Petshop';
        $data['count_cart'] = $this->m_home->get_count_cart();
        $data['setting'] = $this->M_setting->getAll();
        $this->load->view('layouts/header', $data);
        $this->load->view('public/profile');
        $this->load->view('layouts/footer');
    }

    public function update_process()
    {
        // validation form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('fullname', 'Nama', 'trim|required');
        $this->form_validation->set_rules('address', 'Alamat', 'trim');
        $this->form_validation->set_rules('phone', 'No Telp', 'trim');
        $this->form_validation->set_rules('birthday', 'Tgl. Lahir', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi', 'trim|matches[password]');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('public/profile/');
        } else {
            $email = $this->m_users->check_user_email_edit($this->input->post('email'), $this->input->post('id_users'));
            if ($email) {
                $this->session->set_flashdata('error', 'Email sudah digunakan !!');
                redirect('public/profile/');
            }

            $username = $this->m_users->check_username_edit($this->input->post('username'), $this->input->post('id_users'));
            if ($username) {
                $this->session->set_flashdata('error', 'Username sudah digunakan !!');
                redirect('public/profile/');
            }

            // check file 
            $config['upload_path'] = './uploads/users/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 10240;

            // load library
            $this->load->library('upload', $config);

            if (!empty($_FILES['file']['name'])) {
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('users/add');
                } else {
                    $data = $this->upload->data();
                    $update = array(
                        'username'      => $this->input->post('username'),
                        'email'         => $this->input->post('email'),
                        'fullname'      => $this->input->post('fullname'),
                        'address'       => $this->input->post('address'),
                        'phone'         => $this->input->post('phone'),
                        'birthday'      => $this->input->post('birthday'),
                        'file'          => $data['file_name'],
                    );
                }
            } else {
                $update = array(
                    'username'      => $this->input->post('username'),
                    'email'         => $this->input->post('email'),
                    'fullname'      => $this->input->post('fullname'),
                    'address'       => $this->input->post('address'),
                    'phone'         => $this->input->post('phone'),
                    'birthday'      => $this->input->post('birthday')
                );
            }

            if (!empty($this->input->post('password'))) {
                $update['password'] = md5($this->input->post('password'));
            }

            $where = array('id_users' => $this->input->post('id_users'));

            // insert process
            $return = $this->m_users->update_users($update, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('public/profile/');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('public/profile/');
            }
        }
    }
}
