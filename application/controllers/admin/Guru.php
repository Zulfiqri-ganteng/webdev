<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Proteksi halaman, pastikan hanya admin yang bisa akses
        if ($this->session->userdata('level') != 'admin') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak punya akses ke halaman ini!</div>');
            redirect('auth');
        }
        $this->load->model('M_Guru');
        $this->load->library('form_validation');
        $this->load->library('upload'); // Muat library upload
    }

    public function index() {
        $data['judul'] = 'Manajemen Data Guru';
        $data['guru'] = $this->M_Guru->get_all_guru();
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_guru_list', $data);
        $this->load->view('templates/footer_admin');
    }

    // ====================================================================
    // NOTE: Logika yang Anda minta dimulai dari sini
    // ====================================================================

    /**
     * Menampilkan form tambah dan memproses data yang dikirim.
     */
    public function tambah() {
        $data['judul'] = 'Tambah Data Guru';

        // Aturan Validasi Form
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required|trim');
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[guru.nip]');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan kembali form
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_guru_form', $data); // Buat view ini
            $this->load->view('templates/footer_admin');
        } else {
            // Jika validasi berhasil, proses data
            $config['upload_path'] = './assets/images/guru/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048'; // 2MB
            $config['file_name'] = 'guru-' . time();

            $this->upload->initialize($config);

            $foto_guru = 'default.jpg'; // Foto default jika tidak ada yang diupload
            if ($this->upload->do_upload('foto')) {
                $foto_guru = $this->upload->data('file_name');
            } else {
                // Jika upload gagal, bisa ditambahkan error handling di sini
                // Untuk saat ini, kita biarkan menggunakan foto default
                $this->session->set_flashdata('upload_error', $this->upload->display_errors());
            }

            $data_guru = [
                'nama_guru' => $this->input->post('nama_guru', true),
                'nip' => $this->input->post('nip', true),
                'mapel' => $this->input->post('mapel', true),
                'foto' => $foto_guru,
            ];

            $this->M_Guru->insert_guru($data_guru);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data guru berhasil ditambahkan!</div>');
            redirect('admin/guru');
        }
    }

    /**
     * Menampilkan form edit dan memproses perubahan data.
     */
    public function edit($id) {
        $data['judul'] = 'Edit Data Guru';
        $data['guru'] = $this->M_Guru->get_guru_by_id($id);

        // Aturan validasi (NIP bisa sama jika tidak diubah)
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required|trim');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required|trim');
        
        // Aturan NIP: harus unik kecuali untuk NIP guru itu sendiri
        $original_nip = $data['guru']['nip'];
        if ($this->input->post('nip') != $original_nip) {
           $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[guru.nip]');
        } else {
           $this->form_validation->set_rules('nip', 'NIP', 'required|trim');
        }

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_guru_form', $data); // Buat view ini
            $this->load->view('templates/footer_admin');
        } else {
            $foto_guru = $this->input->post('old_image'); // Ambil nama foto lama

            // Cek apakah ada file foto baru yang diupload
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './assets/images/guru/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['file_name'] = 'guru-' . time();
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    // Hapus foto lama jika bukan 'default.jpg'
                    if ($foto_guru != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/guru/' . $foto_guru);
                    }
                    $foto_guru = $this->upload->data('file_name');
                } else {
                    $this->session->set_flashdata('upload_error', $this->upload->display_errors());
                }
            }

            $data_update = [
                'nama_guru' => $this->input->post('nama_guru', true),
                'nip' => $this->input->post('nip', true),
                'mapel' => $this->input->post('mapel', true),
                'foto' => $foto_guru,
            ];
            
            $this->M_Guru->update_guru($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data guru berhasil diperbarui!</div>');
            redirect('admin/guru');
        }
    }
    
    /**
     * Menghapus data guru dari database.
     */
    public function hapus($id) {
        // Ambil data guru untuk mendapatkan nama file foto
        $guru = $this->M_Guru->get_guru_by_id($id);

        if ($guru) {
            // Hapus foto dari server, kecuali jika fotonya adalah default
            if ($guru['foto'] != 'default.jpg') {
                $file_path = './assets/images/guru/' . $guru['foto'];
                if (file_exists($file_path)) {
                    unlink($file_path);
                }
            }
            
            // Hapus data dari database
            $this->M_Guru->delete_guru($id);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data guru berhasil dihapus!</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data guru tidak ditemukan!</div>');
        }
        
        redirect('admin/guru');
    }
}