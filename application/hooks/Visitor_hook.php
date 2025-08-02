<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_hook {

    public function track() {
        $CI =& get_instance();
        
        // Jangan catat kunjungan jika sedang berada di panel admin/guru/siswa
        if ($CI->uri->segment(1) === 'admin' || $CI->uri->segment(1) === 'guru' || $CI->uri->segment(1) === 'siswa') {
            return;
        }

        $ip_address = $CI->input->ip_address();
        $tanggal = date("Y-m-d");

        // Cek apakah IP ini sudah berkunjung hari ini
        $CI->db->where('tanggal', $tanggal);
        $CI->db->where('ip_address', $ip_address);
        $query = $CI->db->get('pengunjung');

        if ($query->num_rows() == 0) {
            // Jika belum ada, insert data baru
            $CI->db->insert('pengunjung', ['ip_address' => $ip_address, 'tanggal' => $tanggal]);
        } else {
            // Jika sudah ada, update hits-nya
            $CI->db->set('hits', 'hits+1', FALSE);
            $CI->db->where('ip_address', $ip_address);
            $CI->db->where('tanggal', $tanggal);
            $CI->db->update('pengunjung');
        }
    }
}