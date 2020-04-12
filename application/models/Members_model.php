<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members_model extends CI_Model {

    public function memberSave($data){
        $this->db->insert_batch('members', $data);
    }
}