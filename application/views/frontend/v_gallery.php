<div class="container my-5">
    <h2 class="text-center section-title"><?= $judul; ?></h2>
    <div class="row">
        <?php if (!empty($gallery)) : foreach($gallery as $g) : ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <a href="<?= base_url('assets/images/gallery/' . $g['nama_file']); ?>" data-toggle="lightbox" data-gallery="gallery">
                    <img src="<?= base_url('assets/images/gallery/' . $g['nama_file']); ?>" class="card-img-top" alt="<?= $g['judul_foto']; ?>" style="height: 250px; object-fit: cover;">
                </a>
                 <div class="card-body">
                    <p class="card-text text-center"><?= $g['judul_foto']; ?></p>
                 </div>
            </div>
        </div>
        <?php endforeach; else : ?>
            <p class="text-center">Belum ada foto di galeri.</p>
        <?php endif; ?>
    </div>
</div>