<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    public function __construct() {
        Parent::__construct();
        $this->load->model("Order_model", "Orders");
        
    }
	public function index()
	{
        $order = $this->Orders->orderGet();
        $order_name = $this->Orders->orderNameGet();
        // echo "<pre>";
        // print_r($order);
        $name = array();
        $res = array();
        foreach($order_name as $o){
            $name[] = $o->name;
        }
        foreach($order as $o){
            $res[$o->order_id-1]['name'] = $name[$o->order_id-1];
            $res[$o->order_id-1]['ingredient'][$o->part_id] = array(
                'index' => $o->part_id,
                'name' => $o->name,
                'amount' => (isset($res[$o->order_id][$o->part_id]['amount']) ? $res[$o->order_id][$o->part_id]['amount']+$o->quantity*$o->value : $o->quantity*$o->value)
            );
        }
        // echo "<pre>";
        // print_r($res);
        $data['order_list'] = $res;
        $this->load->view('header');
        $this->load->view('order', $data);
        $this->load->view('footer');
	}
}