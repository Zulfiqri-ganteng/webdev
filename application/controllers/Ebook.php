<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Ebook');
        $this->load->library('pagination');
    }

    public function index() {
        // Konfigurasi Pagination
        $config['base_url'] = base_url('ebook/index');
        $config['total_rows'] = $this->M_Ebook->count_all_ebooks();
        $config['per_page'] = 6; // Jumlah ebook per halaman

        $this->pagination->initialize($config);
        
        $data['start'] = $this->uri->segment(3);
        $data['ebooks'] = $this->M_Ebook->get_all_ebooks($config['per_page'], $data['start']);
        $data['judul'] = 'Koleksi E-Book';

        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_ebook_list', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id) {
        // Tambah jumlah tayangan setiap kali halaman diakses
        $this->M_Ebook->increment_view($id);

        $data['ebook'] = $this->M_Ebook->get_ebook_by_id($id);
        $data['judul'] = $data['ebook']['judul'];

        if (!$data['ebook']) {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_detail_ebook', $data);
        $this->load->view('templates/footer');
    }

    public function like($id) {
        $this->M_Ebook->increment_like($id);
        // Redirect kembali ke halaman detail setelah like
        redirect('ebook/detail/' . $id);
    }
}