<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Server.php";
class Member extends Server{

    // buat contructor
    public function __construct()
        {
                parent::__construct();
                // Panggil Model "Mhunian"
        $this->load->model("Mmember", "mdl", TRUE);
        }

    // Buat Fungsi "GET"
    function service_get()
    {
        // Mengambil parameter token(nomor_hunian)
        $token = $this->get("email");

        // Panggil Fungsi "get_data()"
        $hasil = $this->mdl->get_data(base64_encode($token));

        $this->response(array("member" => $hasil), 200);
    }

        // Buat Fungsi "POST"
        function service_post()
        {

            // Ambli parameter data yang akan diisi
            $data = array(
                "nama_member" => $this->post("nama_member"),
                "email" => $this->post("email"),
                "alamat" => $this->post("alamat"),
                "gender" => $this->post("gender"),
                "no_telepon" => $this->post("no_telepon"),
                "no_ktp" => $this->post("no_ktp"),
                "password" => $this->post("password"),
                "role_id" => $this->post("role_id"),
                "token" => base64_encode($this->post("email"))
            );

            // panggil method save_data()
            $hasil = $this->mdl->save_data($data["nama_member"],$data["email"],$data["alamat"],$data["gender"],$data["no_telepon"],$data["no_ktp"],$data["password"],$data["role_id"],$data["token"]);
            // Jika Hasil = 0
            if($hasil == 0)
            {
                $this->response(array("status" => "Data Member Berhasil Disimpan"), 200);
            }
            // Jika hasil !=0
            else
            {
                $this->response(array("status" => "Data Member Gagal Disimpan"), 200);
            }
        }
        
        // Buat Fungsi "DELETE"
    function service_delete()
    {
    // ambil parameter token("email")
    $token = $this->delete("no_ktp");
    // Panggil fungsi "delete_data"
    $hasil = $this->mdl->delete_data(base64_encode($token));
    // jika proses delete berhasil
    if ($hasil == 1) {
        $this->response(array("status" => "Data Member Berhasil Dihapus"), 200);
    }
    // Jika proses delete gagal
    else {
        $this->response(array("status" => "Data Member Gagal Dihapus"), 200);
    }

    }

    
}
