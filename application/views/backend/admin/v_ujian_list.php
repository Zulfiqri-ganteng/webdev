<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen Ujian Online</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Ujian</h6>
            <a href="<?= base_url('admin/ujian/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Ujian
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Judul & Mapel</th>
                            <th>Guru Pembuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                   <tbody>
    <?php foreach($ujian as $u): ?>
    <tr>
        <td>
            <strong><?= $u['judul_ujian']; ?></strong><br>
            <small class="text-muted"><?= $u['mapel']; ?></small>
        </td>
        <td><?= $u['nama_guru']; ?></td>
        <td>
            <div class="d-none d-lg-block">
                <a href="<?= base_url('admin/ujian/kelola_soal/' . $u['id']); ?>" class="btn btn-primary btn-sm"><i class="fas fa-list-ul me-1"></i> Kelola Soal</a>
                <a href="<?= base_url('admin/ujian/hasil_ujian/' . $u['id']); ?>" class="btn btn-info btn-sm"><i class="fas fa-poll-h me-1"></i> Lihat Hasil</a>
                <a href="<?= base_url('admin/ujian/edit/' . $u['id']); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit me-1"></i> Edit</a>
                <a href="<?= base_url('admin/ujian/hapus/' . $u['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="fas fa-trash me-1"></i> Hapus</a>
            </div>

            <div class="dropdown d-lg-none">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                    Aksi
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?= base_url('admin/ujian/kelola_soal/' . $u['id']); ?>"><i class="fas fa-list-ul fa-fw me-2"></i> Kelola Soal</a>
                    <a class="dropdown-item" href="<?= base_url('admin/ujian/hasil_ujian/' . $u['id']); ?>"><i class="fas fa-poll-h fa-fw me-2"></i> Lihat Hasil</a>
                    <a class="dropdown-item" href="<?= base_url('admin/ujian/edit/' . $u['id']); ?>"><i class="fas fa-edit fa-fw me-2"></i> Edit Ujian</a>
                    <a class="dropdown-item" href="<?= base_url('admin/ujian/hapus/' . $u['id']); ?>" onclick="return confirm('Yakin?')"><i class="fas fa-trash fa-fw me-2"></i> Hapus</a>
                </div>
            </div>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
                </table>
            </div>
        </div>
    </div>
</div>