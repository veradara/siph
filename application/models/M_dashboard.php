<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_dashboard extends CI_Model
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }

    // get total data
    function get_total_article()
    {

        $sql = "SELECT * FROM article";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return count($result);
        } else {
            return 0;
        }
    }


    function get_total_product()
    {

        $sql = "SELECT * FROM product";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return count($result);
        } else {
            return 0;
        }
    }


    function get_total_emergency()
    {

        $sql = "SELECT * FROM emergency_call WHERE status = '0'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return count($result);
        } else {
            return 0;
        }
    }
    function get_total_penjualan()
    {

        $sql = "SELECT * FROM checkouts WHERE payment_status = '2'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return count($result);
        } else {
            return 0;
        }
    }


    function get_total_pets()
    {

        $sql = "SELECT * FROM pets";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return count($result);
        } else {
            return 0;
        }
    }
}
