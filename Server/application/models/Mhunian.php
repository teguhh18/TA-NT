<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mhunian extends CI_Model
{

    // Buat Method untuk tampil data
    function get_data()
    {
        $this->db->select("id_hunian AS id,
        nama_hunian AS nama,
        jenis_hunian AS jenis,
        deskripsi_hunian AS deskripsi,
        status_hunian AS status,
        harga_hunian AS harga,
        gambar AS gambar
        ");
        $this->db->from("hunian");
        $this->db->order_by("id_hunian", "ASC");

        $query = $this->db->get()->result();
        return $query;
    }

    function save_data($nama_hunian,$jenis_hunian,$deskripsi_hunian,$status_hunian,$harga_hunian,$gambar)
    {
        $this->db->select("nama_hunian");
        $this->db->from("hunian");
        $this->db->where("nama_hunian = nama_hunian");
        // Ekseskusi Query
        $query = $this->db->get()->result();
        // Jika npm ditemukan
        if(count($query) == 0)
        {
            // isi untuk nilai masing masing field
            $data = array(
                "nama_hunian" => $nama_hunian,
                "jenis_hunian" => $jenis_hunian,
                "deskripsi_hunian" => $deskripsi_hunian,
                "status_hunian" => $status_hunian,
                "harga_hunian" => $harga_hunian,
                "gambar" => $gambar,
            );
            // Simpan Data
            $this->db->insert("hunian",$data);
            $hasil = 0;
        }
        // Jika npm tidak ditemukan
        else
        {
            $hasil = 1;
        }    
        return $hasil;
    }
    // Membuat fungsi hapus data
function delete_data($token)
{
    // Cek apakah "id_hunian" ada atau tidak
    $this->db->select("id_hunian");
    $this->db->from("hunian");
    $this->db->where("TO_BASE64(id_hunian) = '$token'");
    // Ekseskusi Query
    $query = $this->db->get()->result();
    // Jika id_hunian ditemukan
    if(count($query) == 1)
    {
        // Hapus data mahasiswa
        $this->db->where("TO_BASE64(id_hunian) = '$token'");
        $this->db->delete("hunian");
        // kirim nilai hasil 1
        $hasil = 1;
    }
    // Jika id_hunian tidak ditemukan
    else
    {
        // kirim nilai 0
        $hasil = 0;
    }
    // Kirim varibel hasil ke "Controller" mahasiswa
    return $hasil;
}
}
