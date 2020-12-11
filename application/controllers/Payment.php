<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once(dirname(__FILE__) . "/Base.php");


class Payment extends Base
{


    public function __construct()
    {
        // Construct the parent class
        parent::__construct();
        // load model
        $this->load->model('m_payment');
        $this->load->model('m_checkouts');
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
        $total = $this->m_payment->get_total_payment();

        $this->load->library('pagination');
        $config['base_url'] = base_url() . 'payment/index/';
        $config['total_rows'] = $total;
        $config['per_page'] = 25;
        $config['uri_segment'] = 3;
        $config['from'] = $this->uri->segment(3);
        $from = $this->uri->segment(3);

        $this->pagination->initialize($config);

        $data['payment'] = $this->m_payment->get_all_history(array(empty($from) ? 0 : intval($from), $config['per_page']));

        $numb = empty($from) ? 1 : intval($from);
        $data["links"] = $this->pagination->create_links();
        $data["no"]    = $numb++;
        $data['setting'] = $this->m_setting->getAll();
        // assign data
        $this->template->set('title', 'payment Petshop Ku');
        $this->template->load('default', 'contents', 'payment/index.php', $data);
    }


    public function confirm_process($id_checkout = '', $page = '')
    {

        $update = array(
            'payment_status'         => '2',
            'updated_at'             => date('Y-m-d H:i:s')
        );

        $where = array('id_checkout' => $id_checkout);

        // insert process
        $return = $this->m_checkouts->update_checkout($update, $where);
        if ($return) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
            redirect('payment/' . $page);
        } else {
            $this->session->set_flashdata('error', 'Data gagal disimpan !!');
            redirect('payment/' . $page);
        }
    }
}
