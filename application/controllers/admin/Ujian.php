<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH . 'vendor/autoload.php';

class Ujian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Ujian');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['judul'] = 'Manajemen Ujian Online';
        $data['ujian'] = $this->M_Ujian->get_all_ujian_admin();
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_ujian_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah() {
        $data['judul'] = 'Tambah Ujian Baru';
        $this->form_validation->set_rules('judul_ujian', 'Judul Ujian', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_ujian_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_insert = [
                'judul_ujian' => $this->input->post('judul_ujian'),
                'mapel' => $this->input->post('mapel'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                'waktu_menit' => $this->input->post('waktu_menit'),
                'guru_id' => 1 // Asumsi guru_id = 1 (admin)
            ];
            $this->M_Ujian->insert_ujian($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Ujian baru berhasil ditambahkan!</div>');
            redirect('admin/ujian');
        }
    }

    public function edit($id) {
        $data['judul'] = 'Edit Ujian';
        $data['ujian'] = $this->M_Ujian->get_ujian_by_id($id);
        
        $this->form_validation->set_rules('judul_ujian', 'Judul Ujian', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_ujian_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_update = [
                'judul_ujian' => $this->input->post('judul_ujian'),
                'mapel' => $this->input->post('mapel'),
                'tanggal_mulai' => $this->input->post('tanggal_mulai'),
                'tanggal_selesai' => $this->input->post('tanggal_selesai'),
                'waktu_menit' => $this->input->post('waktu_menit'),
            ];
            $this->M_Ujian->update_ujian($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data ujian berhasil diperbarui!</div>');
            redirect('admin/ujian');
        }
    }

    public function hapus($id) {
        $this->M_Ujian->delete_ujian($id);
        $this->M_Ujian->delete_soal_by_ujian_id($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data ujian dan semua soalnya berhasil dihapus!</div>');
        redirect('admin/ujian');
    }

    public function kelola_soal($id_ujian) {
        $data['judul'] = 'Kelola Soal Ujian';
        $data['ujian'] = $this->M_Ujian->get_ujian_by_id($id_ujian);
        $data['soal'] = $this->M_Ujian->get_soal_by_ujian_id($id_ujian, false);
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_soal_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah_soal($id_ujian) {
        $data['judul'] = 'Tambah Soal Baru';
        $data['id_ujian'] = $id_ujian;
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_soal_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_insert = [
                'ujian_id' => $id_ujian,
                'pertanyaan' => $this->input->post('pertanyaan'),
                'opsi_a' => $this->input->post('opsi_a'),
                'opsi_b' => $this->input->post('opsi_b'),
                'opsi_c' => $this->input->post('opsi_c'),
                'opsi_d' => $this->input->post('opsi_d'),
                'opsi_e' => $this->input->post('opsi_e'),
                'jawaban_benar' => $this->input->post('jawaban_benar'),
            ];
            $this->M_Ujian->insert_soal($data_insert);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Soal baru berhasil ditambahkan!</div>');
            redirect('admin/ujian/kelola_soal/' . $id_ujian);
        }
    }

    public function edit_soal($id_soal) {
        $data['judul'] = 'Edit Soal';
        $data['soal'] = $this->M_Ujian->get_soal_by_id($id_soal);
        
        $this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_soal_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_update = [
                'pertanyaan' => $this->input->post('pertanyaan'),
                'opsi_a' => $this->input->post('opsi_a'),
                'opsi_b' => $this->input->post('opsi_b'),
                'opsi_c' => $this->input->post('opsi_c'),
                'opsi_d' => $this->input->post('opsi_d'),
                'opsi_e' => $this->input->post('opsi_e'),
                'jawaban_benar' => $this->input->post('jawaban_benar'),
            ];
            $this->M_Ujian->update_soal($id_soal, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Soal berhasil diperbarui!</div>');
            redirect('admin/ujian/kelola_soal/' . $data['soal']['ujian_id']);
        }
    }

    public function hapus_soal($id_soal, $id_ujian) {
        $this->M_Ujian->delete_soal($id_soal);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Soal berhasil dihapus!</div>');
        redirect('admin/ujian/kelola_soal/' . $id_ujian);
    }
    
    public function hasil_ujian($id_ujian) {
        $data['judul'] = 'Laporan Hasil Ujian';
        $data['ujian'] = $this->M_Ujian->get_ujian_by_id($id_ujian);
        $data['hasil'] = $this->M_Ujian->get_hasil_ujian_lengkap($id_ujian);
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_ujian_hasil_list', $data);
        $this->load->view('templates/footer_admin');
    }
    public function import_soal($id_ujian) {
    // Buat folder 'uploads/csv/' di root folder proyek Anda
    $config['upload_path'] = './uploads/csv/';
    $config['allowed_types'] = 'csv';
    $config['file_name'] = 'soal_' . time();

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file_csv')) {
        $file_data = $this->upload->data();
        $file_path = './uploads/csv/' . $file_data['file_name'];
        
        // Baca file CSV
        $csv_file = fopen($file_path, 'r');
        
        // Lewati baris header
        fgetcsv($csv_file);

        // Loop untuk membaca setiap baris data
        while (($row = fgetcsv($csv_file)) !== FALSE) {
            $data_insert = [
                'ujian_id' => $id_ujian,
                'pertanyaan' => $row[0],
                'opsi_a' => $row[1],
                'opsi_b' => $row[2],
                'opsi_c' => $row[3],
                'opsi_d' => $row[4],
                'opsi_e' => $row[5],
                'jawaban_benar' => $row[6],
            ];
            $this->M_Ujian->insert_soal($data_insert);
        }
        
        fclose($csv_file);
        unlink($file_path); // Hapus file setelah diproses
        
        $this->session->set_flashdata('message', '<div class="alert alert-success">Soal berhasil diimpor!</div>');
    } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>');
    }

    redirect('admin/ujian/kelola_soal/' . $id_ujian);
}

}