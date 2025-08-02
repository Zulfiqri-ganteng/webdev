<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_Auth');
        $this->load->library('form_validation');
    }

    /**
     * Menampilkan halaman login atau memproses data login.
     */
    public function index() {
        // Jika sudah login, tendang ke dashboard masing-masing
        if ($this->session->userdata('level')) {
            redirect($this->session->userdata('level') . '/dashboard');
        }

        // Aturan validasi untuk form login
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal atau halaman baru dimuat
            $data['judul'] = 'Login';
            $this->load->view('templates/header', $data);
            $this->load->view('v_login');
            $this->load->view('templates/footer');
        } else {
            // Jika validasi sukses, jalankan metode login
            $this->_login();
        }
    }

    /**
     * Metode privat untuk memproses logika otentikasi.
     */
    private function _login() {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        // Panggil model untuk mengambil data user berdasarkan username
        $user = $this->M_Auth->get_user($username);

        // Cek jika user ditemukan
        if ($user) {
            // Cek kesesuaian password
            if (password_verify($password, trim($user['password']))) {
                // Siapkan data untuk session
                $data_session = [
                    'id_user' => $user['id'],
                    'username' => $user['username'],
                    'level' => $user['level'],
                    'nama_lengkap' => $user['nama_lengkap']
                ];
                $this->session->set_userdata($data_session);

                // Arahkan ke dashboard sesuai level
                redirect($user['level'] . '/dashboard');

            } else {
                // Jika password salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah!</div>');
                redirect('auth');
            }
        } else {
            // Jika username tidak ditemukan
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username tidak terdaftar!</div>');
            redirect('auth');
        }
    }

    /**
     * Menghancurkan session dan mengarahkan ke halaman login.
     */
    public function logout() {
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah berhasil logout!</div>');
        redirect('auth');
    }
    public function register() {
    // Hapus user admin lama jika ada, agar tidak ada duplikat username
    $this->db->delete('users', array('username' => 'admin'));

    $data = [
        'username' => 'admin',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
        'nama_lengkap' => 'Administrator Web',
        'level' => 'admin'
    ];

    if ($this->db->insert('users', $data)) {
        echo "<h1>User admin berhasil dibuat ulang!</h1>";
        echo "<p>Silakan coba login kembali dengan:</p>";
        echo "<p>Username: <b>admin</b></p>";
        echo "<p>Password: <b>admin123</b></p>";
        echo "<a href='" . base_url('auth') . "'>Kembali ke Halaman Login</a>";
    } else {
        echo "Gagal membuat user admin.";
    }
}
}