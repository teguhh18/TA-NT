<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hunian extends CI_Controller {
   
    public function index()
	{
		$data['tampil'] = json_decode($this->client->simple_get(APIHUNIAN));
		$this->load->view('vw_hunian', $data);

		// foreach($data["tampil"] -> mahasiswa as $result){
		// 	echo $result->npm_mhs."<br>";
		// 	echo $result->nama_mhs."<br>";
		// }

		//$this->load->load->view('vw_mahasiswa',$data);
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