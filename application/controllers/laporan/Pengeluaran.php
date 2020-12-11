<?php

class Pengeluaran extends CI_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // load model
        $this->load->model('m_artikel');
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
        $total = $this->m_artikel->get_total_artikel();
        $data['setting'] = $this->m_setting->getAll();
        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'artikel/index/';
        $config['total_rows'] = $total;
        $config['per_page'] = 25;
        $config['uri_segment'] = 3;
        $config['from'] = $this->uri->segment(3);
        $from = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data['artikel'] = $this->m_artikel->get_all_artikel(array(empty($from) ? 0 : intval($from), $config['per_page']));

        $numb = empty($from) ? 1 : intval($from);
        $data["links"] = $this->pagination->create_links();
        $data["no"]    = $numb++;
        $data = [
            'saldoku' => $this->M_laporan_pengeluaran->getTotalPengeluaran(),
            'pengeluaran' => $this->M_laporan_pengeluaran->getAll()
        ];

        // assign data
        $this->template->set('title', 'Laporan Pemasukan');
        $this->template->load('default', 'contents', 'laporan/pengeluaran/index.php', $data);
    }

    public function laporan_pengeluaran_pdf()
    {

        $this->load->library('dompdf_gen');

        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');
        $data = [
            'awal' =>  $keyword1,
            'akhir' => $keyword2,
            'saldoku' => $this->M_laporan_pengeluaran->getTotalPengeluaranBydate($keyword1, $keyword2),
            'pengeluaran' => $this->M_laporan_pengeluaran->getAll(),
            'logo' => '<img src="assets/images/logo-default.png" alt="" height="40" class="mr-3">',
            'gambar' => './uploads/produk/'
        ];
        $data['laporanpengeluaran'] = $this->M_laporan_pengeluaran->getPengeluaranBytgl($keyword1, $keyword2);
        $this->load->view('/laporan/pdf/Pengeluaran', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_keuangan.pdf", ['Attachment' => 0]);
    }


    public function add($id = '')
    {
        $this->template->set('title', 'Artikel Petshop Ku');
        $this->template->load('default', 'contents', 'artikel/add');
    }


    public function add_process()
    {
        // validation form
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('content', 'Konten', 'required');

        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('artikel/add');
        } else {
            // check file 
            $config['upload_path'] = './uploads/artikel/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 10240;

            // load library
            $this->load->library('upload', $config);
            $userdata = $this->session->all_userdata();


            if (!empty($_FILES['file']['name'])) {
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('artikel/add');
                } else {
                    $data = $this->upload->data();
                    $insert = array(
                        'title'          => $this->input->post('title'),
                        'content'        => $this->input->post('content'),
                        'created_at'     => date('Y-m-d H:i:s'),
                        'updated_at'     => date('Y-m-d H:i:s'),
                        'file'           => $data['file_name'],
                        'updated_by'     => $userdata['id']
                    );
                }
            } else {
                $insert = array(
                    'title'          => $this->input->post('title'),
                    'content'        => $this->input->post('content'),
                    'created_at'     => date('Y-m-d H:i:s'),
                    'updated_at'     => date('Y-m-d H:i:s'),
                    'updated_by'     => $userdata['id']
                );
            }


            // insert process
            $return = $this->m_artikel->insert_artikel($insert);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('artikel/add');
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('artikel/add');
            }
        }
    }

    public function edit($id = '')
    {
        $result['detail'] = $this->m_artikel->get_detail_artikel($id);
        $this->template->set('title', 'Artikel Petshop Ku');
        $this->template->load('default', 'contents', 'artikel/edit', $result);
    }

    public function edit_process()
    {
        // validation form
        $this->form_validation->set_rules('id_article', 'Id Article', 'required');
        $this->form_validation->set_rules('title', 'Judul', 'required');
        $this->form_validation->set_rules('content', 'Konten', 'required');

        // validate
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('artikel/edit/' . $this->input->post('id_article'));
        } else {
            // check file 
            $config['upload_path'] = './uploads/artikel/';
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size'] = 10240;

            // load library
            $this->load->library('upload', $config);
            $userdata = $this->session->all_userdata();


            if (!empty($_FILES['file']['name'])) {
                if (!$this->upload->do_upload('file')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('artikel/edit/' . $this->input->post('id_article'));
                } else {
                    $data = $this->upload->data();
                    $insert = array(
                        'title'          => $this->input->post('title'),
                        'content'        => $this->input->post('content'),
                        'updated_at'     => date('Y-m-d H:i:s'),
                        'file'           => $data['file_name'],
                        'updated_by'     => $userdata['id']
                    );
                }
            } else {
                $insert = array(
                    'title'          => $this->input->post('title'),
                    'content'        => $this->input->post('content'),
                    'updated_at'     => date('Y-m-d H:i:s'),
                    'updated_by'     => $userdata['id']
                );
            }

            $where = array('id_article' => $this->input->post('id_article'));

            // insert process
            $return = $this->m_artikel->update_artikel($insert, $where);
            if ($return) {
                $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
                redirect('artikel/edit/' . $this->input->post('id_article'));
            } else {
                $this->session->set_flashdata('error', 'Data gagal disimpan !!');
                redirect('artikel/edit/' . $this->input->post('id_article'));
            }
        }
    }


    public function delete($id = '')
    {
        if (empty($id)) {
            $this->session->set_flashdata('error', 'Internal Error !!');
            redirect('artikel');
        }
        // get detail
        $result = $this->m_artikel->get_detail_artikel($id);
        if (!empty($result)) {
            // delete process
            if ($this->m_artikel->delete_artikel(array('id_article' => $id))) {
                // notification
                $this->session->set_flashdata('success', 'Data berhasil di hapus !!');
                redirect('artikel');
            } else {
                // notification
                $this->session->set_flashdata('error', 'Data gagal di hapus !!');
                redirect('artikel');
            }
        } else {
            // notification
            $this->session->set_flashdata('error', 'Data gagal di hapus !!');
            redirect('artikel');
        }
    }
}
