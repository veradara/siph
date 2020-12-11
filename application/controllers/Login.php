<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // load library
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
        // load model
        $this->load->model('m_login');
        $this->load->model('m_setting');
    }

    public function index()
    {
        $data['setting'] = $this->m_setting->getAll();
        $userdata = $this->session->all_userdata();
        if (!empty($userdata['username'])) {
            redirect('/dashboard', 'refresh');
        } else {
            $this->load->view('layouts/login', $data);
        }
    }

    public function login_process()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');


        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('login');
        } else {

            $username = $this->input->post('username');
            $password =  md5($this->input->post('password'));
            $data = array($username, $password);


            $result = $this->m_login->check_login($data);


            if ($result) {
                if ($result != false) {
                    $session_data = array(
                        'username'      => $result['username'],
                        'id'            => $result['id_users'],
                        'email'         => $result['email'],
                        'user_type'     => $result['user_type'],
                        'file'          => $result['file'],
                        'fullname'      => $result['fullname'],
                    );
                    // Add user data in session
                    $this->session->set_userdata($session_data);
                    // response login
                    $this->session->set_flashdata('success', 'Login Sukses');
                    redirect('/dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Login Gagal');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('error', 'Login Gagal');
                redirect('login');
            }
        }
    }

    public function logout_process()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Logout Sukses');
        redirect('/');
    }
}
