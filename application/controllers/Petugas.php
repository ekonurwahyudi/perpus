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

    function anggota_edit($id){
        $where = array(
            'id' => $id
        );

        //mengambil data dari database sesuai id
        $data['anggota'] = $this->m_data->edit_data($where,'anggota')->result();
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_anggota_edit',$data);
        $this->load->view('petugas/v_footer');
    }

    function anggota_update(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $alamat = $this->input->post('alamat');

        $where = array(
            'id' => $id
        );

        $data = array(
            'nama' => $nama,
            'nik' => $nik,
            'alamat' => $alamat
        );

        //update data ke database
        $this->m_data->update_data($where,$data,'anggota');

        //mengalihkan halaman ke data anggota
        redirect(base_url().'petugas/anggota');
    }

    function anggota_hapus($id){
        $where = array(
            'id' => $id
        );

        //menghapus data anggota dari database sesuai id
        $this->m_data->delete_data($where,'anggota');

        //mengalihkan halaman ke halaman data anggota
        redirect(base_url().'petugas/anggota');
    }

    function anggota_kartu($id){
        $where = array(
            'id' => $id
        );

        //Mengambil data dari database sesuai id
        $data['anggota'] = $this->m_data->edit_data($where,'anggota')->result();
        $this->load->view('petugas/v_anggota_kartu',$data);

    }

    //CRUD BUKU
    function buku(){
        //mengambil data dari database
        $data['buku'] = $this->m_data->get_data('buku')->result();
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_buku',$data);
        $this->load->view('petugas/v_footer');
    }

    function buku_tambah(){
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_buku_tambah');
        $this->load->view('petugas/v_footer');
    } 

    function buku_tambah_aksi(){
        $judul = $this->input->post('judul');
        $tahun = $this->input->post('tahun');
        $penulis = $this->input->post('penulis');

        $data = array(
            'judul' => $judul,
            'tahun' => $tahun,
            'penulis' => $penulis,
            'status' => 1
        );

        //insert data ke database
        $this->m_data->insert_data($data,'buku');
        redirect(base_url().'petugas/buku');
    }

    function buku_edit($id){
        $where = array(
            'id' => $id
        );

        $data['buku'] = $this->m_data->edit_data($where,'buku')->result();
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_buku_edit',$data);
        $this->load->view('petugas/v_footer');
    }

    function buku_update(){
        $id = $this->input->post('id');
        $judul = $this->input->post('judul');
        $tahun = $this->input->post('tahun');
        $penulis = $this->input->post('penulis');
        $status = $this->input->post('status');

        $where = array(
            'id' => $id
        );

        $data = array(
            'judul' => $judul,
            'tahun' => $tahun,
            'penulis' => $penulis,
            'status' => $status
        );

        //update data ke database
        $this->m_data->update_data($where,$data,'buku');
        redirect(base_url().'petugas/buku');
    }

    function buku_hapus($id){
        $where = array(
            'id' => $id
        );

        //menghapus buku dari database sesuai id
        $this->m_data->delete_data($where,'buku');
        redirect(base_url().'petugas/buku');
    }

    //proses traksasi peminjaman
    function peminjaman(){
        //mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
        $data['peminjaman'] = $this->db->query("select * from peminjaman,buku,anggota where peminjaman.peminjaman_buku=buku.id and peminjaman.peminjaman_anggota=anggota.id order by peminjaman_id desc")->result();
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_peminjaman',$data);
        $this->load->view('petugas/v_footer');
    }

    function peminjaman_tambah(){
        //mengambil data buku yang berstatus 1 dari database
        $where = array(
            'status' => 1
        );
        $data['buku'] = $this->m_data->edit_data($where,'buku')->result();
        
        //mengambil data anggota dari database
        $data['anggota'] = $this->m_data->get_data('anggota')->result();
        $this->load->view('petugas/v_header');
        $this->load->view('petugas/v_peminjaman_tambah',$data);
        $this->load->view('petugas/v_footer');
    }

    function peminjaman_aksi(){
        $buku = $this->input->post('buku');
        $anggota = $this->input->post('anggota');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_sampai = $this->input->post('tanggal_sampai');

        $data = array(
            'peminjaman_buku' => $buku,
            'peminjaman_anggota' => $anggota,
            'peminjaman_tanggal_mulai' => $tanggal_mulai,
            'peminjaman_tanggal_sampai' => $tanggal_sampai,
            'peminjaman_status' => 2 
        );
        
        //insert data ke database
        $this->m_data->insert_data($data,'peminjaman');

        //mengubah status buku menjadi di pinjam
        $w = array(
            'id' => $buku
        );
        $d = array(
            'status' => 2
        );

        $this->m_data->update_data($w,$d,'buku');
        redirect(base_url().'petugas/peminjaman');
    }

    function peminjaman_batalkan($id){
        $where = array (
            'peminjaman_id' => $id
        );

        //mengambil data buku pada peminjaman ber id tersebut
        $data = $this->m_data->edit_data($where,'peminjaman')->row();
        $buku = $data->peminjaman_buku;

        //mengambilkan status buku kembali ke tersedia (1)
        $w = array(
            'id' => $buku
        );
        $d = array(
            'status' => 1
        );

        $this->m_data->update_data($w,$d,'buku');

        //menghapus data peminjaman dari database sesuai id
        $this->m_data->delete_data($where,'peminjaman');
        redirect(base_url().'petugas/peminjaman');
    }

    function peminjaman_selesai($id){
        $where = array (
            'peminjaman_id' => $id
        );

        //mengambil data buku pada peminjaman ber id tersebut
        $data = $this->m_data->edit_data($where,'peminjaman')->row();
        $buku = $data->peminjaman_buku;

        //mengambilkan status buku kembali ke tersedia (1)
        $w = array(
            'id' => $buku
        );
        $d = array(
            'status' => 1
        );

        $this->m_data->update_data($w,$d,'buku');

        //menghapus data peminjaman dari database sesuai id
        $this->m_data->update_data($where,array('peminjaman_status'=> 1),'peminjaman');
        redirect(base_url().'petugas/peminjaman');
    }

    function peminjaman_laporan(){
        if(isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])){
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');

            //mengambil data peminjaman berdasarkan tanggal mulai sampai tanggal selesai
            $data['peminjaman'] = $this->db->query("SELECT * from peminjaman,buku,anggota where peminjaman.peminjaman_buku=buku.id and peminjaman.peminjaman_anggota=anggota.id and date(peminjaman_tanggal_mulai) >= '$mulai' and date(peminjaman_tanggal_mulai) <= '$sampai' order by peminjaman_id desc")->result();
        }else{
            // mengambil data peminjaman buku dari database | dan mengurutkan data
           
            $data['peminjaman'] = $this->db->query("SELECT * from peminjaman,buku,anggota where peminjaman.peminjaman_buku=buku.id and peminjaman.peminjaman_anggota=anggota.id order by peminjaman_id desc")->result();
            }

            $this->load->view('petugas/v_header');
            $this->load->view('petugas/v_peminjaman_laporan',$data);
            $this->load->view('petugas/v_footer');
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