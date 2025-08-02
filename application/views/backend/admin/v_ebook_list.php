<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen E-Book</h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data E-Book</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($ebooks as $ebook): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $ebook['judul']; ?></td>
                            <td><?= $ebook['nama_penulis']; ?></td>
                            <td><span class="badge bg-info text-white"><?= ucfirst($ebook['level_penulis']); ?></span></td>
                            <td>
                                <a href="<?= base_url('admin/ebook/hapus/' . $ebook['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus E-Book ini?');">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>