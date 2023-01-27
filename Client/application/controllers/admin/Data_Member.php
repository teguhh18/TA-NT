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

    public function tambah_kamar()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/form_tambah_kamar');
        $this->load->view('templates_admin/footer');
    }

    public function tambah_kamar_aksi()
    {
        $gambar    = $_FILES['gambar']['name'];
  
        if($gambar=''){}
        else{
          $config['upload_path'] = './assets/upload';
          $config['allowed_types'] = 'jpg|jpeg|png|tiff';
  
          $this->load->library('upload', $config);
          if(!$this->upload->do_upload('gambar')){
            echo "Gambar Kamar gagal diupload";
          }
          else{
            $gambar = $this->upload->data('file_name');
          }
        }

        // baca nilai dari fetch
		$data = array(
			"nama" => $this->input->post("nama"),
			"nomor" => $this->input->post("nomor"),
			"deskripsi" => $this->input->post("deskripsi"),
			"status" => $this->input->post("status"),
			"harga" => $this->input->post("harga"),
			"gambar" => $this->input->post("gambar"),
			"token" => $this->input->post("nomor"),
			
		);

		$save = json_decode($this->client->simple_post(APIHUNIAN, $data));

		if ($save->result == 0) {
			echo json_encode(array("statusnya" => $save->error));
            redirect('admin/data_kamar/tambah_kamar');
		} else {
			echo json_encode(array("statusnya" => $save->status));
            redirect('admin/data_kamar');
		}
     
    


    }


}