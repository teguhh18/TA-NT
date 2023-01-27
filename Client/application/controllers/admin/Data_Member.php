<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Member extends CI_Controller {
   
    public function index()
	{
		$data['tampil'] = json_decode($this->client->simple_get(APIMEMBER));
		
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/vw_data_member', $data);
        $this->load->view('templates_admin/footer');
	}

    function deleteMember()
    {
        // buat variabel json
		$json = file_get_contents("php://input");
		$hasil = json_decode($json);


		$delete = json_decode($this->client->simple_delete(APIMEMBER, array("no_ktp" => $hasil->ktpnya)));

		if ($delete->result == 0) {
			echo json_encode(array("statusnya" => $delete->error));
		} else {
			echo json_encode(array("statusnya" => $delete->status));
		}
    }

    public function tambah_member()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_member');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_member_aksi()
    {
        
        // baca nilai dari fetch
		$data = array(
			"nama" => $this->input->post("nama"),
			"email" => $this->input->post("email"),
			"alamat" => $this->input->post("alamat"),
			"gender" => $this->input->post("gender"),
			"telepon" => $this->input->post("telepon"),
			"ktp" => $this->input->post("ktp"),
			"pass" => $this->input->post("pass"),
			"role" => $this->input->post("role"),
			"token" => $this->input->post("ktp"),
			
		);

		$save = json_decode($this->client->simple_post(APIMEMBER, $data));

		if ($save->result == 0) {
			echo json_encode(array("statusnya" => $save->error));
            redirect('admin/data_member/tambah_member');
		} else {
			echo json_encode(array("statusnya" => $save->status));
            redirect('admin/data_member');
		}
     
    


    }


}