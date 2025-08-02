<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Gallery');
        $this->load->library('form_validation');
        $this->load->library('upload'); // Penting untuk upload file
    }

    public function index() {
        $data['judul'] = 'Manajemen Gallery';
        $data['gallery'] = $this->M_Gallery->get_all_gallery();
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_gallery_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah() {
        $data['judul'] = 'Tambah Foto Gallery';
        $this->form_validation->set_rules('judul_foto', 'Judul Foto', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_gallery_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            // Konfigurasi untuk upload gambar
            $config['upload_path'] = './assets/images/gallery/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_size'] = '2048'; // 2MB
            $config['encrypt_name'] = TRUE; // Mengenkripsi nama file agar unik

            $this->upload->initialize($config);

            if ($this->upload->do_upload('foto')) {
                $data_gallery = [
                    'judul_foto' => $this->input->post('judul_foto', true),
                    'nama_file' => $this->upload->data('file_name'),
                ];
                $this->M_Gallery->insert_gallery($data_gallery);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Foto berhasil ditambahkan!</div>');
                redirect('admin/gallery');
            } else {
                // Jika upload gagal, tampilkan pesan error
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $this->upload->display_errors() . '</div>');
                redirect('admin/gallery/tambah');
            }
        }
    }

    public function hapus($id) {
        // Ambil nama file dari database sebelum dihapus
        $foto = $this->M_Gallery->get_gallery_by_id($id);
        if ($foto) {
            // Hapus file fisik dari folder assets
            $file_path = './assets/images/gallery/' . $foto['nama_file'];
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            
            // Hapus data dari database
            $this->M_Gallery->delete_gallery($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Foto berhasil dihapus!</div>');
        }
        redirect('admin/gallery');
    }
}