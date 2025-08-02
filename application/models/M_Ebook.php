<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Ebook extends CI_Model {
    
    private $table = 'ebook';

    /**
     * Mengambil semua ebook untuk halaman publik dengan join ke tabel users.
     */
    public function get_all_ebooks($limit, $start) {
        $this->db->select('ebook.*, users.nama_lengkap as nama_penulis');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = ebook.penulis_id');
        $this->db->order_by('tgl_publish', 'DESC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result_array();
    }

    /**
     * Menghitung total semua ebook untuk pagination.
     */
    public function count_all_ebooks() {
        return $this->db->count_all($this->table);
    }

    /**
     * Mengambil satu data ebook berdasarkan ID.
     */
    public function get_ebook_by_id($id) {
        $this->db->select('ebook.*, users.nama_lengkap as nama_penulis');
        $this->db->from($this->table);
        $this->db->join('users', 'users.id = ebook.penulis_id');
        $this->db->where('ebook.id', $id);
        return $this->db->get()->row_array();
    }

    /**
     * Mengambil semua ebook yang ditulis oleh penulis tertentu (untuk dashboard siswa).
     */
    public function get_ebook_by_penulis($id_penulis) {
        $this->db->where('penulis_id', $id_penulis);
        $this->db->order_by('tgl_publish', 'DESC');
        return $this->db->get($this->table)->result_array();
    }

    /**
     * Menambah view count.
     * Parameter FALSE mencegah CodeIgniter meng-escape query.
     */
    public function increment_view($id) {
        $this->db->where('id', $id);
        $this->db->set('views', 'views+1', FALSE);
        $this->db->update($this->table);
    }
    
    /**
     * Menambah like count.
     */
    public function increment_like($id) {
        $this->db->where('id', $id);
        $this->db->set('likes', 'likes+1', FALSE);
        $this->db->update($this->table);
    }

    public function insert_ebook($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update_ebook($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete_ebook($id) {
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
}