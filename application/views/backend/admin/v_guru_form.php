<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">Nama Lengkap Guru</label>
                    <input type="text" name="nama_guru" class="form-control" value="<?= isset($guru) ? $guru['nama_guru'] : set_value('nama_guru'); ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">NIP</label>
                    <input type="text" name="nip" class="form-control" value="<?= isset($guru) ? $guru['nip'] : set_value('nip'); ?>" required <?= isset($guru) ? 'readonly' : ''; ?>>
                    <?= isset($guru) ? '<small class="form-text text-muted">NIP tidak dapat diubah.</small>' : ''; ?>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control" value="<?= isset($guru) ? $guru['mapel'] : set_value('mapel'); ?>" required>
                </div>
                
                <a href="<?= base_url('admin/guru'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>