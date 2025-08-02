<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Gallery extends CI_Model {

    public function get_all_gallery() {
        // Mengambil semua data dari tabel 'gallery'
        // diurutkan dari yang paling baru
        $this->db->order_by('tgl_upload', 'DESC');
        return $this->db->get('gallery')->result_array();
    }
    public function get_gallery_by_id($id) {
    return $this->db->get_where('gallery', ['id' => $id])->row_array();
}

public function insert_gallery($data) {
    return $this->db->insert('gallery', $data);
}

public function delete_gallery($id) {
    return $this->db->delete('gallery', ['id' => $id]);
}

    // Anda bisa menambahkan fungsi CRUD lainnya di sini (insert, update, delete)
    // untuk dikelola oleh admin.
    }