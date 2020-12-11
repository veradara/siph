<?php

class M_laporan_pemasukan extends CI_Model
{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }
    public function getAll()
    {
        $this->db->select('*');
        $this->db->from('checkouts');
        $this->db->where('payment_status', '2');
        $result = $this->db->get();

        return $result->result();
    }
    public function getPenjualan()
    {
        $this->db->select('*');
        $this->db->from('checkouts');
        $result = $this->db->get();

        return $result->result();
    }
    function get_total_penjualan()
    {

        $sql = "SELECT * FROM checkouts";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return count($result);
        } else {
            return 0;
        }
    }

    public function getTotalPemasukan()
    {
        $this->db->select('sum(checkouts.total_price) as total');
        $this->db->from('checkouts');
        $this->db->where('payment_status', '2');

        $result = $this->db->get();

        return $result->result();
    }

    function tampil_data()
    {
        return $this->db->get('tbl_katalog');
    }

    function cari($id_katalog)
    {
        $query = $this->db->get_where('tbl_katalog', array('id_katalog' => $id_katalog));
        return $query;
    }

    public function getTotalPenjualan()
    {
        $this->db->select('sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');

        $result = $this->db->get();

        return $result->result();
    }

    public function getPemasukanbytgl($keyword1, $keyword2)
    {
        $this->db->select('*');
        $this->db->from('checkouts');
        $this->db->where('payment_status', '2');
        $this->db->where('updated_at >=', $keyword1);
        $this->db->where('updated_at <=', $keyword2);
        $result = $this->db->get();

        return $result->result();
    }
    public function getTotalPemasukanBydate($keyword1, $keyword2)
    {
        $this->db->select('sum(checkouts.total_price) as total');
        $this->db->from('checkouts');
        $this->db->where('payment_status', '2');
        $this->db->where('updated_at >=', $keyword1);
        $this->db->where('updated_at <=', $keyword2);
        $result = $this->db->get();

        return $result->result();
    }
    public function getSaldoku($keyword1, $keyword2)
    {
        $this->db->select('sum(tbl_penjualan.berat_penjualan) as berat,sum(tbl_penjualan.total_penjualan) as total');
        $this->db->from('tbl_penjualan');
        $this->db->join('tbl_katalog', 'tbl_katalog.id_katalog=tbl_penjualan.id_katalog');
        $this->db->where('time_create_penjualan >=', $keyword1);
        $this->db->where('time_create_penjualan <=', $keyword2);

        $result = $this->db->get();

        return $result->result();
    }

    public function getStokReady()
    {
        $this->db->select('*, COUNT(*) as count');

        $this->db->from('armada');
        $this->db->where('status', 'ready');
        $result = $this->db->get();

        return $result->result();
    }
}
