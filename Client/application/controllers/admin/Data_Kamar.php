<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Kamar extends CI_Controller {
   
    public function index()
	{
		$data['tampil'] = json_decode($this->client->simple_get(APIHUNIAN));
		
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/vw_data_kamar', $data);
        $this->load->view('templates_admin/footer');
	}

    function setDelete()
    {
        // buat variabel json
		$json = file_get_contents("php://input");
		$hasil = json_decode($json);


		$delete = json_decode($this->client->simple_delete(APIHUNIAN, array("nomor_hunian" => $hasil->nomornya)));

		if ($delete->result == 0) {
			echo json_encode(array("statusnya" => $delete->error));
		} else {
			echo json_encode(array("statusnya" => $delete->status));
		}
    }
}