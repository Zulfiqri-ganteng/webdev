<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Tugas extends CI_Model {

    public function get_tugas_by_kelas($kelas) {
        $this->db->where('kelas_tujuan', $kelas);
        $this->db->order_by('deadline', 'DESC');
        return $this->db->get('tugas_harian')->result_array();
    }

    public function get_tugas_by_id($id) {
        return $this->db->get_where('tugas_harian', ['id' => $id])->row_array();
    }
}