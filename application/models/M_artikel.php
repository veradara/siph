<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_artikel extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }


    // get all artikel data
    function get_total_artikel(){
        
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


    // get all artikel data
    function get_all_artikel($data){
        
        $sql = "SELECT * FROM article
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


    // get detail artikel by id
    function get_detail_artikel($id){
        
        $sql = "SELECT * FROM article
                WHERE id_article = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    public function insert_artikel($data = array())
    {
        $this->db->insert('article', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_artikel($data = array(), $where)
    {
        $this->db->update('article', $data, $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function delete_artikel($where)
    {
        $this->db->delete('article', $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }




  
}
