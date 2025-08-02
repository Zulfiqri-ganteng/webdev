<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                
                <?php if(isset($siswa)): ?>
                    <input type="hidden" name="foto_lama" value="<?= $siswa['foto']; ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" value="<?= isset($siswa) ? $siswa['nama_siswa'] : ''; ?>" required>
                </div>
                <div class="mb-3">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" value="<?= isset($siswa) ? $siswa['nis'] : ''; ?>" required <?= isset($siswa) ? 'readonly' : ''; ?>>
                     <?= isset($siswa) ? '<small class="form-text text-muted">NIS tidak dapat diubah.</small>' : ''; ?>
                </div>
                 <div class="mb-3">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="<?= isset($siswa) ? $siswa['kelas'] : ''; ?>" required>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="is_terbaik" value="1" <?= (isset($siswa) && $siswa['is_terbaik'] == 1) ? 'checked' : ''; ?>>
                    <label class="form-check-label">Jadikan Siswa Berprestasi?</label>
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Siswa</label>
                    <?php if(isset($siswa) && $siswa['foto'] != 'default.jpg'): ?>
                        <div class="mb-2">
                            <img src="<?= base_url('assets/images/siswa/' . $siswa['foto']); ?>" width="100" class="img-thumbnail">
                        </div>
                    <?php endif; ?>
                    <input type="file" name="foto" class="form-control">
                    <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti foto.</small>
                </div>

                <a href="<?= base_url('admin/siswa'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>