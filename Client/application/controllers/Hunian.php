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
}