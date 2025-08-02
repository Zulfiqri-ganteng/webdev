<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tugas extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Proteksi halaman, hanya siswa yang bisa akses
        if ($this->session->userdata('level') != 'siswa') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak punya akses ke halaman ini!</div>');
            redirect('auth');
        }
        $this->load->model('M_Tugas');
        $this->load->model('M_Siswa');
    }

    /**
     * Menampilkan daftar tugas untuk kelas siswa yang sedang login.
     */
    public function index() {
        $data['judul'] = 'Tugas Harian';

        // Ambil data kelas siswa yang sedang login
        $user_login = $this->db->get_where('users', ['id' => $this->session->userdata('id_user')])->row_array();
        $profil_siswa = $this->db->get_where('siswa', ['nis' => $user_login['username']])->row_array();
        $kelas_siswa = $profil_siswa['kelas'];

        // Ambil daftar tugas berdasarkan kelas siswa
        $data['tugas'] = $this->M_Tugas->get_tugas_by_kelas($kelas_siswa);
        
        $this->load->view('templates/header_siswa', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_tugas_list', $data); // Buat view ini
        $this->load->view('templates/footer_siswa');
    }

    /**
     * Menampilkan detail dari sebuah tugas.
     * @param int $id_tugas ID dari tugas.
     */
    public function detail($id_tugas) {
        $data['judul'] = 'Detail Tugas';
        $data['tugas'] = $this->M_Tugas->get_tugas_by_id($id_tugas);

        if (!$data['tugas']) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Tugas tidak ditemukan.</div>');
            redirect('siswa/tugas');
        }
        
        $this->load->view('templates/header_siswa', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_tugas_detail', $data); // Buat view ini
        $this->load->view('templates/footer_siswa');
    }
}