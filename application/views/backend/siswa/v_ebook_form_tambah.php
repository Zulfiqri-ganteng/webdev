<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Cerita Baru</h6>
        </div>
        <div class="card-body">
            <form action="<?= base_url('siswa/ebook/tambah'); ?>" method="post">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Cerita</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="<?= set_value('judul'); ?>" required>
                    <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <label for="isi_cerita" class="form-label">Isi Cerita</label>
                    <textarea class="form-control" id="isi_cerita" name="isi_cerita" rows="15" required><?= set_value('isi_cerita'); ?></textarea>
                    <?= form_error('isi_cerita', '<small class="text-danger">', '</small>'); ?>
                </div>

                <hr>
                
                <a href="<?= base_url('siswa/ebook'); ?>" class="btn btn-secondary">Batal</a>
                <button type="submit" class="btn btn-primary">Publikasikan</button>
            </form>
        </div>
    </div>
</div>