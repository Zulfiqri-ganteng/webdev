<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // HANYA LOAD MODEL, TIDAK ADA PENGECEKAN LOGIN
        $this->load->model('M_Guru'); 
    }

    public function index() {
        $data['judul'] = 'Data Guru';
        $data['guru'] = $this->M_Guru->get_all_guru(); 
        
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_guru', $data);
        $this->load->view('templates/footer');
    }
}