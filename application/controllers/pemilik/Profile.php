<?php 

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $data = [
            'title' => 'Profile Pemilik',
        ];
        $data['user'] = $this->M_home->get_detail_profile();

        $this->form_validation->set_rules('fullname', 'username', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'username', 'required');
        $this->form_validation->set_rules('address', 'username', 'required');
        $this->form_validation->set_rules('phone', 'username', 'required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('pemilik/layouts/header', $data);
            $this->load->view('pemilik/layouts/sidebar');
            $this->load->view('pemilik/layouts/topbar');
            $this->load->view('pemilik/profile');
            $this->load->view('pemilik/layouts/footer');
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

            $this->db->where('id_users', $this->input->post('id_users'));
            $this->db->update('users', $data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Profile Berhasil Diubah!</div>');
            redirect('pemilik/profile');
        }
    }
}