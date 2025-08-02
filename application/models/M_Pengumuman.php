<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengumuman extends CI_Model {
    
    private $table = 'pengumuman';

    /**
     * Mengambil semua data pengumuman.
     * @return array
     */
    public function get_all_pengumuman() {
        $this->db->order_by('tanggal', 'DESC');
        return $this->db->get($this->table)->result_array();
    }
    
    /**
     * Mengambil pengumuman terbaru dengan batasan jumlah.
     * @param int $limit Jumlah pengumuman yang ingin ditampilkan.
     * @return array
     */
    public function get_pengumuman_terbaru($limit = 3) {
        $this->db->order_by('tanggal', 'DESC');
        $this->db->limit($limit);
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Mengambil satu data pengumuman berdasarkan ID.
     * @param int $id ID pengumuman.
     * @return array
     */
    public function get_pengumuman_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }
    
    /**
     * Menyimpan data pengumuman baru ke database.
     * @param array $data Data pengumuman yang akan disimpan.
     * @return bool
     */
    public function insert_pengumuman($data) {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Memperbarui data pengumuman di database.
     * @param int $id ID pengumuman yang akan diperbarui.
     * @param array $data Data baru untuk pengumuman.
     * @return bool
     */
    public function update_pengumuman($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Menghapus data pengumuman dari database.
     * @param int $id ID pengumuman yang akan dihapus.
     * @return bool
     */
    public function delete_pengumuman($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}