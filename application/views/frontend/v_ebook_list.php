<div class="container mt-5">
    <h2 class="text-center mb-4"><?= $judul; ?></h2>
    <div class="row">
        <?php if(!empty($ebooks)) : foreach($ebooks as $ebook) : ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    <img src="<?= base_url('assets/images/ebook_cover/' . $ebook['cover']); ?>" class="card-img-top" alt="Cover" style="height: 200px; object-fit: cover;">
                    <div class="card-body">
                        <h5 class="card-title"><?= $ebook['judul']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">oleh: <?= $ebook['nama_penulis']; ?></h6>
                        <p class="card-text"><?= word_limiter($ebook['isi_cerita'], 25); ?></p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <div>
                            <small class="text-muted me-2"><i class="fas fa-eye"></i> <?= $ebook['views']; ?></small>
                            <small class="text-muted"><i class="fas fa-thumbs-up"></i> <?= $ebook['likes']; ?></small>
                        </div>
                        <a href="<?= base_url('ebook/detail/' . $ebook['id']); ?>" class="btn btn-primary btn-sm">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        <?php endforeach; else : ?>
            <p class="text-center">Belum ada E-Book yang tersedia.</p>
        <?php endif; ?>
    </div>
    
    <div class="row mt-4">
        <div class="col">
            <?= $this->pagination->create_links(); ?>
        </div>
    </div>
</div>