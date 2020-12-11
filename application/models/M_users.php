<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_users extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }


    // get all users data
    function get_total_users(){
        
        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return count($result);
        } else {
            return 0;
        }
    }


    // get all users data
    function get_all_users($data){
        
        $sql = "SELECT * FROM users
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


    // get detail users by id
    function get_detail_users($id){
        
        $sql = "SELECT * FROM users
                WHERE id_users = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    // check availabel email
    function check_user_email($email){
        
        $sql = "SELECT * FROM users
                WHERE email = ?";
        $query = $this->db->query($sql, $email);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    function check_username($username){
        
        $sql = "SELECT * FROM users
                WHERE username = ?";
        $query = $this->db->query($sql, $username);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    // check availabel email
    function check_user_email_edit($email, $uid){
        $data = array($email,$uid);
        $sql = "SELECT * FROM users
                WHERE email = ? AND id_users <> ?";
        $query = $this->db->query($sql, $data);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    function check_username_edit($username, $uid){
        $data = array($username,$uid);
        $sql = "SELECT * FROM users
                WHERE username = ? AND id_users <> ?";
        $query = $this->db->query($sql, $data);
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }


    public function insert_users($data = array())
    {
        $this->db->insert('users', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_users($data = array(), $where)
    {
        return $this->db->update('users', $data, $where);

    }

    public function delete_users($where)
    {
        $this->db->delete('users', $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }




  
}
