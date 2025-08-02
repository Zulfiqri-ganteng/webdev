<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>
    
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Guru</h6>
        </div>
        <div class="card-body">
            <?php if($this->session->flashdata('upload_error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('upload_error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/guru/tambah'); ?>" method="post" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label for="nama_guru" class="form-label">Nama Lengkap Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?= set_value('nama_guru'); ?>" required>
                    <?= form_error('nama_guru', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="number" class="form-control" id="nip" name="nip" value="<?= set_value('nip'); ?>" required>
                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <label for="mapel" class="form-label">Mata Pelajaran</label>
                    <input type="text" class="form-control" id="mapel" name="mapel" value="<?= set_value('mapel'); ?>" required>
                    <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Guru</label>
                    <input class="form-control" type="file" id="foto" name="foto">
                    <small class="form-text text-muted">Ukuran maksimal 2MB. Format: JPG, PNG, JPEG.</small>
                </div>

                <hr>
                
                <a href="<?= base_url('admin/guru'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>