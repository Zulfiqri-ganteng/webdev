<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin/dashboard'); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Panel</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Manajemen Konten
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/guru'); ?>"><i class="fas fa-fw fa-chalkboard-teacher"></i><span>Data Guru</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/siswa'); ?>"><i class="fas fa-fw fa-user-graduate"></i><span>Data Siswa</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/pengumuman'); ?>"><i class="fas fa-fw fa-bullhorn"></i><span>Pengumuman</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/gallery'); ?>"><i class="fas fa-fw fa-images"></i><span>Gallery</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/ebook'); ?>"><i class="fas fa-fw fa-book-open"></i><span>E-Book</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Manajemen Ujian
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/ujian'); ?>"><i class="fas fa-fw fa-file-alt"></i><span>Ujian Online</span></a>
    </li>
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        PPDB
    </div>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/ppdb'); ?>"><i class="fas fa-fw fa-id-card"></i><span>Tahun Ajaran</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/ppdb/pendaftar'); ?>"><i class="fas fa-fw fa-users"></i><span>Data Pendaftar</span></a>
    </li>
    <hr class="sidebar-divider d-none d-md-block">
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
</ul>

<div id="content-wrapper" class="d-flex flex-column">
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            
            <div id="live-clock" class="text-gray-700">
                <i class="fas fa-calendar-alt"></i>&nbsp;
                <span class="fw-bold"></span>
            </div>
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('nama_lengkap'); ?></span>
                        <img class="img-profile rounded-circle"
                            src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile.svg">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>