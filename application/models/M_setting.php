<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_setting extends CI_Model
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
        $this->db->from('setting');
        $result = $this->db->get();

        return $result->result();
    }

    // get detail artikel by id
    function get_detail_setting()
    {

        $sql = "SELECT * FROM setting
                WHERE id = 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function update($data = array(), $where)
    {
        return $this->db->update('setting', $data, $where);
    }
}
