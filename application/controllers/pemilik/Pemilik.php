<?php

class Pemilik extends CI_Controller
{
    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // load model
        $this->load->model('M_dashboard');
        $this->load->model('M_setting');
        $this->load->model('M_home');
    }
    public function index()
    {
        $data = [
            'title' => 'Pemilik',
        ];
        $data['total_product'] = $this->m_dashboard->get_total_product();
        $data['get_total_penjualan'] = $this->m_dashboard->get_total_penjualan();
        $data['get_Total_Pemasukan'] = $this->M_laporan_pemasukan->getTotalPemasukan();
        $data['get_Total_Pengeluaran'] = $this->M_laporan_pengeluaran->getTotalPengeluaran();
        $data['setting'] = $this->M_setting->getAll();

        $data['user'] = $this->M_home->get_detail_profile();

        $this->load->view('pemilik/layouts/header', $data);
        $this->load->view('pemilik/layouts/sidebar');
        $this->load->view('pemilik/layouts/topbar');
        $this->load->view('pemilik/index');
        $this->load->view('pemilik/layouts/footer');
    }

    public function konfirmasi_checkout()
    {
        $data = [
            'title' => 'Pemilik',
            'checkouts_selesai' => $this->M_laporan_pemasukan->getPenjualan(),
            'get_total_penjualan' => $this->M_laporan_pemasukan->get_total_penjualan(),
            'get_Total_Pemasukan' => $this->M_laporan_pemasukan->getTotalPemasukan()
        ];
        $data['user'] = $this->M_home->get_detail_profile();

        $this->load->view('pemilik/layouts/header', $data);
        $this->load->view('pemilik/layouts/sidebar');
        $this->load->view('pemilik/layouts/topbar');
        $this->load->view('pemilik/konfirmasi_checkout');
        $this->load->view('pemilik/layouts/footer');
    }

    public function laporan_pemasukan()
    {
        $data = [
            'title' => 'Pemilik',
            'saldoku' => $this->M_laporan_pemasukan->getTotalPemasukan(),
            'checkouts_selesai' => $this->M_laporan_pemasukan->getAll(),
            'get_Total_Pemasukan' => $this->M_laporan_pemasukan->getTotalPemasukan()
        ];
        $data['user'] = $this->M_home->get_detail_profile();

        $this->load->view('pemilik/layouts/header', $data);
        $this->load->view('pemilik/layouts/sidebar');
        $this->load->view('pemilik/layouts/topbar');
        $this->load->view('pemilik/laporan_pemasukan');
        $this->load->view('pemilik/layouts/footer');
    }

    public function laporan_pemasukan_pdf()
    {

        $this->load->library('dompdf_gen');

        $keyword1 = $this->input->post('keyword1');
        $keyword2 = $this->input->post('keyword2');
        $data = [
            'awal' =>  $keyword1,
            'akhir' => $keyword2,
            'saldoku' => $this->M_laporan_pemasukan->getTotalPemasukanBydate($keyword1, $keyword2),
            'pemasukan' => $this->M_laporan_pemasukan->getAll(),
            'logo' => '<img src="assets/images/logo-default.png" alt="" height="40" class="mr-3">',
            'gambar' => './uploads/bukti/'
        ];
        $data['laporanpemasukan'] = $this->M_laporan_pemasukan->getPemasukanbytgl($keyword1, $keyword2);
        $this->load->view('/laporan/pdf/Pemasukan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_data_keuangan.pdf", ['Attachment' => 0]);
    }

    public function laporan_pengeluaran()
    {
        $data = [
            'title' => 'Pemilik',
            'saldoku' => $this->M_laporan_pengeluaran->getTotalPengeluaran(),
            'pengeluaran' => $this->M_laporan_pengeluaran->getAll()
        ];
        $data['user'] = $this->M_home->get_detail_profile();
        
        $this->load->view('pemilik/layouts/header', $data);
        $this->load->view('pemilik/layouts/sidebar');
        $this->load->view('pemilik/layouts/topbar');
        $this->load->view('pemilik/laporan_pengeluaran');
        $this->load->view('pemilik/layouts/footer');
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
}
