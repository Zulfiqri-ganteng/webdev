<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'siswa') {
            redirect('auth');
        }
        $this->load->model('M_Siswa'); // Asumsi data profil ada di tabel siswa
        $this->load->library('form_validation');
    }

    public function index() {
        $data['judul'] = 'Profil Saya';
        // Ambil ID siswa dari data login di tabel 'users', lalu cari profilnya di tabel 'siswa'
        $user_login = $this->db->get_where('users', ['id' => $this->session->userdata('id_user')])->row_array();
        $data['profil'] = $this->db->get_where('siswa', ['nis' => $user_login['username']])->row_array(); // Asumsi username = NIS
        
        $this->load->view('templates/header_siswa', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_profil', $data); // Buat view ini
        $this->load->view('templates/footer_siswa');
    }

    // Fungsi untuk edit profil bisa ditambahkan di sini
    public function edit() {
        // Logika untuk menampilkan form edit dan memproses update data profil
        // Mirip dengan fungsi edit() pada admin, tetapi ID diambil dari session
    }
}