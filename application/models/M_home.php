<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }

    function get_last_product(){
        
        $sql = "SELECT * FROM product
                ORDER BY id_product desc
                 LIMIT 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_ready_adopt_home(){
        
        $sql = "SELECT * FROM pets
                ORDER BY id_pets desc
                 LIMIT 3";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_category_product(){
        
        $sql = "SELECT * FROM product_categories";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            foreach ($result as $key => $value) {
                $result[$key]['product'] = $this->get_product_by_cat_id($value['id_product_categories']);
            }
            return $result;
        } else {
            return array();
        }
    }


    function get_product_by_cat_id($id){
        
        $sql = "SELECT * FROM product WHERE id_product_categories = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_category_pets(){
        
        $sql = "SELECT * FROM pets";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
        
            $arr = array();
            foreach ($result as $key => $item) {
               $arr[$item['type']][$key] = $item;
            }

            return $arr;
        } else {
            return array();
        }
    }


    function get_all_article(){
        
        $sql = "SELECT * FROM article LIMIT 16";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_detail_article($id){
        
        $sql = "SELECT * FROM article where id_article = ?";
        $query = $this->db->query($sql,$id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_detail_profile(){
        $userdata = $this->session->all_userdata();
        $id = $userdata['id'];
        $sql = "SELECT * FROM users where id_users = ?";
        $query = $this->db->query($sql,$id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
    
            return $result;
        } else {
            return array();
        }
    }


    function get_detail_pets($id){
        
        $sql = "SELECT * FROM pets where id_pets = ?";
        $query = $this->db->query($sql,$id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_all_settings(){
        
        $sql = "SELECT * FROM setting where id = 1";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    function get_count_cart(){
        $userdata = $this->session->all_userdata();
        $id = empty($userdata['id']) ? 0 : $userdata['id'];
        if (empty($id)) {
            $id = 0;
        }
        $sql = "SELECT count('cl.id_cart_list') as total FROM cart_list cl
                INNER JOIN cart c ON cl.id_cart = c.id_cart
                WHERE c.status = '1' AND c.id_user = ?";
        $query = $this->db->query($sql,$id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return 0;
        }
    }



    public function insert_emergency($data = array())
    {
        $this->db->insert('emergency_call', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

   

}

/* End of file M_home.php */
/* Location: ./application/models/M_home.php */