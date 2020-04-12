<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Field extends CI_Controller {
	public function index()
	{
        $this->load->view('header');
        $this->load->view('field');
        $this->load->view('footer');
	}
}