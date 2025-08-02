<div class="container my-5">
    <h2 class="text-center section-title"><?= $judul; ?></h2>
    <div class="row">
        <?php if (!empty($siswa_terbaik)) : foreach ($siswa_terbaik as $s) : ?>
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 text-center shadow-sm">
                   <img src="<?= base_url('assets/images/siswa/' . $s['foto']); ?>" class="card-img-top" alt="<?= $s['nama_siswa']; ?>" style="height: 280px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?= $s['nama_siswa']; ?></h5>
                        <p class="card-text text-muted">Kelas <?= $s['kelas']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; else : ?>
            <div class="col text-center">
                <p>Data siswa berprestasi belum tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>