<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Proteksi halaman, hanya siswa yang bisa akses
        if ($this->session->userdata('level') != 'siswa') {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda tidak punya akses ke halaman ini!</div>');
            redirect('auth');
        }
        $this->load->model('M_Ujian');
        $this->load->model('M_Siswa');
    }

    /**
     * Menampilkan daftar ujian yang tersedia untuk siswa.
     */
    public function index() {
        $data['judul'] = 'Daftar Ujian Online';
        // Ambil data ujian yang aktif (tanggal hari ini berada di antara tgl_mulai dan tgl_selesai)
        $data['ujian_tersedia'] = $this->M_Ujian->get_ujian_aktif();
        
        $this->load->view('templates/header_siswa', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_ujian_list', $data); // Buat view ini
        $this->load->view('templates/footer_siswa');
    }

    /**
     * Halaman untuk siswa mengerjakan soal ujian.
     * @param int $id_ujian ID dari ujian yang akan dikerjakan.
     */
    public function kerjakan($id_ujian) {
        $id_siswa = $this->session->userdata('id_user');

        // Cek apakah siswa sudah pernah mengerjakan ujian ini
        if ($this->M_Ujian->cek_sudah_mengerjakan($id_ujian, $id_siswa)) {
            $this->session->set_flashdata('message', '<div class="alert alert-warning">Anda sudah pernah mengerjakan ujian ini!</div>');
            redirect('siswa/ujian/hasil/' . $id_ujian);
        }

        $data['judul'] = 'Kerjakan Ujian';
        $data['ujian'] = $this->M_Ujian->get_ujian_by_id($id_ujian);
        $data['soal'] = $this->M_Ujian->get_soal_by_ujian_id($id_ujian);

        if (!$data['ujian'] || !$data['soal']) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Ujian tidak ditemukan atau belum ada soal.</div>');
            redirect('siswa/ujian');
        }
        
        $this->load->view('templates/header_siswa', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_ujian_kerjakan', $data); // Buat view ini
        $this->load->view('templates/footer_siswa');
    }

    /**
     * Memproses jawaban yang dikirim oleh siswa.
     */
    public function submit_jawaban() {
        $id_ujian = $this->input->post('id_ujian');
        $jawaban_siswa = $this->input->post('jawaban'); // Array jawaban dari form
        $id_siswa = $this->session->userdata('id_user');

        // Ambil kunci jawaban dari database
        $kunci_jawaban = $this->M_Ujian->get_kunci_jawaban($id_ujian);

        $jumlah_soal = count($kunci_jawaban);
        $jawaban_benar = 0;

        // Loop untuk membandingkan jawaban siswa dengan kunci jawaban
        foreach ($kunci_jawaban as $soal) {
            // Cek apakah siswa menjawab soal ini
            if (isset($jawaban_siswa[$soal['id']])) {
                if ($jawaban_siswa[$soal['id']] == $soal['jawaban_benar']) {
                    $jawaban_benar++;
                }
            }
        }

        // Hitung nilai akhir
        $nilai = ($jawaban_benar / $jumlah_soal) * 100;

        // Simpan hasil ujian ke database
        $data_hasil = [
            'ujian_id' => $id_ujian,
            'siswa_id' => $id_siswa,
            'nilai' => $nilai,
            'tgl_submit' => date('Y-m-d H:i:s')
        ];

        $this->M_Ujian->insert_hasil_ujian($data_hasil);

        $this->session->set_flashdata('message', '<div class="alert alert-success">Ujian telah selesai dikerjakan. Nilai Anda adalah ' . $nilai . '</div>');
        redirect('siswa/ujian/hasil/' . $id_ujian);
    }

    /**
     * Menampilkan hasil ujian yang telah dikerjakan.
     * @param int $id_ujian ID dari ujian.
     */
    public function hasil($id_ujian) {
        $data['judul'] = 'Hasil Ujian';
        $id_siswa = $this->session->userdata('id_user');
        
        $data['hasil'] = $this->M_Ujian->get_hasil_ujian($id_ujian, $id_siswa);

        if (!$data['hasil']) {
             $this->session->set_flashdata('message', '<div class="alert alert-danger">Hasil ujian tidak ditemukan.</div>');
            redirect('siswa/ujian');
        }

        $this->load->view('templates/header_siswa', $data);
        $this->load->view('templates/sidebar_siswa', $data);
        $this->load->view('backend/siswa/v_ujian_hasil', $data); // Buat view ini
        $this->load->view('templates/footer_siswa');
    }
}