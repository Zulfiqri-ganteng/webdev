<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Siswa extends CI_Model {
    
    private $table = 'siswa';

    /**
     * Mengambil semua data siswa.
     * @param int|null $limit Batasan jumlah data yang diambil.
     * @return array
     */
    public function get_all_siswa($limit = null) {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->order_by('nama_siswa', 'ASC');
        return $this->db->get($this->table)->result_array();
    }
    
    /**
     * Mengambil data siswa berprestasi.
     * @param int $limit Batasan jumlah data yang diambil.
     * @return array
     */
    public function get_siswa_terbaik($limit = 4) {
        $this->db->where('is_terbaik', 1);
        $this->db->limit($limit);
        $this->db->order_by('nama_siswa', 'ASC');
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Mengambil satu data siswa berdasarkan ID.
     * @param int $id ID siswa.
     * @return array
     */
    public function get_siswa_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }
    
    /**
     * Menyimpan data siswa baru ke database.
     * @param array $data Data siswa yang akan disimpan.
     * @return bool
     */
    public function insert_siswa($data) {
        return $this->db->insert($this->table, $data);
    }

    /**
     * Memperbarui data siswa di database.
     * @param int $id ID siswa yang akan diperbarui.
     * @param array $data Data baru untuk siswa.
     * @return bool
     */
    public function update_siswa($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    /**
     * Menghapus data siswa dari database.
     * @param int $id ID siswa yang akan dihapus.
     * @return bool
     */
    public function delete_siswa($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}