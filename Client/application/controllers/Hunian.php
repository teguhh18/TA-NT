<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hunian extends CI_Controller {
   
    public function index()
	{
		$this->load->view('dashboard');
	}

	public function data_hunian()
	{
		$data['tampil'] = json_decode($this->client->simple_get(APIHUNIAN));
		$this->load->view('vw_hunian', $data);
	}

	public function detailHunian()
	{
		// $data['tampil'] = json_decode($this->client->simple_get(APIHUNIAN));
		// $this->load->view('detail_hunian', $data);

		// ambil nilai nomor_hunian
		$token = $this->uri->segment(3);

		$data['tampil'] = json_decode($this->client->simple_get(APIHUNIAN, array("nomor_hunian" => $token)));

			$this->load->view('detail_hunian', $data);
		
	}

	

	
}