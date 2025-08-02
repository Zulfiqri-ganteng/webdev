<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('level') != 'admin') {
            redirect('auth');
        }
        $this->load->model('M_Pengumuman');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['judul'] = 'Manajemen Pengumuman';
        $data['pengumuman'] = $this->M_Pengumuman->get_all_pengumuman();
        
        $this->load->view('templates/header_admin', $data);
        $this->load->view('templates/sidebar_admin', $data);
        $this->load->view('backend/admin/v_pengumuman_list', $data);
        $this->load->view('templates/footer_admin');
    }

    public function tambah() {
        $data['judul'] = 'Tambah Pengumuman';
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi Pengumuman', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_pengumuman_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_pengumuman = [
                'judul' => $this->input->post('judul', true),
                'isi' => $this->input->post('isi', true),
                'penulis_id' => $this->session->userdata('id_user')
            ];
            $this->M_Pengumuman->insert_pengumuman($data_pengumuman);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman berhasil dipublikasikan!</div>');
            redirect('admin/pengumuman');
        }
    }

    public function edit($id) {
        $data['judul'] = 'Edit Pengumuman';
        $data['pengumuman'] = $this->M_Pengumuman->get_pengumuman_by_id($id);
        
        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('isi', 'Isi Pengumuman', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header_admin', $data);
            $this->load->view('templates/sidebar_admin', $data);
            $this->load->view('backend/admin/v_pengumuman_form', $data);
            $this->load->view('templates/footer_admin');
        } else {
            $data_update = [
                'judul' => $this->input->post('judul', true),
                'isi' => $this->input->post('isi', true),
            ];
            $this->M_Pengumuman->update_pengumuman($id, $data_update);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman berhasil diperbarui!</div>');
            redirect('admin/pengumuman');
        }
    }

    public function hapus($id) {
        $this->M_Pengumuman->delete_pengumuman($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman berhasil dihapus!</div>');
        redirect('admin/pengumuman');
    }
}