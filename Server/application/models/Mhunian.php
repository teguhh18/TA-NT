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
}
