<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Mmember extends CI_Model
{

    // Buat Method untuk tampil data
    function get_data($token)
    {
        $this->db->select("id_member AS id,
        nama_member AS nama,
        email AS email,
        alamat AS alamat,
        gender AS gender,
        no_telepon AS telepon,
        no_ktp AS ktp,
        password AS pass,
        role_id as role
        ");
        $this->db->from("member");

        // Jika token() ada
        if(!empty($token))
        {
            $this->db->where("TO_BASE64(no_ktp) = '$token' OR TO_BASE64(nama_member) = '$token'");
        }

        $this->db->order_by("id_member", "ASC");

        $query = $this->db->get()->result();
        return $query;
    }

    function save_data($nama_member,$email,$alamat,$gender,$no_telepon,$no_ktp,$password,$role_id,$token)
    {
        // cek Jika apakah no_ktp sudah ada
        $this->db->select("no_ktp");
        $this->db->from("member");
        $this->db->where("TO_BASE64(no_ktp) = '$token'");
        // Ekseskusi Query
        $query = $this->db->get()->result();
        // Jika no_ktp tidak ada
        if(count($query) == 0)
        {
            // isi untuk nilai masing masing field
            $data = array(
                "nama_member" => $nama_member,
                "email" => $email,
                "alamat" => $alamat,
                "gender" => $gender,
                "no_telepon" => $no_telepon,
                "no_ktp" => $no_ktp,
                "password" => $password,
                "role_id" => $role_id,
            );
            // Simpan Data ke table Member
            $this->db->insert("member",$data);
            // beri nilai hasil=0
            $hasil = 0;
        }
        // Jika no_ktp ada
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
    // Cek apakah "no_ktp" ada atau tidak
    $this->db->select("no_ktp");
    $this->db->from("member");
    $this->db->where("TO_BASE64(no_ktp) = '$token'");
    // Ekseskusi Query
    $query = $this->db->get()->result();
    // Jika no_ktp ditemukan
    if(count($query) == 1)
    {
        // Hapus data member
        $this->db->where("TO_BASE64(no_ktp) = '$token'");
        $this->db->delete("member");
        // kirim nilai hasil 1
        $hasil = 1;
    }
    // Jika email tidak ditemukan
    else
    {
        // kirim nilai 0
        $hasil = 0;
    }
    // Kirim varibel hasil ke "Controller" Member
    return $hasil;
}
}
