<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration extends CI_Controller
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
        $this->load->library('session');
        // load model
        $this->load->model('m_home');
        $this->load->model('m_users');
        $this->load->model('M_setting');

        $userdata = $this->session->all_userdata();
        if (!empty($userdata['username'])) {
            redirect('/profile', 'refresh');
        }

        // Load library
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        // get all article
        $data['cat_prod']     = $this->m_home->get_category_product();
        $data['title']         = 'Petshop';
        $data['count_cart'] = $this->m_home->get_count_cart();
        $data['setting'] = $this->M_setting->getAll();

        $this->load->view('layouts/header', $data);
        $this->load->view('public/registration');
        $this->load->view('layouts/footer');
    }


    public function registration_confirm()
    {
        // get all article
        $data['cat_prod']     = $this->m_home->get_category_product();
        $data['title']         = 'Petshop';
        $data['count_cart'] = $this->m_home->get_count_cart();
        $data['setting'] = $this->M_setting->getAll();


        $this->load->view('layouts/header', $data);
        $this->load->view('public/registration_confirm');
        $this->load->view('layouts/footer');
    }


    public function save_process()
    {
        // validation form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('fullname', 'Nama', 'trim|required');
        $this->form_validation->set_rules('address', 'Alamat', 'trim');
        $this->form_validation->set_rules('phone', 'No Telp', 'trim');
        $this->form_validation->set_rules('birthday', 'Tgl. Lahir', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi', 'required|matches[password]');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('registration');
        } else {
            // check  email
            $email = $this->m_users->check_user_email($this->input->post('email'));
            if ($email) {
                $this->session->set_flashdata('error', 'Email sudah digunakan !!');
                redirect('registration');
            }

            $username = $this->m_users->check_username($this->input->post('username'));
            if ($username) {
                $this->session->set_flashdata('error', 'Username sudah digunakan !!');
                redirect('registration');
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
                    redirect('registration/');
                } else {
                    $data = $this->upload->data();
                    $insert = array(
                        'username'      => $this->input->post('username'),
                        'email'         => $this->input->post('email'),
                        'user_type'     => '1',
                        'active'        => '1',
                        'fullname'      => $this->input->post('fullname'),
                        'address'       => $this->input->post('address'),
                        'phone'         => $this->input->post('phone'),
                        'birthday'      => $this->input->post('birthday'),
                        'password'      => md5($this->input->post('password')),
                        'file'          => $data['file_name'],
                        'code_activation'    => rand() . '-' . md5($this->input->post('username')),
                    );
                }
            } else {
                $insert = array(
                    'username'      => $this->input->post('username'),
                    'email'         => $this->input->post('email'),
                    'user_type'     => '0',
                    'active'        => '1',
                    'fullname'      => $this->input->post('fullname'),
                    'address'       => $this->input->post('address'),
                    'phone'         => $this->input->post('phone'),
                    'birthday'      => $this->input->post('birthday'),
                    'password'      => md5($this->input->post('password')),
                    'code_activation'    => rand() . '-' . md5($this->input->post('username')),
                );
            }


            // insert process
            $return = $this->m_users->insert_users($insert);
            if ($return) {
                $this->send_email($insert);
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('registration/registration_confirm');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('registration/');
            }
        }
    }


    public function activate_process($code = '')
    {

        $update = array(
            'active'        => '0'
        );

        $where = array('code_activation' => $code);

        // insert process
        $return = $this->m_users->update_users($update, $where);
        if ($return) {
            $this->session->set_flashdata('success', 'Konfirmasi email berhasil !!, silahkan login');
            redirect('/');
        } else {
            $this->session->set_flashdata('error', 'Gagal Konfirmasi !!');
            redirect('/');
        }
    }


    function send_email($data = array())
    {

        $config['protocol']     = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.googlemail.com';
        $config['smtp_port']    = '465';
        $config['smtp_user']    = 'kikonofsky@gmail.com';
        $config['smtp_pass']    = 'indonesiajata#@!';
        $config['charset']        = 'utf-8';
        $config['newline']        = "\r\n";
        $config['mailtype']        = 'html'; // or html  

        $this->load->library('email');
        $this->email->initialize($config);

        $message = '<!DOCTYPE html>
					<html>
					<head>
						<title></title>
					</head>
					<body>
						Terimakasih telah melakukan registrasi pada situs petshopku, klik tautan berikut ini untuk aktivasi akun:<br><br>
						<a href="' . base_url('registration/activate_process/') . $data["code_activation"] . '">' . base_url('registration/activate_process/') . $data["code_activation"] . '</a>
					</body>
					</html>
		';





        $this->email->from('kikonofsky@gmail.com', 'Petshop ku');
        $this->email->to($data['email']);
        $this->email->cc('');
        $this->email->bcc('');

        $this->email->subject('Petshop Ku Konfirmasi Email');
        $this->email->message($message);

        $this->email->send();
    }
}
