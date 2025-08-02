<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen Data Siswa</h1>
     <?= $this->session->flashdata('message'); ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Siswa</h6>
            
            <a href="<?= base_url('admin/siswa/tambah'); ?>" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Tambah Data
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; foreach($siswa as $s): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $s['nis']; ?></td>
                            <td><?= $s['nama_siswa']; ?></td>
                            <td><?= $s['kelas']; ?></td>
                            <td>
                                <a href="<?= base_url('admin/siswa/edit/' . $s['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="<?= base_url('admin/siswa/hapus/' . $s['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>