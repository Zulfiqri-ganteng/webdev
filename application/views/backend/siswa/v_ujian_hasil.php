<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <?= $this->session->flashdata('message'); ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow text-center">
                <div class="card-header bg-success text-white">
                    Hasil Ujian Anda
                </div>
                <div class="card-body">
                    <h1 class="display-3 font-weight-bold text-success"><?= number_format($hasil['nilai'], 2); ?></h1>
                    <p class="lead">Skor yang Anda peroleh.</p>
                    <hr>
                    <a href="<?= base_url('siswa/ujian'); ?>" class="btn btn-primary">Kembali ke Daftar Ujian</a>
                </div>
            </div>
        </div>
    </div>
</div>