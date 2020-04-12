<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions_model extends CI_Model {

    public function transactionSave($data){
        $this->db->insert_batch('transactions', $data);
    }
    public function trandetailSave($data) {
        $this->db->insert_batch('transaction_items', $data);
    }
}