<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pengunjung extends CI_Model {

    public function get_total_pengunjung() {
        // Menghitung total IP unik
        return $this->db->distinct()->count_all_results('pengunjung');
    }

    public function get_pengunjung_hari_ini() {
        // Menghitung jumlah baris untuk tanggal hari ini
        return $this->db->where('tanggal', date('Y-m-d'))->count_all_results('pengunjung');
    }
}