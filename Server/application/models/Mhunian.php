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
}
