<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3">
                    <label>Judul Pengumuman</label>
                    <input type="text" name="judul" class="form-control" value="<?= isset($pengumuman) ? $pengumuman['judul'] : set_value('judul'); ?>" required>
                </div>
                <div class="mb-3">
                    <label>Isi Pengumuman</label>
                    <textarea name="isi" class="form-control" rows="10" required><?= isset($pengumuman) ? $pengumuman['isi'] : set_value('isi'); ?></textarea>
                </div>
                <a href="<?= base_url('admin/pengumuman'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>