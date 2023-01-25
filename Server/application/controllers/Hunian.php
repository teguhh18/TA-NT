<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Server.php";
class Hunian extends Server{

    // buat contructor
    public function __construct()
        {
                parent::__construct();
                // Panggil Model "Mhunian"
        $this->load->model("Mhunian", "mdl", TRUE);
        }

    // Buat Fungsi "GET"
    function service_get()
    {
        // Mengambil parameter token(nomor_hunian)
        $token = $this->get("nomor_hunian");
        

        // Panggil Fungsi "get_data()"
        $hasil = $this->mdl->get_data(base64_encode($token));

        $this->response(array("hunian" => $hasil), 200);
    }


        // Buat Fungsi "POST"
        function service_post()
        {

            $file = $_FILES['gambar'];

            $path = "uploads/hunian";
            $nmfile = "".time();

            if(!empty($file['name'])) {
                $config['upload_path'] = './'.$path;
                $config['allowed_types'] = "jpg|jpeg|png";
                $config['filename'] = $nmfile;
                $config['max_size'] = 2048;
                $this->upload->initialize($config);

                if($this->upload->do_upload('gambar')) {
                    // Untuk Mendapatkan Gambar Yang di upload
                    $uploadData = $this->upload->data();
                    // $path_file = './'.$path.$uploadData['file_name'];
                }
            }

            // Ambli parameter data yang akan diisi
            $data = array(
                "nama_hunian" => $this->post("nama_hunian"),
                "nomor_hunian" => $this->post("nomor_hunian"),
                "jenis_hunian" => $this->post("jenis_hunian"),
                "deskripsi_hunian" => $this->post("deskripsi_hunian"),
                "status_hunian" => $this->post("status_hunian"),
                "harga_hunian" => $this->post("harga_hunian"),
                "gambar" => $uploadData['file_name'],
                "token" => base64_encode($this->post("nomor_hunian"))
            );

            // panggil method save_data()
            $hasil = $this->mdl->save_data($data["nama_hunian"],$data["nomor_hunian"],$data["jenis_hunian"],$data["deskripsi_hunian"],$data["status_hunian"],$data["harga_hunian"],$data["gambar"],$data["token"]);
            // Jika Hasil = 0
            if($hasil == 0)
            {
                $this->response(array("status" => "Data Hunian Berhasil Disimpan"), 200);
            }
            // Jika hasil !=0
            else
            {
                $this->response(array("status" => "Data Hunian Gagal Disimpan"), 200);
            }
        }
        

        // Buat Fungsi "DELETE"
    function service_delete()
    {
    // ambil parameter token("nomor_hunian")
    $token = $this->delete("nomor_hunian");
    // Panggil fungsi "delete_data"
    $hasil = $this->mdl->delete_data (base64_encode($token));
    // jika proses delete berhasil
    if ($hasil == 1) {
        $this->response(array("status" => "Data Hunian Berhasil Dihapus"), 200);
    }
    // Jika proses delete gagal
    else {
        $this->response(array("status" => "Data Hunian Gagal Dihapus"), 200);
    }

    }

    function service_detail()
    {
        $hasil = $this->mdl->detail_hunian();
        $this->response(array("detail" => $hasil), 200);
    }

    
}
