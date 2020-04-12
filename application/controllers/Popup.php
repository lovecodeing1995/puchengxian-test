<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Popup extends CI_Controller {

	public function index()
	{
        $this->load->view('header');
        $this->load->view('popup');
        $this->load->view('footer');
	}
}