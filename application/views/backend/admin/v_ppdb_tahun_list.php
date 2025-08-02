<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen Tahun Ajaran PPDB</h1>
    <p class="mb-4">Kelola periode pendaftaran siswa baru. Hanya boleh ada satu tahun ajaran yang berstatus "aktif" dalam satu waktu.</p>
    
    <?= $this->session->flashdata('message'); ?>

   <div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Tahun Ajaran</h6>
        
        <a href="<?= base_url('admin/ppdb/tambah_tahun'); ?>" class="btn btn-primary btn-sm">
            <i class="fas fa-plus"></i> Tambah Tahun Ajaran
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Tahun Ajaran</th>
                        <th>Tanggal Pendaftaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($tahun_ajaran as $ta): ?>
                    <tr>
                        <td><?= $ta['tahun_ajaran']; ?></td>
                        <td><?= date('d M Y', strtotime($ta['tanggal_mulai'])) . ' s/d ' . date('d M Y', strtotime($ta['tanggal_selesai'])); ?></td>
                        <td>
                            <?php if($ta['status'] == 'aktif'): ?>
                                <span class="badge bg-success text-white">Aktif</span>
                            <?php else: ?>
                                <span class="badge bg-secondary text-white">Tidak Aktif</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($ta['status'] == 'tidak_aktif'): ?>
                                <a href="<?= base_url('admin/ppdb/set_status_tahun/' . $ta['id'] . '/aktif'); ?>" class="btn btn-success btn-sm" onclick="return confirm('Aktifkan tahun ajaran ini? Semua tahun ajaran lain akan dinonaktifkan.')">Aktifkan</a>
                            <?php else: ?>
                                 <a href="<?= base_url('admin/ppdb/set_status_tahun/' . $ta['id'] . '/tidak_aktif'); ?>" class="btn btn-secondary btn-sm">Nonaktifkan</a>
                            <?php endif; ?>
                            <a href="<?= base_url('admin/ppdb/edit_tahun/' . $ta['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= base_url('admin/ppdb/hapus_tahun/' . $ta['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>