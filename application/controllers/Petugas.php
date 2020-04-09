<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller{
    function __construct(){
        parent::__construct();
        
        //cek session yang login, jika session status tidak sama dengan session petugas_login, maka halaman akan di alihkan kembali ke halaman login.
        if($this->session->userdata('status') !="petugas_login"){
            redirect(base_url().'login?alert=belum_login');
        }
    }

    function index(){
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_index');
        $this->load->view('petugas/v_footer');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'login/?alert=logout');
    }

    function ganti_password(){
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_ganti_password');
        $this->load->view('petugas/v_footer');
    }

    function ganti_password_aksi(){
        $baru =$this->input->post('password_baru');
        $ulang =$this->input->post('password_ulang');

        $this->form_validation->set_rules('password_baru','Password Baru','required|matches[password_ulang]');
        $this->form_validation->set_rules('password_ulang','Ulangi Password','required');

        if($this->form_validation->run() !=false){
            $id = $this->session->userdata('id');
            $where = array(
                'id' => $id
            );
            $data = array(
                'password' => md5($baru)
            );
            $this->m_data->update_data($where,$data,'petugas');
            redirect(base_url().'petugas/ganti_password/?alert=sukses');
        }else{
            $this->load->view('petugas/v_header');
            $this->load->view('petugas/v_ganti_password');
            $this->laod->view('petugas/v_footer');
        }
    }

    //Crud Anggota
    function anggota(){
        //Mengambil data dari anggota
        $data['anggota'] = $this->m_data->get_data('anggota')->result();
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_anggota',$data);
        $this->load->view('petugas/v_footer');
    }

    function anggota_tambah(){
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_anggota_tambah');
        $this->load->view('petugas/v_footer');
    }

    function anggota_tambah_aksi(){
        $nama = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $alamat = $this->input->post('alamat');

        $data = array(
            'nama' => $nama,
            'nik' => $nik,
            'alamat' => $alamat
        );

        //insert data ke database
        $this->m_data->insert_data($data,'anggota');

        //mengalihkan halaman ke halaman data anggota
        redirect(base_url().'petugas/anggota');
    }
}
?>