<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tentang extends CI_Controller {
   
    public function index()
	{

        $this->load->view('templates_customer/header');
        $this->load->view('vw_tentang');
        $this->load->view('templates_customer/footer');
	}
}