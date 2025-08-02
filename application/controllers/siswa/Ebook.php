<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ebook extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'siswa') {
            redirect('auth');
        }
        $this->load->model('M_Ebook');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['judul'] = 'E-Book Saya';
        $id_penulis = $this->session->userdata('id_user');
        $data['ebooks'] = $this->M_Ebook->get_ebook_by_penulis($id_penulis);
        
        $this->load->view('templates/header_siswa', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_ebook_list', $data);
        $this->load->view('templates/footer_siswa');
    }

    public function tambah() {
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi_cerita', 'Isi Cerita', 'required');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Tulis E-Book Baru';
            $this->load->view('templates/header_siswa', $data);
            $this->load->view('templates/sidebar_siswa', $data);
            $this->load->view('backend/siswa/v_ebook_form_tambah', $data);
            $this->load->view('templates/footer_siswa');
        } else {
            $data_ebook = [
                'judul' => $this->input->post('judul'),
                'isi_cerita' => $this->input->post('isi_cerita'),
                'penulis_id' => $this->session->userdata('id_user'),
                'level_penulis' => 'siswa'
            ];
            
            $this->M_Ebook->insert_ebook($data_ebook);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Cerita berhasil dipublikasikan!</div>');
            redirect('siswa/ebook');
        }
    }

    public function edit($id) {
        $data['judul'] = 'Edit E-Book';
        $data['ebook'] = $this->M_Ebook->get_ebook_by_id($id);
        
        // Proteksi: pastikan siswa hanya bisa edit ebook miliknya sendiri
        if ($data['ebook']['penulis_id'] != $this->session->userdata('id_user')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda tidak punya hak untuk mengedit cerita ini!</div>');
            redirect('siswa/ebook');
        }

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi_cerita', 'Isi Cerita', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_siswa', $data);
            $this->load->view('templates/sidebar_siswa', $data);
            $this->load->view('backend/siswa/v_ebook_form_edit', $data);
            $this->load->view('templates/footer_siswa');
        } else {
            $data_update = [
                'judul' => $this->input->post('judul'),
                'isi_cerita' => $this->input->post('isi_cerita')
            ];
            $this->M_Ebook->update_ebook($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Cerita berhasil diperbarui!</div>');
            redirect('siswa/ebook');
        }
    }

    public function hapus($id) {
        $ebook = $this->M_Ebook->get_ebook_by_id($id);
        // Proteksi: pastikan siswa hanya bisa hapus ebook miliknya sendiri
        if ($ebook['penulis_id'] != $this->session->userdata('id_user')) {
             $this->session->set_flashdata('message', '<div class="alert alert-danger">Anda tidak punya hak untuk menghapus cerita ini!</div>');
        } else {
            $this->M_Ebook->delete_ebook($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Cerita berhasil dihapus!</div>');
        }
        redirect('siswa/ebook');
    }
}