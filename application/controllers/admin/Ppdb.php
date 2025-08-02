<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Ppdb');
        $this->load->library('form_validation');
    }

    // ========== MANAJEMEN TAHUN AJARAN ==========
    public function index() {
        $data['judul'] = 'Manajemen Tahun Ajaran PPDB';
        $data['tahun_ajaran'] = $this->M_Ppdb->get_all_tahun_ajaran();
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_ppdb_tahun_list', $data);
        $this->load->view('templates/footer_admin');
    }
    
    public function tambah_tahun() {
        $data['judul'] = 'Tambah Tahun Ajaran';
        $this->form_validation->set_rules('tahun_ajaran', 'Tahun Ajaran', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_ppdb_tahun_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_insert = [
                'tahun_ajaran' => $this->input->post('tahun_ajaran'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_selesai' => $this->input->post('tanggal_selesai'),
            ];
            $this->M_Ppdb->insert_tahun_ajaran($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Tahun ajaran berhasil ditambahkan!</div>');
            redirect('admin/ppdb');
        }
    }

    public function edit_tahun($id) {
        $data['judul'] = 'Edit Tahun Ajaran';
        $data['tahun'] = $this->M_Ppdb->get_tahun_ajaran_by_id($id);
        // Lanjutan logika edit...
        // Mirip dengan tambah_tahun, tapi dengan data_update dan model update
        // (Form validation dan view loading sama)
    }

    public function hapus_tahun($id) {
        $this->M_Ppdb->delete_tahun_ajaran($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Tahun ajaran berhasil dihapus!</div>');
        redirect('admin/ppdb');
    }

    public function set_status_tahun($id, $status) {
        if ($status == 'aktif') {
            // Nonaktifkan dulu semua tahun ajaran lain
            $this->M_Ppdb->set_semua_tahun_tidak_aktif();
        }
        $this->M_Ppdb->update_tahun_ajaran($id, ['status' => $status]);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Status tahun ajaran berhasil diubah!</div>');
        redirect('admin/ppdb');
    }

    // ========== MANAJEMEN PENDAFTAR ==========
    public function pendaftar() {
    $data['judul'] = 'Data Pendaftar PPDB';
    $data['tahun_ajaran_list'] = $this->M_Ppdb->get_all_tahun_ajaran();
    
    $filter_tahun = $this->input->get('tahun_id');
    if ($filter_tahun) {
        // Jika ada filter, ambil data sesuai filter
        $data['pendaftar'] = $this->M_Ppdb->get_pendaftar_by_tahun($filter_tahun);
    } else {
        // Jika tidak ada filter, ambil semua data pendaftar
        $data['pendaftar'] = $this->M_Ppdb->get_all_pendaftar(); // Kita perlu buat fungsi ini
    }
    
    $this->load->view('templates/header_admin', $data);
    $this->load->view('templates/sidebar_admin', $data);
    $this->load->view('backend/admin/v_ppdb_pendaftar_list', $data);
    $this->load->view('templates/footer_admin');
}
    
    public function detail_pendaftar($id) {
        $data['judul'] = 'Detail Pendaftar';
        $data['pendaftar'] = $this->M_Ppdb->get_pendaftar_by_id($id);
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_ppdb_detail_pendaftar', $data);
        $this->load->view('templates/footer_admin');
    }

    public function edit_pendaftar($id) {
        $data['judul'] = 'Edit Data Pendaftar';
        $data['pendaftar'] = $this->M_Ppdb->get_pendaftar_by_id($id);

        // Aturan validasi
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        // ... (aturan validasi lainnya)

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_ppdb_pendaftar_form', $data); // Buat view ini
            $this->load->view('templates/footer_admin');
        } else {
            // Kumpulkan data dari form untuk diupdate
            $data_update = [
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                // ... (kumpulkan semua field lain dari form)
            ];
            $this->M_Ppdb->update_pendaftar($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data pendaftar berhasil diperbarui!</div>');
            redirect('admin/ppdb/pendaftar');
        }
    }
    
    public function ubah_status_pendaftar($id) {
        $status = $this->input->post('status_pendaftaran');
        $this->M_Ppdb->update_pendaftar($id, ['status_pendaftaran' => $status]);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Status pendaftar berhasil diubah!</div>');
        redirect($_SERVER['HTTP_REFERER']); // Kembali ke halaman sebelumnya
    }

    public function hapus_pendaftar($id) {
        $this->M_Ppdb->delete_pendaftar($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data pendaftar berhasil dihapus!</div>');
        redirect('admin/ppdb/pendaftar');
    }

    public function export_pendaftar($tahun_id = NULL) {
        // Nama file
        $filename = 'data_pendaftar_' . date('Ymd') . '.csv';
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        // Ambil data
        if ($tahun_id) {
            $pendaftar = $this->M_Ppdb->get_pendaftar_by_tahun($tahun_id);
        } else {
            $pendaftar = $this->db->get('ppdb_pendaftar')->result_array(); // Ambil semua jika tidak difilter
        }

        // Tulis header
        $header = array_keys($pendaftar[0]);
        $file = fopen('php://output', 'w');
        fputcsv($file, $header);

        // Tulis data
        foreach ($pendaftar as $row) {
            fputcsv($file, $row);
        }
        fclose($file);
    }
}