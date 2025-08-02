<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
            <div class="card shadow-sm p-5">
                <i class="fas fa-check-circle fa-4x mb-4 text-success"></i>
                <h2 class="section-title">Pendaftaran Berhasil!</h2>
                <p class="lead text-muted">Terima kasih, <strong><?= $success_data['nama']; ?></strong>, telah melakukan pendaftaran.</p>
                <hr>
                <p>Silakan simpan dan catat **Nomor Pendaftaran** Anda di bawah ini untuk melihat status pendaftaran di kemudian hari.</p>
                <div class="alert alert-info fs-4 fw-bold">
                    <?= $success_data['nomor_pendaftaran']; ?>
                </div>
                <a href="<?= base_url('home'); ?>" class="btn btn-primary mt-3">Kembali ke Beranda</a>
            </div>
        </div>
    </div>
</div>