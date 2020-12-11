<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_emergency extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }


    // get all emergency_call data
    function get_total_emergency_call(){
        
        $sql = "SELECT * FROM emergency_call";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return count($result);
        } else {
            return 0;
        }
    }


    // get all emergency_call data
    function get_all_emergency_call($data){
        
        $sql = "SELECT ec.*, u.fullname, u.phone  FROM emergency_call ec
                LEFT JOIN users u ON ec.id_users = u.id_users
                ORDER BY ec.created_at DESC
                LIMIT ?, ?";
        $query = $this->db->query($sql, $data);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    // get detail emergency_call by id
    function get_detail_emergency_call($id){
        
        $sql = "SELECT * FROM emergency_call
                WHERE id_emergency_call = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function close_call($where)
    {
        return $this->db->update('emergency_call', array('status' => '1'), $where);

    }
  
}
