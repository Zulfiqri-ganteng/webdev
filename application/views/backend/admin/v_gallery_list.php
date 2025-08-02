<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen Gallery</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Gallery</h6>

            <a href="<?= base_url('admin/gallery/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Foto
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Foto</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($gallery as $g): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $g['judul_foto']; ?></td>
                            <td>
                                <img src="<?= base_url('assets/images/gallery/' . $g['nama_file']); ?>" width="150">
                            </td>
                            <td>
                                <a href="<?= base_url('admin/gallery/hapus/' . $g['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus foto ini?');">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>