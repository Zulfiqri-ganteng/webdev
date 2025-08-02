<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen Data Guru</h1>
    <p class="mb-4">Di halaman ini Anda bisa mengelola data guru yang akan tampil di halaman depan.</p>
    <?= $this->session->flashdata('message'); ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Guru</h6>
            
            <a href="<?= base_url('admin/guru/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama Guru</th>
                            <th>Mata Pelajaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($guru as $g): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $g['nip']; ?></td>
                            <td><?= $g['nama_guru']; ?></td>
                            <td><?= $g['mapel']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/guru/edit/' . $g['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('admin/guru/hapus/' . $g['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>