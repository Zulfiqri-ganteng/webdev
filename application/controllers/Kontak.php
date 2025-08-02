<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak extends CI_Controller {

    public function index() {
        $data['judul'] = 'Kontak Kami';
        
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_kontak'); // Menampilkan view statis kontak
        $this->load->view('templates/footer');
    }
}