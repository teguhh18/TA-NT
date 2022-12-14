<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . "libraries/Server.php";
class Hunian extends Server{

    // buat contructor
    public function __construct()
        {
                parent::__construct();
                // Panggil Model "Mmahasiswa"
        $this->load->model("Mhunian", "mdl", TRUE);
        }

    // Buat Fungsi "GET"
    function service_get()
    {
        
        // Panggil Fungsi "get_data()"
        $hasil = $this->mdl->get_data();

        $this->response(array("hunian" => $hasil), 200);
    }

}
