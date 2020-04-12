<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Order_model extends CI_Model {

    public function orderGet(){
        // $this->db->select('orders.id, order_details.order_id')
        $this->db->from('orders')
         ->join('order_details', 'orders.id = order_details.order_id')
         ->join('portions', 'order_details.item_id = portions.item_id')
         ->join('portion_details', 'portions.id = portion_details.portion_id')
         ->join('parts', 'portion_details.part_id = parts.id');
        return $this->db->get()->result();
    }
    public function orderNameGet() {
        $this->db->select('name');
        return $this->db->get('orders')->result();
    }
    public function partGet(){
        return $this->db->get('orders')->rows_num();
    }
}