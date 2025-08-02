<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Siswa');
        $this->load->library('form_validation');
        $this->load->library('upload'); // Muat library upload di sini
    }

    public function index() {
        $data['judul'] = 'Manajemen Data Siswa';
        $data['siswa'] = $this->M_Siswa->get_all_siswa();
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_siswa_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah() {
        $data['judul'] = 'Tambah Data Siswa';
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim');
        $this->form_validation->set_rules('nis', 'NIS', 'required|trim|is_unique[siswa.nis]');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_siswa_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $config['upload_path'] = './assets/images/siswa/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size'] = '2048';
            $config['encrypt_name'] = TRUE;
            $this->upload->initialize($config);

            $foto_siswa = 'default.jpg';
            if ($this->upload->do_upload('foto')) {
                $foto_siswa = $this->upload->data('file_name');
            }

            $data_siswa = [
                'nama_siswa' => $this->input->post('nama_siswa', true),
                'nis' => $this->input->post('nis', true),
                'kelas' => $this->input->post('kelas', true),
                'is_terbaik' => $this->input->post('is_terbaik') ? 1 : 0,
                'foto' => $foto_siswa
            ];
            $this->M_Siswa->insert_siswa($data_siswa);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data siswa berhasil ditambahkan!</div>');
            redirect('admin/siswa');
        }
    }

    public function edit($id) {
        $data['judul'] = 'Edit Data Siswa';
        $data['siswa'] = $this->M_Siswa->get_siswa_by_id($id);
        
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_siswa_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $foto_siswa = $this->input->post('foto_lama');

            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path'] = './assets/images/siswa/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size'] = '2048';
                $config['encrypt_name'] = TRUE;
                $this->upload->initialize($config);

                if ($this->upload->do_upload('foto')) {
                    if ($foto_siswa != 'default.jpg') {
                        unlink(FCPATH . 'assets/images/siswa/' . $foto_siswa);
                    }
                    $foto_siswa = $this->upload->data('file_name');
                }
            }
            
            $data_update = [
                'nama_siswa' => $this->input->post('nama_siswa', true),
                'nis' => $this->input->post('nis', true),
                'kelas' => $this->input->post('kelas', true),
                'is_terbaik' => $this->input->post('is_terbaik') ? 1 : 0,
                'foto' => $foto_siswa
            ];
            $this->M_Siswa->update_siswa($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success">Data siswa berhasil diperbarui!</div>');
            redirect('admin/siswa');
        }
    }

    public function hapus($id) {
        $siswa = $this->M_Siswa->get_siswa_by_id($id);
        if ($siswa && $siswa['foto'] != 'default.jpg') {
            unlink(FCPATH . 'assets/images/siswa/' . $siswa['foto']);
        }
        $this->M_Siswa->delete_siswa($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success">Data siswa berhasil dihapus!</div>');
        redirect('admin/siswa');
    }
}