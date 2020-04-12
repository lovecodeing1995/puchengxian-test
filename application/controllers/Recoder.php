<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recoder extends CI_Controller {

	
    public function __construct() {
        Parent::__construct();
        $this->load->model("Recoder_model", "Recoder");
    }
	public function index()
	{
        $this->load->view('header');
        $this->load->view('recoder');
        $this->load->view('footer');
    }
    public function get_recoder() {
        // POST data
        $postData = $this->input->post();

        // Get data
        $data = $this->Recoder->getRecoder($postData);

        echo json_encode($data);
        exit();
    }
    public function test() {
        $books = $this->Recoder->get_recorder(1, 10);
        echo "<pre>";
        print_r($books->result());
    }
}