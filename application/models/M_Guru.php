<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Guru extends CI_Model {
    
    private $table = 'guru';

    public function get_all_guru() {
        return $this->db->order_by('nama_guru', 'ASC')->get($this->table)->result_array();
    }

    public function get_guru_by_id($id) {
        return $this->db->get_where($this->table, ['id' => $id])->row_array();
    }
    
    public function insert_guru($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update_guru($id, $data) {
        return $this->db->update($this->table, $data, ['id' => $id]);
    }

    public function delete_guru($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }
}