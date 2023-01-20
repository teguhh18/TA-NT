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
		$token = $this->uri->segment(4);

		$tampil = json_decode($this->client->simple_get(APIHUNIAN, array("nomor_hunian" => $token)));

		if ($tampil->result == 0) {
			echo $tampil->error;
			// echo("ini error");
		} else {

			foreach ($tampil->hunian as $result) {
				// echo $result->nama_mhs."<br>";
				$data = array(
					"nama_hunian" => $result->nama_hunian,
					"nomor_hunian" => $result->nomor_hunian,
					"jenis_hunian" => $result->jenis_hunian,
					"deskripsi_hunian" => $result->deskripsi_hunian,
					"status_hunian" => $result->status_hunian,
					"harga_hunian" => $result->harga_hunian,
					"gambar" => $result->gambar,
					"token" => $token,
				);
			}
			$this->load->view('detail_hunian', $data);
		}
	}

	

	
}