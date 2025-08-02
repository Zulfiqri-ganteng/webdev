<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Ebook');
    }

    public function index() {
        $data['judul'] = 'Manajemen E-Book';
        // Mengambil semua ebook tanpa pagination untuk admin
        $data['ebooks'] = $this->M_Ebook->get_all_ebooks(null, 0); 
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_ebook_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function hapus($id) {
        $this->M_Ebook->delete_ebook($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">E-Book berhasil dihapus!</div>');
        redirect('admin/ebook');
    }
}