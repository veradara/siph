<?php

defined('BASEPATH') or exit('No direct script access allowed');

class m_produk extends CI_Model {

    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }


    // get all categories data
    function get_total_categories(){
        
        $sql = "SELECT * FROM product_categories";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return count($result);
        } else {
            return 0;
        }
    }


    // get all categories data
    function get_all_categories($data){
        
        $sql = "SELECT * FROM product_categories
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

    // get all categories data
    function get_all_categories_form(){
        
        $sql = "SELECT * FROM product_categories";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    // get detail categories by id
    function get_detail_categories($id){
        
        $sql = "SELECT * FROM product_categories
                WHERE id_product_categories = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    public function insert_categories($data = array())
    {
        $this->db->insert('product_categories', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_categories($data = array(), $where)
    {
        $this->db->update('product_categories', $data, $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function delete_categories($where)
    {
        $this->db->delete('product_categories', $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }


    // get all product data
    function get_total_produk(){
        
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


    // get all product data
    function get_all_produk($data){
        
        $sql = "SELECT p.*, pc.name_categories as category_name FROM product p
                LEFT JOIN product_categories pc ON p.id_product_categories = pc.id_product_categories
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


    // get detail product by id
    function get_detail_produk($id){
        
        $sql = "SELECT p.*, pc.name_categories as category_name FROM product p
            LEFT JOIN product_categories pc ON p.id_product_categories = pc.id_product_categories
                WHERE p.id_product = ?";
        $query = $this->db->query($sql, $id);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    public function insert_produk($data = array())
    {
        $this->db->insert('product', $data);
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_produk($data = array(), $where)
    {
        $this->db->update('product', $data, $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function delete_produk($where)
    {
        $this->db->delete('product', $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }


    function get_all_product_by_categories($id){

        if (!empty($id)) {
            $sql = "SELECT p.*, pc.name_categories as category_name FROM product p
                LEFT JOIN product_categories pc ON p.id_product_categories = pc.id_product_categories
                WHERE p.id_product_categories = ?";
            $query = $this->db->query($sql, $id);
        }else{
            $sql = "SELECT p.*, pc.name_categories as category_name FROM product p
                LEFT JOIN product_categories pc ON p.id_product_categories = pc.id_product_categories";
            $query = $this->db->query($sql);
        }
        
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_all_product_by_search($string=''){

        $sql = "SELECT p.*, pc.name_categories as category_name FROM product p
            LEFT JOIN product_categories pc ON p.id_product_categories = pc.id_product_categories
            WHERE p.name LIKE '%".$string."%' ";
        $query = $this->db->query($sql);
    
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }




  
}
