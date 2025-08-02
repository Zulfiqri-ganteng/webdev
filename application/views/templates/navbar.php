<nav class="navbar navbar-expand-lg navbar-dark shadow-sm sticky-top">
    <div class="container">
       <a class="navbar-brand" href="<?= base_url(); ?>">
    <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo SMK Galajuara" width="35" height="35" class="d-inline-block align-text-top">
    <span class="ms-2 fw-bold">SMK Galajuara</span>
</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('home'); ?>">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Profil Sekolah
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('about'); ?>">Tentang Kami</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('guru'); ?>">Data Guru</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa'); ?>">Siswa Berprestasi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Akademik
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('about'); ?>">Manajemen Perkantoran (MP)</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('guru'); ?>">Akutansi Keuangan Lembaga (AKL)</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa'); ?>">Teknik Komputer Jaringan & Telekomunikasi (TKJT)</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('guru'); ?>">Design Komunikasi Visual (Multimedia)</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa'); ?>">Farmasi</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Humas
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('about'); ?>">Praktek Kerja Industri (Prakerin)</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('guru'); ?>">Bursa Kerja Khusus (BKK)</a></li>
  
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Ekskul
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('about'); ?>">Osis</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('guru'); ?>">Pramuka</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa'); ?>">Rohis</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('about'); ?>">Rokris</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('guru'); ?>">Paskibra</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa'); ?>">Futsal</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('about'); ?>">Seni Tari</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('guru'); ?>">Basket</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('siswa'); ?>">Podcast</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('about'); ?>">IT</a></li>
                    
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Informasi
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('pengumuman'); ?>">Pengumuman</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('gallery'); ?>">Gallery</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('ebook'); ?>">E-Book</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('ujian'); ?>">Ujian Online</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link text-warning dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        PPDB
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= base_url('ppdb'); ?>">PPDB</a></li>
                        <li><a class="dropdown-item" href="<?= base_url('ppdb/cek_status'); ?>">Cek Status</a></li>
                       
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('kontak'); ?>">Kontak</a>
                <!-- </li>
                 <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('ujian'); ?>">Ujian Online</a>
                </li> -->
            </ul>

            <ul class="navbar-nav">
                 <?php if ($this->session->userdata('level')) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-1"></i> <?= $this->session->userdata('nama_lengkap'); ?>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?= base_url($this->session->userdata('level') . '/dashboard'); ?>">Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">Logout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="<?= base_url('auth'); ?>">
                            <i class="fas fa-sign-in-alt me-1"></i> Sign In
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>