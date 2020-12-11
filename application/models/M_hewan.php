<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_hewan extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }


    // get all hewan data
    function get_total_hewan(){
        
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


    // get all hewan data
    function get_all_hewan($data){
        
        $sql = "SELECT * FROM pets
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


    // get detail hewan by id
    function get_detail_hewan($id){
        
        $sql = "SELECT * FROM pets
                WHERE id_pets = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    public function insert_hewan($data = array())
    {
        $this->db->insert('pets', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_hewan($data = array(), $where)
    {
        $this->db->update('pets', $data, $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function delete_hewan($where)
    {
        $this->db->delete('pets', $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }




  
}
