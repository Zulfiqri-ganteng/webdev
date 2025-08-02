<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Gallery'); // Pastikan model M_Gallery sudah dibuat
    }

    public function index() {
        $data['judul'] = 'Galeri Kegiatan';
        $data['gallery'] = $this->M_Gallery->get_all_gallery();
        
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_gallery', $data);
        $this->load->view('templates/footer');
    }
}