<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cart extends CI_Model {

	
    function __construct() {
        // Call the Model constructor
        parent::__construct();
        // load encrypt
        $this->load->library('encrypt');
        $this->db = $this->load->database('default', true);
    }

    public function insert_cart($data = array())
    {
    	$userdata = $this->session->all_userdata();
    	// check active cart
    	$check = $this->get_active_cart();
    	if (empty($check)) {
    		$insert = array(
    			'id_user' 	 => $userdata['id'],
    			'created_at' => date('Y-m-d H:i:s'),
    			'created_by' => $userdata['id'],
    		);
    		$this->db->insert('cart', $insert);
    		$data['id_cart'] = $this->db->insert_id();; 
    	}else{
    		$data['id_cart'] = $check['id_cart']; 
    	}

        return $this->db->insert('cart_list', $data);
    }


    function get_active_cart(){
        $userdata = $this->session->all_userdata();
        $sql = "SELECT * FROM cart
                WHERE id_user = ? and status = '1'";
        $query = $this->db->query($sql, $userdata['id']);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    function get_all_active_cart(){
        $userdata = $this->session->all_userdata();
        $sql = "SELECT cl.*, p.name, p.price, p.file FROM cart_list cl
        		INNER JOIN cart c ON cl.id_cart = c.id_cart
        		INNER JOIN product p ON cl.id_product = p.id_product
                WHERE id_user = ? and status = '1'";
        $query = $this->db->query($sql, $userdata['id']);
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return array();
        }
    }


    public function delete_cart_list($where)
    {
        $this->db->delete('cart_list', $where);
        return ($this->db->affected_rows() != 1) ? false : true;

    }

    public function delete_cart_all($where, $id_cart)
    {
        $this->db->delete('cart_list', array('id_cart' => $id_cart));
        return $this->db->delete('cart', $where);   

    }

    function get_total_price($id_cart){
        $sql = "SELECT sum(p.price*cl.quantity) as total FROM cart_list cl
                INNER JOIN cart c ON cl.id_cart = c.id_cart
                INNER JOIN product p ON cl.id_product = p.id_product
                WHERE cl.id_cart = ? and c.status = '1'";
        $query = $this->db->query($sql, $id_cart);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result['total'];
        } else {
            return 0;
        }
    }




}

/* End of file M_cart.php */
/* Location: ./application/models/M_cart.php */