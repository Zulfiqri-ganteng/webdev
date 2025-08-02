<div class="container my-5">
    <h2 class="text-center section-title">Staf Pendidik</h2>
    <p class="text-center text-muted mb-5">Tenaga pendidik profesional dan berdedikasi di SMK Galajuara.</p>
    
    <div class="row">
        <?php if (!empty($guru)) : foreach ($guru as $g) : ?>
            <div class="col-md-4 col-lg-3 mb-4">
                <div class="card h-100 text-center shadow-sm">
                    <img src="<?= base_url('assets/images/guru/' . $g['foto']); ?>" class="card-img-top" alt="<?= $g['nama_guru']; ?>" style="height: 280px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title mb-1"><?= $g['nama_guru']; ?></h5>
                        <p class="card-text text-muted"><?= $g['mapel']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; else : ?>
            <div class="col text-center">
                <p>Data guru belum tersedia.</p>
            </div>
        <?php endif; ?>
    </div>
</div>