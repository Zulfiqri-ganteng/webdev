<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Laporan Hasil Ujian</h1>
    <p class="mb-4">Ujian: <strong><?= $ujian['judul_ujian']; ?></strong></p>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Nilai Siswa</h6>
            </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Nilai</th>
                            <th>Waktu Mengerjakan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($hasil)): $i = 1; foreach($hasil as $h): ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $h['nama_lengkap']; ?></td>
                            <td><?= $h['kelas']; ?></td>
                            <td><span class="badge bg-success text-white p-2"><?= number_format($h['nilai'], 2); ?></span></td>
                            <td><?= date('d F Y, H:i', strtotime($h['tgl_submit'])); ?></td>
                        </tr>
                        <?php endforeach; else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Belum ada siswa yang mengerjakan ujian ini.</td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <a href="<?= base_url('admin/ujian'); ?>" class="btn btn-secondary">Kembali ke Daftar Ujian</a>
        </div>
    </div>
</div>