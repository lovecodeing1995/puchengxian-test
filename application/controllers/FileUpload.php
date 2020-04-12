<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FileUpload extends CI_Controller {

    public function __construct() {
        Parent::__construct();
        $this->load->model("FileUpload_model", "FileUpload");
    }
	public function index()
	{
        $data['file_list'] = $this->FileUpload->fileGet()->result();
        $this->load->view('header');
        $this->load->view('fileupload', $data);
        $this->load->view('footer');
    }
    
    public function fileSave() {
        $config['upload_path'] = './assets/images/';
        $config['allowed_types'] = '*';
        $config['max_size'] = '0';
        $config['max_width'] = '0';
        $config['max_height'] = '0';
	    $this->load->library('upload', $config);
	    $this->upload->do_upload('userfile');
	    $data = array('upload_data' => $this->upload->data());
        $file = $this->upload->data();
        $data = array(
            'name' => $file['file_name'],
	 		'email' => $file['raw_name'].'@gmail.com',
            'created' => date('Y-m-d H:i:s'),
	 		'modified'=> date('Y-m-d H:i:s')
        );
        $query = $this->FileUpload->fileSave($data);
        $response = array(
            'id' => $query,
            'name' => $file['file_name'],
	 		'email' => $file['raw_name'].'@gmail.com',
            'created' => date('Y-m-d H:i:s'),
	 		'modified'=> date('Y-m-d H:i:s')
        );
        echo json_encode($response);
    }
    function export()
    {
        $file_name = 'FileUpload.csv'; 
        header("Content-Description: File Transfer"); 
        header("Content-Disposition: attachment; filename=$file_name"); 
        header("Content-Type: application/csv;");
        $file_data = $this->FileUpload->fetch_data();
        $file = fopen('php://output', 'w');
    
        $header = array("Name","Email"); 
        fputcsv($file, $header);
        foreach ($file_data->result_array() as $key => $value)
        { 
        fputcsv($file, $value); 
        }
        fclose($file); 
        exit; 
    }
}