<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->model('M_Pengumuman');
        $this->load->model('M_Guru');
        $this->load->model('M_Siswa');
    }

    public function index() {
        $data['judul'] = 'Selamat Datang';
        $data['pengumuman_terbaru'] = $this->M_Pengumuman->get_pengumuman_terbaru(3);
        $data['guru_beranda'] = $this->M_Guru->get_all_guru(4);
        $data['siswa_berprestasi'] = $this->M_Siswa->get_siswa_terbaik(4);

        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_home', $data);
        $this->load->view('templates/footer');
    }
}