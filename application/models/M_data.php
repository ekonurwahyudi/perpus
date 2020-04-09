<?php
//Model terstruktur, agar bisa digunakan bekali" untuk membuat operasi CRUD.

class M_data extends CI_Model{
    //Memngambil data dari database
    function get_data($table){
        return $this->db->get($table);
    }

    //Untuk menginput data ke database
    function insert_data($data,$table){
        $this->db->insert($table,$data);
    }

    //Untuk mengedit data
    function edit_data($where,$table){
        return $this->db->get_where($table,$where);
    }

    //untuk mengupdate atau mengubah data di database
    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    //untuk menghapus data dari database
    function delete_data($where,$table){
        $this->db->delete($table,$where);
    }

    function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }
}
?>