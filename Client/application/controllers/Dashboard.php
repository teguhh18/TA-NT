<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Kamar extends CI_Controller {
   
    public function index()
	{
		$data['tampil'] = json_decode($this->client->simple_get(APIHUNIAN));
		
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/vw_dashboard');
        $this->load->view('templates_admin/footer');
	}

    
}