<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Proteksi halaman
        if ($this->session->userdata('level') != 'siswa') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak punya akses ke halaman ini!</div>');
            redirect('auth');
        }
    }

    public function index() {
        $data['judul'] = 'Dashboard Siswa';
        // Ambil data user dari session
        $data['user'] = $this->db->get_where('users', ['id' => $this->session->userdata('id_user')])->row_array();
        
        $this->load->view('templates/header_siswa', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_dashboard', $data); // Buat view ini
        $this->load->view('templates/footer_siswa');
    }
}