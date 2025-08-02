<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen Pengumuman</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pengumuman</h6>
            <a href="<?= base_url('admin/pengumuman/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Pengumuman
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($pengumuman as $p): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $p['judul']; ?></td>
                            <td><?= date('d F Y', strtotime($p['tanggal'])); ?></td>
                            <td>
                                <a href="<?= base_url('admin/pengumuman/edit/' . $p['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('admin/pengumuman/hapus/' . $p['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>