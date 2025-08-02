<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ppdb extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('M_Ppdb');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['tahun_ajaran_aktif'] = $this->M_Ppdb->get_tahun_ajaran_aktif();

        if ($data['tahun_ajaran_aktif']) {
            $data['judul'] = 'Formulir Pendaftaran Siswa Baru';
            $this->load->view('templates/header', $data);
            $this->load->view('frontend/v_ppdb_form', $data);
            $this->load->view('templates/footer');
        } else {
            $data['judul'] = 'Pendaftaran Siswa Baru';
            $this->load->view('templates/header', $data);
            $this->load->view('frontend/v_ppdb_closed', $data);
            $this->load->view('templates/footer');
        }
    }
    
    public function register_action() {
        // Aturan validasi
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|numeric');
        // ... (tambahkan aturan validasi lain sesuai kebutuhan) ...

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, kembalikan ke form
            $this->index();
        } else {
            // Jika validasi sukses, proses data
            $tahun_ajaran_id = $this->input->post('tahun_ajaran_id');
            
            // Buat nomor pendaftaran unik (Contoh: PPDB-2025-0001)
            $tahun = date('Y');
            $nomor_urut = $this->M_Ppdb->get_nomor_urut_pendaftar() + 1;
            $nomor_pendaftaran = 'PPDB-' . $tahun . '-' . str_pad($nomor_urut, 4, '0', STR_PAD_LEFT);

            $data = [
                'tahun_ajaran_id' => $tahun_ajaran_id,
                'nomor_pendaftaran' => $nomor_pendaftaran,
                'nama_lengkap' => $this->input->post('nama_lengkap'),
                'nisn' => $this->input->post('nisn'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'alamat' => $this->input->post('alamat'),
                'sekolah_asal' => $this->input->post('sekolah_asal'),
                'nama_ayah' => $this->input->post('nama_ayah'),
                'pekerjaan_ayah' => $this->input->post('pekerjaan_ayah'),
                'nama_ibu' => $this->input->post('nama_ibu'),
                'pekerjaan_ibu' => $this->input->post('pekerjaan_ibu'),
                'nomor_hp' => $this->input->post('nomor_hp'),
                'pilihan_jurusan' => $this->input->post('pilihan_jurusan')
            ];

            $this->M_Ppdb->insert_pendaftar($data);
            
            // Set session flashdata untuk halaman sukses
            $this->session->set_flashdata('success_data', [
                'nama' => $data['nama_lengkap'],
                'nomor_pendaftaran' => $data['nomor_pendaftaran']
            ]);
            
            redirect('ppdb/sukses');
        }
    }

    public function sukses() {
        $success_data = $this->session->flashdata('success_data');
        if (!$success_data) {
            redirect('ppdb');
        }
        
        $data['judul'] = 'Pendaftaran Berhasil';
        $data['success_data'] = $success_data;

        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_ppdb_success', $data); // Buat view ini
        $this->load->view('templates/footer');
    }
    public function cek_status() {
        $data['judul'] = 'Cek Status Pendaftaran';
        $data['pendaftar'] = null; // Default, pendaftar belum ditemukan

        // Cek jika ada input nomor pendaftaran
        $nomor_pendaftaran = $this->input->post('nomor_pendaftaran');
        if ($nomor_pendaftaran) {
            $pendaftar = $this->M_Ppdb->get_pendaftar_by_nomor($nomor_pendaftaran);
            if ($pendaftar) {
                $data['pendaftar'] = $pendaftar;
            } else {
                $this->session->set_flashdata('error_message', 'Nomor pendaftaran tidak ditemukan.');
            }
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('frontend/v_ppdb_cek_status', $data); // Buat view ini
        $this->load->view('templates/footer');
    }
}