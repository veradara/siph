<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_checkouts extends CI_Model {

	
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }


    // get all emergency_call data
    function get_all_history(){
        $userdata = $this->session->all_userdata();
        $sql = "SELECT cc.* FROM checkouts cc 
                LEFT JOIN cart c ON c.id_cart = c.id_cart
                WHERE c.id_user = ?
                GROUP BY cc.id_checkout
                ORDER BY id_checkout DESC";
        $query = $this->db->query($sql, $userdata['id']);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            foreach ($result as $key => $value) {
                $result[$key]['detail_barang'] = $this->get_all_checkout_list($value['id_cart']);
            }
            return $result;
        } else {
            return array();
        }
    }

    function get_all_checkout_list($id_cart){
        $sql = "SELECT cl.*, p.name, p.price, p.file FROM cart_list cl
                INNER JOIN cart c ON cl.id_cart = c.id_cart
                INNER JOIN product p ON cl.id_product = p.id_product
                WHERE cl.id_cart = ? and c.status = '0'";
        $query = $this->db->query($sql, $id_cart);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }

    public function insert_checkout($data = array(), $id_cart = '')
    {
        $this->db->insert('checkouts', $data);
        $this->db->update('cart', array('status' => '0'), array('id_cart' => $id_cart));
        return ($this->db->affected_rows() != 1) ? false : true;
    }

    public function update_checkout($data = array(), $where)
    {
        $this->db->update('checkouts', $data, $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }
}

/* End of file M_cart.php */
/* Location: ./application/models/M_cart.php */