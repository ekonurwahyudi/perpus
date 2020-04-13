<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();

        //cek siapa yang login, kalo status tidak sama dengan admin_login di kembalikan ke halaman login
        if($this->session->userdata('status') !="admin_login"){
            redirect(base_url().'login?alert=belum_login');
        }
    }

    function index(){
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_index');
        $this->load->view('admin/v_footer');
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url().'login/?alert=logout');
    }

    function ganti_password(){
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_ganti_password');
        $this->load->view('admin/v_footer');
    }

    function ganti_password_aksi(){
        $baru = $this->input->post('password_baru');
        $ulang = $this->input->post('password_ulang');

        $this->form_validation->set_rules('password_baru','Password Baru','required|matches[password_ulang]');
        $this->form_validation->set_rules('password_ulang','Ulangi Password','required');

        if($this->form_validation->run() !=false){
            $id = $this->session->userdata('id');
            $where = array('id' => $id);
            $data = array('password' => md5($baru));

            $this->m_data->update_data($where,$data,'admin');
            redirect(base_url().'admin/ganti_password/?alert=sukses');
        }else{
            $this->load->view('admin/v_header');
            $this->load->view('admin/v_ganti_password');
            $this->load->view('admin/v_footer');
        }
    }

    //CRUD Petugas
    function petugas(){
        $data['petugas'] = $this->m_data->get_data('petugas')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_petugas',$data);
        $this->load->view('admin/v_footer');
    }

    function petugas_tambah(){
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_petugas_tambah');
        $this->load->view('admin/v_footer');
    }

    function petugas_tambah_aksi(){
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => md5($password)
        );

        //insert data ke database
        $this->m_data->insert_data($data,'petugas');

        //mengalihkan halaman ke halaaman data petugas
        redirect(base_url().'admin/petugas');
    
    }

    function petugas_edit($id){
        $where = array('id' => $id);

        $data['petugas'] = $this->m_data->edit_data($where,'petugas')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_petugas_edit',$data);
        $this->load->view('admin/v_footer');
    }
    
    function petugas_update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'id' => $id
        );

        // cek apakah form password di isi atau tidak
        if($password==""){
            $data = array(
                'nama' => $nama,
                'username' => $username
            );

            //update data ke database
            $this->m_data->update_data($where,$data,'petugas');
        }else{
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => md5($password)
            );

            //update data ke database
            $this->m_data->update_data($where,$data,'petugas');
        }

        //mengalihkan halaman ke halaman data petugas
        redirect(base_url().'admin/petugas');

    }

    function petugas_hapus($id){
        $where = array(
            'id' => $id
        );

        //menghapus data petugas dari database sesuai id
        $this->m_data->delete_data($where,'petugas');

        //mengalihkan halaman ke halaman data petugas
        redirect (base_url().'admin/petugas');
    }

    //CRUD Anggota
    function anggota(){
        //mengambil data dari database
        $data['anggota'] = $this->m_data->get_data('anggota')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_anggota',$data);
        $this->load->view('admin/v_footer');
    }

    function anggota_kartu($id){
        $where = array(
            'id' => $id
        );

        $data['anggota'] = $this->m_data->edit_data($where,'anggota')->result();
        $this->load->view('admin/v_anggota_kartu',$data);
    }

    //Menampilkan Data Buku
    function buku(){
        $data['buku'] = $this->m_data->get_data('buku')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_buku',$data);
        $this->load->view('admin/v_footer');
    }

    //Laporan peminjaman
    function laporan(){
        if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])){
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            //mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal selesai
            $data['peminjaman'] = $this->db->query("SELECT * from peminjaman,buku,anggota where peminjaman.peminjaman_buku=buku.id and peminjaman.peminjaman_anggota=anggota.id and date(peminjaman_tanggal_mulai) >= '$mulai' and date (peminjaman_tanggal_mulai) <= '$sampai' order by peminjaman_id desc")->result();
        }else{
            //mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
            $data['peminjaman'] = $this->db->query("SELECT * from peminjaman,buku,anggota where peminjaman.peminjaman_buku=buku.id and peminjaman.peminjaman_anggota=anggota.id order by peminjaman_id desc")->result();
        }
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_peminjaman_laporan',$data);
        $this->load->view('admin/v_footer');
    }

    function peminjaman_cetak(){
        if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])){
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            //menggambil data peminjaman berdasarkan tanggal mulai sampai tanggal selesai

            $data['peminjaman'] = $this->db->query("SELECT * from peminjaman,buku,anggota where peminjaman.peminjaman_buku=buku.id and peminjaman.peminjaman_anggota=anggota.id and date(peminjaman_tanggal_mulai) >='$mulai' and date(peminjaman_tanggal_mulai) <='$sampai' order by peminjaman_id desc")->result();
            $this->load->view('petugas/v_peminjaman_cetak',$data);
        }else{
            redirect(base_url().'petugas/peminjaman');
        }
    }

}
?>