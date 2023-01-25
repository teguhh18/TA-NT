<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mhunian extends CI_Model
{

    // Buat Method untuk tampil data
    function get_data($token)
    {
        // Mendapatkan nama gambar
        // $nameImg = $this->db->select("gambar");
        // $this->db->from("hunian");
        // $image_path = $nameImg['name'];
        
        

        $this->db->select("id_hunian AS id,
        nama_hunian AS nama,
        nomor_hunian AS nomor_hunian,
        jenis_hunian AS jenis,
        deskripsi_hunian AS deskripsi,
        status_hunian AS status,
        harga_hunian AS harga,
        gambar AS gambar
        ");
        $this->db->from("hunian");

        // Jika token(nomor_hunian) ada
        if(!empty($token))
        {
            $this->db->where("TO_BASE64(nomor_hunian) = '$token' OR TO_BASE64(nama_hunian) = '$token'");
        }

        $this->db->order_by("nomor_hunian", "ASC");

        $query = $this->db->get()->result();
        return $query;
    }

    function detail_hunian($id_hunian)
    {
    $hasil = $this->db->where('id_hunian', $id_hunian)->get('hunian');

    if($hasil->num_rows() > 0){
      return $hasil->result();
    }
    else{
      return false;
    }
    }

    function save_data($nama_hunian,$nomor_hunian,$jenis_hunian,$deskripsi_hunian,$status_hunian,$harga_hunian,$gambar,$token)
    {
        $this->db->select("nomor_hunian");
        $this->db->from("hunian");
        $this->db->where("TO_BASE64(nomor_hunian) = '$token'");
        // Ekseskusi Query
        $query = $this->db->get()->result();
        // Jika nomor_hunian sudah ada
        if(count($query) == 0)
        {
            // isi untuk nilai masing masing field
            $data = array(
                "nama_hunian" => $nama_hunian,
                "nomor_hunian" => $nomor_hunian,
                "jenis_hunian" => $jenis_hunian,
                "deskripsi_hunian" => $deskripsi_hunian,
                "status_hunian" => $status_hunian,
                "harga_hunian" => $harga_hunian,
                "gambar" => $gambar,
            );
            // Simpan Data ke table Hunian
            $this->db->insert("hunian",$data);
            // beri nilai hasil=0
            $hasil = 0;
        }
        // Jika npm tidak ditemukan
        else
        {
            // beri nilai hasil=1
            $hasil = 1;
        }    
        return $hasil;
    }

    // Membuat fungsi hapus data
function delete_data($token)
{
    // Cek apakah "nomor_hunian" ada atau tidak
    $this->db->select("nomor_hunian");
    $this->db->from("hunian");
    $this->db->where("TO_BASE64(nomor_hunian) = '$token'");
    // Ekseskusi Query
    $query = $this->db->get()->result();
    // Jika nomor_hunian ditemukan
    if(count($query) == 1)
    {
        // Hapus data mahasiswa
        $this->db->where("TO_BASE64(nomor_hunian) = '$token'");
        $this->db->delete("hunian");
        // kirim nilai hasil 1
        $hasil = 1;
    }
    // Jika nomor_hunian tidak ditemukan
    else
    {
        // kirim nilai 0
        $hasil = 0;
    }
    // Kirim varibel hasil ke "Controller" Hunian
    return $hasil;
}



}
