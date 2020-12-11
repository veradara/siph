<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_login extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }

    // check login
    function check_login($data = array()){
        $sql = "SELECT * FROM users
                WHERE username = ? AND password = ? AND active = '1' ";
        $query = $this->db->query($sql, $data);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return false;
        }
    }




    
  
}
