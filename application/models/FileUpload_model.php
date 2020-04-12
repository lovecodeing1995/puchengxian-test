<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FileUpload_model extends CI_Model {

    public function fileSave($data){
        $this->db->insert('file_uploads', $data);
        return $this->db->insert_id();
    }
    public function fileGet(){
        return $this->db->get('file_uploads');
    }
    public function fetch_data()
    {
        $this->db->select("name, email");
        $this->db->from('file_uploads');
        return $this->db->get();
    }
}