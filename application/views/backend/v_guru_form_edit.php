<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800"><?= $judul; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Data Guru</h6>
        </div>
        <div class="card-body">
            <?php if($this->session->flashdata('upload_error')) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $this->session->flashdata('upload_error'); ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('admin/guru/edit/' . $guru['id']); ?>" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="old_image" value="<?= $guru['foto']; ?>">

                <div class="mb-3">
                    <label for="nama_guru" class="form-label">Nama Lengkap Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama_guru" value="<?= $guru['nama_guru']; ?>" required>
                    <?= form_error('nama_guru', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <label for="nip" class="form-label">NIP</label>
                    <input type="number" class="form-control" id="nip" name="nip" value="<?= $guru['nip']; ?>" required>
                    <?= form_error('nip', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <label for="mapel" class="form-label">Mata Pelajaran</label>
                    <input type="text" class="form-control" id="mapel" name="mapel" value="<?= $guru['mapel']; ?>" required>
                    <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                
                <div class="row">
                    <div class="col-sm-3">
                         <p>Foto Saat Ini:</p>
                         <img src="<?= base_url('assets/images/guru/' . $guru['foto']); ?>" class="img-thumbnail" alt="Foto Guru">
                    </div>
                    <div class="col-sm-9">
                        <div class="mb-3">
                            <label for="foto" class="form-label">Ganti Foto (Opsional)</label>
                            <input class="form-control" type="file" id="foto" name="foto">
                            <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengganti foto. Ukuran maks 2MB.</small>
                        </div>
                    </div>
                </div>

                <hr>
                
                <a href="<?= base_url('admin/guru'); ?>" class="btn btn-secondary">Kembali</a>
                <button type="submit" class="btn btn-primary">Update Data</button>
            </form>
        </div>
    </div>
</div>