<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ppdb extends CI_Model {
    
    // ======== FUNGSI UNTUK TAHUN AJARAN ========
    public function get_all_tahun_ajaran() {
        return $this->db->order_by('id', 'DESC')->get('ppdb_tahun_ajaran')->result_array();
    }
    
    public function get_tahun_ajaran_by_id($id) {
        return $this->db->get_where('ppdb_tahun_ajaran', ['id' => $id])->row_array();
    }

    public function get_tahun_ajaran_aktif() {
        $today = date('Y-m-d');
        $this->db->where('status', 'aktif');
        $this->db->where('tanggal_mulai <=', $today);
        $this->db->where('tanggal_selesai >=', $today);
        return $this->db->get('ppdb_tahun_ajaran')->row_array();
    }

    public function insert_tahun_ajaran($data) {
        return $this->db->insert('ppdb_tahun_ajaran', $data);
    }
    
    public function update_tahun_ajaran($id, $data) {
        return $this->db->update('ppdb_tahun_ajaran', $data, ['id' => $id]);
    }
    
    public function set_semua_tahun_tidak_aktif() {
        return $this->db->update('ppdb_tahun_ajaran', ['status' => 'tidak_aktif']);
    }

    public function delete_tahun_ajaran($id) {
        return $this->db->delete('ppdb_tahun_ajaran', ['id' => $id]);
    }
    
    // ======== FUNGSI UNTUK PENDAFTAR ========
    public function get_pendaftar_by_tahun($tahun_id) {
        return $this->db->get_where('ppdb_pendaftar', ['tahun_ajaran_id' => $tahun_id])->result_array();
    }
    
    public function get_pendaftar_by_id($id) {
        return $this->db->get_where('ppdb_pendaftar', ['id' => $id])->row_array();
    }
    
    public function get_nomor_urut_pendaftar() {
        $this->db->select_max('id');
        $query = $this->db->get('ppdb_pendaftar'); 
        $row = $query->row();
        return ($row->id) ? $row->id : 0;
    }

    public function insert_pendaftar($data) {
        return $this->db->insert('ppdb_pendaftar', $data);
    }

     public function get_pendaftar_by_nomor($nomor) {
        return $this->db->get_where('ppdb_pendaftar', ['nomor_pendaftaran' => $nomor])->row_array();
    }
    
    public function update_pendaftar($id, $data) {
        return $this->db->update('ppdb_pendaftar', $data, ['id' => $id]);
    }

    public function delete_pendaftar($id) {
        return $this->db->delete('ppdb_pendaftar', ['id' => $id]);
    }
    public function get_all_pendaftar() {
    return $this->db->order_by('id', 'DESC')->get('ppdb_pendaftar')->result_array();
}
}