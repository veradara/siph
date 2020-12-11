<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Base.php");


class Users extends Base
{

    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // load model
        $this->load->model('m_users');
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
        $total = $this->m_users->get_total_users();

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'users/index/';
        $config['total_rows'] = $total;
        $config['per_page'] = 25;
        $config['uri_segment'] = 3;
        $config['from'] = $this->uri->segment(3);
        $from = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data['users'] = $this->m_users->get_all_users(array(empty($from) ? 0 : intval($from), $config['per_page']));

        $numb = empty($from) ? 1 : intval($from);
        $data["links"] = $this->pagination->create_links();
        $data["no"]    = $numb++;
        $data['setting'] = $this->m_setting->getAll();
        // assign data
        $this->template->set('title', 'users usershop Ku');
        $this->template->load('default', 'contents', 'users/index.php', $data);
    }


    public function add($id = '')
    {
        $data['setting'] = $this->m_setting->getAll();
        $this->template->load('default', 'contents', 'users/add', $data);
    }


    public function add_process()
    {
        // validation form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_type', 'Tipe User', 'required');
        $this->form_validation->set_rules('active', 'Status', 'required');
        $this->form_validation->set_rules('fullname', 'Nama', 'trim|required');
        $this->form_validation->set_rules('address', 'Alamat', 'trim');
        $this->form_validation->set_rules('phone', 'No Telp', 'trim');
        $this->form_validation->set_rules('birthday', 'Tgl. Lahir', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi', 'required|matches[password]');

        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('users/add');
        } else {
            // check  email
            $email = $this->m_users->check_user_email($this->input->post('email'));
            if ($email) {
                $this->session->set_flashdata('error', 'Email sudah digunakan !!');
                redirect('users/add');
            }

            $username = $this->m_users->check_username($this->input->post('username'));
            if ($username) {
                $this->session->set_flashdata('error', 'Username sudah digunakan !!');
                redirect('users/add');
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
                    $insert = array(
                        'username'      => $this->input->post('username'),
                        'email'         => $this->input->post('email'),
                        'user_type'     => $this->input->post('user_type'),
                        'active'        => $this->input->post('active'),
                        'fullname'      => $this->input->post('fullname'),
                        'address'       => $this->input->post('address'),
                        'phone'         => $this->input->post('phone'),
                        'birthday'      => $this->input->post('birthday'),
                        'password'      => md5($this->input->post('password')),
                        'file'          => $data['file_name'],
                    );
                }
            } else {
                $insert = array(
                    'username'      => $this->input->post('username'),
                    'email'         => $this->input->post('email'),
                    'user_type'     => $this->input->post('user_type'),
                    'active'        => $this->input->post('active'),
                    'fullname'      => $this->input->post('fullname'),
                    'address'       => $this->input->post('address'),
                    'phone'         => $this->input->post('phone'),
                    'birthday'      => $this->input->post('birthday'),
                    'password'      => md5($this->input->post('password')),
                );
            }


            // insert process
            $return = $this->m_users->insert_users($insert);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('users/add/');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('users/add/');
            }
        }
    }

    public function edit($id = '')
    {
        $result['setting'] = $this->m_setting->getAll();
        $result['detail'] = $this->m_users->get_detail_users($id);
        $this->template->load('default', 'contents', 'users/edit', $result);
    }

    public function edit_process()
    {
        // validation form
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('user_type', 'Tipe User', 'required');
        $this->form_validation->set_rules('active', 'Status', 'required');
        $this->form_validation->set_rules('fullname', 'Nama', 'trim|required');
        $this->form_validation->set_rules('address', 'Alamat', 'trim');
        $this->form_validation->set_rules('phone', 'No Telp', 'trim');
        $this->form_validation->set_rules('birthday', 'Tgl. Lahir', 'trim');
        $this->form_validation->set_rules('password', 'Password', 'trim');
        $this->form_validation->set_rules('confirm_password', 'Konfirmasi', 'trim|matches[password]');


        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('users/edit/' . $this->input->post('id_users'));
        } else {
            $email = $this->m_users->check_user_email_edit($this->input->post('email'), $this->input->post('id_users'));
            if ($email) {
                $this->session->set_flashdata('error', 'Email sudah digunakan !!');
                redirect('users/edit/' . $this->input->post('id_users'));
            }

            $username = $this->m_users->check_username_edit($this->input->post('username'), $this->input->post('id_users'));
            if ($username) {
                $this->session->set_flashdata('error', 'Username sudah digunakan !!');
                redirect('users/edit/' . $this->input->post('id_users'));
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
                        'user_type'     => $this->input->post('user_type'),
                        'active'        => $this->input->post('active'),
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
                    'user_type'     => $this->input->post('user_type'),
                    'active'        => $this->input->post('active'),
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
                redirect('users/edit/' . $this->input->post('id_users'));
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('users/edit/' . $this->input->post('id_users'));
            }
        }
    }


    public function delete($id = '')
    {
        if (empty($id)) {
            $this->session->set_flashdata('error', 'Internal Error !!');
            redirect('users');
        }
        // get detail
        $result = $this->m_users->get_detail_users($id);
        if (!empty($result)) {
            // delete process
            if ($this->m_users->delete_users(array('id_users' => $id))) {
                // notification
                $this->session->set_flashdata('success', 'Data berhasil di hapus !!');
                redirect('users');
            } else {
                // notification
                $this->session->set_flashdata('error', 'Data gagal di hapus !!');
                redirect('users');
            }
        } else {
            // notification
            $this->session->set_flashdata('error', 'Data gagal di hapus !!');
            redirect('users');
        }
    }
}
