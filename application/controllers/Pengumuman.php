<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Pengumuman');
    }

    public function index() {
        $data['judul'] = 'Pengumuman Sekolah';
        $data['pengumuman'] = $this->M_Pengumuman->get_all_pengumuman();
        
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_pengumuman', $data);
        $this->load->view('templates/footer');
    }
}