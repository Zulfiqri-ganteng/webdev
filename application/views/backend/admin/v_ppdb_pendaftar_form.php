<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="<?= base_url('admin/ppdb/edit_pendaftar/' . $pendaftar['id']); ?>" method="post">
                <h5 class="mb-3">Data Diri Calon Siswa</h5>
                <hr>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $pendaftar['nama_lengkap']; ?>" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>NISN</label>
                        <input type="text" name="nisn" class="form-control" value="<?= $pendaftar['nisn']; ?>" required>
                    </div>
                </div>
                <a href="<?= base_url('admin/ppdb/pendaftar'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            </form>
        </div>
    </div>
</div>