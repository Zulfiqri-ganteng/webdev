<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label>Tahun Ajaran (Contoh: 2025/2026)</label>
                    <input type="text" name="tahun_ajaran" class="form-control" required>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Mulai Pendaftaran</label>
                        <input type="date" name="tanggal_mulai" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Selesai Pendaftaran</label>
                        <input type="date" name="tanggal_selesai" class="form-control" required>
                    </div>
                </div>
                <a href="<?= base_url('admin/ppdb'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>