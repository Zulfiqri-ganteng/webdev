<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

    public function index() {
        // Halaman ini hanya sebagai penanda, arahkan ke halaman login
        // Jika sudah login sebagai siswa, arahkan ke dashboard ujian siswa
        if ($this->session->userdata('level') == 'siswa') {
            redirect('siswa/ujian');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Silakan login sebagai siswa untuk mengakses halaman ujian.</div>');
            redirect('auth');
        }
    }
}